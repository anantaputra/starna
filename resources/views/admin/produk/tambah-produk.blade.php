@extends('layouts.admin')

@section('css')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 150px;
        }
    </style>
@endsection

@section('content')

<div class="w-full py-8">
    <span class="text-2xl" id="coba">{{ isset($prd) ? 'Edit Produk' : 'Tambah Produk' }}</span>
    <form method="POST" action="{{ isset($prd) ? route('admin.produk.edit') : route('admin.produk.simpan') }}" class="w-full mt-8 space-y-4">
        @csrf
        <div class="grid grid-cols-9 gap-3">
            <div class="grid grid-cols-1 col-span-4 space-y-1">
                @if (isset($produk))
                    @php
                        $id =  $produk->id_produk;
                        $urutan  = (int) substr($id, 4, 5);
                        $urutan++;
                        $huruf = 'PRD-';
                        $id_produk = $huruf . sprintf("%05s", $urutan);
                    @endphp
        
                <div class="grid grid-cols-1 gap-2">
                    <label for="id_produk" class="w-full mb-2 mt-2 text-sm font-medium ">ID Produk</label>
                    <input type="text" name="id_produk" value="{{ $prd->id_produk ?? $id_produk }}" readonly id="id_produk" class="bg-gray-100 rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400">
                    @error('id_produk')
                        <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
                    @enderror
                </div>
                @else
                <div class="grid grid-cols-1 gap-2">
                    <label for="id_produk" class="w-full mb-2 mt-2 text-sm font-medium ">ID Produk</label>
                    <input type="text" name="id_produk" value="{{ $prd->id_produk ?? 'PRD-00001' }}" readonly id="id_produk" class="bg-gray-100 rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400" placeholder="Password">
                    @error('id_produk')
                        <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
                    @enderror
                </div>
                @endif
                <div class="grid grid-cols-1 gap-2">
                    <label for="produk" class="w-full mb-2 mt-2 text-sm font-medium ">Nama Produk</label>
                    <input type="text" name="produk" value="{{ $prd->nama_produk ?? null }}" id="produk" class="bg-white rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400" placeholder="Nama Produk">
                    @error('produk')
                        <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
                    @enderror
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <label for="harga" class="w-full mb-2 mt-2 text-sm font-medium ">Harga Produk</label>
                    <input type="number" name="harga" value="{{ $prd->harga ?? null }}" id="harga" class="bg-white rounded border-gray-300 p-2.5 focus:outline-none focus:ring-0 focus:border-rose-400" placeholder="50000">
                    @error('harga')
                        <div class="ml-20 text-sm text-red-500 italic">{{ $message }}</div>
                    @enderror
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <label for="kategori" class="w-full mb-2 mt-2 text-sm font-medium ">Kategori Produk</label>
                    <select name="kategori" id="kategori" class="bg-white border border-gray-300 rounded focus:outline-none focus:ring-0 focus:border-rose-400 block w-full p-2.5">
                        <option value="0" disabled selected>-Pilih Kategori-</option>
                        @if (isset($prd))
                            @if (isset($kategori))
                            @foreach ($kategori as $item)
                            <option {{ $prd->id_kategori == $item->id_kategori ? 'selected' : '' }} value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                            @endif
                        @else
                            @if (isset($kategori))
                            @foreach ($kategori as $item)
                            <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                            @endif
                        @endif
                    </select>
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <label for="deskripsi" class="w-full mb-2 mt-2 text-sm font-medium ">Deskripsi Produk</label>
                    <textarea name="deskripsi" class="bg-white border border-gray-300 rounded focus:outline-none focus:ring-0 focus:border-rose-400 block w-full p-2.5" id="deskripsi" cols="30" rows="8">{{ isset($prd) ? $prd->deskripsi : '' }}</textarea>
                </div>
            </div>
            <div class="grid grid-cols-1 col-span-5">
                <div class="grid grid-cols-1">
                    <label for="gambar" class="w-full mb-2 mt-2 text-sm font-medium ">Gambar Produk (minimal 1)</label>
                    <div class="grid grid-cols-3">
                        <div class="w-full parent">
                            <input type="hidden" name="nama_img1" id="nama_img1">
                            <input type="file" name="img-1" id="img-1" class="hidden" accept="image/*">
                            <label for="img-1">
                                <div class="w-40 h-40 border border-dashed rounded cursor-pointer hover:bg-blue-50" id="img-1-preview">
                                    @if (isset($prd))
                                    @php
                                        $gambar = json_decode($prd->gambar);
                                    @endphp
                                    @endif
                                    @if (isset($gambar[0]))
                                    <div id="parent-crop-1" class="relative grid grid-cols-1 content-end w-40 h-40 rounded border border-dashed">
                                        <img class="w-full h-40" src="{{ asset('upload/produk/'.$gambar[0]) }}" alt="">
                                    </div>                                         
                                    @else
                                    <div class="flex flex-col justify-center items-center pt-6 pb-6">
                                        <svg class="mb-3 w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-2 text-sm text-center text-gray-500"><span class="font-semibold">Click to upload</span><br> or drag and drop</p>
                                        <p class="text-xs text-center text-gray-500">SVG, PNG, JPG or GIF <br> (MAX. 400x400px)</p>
                                    </div>
                                    @endif
                                </div>    
                            </label>
                        </div>
                        <div class="w-full parent">
                            <input type="hidden" name="nama_img2" id="nama_img2">
                            <input type="file" name="img-2" id="img-2" class="hidden" accept="image/*">
                            <label for="img-2">
                                <div class="w-40 h-40 border border-dashed rounded cursor-pointer hover:bg-blue-50" id="img-2-preview">
                                    @if (isset($gambar[1]))
                                    <div id="parent-crop-2" class="relative grid grid-cols-1 content-end w-40 h-40 rounded border border-dashed">
                                        <img class="w-full h-40" src="{{ asset('upload/produk/'.$gambar[1]) }}" alt="">
                                    </div>                                          
                                    @else
                                    <div class="flex flex-col justify-center items-center pt-6 pb-6">
                                        <svg class="mb-3 w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-2 text-sm text-center text-gray-500"><span class="font-semibold">Click to upload</span><br> or drag and drop</p>
                                        <p class="text-xs text-center text-gray-500">SVG, PNG, JPG or GIF <br> (MAX. 400x400px)</p>
                                    </div>
                                    @endif
                                </div>    
                            </label>
                        </div>
                        <div class="w-full parent">
                            <input type="hidden" name="nama_img3" id="nama_img3">
                            <input type="file" name="img-3" id="img-3" class="hidden" accept="image/*">
                            <label for="img-3">
                                <div class="w-40 h-40 border border-dashed rounded cursor-pointer hover:bg-blue-50" id="img-3-preview">
                                    @if (isset($gambar[2]))
                                    <div id="parent-crop-3" class="relative grid grid-cols-1 content-end w-40 h-40 rounded border border-dashed">
                                        <img class="w-full h-40" src="{{ asset('upload/produk/'.$gambar[2]) }}" alt="">
                                    </div>        
                                    @else
                                    <div class="flex flex-col justify-center items-center pt-6 pb-6">
                                        <svg class="mb-3 w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-2 text-sm text-center text-gray-500"><span class="font-semibold">Click to upload</span><br> or drag and drop</p>
                                        <p class="text-xs text-center text-gray-500">SVG, PNG, JPG or GIF <br> (MAX. 400x400px)</p>
                                    </div>
                                    @endif
                                </div>    
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1">
                    <label for="berat" class="w-full mb-2 mt-2 text-sm font-medium ">Berat Produk</label>
                    <div class="w-1/2 h-12 flex">
                        <input name="berat" type="text" value="{{ $prd->berat ?? null }}" id="website-admin" class="rounded-none rounded-l-lg border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 px-4 py-2.5" placeholder="1000">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-r-md border border-r-0 border-gray-300">
                          gram
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-1">
                    <label for="stok" class="w-full mb-2 mt-2 text-sm font-medium ">Stok Produk</label>
                    <div class="w-1/2 h-12 flex">
                        <input name="stok" type="text" value="{{ $prd->stok ?? null }}" id="website-admin" class="rounded-lg border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 px-4 py-2.5" placeholder="10">
                    </div>
                </div>
                <div class="row-span-6"></div>
                <div class="grid grid-cols-2 gap-3">
                    <button type="submit" class="h-10 text-white bg-rose-600 hover:bg-rose-500 focus:ring-0 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan</button>
                    <a href="" class="h-10 text-rose-600 bg-white border border-rose-600 hover:bg-rose-600 hover:text-white focus:ring-0 focus:outline-none font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center">Batal</a>
                </div>
            </div>
        </div>
    </form>
