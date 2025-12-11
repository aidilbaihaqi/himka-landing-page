@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 pt-32 bg-gradient-to-br from-himka-cream via-white to-himka-cream overflow-hidden">
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0 z-0">
    <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=1920&q=80" 
      alt="Chemistry Background" 
      class="w-full h-full object-cover opacity-20">
    <div class="absolute inset-0 bg-gradient-to-br from-himka-cream/80 via-white/70 to-himka-cream/80"></div>
  </div>
  
  <!-- Background Decorations -->
  <div class="absolute inset-0 z-0">
    <div class="absolute top-0 left-0 w-96 h-96 bg-himka-secondary/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 animate-pulse-glow"></div>
    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-himka-accent/10 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 animate-pulse-glow"></div>
    <!-- Grid Pattern -->
    <div class="absolute inset-0 bg-[radial-gradient(#00000008_1px,transparent_1px)] bg-size-[32px_32px]"></div>
  </div>
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
    <h1 class="text-4xl md:text-5xl font-serif font-bold text-gray-900 mb-4">Berita & Artikel</h1>
    <p class="text-gray-600 max-w-2xl mx-auto">Informasi terkini seputar kegiatan dan prestasi HIMKA UMRAH</p>
  </div>
</section>

<!-- Category Filter -->
<section class="bg-white border-b border-gray-200 sticky top-20 z-40 shadow-sm">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-2 py-4 overflow-x-auto scrollbar-hide">
      <a href="{{ route('articles.index') }}"
        class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-colors {{ !$currentCategory ? 'bg-himka-secondary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
        Semua
      </a>
      @foreach($categories as $category)
        <a href="{{ route('articles.index', ['category' => $category->slug]) }}"
          class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-colors {{ $currentCategory && $currentCategory->id === $category->id ? 'bg-himka-secondary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
          {{ $category->name }} ({{ $category->articles_count }})
        </a>
      @endforeach
    </div>
  </div>
</section>

<!-- Articles Grid -->
<section class="py-16 bg-gradient-to-br from-white via-himka-cream to-white relative">
  <!-- Subtle decorative elements -->
  <div class="absolute inset-0 z-0 opacity-30">
    <div class="absolute top-20 right-20 w-64 h-64 bg-himka-secondary/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-20 w-80 h-80 bg-himka-accent/5 rounded-full blur-3xl"></div>
  </div>
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    @if($articles->count() > 0)
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($articles as $article)
          <article class="bg-white rounded-2xl shadow-md overflow-hidden group hover:shadow-xl transition-all duration-300 border border-gray-100">
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
                <span class="text-himka-secondary text-xs font-bold uppercase tracking-wider">{{ $article->category->name }}</span>
              @endif
              <h2 class="text-xl font-bold text-gray-900 mt-2 mb-3 line-clamp-2 group-hover:text-himka-secondary transition-colors">
                <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
              </h2>
              <p class="text-gray-600 text-sm line-clamp-3 mb-4">{{ $article->excerpt }}</p>
              <div class="flex items-center justify-between text-xs text-gray-500">
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
        <span class="material-icons text-6xl text-gray-300 mb-4">article</span>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada artikel</h3>
        <p class="text-gray-600">Artikel akan segera tersedia</p>
      </div>
    @endif
  </div>
</section>
@endsection
