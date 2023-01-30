<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesanan;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPesananController extends Controller
{
    public function index()
    {
        $pesanan = Transaksi::with('pesanan')->where('status', 'settlement')->get();
        
        return view('admin.pesanan.index', compact('pesanan'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('uuid', $id)->first();

        $keranjang = Keranjang::where('id_pesanan', $pesanan->id_pesanan)->get();

        return view('admin.pesanan.detail', compact('keranjang'));
    }

    public function resi(Request $request)
    {
        $pesanan = Pesanan::find($request->id);
        $pesanan->status = 'send';
        $pesanan->resi = $request->resi;
        $pesanan->save();
        return redirect()->route('admin.pesanan');
    }
}
