<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);

        return view('admin.transaksi.editpembayaran', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update($request->all());

        return redirect()->route('transaksi')->with('success', 'Transaction Payments Successfully Changed');
    }
}
