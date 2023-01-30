@extends('layouts.admin')

@section('content')
    
<div class="w-full py-8">
    <div class="flex justify-between">
        <span class="text-2xl">Laporan Pesanan</span>
    </div>
    <div class="w-full border border-gray-600 rounded mt-8">
        <table class="w-full text-sm divide-y divide-gray-600">
          <thead>
            <tr class="bg-gray-50">
              <th class="px-4 py-4 font-medium text-left text-gray-900">No</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900">Kode Pesan</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Nama Penerima</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900">Alamat Penerima</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Tanggal Pesan</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900">Status</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Total Pesanan</th>
            </tr>
          </thead>
      
          <tbody class="divide-y divide-gray-600 bg-white">
            @if (isset($pesanan))
                @php
                    $no = 1;
                @endphp
                @foreach($pesanan as $item)
                <tr>
                  <td class="px-4 py-5 font-medium text-gray-900">{{ $no++ }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->pesanan->id_pesanan }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->pesanan->alamat->nama }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->pesanan->alamat->alamat.', '.$item->pesanan->alamat->kota.', '.$item->pesanan->alamat->provinsi }}</td>
                  <td class="px-4 py-5 text-gray-700">{{ Carbon\Carbon::parse($item->pesanan->created_at)->format('d M Y') }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">
                    @if ($item->pesanan->status == 'pending')
                        Belum Dikirim
                    @elseif ($item->pesanan->status == 'send')
                        Dikirim
                    @elseif ($item->pesanan->status == 'accepted')
                        Diterima 
                    @elseif ($item->pesanan->status == 'returned')
                        Proses Retur 
                    @elseif ($item->pesanan->status == 'retur accepted')
                        Retur Diterima 
                    @elseif ($item->pesanan->status == 'retur denied')
                        Retur Ditolak 
                    @endif
                  </td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">Rp{{ number_format($item->total, 0, '', '.') }}</td>
                </tr>
                @endforeach
            @endif
          </tbody>
        </table>
    </div>
</div>

@endsection