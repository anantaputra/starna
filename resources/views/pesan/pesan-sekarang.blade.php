@extends('layouts.app')

@section('content')
@if (Session::has('error'))
<div id="alert-2" class="flex  mt-4 p-4 mb-4 bg-red-100 rounded-lg" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium text-red-700">
      {{ Session::get('error') }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8" data-dismiss-target="#alert-2" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
@endif

<div class="w-full py-8">
    <div class="grid grid-cols-1 space-y-2 bg-white rounded py-4 px-8 border-t-2 border-rose-600">
        <div class="flex items-center space-x-2 text-rose-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>Alamat Pengiriman</span>
        </div>
        @if (isset($alamat))
        <div class="grid grid-cols-10 pb-2 alamat">
            <div class="grid grid-cols-1 col-span-2">
                <span id="nama-orangnya">{{ $alamat[0]->nama }}</span>
                <span id="telepon-orangnya">{{ $alamat[0]->telepon }}</span>
            </div>
            <div class="grid grid-cols-1 col-span-6">
                <p id="alamat-orangnya">
                    {{ $alamat[0]->alamat.", ".$alamat[0]->kota.", ".$alamat[0]->provinsi.", ".$alamat[0]->kode_pos }}
                </p>
            </div>
            <div class="grid grid-cols-1">
                <span id="utamakah" class="flex justify-center">Utama</span>
            </div>
            <div class="grid grid-cols-1">
                <span id="ubah-alamat" class="flex justify-end cursor-pointer hover:text-blue-500">Ubah</span>
            </div>
        </div>
        @endif
        <div class="grid grid-cols-10 hidden ubah-alamat">
            <div class="col-span-10 text-sm flex justify-end space-x-4">
                <button data-modal-toggle="modalTambahAlamat"  class="flex items-center text-gray-600 border p-2 space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambah Alamat</span>
                </button>
                <a href="{{ route('user.alamat') }}" class="text-gray-600 border p-2">Kelola Alamat</a>
            </div>
            @php
                $alamat = App\Models\AlamatUser::where('id_user', auth()->user()->id_user)->get();
            @endphp
            @if (isset($alamat))
            @foreach ($alamat as $item)
            <div class="col-span-10 grid grid-cols-10 place-items-start p-4">
                <div class="col-span-3 flex items-center font-semibold space-x-6">
                    <input type="radio" name="alamat" value="{{ $item->id }}" id="alamat">
                    @php
                        $no_hp = $item->telepon;
                        $no_hp = substr($no_hp, 3, (strlen($no_hp) - 3));
                    @endphp
                    <label for="alamat">{{ $item->nama }} (+62) {{ $no_hp }}</label>
                </div>
                <div class="col-span-6">
                    <p>{{ $item->alamat }}, {{ $item->kota }}, {{ $item->provinsi }}, ID {{ $item->kode_pos }}</p>
                </div>
                @if ($item->utama == 1)
                <div class="place-self-center flex justify-end text-sm text-gray-600">
                    <span>Utama</span>
                </div>
                @endif
            </div>
            @endforeach
            @endif
            <div class="flex pl-14 space-x-8">
                <button id="ok-alamat" class="bg-rose-600 text-white border border-rose-800 rounded py-2 px-7">OK</button>
                <button id="tutup" class="bg-white border border-gray-500 text-gray-500 rounded py-2 px-7">Batal</button>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 space-y-2 bg-white rounded-t py-4 px-8 mt-4 border-b border-dashed border-gray-300">
        <div class="grid grid-cols-10 pt-4">
            <div class="text-lg font-semibold col-span-6">
                Produk Dipilih
            </div>
            <div class="flex text-sm text-gray-400 justify-center">
                Harga Satuan
            </div>
            <div class="flex text-sm text-gray-400 justify-end">
                Jumlah
            </div>
            <div class="flex text-sm text-gray-400 justify-end col-span-2">
                Subtotal Produk
            </div>
        </div>
        @if (isset($keranjang))      
        @php
            $ttl = 0;
        @endphp
        @foreach ($keranjang as $item)
        <div class="grid grid-cols-10 pt-4 border-b">
            <div class="col-span-6">
                <div class="flex items-center space-x-4">
                    @php
                        $gambar = json_decode($item->produk->gambar);
                    @endphp
                    <img src="{{ isset($item->gambar) ? asset('storage/upload/produk/'.$gambar[0]) : null }}" class="w-12 h-12" alt="">
                    <span class="">{{ $item->produk->nama_produk }}</span>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="flex items-center py-4">
                    <span class="text-sm">Rp{{ number_format($item->produk->harga, 0, '', '.') }}</span>
                </div>
            </div>
            <div class="flex justify-end pr-6">
                <div class="flex items-center py-4">
                    <span class="text-sm">{{ $item->jumlah }}</span>
                </div>
            </div>
            <div class="flex justify-end col-span-2">
                @php
                    $subtotal = $item->produk->harga * $item->jumlah;
                    $ttl += $subtotal;
                @endphp
                <div class="flex items-center p-4">
                    <span class="text-sm">Rp{{ number_format($subtotal, 0, '', '.') }}</span>
                </div>
            </div>
        </div>
        @endforeach      
        <div id="total-harga" class="hidden">{{ $ttl }}</div>
        @else            
        <div class="grid grid-cols-10 pt-4">
            <div class="col-span-4">
                <div class="flex items-center space-x-4">
                    @php
                        $gambar = json_decode($produk->gambar);
                    @endphp
                    <img src="{{ asset('storage/upload/produk/'.$gambar[0].'') }}" class="w-12 h-12" alt="">
                    <span class="">{{ $produk->nama_produk }}</span>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="flex items-center py-4">
                    <span class="text-sm">Rp{{ number_format($produk->harga, 0, '', '.') }}</span>
                </div>
            </div>
            <div class="flex justify-end pr-6">
                <div class="flex items-center py-4">
                    <span class="text-sm">{{ $qty }}</span>
                </div>
            </div>
            <div class="flex justify-end col-span-2">
                @php
                    $subtotal = $produk->harga * $qty;
                @endphp
                <div class="flex items-center p-4">
                    <span class="text-sm">Rp{{ number_format($subtotal, 0, '', '.') }}</span>
                    <div id="total-harga" class="hidden">{{ $subtotal }}</div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="grid grid-cols-7 space-y-2 bg-rose-50 px-8 border-b border-dashed border-gray-300">
        <div class="border-r border-dashed border-gray-300 col-span-3 py-4 px-4">
            <div class="w-full flex items-center space-x-2">
                <label for="pesan">Pesan:</label>
                <input type="text" class="bg-white border border-gray-300 text-gray-900 text-sm rounded focus:ring-0 focus:border-rose-500 block w-full p-2.5" placeholder="Pesan untuk penjual (Opsional)">
            </div>
        </div>
        <div class="col-span-4 py-2 px-4">
            <div class="grid grid-cols-7">
                <div class="col-span-2 text-teal-400 text-sm">Opsi Pengiriman:</div>
                <div id="jasa-kirim" class="col-span-4 grid grid-cols-4 hidden">
                    <div class="col-span-3">
                        <div id="nama-expedisi" class="block">JNE Reg</div>
                        <div id="kapan-diterima" class="block text-sm">
                            <small>Akan diterima pada tanggal 2-4 Jul</small>
                        </div>
                    </div>
                    <div class="text-teal-500 cursor-pointer hover:text-teal-600">
                        <span data-modal-toggle="modalPilihExpedisi">Ubah</span>
                    </div>
                </div>
                <div id="pilih-kirim" class="col-span-4 grid grid-cols-4">
                    <div class="col-span-3">
                        <div class="text-teal-500 cursor-pointer hover:text-teal-600">
                            <span data-modal-toggle="modalPilihExpedisi">Pilih Jasa Pengiriman</span>
                        </div>
                    </div>
                </div>
                <div id="biaya-expedisi-1" class="flex justify-end text-sm hidden">Rp20.000</div>
                <div id="biaya-kirim-1" class="hidden"></div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-4 rounded-b bg-rose-50 px-12 py-6 border-b border-gray-400">
        <div class="col-span-3"></div>
        <div class="flex justify-end items-center">
            @if (isset($keranjang))
            <span class="text-sm text-gray-400 mr-2">Total Pesanan ({{ $keranjang->count() }} Produk):</span> 
            <span class="text-xl text-rose-600" id="harga-ongkir">Rp{{ number_format($ttl, 0, '', '.') }}</span>
            @else
            <span class="text-sm text-gray-400 mr-2">Total Pesanan (1 Produk):</span> 
            <span class="text-xl text-rose-600" id="harga-ongkir">Rp{{ number_format($subtotal
            , 0, '', '.') }}</span>
            @endif
        </div>
    </div>
    {{-- <div class="grid grid-cols-12 bg-white rounded-t mt-4 py-6 px-8">
        <div class="col-span-2 text-lg font-semibold">Metode Pembayaran</div>
        <div class="col-span-10 py-2 space-x-4">
            <button type="button" id="bank" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white ring-2 ring-rose-600 rounded border border-gray-200 hover:bg-rose-600 hover:text-white focus:z-10">Transfer Bank</button>
        </div>
    </div>
    <div class="grid grid-cols-1 bg-white border-y py-4 px-8 border-gray-200">
        <div id="list-bank" class="grid grid-cols-9">
            <div class="col-span-2 text-lg font-semibold">
                Pilih Bank
            </div>
            <div class="col-span-7 space-y-4">
                <div class="flex items-center space-x-6">
                    <input type="radio" value="bri" name="metode"> 
                    <div class="w-12 h-12 border">
                        <img src="{{ asset('img/bri.png') }}" class="w-8 m-2" alt="">
                    </div>
                    <span>Bank BRI</span>
                </div>
                <div class="flex items-center space-x-6">
                    <input type="radio" value="bni" name="metode"> 
                    <div class="w-12 h-12 border">
                        <img src="{{ asset('img/bni.png') }}" class="w-8 mt-4 mx-2" alt="">
                    </div>
                    <span>Bank BNI</span>
                </div>
                <div class="flex items-center space-x-6">
                    <input type="radio" value="permata" name="metode"> 
                    <div class="w-12 h-12 border">
                        <img src="{{ asset('img/permata.png') }}" class="mt-4" alt="">
                    </div>
                    <span>Bank Permata</span>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="grid grid-cols-1 bg-white border-b border-dashed border-gray-300 py-8 px-8 space-y-4">
        <div class="flex justify-end text-sm text-gray-400 space-x-8">
            <span>Subtotal Produk:</span>
            @if (isset($keranjang))
            <span>Rp{{ number_format($ttl, 0, '', '.') }}</span>
            @else
            <span>Rp{{ number_format($subtotal, 0, '', '.') }}</span>
            @endif
        </div>
        <div class="flex justify-end text-sm text-gray-400 space-x-8">
            <span>Biaya Pengiriman:</span>
            <span id="biaya-expedisi-2" class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rp0</span>
        </div>
        <div class="flex justify-end text-sm text-gray-400 space-x-8">
            <span>Biaya Penanganan:</span>
            <span>Rp3.000</span>
        </div>
        <div class="flex justify-end text-sm text-gray-400 space-x-8">
            <span>Total Pembayaran:</span>
            @if (isset($keranjang))
            <span id="totalan-semua" class="text-2xl font-semibold text-rose-600">Rp{{ number_format(($ttl+3000), 0, '', '.') }}</span>
            @else
            <span id="totalan-semua" class="text-2xl font-semibold text-rose-600">Rp{{ number_format(($subtotal+3000), 0, '', '.') }}</span>
            @endif
        </div>
    </div>
    <div class="grid grid-cols-1 bg-white rounded-b py-8 px-6 space-y-4">
        <div class="flex justify-end">
            @if (isset($keranjang))
            <form action="{{ route('checkout.simpan') }}" method="post">
                @csrf
                <input type="hidden" id="alamat-kirim" value="{{ $alamat[0]->id }}" name="alamat">
                <input type="hidden" id="kirim-paket" name="paket">
                <input type="hidden" id="metode_byr" name="metode_byr">
                <input type="hidden" name="total">
                <input type="hidden" name="ongkir">
                <button type="submit" class="w-56 text-white bg-rose-600 hover:bg-rose-500 focus:border-rose-600 focus:ring-0 font-medium rounded text-sm px-5 py-2.5 mr-2 mb-2">Buat Pesanan</button>
            </form>
            @else
            <form action="{{ route('pesan.buat') }}" method="post">
                @csrf
                <input type="hidden" id="alamat-kirim" value="{{ $alamat[0]->id }}" name="alamat">
                <input type="hidden" id="kirim-paket" name="paket">
                <input type="hidden" value="{{ $produk->id_produk }}" name="produk">
                <input type="hidden" value="{{ $qty }}" name="qty">
                <input type="hidden" id="metode_byr" name="metode_byr">
                <input type="hidden" name="total">
                <input type="hidden" name="ongkir">
                <button type="submit" class="w-56 text-white bg-rose-600 hover:bg-rose-500 focus:border-rose-600 focus:ring-0 font-medium rounded text-sm px-5 py-2.5 mr-2 mb-2">Buat Pesanan</button>
            </form>
            @endif
        </div>
    </div>
</div>

<div id="modalPilihExpedisi" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-full">
        <!-- Modal content -->
        <div class="relative bg-white shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-5 border-b">
                <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl">
                    Pilihan Pengiriman
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="modalPilihExpedisi">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <div class="py-4 px-10 space-y-1">
                @php
                    $no = 1;
                @endphp
                @if(isset($pos))
                @foreach ($pos as $item)            
                <div>
                    <input type="radio" class="hidden" value="{{ 'pos '.$item->service."|".$item->cost[0]->etd }}" name="expedisi" id="expedisi-{{ $no }}">
                    <label for="expedisi">
                        <div onclick="choose({{ $no }})" class="flex cursor-pointer">
                            <div id="box-{{$no}}" class="w-4 bg-rose-600 hidden"></div>
                            <div class="w-full flex border rounded py-4 px-8">
                                <img src="{{ asset('img/pos.jpg') }}" alt="" class="w-16 h-16 rounded">
                                <div class="w-full px-8 py-2">
                                    @php
                                        $nama = $item->service;
                                        if(str_contains($nama, 'Pos')){
                                            $nama = $nama;
                                        } else {
                                            $nama = 'Pos '.$nama;
                                        }
                                    @endphp
                                    <div id="nama-jasa-{{ $no }}" class="block text-lg font-semibold">{{ $nama }}</div>
                                    <div id="tgl-terima-{{ $no }}" class="block text-sm"><small>{{ App\Http\Controllers\Api\RajaOngkirController::tglTerima($item->cost[0]->etd) }}</small></div>
                                </div>
                                <div id="value-{{ $no }}" class="w-1/2 flex justify-end items-center text-rose-600 font-semibold text-xl">
                                    Rp{{ number_format($item->cost[0]->value, 0, '', '.') }}
                                </div>
                                <div id="value-kirim-{{ $no }}" class="hidden">{{ $item->cost[0]->value }}</div>
                            </div>
                        </div>
                    </label>
                </div> 
                @php
                    $no++;
                @endphp
                @endforeach
                @endif
                @if(isset($jne))
                @foreach ($jne as $item)            
                <div>
                    <input type="radio" class="hidden" value="{{ 'jne '.$item->service."|".$item->cost[0]->etd }}" name="expedisi" id="expedisi-{{ $no }}">
                    <label for="expedisi">
                        <div onclick="choose({{ $no }})" class="flex cursor-pointer">
                            <div id="box-{{ $no }}" class="w-4 bg-rose-600 hidden"></div>
                            <div class="w-full flex border rounded py-4 px-8">
                                <img src="{{ asset('img/jne.png') }}" alt="" class="w-16 h-16 rounded">
                                <div class="w-full px-8 py-2">
                                    @php
                                        $nama = $item->service;
                                        if(str_contains($nama, 'Jne')){
                                            $nama = $nama;
                                        } else {
                                            $nama = 'Jne '.$nama;
                                        }
                                    @endphp
                                    <div id="nama-jasa-{{ $no }}" class="block text-lg font-semibold">{{ $nama }}</div>
                                    <div id="tgl-terima-{{ $no }}" class="block text-sm"><small>{{ App\Http\Controllers\Api\RajaOngkirController::tglTerima($item->cost[0]->etd) }}</small></div>
                                </div>
                                <div id="value-{{ $no }}" class="w-1/2 flex justify-end items-center text-rose-600 font-semibold text-xl">
                                    Rp{{ number_format($item->cost[0]->value, 0, '', '.') }}
                                </div>
                                <div id="value-kirim-{{ $no }}" class="hidden">{{ $item->cost[0]->value }}</div>
                            </div>
                        </div>
                    </label>
                </div> 
                @php
                    $no++;
                @endphp
                @endforeach
                @endif
                @if(isset($tiki))
                @foreach ($tiki as $item)            
                <div>
                    <input type="radio" class="hidden" value="{{ 'tiki '.$item->service."|".$item->cost[0]->etd }}" name="expedisi" id="expedisi-{{ $no }}">
                    <label for="expedisi">
                        <div onclick="choose({{ $no }})" class="flex cursor-pointer">
                            <div id="box-{{$no}}" class="w-4 bg-rose-600 hidden"></div>
                            <div class="w-full flex border rounded py-4 px-8">
                                <img src="{{ asset('img/tiki.png') }}" alt="" class="w-16 h-16 rounded">
                                <div class="w-full px-8 py-2">
                                    @php
                                        $nama = $item->service;
                                        if(str_contains($nama, 'Tiki')){
                                            $nama = $nama;
                                        } else {
                                            $nama = 'Tiki '.$nama;
                                        }
                                    @endphp
                                    <div id="nama-jasa-{{ $no }}" class="block text-lg font-semibold">{{ $nama }}</div>
                                    <div id="tgl-terima-{{ $no }}" class="block text-sm"><small>{{ App\Http\Controllers\Api\RajaOngkirController::tglTerima($item->cost[0]->etd) }}</small></div>
                                </div>
                                <input type="hidden" name="tgl_terima" value="{{ $item->cost[0]->etd }}">
                                <div id="value-{{ $no }}" class="w-1/2 flex justify-end items-center text-rose-600 font-semibold text-xl">
                                    Rp{{ number_format($item->cost[0]->value, 0, '', '.') }}
                                </div>
                                <div id="value-kirim-{{ $no }}" class="hidden">{{ $item->cost[0]->value }}</div>
                            </div>
                        </div>
                    </label>
                </div> 
                @php
                    $no++;
                @endphp
                @endforeach
                @endif
            </div>
            <div class="w-full flex justify-end px-12 mb-2">
                <button id="set" data-modal-toggle="modalPilihExpedisi" class="text-white bg-rose-600 hover:bg-rose-500 focus:ring-0 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan</button>
            </div>
            <div class="h-4"></div>
        </div>
    </div>
</div> 

<div id="modalTambahAlamat" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-5 border-b">
                <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl">
                    Alamat Baru
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="modalTambahAlamat">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
           {{-- form tambah alamat --}}
            <form action="{{ route('user.alamat.simpan') }}" method="post" class="w-full bg-white border px-2">
                @csrf
                <div class="flex flex-wrap p-5">
                    <div class="w-full flex px-3 space-x-4 mb-4">
                        <input type="text" name="nama" id="name" class="appearance-none border border-gray-200 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nama">
                        <input type="text" name="telepon" id="phone" class="appearance-none border border-gray-200 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nomor Telepon">
                    </div>
                    <div class="w-full flex space-x-4 px-3 mb-4">
                        <div class="w-full">
                            <select name="provinsi" id="province" onchange="showCities()" class="appearence-none border border-gray-200 text-gray-700  leading-tight focus:outline-none focus:shadow-outline rounded block w-full px-3 py-2">
                                <option value="0" selected disabled>--Pilih Provinsi--</option>
                                @foreach ($provinsi as $provins)
                                <option value="{{ $provins->province_id."|".$provins->province }}">{{ $provins->province }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full">
                            <select name="kota" disabled id="city" class="appearence-none border border-gray-200 text-gray-700  leading-tight focus:outline-none focus:shadow-outline rounded block w-full px-3 py-2">
                                <option selected disabled>--Pilih Kota--</option>
                            </select>
                        </div>
                        <div class="w-1/2">
                            <input type="text" name="kode_pos" id="postal" class="appearance-none border border-gray-200 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Kode Pos">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-4">
                        <textarea name="alamat"id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-700 rounded border border-gray-200 " placeholder="Nama Jalan, Gedung, No. Rumah"></textarea>
                    </div>
                    <div class="w-full px-3 mb-4">
                        <button type="submit" class="text-white bg-rose-600 hover:bg-rose-500 focus:ring-0 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 

<script>
    var bank = document.querySelector('#bank');
    var minimarket = document.querySelector('#minimarket');
    var listBank = document.querySelector('#list-bank');
    var listMini = document.querySelector('#list-minimarket');
    bank.addEventListener('click', function(){
        bank.classList.add('ring-2', 'ring-rose-600')
        minimarket.classList.remove('ring-2', 'ring-rose-600')
        listBank.classList.remove('hidden')
        listMini.classList.add('hidden')
    })
    minimarket.addEventListener('click', function(){
        minimarket.classList.add('ring-2', 'ring-rose-600')
        bank.classList.remove('ring-2', 'ring-rose-600')
        listBank.classList.add('hidden')
        listMini.classList.remove('hidden')
    })
</script>
@if (isset($keranjang))  
<script>
    var user   = '{{ auth()->user()->id_user }}';
    var alamat = '{{ $alamat[0]->id }}';
    var method = $("input[name=metode]");
    method.on('change', function(){
        var metode = $("input[name=metode]:checked").val();
        document.querySelector('#metode_byr').value = metode;
    });
</script>
@else
<script>
    var user   = '{{ auth()->user()->id_user }}';
    var alamat = '{{ $alamat[0]->id }}';
    var produk = '{{ $produk->id_produk }}';
    var qty    = '{{ $qty }}';
    var method = $("input[name=metode]");
    method.on('change', function(){
        var metode = $("input[name=metode]:checked").val();
        document.querySelector('#metode_byr').value = metode;
    });
</script>
@endif

{{-- urusan alamat --}}
<script>
    var ubah = document.querySelector('#ubah-alamat');
    var alamat = document.querySelector('.alamat');
    var listAlamat = document.querySelector('.ubah-alamat');
    var batal = document.querySelector('tutup');
    ubah.addEventListener('click', function(){
        alamat.classList.add('hidden');
        listAlamat.classList.remove('hidden');
    })
    tutup.addEventListener('click', function(){
        listAlamat.classList.add('hidden');
        alamat.classList.remove('hidden');
    })
</script>

{{-- data penerima bedasar alamat yg dipilih --}}
<script>
    var namaOrangnya = $('#nama-orangnya');
    var teleponOrangnya = $('#telepon-orangnya');
    var alamatOrangnya = $('#alamat-orangnya');
    var utamakah = $('#utamakah');
    var alamatKirim = $('#alamat-kirim');
    $('#ok-alamat').on('click', () => {
        var alamatBaru = $("input[name=alamat]:checked").val();
        $.ajax({
            url: '{{ route("user.alamat.ganti") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id_alamat: alamatBaru
            },
            success: function(data){
                namaOrangnya.html(data.nama);
                teleponOrangnya.html(data.telepon);
                alamatOrangnya.html(data.alamat+', '+data.kota+', '+data.provinsi+', ID '+data.kode_pos);
                if(data.utama == 0){
                    utamakah.html("");
                }
                alamatKirim.val(data.id);
                listAlamat.classList.add('hidden');
                alamat.classList.remove('hidden');
            }
        })
    })
</script>

{{-- cari kabupaten kalo bikin alamat baru --}}
<script>
    function showCities(){
        var province = document.getElementById('province').value;
        console.log(province)
        if(province != 0){
            $.ajax({
                url: '/user/alamat/kota',
                type: 'GET',
                data: {
                    province: province
                },
                success: function(data){
                    $('#city').removeAttr('disabled');
                    $('#city').find('option').remove().end().append('<option value="0" selected disabled>--Pilih Kota--</option>');
                    $.each(data, function(index, value){
                        $('#city').append('<option value="'+value.city_id+'|'+value.city_name+'">'+value.city_name+'</option>');
                    });
                }
            });
        } else {
            $('#city').attr('disabled', 'disabled');
            $('#city').empty();
            $('#city').append('<option selected disabled>--Pilih Kota--</option>');
        }
    }
</script>

{{-- pilih ekspedsi terus ganti harga pengiriman --}}
<script>
    function choose(id){
        for(var i = 1; i < '{{ $no }}'; i++){
            if(i == id){
                $('#box-'+i).removeClass('hidden');
                var expedisi = $('#expedisi-'+i).val();
                document.querySelector('#kirim-paket').value = expedisi;
                $('#set').click(function(){
            var bea = document.querySelector('#value-'+id).innerHTML;
            var total = document.querySelector('#total-harga').innerHTML;
            var biaya = document.querySelector('#value-kirim-'+id).innerHTML;
            document.querySelector('#biaya-expedisi-1').innerHTML = bea;
            document.querySelector('#biaya-expedisi-1').classList.remove('hidden');
            document.querySelector('#biaya-expedisi-2').innerHTML = bea;
            document.querySelector('#biaya-expedisi-2').classList.remove('hidden');
            var kirim = parseInt(total) + parseInt(biaya);
            var anka = kirim.toString();
            document.querySelector('input[name=ongkir]').value = parseInt(biaya);

            document.querySelector('#harga-ongkir').innerHTML = "Rp"+formatRupiah(anka);
            
            var totalan = parseInt(total) + parseInt(biaya) + 3000;
            var angkanya = totalan.toString();
            
            document.querySelector('#totalan-semua').innerHTML = "Rp"+formatRupiah(angkanya);
            document.querySelector('input[type=hidden][name=total]').value = totalan;

            document.querySelector('#kapan-diterima').innerHTML = document.querySelector('#tgl-terima-'+id).innerHTML
            document.querySelector('#nama-expedisi').innerHTML = document.querySelector('#nama-jasa-'+id).innerHTML
            document.querySelector('#pilih-kirim').classList.add('hidden')
            document.querySelector('#jasa-kirim').classList.remove('hidden')
        })
            } else {
                $('#box-'+i).addClass('hidden');
            }
        }
    }

    function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
</script>

@endsection