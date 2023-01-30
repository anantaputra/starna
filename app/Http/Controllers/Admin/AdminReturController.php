<?php

namespace App\Http\Controllers\Admin;

use App\Models\Retur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminReturController extends Controller
{
    public function index()
    {
        $retur = Retur::all();

        return view('admin.retur.index', compact('retur'));
    }

    public function terima($id)
    {
        $retur = Retur::where('uuid', $id)->first();
        $retur->status = 'accepted';
        $retur->save();
        return redirect()->back();
    }

    public function tolak($id)
    {
        $retur = Retur::where('uuid', $id)->first();
        $retur->status = 'denied';
        $retur->save();
        return redirect()->back();
    }
}
