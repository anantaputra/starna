@extends('layouts.user')

@section('content')

@if (Session::has('success'))
<div id="alert-3" class="flex p-4 mt-4 mb-4 text-green-800 rounded-lg bg-green-200" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium">
        {{ Session::get('success') }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
@endif

@error('failed')
<div id="alert-2" class="flex p-4 mt-4 mb-4 text-red-800 rounded-lg bg-red-200" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium">
        {{ $message }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8" data-dismiss-target="#alert-2" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
@enderror

<div class="w-full py-8">
    <span class="text-2xl">Ganti Password</span>
    <form method="POST" action="" class="w-1/2 mt-8 space-y-4">
        @csrf
        <div class="grid grid-cols-1 gap-2">
            <label for="password" class="w-full mb-2 mt-2 text-sm font-medium ">Password</label>
            <input type="text" name="password" id="password" class="bg-white rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400" placeholder="Password" autocomplete="off">
            @error('password')
                <div class="text-sm text-red-500 italic">{{ $message }}</div>
            @enderror
        </div>
        <div class="grid grid-cols-1 gap-2">
            <label for="password_confirmation" class="w-full mb-2 mt-2 text-sm font-medium ">Konfirmasi Password</label>
            <input type="text" name="password_confirmation" id="password_confirmation" class="bg-white rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400" placeholder="Konfirmasi Password" autocomplete="off">
            @error('password_confirmation')
                <div class="text-sm text-red-500 italic">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="text-white bg-rose-600 hover:bg-rose-500 focus:ring-0 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan</button>
    </form>
</div>
@endsection