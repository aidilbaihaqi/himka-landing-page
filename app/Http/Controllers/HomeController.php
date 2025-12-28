<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Kegiatan;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $galleries = Gallery::active()->latest()->take(10)->get();
        $featuredArticle = Article::published()->featured()->with('category', 'user')->latest()->first();
        $articles = Article::published()->with('category', 'user')->latest()->take(4)->get();
        $categories = Category::where('type', 'article')->withCount(['articles' => fn($q) => $q->published()])->get();

        return view('home', compact('galleries', 'featuredArticle', 'articles', 'categories'));
    }

    public function pengurus()
    {
        $pengurus = Pengurus::with('user')->active()->orderBy('sort_order')->get();

        return view('pengurus.index', compact('pengurus'));
    }

    public function articles(Request $request)
    {
        $articles = Article::published()
            ->with('category', 'user')
            ->when($request->category, fn($q) => $q->whereHas('category', fn($c) => $c->where('slug', $request->category)))
            ->latest()
            ->paginate(9);

        $categories = Category::where('type', 'article')->withCount(['articles' => fn($q) => $q->published()])->get();
        $currentCategory = $request->category ? Category::where('slug', $request->category)->first() : null;

        return view('articles.index', compact('articles', 'categories', 'currentCategory'));
    }

    public function articleShow(Article $article)
    {
        if (!$article->is_published) {
            abort(404);
        }

        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->when($article->category_id, fn($q) => $q->where('category_id', $article->category_id))
            ->take(3)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }

    public function kegiatanCalendar(Request $request)
    {
        $year = $request->get('year', date('Y'));
        $month = $request->get('month', date('m'));

        $kegiatan = Kegiatan::where('is_published', true)
            ->whereNotNull('event_date')
            ->whereYear('event_date', $year)
            ->whereMonth('event_date', $month)
            ->select('id', 'title', 'event_date', 'location')
            ->orderBy('event_date')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'date' => $item->event_date->format('Y-m-d'),
                    'day' => $item->event_date->format('d'),
                    'location' => $item->location,
                    'isPast' => $item->event_date->isPast(),
                ];
            });

        return response()->json($kegiatan);
    }
}
