@extends('layouts.app')

@section('content')

<div class="container my-8">
    <div class="grid grid-cols-4 gap-4">
        @isset($produk)
        @foreach ($produk as $item)    
        <div class="bg-white border shadow-md mb-4">
            <a href="{{ route('detail', ['id' => $item->uuid]) }}">      
              @php
                  $gambar = json_decode($item->gambar);
              @endphp
              <img class="p-2 rounded-t-xl w-full h-56" src="{{ isset($item->gambar) ? asset('storage/upload/produk/'.$gambar[0].'') : null }}" alt="product image" />
              <div class="px-3 pb-3">
                <h5 class="tracking-tight text-gray-900">{{ $item->nama_produk }}</h5>
                <div class="flex justify-between items-center">
                  <span class="text-rose-600">
                    <span class="text-sm">Rp.</span> 
                    <span class="text-lg">{{ number_format($item->harga, 0, '', '.') }}</span>
                  </span>
                </div>
              </div>
            </a>
        </div>
        @endforeach
        @endisset
    </div>
</div>
    
@endsection