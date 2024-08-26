<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,$id)
    {
         // Retrieve the status from the request directly
         $status = $request->input('terlihat');

         // Update all notifications for the specified user
         $user = auth()->user();;
        if ($user->level === 'admin')
        {
            $updated = Notification::where('access', 'admin')
             ->update(['terlihat' => $status]);
        }else
        {
            $updated = Notification::where('id_user', $id)
             ->update(['terlihat' => $status]);
        }
         

             $previousUrl = url()->previous();

             // Check if the previous URL contains "dashboard" or "profile"
             return redirect($request->input('current_url'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
