@extends('layouts.user')

@section('content')
<div class="w-full py-8">
    <div class="text-2xl mb-4">Retur Pesanan</div>
    @if (isset($retur))
    @foreach ($retur as $item)
    <div class="w-full flex flex-row items-center px-8 py-4 bg-white border mt-2">
        <div class="w-1/2 flex p-4 leading-normal">
            <div class="w-2/5 flex flex-col">
                <h5 class="font-semibold tracking-tight">No Pesanan</h5>
                <p class="font-semibold">Keterangan</p>
                <p class="font-semibold">No Resi</p>
                <p class="mb-3 font-semibold">
                    Status
                </p>
            </div>
            <div class="flex flex-col">
                <h5 class="text-xl font-bold tracking-tight text-rose-600">{{ $item->id_pesanan }}</h5>
                <h5 class="tracking-tight text-gray-900">{{ $item->keterangan }}</h5>
                <p class="font-semibold text-gray-700">{{ $item->pesanan->resi }}</p>
                <p class="mb-3 font-semibold text-rose-600">
                    @if ($item->status == 'pending')
                        Sedang Diproses
                    @elseif ($item->status == 'accepted')
                        Diterima
                    @elseif ($item->status == 'denied')
                        Ditolak
                    @else
                        Dibatalkan
                    @endif
                </p>
            </div>
        </div>
        <div class="w-1/2 grid grid-cols-1 gap-2">
            <div class="flex justify-end">
                <a href="{{ route('user.retur.tambah', ['id' => $item->uuid]) }}" class="w-24 px-8 py-2.5 text-rose-600 border border-rose-600">Edit</a>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('user.retur.tambah', ['id' => $item->uuid]) }}" class="w-24 px-8 py-2.5 bg-rose-600 text-white">Batal</a>
            </div>
        </div>
    </div>
    @endforeach
    @else
        
    @endif
</div>
@endsection