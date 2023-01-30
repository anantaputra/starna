@extends('layouts.user')

@section('content')

<div class="w-full py-8">
    <div class="flex justify-between">
        <span class="text-2xl">Alamat Saya</span>
        <button type="button" data-modal-toggle="defaultModal" class="text-white bg-rose-600 hover:bg-rose-500 focus:ring-0 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">+ Tambah Alamat</button>
    </div>
    @if (count($alamat) > 0)
    @foreach ($alamat as $item)
    <div class="grid grid-cols-1 overflow-hidden bg-white border border-gray-100 shadow-md rounded-lg group sm:grid-cols-5 mt-8">
        <div class="grid grid-cols-1 place-content-center py-4">
            <span class="w-full flex justify-end">Nama</span>
            <span class="w-full flex justify-end">Telepon</span>
            <span class="w-full flex justify-end">Alamat</span>
            <span class="w-full flex justify-end">Provinsi</span>
            <span class="w-full flex justify-end">Kota</span>
            <span class="w-full flex justify-end">Kode Pos</span>
        </div>

        <div class="p-8 col-span-3">
            <span class="w-full flex justify-start">{{$item->nama}}</span>
            <span class="w-full flex justify-start">{{$item->telepon}}</span>
            <span class="w-full flex justify-start">{{$item->alamat}}</span>
            <span class="w-full flex justify-start">{{$item->provinsi}}</span>
            <span class="w-full flex justify-start">{{$item->kota}}</span>
            <span class="w-full flex justify-start">{{$item->kode_pos}}</span>
        </div>

        <div class="grid grid-cols-1 gap-6">
            <div class="flex justify-center space-x-4 items-end">
                <form action="{{ route('user.alamat.edit') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->uuid }}">
                    <button type="submit">Edit</button>
                </form>
                <a href="{{ route('user.alamat.hapus', ['id' => $item->uuid]) }}">Hapus</a>
            </div>
            <div class="flex justify-center items-start row-span-2">
                @if ($item->utama == true)
                <button class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-white focus:outline-none bg-blue-700 rounded-lg border border-gray-200" disabled>Utama</button>
                @else
                <a href="{{ route('user.alamat.set.utama', ['id' => $item->uuid]) }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Jadikan Utama</a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="w-full grid place-content-center py-32">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-56 w-56 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="text-xl text-gray-300">Anda belum memiliki alamat</span>
    </div>
    @endif
</div>

<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-5 border-b">
                <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl">
                    Alamat Baru
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
           {{-- form tambah alamat --}}
            <form action="{{ route('user.alamat.simpan') }}" method="post" class="w-full bg-white border px-2">
                @csrf
                <div class="flex flex-wrap p-5">
                    <div class="w-full flex px-3 space-x-4 mb-4">
                        <input type="text" name="nama" id="name" class="appearance-none border border-gray-200 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nama">
                        <input type="text" name="telepon" id="phone" class="appearance-none border border-gray-200 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nomor Telepon">
                    </div>
                    <div class="w-full flex space-x-4 px-3 mb-4">
                        <div class="w-full">
                            <select name="provinsi" id="province" onchange="showCities()" class="appearence-none border border-gray-200 text-gray-700  leading-tight focus:outline-none focus:shadow-outline rounded block w-full px-3 py-2">
                                <option value="0" selected disabled>--Pilih Provinsi--</option>
                                @foreach ($provinsi as $provins)
                                <option value="{{ $provins->province_id."|".$provins->province }}">{{ $provins->province }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full">
                            <select name="kota" disabled id="city" class="appearence-none border border-gray-200 text-gray-700  leading-tight focus:outline-none focus:shadow-outline rounded block w-full px-3 py-2">
                                <option selected disabled>--Pilih Kota--</option>
                            </select>
                        </div>
                        <div class="w-1/2">
                            <input type="text" name="kode_pos" id="postal" class="appearance-none border border-gray-200 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Kode Pos">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-4">
                        <textarea name="alamat"id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-700 rounded border border-gray-200 " placeholder="Nama Jalan, Gedung, No. Rumah"></textarea>
                    </div>
                    <div class="w-full px-3 mb-4">
                        <button type="submit" class="text-white bg-rose-600 hover:bg-rose-500 focus:ring-0 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>   

@if (isset($edit))
<div id="editModal" tabindex="-1" aria-hidden="true" data-modal-show="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-5 border-b">
                <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl">
                    Edit Alamat 
                </h3>
                <a href="{{ route('user.alamat.var.edit') }}">
                    <button type="button" class="cls-edit text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="editModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </a>
            </div>
           {{-- form tambah alamat --}}
            <form action="{{ route('user.alamat.update') }}" method="post" class="w-full bg-white border px-2">
                @csrf
                <input type="hidden" name="id" value="{{ $edit->id }}">
                <div class="flex flex-wrap p-5">
                    <div class="w-full flex px-3 space-x-4 mb-4">
                        <input type="text" name="nama" value="{{ $edit->nama }}" id="name" class="appearance-none border border-gray-200 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nama">
                        <input type="text" name="telepon" value="{{ $edit->telepon }}" id="phone" class="appearance-none border border-gray-200 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nomor Telepon">
                    </div>
                    <div class="w-full flex space-x-4 px-3 mb-4">
                        <div class="w-full">
                            <select name="provinsi" id="province_edit" onchange="showCitiesEdit()" class="prov appearence-none border border-gray-200 text-gray-700  leading-tight focus:outline-none focus:shadow-outline rounded block w-full px-3 py-2">
                                <option disabled>--Pilih Provinsi--</option>
                                @foreach ($provinsi as $provins)
                                @if ($edit->kode_provinsi == $provins->province_id)
                                <option value="{{ $provins->province_id }}" selected>{{ $provins->province }}</option>
                                @else
                                <option value="{{ $provins->province_id }}">{{ $provins->province }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" id="kode_kota" value="{{ $edit->kota }}">
                        <div class="w-full">
                            <select name="kota" disabled id="city_edit" class="appearence-none border border-gray-200 text-gray-700  leading-tight focus:outline-none focus:shadow-outline rounded block w-full px-3 py-2">
                                <option selected disabled>{{ $edit->kota }}</option>
                            </select>
                        </div>
                        <div class="w-1/2">
                            <input type="text" name="kode_pos" value="{{ $edit->kode_pos }}" id="postal" class="appearance-none border border-gray-200 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Kode Pos">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-4">
                        <textarea name="alamat"id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-700 rounded border border-gray-200 " placeholder="Nama Jalan, Gedung, No. Rumah">{{ $edit->alamat }}</textarea>
                    </div>
                    <div class="w-full px-3 mb-4">
                        <button type="submit" class="text-white bg-rose-600 hover:bg-rose-500 focus:ring-0 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>   
<script>
    function showCitiesEdit(){
        var province = document.getElementById('province_edit').value;
        console.log(province)
        if(province != 0 ){
            $.ajax({
                url: '/user/alamat/kota',
                type: 'GET',
                data: {
                    province: province
                },
                success: function(data){
                    $('#city_edit').removeAttr('disabled');
                    $('#city_edit').find('option').remove().end().append('<option value="0" selected disabled>--Pilih Kota--</option>');
                    $.each(data, function(index, value){
                        if('{{ $edit->kode_kota }}' == value.city_id){
                            $('#city_edit').append('<option value="'+value.city_id+'|'+value.city_name+'" selected>'+value.city_name+'</option>');
                        } else {
                            $('#city_edit').append('<option value="'+value.city_id+'|'+value.city_name+'">'+value.city_name+'</option>');
                        }
                    });
                }
            });
        } else {
            $('#city_edit').attr('disabled', 'disabled');
            $('#city_edit').empty();
            $('#city_edit').append('<option selected disabled>--Pilih Kota--</option>');
        }
    }
</script>    
@endif

@if (session('status'))
    <script>
        document.querySelector('#defaultModal').setAttribute('data-modal-show', true);
    </script>
@endif
    
<script>
    function showCities(){
        var province = document.getElementById('province').value;
        console.log(province)
        if(province != 0){
            $.ajax({
                url: '/user/alamat/kota',
                type: 'GET',
                data: {
                    province: province
                },
                success: function(data){
                    $('#city').removeAttr('disabled');
                    $('#city').find('option').remove().end().append('<option value="0" selected disabled>--Pilih Kota--</option>');
                    $.each(data, function(index, value){
                        $('#city').append('<option value="'+value.city_id+'|'+value.city_name+'">'+value.city_name+'</option>');
                    });
                }
            });
        } else {
            $('#city').attr('disabled', 'disabled');
            $('#city').empty();
            $('#city').append('<option selected disabled>--Pilih Kota--</option>');
        }
    }
</script>
@endsection