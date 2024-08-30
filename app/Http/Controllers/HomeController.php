<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use App\Models\Identity;
use App\Models\Laporan;
use App\Models\Sektor;
use App\Models\Proyek;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    public function __construct ()
    {
        $this->middleware('auth');
    }
    
    public function index()
    
    {

        $user = auth()->user();

        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
        $laporan = Laporan::with(['proyek'])->paginate(10);

        if ($user->level === 'admin')
        {
            $notification =  Notification::orderBy('id', 'desc')->get();
        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
            $notification->where('id_user', Auth::id());
            $notification = $notification->get();
        }

                foreach ($laporan as $item) {

            $releaseDate = $item->created_at; 
           
                $carbonDate = Carbon::parse($releaseDate);
            
                $item->releaseMonth = $carbonDate->format('F'); // Full month name
                $item->releaseDay = $carbonDate->format('d');   // Day of the month
                $item->releaseYear = $carbonDate->format('Y');   // Day of the month
            }


     


        $proyek = Proyek::count();
        $proyek_released = Proyek::where('status', 'terbit')->count();
        $mitra_data = User::where('level', 'mitra')->count();
        $dana_mitra = Laporan::where('status', 'terima')->sum('realisasi');
        $data_realisasi = DB::table('sektors')
            ->leftJoin('laporans', function ($join) {
                $join->on('sektors.id', '=', 'laporans.id_sektor')
                     ->where('laporans.status', '=', 'terima');
            })
            ->select('sektors.nama_sektor', DB::raw('COALESCE(SUM(laporans.realisasi), 0) as total'))
            ->groupBy('sektors.nama_sektor')
            ->get()
            ->pluck('total', 'nama_sektor')
            ->toArray();



            $data_pt = DB::table('laporans')
            ->leftJoin('identities', 'laporans.id_user', '=', 'identities.id_user') // Join with identities table
            ->select(
                'identities.nama_pt', // Select the name from identities
                DB::raw('SUM(laporans.realisasi) as total') // Sum the realisasi field
            )
            ->where('laporans.status', '=', 'terima') // Filter where status is 'terima'
            ->groupBy('identities.nama_pt') // Group by identities.name
            ->get()
            ->pluck('total', 'nama_pt') // Pluck the results with name as the key
            ->toArray();

            $data_kecamatan = DB::table('laporans')
    ->leftJoin('proyeks', 'laporans.id_proyek', '=', 'proyeks.id') // Join dengan tabel proyeks
    ->select(
        'proyeks.kecamatan', // Ambil nama kecamatan dari tabel proyeks
        DB::raw('SUM(laporans.realisasi) as total') // Sum kolom realisasi dari tabel laporans
    )
    ->where('laporans.status', '=', 'terima') // Filter status laporans yang "terima"
    ->groupBy('proyeks.kecamatan') // Group berdasarkan kecamatan
    ->get()
    ->pluck('total', 'kecamatan') // Pluck hasilnya dengan kecamatan sebagai key
    ->toArray();


        $data = [
            'jumlah_proyek' => $proyek,
            'release_proyek' => $proyek_released,
            'data_mitra' => $mitra_data,
            'dana_mitra' => $dana_mitra,
        ];






        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();

        if ($user->level === 'admin')
        {
            $notification =  Notification::orderBy('id', 'desc')->get();
        $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->count();

        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
            $notification->where('id_user', Auth::id());
            $notification = $notification->get();
        $jumlahNotifikasi = Notification::where('terlihat', 0)->where('id_user', $user->id)->count();

        }





        return view('dashboard', compact('user', 'notification', 'identity','laporan','data','data_realisasi','data_pt','data_kecamatan','jumlahNotifikasi'));
    }

    public function exportPdf()
    {
    //     $user = auth()->user();

    //     $proyek = Proyek::count();
    //     $proyek_released = Proyek::where('status', 'terbit')->count();
    //     $mitra_data = User::where('level', 'mitra')->count();
    //     $dana_mitra = Laporan::where('status', 'terima')->sum('realisasi');
    //     $data_realisasi = DB::table('sektors')
    //         ->leftJoin('laporans', function ($join) {
    //             $join->on('sektors.id', '=', 'laporans.id_sektor')
    //                  ->where('laporans.status', '=', 'terima');
    //         })
    //         ->select('sektors.nama_sektor', DB::raw('SUM(laporans.realisasi) as total'))
    //         ->groupBy('sektors.nama_sektor')
    //         ->get()
    //         ->pluck('total', 'nama_sektor')
    //         ->toArray();

    //         $data_pt = DB::table('laporans')
    //         ->leftJoin('identities', 'laporans.id_user', '=', 'identities.id_user') // Join with identities table
    //         ->select(
    //             'identities.nama_pt', // Select the name from identities
    //             DB::raw('SUM(laporans.realisasi) as total') // Sum the realisasi field
    //         )
    //         ->where('laporans.status', '=', 'terima') // Filter where status is 'terima'
    //         ->groupBy('identities.nama_pt') // Group by identities.name
    //         ->get()
    //         ->pluck('total', 'nama_pt') // Pluck the results with name as the key
    //         ->toArray();

    //         $data_kecamatan = DB::table('laporans')
    // ->leftJoin('proyeks', 'laporans.id_proyek', '=', 'proyeks.id') // Join dengan tabel proyeks
    // ->select(
    //     'proyeks.kecamatan', // Ambil nama kecamatan dari tabel proyeks
    //     DB::raw('SUM(laporans.realisasi) as total') // Sum kolom realisasi dari tabel laporans
    // )
    // ->where('laporans.status', '=', 'terima') // Filter status laporans yang "terima"
    // ->groupBy('proyeks.kecamatan') // Group berdasarkan kecamatan
    // ->get()
    // ->pluck('total', 'kecamatan') // Pluck hasilnya dengan kecamatan sebagai key
    // ->toArray();


    //     $data = [
    //         'jumlah_proyek' => $proyek,
    //         'release_proyek' => $proyek_released,
    //         'data_mitra' => $mitra_data,
    //         'dana_mitra' => $dana_mitra,
    
    //     ];

    $user = auth()->user();
    $laporan = Laporan::with(['proyek'])->get();



            foreach ($laporan as $item) {

        $releaseDate = $item->created_at; 
       
            $carbonDate = Carbon::parse($releaseDate);
        
            $item->releaseMonth = $carbonDate->format('F'); // Full month name
            $item->releaseDay = $carbonDate->format('d');   // Day of the month
            $item->releaseYear = $carbonDate->format('Y');   // Day of the month
        }




    
        $pdf = PDF::loadView('pdf.report_pdf', compact('laporan'));
        return $pdf->download('reports.pdf');
    }
    public function proyekPdf()
    {
        $proyek = Proyek::all();



        foreach ($proyek as $item) {
            $item->id_user = json_decode($item->id_user);

            $firstDate = $item->tanggal_mulai;
            $lastDate = $item->tanggal_akhir; // Replace with your actual date field name
            $releaseDate = $item->tanggal_terbit; // Replace with your actual date field name
             // Replace with your actual date field name
            if($releaseDate === null)
            {
                $item->releaseMonth = '-'; // Full month name
                $item->releaseDay = '-';   // Day of the month
                $item->releaseYear = '-';   // Day of the month
            }
            else{
                $carbonDate = Carbon::parse($releaseDate);
            
                $item->releaseMonth = $carbonDate->format('F'); // Full month name
                $item->releaseDay = $carbonDate->format('d');   // Day of the month
                $item->releaseYear = $carbonDate->format('Y');   // Day of the month
                if($item->id_user === null){
                    $item->jumlah_mitra = 0;
    
                }else{
                    $item->jumlah_mitra = count($item->id_user);
    
                }
            }
            $firstDate = Carbon::parse($firstDate);
            $lastDate = Carbon::parse($lastDate);
            
            $item->firstMonth = $firstDate->format('F'); // Full month name
            $item->firstDay = $firstDate->format('d');   // Day of the month
            $item->firstYear = $firstDate->format('Y');   // Day of the month

            $item->lastMonth = $lastDate->format('F'); // Full month name
            $item->lastDay = $lastDate->format('d');   // Day of the month
            $item->lastYear = $lastDate->format('Y');   // Day of the month

           
        }




    $pdf = PDF::loadView('pdf.project_pdf', compact('proyek'));
    return $pdf->download('projects.pdf');
    }

    public function stats()
    
    {


        $proyek = Proyek::count();
        $proyek_released = Proyek::where('status', 'terbit')->count();
        $mitra_data = User::where('level', 'mitra')->count();
        $dana_mitra = Laporan::where('status', 'terima')->sum('realisasi');

        $data_realisasi = DB::table('sektors')
            ->leftJoin('laporans', function ($join) {
                $join->on('sektors.id', '=', 'laporans.id_sektor')
                     ->where('laporans.status', '=', 'terima');
            })
            ->select('sektors.nama_sektor', DB::raw('SUM(laporans.realisasi) as total'))
            ->groupBy('sektors.nama_sektor')
            ->get()
            ->pluck('total', 'nama_sektor')
            ->toArray();
         

            $data_pt = DB::table('laporans')
            ->leftJoin('identities', 'laporans.id_user', '=', 'identities.id_user') // Join with identities table
            ->select(
                'identities.nama_pt', // Select the name from identities
                DB::raw('SUM(laporans.realisasi) as total') // Sum the realisasi field
            )
            ->where('laporans.status', '=', 'terima') // Filter where status is 'terima'
            ->groupBy('identities.nama_pt') // Group by identities.name
            ->get()
            ->pluck('total', 'nama_pt') // Pluck the results with name as the key
            ->toArray();

            $data_kecamatan = DB::table('laporans')
    ->leftJoin('proyeks', 'laporans.id_proyek', '=', 'proyeks.id') // Join dengan tabel proyeks
    ->select(
        'proyeks.kecamatan', // Ambil nama kecamatan dari tabel proyeks
        DB::raw('SUM(laporans.realisasi) as total') // Sum kolom realisasi dari tabel laporans
    )
    ->where('laporans.status', '=', 'terima') // Filter status laporans yang "terima"
    ->groupBy('proyeks.kecamatan') // Group berdasarkan kecamatan
    ->get()
    ->pluck('total', 'kecamatan') // Pluck hasilnya dengan kecamatan sebagai key
    ->toArray();
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










        return view('publik.publik-statistik.index', compact('data','data_realisasi','data_pt','data_kecamatan'));
    }

    public function about()
    
    {

   
        $laporan = Laporan::where('status', 'terima')
        ->orderBy('id', 'desc')
        ->get();
                foreach ($laporan as $item) {
                $user = User::with('identity')->find($item['id_user']);

                    $item->user = $user->identity->nama_pt;
                    $item->logo = $user->identity->mitra_logo;
                   
                }
           

        return view('publik.publik-tentang.index', compact('laporan',));
    }
    public function statPDF(Request $request)
{
    $chartImage = $request->input('chartImage');

    $pdf = \PDF::loadView('pdf.stats', ['chartImage' => $chartImage]);
    return $pdf->download('stats.pdf');
}

}
