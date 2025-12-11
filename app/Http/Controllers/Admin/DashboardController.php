<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Kegiatan;
use App\Models\Notulensi;
use App\Models\Pengurus;
use Carbon\Carbon;

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

        // Published stats
        $publishedStats = [
            'articles_published' => Article::where('is_published', true)->count(),
            'articles_draft' => Article::where('is_published', false)->count(),
            'kegiatan_published' => Kegiatan::where('is_published', true)->count(),
            'kegiatan_draft' => Kegiatan::where('is_published', false)->count(),
        ];

        // Monthly activity for chart (last 6 months)
        $monthlyActivity = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthlyActivity[] = [
                'month' => $date->format('M'),
                'articles' => Article::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)->count(),
                'kegiatan' => Kegiatan::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)->count(),
            ];
        }

        // Calendar events (kegiatan with dates)
        $calendarEvents = Kegiatan::whereNotNull('event_date')
            ->whereDate('event_date', '>=', Carbon::now()->startOfMonth())
            ->whereDate('event_date', '<=', Carbon::now()->endOfMonth()->addMonths(2))
            ->get()
            ->map(fn($k) => [
                'id' => $k->id,
                'title' => $k->title,
                'date' => $k->event_date->format('Y-m-d'),
                'location' => $k->location,
            ]);

        // Upcoming events
        $upcomingEvents = Kegiatan::whereNotNull('event_date')
            ->whereDate('event_date', '>=', Carbon::today())
            ->orderBy('event_date')
            ->take(5)
            ->get();

        $recentArticles = Article::with('user')->latest()->take(5)->get();
        $recentNotulensi = Notulensi::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'stats', 
            'publishedStats',
            'monthlyActivity',
            'calendarEvents',
            'upcomingEvents',
            'recentArticles', 
            'recentNotulensi'
        ));
    }
}
