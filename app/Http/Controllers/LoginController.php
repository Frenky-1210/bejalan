<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_auth(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if( Auth::attempt($data)) {
            if(Auth::user()->role == 'Admin'){
                return redirect('dashboard')->with('done', 'Anda berhasil login sebagai Admin');
            } elseif(Auth::user()->role == 'User'){
                return redirect('home')->with('done', 'Anda berhasil login');
            }
        }else{
            return redirect()->route('login')->with('failed', 'Username atau Password Anda Salah !!!');
        };
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function register(){
        return view('auth.register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required|same:password',
            'email' => 'required|email|unique:users,email'
        ]);
        
        $user = User::create($request->except('_token'));

        event(new Registered($user));

        auth()->login($user);

        return redirect()->route('verification.notice')->with('success', 'Akun berhasil dibuat, Silahkan Verifikasi Email terlebih dahulu');
    
        // return redirect()->route('login')->with('success', 'Register telah berhasil, silahkan login terlebih dahulu');
    }
}
