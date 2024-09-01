<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Identity;
use App\Models\User;
use App\Models\Sektor;
use App\Models\Program;
use App\Models\Proyek;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Notification;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
        $laporan = Laporan::with(['proyek'])->paginate(5);


        if ($user->level === 'admin')
        {
            $notification =  Notification::orderBy('id', 'desc')->get();
        $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
            $notification->where('id_user', Auth::id());
            $notification = $notification->get();
            $jumlahNotifikasi = Notification::where('terlihat', 0)
            ->where('id_user', $user->id)
            ->count();

        }

                foreach ($laporan as $item) {

            $releaseDate = $item->created_at; 
           
                $carbonDate = Carbon::parse($releaseDate);
            
                $item->releaseMonth = $carbonDate->format('F'); // Full month name
                $item->releaseDay = $carbonDate->format('d');   // Day of the month
                $item->releaseYear = $carbonDate->format('Y');   // Day of the month
            }


     

        return view ('laporan.index', compact('identity','user','notification','laporan','jumlahNotifikasi'));

    }

    public function laporanSearch(Request $request)
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
        $laporan = Laporan::with(['proyek'])->when($request->has('search') && $request->search != '', function ($query) use ($request) {
            $search = $request->input('search');
            return $query->where('judul', 'like', '%' . $search . '%');
        })->paginate(5);


        if ($user->level === 'admin')
        {
            $notification =  Notification::orderBy('id', 'desc')->get();
        $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
            $notification->where('id_user', Auth::id());
            $notification = $notification->get();
            $jumlahNotifikasi = Notification::where('terlihat', 0)
            ->where('id_user', $user->id)
            ->count();

        }

                foreach ($laporan as $item) {

            $releaseDate = $item->created_at; 
           
                $carbonDate = Carbon::parse($releaseDate);
            
                $item->releaseMonth = $carbonDate->format('F'); // Full month name
                $item->releaseDay = $carbonDate->format('d');   // Day of the month
                $item->releaseYear = $carbonDate->format('Y');   // Day of the month
            }


     

        return view ('laporan.index', compact('identity','user','notification','laporan','jumlahNotifikasi'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
        

        if ($user->level === 'admin')
        {
            $notification =  Notification::orderBy('id', 'desc')->get();
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
            $notification->where('id_user', Auth::id());
            $notification = $notification->get();
        $jumlahNotifikasi = Notification::where('terlihat', 0)
        ->where('id_user', $user->id)
        ->count();

        }

                   $sektor = Sektor::all();
                   $proyek = Proyek::where('status', 'terbit')->orderBy('id')->get();
     

        return view ('laporan.create', compact('identity','user','notification','sektor','proyek','jumlahNotifikasi'));
    }

    public function laporanPublik()
    {


       
        $laporan = Laporan::where('status', 'terima')
        ->orderBy('id', 'desc')
        ->get();
        foreach ($laporan as $item) {
                $user = User::with('identity')->find($item['id_user']);

                $item->user = $user->identity->nama_pt;
                $item->logo = $user->identity->mitra_logo;

        }
        $mitra = User::where('level', 'mitra')
        ->whereNotNull('email_verified_at')
        ->get();

        
        
        return view('publik.publik-laporan.index', compact('laporan','mitra'));
        
    }

    public function laporanFilter(Request $request)
    {


        $year = $request->input('year', date('Y'));
        $quarter = $request->input('kuartal'); 

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
        
        $laporan = Laporan::when($year, function ($query) use ($year) {
            return $query->whereYear('created_at', $year);
        })
        ->when($months, function ($query) use ($months) {
            return $query->whereIn(DB::raw('MONTH(created_at)'), $months);
        })
        ->when($request->has('search') && $request->search != '', function ($query) use ($request) {
            $search = $request->input('search');
            return $query->where('judul', 'like', '%' . $search . '%');
        })
        ->paginate(5);
        

        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();


        if ($user->level === 'admin')
        {
            $notification =  Notification::orderBy('id', 'desc')->get();
        $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
            $notification->where('id_user', Auth::id());
            $notification = $notification->get();
            $jumlahNotifikasi = Notification::where('terlihat', 0)
            ->where('id_user', $user->id)
            ->count();

        }

                foreach ($laporan as $item) {

            $releaseDate = $item->created_at; 
           
                $carbonDate = Carbon::parse($releaseDate);
            
                $item->releaseMonth = $carbonDate->format('F'); // Full month name
                $item->releaseDay = $carbonDate->format('d');   // Day of the month
                $item->releaseYear = $carbonDate->format('Y');   // Day of the month
            }


     

        return view ('laporan.index', compact('identity','user','notification','laporan','jumlahNotifikasi'));
        
    }






    public function laporanPublikFilter(Request $request, $status)
    {


       
        $sortOrder = request()->get('sort', 'desc'); // Get the sorting order from the request, default is 'desc'
        $mitraFilter = request()->get('mitra'); // Get the "mitra" filter from the request
        
        $laporan = Laporan::where('status', 'terima')
        ->when($mitraFilter, function ($query) use ($mitraFilter) {
            return $query->whereHas('user.identity', function ($q) use ($mitraFilter) {
                $q->where('nama_pt', $mitraFilter);
            });
        })
        ->when($request->has('search') && $request->search != '', function ($query) use ($request) {
            $search = $request->input('search');
            return $query->where('judul', 'like', '%' . $search . '%');
        })
        ->orderBy('created_at', $sortOrder) // Use 'created_at' for sorting by date
        ->get();
        
        foreach ($laporan as $item) {
            $user = User::with('identity')->find($item['id_user']);
            $item->user = $user->identity->nama_pt;
            $item->logo = $user->identity->mitra_logo;
        }
        $mitra = User::where('level', 'mitra')
        ->whereNotNull('email_verified_at')
        ->get();

        
        return view('publik.publik-laporan.index', compact('laporan','mitra'));
        
    }


    public function detailLaporan($id)
    {
        $laporan = Laporan::find($id);

        $sektor = Sektor::find($laporan->id_sektor);
        $proyek = Proyek::find($laporan->id_proyek);
        $program = Program::where('id_sektor', $sektor->id)->orderBy('id')->first();
        $imgName = json_decode($laporan->gambar_laporan, true);
        $laporanAll = Laporan::where('status', 'terima')
        ->orderBy('id', 'desc')
        ->get();

                $user = User::with('identity')->find($laporan['id_user']);

                $laporan->user = $user->identity->nama_pt;
                $laporan->logo = $user->identity->mitra_logo;
                $laporan->nama_sektor = $sektor->nama_sektor;
                
                $laporan->nama_proyek = $program->nama_proyek;
                $laporan->kecamatan = $program->kecamatan;

                if($laporan->nama_proyek === null)
                {
                    $laporan->nama_proyek = 'Tidak memilih proyek';
                    $laporan->kecamatan = 'Tidak ada kecamatan';
                }


                foreach ($laporanAll as $item) {
                $user = User::with('identity')->find($item['id_user']);

                    $item->user = $user->identity->nama_pt;
                    $item->logo = $user->identity->mitra_logo;
                   
                }
           

        return view('publik.publik-laporan.detail', compact('laporan','laporanAll','program','imgName'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'nama_proyek' => null,
        ]);
        $input = $request->all();

        if($request->input('status') === 'draf'){
            $validasi = Validator::make($input, [
                'judul' => 'required|min:5|max:128|string', 
            ]);
        }  else
        {
            $validasi = Validator::make($input, [
                'judul' => 'required|min:5|max:128|string',
                'id_user' => 'required',
                'id_sektor' => 'required',
                'deskripsi' => 'required',
                'tanggal' => 'required',
                'bulan' => 'required',
                'tahun' => 'required',
                'realisasi' => 'required',
                'gambar_laporan' => 'required',
                
            ]);
        }
        


        if($request->input('id_proyek') !== null)
        {
            $id = $request->input('id_proyek');
          $proyek = Proyek::find($id);
          $input['nama_proyek'] = $proyek->nama_proyek;
          $proyek->save();

        }
        if ($validasi->fails()) 
        {
            return back()->withErrors($validasi)->withInput();
        }

        if($request->hasFile('gambar_laporan')) {
            $folder = 'public/img/laporan';
            $gambarArray = $request->file('gambar_laporan');
            $namaGambarArray = []; // Array untuk menyimpan nama gambar
        
            foreach($gambarArray as $gambar) {
                $namaGambar = $gambar->getClientOriginalName();
                $path = $gambar->storeAs($folder, $namaGambar);
                $namaGambarArray[] = $namaGambar; // Simpan nama gambar ke dalam array
            }
        
            // Jika Anda ingin menyimpan semua nama gambar dalam bentuk array
            $input['gambar_laporan'] = json_encode($namaGambarArray); // Simpan dalam bentuk JSON
        }
        $mitra = User::find($request->id_user);
        if($request->input('status') === 'pengajuan'){
            $notifikasi =[

                'id_user' => $request->id_user,
               'judul' => $request->judul ,
               'deskripsi' => 'Mitra '. $mitra->identity->nama_mitra,
               'level' => 'laporan',
               'access' => 'mitra',
     
             ];
             Notification::create($notifikasi);
        }






        Laporan::create($input);
     return redirect('/laporan');
    }


    public function status($status)
    {
        // Mengambil data berdasarkan status
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();

        if ($user->level === 'admin')
        {
            $notification =  Notification::orderBy('id', 'desc')->get();
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
            $notification->where('id_user', Auth::id());
            $notification = $notification->get();
            $jumlahNotifikasi = Notification::where('terlihat', 0)
            ->where('id_user', $user->id)
            ->count();

        }
        

    
        $query = Laporan::with(['proyek']);

    
        if ($status === 'semua') {
            // No additional filtering needed
        } elseif ($status === 'draf') {
            $query->where('status', 'draf');
        } elseif ($status === 'terima') {
            $query->where('status', 'terima');
        }elseif ($status === 'tolak') {
            $query->where('status', 'tolak');
        }elseif ($status === 'pengajuan') {
            $query->where('status', 'pengajuan');
        }elseif ($status === 'revisi') {
            $query->where('status', 'revisi');
        }
        
        $laporan = $query->paginate(5);
        
        foreach ($laporan as $item) {

            $releaseDate = $item->created_at; 
           
                $carbonDate = Carbon::parse($releaseDate);
            
                $item->releaseMonth = $carbonDate->format('F'); // Full month name
                $item->releaseDay = $carbonDate->format('d');   // Day of the month
                $item->releaseYear = $carbonDate->format('Y');   // Day of the month
            }

    

     
        return view ('laporan.index', compact('identity','user','notification','laporan','jumlahNotifikasi'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = auth()->user();;
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();

        if ($user->level === 'admin')
        {
            $notification =  Notification::orderBy('id', 'desc')->get();
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
            $notification->where('id_user', Auth::id());
            $notification = $notification->get();
            $jumlahNotifikasi = Notification::where('terlihat', 0)
            ->where('id_user', $user->id)
            ->count();

        }

        $laporan = Laporan::find($id);

        $sektor = Sektor::find($laporan->id_sektor);
        $program = Program::where('id_sektor', $sektor->id)->orderBy('id')->first();

            $releaseDate = $laporan->created_at; 
           
                $carbonDate = Carbon::parse($releaseDate);
            
                $laporan->releaseMonth = $carbonDate->format('F'); // Full month name
                $laporan->releaseDay = $carbonDate->format('d');   // Day of the month
                $laporan->releaseYear = $carbonDate->format('Y');   // Day of the month

                $imgName = json_decode($laporan->gambar_laporan, true);


            
                   
        return view('laporan.detail', compact('laporan', 'notification','identity','program','sektor','imgName','jumlahNotifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();

        if ($user->level === 'admin')
        {
            $notification =  Notification::orderBy('id', 'desc')->get();
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
            $notification->where('id_user', Auth::id());
            $notification = $notification->get();
                    $jumlahNotifikasi = Notification::where('terlihat', 0)
            ->where('id_user', $user->id)
            ->count();

        }

                   $sektor = Sektor::all();
                   $proyek = Proyek::all();
                   $laporan = Laporan::find($id);

        return view ('laporan.edit', compact('identity','user','notification','sektor','proyek','laporan','jumlahNotifikasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->merge([
            'nama_proyek' => null,
        ]);
        $input = $request->all();
        $laporan = Laporan::find($id);

        if($request->input('status') === 'draf'){
            $validasi = Validator::make($input, [
                'judul' => 'required|min:5|max:128|string', 
            ]);
        }  else
        {
            $validasi = Validator::make($input, [
                'judul' => 'required|min:5|max:128|string',
                'id_user' => 'required',
                'id_sektor' => 'required',
                'deskripsi' => 'required',
                'tanggal' => 'required',
                'bulan' => 'required',
                'tahun' => 'required',
                'realisasi' => 'required',
                'gambar_laporan' => 'required',
                
            ]);
        }
        


        if($request->input('id_proyek') !== null)
        {
            $id = $request->input('id_proyek');
          $proyek = Proyek::find($id);
          $input['nama_proyek'] = $proyek->nama_proyek;
          $proyek->save();

        }
        if ($validasi->fails()) 
        {
            return back()->withErrors($validasi)->withInput();
        }

        if($request->hasFile('gambar_laporan')) {
            $folder = 'public/img/laporan';
            $gambarArray = $request->file('gambar_laporan');
            $namaGambarArray = []; // Array untuk menyimpan nama gambar
        
            foreach($gambarArray as $gambar) {
                $namaGambar = $gambar->getClientOriginalName();
                $path = $gambar->storeAs($folder, $namaGambar);
                $namaGambarArray[] = $namaGambar; // Simpan nama gambar ke dalam array
            }
        
            // Jika Anda ingin menyimpan semua nama gambar dalam bentuk array
            $input['gambar_laporan'] = json_encode($namaGambarArray); // Simpan dalam bentuk JSON
        }
        $mitra = User::find($request->id_user);
        if($request->input('status') === 'pengajuan'){
            $notifikasi =[

                'id_user' => $request->id_user,
               'judul' => $request->judul ,
               'deskripsi' => 'Mitra '. $mitra->identity->nama_mitra,
               'level' => 'laporan',
               'access' => 'mitra',
     
             ];
             Notification::create($notifikasi);
        }






        $laporan->update($input);
     return redirect('/laporan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Laporan::find($id);
        $data->delete();
        return redirect('/laporan');
    }

    public function tolak(Request $request ,$id)
    {
        $laporan = Laporan::find($id);
        $laporan->message = $request->message;
        $laporan->status = 'tolak';
        $laporan->save();

        $notifikasi =[

            'id_user' => $laporan->id_user,
           'judul' => $laporan->judul ,
           'deskripsi' => $request->message,
           'level' => 'laporan',
           'status' => 'tolak',
           'access' => 'mitra',
 
         ];
         Notification::create($notifikasi);

        return redirect('/laporan');


    }

    public function revisi(Request $request ,$id)
    {
        $laporan = Laporan::find($id);

        $laporan->message = $request->message;
        $laporan->status = 'revisi';
        $laporan->changed = 1;
        $laporan->save();

        $notifikasi =[

            'id_user' => $laporan->id_user,
           'judul' => $laporan->judul ,
           'deskripsi' => $request->message,
           'level' => 'laporan',
           'status' => 'revisi',
           'access' => 'mitra',
 
         ];
         Notification::create($notifikasi);
        
        return redirect('/laporan');
        
    }

    public function terima(Request $request ,$id)
    {
        $laporan = Laporan::find($id);
        $laporan->status = 'terima';

        if($laporan->id_proyek !== null)
        {
            $id = $laporan->id_proyek;
            $idUser = $laporan->id_user;
          $proyek = Proyek::find($id);
          $array = $proyek->id_user;
          if (is_null($proyek->id_user)) {
            $array = [];
        } else {
            $array = json_decode($proyek->id_user, true);
        }
          $array[] = $idUser;
          $proyek->id_user = json_encode($array);
          $proyek->save();

        }

        $notifikasi =[

            'id_user' => $laporan->id_user,
           'judul' => $laporan->judul ,
           'deskripsi' => '',
           'level' => 'laporan',
           'status' => 'terima',
           'access' => 'mitra',
 
         ];
         Notification::create($notifikasi);

        $laporan->save();
        return redirect('/laporan');

    }
}
