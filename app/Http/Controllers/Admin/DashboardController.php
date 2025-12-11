<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Kegiatan;
use App\Models\Notulensi;
use App\Models\Pengurus;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'articles' => Article::count(),
            'kegiatan' => Kegiatan::count(),
            'galleries' => Gallery::count(),
            'pengurus' => Pengurus::active()->count(),
        ];

        $recentArticles = Article::with('user')->latest()->take(5)->get();
        $recentNotulensi = Notulensi::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentArticles', 'recentNotulensi'));
    }
}