</div>

<button id="btn-1" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="extralarge-modal-1">
    Toggle modal
</button>

<div id="extralarge-modal-1" tabindex="-1" class="justify-center hidden overflow-y overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-7xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b">
                <h3 class="text-xl font-medium text-gray-900">
                    Crop Gambar
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="extralarge-modal-1">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <img src="" id="preview-1" class="h-96 w-full" alt="">
            </div>
            <!-- Modal footer -->
            <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                <button data-modal-toggle="extralarge-modal-1" id="lanjut-1" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Lanjutkan</button>
                <button data-modal-toggle="extralarge-modal-1" id="batal-1" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
            </div>
        </div>
    </div>
</div>

<button id="btn-2" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="extralarge-modal-2">
    Toggle modal
</button>

<div id="extralarge-modal-2" tabindex="-1" class="justify-center hidden overflow-y overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-7xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b">
                <h3 class="text-xl font-medium text-gray-900">
                    Crop Gambar
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="extralarge-modal-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <img src="" id="preview-2" class="h-96 w-full" alt="">
            </div>
            <!-- Modal footer -->
            <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                <button data-modal-toggle="extralarge-modal-2" id="lanjut-2" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Lanjutkan</button>
                <button data-modal-toggle="extralarge-modal-2" id="batal-2" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
            </div>
        </div>
    </div>
