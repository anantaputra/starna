<?php

namespace App\Http\Controllers\User;

use App\Models\Retur;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReturController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        $retur = Retur::where('id_user', auth()->user()->id_user)->get();
        return view('user.retur', compact('retur'));
    }

    public function tambah($id)
    {
        $transaksi = Transaksi::where('uuid', $id)->first();
        $pesanan = Pesanan::find($transaksi->id_pesanan);
        return view('user.tambah-retur', compact('pesanan', 'transaksi'));
    }

    public function simpan(Request $request)
    {
        $retur = new Retur();
        $retur->id_user = auth()->user()->id_user;
        $retur->id_pesanan = $request->pesanan;
        $retur->keterangan = $request->ket;
        if($request->hasFile('bukti_resi')){
            $filename = rand() . $request->file('bukti_resi')->getClientOriginalName();
            $request->file('bukti_resi')->move(public_path() . '/upload/retur/resi', $filename );
            $retur->bukti_resi = $filename;
        }
        if($request->hasFile('foto_produk')){
            $filename = rand() . $request->file('foto_produk')->getClientOriginalName();
            $request->file('foto_produk')->move(public_path() . '/upload/retur/produk', $filename );
            $retur->bukti_produk = $filename;
        }
        $retur->save();
        return redirect()->route('user.retur');
    }
}
