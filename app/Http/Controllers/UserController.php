<?php
// app/Http/Controllers/CustomRegisterController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Identity;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        Notification::create([
            'id_user' => $user->id,
            'nama_pt' => $user->name,
        ]);

        // Optionally log in the user or redirect to a specific page
        auth()->login($user);

        return redirect()->route('/dashboard'); // Adjust the route as needed
    }
}
