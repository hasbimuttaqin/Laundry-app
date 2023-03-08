<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('admin.registerpelanggan.index', compact('pelanggan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_tlp' => 'required'
        ]);

        Pelanggan::create($request->all());
        return redirect()->route('registerpelanggan')->with('success', 'Pelanggan Berhasil Didaftarkan');
    }
}
