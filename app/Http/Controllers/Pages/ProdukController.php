<?php

namespace App\Http\Controllers\Pages;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('pages.product', compact('produk'));
    }
}
