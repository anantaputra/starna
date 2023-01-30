@extends('layouts.admin')

@section('content')

<div class="w-full py-8">
    <span class="text-2xl">{{ isset($kat) ? 'Edit Kategori' : 'Tambah Kategori' }}</span>
    <form method="POST" action="{{ route('admin.kategori.simpan') }}" class="w-1/2 mt-8 space-y-4">
        @csrf
        @if (isset($kategori))
            @php
                $id =  $kategori->id_kategori;
                $urutan  = (int) substr($id, 4, 3);
                $urutan++;
                $huruf = 'KAT-';
                $id_kategori = $huruf . sprintf("%03s", $urutan);
            @endphp

        <div class="grid grid-cols-1 gap-2">
            <label for="id_kategori" class="w-full mb-2 mt-2 text-sm font-medium ">ID Kategori</label>
            <input type="text" name="id_kategori" value="{{ $id_kategori }}" readonly id="id_kategori" class="bg-gray-100 rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400">
            @error('id_kategori')
                <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
            @enderror
        </div>
        @else
        <div class="grid grid-cols-1 gap-2">
            <label for="id_kategori" class="w-full mb-2 mt-2 text-sm font-medium ">ID Kategori</label>
            <input type="text" name="id_kategori" value="{{ isset($kat) ? $kat->id_kategori : 'KAT-001' }}" readonly id="id_kategori" class="bg-gray-100 rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400">
            @error('id_kategori')
                <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
            @enderror
        </div>
        @endif
        <div class="grid grid-cols-1 gap-2">
            <label for="kategori" class="w-full mb-2 mt-2 text-sm font-medium ">Kategori</label>
            <input type="text" name="kategori" value="{{ isset($kat) ? $kat->nama_kategori : '' }}" id="kategori" class="bg-white rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400" placeholder="Nama Kategori">
            @error('kategori')
                <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="text-white bg-rose-600 hover:bg-rose-500 focus:ring-0 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan</button>
    </form>
</div>
    
@endsection