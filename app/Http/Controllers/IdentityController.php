<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\User;
use App\Models\laporan;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;





class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
  
        if ($user->level === 'admin')
        {
            $notification =  Notification::orderBy('id', 'desc')->get();
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc')->get();
            $jumlahNotifikasi = Notification::where('terlihat', 0)
            ->where('id_user', $user->id)
            ->count();

        }

     

        return view ('identity.index', compact('identity','user','notification','jumlahNotifikasi'));

    }
    public function mitra()
    {
        $user = auth()->user();

        $identity = Identity::where('id_user', $user->id)->orderBy('id')->first();
        $mitra = Identity::whereHas('user', function ($query) {
            $query->where('level', 'mitra');
        })->paginate(5); // Menambahkan pagination dengan 10 data per halaman
        $notification =  Notification::orderBy('id', 'desc')->get();

        if($user->level === 'mitra')
        {
            return view('errors.404');
        }


         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        return view('mitra.index', compact('identity', 'user', 'notification', 'mitra','jumlahNotifikasi'));
        
    }   
    public function search(Request $request,$status)
    {
        // Mengambil data berdasarkan status
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
                   $notification = Notification::orderBy('id', 'desc')->get();
    
        $query = Identity::query();
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();
         if($user->level === 'mitra')
         {
             return view('errors.404');
         }


    
        // Apply the search filter if a search term is provided
        if ($request->has('search') && $request->search != '') {
            $search = $request->input('search');
            $query->where('nama_mitra', 'like', '%' . $search . '%');
        }
        $level = 'mitra';
        $mitra = $query->whereHas('user', function ($query) use ($level) {
            $query->where('level', $level);
        })->paginate(5);
    


     
        return view ('mitra.index', compact('identity','user','notification','mitra','jumlahNotifikasi'));
    }
     public function mitraPublik()
    {


        $mitraIds = User::where('level', 'mitra')->pluck('id');

        $mitra = Identity::whereIn('id_user', $mitraIds)->get();


        
        return view('publik.publik-mitra.index', compact('mitra'));
        
    }
    public function mitraPublikFilter(Request $request)
    {


    $mitraIds = User::where('level', 'mitra')->pluck('id');

    $query = Identity::whereIn('identities.id_user', $mitraIds)
    ->leftJoin('laporans', 'identities.id_user', '=', 'laporans.id_user')
    ->select(
        'identities.id', 
        'identities.id_user', 
        'identities.nama_pt', 
        'identities.mitra_logo',
        'identities.nama_mitra',
        'identities.nomor_hp',
        'identities.alamat',
        'identities.deskripsi',
        DB::raw('COUNT(laporans.id) as total_laporan') // Count the total number of laporans
    )
    ->groupBy(
        'identities.id',
        'identities.id_user', 
        'identities.nama_pt', 
        'identities.mitra_logo',
        'identities.nama_mitra',
        'identities.nomor_hp',
        'identities.alamat',
        'identities.deskripsi'
    );

if ($search = $request->input('search')) {
    $query->where('identities.nama_pt', 'like', '%' . $search . '%');
}

if ($order = $request->input('order')) {
    $query->orderBy('total_laporan', $order);
}

$mitra = $query->get();


    return view('publik.publik-mitra.index', compact('mitra'));
        
    }
    public function mitraDetail($id)
    {


        $mitra = Identity::find($id);
        $user = User::find($mitra->id_user);
        $laporan = Laporan::where('id_user', $mitra->id_user)->get();
        $laporan = $laporan->take(3);


        return view('publik.publik-mitra.detail', compact('mitra','user','laporan'));
        
    }
    public function detailMitra($id)
    {
        $user = auth()->user();
        $identity = Identity::find($id);
        if($user->level === 'mitra')
        {
            return view('errors.404');
        }

        $notification = Notification::where('id_user', $user->id)->orderBy('id', 'desc')->get();
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();
        
        return view('mitra.detail', compact('identity', 'user', 'notification','jumlahNotifikasi'));
        
    }
    public function ubahMitra($id)
    {
        $user = auth()->user();
        $identity = Identity::find($id);
        if($user->level === 'mitra')
        {
            return view('errors.404');
        }

        $notification = Notification::where('id_user', $user->id)->orderBy('id', 'desc')->get();
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();
        
        return view('mitra.change', compact('identity', 'user', 'notification','jumlahNotifikasi'));
        
    }
    public function updateMitra(Request $request,$id)
    {
        $input = $request->all();
        $data = identity::find($id);
        
        $user = User::find($data->id_user);

        $level = $user->level;




        
        if ($level === 'admin'){
            $validasi = Validator::make($input, [
                'nama_mitra' => 'required|min:5|max:128|string',
                'deskripsi' => 'required',
            ]);
        }
        if ($level === 'mitra'){
            $validasi = Validator::make($input, [
                'nama_mitra' => 'required|min:5|max:128|string',
                'deskripsi' => 'required|min:24|max:512|',
                'nama_pt' => 'required|min:5|max:128|string',
                'nomor_hp' => 'required|min:10|max:16|string',
                'alamat' => 'required|min:16|max:256|string',
                
            ]);
        }
        
        if ($validasi->fails()) 
        {
            return back()->withErrors($validasi)->withInput();
        }



        $user->email = $request->email; 
        $user->save();
        $input = $request->except(['email', $request->id_user]);


        if($request->hasFile('mitra_logo'))
        {
            $folder = 'public/img/profile';
            $gambar = $request->file('mitra_logo');
            $nama_gambar = $gambar->getClientOriginalName();
            $path = $request->file('mitra_logo')->storeAs($folder, $nama_gambar);
            $input['mitra_logo'] = $nama_gambar;
        }
        $data->update($input);
        
        return redirect('/mitra');
        
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $identity = Identity::where('id_user', $user->id)->orderBy('id')->first();
        $notification = Notification::where('id_user', $user->id)->orderBy('id', 'desc')->get();
        if ($user->level === 'admin')
        {
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        }else
        {
          return view('errors.404');
        }

        

        return view('mitra.create', compact('identity', 'user', 'notification','jumlahNotifikasi'));

    }
    public function register(Request $request)
    {
        $user = auth()->user();
        $identity = Identity::where('id_user', $user->id)->orderBy('id')->first();
        $notification = Notification::where('id_user', $user->id)->orderBy('id', 'desc')->get();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        


        event(new Registered($user));
        

        return redirect('/mitra');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $user = User::find($request->id_user);
        $level = $user->level;



        
        if ($level === 'admin'){
            $validasi = Validator::make($input, [
                'nama_mitra' => 'required|min:5|max:128|string',
                'deskripsi' => 'required',
            ]);
        }
        if ($level === 'mitra'){
            $validasi = Validator::make($input, [
                'nama_mitra' => 'required|min:5|max:128|string',
                'deskripsi' => 'required|min:24|max:512|',
                'nama_pt' => 'required|min:5|max:128|string',
                'nomor_hp' => 'required|min:10|max:16|string',
                'alamat' => 'required|min:16|max:256|string',
                
            ]);

        $notifikasi =[

            'judul' => $request->nama_mitra ,
            'deskripsi' => $request->nama_pt,
            'level' => 'mitra',
            'access' => 'admin',
  
          ];

        Notification::create($notifikasi);

        }
        

        if ($validasi->fails()) 
        {
            return back()->withErrors($validasi)->withInput();
        }





        $user->profile_status = 1; 
        $user->email = $request->email; 

        $user->save();
        $input = $request->except(['email', $request->id_user]);

        Identity::create($input);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $identity = Identity::find($id);
        $user = auth()->user();;
  
        if ($user->level === 'admin')
        {
            $notification =  Notification::orderBy('id', 'desc')->get();
         $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc')->get();
        $jumlahNotifikasi = Notification::where('terlihat', 0)->count();
        return view('errors.404');
        }



        return view('identity.change', compact('identity', 'notification','jumlahNotifikasi'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Identity $identity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = User::find($request->id_user);
        $data = identity::find($id);
        $level = $user->level;


        
        if ($level === 'admin'){
            $validasi = Validator::make($input, [
                'nama_mitra' => 'required|min:5|max:128|string',
                'deskripsi' => 'required',
            ]);
        }
        if ($level === 'mitra'){
            $validasi = Validator::make($input, [
                'nama_mitra' => 'required|min:5|max:128|string',
                'deskripsi' => 'required|min:24|max:512|',
                'nama_pt' => 'required|min:5|max:128|string',
                'nomor_hp' => 'required|min:10|max:16|string',
                'alamat' => 'required|min:16|max:256|string',
                
            ]);
        }
        
        if ($validasi->fails()) 
        {
            return back()->withErrors($validasi)->withInput();
        }



        $user->email = $request->email; 
        $user->save();
        $input = $request->except(['email', $request->id_user]);


        if($request->hasFile('mitra_logo'))
        {
            $folder = 'public/img/profile';
            $gambar = $request->file('mitra_logo');
            $nama_gambar = $gambar->getClientOriginalName();
            $path = $request->file('mitra_logo')->storeAs($folder, $nama_gambar);
            $input['mitra_logo'] = $nama_gambar;
        }
        $data->update($input);
        
        return redirect('/identity');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Identity $identity)
    {
        //
    }
}
