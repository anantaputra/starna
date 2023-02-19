<?php

namespace App\Http\Controllers\User;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagihanUserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        // $tagihan = Transaksi::with(['pesanan' => function ($q) {
        //     $q->where('id_user', auth()->user()->id_user);
        // }])->where('status', 'pending')->get();
        $tagihan = Transaksi::with('pesanan')
                    ->whereHas('pesanan', function ($q) {
                        $q->where('id_user', auth()->user()->id_user);
                    })->where('status', 'pending')
                    ->get();
        
        return view('user.tagihan', compact('tagihan'));
    }

    public function detail($id)
    {
        $transaksi = Transaksi::where('uuid', $id)->first();

        return view('pesan.tagihan', compact('transaksi'));
    }
    
    public function tagihan($id)
    {
        $id = decrypt($id);
        $transaksi = Transaksi::find($id);
        return view('pesan.tagihan', compact('transaksi'));
    }

    public static function jmlTagihan()
    {
        // $tagihan = Transaksi::with(['pesanan' => function($q){
        //     $q->where('id_user', auth()->user()->id_user);
        // }])->where('status', 'pending')->get();
        $tagihan = Transaksi::with('pesanan')
                    ->whereHas('pesanan', function ($q) {
                        $q->where('id_user', auth()->user()->id_user);
                    })->where('status', 'pending')
                    ->get();

        return count($tagihan);
    }
}
