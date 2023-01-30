@extends('layouts.admin')

@section('content')

<div class="w-full py-8">
    <div class="bg-white w-full h-[85vh]">
        <div class="px-10 pt-8 py-4 flex items-center space-x-2">
            <p class="mb-2 text-lg font-bold tracking-tight text-gray-900">{{ $inbox->nama }}</p>
            <p class="mb-2 text-md tracking-tight text-gray-900">({{ $inbox->email }})</p>
        </div>
        <div class="px-10">
            <p class="font-normal text-gray-700">{{ $inbox->pesan }}</p>
        </div>
    </div>
</div>

@endsection