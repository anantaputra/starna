@extends('layouts.admin')

@section('content')

<div class="w-full py-8">
    <div class="flex justify-between item-center">
        <div>
            <span class="text-2xl">Detail Pesanan {{ $keranjang[0]->id_pesanan }}</span>
        </div>
        <div>
            <button type="button" data-modal-toggle="popup-modal" class="bg-rose-600 px-6 py-2.5 text-white">Resi [+]</button>
        </div>
    </div>
    <div class="w-full border border-gray-600 rounded mt-8">
        <table class="w-full text-sm divide-y divide-gray-600">
          <thead>
            <tr class="bg-gray-50">
              <th class="px-4 py-4 font-medium text-left text-gray-900">No</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Nama produk</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900">Jumlah</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900">Stok</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900">Status</th>
            </tr>
          </thead>
      
          <tbody class="divide-y divide-gray-600 bg-white">
            @if (isset($keranjang))
                @php
                    $no = 1;
                @endphp
                @foreach($keranjang as $item)
                <tr>
                    <td class="px-4 py-5 font-medium text-gray-900">{{ $no++ }}</td>
                    <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->produk->nama_produk }}</td>
                    <td class="px-4 py-5 text-gray-700">{{ $item->jumlah }}</td>
                    <td class="px-4 py-5 text-gray-700">{{ $item->produk->stok }}</td>
                    <td class="px-4 py-5 text-gray-700">
                        @if ($item->jumlah > $item->produk->stok)
                            Stok Tidak Cukup
                        @else
                            Tersedia
                        @endif    
                    </td>
                </tr>
                @endforeach
            @endif
          </tbody>
        </table>
    </div>
</div>
  
<div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-end">
                <h3 class="mb-5 text-lg font-normal text-gray-500 text-start">Masukkan No Resi</h3>
                <form action="{{ route('admin.pesanan.resi') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $keranjang[0]->id_pesanan }}">
                    <input type="text" name="resi" class="appearance-none border border-gray-200 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Resi Pengiriman">
                    <button data-modal-toggle="popup-modal" type="submit" class="mt-4 bg-rose-600 px-6 py-2.5 text-white">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection