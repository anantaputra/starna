@extends('layouts.user')

@section('content')
<div class="w-full py-8">
    <div class="text-2xl mb-4">Riwayat Pesanan</div>
    <div class="w-full bg-white py-3 px-8 border shadow-sm mb-4">
        <div class="grid grid-cols-4 gap-2 place-items-center text-gray-400 font-semibold">
            <div id="kemas" onclick="ganti('kemas')" class="border-b-4 border-rose-600 cursor-pointer">
                Dikemas
            </div>
            <div id="kirim" onclick="ganti('kirim')" class="cursor-pointer">
                Dikirim
            </div>
            <div id="selesai" onclick="ganti('selesai')" class="cursor-pointer">
                Selesai
            </div>
            <div id="batal" onclick="ganti('batal')" class="cursor-pointer">
                Dibatalkan
            </div>
        </div>
    </div>
    <div id="kemas-div" class="mt-6">
        @if (count($sukses) > 0)
        @foreach ($sukses as $item)
        <div class="w-full flex flex-row items-center px-8 py-4 bg-white border mt-2">
            <div class="w-1/2 flex p-4 leading-normal">
                <div class="w-2/5 flex flex-col">
                    <h5 class="font-semibold tracking-tight">No Transaksi</h5>
                    <h5 class="font-semibold tracking-tight">Metode Pembayaran</h5>
                    <p class="font-semibold">Total</p>
                    <p class="mb-3 font-semibold">
                        Status
                    </p>
                </div>
                <div class="flex flex-col">
                    <h5 class="text-xl font-bold tracking-tight text-rose-600">{{ $item->id_transaksi }}</h5>
                    <h5 class="text-lg font-bold tracking-tight text-gray-900">Bank {{ strtoupper($item->metode) }}</h5>
                    <p class="font-semibold text-gray-700">Rp{{ number_format($item->total, 0, '', '.') }}</p>
                    @if ($item->status == 'pending')
                    <p class="mb-3 font-semibold text-rose-600">
                        Belum Bayar
                    </p>
                    @elseif ($item->status == 'settlement')
                    <p class="mb-3 font-semibold text-rose-600">
                        Berhasil
                    </p>
                    @else 
                    <p class="mb-3 font-semibold text-rose-600">
                        Gagal
                    </p>
                    @endif
                </div>
            </div>
            <div class="w-1/2 flex justify-end items-center">
                <a href="{{ route('user.riwayat.nota', ['id' => $item->uuid]) }}" class="px-8 py-2.5 bg-rose-600 text-white">Lihat</a>
            </div>
        </div>
        @endforeach
        @else
        <div class="w-full grid place-content-center py-32">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-56 w-56 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <span class="text-xl text-gray-300">Anda belum memiliki pesanan</span>
        </div>
        @endif
    </div>
    <div id="kirim-div" class="hidden mt-6">
        @if (count($kirim) > 0)
        @foreach ($kirim as $item)
        <div class="w-full flex flex-row items-center px-8 py-4 bg-white border mt-2">
            <div class="w-1/2 flex p-4 leading-normal">
                <div class="w-2/5 flex flex-col">
                    <h5 class="font-semibold tracking-tight">No Transaksi</h5>
                    <p class="font-semibold">Jasa Ekspedisi</p>
                    <p class="font-semibold">No Resi</p>
                    <p class="mb-3 font-semibold">
                        Status
                    </p>
                </div>
                <div class="flex flex-col">
                    <h5 class="text-xl font-bold tracking-tight text-rose-600">{{ $item->id_transaksi }}</h5>
                    @php
                      $pengiriman = $item->pesanan->pengiriman;
                      if($pengiriman != null){
                        $pengiriman = explode('|', $pengiriman);
                        $jasa = strtoupper($pengiriman[0]);
                        $estimasi = strtoupper($pengiriman[1]);
                        if(!str_contains($estimasi, strtoupper('hari'))){
                          $estimasi = $estimasi.' HARI';
                        } else {
                          $estimasi = $estimasi;
                        }
                      }
                    @endphp
                    <h5 class="tracking-tight text-gray-900">{{ $jasa }}</h5>
                    <p class="font-semibold text-gray-700">{{ $item->pesanan->resi }}</p>
                    <p class="mb-3 font-semibold text-rose-600">
                        @if ($item->pesanan->status == 'send')
                            Sedang Dikirim
                        @elseif ($item->pesanan->status == 'accepted')
                            Sudah Diterima
                        @endif
                    </p>
                </div>
            </div>
            <div class="w-1/2 flex justify-end items-center">
                <a href="{{ route('user.riwayat.terima', ['id' => $item->uuid]) }}" class="px-8 py-2.5 bg-rose-600 text-white">Terima</a>
            </div>
        </div>
        @endforeach
        @else
        <div class="w-full grid place-content-center py-32">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-56 w-56 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <span class="text-xl text-gray-300">Anda belum memiliki pesanan</span>
        </div>
        @endif
    </div>
    <div id="selesai-div" class="hidden mt-6">
        @if (count($selesai) > 0)
        @foreach ($selesai as $item)
        <div class="w-full flex flex-row items-center px-8 py-4 bg-white border mt-2">
            <div class="w-1/2 flex p-4 leading-normal">
                <div class="w-2/5 flex flex-col">
                    <h5 class="font-semibold tracking-tight">No Transaksi</h5>
                    <p class="font-semibold">Jasa Ekspedisi</p>
                    <p class="font-semibold">No Resi</p>
                    <p class="mb-3 font-semibold">
                        Status
                    </p>
                </div>
                <div class="flex flex-col">
                    <h5 class="text-xl font-bold tracking-tight text-rose-600">{{ $item->id_transaksi }}</h5>
                    @php
                      $pengiriman = $item->pesanan->pengiriman;
                      if($pengiriman != null){
                        $pengiriman = explode('|', $pengiriman);
                        $jasa = strtoupper($pengiriman[0]);
                        $estimasi = strtoupper($pengiriman[1]);
                        if(!str_contains($estimasi, strtoupper('hari'))){
                          $estimasi = $estimasi.' HARI';
                        } else {
                          $estimasi = $estimasi;
                        }
                      }
                    @endphp
                    <h5 class="tracking-tight text-gray-900">{{ $jasa }}</h5>
                    <p class="font-semibold text-gray-700">{{ $item->pesanan->resi }}</p>
                    <p class="mb-3 font-semibold text-rose-600">
                        @if ($item->pesanan->status == 'send')
                            Sedang Dikirim
                        @elseif ($item->pesanan->status == 'accepted')
                            Sudah Diterima
                        @endif
                    </p>
                </div>
            </div>
            <div class="w-1/2 flex justify-end items-center">
                <a href="{{ route('user.retur.tambah', ['id' => $item->uuid]) }}" class="px-8 py-2.5 bg-rose-600 text-white">Retur</a>
            </div>
        </div>
        @endforeach
        @else
        <div class="w-full grid place-content-center py-32">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-56 w-56 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <span class="text-xl text-gray-300">Anda belum memiliki pesanan</span>
        </div>
        @endif
    </div>
    <div id="batal-div" class="hidden mt-6">
        @if (count($batal) > 0)
        @foreach ($batal as $item)
        <div class="w-full flex flex-row items-center px-8 py-4 bg-white border mt-2">
            <div class="w-1/2 flex p-4 leading-normal">
                <div class="w-2/5 flex flex-col">
                    <h5 class="font-semibold tracking-tight">No Transaksi</h5>
                    <h5 class="font-semibold tracking-tight">Metode Pembayaran</h5>
                    <p class="font-semibold">Total</p>
                    <p class="mb-3 font-semibold">
                        Status
                    </p>
                </div>
                <div class="flex flex-col">
                    <h5 class="text-xl font-bold tracking-tight text-rose-600">{{ $item->id_transaksi }}</h5>
                    <h5 class="text-lg font-bold tracking-tight text-gray-900">Bank {{ strtoupper($item->metode) }}</h5>
                    <p class="font-semibold text-gray-700">Rp{{ number_format($item->total, 0, '', '.') }}</p>
                    @if ($item->status == 'pending')
                    <p class="mb-3 font-semibold text-rose-600">
                        Belum Bayar
                    </p>
                    @elseif ($item->status == 'settlement')
                    <p class="mb-3 font-semibold text-rose-600">
                        Berhasil
                    </p>
                    @elseif ($item->status == 'expire')
                    <p class="mb-3 font-semibold text-rose-600">
                        Dibatalkan Oleh Sistem
                    </p>
                    @else 
                    <p class="mb-3 font-semibold text-rose-600">
                        Gagal
                    </p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="w-full grid place-content-center py-32">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-56 w-56 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <span class="text-xl text-gray-300">Anda belum memiliki pesanan</span>
        </div>
        @endif
    </div>
