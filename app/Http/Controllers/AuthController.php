<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            if (Auth::user()->role == "admin") {
                return redirect()->route('admin.dashboard');
            }
        }else{
            return redirect()->back()->with('failed','Gagal Login!!!');
        }
    }

    public function registrasi(RegisterRequest $request)
    {
        User::create([
            'username'  => $request->validated()['username'],
            'email'     => $request->validated()['email'],
            'password'  => Hash::make($request->validated()['password']),
            'no_hp'     => $request->validated()['nohp'],
            'role'      => 'staff',
        ]);

        return redirect()->back()->with('success','Pendaftaran Sukses, Silahkan Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success','Berhasil Logout');
    }
}
