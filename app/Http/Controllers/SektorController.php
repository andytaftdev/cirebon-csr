<?php

namespace App\Http\Controllers;

use App\Models\Sektor;
use App\Models\User;
use App\Models\Identity;
use App\Models\Program;
use Carbon\Carbon;
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

     
        return view ('sektor.index', compact('identity','user','notification','sektor'));
    }

    public function detail($id)
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
                   $notification = Notification::orderBy('id', 'desc')->get();
        $sektor = Sektor::find($id);
        $programs = $sektor->programs;
     

        return view ('sektor.detail', compact('identity','user','notification','sektor','programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
                   $notification = Notification::orderBy('id', 'desc')->get();
     

        return view ('sektor.create', compact('identity','user','notification'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $input = $request->all();

   $request->validate([
    'nama_sektor' => 'required|string|max:255',
    'deskripsi_sektor' => 'nullable|string',
    'nama_program' => 'required|max:255',
    'deskripsi' => 'required',
]);

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



return redirect()->route('sektor.index');


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
     

        return view ('sektor.change', compact('identity','user','notification','sektor','programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sektor' => 'required|string',
            'deskripsi_sektor' => 'required|string',
            'nama_program' => 'required',
            'deskripsi' => 'required',
        ]);
    
        $input = $request->all();
    
        // Handling the image upload if a new image is provided
        if($request->hasFile('gambar_sektor')) {
            $folder = 'public/img/sektor';
            $gambar = $request->file('gambar_sektor');
            $nama_gambar = $gambar->getClientOriginalName();
            $path = $gambar->storeAs($folder, $nama_gambar);
            $input['gambar_sektor'] = $nama_gambar;
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
    

    
        return redirect()->route('sektor.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sektor $sektor)
    {
        //
    }
}
