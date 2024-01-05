<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){

        return view('auth.login');
    }

    public function authenticating(Request $request){

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        //cek login valid

        //cek status

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status != 'active' ) {

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::flash('status', 'failed');
                Session::flash('message', 'User belum aktif, silahkan hubungi pengawas perpustakaan');
                return redirect('/login');
            }

            $request->session()->regenerate();

            if (Auth::user()->role_id == 1) {
                return redirect('/dashboard');
            }
            if (Auth::user()->role_id == 2) {
                return redirect('/profile');
            }

        }

            Session::flash('status', 'failed');
            Session::flash('message', 'Username atau password salah');
            return redirect('/login');
    }

    public function register(){

        return view('auth.register');
    }

    public function store(Request $request){
        
        $data = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required',
            'phone' => 'max:255',
            'address' => 'required',
        ]);

    $data['password'] = Hash::make($data['password']);
    $user = User::create($data);
    

    if ($user) {
        Session::flash('status' , 'success');
        Session::flash('message', 'Akun berhasil dibuat, hubungi pengawas untuk perizinan akun');

        return redirect('/register');
    }
    


    }

    public function logout(){

        Auth::logout();
        return redirect('/login');
    }
}
