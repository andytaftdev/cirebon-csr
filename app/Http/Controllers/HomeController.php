<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use App\Models\Identity;
use Illuminate\Support\Facades\Log;
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





        $identity =  Identity::where('id_user', $user->id)->orderBy('id')->first();

        if ($user->level === 'admin')
        {
            $notification =  Notification::orderBy('id', 'desc')->get();
        }else
        {
            $notification =  Notification::where('id_user', $user->id)->orderBy('id', 'desc')->get();
        }



        return view('dashboard', compact('user', 'notification', 'identity'));
    }
}
