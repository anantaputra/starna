<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
      
    public function index()
    {
        return view('user.password');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ], [
            'required' => ':attribute harus diisi',
            'min' => ':attribute mininal :min karakter',
            'confirmed' => 'konfirmasi :attribute tidak cocok'
        ]);

        try{
            $user = User::find(auth()->user()->id_user);
            $user->password = bcrypt($request->password);
            return redirect()->back()->with('success', 'Password Berhasil Diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('error', 'Pembaruan password gagal! Silahkan coba lagi nanti');
        }
    }
}
