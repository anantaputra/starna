<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::orderBy('updated_at', 'DESC')->paginate(10);
        return view('admin.transaksi.index', compact('transaksi'));
    }

    public function filter(Request $request)
    {
        $transaksi = Transaksi::whereBetween('created_at', [$request->mulai, $request->akhir])
                    ->orderBy('updated_at', 'DESC')
                    ->get()
                    ->paginate(10);

            if (isset($transaksi)) {
                $no = 1;
                foreach($transaksi as $item) {
            ?>
            <tr>
                <td class="px-4 py-5 font-medium text-gray-900"><?= $no++ ?></td>
                <td class="px-4 py-5 text-gray-700 whitespace-nowrap"><?= $item->pesanan->user->nama_depan ?></td>
                <td class="px-4 py-5 text-gray-700 whitespace-nowrap">Rp<?= number_format($item->total, 0, '', '.') ?></td>
                <td class="px-4 py-5 text-gray-700 whitespace-nowrap"><?= Carbon::parse($item->updated_at)->format('d M Y') ?></td>
                <td class="px-4 py-5 text-gray-700 whitespace-nowrap"><?= strtoupper($item->status) ?></td>
            </tr>
            <?php
                }
            }
    }
}
