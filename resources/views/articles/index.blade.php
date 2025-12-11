@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="bg-himka-secondary py-20 pt-32">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h1 class="text-4xl md:text-5xl font-serif font-bold text-white mb-4">Berita & Artikel</h1>
    <p class="text-himka-cream/80 max-w-2xl mx-auto">Informasi terkini seputar kegiatan dan prestasi HIMKA UMRAH</p>
  </div>
</section>

<!-- Category Filter -->
<section class="bg-white border-b border-himka-cream sticky top-16 z-40">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-2 py-4 overflow-x-auto scrollbar-hide">
      <a href="{{ route('articles.index') }}"
        class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-colors {{ !$currentCategory ? 'bg-himka-accent text-white' : 'bg-himka-cream text-himka-secondary hover:bg-himka-secondary/10' }}">
        Semua
      </a>
      @foreach($categories as $category)
        <a href="{{ route('articles.index', ['category' => $category->slug]) }}"
          class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-colors {{ $currentCategory && $currentCategory->id === $category->id ? 'bg-himka-accent text-white' : 'bg-himka-cream text-himka-secondary hover:bg-himka-secondary/10' }}">
          {{ $category->name }} ({{ $category->articles_count }})
        </a>
      @endforeach
    </div>
  </div>
</section>

<!-- Articles Grid -->
<section class="py-16 bg-himka-cream">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @if($articles->count() > 0)
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($articles as $article)
          <article class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition-shadow">
            <a href="{{ route('articles.show', $article) }}" class="block">
              <div class="relative h-48 overflow-hidden">
                @if($article->image)
                  <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                @else
                  <div class="w-full h-full bg-himka-secondary/10 flex items-center justify-center">
                    <span class="material-icons text-6xl text-himka-secondary/30">article</span>
                  </div>
                @endif
                @if($article->is_featured)
                  <span class="absolute top-4 left-4 px-3 py-1 bg-himka-accent text-white text-xs font-bold rounded-full">FEATURED</span>
                @endif
              </div>
            </a>
            <div class="p-6">
              @if($article->category)
                <span class="text-himka-accent text-xs font-bold uppercase tracking-wider">{{ $article->category->name }}</span>
              @endif
              <h2 class="text-xl font-bold text-himka-secondary mt-2 mb-3 line-clamp-2 group-hover:text-himka-accent transition-colors">
                <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
              </h2>
              <p class="text-himka-secondary/70 text-sm line-clamp-3 mb-4">{{ $article->excerpt }}</p>
              <div class="flex items-center justify-between text-xs text-himka-secondary/50">
                <span class="flex items-center gap-1">
                  <span class="material-icons text-sm">calendar_today</span>
                  {{ $article->published_at?->format('d M Y') ?? $article->created_at->format('d M Y') }}
                </span>
                <span class="flex items-center gap-1">
                  <span class="material-icons text-sm">person</span>
                  {{ $article->user->name ?? 'Admin' }}
                </span>
              </div>
            </div>
          </article>
        @endforeach
      </div>

      <!-- Pagination -->
      <div class="mt-12">
        {{ $articles->withQueryString()->links() }}
      </div>
    @else
      <div class="text-center py-16">
        <span class="material-icons text-6xl text-himka-secondary/30 mb-4">article</span>
        <h3 class="text-xl font-bold text-himka-secondary mb-2">Belum ada artikel</h3>
        <p class="text-himka-secondary/60">Artikel akan segera tersedia</p>
      </div>
    @endif
  </div>
</section>
@endsection
