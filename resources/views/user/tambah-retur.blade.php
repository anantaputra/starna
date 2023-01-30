@extends('layouts.user')

@section('content')
<div class="w-full py-8">
    <span class="text-2xl">Retur Pesanan</span>
    <form method="POST" action="{{ route('user.retur.simpan') }}" class="w-1/2 mt-8 space-y-4" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-2">
            <label for="pesanan" class="w-full mb-2 mt-2 text-sm font-medium ">No Pesanan</label>
            <input type="text" name="pesanan" value="{{ $transaksi->id_pesanan }}" id="pesanan" class="bg-white rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400" placeholder="No Resi / No Transaksi" readonly>
            @error('pesanan')
                <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
            @enderror
        </div>
        <div class="grid grid-cols-1 gap-2">
            <label for="ket" class="w-full mb-2 mt-2 text-sm font-medium ">Keterangan Retur</label>
            <input type="text" name="ket" id="ket" class="bg-white rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400" placeholder="Keterangan">
            @error('ket')
                <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
            @enderror
        </div>
        <div class="grid grid-cols-1 gap-2">
            <label for="bukti_resi" class="w-full mb-2 mt-2 text-sm font-medium ">Bukti Resi Paket / Bukti Transaksi</label>
            <input type="file" name="bukti_resi" id="bukti_resi" class="bg-white rounded border border-gray-300 focus:outline-none focus:ring-0 focus:border-rose-400" accept="application/pdf">
            @error('bukti_resi')
                <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
            @enderror
        </div>
        <div class="grid grid-cols-1 gap-2">
            <label for="foto_produk" class="w-full mb-2 mt-2 text-sm font-medium ">Foto Produk</label>
            <input type="file" name="foto_produk" id="foto_produk" class="bg-white rounded border border-gray-300 focus:outline-none focus:ring-0 focus:border-rose-400" accept="application/pdf, image/*">
            @error('foto_produk')
                <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="text-white bg-rose-600 hover:bg-rose-500 focus:ring-0 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan</button>
    </form>
</div>
@endsection