</div>

@endsection

@section('js')
    <script>
        function ganti (id) {
            if (id == 'kemas') {
                document.querySelector('#kemas').classList.add("border-b-4", "border-rose-600");
                document.querySelector('#kemas-div').classList.remove("hidden");
                document.querySelector('#kirim').classList.remove("border-b-4", "border-rose-600");
                document.querySelector('#kirim-div').classList.add("hidden");
                document.querySelector('#selesai').classList.remove("border-b-4", "border-rose-600");
                document.querySelector('#selesai-div').classList.add("hidden");
                document.querySelector('#batal').classList.remove("border-b-4", "border-rose-600");
                document.querySelector('#batal-div').classList.add("hidden");
            } else if (id == 'kirim') {
                document.querySelector('#kirim').classList.add("border-b-4", "border-rose-600");
                document.querySelector('#kirim-div').classList.remove("hidden");
                document.querySelector('#kemas').classList.remove("border-b-4", "border-rose-600");
                document.querySelector('#kemas-div').classList.add("hidden");
                document.querySelector('#selesai').classList.remove("border-b-4", "border-rose-600");
                document.querySelector('#selesai-div').classList.add("hidden");
                document.querySelector('#batal').classList.remove("border-b-4", "border-rose-600");
                document.querySelector('#batal-div').classList.add("hidden");
            } else if (id == 'selesai') {
                document.querySelector('#selesai').classList.add("border-b-4", "border-rose-600");
                document.querySelector('#selesai-div').classList.remove("hidden");
                document.querySelector('#kemas').classList.remove("border-b-4", "border-rose-600");
                document.querySelector('#kemas-div').classList.add("hidden");
                document.querySelector('#kirim').classList.remove("border-b-4", "border-rose-600");
                document.querySelector('#kirim-div').classList.add("hidden");
                document.querySelector('#batal').classList.remove("border-b-4", "border-rose-600");
                document.querySelector('#batal-div').classList.add("hidden");
            }  else if (id == 'batal') {
                document.querySelector('#batal').classList.add("border-b-4", "border-rose-600");
                document.querySelector('#batal-div').classList.remove("hidden");
                document.querySelector('#kemas').classList.remove("border-b-4", "border-rose-600");
                document.querySelector('#kemas-div').classList.add("hidden");
                document.querySelector('#kirim').classList.remove("border-b-4", "border-rose-600");
                document.querySelector('#kirim-div').classList.add("hidden");
                document.querySelector('#selesai').classList.remove("border-b-4", "border-rose-600");
                document.querySelector('#selesai-div').classList.add("hidden");
            }
        }
    </script>
@endsection