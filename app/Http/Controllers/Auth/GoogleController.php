<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $check_user = User::where('email', $user->email)->first();
            
            if($check_user){
                Auth::login($check_user);
                return redirect()->route('home');
            } else {
                $usr = User::orderBy('id_user', 'DESC')->first();
                if($usr){
                    $id = explode('-', $usr->id_user);
                    $urutan = (int) $id[1];
                    $urutan++;
                } else {
                    $urutan = 1;
                }
                $id = 'USR-' . sprintf("%04s", $urutan);
    
                $new_user = new User();
                $new_user->id_user = $id;
                $new_user->nama_depan = $user->name;
                $new_user->email = $user->email;
                $new_user->password = Str::random(10);
                $new_user->save();

                event(new Registered($user));
    
                Auth::login($new_user);
                return redirect()->route('home');
            }
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('login')->withErrors(['failed' => 'Google Authentication Error! Silahkan Coba beberapa saat lagi']);
        }
    }
}
