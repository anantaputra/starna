<?php

namespace App\Http\Controllers\User;

use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function pesan(Request $request)
    {
        if(empty(auth()->user()->email_verified_at)){
            return redirect()->route('user.profil')->withErrors('verify', 'Verifikasi email untuk lanjutkan pemesanan');
        }
        $hash = encrypt($request->uuid."|".$request->qty);

        return redirect()->route('checkout', ['id' => $hash]);
    }

    public function bayar()
    {
        return view('pesan.bayar');
    }

    public function simpan(Request $request)
    {
        $json = json_decode($request->json);
        $transaksi = new Transaksi();
        $transaksi->id_pesanan = $request->id;
        $transaksi->id_transaksi = $json->order_id;
        $transaksi->metode = $json->payment_type;
        $transaksi->total = $json->gross_amount;
        $transaksi->kode_bayar = $json->pdf_url ?? null;
        $transaksi->status = $json->transaction_status;
        $transaksi->save();

        if ($json->transaction_status == 'settlement') {
            $keranjang = Keranjang::where('id_pesanan', $request->id)->get();
            foreach ($keranjang as $item) {
                $produk = Produk::find($item->id_produk);
                $produk->stok = $produk->stok - $item->jumlah;
                $produk->save();
            }
        }

        return redirect()->route('user.riwayat.nota', ['id' => $transaksi->uuid]);
    }
}
