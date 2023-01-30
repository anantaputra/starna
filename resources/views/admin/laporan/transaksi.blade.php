@extends('layouts.admin')

@section('content')
    
<div class="w-full py-8">
    <div class="flex justify-between">
        <span class="text-2xl">Laporan Transaksi</span>
    </div>
    <div class="w-full border border-gray-600 rounded mt-8">
        <table class="w-full text-sm divide-y divide-gray-600">
          <thead>
            <tr class="bg-gray-50">
              <th class="px-4 py-4 font-medium text-left text-gray-900">No</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Nama Pemesan</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Jumlah</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Total Pembayaran</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Status Pembayaran</th>
            </tr>
          </thead>
      
          <tbody class="divide-y divide-gray-600 bg-white">
            @if (isset($transaksi))
                @php
                    $no = 1;
                @endphp
                @foreach($transaksi as $item)
                <tr>
                  <td class="px-4 py-5 font-medium text-gray-900">{{ $no }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->pesanan->user->nama_depan }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->pesanan->jumlah }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">Rp{{ number_format($item->total, 0, '', '.') }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ strtoupper($item->status) }}</td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
            @endif
          </tbody>
        </table>
    </div>
</div>

@endsection