<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;


class PelangganController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')) {
            $pelanggan = Pelanggan::where('nama','LIKE','%'.$request->search.'%')->paginate();
        } else  {
            $pelanggan = Pelanggan::all();
        }

        return view('admin.data-pel.pelanggan', compact('pelanggan'));
    }

    public function create()
    {
        return view('admin.data-pel.tambah');
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
        return redirect()->route('pelanggan')->with('success', 'Member Data Add Successfully');
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);
        return view('admin.data-pel.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_tlp' => 'required'
        ]);

        $pelanggan = Pelanggan::find($id);
        $pelanggan->update($request->all());

        return redirect()->route('pelanggan')->with('success', 'Member Data Successfully Changed');
    }

    public function destroy(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id)->delete();

        return redirect()->route('pelanggan')->with('success', 'Member Data Has Been Successfully Delete');
    }
}
