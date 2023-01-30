@extends('layouts.admin')

@section('content')

<div class="w-full py-8">
    <div class="flex justify-between">
        <span class="text-2xl">Daftar Kategori</span>
        <a href="{{ route('admin.kategori.tambah') }}" class="text-white bg-rose-600 hover:bg-rose-500 focus:ring-0 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">+ Tambah Kategori</a>
    </div>
    <div class="overflow-hidden overflow-x-auto border border-gray-600 rounded mt-8">
        <table class="min-w-full text-sm divide-y divide-gray-600">
          <thead>
            <tr class="bg-gray-50">
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">ID Kategori</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Kategori</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap flex justify-center">Aksi</th>
            </tr>
          </thead>
      
          <tbody class="divide-y divide-gray-600 bg-white">
            @if (isset($kategori))
                @foreach($kategori as $item)
                <tr>
                  <td class="px-4 py-5 font-medium text-gray-900 whitespace-nowrap">{{ $item->id_kategori }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->nama_kategori }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">
                    <div class="flex justify-center space-x-2">
                        <a data-tooltip-target="tooltip-edit" href="{{ route('admin.kategori.ubah', ['id' => $item->uuid]) }}" class="inline-block p-1 text-sm font-medium text-white bg-yellow-400 border border-yellow-400 rounded active:text-indigo-500 hover:bg-transparent hover:text-yellow-400 focus:outline-none focus:ring">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </a>
                        <div id="tooltip-edit" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                          Edit Kategori
                          <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <a data-tooltip-target="tooltip-hapus" href="{{ route('admin.kategori.hapus', ['id' => $item->uuid]) }}" class="inline-block p-1 text-sm font-medium text-white bg-red-700 border border-red-700 rounded active:text-indigo-500 hover:bg-transparent hover:text-red-700 focus:outline-none focus:ring">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                        <div id="tooltip-hapus" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                          Hapus Kategori
                          <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
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