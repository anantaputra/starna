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
        $pesanan = Transaksi::with('pesanan')->whereHas('pesanan', function($q) {
                    $q->where('status', 'pending');
                    })
                    ->where('status', 'settlement')
                    ->orderBy('created_at', 'DESC')
                    ->get();
        
        return view('admin.pesanan.index', compact('pesanan'));
    }

    public function filter(Request $request)
    {
        $pesanan = Transaksi::with('pesanan')->whereHas('pesanan', function($q) use ($request) {
            $q->where('status', $request->status);
            })
            ->where('status', 'settlement')
            ->orderBy('created_at', 'DESC')
            ->get();

            if (isset($pesanan)) {
                $no = 1;
                foreach($pesanan as $item) {
                  $pengiriman = $item->pesanan->pengiriman;
                  if($pengiriman != null){
                    $pengiriman = explode('|', $pengiriman);
                    $jasa = strtoupper($pengiriman[0]);
                    $estimasi = strtoupper($pengiriman[1]);
                    if(!str_contains($estimasi, strtoupper('hari'))){
                      $estimasi = $estimasi.' HARI';
                    } else {
                      $estimasi = $estimasi;
                    }
                  }
            ?>
            <tr>
                <td class="px-4 py-5 font-medium text-gray-900"><?= $no++; ?></td>
                <td class="px-4 py-5 text-gray-700 whitespace-nowrap"><?= $item->pesanan->alamat->nama; ?></td>
                <td class="px-4 py-5 text-gray-700"><?= $item->pesanan->alamat->alamat.', '.$item->pesanan->alamat->kota.', '.$item->pesanan->alamat->provinsi; ?></td>
                <td class="px-4 py-5 text-gray-700"><?= $jasa; ?></td>
                <td class="px-4 py-5 text-gray-700"><?= $estimasi; ?></td>
                <td class="px-4 py-5 text-gray-700"><?= Carbon\Carbon::parse($item->pesanan->created_at)->format('d M Y'); ?></td>
                <td class="px-4 py-5 text-gray-700 text-center whitespace-nowrap">
                    <?php if($item->pesanan->resi != null) {
                        echo 'Dikirim';
                    } else {
                        echo 'Belum Dikirim';
                    }
                    ?>
                </td>
                <td class="px-4 py-5 text-gray-700 text-center whitespace-nowrap">
                    <?php
                        if($item->status == 'settlement'){
                    ?>
                    <a href="{{ route('admin.pesanan.detail', ['id' => $item->pesanan->uuid]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Detail</a>
                    <?php
                        }
                    ?>
                </td>
            </tr>
            <?php
                }
            }
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
