<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use PHPUnit\Framework\OutputError;

class OutletController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')) {
            $outlet = Outlet::where('nama_outlet','LIKE','%'.$request->search.'%')->paginate();
        } else {
            $outlet = Outlet::all();
        }

        return view('admin.data-o.outlet', compact('outlet'));
    }

    public function create()
    {
        return view('admin.data-o.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_outlet' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);

        Outlet::create($request->all());
        return redirect()->route('outlet')->with('success', 'Data outlet berhasil ditambahkan.');
    }

    public function show($id)
    {
        $outlet = Outlet::find($id);
        return view('admin.data-o.edit', compact('outlet'));
    }

    public function update(Request $request, $id)
    {
        $outlet = Outlet::find($id);
        $outlet->update($request->all());

        return redirect()->route('outlet')->with('success', 'Data outlet berhasil diubah.');
    }

    public function destroy(Request $request, $id)
    {
        $outlet = Outlet::find($id)->delete();
        return redirect()->route('outlet')->with('success', 'Data outlet berhasil dihapus');
    }
}
