<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Identity;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if($user->level === 'mitra')
        {
            return view('errors.404');
        }


        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
                   $notification = Notification::orderBy('id', 'desc')->get();
        $kegiatan = Kegiatan::paginate(5); // Mengambil 10 item per halaman
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        foreach ($kegiatan as $item) {
            $item->tags = json_decode($item->tags);

            $item->deskripsi = substr($item->deskripsi, 0, 26);
        }
        
        foreach ($kegiatan as $item) {
            $date = $item->terbit; // Replace with your actual date field name
            if($date === null)
            {
                $item->month = '-'; // Full month name
                $item->day = '-';   // Day of the month
                $item->year = '-';   // Day of the month
            }
            else{
                $carbonDate = Carbon::parse($date);
            
                $item->month = $carbonDate->format('F'); // Full month name
                $item->day = $carbonDate->format('d');   // Day of the month
                $item->year = $carbonDate->format('Y');   // Day of the month
            }
           
        }


     
        return view ('kegiatan.index', compact('identity','user','notification','kegiatan','jumlahNotifikasi'));

    }

    public function kegiatanPublik()
    {


       

        $kegiatan = Kegiatan::where('status', 1)
        ->orderBy('id', 'desc')
        ->get();
        foreach ($kegiatan as $item) {
            $date = $item->terbit; // Replace with your actual date field name

                $carbonDate = Carbon::parse($date);
            
                $item->month = $carbonDate->format('F'); // Full month name
                $item->day = $carbonDate->format('d');   // Day of the month
                $item->year = $carbonDate->format('Y');   // Day of the month
           
        }

        
        return view('publik.publik-kegiatan.index', compact('kegiatan'));
        
    }

    public function detailKegiatan($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatanAll = Kegiatan::where('status', 1)
        ->orderBy('id', 'desc')
        ->get();
            $date = $kegiatan->terbit; // Replace with your actual date field name

                $carbonDate = Carbon::parse($date);

            
                $kegiatan->month = $carbonDate->format('F'); // Full month name
                $kegiatan->day = $carbonDate->format('d');   // Day of the month
                $kegiatan->year = $carbonDate->format('Y');   // Day of the month

                foreach ($kegiatanAll as $item) {
                    $date = $item->terbit; // Replace with your actual date field name
        
                        $carbonDate = Carbon::parse($date);
                    
                        $item->month = $carbonDate->format('F'); // Full month name
                        $item->day = $carbonDate->format('d');   // Day of the month
                        $item->year = $carbonDate->format('Y');   // Day of the month
                   
                }
           

        return view('publik.publik-kegiatan.detail', compact('kegiatan','kegiatanAll'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $identity = Identity::find($id);
        $user = auth()->user();;
                   $notification = Notification::orderBy('id', 'desc')->get();
                   $notification->where('id_user', Auth::id());
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

         if($user->level === 'mitra')
         {
             return view('errors.404');
         }


        return view('kegiatan.create', compact('identity', 'notification','jumlahNotifikasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            $input = $request->all();
            
            $tagsData = $request->input('tags'); 

            $tags = collect(json_decode($tagsData, true))->pluck('value')->toArray();
            $input['tags'] = json_encode($tags);


    
    
            
            $validasi = Validator::make($input, [
                'judul' => 'required|min:5|max:128|string',
                'deskripsi' => 'required',
                'gambar_kegiatan' => 'required',
                
            ]);

            if($request->input('status') == 1)
            {
                $date = date('Y-m-d');
                $input['terbit'] = $date;
            }



            // Mengonversi string menjadi array

            
    
            if ($validasi->fails()) 
            {
                return back()->withErrors($validasi)->withInput();
            }
    
            if($request->hasFile('gambar_kegiatan'))
            {
                $folder = 'public/img/kegiatan';
                $gambar = $request->file('gambar_kegiatan');
                $nama_gambar = $gambar->getClientOriginalName();
                $path = $request->file('gambar_kegiatan')->storeAs($folder, $nama_gambar);
                $input['gambar_kegiatan'] = $nama_gambar;
            }
    

            Kegiatan::create($input);


            return redirect()->route('kegiatan.index')->with('success', 'Data has been successfully added!');
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {

    }

    
    public function detail(Kegiatan $kegiatan, $id)
    {

        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
        $kegiatan = Kegiatan::find($id);
        $notification =  Notification::orderBy('id', 'desc')->get();
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();
         if($user->level === 'mitra')
         {
             return view('errors.404');
         }




            $date = $kegiatan->terbit; // Replace with your actual date field name
            if($date === null)
            {
                $kegiatan->month = '-'; // Full month name
                $kegiatan->day = '-';   // Day of the month
                $kegiatan->year = '-';   // Day of the month
            }
            else{
                $carbonDate = Carbon::parse($date);
            
                $kegiatan->month = $carbonDate->format('F'); // Full month name
                $kegiatan->day = $carbonDate->format('d');   // Day of the month
                $kegiatan->year = $carbonDate->format('Y');   // Day of the month
            }
                     $deskripsi = $kegiatan->deskripsi;

                 $parts = explode("\n", wordwrap($deskripsi, strlen($deskripsi) / 2, "\n"));

                     $kegiatan->deskripsi1 = isset($parts[0]) ? $parts[0] : '';
                   $kegiatan->deskripsi2 = isset($parts[1]) ? $parts[1] : '';            

           

        return view('kegiatan.detail', compact('kegiatan','identity','notification','jumlahNotifikasi'));
    }


    public function filter(Request $request,$status)
{
   $user = auth()->user();
    $identity = Identity::where('id_user', $user->id)->orderBy('id')->first();
    $notification = Notification::orderBy('id', 'desc')->get();
     $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();
     if($user->level === 'mitra')
     {
         return view('errors.404');
     }


    $query = Kegiatan::query();

    // Apply the status filter
    if ($status !== 'semua') {
        $query->where('status', $status);
    }

    // Apply the search filter if a search term is provided
    if ($request->has('search') && $request->search != '') {
        $search = $request->input('search');
        $query->where('judul', 'like', '%' . $search . '%');
    }

    // Paginate the results
    $kegiatan = $query->paginate(5);

    // Process each Kegiatan item
    foreach ($kegiatan as $item) {
        $item->tags = json_decode($item->tags);
        $item->deskripsi = substr($item->deskripsi, 0, 26);

        $date = $item->terbit; // Replace with your actual date field name
        if ($date === null) {
            $item->month = '-';
            $item->day = '-';
            $item->year = '-';
        } else {
            $carbonDate = Carbon::parse($date);
            $item->month = $carbonDate->format('F');
            $item->day = $carbonDate->format('d');
            $item->year = $carbonDate->format('Y');
        }
    }

 
    return view ('kegiatan.index', compact('identity','user','notification','kegiatan','jumlahNotifikasi'));
}

public function kegiatanPublikFilter(Request $request, $status)
{


   
    $sortOrder = request()->get('sort', 'desc'); // Get the sorting order from the request, default is 'desc'
    $mitraFilter = request()->get('mitra'); // Get the "mitra" filter from the request
    
    $kegiatan = Kegiatan::where('status', 1)
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
    

 
    
    
    return view('publik.publik-kegiatan.index', compact('kegiatan'));
    
}



    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan, $id)
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
        $kegiatan = Kegiatan::find($id);
        $notification =  Notification::orderBy('id', 'desc')->get();
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();
         if($user->level === 'mitra')
         {
             return view('errors.404');
         }



            $date = $kegiatan->terbit; // Replace with your actual date field name
            if($date === null)
            {
                $kegiatan->month = '-'; // Full month name
                $kegiatan->day = '-';   // Day of the month
                $kegiatan->year = '-';   // Day of the month
            }
            else{
                $carbonDate = Carbon::parse($date);
            
                $kegiatan->month = $carbonDate->format('F'); // Full month name
                $kegiatan->day = $carbonDate->format('d');   // Day of the month
                $kegiatan->year = $carbonDate->format('Y');   // Day of the month
            }
                     $deskripsi = $kegiatan->deskripsi;

                 $parts = explode("\n", wordwrap($deskripsi, strlen($deskripsi) / 2, "\n"));

                     $kegiatan->deskripsi1 = isset($parts[0]) ? $parts[0] : '';
                   $kegiatan->deskripsi2 = isset($parts[1]) ? $parts[1] : '';            


           

        return view('kegiatan.change', compact('kegiatan','identity','notification','jumlahNotifikasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Kegiatan::find($id);
        $tagsData = $request->input('tags'); 

        $tags = collect(json_decode($tagsData, true))->pluck('value')->toArray();
        $input['tags'] = json_encode($tags);

        if($request->input('status') == 1)
        {
            $date = date('Y-m-d');
            $input['terbit'] = $date;
        }




        
        $validasi = Validator::make($input, [
            'judul' => 'required|min:5|max:128|string',
            'deskripsi' => 'required',
            'gambar_kegiatan' => 'required',
            
        ]);



        // Mengonversi string menjadi array

        

        if ($validasi->fails()) 
        {
            return back()->withErrors($validasi)->withInput();
        }

        if($request->hasFile('gambar_kegiatan'))
        {
            $folder = 'public/img/kegiatan';
            $gambar = $request->file('gambar_kegiatan');
            $nama_gambar = $gambar->getClientOriginalName();
            $path = $request->file('gambar_kegiatan')->storeAs($folder, $nama_gambar);
            $input['gambar_kegiatan'] = $nama_gambar;
        }


        $data->update($input);

        return redirect()->route('kegiatan.index')->with('success', 'Data has been successfully saved!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Kegiatan::find($id);
        $data->delete();
        return redirect()->route('kegiatan.index')->with('delete', 'Data has been successfully deleted!');

    }
}
