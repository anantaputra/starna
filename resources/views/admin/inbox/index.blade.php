@extends('layouts.admin')

@section('content')

<div class="w-full py-8">
    <div class="flex justify-between mb-4">
        <span class="text-2xl">Pesan Masuk</span>
    </div>
    <div class="space-y-2">
        @foreach ($inbox as $item) 
        <a href="{{ route('admin.inbox.lihat', ['id' => $item->id]) }}" class="block p-6 max-w-full {{ ($item->baca == false) ? 'bg-white' : 'bg-gray-50'}} rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
            <div class="flex items-center space-x-2">
                <p class="mb-2 text-lg font-bold tracking-tight text-gray-900">{{ $item->nama }}</p>
                <p class="mb-2 text-md tracking-tight text-gray-900">({{ $item->email }})</p>
            </div>
            <p class="font-normal text-gray-700">{{ Str::limit($item->pesan, 80) }}</p>
        </a>
        @endforeach
    </div>
</div>
{{ $inbox->links() }}
<div class="mb-2"></div>

@endsection