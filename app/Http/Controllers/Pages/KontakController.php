<?php

namespace App\Http\Controllers\Pages;

use App\Models\Inbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KontakController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function saran(Request $request)
    {
        $inbox = new Inbox();
        $inbox->nama = $request->name;
        $inbox->email = $request->email;
        $inbox->pesan = $request->message;
        $inbox->save();

        return redirect()->route('kontak')->with('status', 'berhasil');
    }
}
