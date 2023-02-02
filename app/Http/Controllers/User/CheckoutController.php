<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\AlamatUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\MidtransController;
use App\Http\Controllers\Api\RajaOngkirController;

class CheckoutController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function checkout($id)
    {
        $alamat = AlamatUser::where('id_user', auth()->user()->id_user)->get()->count();
        
        $alamat = AlamatUser::where('id_user', auth()->user()->id_user)
        ->where('utama', true)
        ->get();

        $berat = 0;
        $provinsi = RajaOngkirController::semua_provinsi();
        $hash = decrypt($id);
        $data = explode('|', $hash);
        $produk = Produk::where('uuid', $data[0])->first();
        $qty = $data[1];
        $berat = $produk->berat * $qty;

        if(count($alamat) > 0){
            $jne = RajaOngkirController::get_ongkir($alamat[0]->kode_kota, 'jne', $berat);

            $pos = RajaOngkirController::get_ongkir($alamat[0]->kode_kota, 'pos', $berat);

            $tiki = RajaOngkirController::get_ongkir($alamat[0]->kode_kota, 'tiki', $berat);

            return view('pesan.pesan-sekarang', compact('produk', 'qty', 'alamat', 'provinsi', 'jne', 'pos', 'tiki'));
        } else {
            return redirect()->route('user.alamat')->with('status', 'kosong');
        }
    }

    public function keranjang()
    {
        $alamat = AlamatUser::where('id_user', auth()->user()->id_user)->get()->count();
        
        if ($alamat == 0) {
            return redirect()->route('user.alamat');
        } else {
            $alamat = AlamatUser::where('id_user', auth()->user()->id_user)
                    ->where('utama', true)
                    ->get();

            $berat = 0;
            $provinsi = RajaOngkirController::semua_provinsi();
            $keranjang = Keranjang::where('id_user', auth()->user()->id_user)
                        ->where('checkout', false)
                        ->get();
            foreach ($keranjang as $item) {
                $produk = Produk::find($item->id_produk)->first();
                $berat += $produk->berat * $item->jumlah;
            }

            if($berat > 30000){
                return redirect()->back()->withErrors('overweight', 'Maaf maksimal berat pesanan yang dapat kami layani hanya 30 Kg');
            }

            if(count($alamat) > 0){
                $jne = RajaOngkirController::get_ongkir($alamat[0]->kode_kota, 'jne', $berat);

                $pos = RajaOngkirController::get_ongkir($alamat[0]->kode_kota, 'pos', $berat);

                $tiki = RajaOngkirController::get_ongkir($alamat[0]->kode_kota, 'tiki', $berat);

                return view('pesan.pesan-sekarang', compact('produk', 'qty', 'alamat', 'provinsi', 'jne', 'pos', 'tiki'));
            } else {
                return redirect()->route('user.alamat')->with('status', 'kosong');
            }
        }
    }

    public function simpan(Request $request)
    {
        if(!isset($request->paket)){
            return redirect()->back()->with('error', 'Pilih Jasa Pengiriman Dulu');
        }
        $orderID = Pesanan::latest()->first();
        if($orderID){
            $orderID = $orderID->id_pesanan;
            $date = explode("-", $orderID);
            if($date[0] == Carbon::today()->format("Ymd")){
                $number = (int) $date[1];
                $number++;
            } else {
                $number = 1;
            }
        } else {
            $number = 1;
        }
        $orderID = Carbon::today()->format("Ymd") . "-" . sprintf("%03s", $number);
        
        $pesanan = new Pesanan();
        $pesanan->id_pesanan = $orderID;
        $pesanan->id_user = auth()->user()->id_user;
        $pesanan->id_alamat = $request->alamat;
        $pesanan->jumlah = $request->total;
        $pesanan->pengiriman = $request->paket;
        $pesanan->ongkir = $request->ongkir;
        $pesanan->save();

        // $data = MidtransController::bank_transfer($request->total, $request->metode_byr);

        $keranjang = Keranjang::where('id_user', auth()->user()->id_user)
                        ->where('checkout', false)
                        ->get();

        foreach ($keranjang as $item) {
            $item->checkout = true;
            $item->id_pesanan = $pesanan->id_pesanan;
            $item->save();
        }

        // $transaksi = new Transaksi();
        // $transaksi->id_pesanan = $pesanan->id_pesanan;
        // $transaksi->id_transaksi = $data->order_id;
        // $transaksi->metode = $request->metode_byr;
        // $transaksi->total = $request->total;
        // if($request->metode_byr == 'permata'){
        //     $transaksi->kode_bayar = $data->permata_va_number;
        // } else {
        //     $transaksi->kode_bayar = $data->va_numbers[0]->va_number;
        // }
        // $transaksi->status = $data->transaction_status;
        // $transaksi->save();

        // return redirect()->route('user.tagihan.detail', ['id' => $transaksi->uuid]);
        $token = MidtransController::config($request->total);
        // return $token;
        return redirect()->route('bayar')->with([
            'token' => $token,
            'id' => $orderID
        ]);
        // return view('pesan.bayar', compact(''))
    }
}
