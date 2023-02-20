@extends('layouts.admin')

@section('content')
    
<div class="w-full py-8">
  <div class="flex justify-between">
    <div>
      <span class="text-2xl">Laporan Transaksi</span>
    </div>
    <div>
      <button onclick="cetak()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Cetak</button>
    </div>
  </div>
    <div class="w-full border border-gray-600 rounded mt-8">
        <table class="w-full text-sm divide-y divide-gray-600">
          <thead>
            <tr class="bg-gray-50">
              <th class="px-4 py-4 font-medium text-left text-gray-900">No</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Nama Pemesan</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Total Pembayaran</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Tanggal</th>
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
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">Rp{{ number_format($item->total, 0, '', '.') }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ Carbon\Carbon::parse($item->updated_at)->format('d M Y') }}</td>
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

@section('js')
    <script>
      function cetak() 
      {
        open("{{route('admin.laporan.transaksi.print')}}");
      }
    </script>
@endsection