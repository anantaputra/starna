<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['nullable', 'string', 'max:255'],
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ], [
                'required' => ':attribute harus diisi',
                'unique' => ':attribute sudah digunakan',
                'min' => ':attribute mininal :min karakter',
                'confirmed' => ':attribute tidak cocok'
            ]);
    
            $user = User::orderBy('id_user', 'DESC')->first();
            if($user){
                $id_user = explode('-', $user->id_user);
                $urutan = (int) $id_user[1];
                $urutan++;
            } else {
                $urutan = 1;
            }
            $id_user = 'USR-' . sprintf("%05s", $urutan);
    
            $register = new User();
            $register->id_user = $id_user;
            $register->nama_depan = $request->firstname;
            $register->nama_belakang = $request->lastname;
            $register->email = $request->email;
            $register->password = bcrypt($request->password);
            $register->save();
    
            event(new Registered($user));
    
            $user = Auth::login($register);
    
            if($user){
                return redirect()->route('home');
            }
    
            return redirect()->route('register');
        } catch (\Exception $e) {
            return redirect()->route('register')->withErrors(['failed' => 'Pendaftaran Gagal! Silahkan Coba beberapa saat lagi']);
        }
    }
}
