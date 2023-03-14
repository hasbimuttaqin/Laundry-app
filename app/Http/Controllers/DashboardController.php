<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $outlet = Outlet::all();
        $paket = Paket::all();
        $transaksi = Transaksi::all();
        $user = User::all();

        return view('admin.dashboard', compact('pelanggan','outlet','paket','transaksi','user'));
    }
}
