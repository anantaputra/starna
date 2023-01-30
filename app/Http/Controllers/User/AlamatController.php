<?php

namespace App\Http\Controllers\User;

use App\Models\AlamatUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Api\RajaOngkirController;

class AlamatController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $alamat = AlamatUser::where('id_user', auth()->user()->id_user)->get();
        $provinsi = RajaOngkirController::semua_provinsi();
        if($request->id){
            $edit = AlamatUser::where('uuid', $request->id)->first();
            return view('user.alamat', compact('provinsi', 'alamat', 'edit'));
        } else {
            return view('user.alamat', compact('provinsi', 'alamat'));
        }
    }

    public function var_edit()
    {        
        Session::forget('edit');
        return redirect()->route('user.alamat');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'id' => 'nullable',
            'nama' => 'required',
            'telepon' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
            'alamat' => 'required',
        ]);

        $provinsi = explode('|', $request->provinsi);
        $kode_provinsi = $provinsi[0];
        $nama_provinsi = $provinsi[1];
        $kota = explode('|', $request->kota);
        $kode_kota = $kota[0];
        $nama_kota = $kota[1];
        $alamat = new AlamatUser();
        $alamat->id_user = auth()->user()->id_user;
        $alamat->nama = $request->nama;
        $alamat->telepon = $request->telepon;
        $alamat->provinsi = $nama_provinsi;
        $alamat->kota = $nama_kota;
        $alamat->kode_provinsi = $kode_provinsi;
        $alamat->kode_kota = $kode_kota;
        $alamat->kode_pos = $request->kode_pos;
        $alamat->alamat = $request->alamat;
        $alamat->save();

        $jmlAlamat = AlamatUser::where('id_user', auth()->user()->id_user)
                    ->get();
        $jmlAlamat = count($jmlAlamat);
        if($jmlAlamat == 1){
            $alamat = AlamatUser::where('id_user', auth()->user()->id_user)->first();
            $alamat->utama = true;
            $alamat->save();
        }

        return redirect()->route('user.alamat');
    }

    public function updateAlamat(Request $request)
    {
        $request->validate([
            'id' => 'nullable',
            'nama' => 'required',
            'telepon' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
            'alamat' => 'required',
        ]);

        $alamat = AlamatUser::find($request->id);
        $alamat->nama = $request->nama;
        $alamat->telepon = $request->telepon;
        $alamat->provinsi = $request->provinsi;
        $alamat->kota = $request->kota;
        $alamat->kode_pos = $request->kode_pos;
        $alamat->alamat = $request->alamat;
        $alamat->save();
        Session::forget('edit');
        return redirect()->route('user.alamat');
    }

    public function utama($id)
    {
        $alamat = AlamatUser::where('id_user', auth()->user()->id_user)->get();
        foreach($alamat as $item){
            if($item->uuid == $id){
                $item->utama = true;
            } else {
                $item->utama = false;
            }
            $item->save();
        }
        return redirect()->route('user.alamat');
    }

    public function hapus($id)
    {
        $alamat = AlamatUser::where('uuid', $id)->first();
        $alamat->delete();
        return redirect()->route('user.alamat');
    }
}
