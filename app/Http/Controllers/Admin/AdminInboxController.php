<?php

namespace App\Http\Controllers\Admin;

use App\Models\Inbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminInboxController extends Controller
{
    public function _construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $inbox = Inbox::latest()->paginate(10);

        return view('admin.inbox.index', compact('inbox'));
    }

    public function lihat($id)
    {
        $inbox = Inbox::where('uuid', $id)->first();
        $inbox->baca = true;
        $inbox->save();

        return view('admin.inbox.lihat', compact('inbox'));
    }

    public static function cekInbox()
    {
        $jml = Inbox::where('baca', false)->get();

        return count($jml);
    }
}
