<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\User;
use App\Models\Identity;
use App\Models\Sektor;
use App\Models\Program;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Notification;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();;
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
                   $notification = Notification::orderBy('id', 'desc')->get();
        $proyek = Proyek::paginate(5); // Mengambil 10 item per halaman

        $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->count();


        
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
     
        return view ('proyek.index', compact('proyek','user','notification','identity','jumlahNotifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
        $notification = Notification::orderBy('id', 'desc')->get();
        $sektor = Sektor::all();

        $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->count();


        

     

        return view ('proyek.create', compact('identity','user','notification','sektor','jumlahNotifikasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'tanggal_terbit' => null,
            'kuartal' => null,
            'status' => null,
        ]);
        $input = $request->all();
        
            




        
        $validasi = Validator::make($input, [
            'nama_proyek' => 'required|min:5|max:128|string',
            'id_program' => 'required',
            'id_sektor' => 'required',
            'kecamatan' => 'required|string',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'deskripsi' => 'required',
            'gambar_proyek' => 'required',


            
        ]);



        // Mengonversi string menjadi array

        

        if ($validasi->fails()) 
        {
            return back()->withErrors($validasi)->withInput();
        }
        if($request->hasFile('gambar_proyek')) {
            $folder = 'public/img/proyek';
            $gambarArray = $request->file('gambar_proyek');
            $namaGambarArray = []; // Array untuk menyimpan nama gambar
        
            foreach($gambarArray as $gambar) {
                $namaGambar = $gambar->getClientOriginalName();
                $path = $gambar->storeAs($folder, $namaGambar);
                $namaGambarArray[] = $namaGambar; // Simpan nama gambar ke dalam array
            }
        
            // Jika Anda ingin menyimpan semua nama gambar dalam bentuk array
            $input['gambar_proyek'] = json_encode($namaGambarArray); // Simpan dalam bentuk JSON
        }
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
        if ($request->input('status-form') === 'draf') {
            $input['tanggal_terbit'] = null;
            $input['status'] = 'draf';
            

        } elseif ($request->input('status-form') === 'terbit') {
            $today = date('Y-m-d'); 
            $input['tanggal_terbit'] = $today;
            $input['status'] = 'terbit';


        }


        if($input['tanggal_terbit'] === null)
        {
            $input['kuartal'] = null;
            
        } else
        {
            $date = Carbon::parse(\Carbon\Carbon::now()->format('Y-m-d'));
            $quarter = getQuarter($date);
            $input['kuartal'] = 'kuartal'. $quarter;

        }

        unset($input['status-form']);
        


        Proyek::create($input);
     return redirect('/proyek');
    }

    public function detailProyek($id)
    {
        $proyek = Proyek::find($id);
        $program = Program::find($proyek->id_program);
        $proyekAll = Proyek::where('status', 1)
        ->orderBy('id', 'desc')
        ->get();

        
            $startDate = $proyek->tanggal_mulai; // Replace with your actual date field name
            $endDate = $proyek->tanggal_akhir; // Replace with your actual date field name

                $carbonStartDate = Carbon::parse($startDate);
                $carbonEndDate = Carbon::parse($endDate);
                

            
                $proyek->startMonth = $carbonStartDate->format('F'); // Full month name
                $proyek->startDay = $carbonStartDate->format('d');   // Day of the month
                $proyek->startYear = $carbonStartDate->format('Y');   // Day of the month

                $proyek->endMonth = $carbonEndDate->format('F'); // Full month name
                $proyek->endDay = $carbonEndDate->format('d');   // Day of the month
                $proyek->endYear = $carbonEndDate->format('Y');   // Day of the month
                $proyek->deskripsiProgram = $program->deskripsi;   // Day of the month

                foreach ($proyekAll as $item) {
                    $date = $item->terbit; // Replace with your actual date field name
        
                        $carbonDate = Carbon::parse($date);
                    
                        $item->month = $carbonDate->format('F'); // Full month name
                        $item->day = $carbonDate->format('d');   // Day of the month
                        $item->year = $carbonDate->format('Y');   // Day of the month
                   
                }
                $userId = json_decode($proyek->id_user, true);
                

                if($userId === null)
                {
                  $idUser = null;
                }else
                {
                  $idUser = User::whereIn('id', $userId)->with('identity')->get();
                }
           

        return view('publik.publik-sektor.detail-proyek', compact('proyek','proyekAll','idUser'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
        $notification = Notification::orderBy('id', 'desc')->get();
        $proyek = Proyek::find($id);
        $imgName = json_decode($proyek->gambar_proyek);
        $sektor = Sektor::find($proyek->id_sektor);
        $program = Program::find($proyek->id_program);
        $sektorAll = Sektor::all();


        $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->count();




            $firstDate = $proyek->tanggal_mulai;
            $lastDate = $proyek->tanggal_akhir; // Replace with your actual date field name
            $releaseDate = $proyek->tanggal_terbit; // Replace with your actual date field name
             // Replace with your actual date field name
            if($releaseDate === null)
            {
                $proyek->releaseMonth = '-'; // Full month name
                $proyek->releaseDay = '-';   // Day of the month
                $proyek->releaseYear = '-';   // Day of the month
            }
            else{
                $carbonDate = Carbon::parse($releaseDate);
            
                $proyek->releaseMonth = $carbonDate->format('F'); // Full month name
                $proyek->releaseDay = $carbonDate->format('d');   // Day of the month
                $proyek->releaseYear = $carbonDate->format('Y');   // Day of the month
            }
            $firstDate = Carbon::parse($firstDate);
            $lastDate = Carbon::parse($lastDate);
            
            $proyek->firstMonth = $firstDate->format('F'); // Full month name
            $proyek->firstDay = $firstDate->format('d');   // Day of the month
            $proyek->firstYear = $firstDate->format('Y');   // Day of the month

            $proyek->lastMonth = $lastDate->format('F'); // Full month name
            $proyek->lastDay = $lastDate->format('d');   // Day of the month
            $proyek->lastYear = $lastDate->format('Y');   // Day of the month

            $deskripsi = $proyek->deskripsi;

            $parts = explode("\n", wordwrap($deskripsi, strlen($deskripsi) / 2, "\n"));

                $proyek->deskripsi1 = isset($parts[0]) ? $parts[0] : '';
              $proyek->deskripsi2 = isset($parts[1]) ? $parts[1] : '';  
              
              
              $userId = json_decode($proyek->id_user, true);

              if($userId === null)
              {
                $idUser = null;
              }else
              {
                $idUser = User::whereIn('id', $userId)->with('identity')->get();
              }
              
              
              

           

        

     

        return view ('proyek.detail', compact('identity','user','notification','proyek', 'sektor','program','idUser','imgName','sektorAll','jumlahNotifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyek $proyek)
    {
        //
    }

    public function filter(Request $request,$status)
    {
        // Mengambil data berdasarkan status
        $user = auth()->user();
        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();
                   $notification = Notification::orderBy('id', 'desc')->get();
    
        $query = Proyek::query();
    
        if ($status === 'semua') {
            // No additional filtering needed
        } elseif ($status === '1') {
            $query->where('status', 'terbit');
        } elseif ($status === '0') {
            $query->where('status', 'draf');
        }

        $jumlahNotifikasi = Notification::where('terlihat_admin', 0)->count();

        // Apply the search filter if a search term is provided
        if ($request->has('search') && $request->search != '') {
            $search = $request->input('search');
            $query->where('nama_proyek', 'like', '%' . $search . '%');
        }
        $proyek = $query->paginate(5);
    
        foreach ($proyek as $item) {
            $item->tags = json_decode($item->tags);
            $item->id_user = json_decode($item->id_user);
    
            $item->deskripsi = substr($item->deskripsi, 0, 26);
        }
        
        foreach ($proyek as $item) {
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
            }
            $firstDate = Carbon::parse($firstDate);
            $lastDate = Carbon::parse($lastDate);
            
            $item->firstMonth = $firstDate->format('F'); // Full month name
            $item->firstDay = $firstDate->format('d');   // Day of the month
            $item->firstYear = $firstDate->format('Y');   // Day of the month

            $item->lastMonth = $lastDate->format('F'); // Full month name
            $item->lastDay = $lastDate->format('d');   // Day of the month
            $item->lastYear = $lastDate->format('Y');   // Day of the month
            if($item->id_user === null){
                $item->jumlah_mitra = 0;

            }else{
                $item->jumlah_mitra = count($item->id_user);

            }

        }
     
        return view ('proyek.index', compact('identity','user','notification','proyek','jumlahNotifikasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->merge([
            'tanggal_terbit' => null,
            'kuartal' => null,
            'status' => null,
        ]);
        $input = $request->all();
        $data = Proyek::find($id);
        
            




        
        $validasi = Validator::make($input, [
            'nama_proyek' => 'required|min:5|max:128|string',
            'id_program' => 'required',
            'id_sektor' => 'required',
            'kecamatan' => 'required|string',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'deskripsi' => 'required',
            'gambar_proyek' => 'required',


            
        ]);



        // Mengonversi string menjadi array

        

        if ($validasi->fails()) 
        {
            return back()->withErrors($validasi)->withInput();
        }
        if($request->hasFile('gambar_proyek')) {
            $folder = 'public/img/proyek';
            $gambarArray = $request->file('gambar_proyek');
            $namaGambarArray = []; // Array untuk menyimpan nama gambar
        
            foreach($gambarArray as $gambar) {
                $namaGambar = $gambar->getClientOriginalName();
                $path = $gambar->storeAs($folder, $namaGambar);
                $namaGambarArray[] = $namaGambar; // Simpan nama gambar ke dalam array
            }
        
            // Jika Anda ingin menyimpan semua nama gambar dalam bentuk array
            $input['gambar_proyek'] = json_encode($namaGambarArray); // Simpan dalam bentuk JSON
        }
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
        if ($request->input('status-form') === 'draf') {
            $input['tanggal_terbit'] = null;
            $input['status'] = 'draf';
            

        } elseif ($request->input('status-form') === 'terbit') {
            $today = date('Y-m-d'); 
            $input['tanggal_terbit'] = $today;
            $input['status'] = 'terbit';


        }


        if($input['tanggal_terbit'] === null)
        {
            $input['kuartal'] = null;
            
        } else
        {
            $date = Carbon::parse(\Carbon\Carbon::now()->format('Y-m-d'));
            $quarter = getQuarter($date);
            $input['kuartal'] = 'kuartal'. $quarter;

        }

        unset($input['status-form']);
        

        $data->update($input);
     return redirect('/proyek');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Proyek::find($id);
        $data->delete();
        return redirect()->route('proyek.index')->with('delete', 'Data has been successfully deleted!');
    }
}
