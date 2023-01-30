<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        return view('user.profile');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'nullable',
            'phone' => 'max:16',
        ], [
            'required' => ':attribute harus diisi',
            'max' => ':attribute maksimal :max karakter',
        ]);

        DB::beginTransaction();

        try {
            $user = User::find(auth()->user()->id_user);
            if ($user){
                $user->nama_depan = $request->nama_depan;
                $user->nama_belakang = $request->nama_belakang;
                $user->telepon = $request->phone;
                $user->gender = $request->gender;
                $user->save();
                DB::commit();
                return redirect()->route('user.profil');
            }
        } catch(\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function foto(Request $request)
    {
        DB::beginTransaction();

        try {
            $image_parts = explode(";base64,", $request->input('foto'));
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $filename = uniqid() . '.png';
            Storage::disk('public')->put('/upload/profil/'.$filename, $image_base64);
            $user = User::find(auth()->user()->id_user);
            $user->foto = $filename;
            $user->save();

            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
