@extends('layouts.app')

@section('content')

<div class="container bg-white shadow-lg my-8">
    <div class="grid grid-cols-2 gap-8 px-8 py-8">
        <div class="w-full h-full">
            @php
                $gambar = json_decode($produk->gambar);
            @endphp
            <img src="{{ isset($produk->gambar) ? asset('storage/upload/produk/'.$gambar[0]) : null }}" class="object-cover w-full h-[450px] shadow-sm border" alt="">
            <div class="grid grid-cols-5 gap-4 mt-3 mb-3 pb-6">
                @if (isset($produk->gambar))
                @if (count($gambar) > 1)
                @for ($i = 0; $i < count($gambar); $i++)    
                <img src="{{ asset('storage/upload/produk/'.$gambar[$i]) }}" class="object-cover w-full h-20 shadow-sm border hover:border hover:border-rose-600" alt="">
                @endfor
                @endif
                @endif
            </div>
        </div>
        <div class="flex flex-col space-y-3">
            <div class="flex">
                <span class="text-3xl font-bold">{{ $produk->nama_produk }}</span>
            </div>
            <div class="flex">
                <span class="text-4xl text-rose-600">Rp{{ number_format($produk->harga, 0, '', '.') }}</span>
            </div>
            <div>
                {!! $produk->deskripsi !!}
            </div>
            <div class="flex">
                <span class="text-xl">Berat: {{ $produk->berat }} gram</span>
            </div>
            <div class="flex">
                <span class="text-lg">Stok: {{ $produk->stok }} buah</span>
            </div>
            <div class="flex items-center space-x-8">
                <span>Kuantitas</span>
                <div class="w-32 flex">
                    <button onclick="decrement()" class="w-1/4 flex justify-center py-2 border-y border-l border-black cursor-pointer">
                        -
                    </button>
                    <div class="w-1/2 border-t-b">
                        <input type="text" id="qty" value="1" class="w-full outline-none text-basecursor-default flex items-center text-center" readonly>
                    </div>
                    <button onclick="increment()" class="w-1/4 flex justify-center py-2 border-y border-r border-black cursor-pointer">
                        +
                    </button>
                </div>
            </div>
            <div class="flex pt-8 space-x-4">
                <form action="{{ route('keranjang.tambah') }}" method="post" class="w-full">
                    @csrf
                    <input type="hidden" id="id-produk-cart" name="uuid" value="{{ $produk->uuid }}">
                    <input type="hidden" id="kuantitas-cart" name="qty" value="1">
                    <button type="submit" class="w-full px-3 py-2.5 flex items-center space-x-2 text-sm text-center font-bold tracking-wide text-rose-600 border border-rose-600 uppercase bg-white rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>                      
                        <span>Masukkan Keranjang</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function decrement(){
        var qty = Number(document.querySelector('#qty').value);
        if (qty > 1) {
            qty--;
            document.querySelector('#qty').value = qty;
            document.querySelector('#kuantitas-now').value = qty;
            document.querySelector('#kuantitas-cart').value = qty;
        }
    }
    function increment(){
        var qty = Number(document.querySelector('#qty').value);
        var stok = Number('{{ $produk->stok }}');
        if (qty < stok) {
            qty++;
            document.querySelector('#qty').value = qty;
            document.querySelector('#kuantitas-now').value = qty;
            document.querySelector('#kuantitas-cart').value = qty;
        }
    }
</script>
    
@endsection