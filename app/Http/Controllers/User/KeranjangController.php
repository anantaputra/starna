<?php

namespace App\Http\Controllers\User;

use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\AlamatUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\RajaOngkirController;

class KeranjangController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        $keranjang = Keranjang::where('id_user', auth()->user()->id_user)
                    ->where('checkout', false)
                    ->get();
        return view('user.keranjang', compact('keranjang'));
    }

    public function tambah(Request $request)
    {
        // cek keranjang sudah ada item
        $produk = Produk::where('uuid', $request->uuid)->first();
        $item = Keranjang::where('id_user', auth()->user()->id_user)
                ->where('checkout', false)
                ->where('id_produk', $produk->id_produk)->first();
        if($item){
            if(($request->qty + $item->jumlah) >= $produk->stok ){
                $item->jumlah = $produk->stok;
            } else {
                $item->jumlah = $item->jumlah + $request->qty;
            }
            $item->save();
        } else {
            $item = new Keranjang();
            $item->id_user = auth()->user()->id_user;
            $item->id_produk = $produk->id_produk;
            $item->jumlah = $request->qty;
            $item->save();
        }
        return redirect()->back();
    }

    public function checkout()
    {
        $alamat = AlamatUser::where('id_user', auth()->user()->id_user)
                    ->where('utama', true)
                    ->get();

        $berat = 0;
        $provinsi = RajaOngkirController::semua_provinsi();
        $keranjang = Keranjang::where('id_user', auth()->user()->id_user)
                    ->where('checkout', false)
                    ->get();
        foreach ($keranjang as $item) {
            $produk = Produk::find($item->id_produk);
            $berat += $produk->berat * $item->jumlah;
        }

        if(count($alamat) > 0){
            $jne = RajaOngkirController::get_ongkir($alamat[0]->kode_kota, 'jne', $berat);

            $pos = RajaOngkirController::get_ongkir($alamat[0]->kode_kota, 'pos', $berat);

            $tiki = RajaOngkirController::get_ongkir($alamat[0]->kode_kota, 'tiki', $berat);

            return view('pesan.pesan-sekarang', compact('keranjang', 'alamat', 'provinsi', 'jne', 'pos', 'tiki'));
        } else {
            return redirect()->route('user.alamat')->with('status', 'kosong');
        }
    }

    public function hapus($id)
    {
        $cart = Keranjang::where('uuid', $id)->first();
        $cart->delete();
        return redirect()->back();
    }

    public function add($id)
    {
        $keranjang = Keranjang::where('uuid', $id)->first();
        $produk = Produk::find($keranjang->id_produk);
        if ($produk->stok > $keranjang->jumlah) {
            $keranjang->jumlah = $keranjang->jumlah + 1;
            $keranjang->save();
        }
        return redirect()->back();
    }

    public function min($id)
    {
        $keranjang = Keranjang::where('uuid', $id)->first();
        if ($keranjang->jumlah > 1) {
            $keranjang->jumlah = $keranjang->jumlah - 1;
            $keranjang->save();
        }
        return redirect()->back();
    }
}
