<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use App\Models\Identity;
use App\Models\Laporan;
use App\Models\Sektor;
use App\Models\Proyek;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
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
        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
            $notification->where('id_user', Auth::id());
            $notification = $notification->get();
        }




        return view('dashboard', compact('user', 'notification', 'identity','data','data_realisasi','data_pt','data_kecamatan'));
    }
}
