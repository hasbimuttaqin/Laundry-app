<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('outlets','pelanggans','pakets')->get();
        return view('admin.transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $outlet = Outlet::all();
        $pelanggan = Pelanggan::all();
        $paket = Paket::all();

        return view('admin.transaksi.tambah', compact('outlet', 'pelanggan', 'paket'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_invoice' => 'required|unique:transaksis',
            'id_outlet' => 'required',
            'id_pelanggan' => 'required',
            'id_paket' => 'required',
            // 'harga',
            'qty' => 'required',
            // 'tgl',
            // 'batas_waktu',
            // 'tgl_bayar',
            // 'biaya_tambahan',
            // 'diskon',
            // 'pajak',
            // 'status',
            // 'dibayar',
            // 'total',
            // 'keterangan',
        ]);

        $transaksi = new Transaksi;
        $transaksi->kd_invoice = $request->kd_invoice;
        $transaksi->id_outlet = $request->id_outlet;
        $transaksi->id_pelanggan = $request->id_pelanggan;
        $transaksi->id_paket = $request->id_paket;
        $transaksi->qty = $request->qty;
        $transaksi->tgl = $request->tgl;
        $transaksi->batas_waktu = $request->batas_waktu;
        $transaksi->tgl_bayar = $request->tgl_bayar;
        $transaksi->biaya_tambahan = $request->biaya_tambahan;
        $transaksi->diskon = $request->diskon;
        $transaksi->pajak = $request->pajak;
        $transaksi->status = 'baru';
        $transaksi->dibayar = 'belum_bayar';
        $transaksi->total = $transaksi->getTotalHargaAttribute() + $transaksi->biaya_tambahan - $transaksi->diskon + $transaksi->pajak;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->save();

        return redirect()->route('transaksi')->with('success', 'Data transaksi berhasil ditambahkan.');
    }
}
