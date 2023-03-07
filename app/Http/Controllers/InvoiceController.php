<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index($id)
    {
       $transaksi = Transaksi::find($id);
       return view('admin.invoice.index', compact('transaksi'));
    }
}
