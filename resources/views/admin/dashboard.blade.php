@extends('layouts.admin')

@section('content')
    
<div class="w-full py-8">
    <div class="flex justify-between">
        <span class="text-2xl">Dashboard</span>
    </div>
    <div class="overflow-hidden overflow-x-auto rounded mt-8">
        <div class="grid grid-cols-2 gap-3">
            <div class="w-full p-8 bg-white border border-gray-200 rounded-lg shadow-md">
                <div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Total Kategori</h5>
                </div>
                @php
                    $kategori = App\Models\Kategori::count();
                @endphp
                <p class="mb-3 font-normal text-3xl text-gray-700">{{ $kategori }} Kategori</p>
            </div>
            <div class="w-full p-8 bg-white border border-gray-200 rounded-lg shadow-md">
                <div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Total Produk</h5>
                </div>
                @php
                    $kategori = App\Models\Produk::count();
                @endphp
                <p class="mb-3 font-normal text-3xl text-gray-700">{{ $kategori }} Produk</p>
            </div>
            <div class="w-full p-8 bg-white border border-gray-200 rounded-lg shadow-md">
                <div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Total Pesanan</h5>
                </div>
                @php
                    $pesanan = App\Models\Transaksi::with('pesanan')->where('status', 'settlement')->count();
                @endphp
                <p class="mb-3 font-normal text-3xl text-gray-700">{{ $pesanan }} Pesanan</p>
            </div>
            <div class="w-full p-8 bg-white border border-gray-200 rounded-lg shadow-md">
                <div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Total Retur</h5>
                </div>
                @php
                    $retur = App\Models\Retur::count();
                @endphp
                <p class="mb-3 font-normal text-3xl text-gray-700">{{ $retur }} Retur</p>
            </div>
        </div>
    </div>
</div>

@endsection