<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $terbaru = Produk::orderBy('id_produk', 'DESC')->take(4)->get();
        return view('pages.home', compact('terbaru'));
    }

    public function detail($id)
    {
        $produk = Produk::where('uuid', $id)->first();
        return view('pages.detail', compact('produk'));
    }
}
