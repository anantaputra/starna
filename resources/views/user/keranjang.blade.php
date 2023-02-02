@extends('layouts.app')

@section('content')
<div class="container my-8">

    @error('overweight')
    <div class="px-8 mb-4">
        <div id="alert-border-2" class="flex p-4 mb-4 text-red-700 bg-red-100 border-t-4 border-red-500 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium">
                {{ $message }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8"  data-dismiss-target="#alert-border-2" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
    @enderror

    <div class="w-full bg-white py-3 px-8 border shadow-sm mb-4">
        <div class="grid grid-cols-12 gap-2 text-gray-400 font-semibold">
            <div class="col-span-5">
                Produk
            </div>
            <div class="col-span-2">
                Harga Satuan
            </div>
            <div class="col-span-2">
                Kuantitas
            </div>
            <div class="col-span-2">
                Total Harga
            </div>
            <div>
                Aksi
            </div>
        </div>
    </div>
    @php
        $jml = 0;
        $total = 0;
    @endphp
    @if (isset($keranjang))
    @php
        $i = 1;
    @endphp
    <div class="w-full bg-white shadow-sm mb-4">
        @foreach ($keranjang as $item)
        @php
            $jml++;
            $total += $item->produk->harga * $item->jumlah;
        @endphp
        <div class="w-full px-8 py-4 border">
            <div class="grid grid-cols-12 gap-2">
                <div class="col-span-5">
                    <div class="flex items-center space-x-2">
                        <div>
                            @php
                                $gambar = json_decode($item->produk->gambar);
                            @endphp
                            <img src="{{ isset($item->produk->gambar) ? asset('storage/upload/produk/'.$gambar[0]) : null }}" alt="" class="w-16 h-16">
                        </div>
                        <div>
                            {{ $item->produk->nama_produk }}
                        </div>
                    </div>
                </div>
                <div class="col-span-2 flex items-center">
                    <div>
                        Rp{{ number_format($item->produk->harga, 0, 0, '.') }}
                    </div>
                </div>
                <div class="col-span-2 flex items-center">
                    <div class="w-32 flex">
                        <a href="{{ route('keranjang.min', ['id' => $item->uuid]) }}" class="w-1/4 flex justify-center py-2 border-y border-l border-black cursor-pointer">
                            -
                        </a>
                        <div class="w-1/2 border-t-b">
                            <input type="text" value="{{ $item->jumlah }}" class="w-full outline-none text-basecursor-default flex items-center text-center" readonly>
                        </div>
                        <a href="{{ route('keranjang.add', ['id' => $item->uuid]) }}" class="w-1/4 flex justify-center py-2 border-y border-r border-black cursor-pointer">
                            +
                        </a>
                    </div>
                </div>
                <div class="col-span-2 flex items-center" id="tot-{{ $i }}">
                    Rp{{ number_format(($item->produk->harga * $item->jumlah), 0, 0, '.') }}
                </div>
                <div class="flex items-center">
                    <a href="{{ route('keranjang.hapus', ['id' => $item->uuid]) }}">Hapus</a>
                </div>
            </div>
        </div>
        @php
            $i++;
        @endphp
        @endforeach
    </div>
    @endif
    <div class="w-full bg-white py-6 px-8 border shadow-sm mb-4">
        <div class="grid grid-cols-1 gap-2">
            <div class="flex justify-end space-x-4">
                <div>
                    Total ({{ $jml }} produk) : <span class="text-xl text-rose-600">Rp{{ number_format($total, 0 , 0, '.') }}</span>
                </div>
                <div>
                    <a href="{{ route('keranjang.checkout') }}" class="w-full px-16 py-4 text-sm text-center font-semibold tracking-wide text-white uppercase bg-rose-600">
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection