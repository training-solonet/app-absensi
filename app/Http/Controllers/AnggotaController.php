<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        return view('anggota.index');
    }

    public function edit()
    {
        return view('anggota.edit');
    }
}
