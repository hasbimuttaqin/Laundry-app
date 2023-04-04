<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function edit($id)
    {
       $transaksi = Transaksi::find($id);
    //    $pelanggan = Pelanggan::all();
    //    $outlet = Outlet::all();
    //    $paket = Paket::all();

        return view('admin.transaksi.editstatus', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update($request->all());

        return redirect()->route('transaksi')->with('success', 'Transaction Status Successfully Changed');
    }
}
