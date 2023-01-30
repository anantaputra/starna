@extends('layouts.user')

@section('content')
<div class="w-full py-8">
    <span class="text-2xl">Tagihan Pembayaran Anda</span>
    @if (count($tagihan) > 0)
    @foreach ($tagihan as $item)
    <div class="w-full flex flex-row items-center px-8 py-4 bg-white border rounded-xl mt-8">
        <div class="w-1/2 flex p-4 leading-normal">
            <div class="w-2/5 flex flex-col">
                <h5 class="font-semibold tracking-tight">No Transaksi</h5>
                <h5 class="font-semibold tracking-tight">Metode Pembayaran</h5>
                <p class="font-semibold">Total</p>
                <p class="mb-3 font-semibold">
                    Status
                </p>
            </div>
            <div class="flex flex-col">
                <h5 class="text-xl font-bold tracking-tight text-rose-600">{{ $item->id_transaksi }}</h5>
                <h5 class="text-lg font-bold tracking-tight text-gray-900">Bank {{ strtoupper($item->metode) }}</h5>
                <p class="font-semibold text-gray-700">Rp{{ number_format($item->total, 0, '', '.') }}</p>
                @if ($item->status == 'pending')
                <p class="mb-3 font-semibold text-rose-600">
                    Belum Bayar
                </p>
                @elseif ($item->status == 'settlement')
                <p class="mb-3 font-semibold text-rose-600">
                    Berhasil
                </p>
                @else 
                <p class="mb-3 font-semibold text-rose-600">
                    Gagal
                </p>
                @endif
            </div>
        </div>
        <div class="w-1/2 flex justify-end items-center">
            <a href="{{ route('user.tagihan.detail', ['id' => $item->uuid]) }}" class="px-8 py-2.5 bg-rose-600 text-white rounded-lg">Lihat</a>
        </div>
    </div>
    @endforeach
    @else
    <div class="w-full grid place-content-center py-32">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-56 w-56 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
        </svg>
        <span class="text-xl text-gray-300">Anda belum memiliki tagihan</span>
    </div>
    @endif
</div>
@endsection