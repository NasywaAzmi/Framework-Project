<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('/login');
    }
    public function auth(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:6',
        ],[
            'email.required'=>'email tidak boleh kosong',
            'password.required'=>'password tidak boleh kosong',
            'password.min'=>'password minimal 6 angka',
        ]);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            // $role = Auth::user()->roles;
            // Log::create([
            //     'pengguna' => Auth::user()->nama,
            //     'kegiatan' => "Login"
            // ]);
            return redirect('/dashboard');
        }else{
            return redirect()->back()->withInput($request->all())->withErrors('email dan password salah');
        }
    }
    public function destroy(Request $request)
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
