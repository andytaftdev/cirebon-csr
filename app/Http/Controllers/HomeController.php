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

    
    public function index()
    
    {


        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
        $laporan = Laporan::with(['proyek'])->paginate(5);

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
        $sektor = Sektor::all();
        $mitra = User::where('level', 'mitra')
    ->whereNotNull('email_verified_at')
    ->get();





        return view('dashboard', compact('user', 'notification', 'identity','laporan','data','data_realisasi','data_pt','data_kecamatan','jumlahNotifikasi','mitra','sektor'));
    }
    public function filterStat(Request $request)
    {
        $year = $request->input('year', date('Y')); // Default to current year
        $quarter = $request->input('kuartal'); // Quarter filter
        $sector = $request->input('sektor'); // Sector filter
        $partner = $request->input('mitra'); // Partner filter

        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
        $laporan = Laporan::with(['proyek'])->paginate(10);


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
        $sektor = Sektor::all();
        $mitra = User::where('level', 'mitra')
    ->whereNotNull('email_verified_at')
    ->get();

    
        // Convert quarter to months if provided
        $months = [];
        if ($quarter == '1') {
            $months = [1, 2, 3];
        }elseif($quarter == '2')
        {
            $months = [4, 5, 6];
        }elseif($quarter == '3')
        {
            $months = [7, 8, 9];
        }elseif($quarter == '4')
        {
            $months = [10, 11, 12];
        }

                  // Query for proyek count
    $proyek = Proyek::when($year, function ($query) use ($year) {
        return $query->whereYear('created_at', $year);
    })
    ->when($months, function ($query) use ($months) {
        return $query->whereIn(DB::raw('MONTH(created_at)'), $months);
    })
    ->when($sector, function ($query) use ($sector) {
        if($sector === 'semua'){
        return $query->get();

        }else{
            return $query->where('id_sektor', $sector);

        }
    })
    ->count();

// Query for released proyek count
$proyek_released = Proyek::when($year, function ($query) use ($year) {
        return $query->whereYear('created_at', $year);
    })
    ->when($months, function ($query) use ($months) {
        return $query->whereIn(DB::raw('MONTH(created_at)'), $months);
    })
    ->when($sector, function ($query) use ($sector) {
        if($sector === 'semua'){
            return $query;
    
            }else{
                return $query->where('id_sektor', $sector);
    
            }
        
    })
    ->where('status', 'terbit')
    ->count();

// Query for mitra data
$mitra_data = User::where('level', 'mitra')
    ->when($year, function ($query) use ($year) {
        return $query->whereYear('created_at', $year);
    })
    ->when($months, function ($query) use ($months) {
        return $query->whereIn(DB::raw('MONTH(created_at)'), $months);
    })
    ->count();



// Query for dana mitra (sum of 'realisasi' field)
$dana_mitra = Laporan::when($year, function ($query) use ($year) {
        return $query->whereYear('created_at', $year);
    })
    ->when($months, function ($query) use ($months) {
        return $query->whereIn(DB::raw('MONTH(created_at)'), $months);
    })
    ->when($sector, function ($query) use ($sector) {
        if($sector === 'semua'){
            return $query;
    
            }else{
                return $query->where('id_sektor', $sector);
    
            }
    })
    ->when($partner, function ($query) use ($partner) {
        if($partner === 'semua'){
            return $query;
    
            }else{
                return $query->where('id_user', $partner);
            }
    })
    ->where('status', 'terima')
    ->sum('realisasi');



    

    
        // Query for sektors
        $data_realisasi = DB::table('sektors')
            ->leftJoin('laporans', function ($join) use ($year, $months, $sector, $partner) {
                $join->on('sektors.id', '=', 'laporans.id_sektor')
                     ->where('laporans.status', '=', 'terima');
                     
                if ($year) {
                    $join->whereYear('laporans.created_at', $year);
                }
    
                if ($months) {
                    $join->whereIn(DB::raw('MONTH(laporans.created_at)'), $months);
                }
    
                if ($sector) {
                    if($sector === 'semua'){
                         $join;
                
                        }else{
                            $join->where('laporans.id_user', '=', $partner);

                        }
                }
    
                if ($partner) {
                    if($partner === 'semua'){
                         $join;
                
                        }else{
                            $join->where('laporans.id_user', '=', $partner);

                        }
                    
                }
            })
            ->select('sektors.nama_sektor', DB::raw('COALESCE(SUM(laporans.realisasi), 0) as total'))
            ->groupBy('sektors.nama_sektor')
            ->get()
            ->pluck('total', 'nama_sektor')
            ->toArray();
            
    
        // Query for partners
        $data_pt = DB::table('laporans')
            ->leftJoin('identities', 'laporans.id_user', '=', 'identities.id_user')
            ->select(
                'identities.nama_pt',
                DB::raw('SUM(laporans.realisasi) as total')
            )
            ->where('laporans.status', '=', 'terima')
            ->when($year, function ($query) use ($year) {
                $query->whereYear('laporans.created_at', $year);
            })
            ->when($months, function ($query) use ($months) {
                $query->whereIn(DB::raw('MONTH(laporans.created_at)'), $months);
            })
            ->when($sector, function ($query) use ($sector) {
                if($sector === 'semua'){
                     $query;
            
                    }else{
                       return $query->where('laporans.id_sektor', $sector);

                    }
            })
            ->when($partner, function ($query) use ($partner) {
                if($partner === 'semua'){
                     $query;
            
                    }else{
                      return  $query->where('laporans.id_user', $partner);
                    }
            })
            ->groupBy('identities.nama_pt')
            ->get()
            ->pluck('total', 'nama_pt')
            ->toArray();

    
        // Query for kecamatan
        $data_kecamatan = DB::table('laporans')
            ->leftJoin('proyeks', 'laporans.id_proyek', '=', 'proyeks.id')
            ->select(
                'proyeks.kecamatan',
                DB::raw('SUM(laporans.realisasi) as total')
            )
            ->where('laporans.status', '=', 'terima')
            ->when($year, function ($query) use ($year) {
                $query->whereYear('laporans.created_at', $year);
            })
            ->when($months, function ($query) use ($months) {
                $query->whereIn(DB::raw('MONTH(laporans.created_at)'), $months);
            })
            ->when($sector, function ($query) use ($sector) {
                if($sector === 'semua'){
                    $query;
           
                   }else{
                       $query->where('laporans.id_sektor', $sector);

                   }
            })
            ->when($partner, function ($query) use ($partner) {
                if($partner === 'semua'){
                    $query;
           
                   }else{
                       $query->where('laporans.id_sektor', $partner);

                   }
            })
            ->groupBy('proyeks.kecamatan')
            ->get()
            ->pluck('total', 'kecamatan')
            ->toArray();


            $data = [
                'jumlah_proyek' => $proyek,
                'release_proyek' => $proyek_released,
                'data_mitra' => $mitra_data,
                'dana_mitra' => $dana_mitra,
            ];

            return view('/dashboard', compact('user', 'notification', 'identity','laporan','data','data_realisasi','data_pt','data_kecamatan','jumlahNotifikasi','mitra','sektor'));


    }
    public function filterPublicStat(Request $request)
    {
        $year = $request->input('year', date('Y')); // Default to current year
        $quarter = $request->input('kuartal'); // Quarter filter
        $sector = $request->input('sektor'); // Sector filter
        $partner = $request->input('mitra'); // Partner filter

        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
        $laporan = Laporan::with(['proyek'])->paginate(10);


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
        $sektor = Sektor::all();
        $mitra = User::where('level', 'mitra')
    ->whereNotNull('email_verified_at')
    ->get();

    
        // Convert quarter to months if provided
        $months = [];
        if ($quarter == '1') {
            $months = [1, 2, 3];
        }elseif($quarter == '2')
        {
            $months = [4, 5, 6];
        }elseif($quarter == '3')
        {
            $months = [7, 8, 9];
        }elseif($quarter == '4')
        {
            $months = [10, 11, 12];
        }

                  // Query for proyek count
    $proyek = Proyek::when($year, function ($query) use ($year) {
        return $query->whereYear('created_at', $year);
    })
    ->when($months, function ($query) use ($months) {
        return $query->whereIn(DB::raw('MONTH(created_at)'), $months);
    })
    ->when($sector, function ($query) use ($sector) {
        if($sector === 'semua'){
        return $query->get();

        }else{
            return $query->where('id_sektor', $sector);

        }
    })
    ->count();

// Query for released proyek count
$proyek_released = Proyek::when($year, function ($query) use ($year) {
        return $query->whereYear('created_at', $year);
    })
    ->when($months, function ($query) use ($months) {
        return $query->whereIn(DB::raw('MONTH(created_at)'), $months);
    })
    ->when($sector, function ($query) use ($sector) {
        if($sector === 'semua'){
            return $query;
    
            }else{
                return $query->where('id_sektor', $sector);
    
            }
        
    })
    ->where('status', 'terbit')
    ->count();

// Query for mitra data
$mitra_data = User::where('level', 'mitra')
    ->when($year, function ($query) use ($year) {
        return $query->whereYear('created_at', $year);
    })
    ->when($months, function ($query) use ($months) {
        return $query->whereIn(DB::raw('MONTH(created_at)'), $months);
    })
    ->count();



// Query for dana mitra (sum of 'realisasi' field)
$dana_mitra = Laporan::when($year, function ($query) use ($year) {
        return $query->whereYear('created_at', $year);
    })
    ->when($months, function ($query) use ($months) {
        return $query->whereIn(DB::raw('MONTH(created_at)'), $months);
    })
    ->when($sector, function ($query) use ($sector) {
        if($sector === 'semua'){
            return $query;
    
            }else{
                return $query->where('id_sektor', $sector);
    
            }
    })
    ->when($partner, function ($query) use ($partner) {
        if($partner === 'semua'){
            return $query;
    
            }else{
                return $query->where('id_user', $partner);
            }
    })
    ->where('status', 'terima')
    ->sum('realisasi');



    

    
        // Query for sektors
        $data_realisasi = DB::table('sektors')
            ->leftJoin('laporans', function ($join) use ($year, $months, $sector, $partner) {
                $join->on('sektors.id', '=', 'laporans.id_sektor')
                     ->where('laporans.status', '=', 'terima');
                     
                if ($year) {
                    $join->whereYear('laporans.created_at', $year);
                }
    
                if ($months) {
                    $join->whereIn(DB::raw('MONTH(laporans.created_at)'), $months);
                }
    
                if ($sector) {
                    if($sector === 'semua'){
                         $join;
                
                        }else{
                            $join->where('laporans.id_user', '=', $partner);

                        }
                }
    
                if ($partner) {
                    if($partner === 'semua'){
                         $join;
                
                        }else{
                            $join->where('laporans.id_user', '=', $partner);

                        }
                    
                }
            })
            ->select('sektors.nama_sektor', DB::raw('COALESCE(SUM(laporans.realisasi), 0) as total'))
            ->groupBy('sektors.nama_sektor')
            ->get()
            ->pluck('total', 'nama_sektor')
            ->toArray();
            
    
        // Query for partners
        $data_pt = DB::table('laporans')
            ->leftJoin('identities', 'laporans.id_user', '=', 'identities.id_user')
            ->select(
                'identities.nama_pt',
                DB::raw('SUM(laporans.realisasi) as total')
            )
            ->where('laporans.status', '=', 'terima')
            ->when($year, function ($query) use ($year) {
                $query->whereYear('laporans.created_at', $year);
            })
            ->when($months, function ($query) use ($months) {
                $query->whereIn(DB::raw('MONTH(laporans.created_at)'), $months);
            })
            ->when($sector, function ($query) use ($sector) {
                if($sector === 'semua'){
                     $query;
            
                    }else{
                       return $query->where('laporans.id_sektor', $sector);

                    }
            })
            ->when($partner, function ($query) use ($partner) {
                if($partner === 'semua'){
                     $query;
            
                    }else{
                      return  $query->where('laporans.id_user', $partner);
                    }
            })
            ->groupBy('identities.nama_pt')
            ->get()
            ->pluck('total', 'nama_pt')
            ->toArray();

    
        // Query for kecamatan
        $data_kecamatan = DB::table('laporans')
            ->leftJoin('proyeks', 'laporans.id_proyek', '=', 'proyeks.id')
            ->select(
                'proyeks.kecamatan',
                DB::raw('SUM(laporans.realisasi) as total')
            )
            ->where('laporans.status', '=', 'terima')
            ->when($year, function ($query) use ($year) {
                $query->whereYear('laporans.created_at', $year);
            })
            ->when($months, function ($query) use ($months) {
                $query->whereIn(DB::raw('MONTH(laporans.created_at)'), $months);
            })
            ->when($sector, function ($query) use ($sector) {
                if($sector === 'semua'){
                    $query;
           
                   }else{
                       $query->where('laporans.id_sektor', $sector);

                   }
            })
            ->when($partner, function ($query) use ($partner) {
                if($partner === 'semua'){
                    $query;
           
                   }else{
                       $query->where('laporans.id_sektor', $partner);

                   }
            })
            ->groupBy('proyeks.kecamatan')
            ->get()
            ->pluck('total', 'kecamatan')
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

            return view('publik.publik-statistik.index', compact('laporan','data','data_realisasi','data_pt','data_kecamatan','jumlahNotifikasi','mitra','sektor'));


    }

    

    public function exportPdf()
    {
   
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
           

        return view('publik.publik-tentang.index', compact('laporan'));
    }
    public function statPDF(Request $request)
{
    $chartImage = $request->input('chartImage');

    $pdf = \PDF::loadView('pdf.stats', ['chartImage' => $chartImage]);
    return $pdf->download('stats.pdf');
}
public function publikStat(Request $request)
{
    $chartImage = $request->input('chartImage');

    $pdf = \PDF::loadView('pdf.stats', ['chartImage' => $chartImage]);
    return $pdf->download('publikStats.pdf');
}

}
