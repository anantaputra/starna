<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'));
    }

    public function tambah()
    {
        $kategori = Kategori::all();
        
        $produk = Produk::withTrashed()->latest()->first();
        
        return view('admin.produk.tambah-produk', compact('kategori', 'produk'));
    }

    public function simpan(Request $request)
    {
        DB::beginTransaction();
        try{
            $produk = new Produk();
            $produk->id_produk = $request->id_produk;
            $produk->id_kategori = $request->kategori;
            $produk->nama_produk = $request->produk;
            $produk->harga = $request->harga;
            $produk->deskripsi = $request->deskripsi;
            $produk->berat = $request->berat;
            $produk->stok = $request->stok;
            for($i = 1; $i <= 3; $i++){
                if($request->input('nama_img'.$i) != null){
                    $image_parts = explode(";base64,", $request->input('nama_img'.$i));
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $image_base64 = base64_decode($image_parts[1]);
                    $filename = uniqid() . '.png';
                    Storage::disk('public')->put('/upload/produk/'.$filename, $image_base64);
                    $gambar[] = $filename;
                }
            }
            $gmb = json_encode($gambar);
            $produk->gambar = $gmb;
            $produk->save();
            DB::commit();
            return redirect()->route('admin.produk');
        }catch(\Exception $e){
            dd($e);
            DB::rollBack();
            // return redirect()->back();
        }
    }

    public function ubah($id)
    {
        $prd = Produk::where('uuid', $id)->first();

        $kategori = Kategori::all();

        return view('admin.produk.tambah-produk', compact('prd', 'kategori'));
    }

    public function edit(Request $request)
    {
        DB::beginTransaction();
        try{
            $produk = Produk::find($request->id_produk);
            $produk->id_kategori = $request->kategori;
            $produk->nama_produk = $request->produk;
            $produk->harga = $request->harga;
            $produk->deskripsi = $request->deskripsi;
            $produk->berat = $request->berat;
            $produk->stok = $request->stok;
            $gambar = json_decode($produk->gambar);
            for($i = 1; $i <= 3; $i++){
                if($request->input('nama_img'.$i) != null){
                    $image_parts = explode(";base64,", $request->input('nama_img'.$i));
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $image_base64 = base64_decode($image_parts[1]);
                    $filename = uniqid() . '.png';
                    Storage::disk('public')->put('/upload/produk/'.$filename, $image_base64);
                    $gambar[] = $filename;
                }
            }
            $gmb = json_encode($gambar);
            $produk->gambar = $gmb;
            $produk->save();
            DB::commit();
            return redirect()->route('admin.produk');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function hapus($id)
    {
        $produk = Produk::where('uuid', $id)->first();
        $produk->delete();
        return redirect()->back();
    }
}
