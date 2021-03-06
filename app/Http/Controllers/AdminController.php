<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function merkAlat()
    {
        return view('admin.malat');
    }

    public function alat()
    {
        return view('admin.alat');
    }

    public function tempatWaktu()
    {
        return view('admin.tempat-waktu');
    }

    public function perusahaan()
    {
        return view('admin.perusahaan');
    }
}
