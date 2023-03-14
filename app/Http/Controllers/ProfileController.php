<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request)
    {


        $validatedData = $request->validate([
            'photo' => 'required',

           ]);

           $name = $request->file('photo')->getClientOriginalName();

           $path = $request->file('photo')->store('public/images');

           $user = User::find(Auth::id());
           $user->photo = $name;
           $user->save();

           return redirect('profile')->with('success', 'Foto Telah Diubah');
    }


}
