@extends('layouts.admin')

@section('content')
    
<div class="w-full py-8">
    <div class="flex justify-between">
        <div>
          <span class="text-2xl">Laporan Retur</span>
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
              <th class="px-4 py-4 font-medium text-left text-gray-900">Nomor Pesanan</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900">Nama</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900">Keterangan</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900">Alasan</th>
              <th class="px-4 py-4 font-medium text-left text-gray-900">Status</th>
            </tr>
          </thead>
      
          <tbody class="divide-y divide-gray-600 bg-white">
            @if (isset($retur))
                @php
                    $no = 1;
                @endphp
                @foreach($retur as $item)
                <tr>
                    <td class="px-4 py-5 font-medium text-gray-900">{{ $no }}</td>
                    <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->pesanan->id_pesanan }}</td>
                    <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->user->nama_depan }}</td>
                    <td class="px-4 py-5 text-gray-700 whitespace-nowrap">{{ $item->keterangan }}</td>
                    <td>
                    
                    </td>
                    <td class="px-4 py-5 text-gray-700 whitespace-nowrap">
                    @if ($item->status == 'pending')
                        Sedang Diproses
                    @elseif ($item->status == 'accepted')
                        Diterima
                    @elseif ($item->status == 'denied')
                        Ditolak
                    @else
                        Dibatalkan
                    @endif
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
            @endif
          </tbody>
        </table>
    </div>  
    <div class="my-3">
      {{$retur->links()}}
    </div>
</div>

@endsection

@section('js')
    <script>
      function cetak() 
      {
        open("{{route('admin.laporan.retur.print')}}");
      }
    </script>
@endsection