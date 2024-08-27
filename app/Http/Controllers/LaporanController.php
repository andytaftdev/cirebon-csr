<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Identity;
use App\Models\User;
use App\Models\Sektor;
use App\Models\Program;
use App\Models\Proyek;
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


     

        return view ('laporan.index', compact('identity','user','notification','laporan'));

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
        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
            $notification->where('id_user', Auth::id());
            $notification = $notification->get();
        }

                   $sektor = Sektor::all();
                   $proyek = Proyek::all();
     

        return view ('laporan.create', compact('identity','user','notification','sektor','proyek'));
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
        $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
        $notification->where('id_user', Auth::id());
        $notification = $notification->get();

    
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

    

     
        return view ('laporan.index', compact('identity','user','notification','laporan'));
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
        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
            $notification->where('id_user', Auth::id());
            $notification = $notification->get();
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


            
                   
        return view('laporan.detail', compact('laporan', 'notification','identity','program','sektor','imgName'));
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
        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc');
            $notification->where('id_user', Auth::id());
            $notification = $notification->get();
        }
        
                   $sektor = Sektor::all();
                   $proyek = Proyek::all();
                   $laporan = Laporan::find($id);

        return view ('laporan.edit', compact('identity','user','notification','sektor','proyek','laporan'));
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
