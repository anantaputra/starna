<?php

namespace App\Http\Controllers\Admin;

use App\Models\Retur;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLaporanController extends Controller
{
    public function pesanan()
    {
        $pesanan = Transaksi::with('pesanan')->where('status', 'settlement')->get();
        return view('admin.laporan.pesanan', compact('pesanan'));
    }

    public function cetak_pesanan()
    {
        $pesanan = Transaksi::with('pesanan')->where('status', 'settlement')->get();
        return view('admin.laporan.cetak-pesanan', compact('pesanan'));
    }

    public function retur()
    {
        $retur = Retur::all();
        return view('admin.laporan.retur', compact('retur'));
    }

    public function transaksi()
    {
        $transaksi = Transaksi::all();
        return view('admin.laporan.transaksi', compact('transaksi'));
    }
}
