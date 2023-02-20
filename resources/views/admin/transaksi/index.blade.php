@extends('layouts.admin')

@section('content')
    
<div class="w-full py-8">
    <div class="flex justify-between">
      <div>
        <span class="text-2xl">Daftar Transaksi</span>
      </div>
      <div class="flex space-x-2 items-center">
          <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Filter:</label>
          <input type="date" id="mulai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
          <label for="status" class="block mx-2 mb-2 text-sm font-medium text-gray-900">s.d</label>
          <input type="date" id="akhir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
      
          <tbody class="divide-y divide-gray-600 bg-white" id="tbody">
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
      $(document).ready(function() {
        $('#mulai').change(function() {
          var mulai = $('#mulai').val();
          var akhir = $('#akhir').val();
          if(akhir != ''){
            $.ajax({
              url: '{{route("admin.transaksi.filter")}}',
              type: 'GET',
              data: {
                mulai: mulai,
                akhir: akhir
              },
              success: function(response) {
                $('#tbody').html(``);
                $('#tbody').html(response);
              }
            })
          }
        })
        $('#akhir').change(function() {
          var mulai = $('#mulai').val();
          var akhir = $('#akhir').val();
          if(mulai != ''){
            $.ajax({
              url: '{{route("admin.transaksi.filter")}}',
              type: 'GET',
              data: {
                mulai: mulai,
                akhir: akhir
              },
              success: function(response) {
                $('#tbody').html(``);
                $('#tbody').html(response);
              }
            })
          }
        })
      })
    </script>
@endsection