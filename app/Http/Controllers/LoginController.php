<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function create(Request $request)
    {
       $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required'
       ]);

       if(Auth::attempt($credentials)) {
          $user = Auth::user();
          if($user->role == 'admin') {
            return redirect()->intended('dashboard');
          } elseif ($user->role == 'kasir') {
            return redirect()->intended('dashboard');
          } elseif ($user->role == 'owner') {
            return redirect()->intended('dashboard');
          }
       }

       throw ValidationException::withMessages([

        'username' => 'Maaf Username atau Password anda salah',
       ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
