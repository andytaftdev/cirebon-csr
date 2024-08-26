<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;




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
        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc')->get();
        }
     

        return view ('identity.index', compact('identity','user','notification'));

    }
    public function mitra()
    {
        $user = auth()->user();
        $identity = Identity::where('id_user', $user->id)->orderBy('id')->first();
        $mitra = Identity::whereHas('user', function ($query) {
            $query->where('level', 'mitra');
        })->paginate(5); // Menambahkan pagination dengan 10 data per halaman
        $notification = Notification::where('id_user', $user->id)->orderBy('id', 'desc')->get();
        
        return view('mitra.index', compact('identity', 'user', 'notification', 'mitra'));
        
    }
    public function detailMitra($id)
    {
        $user = auth()->user();
        $identity = Identity::find($id);

        $notification = Notification::where('id_user', $user->id)->orderBy('id', 'desc')->get();
        
        return view('mitra.detail', compact('identity', 'user', 'notification'));
        
    }
    public function ubahMitra($id)
    {
        $user = auth()->user();
        $identity = Identity::find($id);

        $notification = Notification::where('id_user', $user->id)->orderBy('id', 'desc')->get();
        
        return view('mitra.change', compact('identity', 'user', 'notification'));
        
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
        

        return view('mitra.create', compact('identity', 'user', 'notification'));

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
        }
        

        if ($validasi->fails()) 
        {
            return back()->withErrors($validasi)->withInput();
        }





        $notifikasi =[

          'judul' => $request->nama_mitra ,
          'deskripsi' => $request->nama_pt,
          'level' => 'mitra',
          'access' => 'admin',

        ];
        $user->profile_status = 1; 
        $user->email = $request->email; 

        $user->save();
        $input = $request->except(['email', $request->id_user]);

        Identity::create($input);
        Notification::create($notifikasi);
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
        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc')->get();
        }
        return view('identity.change', compact('identity', 'notification'));

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
