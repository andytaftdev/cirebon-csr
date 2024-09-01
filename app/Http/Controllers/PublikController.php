<?php

namespace App\Http\Controllers;

use App\Models\Publik;
use App\Models\Sektor;
use App\Models\Identity;
use App\Models\Proyek;
use App\Models\Kegiatan;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Laporan;
use Illuminate\Http\Request;

class PublikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sektor = Sektor::all();
        $kegiatan = Kegiatan::where('status', 1)
        ->orderBy('id', 'desc')->take(4)
        ->get();
        $proyek = Proyek::count();
        $proyek_released = Proyek::where('status', 'terbit')->count();
        $mitra_data = User::where('level', 'mitra')->count();
        $dana_mitra = Laporan::where('status', 'terima')->sum('realisasi');
        $laporan = Laporan::where('status', 'terima')
        ->take(4)->orderBy('id', 'desc')
        ->get();

        $kegiatanCarousel = Kegiatan::where('status', 1)->take(5)
        ->orderBy('id', 'desc')
        ->get();
        foreach ($kegiatanCarousel as $item) {
            $date = $item->terbit; // Replace with your actual date field name

                $carbonDate = Carbon::parse($date);
            
                $item->month = $carbonDate->format('F'); // Full month name
                $item->day = $carbonDate->format('d');   // Day of the month
                $item->year = $carbonDate->format('Y');   // Day of the month
           
        }

        $mitra = Identity::whereHas('user', function ($query) {
            $query->where('level', 'mitra');
        })->take(8)->get();




           

        function formatRupiah($number)
        {
            if ($number >= 1000000000) {
                return number_format($number / 1000000000, 1) . ' M'; // Billion
            } elseif ($number >= 1000000) {
                return number_format($number / 1000000, 1) . ' jt'; // Million
            } elseif ($number >= 1000) {
                return number_format($number / 1000, 1) . ' rb'; // Thousand
            }
            return number_format($number);
        }
        
        
                $data = [
                    'jumlah_proyek' => $proyek,
                    'release_proyek' => $proyek_released,
                    'data_mitra' => $mitra_data,
                    'dana_mitra' => formatRupiah($dana_mitra),
                ];

                foreach ($kegiatan as $item) {
                    $date = $item->terbit; // Replace with your actual date field name
        
                        $carbonDate = Carbon::parse($date);
                    
                        $item->month = $carbonDate->format('F'); // Full month name
                        $item->day = $carbonDate->format('d');   // Day of the month
                        $item->year = $carbonDate->format('Y');   // Day of the month
                   
                }

                foreach ($laporan as $item) {
                    $user = User::with('identity')->find($item['id_user']);
    
                        $item->user = $user->identity->nama_pt;
                        $item->logo = $user->identity->mitra_logo;
                       
                    }

        return view('welcome', compact('sektor','data','kegiatan','laporan','kegiatanCarousel','mitra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Publik $publik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publik $publik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publik $publik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publik $publik)
    {
        //
    }
}
