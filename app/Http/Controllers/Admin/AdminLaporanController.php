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
        $pesanan = Transaksi::with('pesanan')->where('status', 'settlement')->paginate(10);
        return view('admin.laporan.pesanan', compact('pesanan'));
    }

    public function cetak_pesanan()
    {
        $pesanan = Transaksi::with('pesanan')->where('status', 'settlement')->get();
        return view('admin.laporan.cetak-pesanan', compact('pesanan'));
    }

    public function retur()
    {
        $retur = Retur::paginate(10);
        return view('admin.laporan.retur', compact('retur'));
    }

    public function cetak_retur()
    {
        $retur = Retur::all();
        return view('admin.laporan.cetak-retur', compact('retur'));
    }

    public function transaksi()
    {
        $transaksi = Transaksi::paginate(10);
        return view('admin.laporan.transaksi', compact('transaksi'));
    }

    public function cetak_transaksi()
    {
        $transaksi = Transaksi::all();
        return view('admin.laporan.cetak-transaksi', compact('transaksi'));
    }
}
