<?php

namespace App\Http\Controllers;



use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $transaksi = Transaksi::where('qty','LIKE','%'.$request->search.'%')->with('pelanggans','outlets','pakets')->paginate();
        } else {
            $transaksi = Transaksi::with('outlets','pelanggans','pakets')->get();
        }

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
            // 'kd_invoice' => 'required|unique:transaksis',
            'id_outlet' => 'required',
            'id_pelanggan' => 'required',
            'id_paket' => 'required',
            'qty' => 'required',
            // 'tgl' => 'required',
            'batas_waktu' => 'required',
            'tgl_bayar' => 'required',
            'biaya_tambahan' => 'required',
            'diskon' => 'required',
            'pajak' => 'required',
            // 'status',
            // 'dibayar',
            // 'keterangan',
        ]);

        $date = Carbon::now()->timezone('Asia/Jakarta');

        $transaksi = new Transaksi;
        // $transaksi->kd_invoice = $request->kd_invoice;
        $transaksi->id_outlet = $request->id_outlet;
        $transaksi->id_pelanggan = $request->id_pelanggan;
        $transaksi->id_paket = $request->id_paket;
        $transaksi->harga = $request->harga;
        $transaksi->qty = $request->qty;
        $transaksi->tgl = $date;
        $transaksi->batas_waktu = $request->batas_waktu;
        $transaksi->tgl_bayar = $request->tgl_bayar;
        $transaksi->biaya_tambahan = $request->biaya_tambahan;
        $transaksi->diskon = $request->diskon;
        $transaksi->pajak = $request->pajak;
        $transaksi->status = 'baru';
        $transaksi->dibayar = 'belum_bayar';

        //Hitung Harga Setelah biaya tambahan
        $hargaSetelahBiayaTambahan = $transaksi->getTotalHargaAttribute() + $transaksi->biaya_tambahan;

        //Hitung harga setelah diskon
        $hargaSetelahDiskon = $hargaSetelahBiayaTambahan - ($transaksi->diskon / 100 * $hargaSetelahBiayaTambahan);

        //Hitung jumlah  pajak
        $jumlahPajak = $hargaSetelahDiskon * ($transaksi->pajak / 100);

        //Total Harga
        $transaksi->total = $hargaSetelahDiskon + $jumlahPajak;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->save();

        return redirect()->route('transaksi')->with('success', 'Transaction Data Add Successfully');
    }

    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        $outlet = Outlet::all();
        $pelanggan = Pelanggan::all();
        $paket = Paket::all();

        return view('admin.transaksi.edit', compact('transaksi','outlet','pelanggan','paket'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'qty' => 'required',
            'tgl' => 'required',
            'batas_waktu' => 'required',
            'tgl_bayar' => 'required',
            'biaya_tambahan' => 'required',
            'diskon' => 'required',
            'pajak' => 'required',
        ]);

        $transaksi = Transaksi::find($id);
        $transaksi->update($request->all());

        //Hitung Harga Setelah biaya tambahan
        $hargaSetelahBiayaTambahan = $transaksi->getTotalHargaAttribute() + $transaksi->biaya_tambahan;

        //Hitung harga setelah diskon
        $hargaSetelahDiskon = $hargaSetelahBiayaTambahan - ($transaksi->diskon / 100 * $hargaSetelahBiayaTambahan);

        //Hitung jumlah  pajak
         $jumlahPajak = $hargaSetelahDiskon * ($transaksi->pajak / 100);

        //Total Harga
        $transaksi->total = $hargaSetelahDiskon + $jumlahPajak;
        $transaksi->save();

        return redirect()->route('transaksi')->with('success', 'Transaction Data Successfully Changed');
    }
}
