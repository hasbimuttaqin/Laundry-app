<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')) {
            $paket = Paket::where('nama_paket','LIKE', '%'.$request->search.'%')->with('outlets')->paginate();
        } else {
            $paket = Paket::with('outlets')->get();
        }

        return view('admin.data-paket.paket', compact('paket'));
    }

    public function create()
    {
        $outlet = Outlet::all();
        return view('admin.data-paket.tambah', compact('outlet'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_outlet' => 'required',
            'nama_paket' => 'required',
            'jenis' => 'required',
            'harga' => 'required'
        ]);

        Paket::create($request->all());

        return redirect()->route('paket')->with('success', 'Data paket berhasil ditambahkan.');
    }

    public function show($id)
    {
        $outlet = Outlet::all();
        $paket = Paket::find($id);

        return view('admin.data-paket.edit', compact('paket', 'outlet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_paket' => 'required',
            'jenis' => 'required',
            'harga' => 'required'
        ]);

       $paket = Paket::find($id);
       $paket->update($request->all());

       return redirect()->route('paket')->with('success', 'Data paket berhasil diubah.');
    }

    public function destroy(Request $request, $id)
    {
        $paket = Paket::find($id)->delete();
        return redirect()->route('paket')->with('success', 'Data paket berhasil dihapus');
    }
}
