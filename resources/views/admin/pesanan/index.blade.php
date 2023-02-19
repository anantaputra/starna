@extends('layouts.admin')

@section('content')

<div class="w-full py-8">
    <div class="flex justify-between">
        <div>
            <span class="text-2xl">Daftar Pesanan Masuk</span>
        </div>
        <div class="flex space-x-2 items-center">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
            <select id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 pl-3 pr-8">
              <option value="pending">Belum Dikirim</option>
              <option value="send">Dikirim</option>
            </select>
        </div>
    </div>
    <div class="w-full border border-gray-600 rounded mt-8">
        <table class="w-full text-sm divide-y divide-gray-600">
          <thead>
            <tr class="bg-gray-50">
              <th class="px-4 py-4 font-medium text-left text-gray-900">No</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Nama Penerima</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900">Alamat Penerima</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900">Jasa Pengiriman</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Estimasi Pengiriman</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap">Tanggal Pesan</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900">Status</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900 whitespace-nowrap flex justify-center">Aksi</th>
            </tr>
          </thead>
      
          <tbody class="divide-y divide-gray-600 bg-white" id="tbody">
            @if (isset($pesanan))
                @php
                    $no = 1;
                @endphp
                @foreach($pesanan as $item)
                <tr>
                  <td class="px-4 py-5 font-medium text-gray-900">{{ $no++ }}</td>
                  <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->pesanan->alamat->nama }}</td>
                  <td class="px-4 py-5 text-gray-700">{{ $item->pesanan->alamat->alamat.', '.$item->pesanan->alamat->kota.', '.$item->pesanan->alamat->provinsi }}</td>
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
                  <td class="px-4 py-5 text-gray-700">{{ $jasa }}</td>
                  <td class="px-4 py-5 text-gray-700">{{ $estimasi }}</td>
                  <td class="px-4 py-5 text-gray-700">{{ Carbon\Carbon::parse($item->pesanan->created_at)->format('d M Y') }}</td>
                  <td class="px-4 py-5 text-gray-700 text-center whitespace-nowrap">
                    @if ($item->pesanan->resi != null)
                        Dikirim
                    @else
                        Belum Dikirim
                    @endif
                  </td>
                  <td class="px-4 py-5 text-gray-700 text-center whitespace-nowrap">
                    @if ($item->status == 'settlement')
                      <a href="{{ route('admin.pesanan.detail', ['id' => $item->pesanan->uuid]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Detail</a>
                    @endif
                  </td>
                </tr>
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
        $('#status').change(function() {
          $.ajax({
            url: '{{ route("admin.pesanan.filter") }}',
            type: 'get',
            data: {
              status: $('#status').val()
            },
            success: function(response) {
              $('#tbody').html(``);
              $('#tbody').html(response);
            }
          })
        })
      })
    </script>
@endsection