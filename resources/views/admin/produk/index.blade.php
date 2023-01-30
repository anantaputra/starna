@extends('layouts.admin')

@section('content')

<div class="w-full py-8">
    <div class="flex justify-between">
        <span class="text-2xl">Daftar Produk</span>
        <a href="{{ route('admin.produk.tambah') }}" class="text-white bg-rose-600 hover:bg-rose-500 focus:ring-0 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">+ Tambah Produk</a>
    </div>
    <div class="overflow-hidden overflow-x-auto border border-gray-600 rounded mt-8">
        <table class="min-w-full text-sm divide-y divide-gray-600">
          <thead>
            <tr class="bg-gray-50">
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">ID Produk</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Nama Produk</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Kategori</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Harga</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Berat</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Stok</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap flex justify-center">Aksi</th>
            </tr>
          </thead>
      
          <tbody class="divide-y divide-gray-600 bg-white">
            @if (isset($produk))
                @foreach($produk as $item)
                <tr>
                  <td class="px-4 py-5 font-medium text-gray-900 whitespace-nowrap">{{ $item->id_produk }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->nama_produk }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->kategori->nama_kategori }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->harga }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->berat }}gr</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->stok }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">
                    <div class="flex justify-center space-x-2">
                        <a href="{{ route('detail', ['id' => $item->uuid]) }}" class="inline-block p-1 text-sm font-medium text-white bg-indigo-600 border border-indigo-600 rounded active:text-indigo-500 hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>                          
                        </a>
                        <a href="{{ route('admin.produk.ubah', ['id' => $item->uuid]) }}" class="inline-block p-1 text-sm font-medium text-white bg-yellow-400 border border-yellow-400 rounded active:text-indigo-500 hover:bg-transparent hover:text-yellow-400 focus:outline-none focus:ring">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </a>
                        <a href="{{ route('admin.produk.hapus', ['id' => $item->uuid]) }}" class="inline-block p-1 text-sm font-medium text-white bg-red-700 border border-red-700 rounded active:text-indigo-500 hover:bg-transparent hover:text-red-700 focus:outline-none focus:ring">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                    </div>
                  </td>
                </tr>
                @endforeach
            @endif
          </tbody>
        </table>
    </div>
</div>
    
@endsection