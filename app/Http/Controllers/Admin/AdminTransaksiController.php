<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('admin.transaksi.index', compact('transaksi'));
    }
}