</div>

<button id="btn-3" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="extralarge-modal-3">
    Toggle modal
</button>

<div id="extralarge-modal-3" tabindex="-1" class="justify-center hidden overflow-y overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-7xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b">
                <h3 class="text-xl font-medium text-gray-900">
                    Crop Gambar
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="extralarge-modal-3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <img src="" id="preview-3" class="h-96 w-full" alt="">
            </div>
            <!-- Modal footer -->
            <div class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                <button data-modal-toggle="extralarge-modal-3" id="lanjut-3" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Lanjutkan</button>
                <button data-modal-toggle="extralarge-modal-3" id="batal-3" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    var cropper;
    function crop(id){
        var image = document.querySelector('#preview-'+id);
        const btn = document.querySelector('#btn-'+id);
        const lanjut = document.querySelector('#lanjut-'+id);
        const batal = document.querySelector('#batal-'+id);
        const modal = document.querySelector('#extralarge-modal-'+id);
        var cropBoxData;
        var canvasData;
        document.querySelector('#img-'+id).addEventListener('change', function(e){
            if(e.target.files.length == 0){
                return;
            }
            let file = e.target.files[0];
            let url = URL.createObjectURL(file);
            image.src = url;
            btn.click();
            cropper = new Cropper(image, {
                aspectRatio: 1 / 1,
                viewMode: 1,
                ready: function(){
                    cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
                }
            });
        })
        lanjut.addEventListener('click', function(){
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
                    document.querySelector('#nama_img'+id).value = base64data;
                    document.querySelector('#img-'+id+'-preview').removeChild(document.querySelector('#img-'+id+'-preview').firstElementChild);
                    let div =   '<div id="parent-crop-'+id+'" class="relative grid grid-cols-1 content-end w-40 h-40 rounded border border-dashed">\
                                    <img class="w-full h-40" src="'+url+'" alt="">\
                                </div>';
                    document.querySelector('#img-'+id+'-preview').innerHTML = div;
                }
            });
        })
    }
    crop(1)
    crop(2)
    crop(3)
</script>
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#deskripsi' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection