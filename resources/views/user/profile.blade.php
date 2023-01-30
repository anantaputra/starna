@extends('layouts.user')

@section('content')

<style>
.cropper-crop-box, .cropper-view-box {
    border-radius: 50%;
}

.cropper-view-box {
    box-shadow: 0 0 0 1px #39f;
    outline: 0;
}
</style>
    
<div class="w-full py-8">

    @error('verify')
    <div class="px-8">
        <div id="alert-border-2" class="flex p-4 mb-4 text-red-700 bg-red-100 border-t-4 border-red-500 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium">
                {{ $message }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8"  data-dismiss-target="#alert-border-2" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
    @enderror

    <span class="text-2xl">Profil Saya</span>
    <div class="w-full flex">
        <form method="POST" action="{{ route('user.profil.simpan') }}" class="w-1/2 mt-8 space-y-4">
            @csrf
            <div class="grid grid-cols-2 gap-2">
                <div class="grid grid-cols-1 gap-2">
                    <label for="nama_depan">Nama Depan</label>
                    <input type="text" name="nama_depan" id="nama_depan" value="{{ auth()->user()->nama_depan }}" class="bg-white rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400">
                    @error('nama_depan')
                        <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
                    @enderror
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <label for="nama_belakang">Nama Belakang</label>
                    <input type="text" name="nama_belakang" id="nama_belakang" value="{{ auth()->user()->nama_belakang }}" class="bg-white rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400">
                    @error('nama_belakang')
                        <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="block mb-6 space-y-2">
                <label for="email" class="mb-2 mt-2 text-sm font-medium ">Email</label>
                <div class="w-5/6 flex space-x-2">
                    @php 
                        $email = auth()->user()->email;
                        $email = explode('@', $email);
                        $dns = $email[1];
                        $length = strlen($email[0]);
                        $email = $email[0];
                        $bin = '';
                        if($length > 5) {
                            for($i = 3; $i < $length - 2; $i++) {
                                $bin .= '*';
                            }
                            $email = substr($email, 0, 3).$bin.substr($email, $length - 2, $length).'@'.$dns;
                        } else {
                            for($i = 2; $i < $length; $i++) {
                                $bin .= '*';
                            }
                            $email = substr($email, 0, 2).$bin.'@'.$dns;
                        }
                    @endphp
                    <span>{{ $email }}</span>
                    @if (auth()->user()->email_verified_at == null)
                        <span><a role="button" onclick="verifikasi()" class="text-blue-600 underline">verifikasi</a></span>
                    @else
                        <span><a href="" class="text-blue-600 underline">ubah</a></span>
                    @endif
                </div>
            </div>
            <div class="grid grid-cols-1 gap-2">
                <label for="phone" class="w-full mb-2 mt-2 text-sm font-medium ">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ auth()->user()->telepon }}" class="bg-white rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400" placeholder="087889911xxx">
                @error('phone')
                    <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
                @enderror
            </div>
            <div class="block mb-6 space-y-2">
                <label for="gender" class="mb-2 -mt-2 text-sm font-medium">Gender</label>
                <div class="w-5/6 flex space-x-4">
                    <div class="flex items-center mb-4">
                        <input id="laki-laki" {{ (auth()->user()->gender == 'laki-laki') ? 'checked' : '' }} type="radio" name="gender" value="laki-laki" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="country-option-1" aria-describedby="country-option-1">
                        <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900">
                          Laki-laki
                        </label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="perempuan" {{ (auth()->user()->gender == 'perempuan') ? 'checked' : '' }} type="radio" name="gender" value="perempuan" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="country-option-1" aria-describedby="country-option-1">
                        <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900">
                          Perempuan
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="text-white bg-rose-600 hover:bg-rose-500 focus:ring-0 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan</button>
        </form>
        <div class="w-1/2 grid grid-cols-1 gap-5 place-content-center px-32 py-16">
            <img class="w-56 h-56 rounded-full" src="{{ (isset(auth()->user()->foto)) ? asset('upload/profil/'.auth()->user()->foto.'') : asset('img/user.svg') }}" alt="">
            <button class="w-24 flex items-center space-x-2 place-self-center px-4 py-1 border border-rose-600 rounded hover:bg-rose-600 hover:text-white" type="button" data-modal-toggle="defaultModal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
                <span>Ubah</span>
            </button>
        </div>
    </div>
</div>

<div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-900">
                    Ubah Profil
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="flex justify-center items-center w-full">
                    <label for="profil" id="label" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer">
                        <div class="flex flex-col justify-center items-center pt-5 pb-6">
                            <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500">SVG, PNG, JPG</p>
                        </div>
                    </label>
                    <img class="w-full h-64 hidden" src="" id="img">
                </div> 
                <input id="profil" type="file" name="profil" class="hidden" accept="image/*"/>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                <button id="simpan" data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')    
<script>
    function verifikasi() {
        $.ajax({
            url: "{{ route('verification.send') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function (data) {
                console.log(data)
                console.log('kirim')
            }
        })
    }
    
    var uploadProfil = document.querySelector('input[type=file][name=profil]');
    uploadProfil.onchange = function(){
        if(uploadProfil.files.length != 0){

            var cropper;
            var btn = document.querySelector('#simpan');
            var url = URL.createObjectURL(uploadProfil.files[0]);
            document.querySelector('#label').remove();
            var img = document.querySelector('#img');
            img.src = url;
            cropper = new Cropper(img, {
                aspectRatio: 1 / 1,
                viewMode: 1,
                ready: function(){
                    
                }
            });
            img.classList.remove('hidden');

            btn.onclick = function(){
                var canvas = cropper.getCroppedCanvas({
                    width: 160,
                    height: 160,
                })
                canvas.toBlob(function(blob) {
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob); 
                    reader.onloadend = function() {
                        var base64data = reader.result;
                        cropper.destroy();
                        cropper = null;
                        $.ajax({
                            url: '{{ route("user.profil.foto") }}',
                            type: 'post',
                            data: {
                                _token: '{{ csrf_token() }}',
                                foto: base64data
                            },
                            success: function(data){
                                if(data == false){
                                    console.log('salah');
                                } else {
                                    location.reload();
                                }
                            }
                        })
                    }
                });
            }
            
        }
    }
</script>
@endsection