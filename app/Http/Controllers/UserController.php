<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')) {
            $user = User::where('nama','LIKE','%'.$request->search.'%')->paginate();
        } else {
            $user = User::all();
        }

        return view('admin.data-user.index', compact('user'));
    }

    public function create()
    {
        return view('admin.data-user.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required||unique:users',
            'role' => 'required',
            'password' => 'required'
        ]);

        $request['password'] = Hash::make($request->password);

        User::create($request->all());
        return redirect()->route('user')->with('success', 'User Data Add Successfully');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.data-user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'role' => 'required'
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('user')->with('success', 'User Data Successfully Changed');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('user')->with('success', 'User Data Has Been Successfully Deleted');
    }
}
