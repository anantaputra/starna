<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminKategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function tambah()
    {
        $kategori = Kategori::withTrashed()->latest()->first();
        return view('admin.kategori.tambah-kategori', compact('kategori'));
    }

    public function simpan(Request $request)
    {
        $kategori = new Kategori();
        $kategori->id_kategori = $request->id_kategori;
        $kategori->nama_kategori = $request->kategori;
        $kategori->save();
        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function ubah($id)
    {
        $kat = Kategori::where('uuid', $id)->first();
        
        return view('admin.kategori.tambah-kategori', compact('kat'));
    }
}
