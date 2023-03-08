<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function print(Request $request)
    {
        $tgl = $request->input('tgl');
        $bataswaktu = $request->input('batas_waktu');

        $transaksi = Transaksi::whereBetween('tgl', [$tgl, $bataswaktu])->get();

        return view('admin.laporan.cetak', [
            'transaksi' => $transaksi,
            'tgl' => $tgl,
            'batas_waktu' => $bataswaktu,
        ]);
    }
}
