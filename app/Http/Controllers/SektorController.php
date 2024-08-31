<?php

namespace App\Http\Controllers;

use App\Models\Sektor;
use App\Models\User;
use App\Models\Identity;
use App\Models\Proyek;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class SektorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
        
        $notification = Notification::orderBy('id', 'desc')->get();
        $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        $sektor = Sektor::withCount('programs')->paginate(5);
        foreach ($sektor as $item) {
            $item->tags = json_decode($item->tags);

            $item->deskripsi = substr($item->deskripsi, 0, 26);
        }
        
        foreach ($sektor as $item) {
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
             $sektors = Sektor::withCount('programs')->get();

     
        return view ('sektor.index', compact('identity','user','notification','sektor','jumlahNotifikasi'));
    }

    public function detail($id)
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
                   $notification = Notification::orderBy('id', 'desc')->get();
        $sektor = Sektor::find($id);
        $programs = $sektor->programs;
        $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();
     

        return view ('sektor.detail', compact('identity','user','notification','sektor','programs','jumlahNotifikasi'));
    }

    public function sektorPublik()
    {


       

        $sektor = Sektor::orderBy('id', 'desc')->get();
        foreach ($sektor as $item) {


        $program = Program::where('id_sektor', $item->id);
        $item->program = $program->count();

            

           
        }
        $proyek = Proyek::orderBy('id', 'desc')->get();
        foreach ($proyek as $item) {

            $date = $item->tanggal_akhir;
            $sektors = Sektor::find($item->id_sektor);
            $item->sektor = $sektors->nama_sektor;
            $item->alamat = 'Jl. Sunan Kalijaga No.7, Sumber, Kec. Sumber, Kabupaten Cirebon, Jawa Barat 45611';

            $carbonDate = Carbon::parse($date);
            
            $item->month = $carbonDate->format('F'); // Full month name
            $item->day = $carbonDate->format('d');   // Day of the month
            $item->year = $carbonDate->format('Y');   // Day of the month
    
    
               
            }

        
        return view('publik.publik-sektor.index', compact('sektor','proyek'));
        
    }

    public function detailSektor($id)
    {
        $sektor = Sektor::find($id);
        $sektorAll = Sektor::orderBy('id', 'desc')
        ->get();
        $program = Program::where('id_sektor', $id)->orderBy('id')->get();
        // $programs = Program::where('id_sektor', $id)->orderBy('id')->pluck('id');
            $date = $sektor->terbit; // Replace with your actual date field name

                $carbonDate = Carbon::parse($date);
                $deskripsi = $sektor->deskripsi_sektor;

                $parts = explode("\n", wordwrap($deskripsi, strlen($deskripsi) / 2, "\n"));
    
                    $sektor->deskripsi1 = isset($parts[0]) ? $parts[0] : '';
                  $sektor->deskripsi2 = isset($parts[1]) ? $parts[1] : '';  

            
                $sektor->month = $carbonDate->format('F'); // Full month name
                $sektor->day = $carbonDate->format('d');   // Day of the month
                $sektor->year = $carbonDate->format('Y');   // Day of the month

                foreach ($sektorAll as $item) {
                    $date = $item->terbit; // Replace with your actual date field name
        
                        $carbonDate = Carbon::parse($date);
                    
                        $item->month = $carbonDate->format('F'); // Full month name
                        $item->day = $carbonDate->format('d');   // Day of the month
                        $item->year = $carbonDate->format('Y');   // Day of the month
                   
                }

$programs = Program::where('id_sektor', $id)
    ->with(['proyek' => function ($query) {
        $query->orderBy('id', 'desc'); // Optional: to order proyek by ID
    }])
    ->withCount('proyek')
    ->get();





                   

           

        return view('publik.publik-sektor.detail-sektor', compact('sektor','sektorAll','programs'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
                   $notification = Notification::orderBy('id', 'desc')->get();
        $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();
     

        return view ('sektor.create', compact('identity','user','notification','jumlahNotifikasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $input = $request->all();

    $validasi = Validator::make($input, [
        'nama_sektor' => 'required|string|max:255',
        'gambar_sektor' => 'required',
        'deskripsi_sektor' => 'required',
    ]);



if ($validasi->fails()) 
{
    return back()->withErrors($validasi)->withInput();
}


// Simpan data sektor

function getQuarter(Carbon $date) {
    $month = $date->month;
    
    if ($month >= 1 && $month <= 3) {
        return 1;
    } elseif ($month >= 4 && $month <= 6) {
        return 2;
    } elseif ($month >= 7 && $month <= 9) {
        return 3;
    } else {
        return 4;
    }
}

if($request->hasFile('gambar_sektor'))
{
    $folder = 'public/img/sektor';
    $gambar = $request->file('gambar_sektor');
    $nama_gambar = $gambar->getClientOriginalName();
    $path = $request->file('gambar_sektor')->storeAs($folder, $nama_gambar);
    $input['gambar_sektor'] = $nama_gambar;
}

$sektor = new Sektor;

$sektor->nama_sektor = $input['nama_sektor'];
$sektor->deskripsi_sektor = $input['deskripsi_sektor'];
$sektor->gambar_sektor = $input['gambar_sektor'];
$date = Carbon::parse(\Carbon\Carbon::now()->format('Y-m-d'));
$quarter = getQuarter($date);
$sektor->kuartal = 'kuartal'. $quarter;


$sektor->save();

// Simpan program-program yang diinputkan
foreach ($input['nama_program'] as $index => $namaProgram) {
    $program = new Program;

    
    // Set atribut program
    $program->id_sektor = $sektor->id; // Hubungkan dengan sektor yang baru saja dibuat
    $program->nama_program = $namaProgram;
    $program->deskripsi = $input['deskripsi'][$index];
    
    // Simpan program ke database
    $program->save();
}



return redirect()->route('sektor.index')->with('success', 'Data has been successfully added!');



    }

    /**
     * Display the specified resource.
     */
    public function show(Sektor $sektor)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
                   $notification = Notification::orderBy('id', 'desc')->get();
        $sektor = Sektor::find($id);
        $programs = $sektor->programs;
        $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();
     

        return view ('sektor.change', compact('identity','user','notification','sektor','programs','jumlahNotifikasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validasi = Validator::make($input, [
            'nama_sektor' => 'required|string|max:255',
            'gambar_sektor' => 'required',
            'deskripsi_sektor' => 'required',
        ]);
        
        if ($validasi->fails()) 
        {
            return back()->withErrors($validasi)->withInput();
        }
    
    
        // Handling the image upload if a new image is provided
        if($request->hasFile('gambar_sektor')) {
            $folder = 'public/img/sektor';
            $gambar = $request->file('gambar_sektor');
            $nama_gambar = $gambar->getClientOriginalName();
            $path = $gambar->storeAs($folder, $nama_gambar);
            $input['gambar_sektor'] = $nama_gambar;
        }

        if ($validasi->fails()) 
{
    return back()->withErrors($validasi)->withInput();
}
    
        // Update the sector
        $sektor = Sektor::find($id);
        $sektor->nama_sektor = $input['nama_sektor'];
        $sektor->deskripsi_sektor = $input['deskripsi_sektor'];
    
        if(isset($input['gambar_sektor'])) {
            $sektor->gambar_sektor = $input['gambar_sektor'];
        }
        
        $sektor->save();
    
        // Handle the programs
        foreach ($input['nama_program'] as $index => $namaProgram) {
            $programId = $input['program_id'][$index] ?? null;
    
            if ($programId) {
                // Update existing program
                $program = Program::find($programId);
                $program->nama_program = $namaProgram;
                $program->deskripsi = $input['deskripsi'][$index];
                $program->save();
            } else {
                // Add new program
                Program::create([
                    'nama_program' => $namaProgram,
                    'deskripsi' => $input['deskripsi'][$index],
                    'id_sektor' => $sektor->id,
                ]);
            }
        }
    

        
        return redirect()->route('sektor.index')->with('success', 'Data has been successfully saved!');

    }
    public function search(Request $request,$status)
    {
       $user = auth()->user();
        $identity = Identity::where('id_user', $user->id)->orderBy('id')->first();
        $notification = Notification::orderBy('id', 'desc')->get();
    
        $query = Sektor::query();

        if ($status !== 'semua') {
            $query->where('status', $status);
        }
        $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->where('status' , ['baru','tolak','terima'])->count();

        if ($request->has('search') && $request->search != '') {
            $search = $request->input('search');
            $query->where('nama_sektor', 'like', '%' . $search . '%');
        }
    
        // Paginate the results
        $sektor = $query->paginate(5);
    

    
     
        return view ('sektor.index', compact('identity','user','notification','sektor','jumlahNotifikasi'));
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        


    }
}
