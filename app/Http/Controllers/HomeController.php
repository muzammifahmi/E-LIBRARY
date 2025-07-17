<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $anggotas = \App\Models\Anggota::get(); // tampilkan 3 anggota terbaru
        return view('welcome', compact('anggotas'));
    }
}
