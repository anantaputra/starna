@extends('layouts.app')

@section('content')

<div class="w-full flex justify-center py-8">
    <div class="w-1/2 px-12 py-10 bg-white border">
        <div class="flex justify-center text-2xl text-rose-600 font-semibold mb-4">
            Nota Pembayaran
        </div>
        <div class="flex justify-between text-lg border-t pt-4 mb-1">
            <span>No Transaksi:</span>
            <span class="text-rose-600 font-semibold">{{ $transaksi->id_transaksi }}</span>
        </div>
        <div class="flex justify-between text-lg mb-1">
            <span>Metode Pembayaran:</span>
            <span class="text-rose-600 font-semibold">Bank Transfer</span>
        </div>
        <div class="flex justify-between text-lg mb-4">
            <span>Jasa Pengiriman:</span>
            @php
                $expedisi = explode("|", $transaksi->pesanan->pengiriman);
                $exped = explode(" ", $expedisi[0]);
            @endphp
            <span class="text-rose-600 font-semibold">{{ strtoupper($exped[0]." ".$exped[1])." (".$expedisi[1]." Hari)" }}</span>
        </div>
        <div class="flex justify-center mb-4">
            <span>Detail Pesanan</span>
        </div>
        <div class="mb-4">
            @php
                $keranjang = App\Models\Keranjang::where('id_pesanan', $transaksi->id_pesanan)->get();
                $subtotal = 0;
            @endphp
            @foreach ($keranjang as $item)
            <div class="flex justify-between text-lg">
                <span>{{ $item->produk->nama_produk }} (x {{ $item->jumlah }})</span>
                <span class="text-rose-600 font-semibold">Rp{{ number_format($item->produk->harga * $item->jumlah, 0, 0, '.') }}</span>
            </div>
            @php
                $subtotal += $item->produk->harga * $item->jumlah;
            @endphp
            @endforeach
        </div>
        <div class="flex justify-end">
            <div class="flex space-x-2">
                <div>Subtotal</div>
                <div>Rp{{ number_format($subtotal, 0, 0, '.') }}</div>
            </div>
        </div>
        <div class="flex justify-end">
            <div class="flex space-x-2">
                <div>Ongkir</div>
                <div>Rp{{ number_format($transaksi->pesanan->ongkir, 0, 0, '.') }}</div>
            </div>
        </div>
        <div class="flex justify-end">
            <div class="flex space-x-2">
                <div>Biaya Admin</div>
                <div>Rp{{ number_format(3000, 0, 0, '.') }}</div>
            </div>
        </div>
        <div class="flex justify-end">
            <div class="flex items-center space-x-2">
                <div>Total</div>
                <div class="text-rose-600 font-semibold text-lg">Rp{{ number_format($transaksi->total, 0, 0, '.') }}</div>
            </div>
        </div>
    </div>
</div>

@endsection