@extends('layouts.app')

@section('content')
   
<aside class="overflow-hidden mt-4 md:-mt-8 grid grid-cols-1 md:grid-cols-2 md:items-center">
    <div class="hidden relative max-w-screen-xl px-4 md:h-screen md:items-center md:flex">
        <div class="max-w-xl text-center sm:text-left">
          <h1 class="text-3xl font-extrabold sm:text-5xl">
            Camilan
            <strong class="font-extrabold text-rose-700 sm:block">
              Rumahan
            </strong>
          </h1>
    
          <p class="max-w-lg mt-4 sm:leading-relaxed sm:text-xl">
              Temukan camilan sesuai selera untuk keluarga anda
          </p>
    
          <div class="flex flex-wrap gap-4 mt-8 text-center">
            <a href="{{ route('produk') }}" class="block w-full px-12 py-3 text-sm font-medium text-white rounded shadow bg-rose-600 sm:w-auto active:bg-rose-500 hover:bg-rose-700 focus:outline-none focus:ring">
              Belanja
            </a>
          </div>
        </div>
    </div>
  
    <div>
      <div class="relative w-full h-64 sm:h-96 lg:h-[500px]">
          <img src="{{asset('img/risoles-ayam-telur-asin.jpg')}}"  class="absolute inset-0 object-cover w-full h-full lg:rounded-tl-3xl" alt="">
      </div>
    </div>
</aside>

<div class="hidden bg-rose-600 w-full h-28 mt-12 py-4 px-8 mb-8 md:block">
    <div class="h-full -mt-16 grid grid-cols-4 gap-4 place-items-center">
        <div class="card-body shadow-2xl w-56 px-10 py-8 bg-white border transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 hover:text-rose-600">
          <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-10 h-10">
                <path strokeLinecap="round" strokeLinejoin="round" d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
            </svg>
          </div>
            <h2 class="card-title flex justify-center font-light">Pilih Produk</h2>
        </div>
        <div class="card-body shadow-2xl w-56 px-10 py-8 bg-white border transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 hover:text-rose-600">
          <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>                
          </div>
            <h2 class="card-title flex justify-center font-light">Tambah Keranjang</h2>
        </div>
        <div class="card-body shadow-2xl w-56 px-10 py-8 bg-white border transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 hover:text-rose-600">
          <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
            <h2 class="card-title flex justify-center font-light">Checkout</h2>
        </div>
        <div class="card-body shadow-2xl w-56 px-10 py-8 bg-white border transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 hover:text-rose-600">
          <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
            </svg>
          </div>
            <h2 class="card-title flex justify-center font-light">Proses Kirim</h2>
        </div>
    </div>
</div>

<div class="w-full">
    <div class="flex justify-center text-lg md:text-xl font-semibold my-4">Produk Terbaru</div>    
    <div class="flex justify-center space-x-4">
        @isset($terbaru)
        @foreach ($terbaru as $item)    
        <div class="w-64 bg-white border shadow-md mb-4">
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