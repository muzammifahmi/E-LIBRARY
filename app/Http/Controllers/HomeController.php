<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::all();
        $articles = Article::latest()->take(5)->get(); // Ambil 5 artikel terbaru, bisa disesuaikan
        return view('welcome', compact('anggotas', 'articles'));
    }
}
