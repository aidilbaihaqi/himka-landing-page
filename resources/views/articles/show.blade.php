@extends('layouts.app')

@section('content')
<!-- Article Header -->
<section class="bg-gradient-to-br from-himka-cream via-white to-himka-cream pt-32 pb-16 relative overflow-hidden">
  <!-- Background Pattern -->
  <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#000_1px,transparent_1px)] bg-size-[32px_32px]"></div>
  <div class="absolute top-0 right-0 w-96 h-96 bg-himka-secondary/5 rounded-full blur-3xl translate-x-1/3 -translate-y-1/3"></div>
  <div class="absolute bottom-0 left-0 w-64 h-64 bg-himka-accent/5 rounded-full blur-3xl -translate-x-1/3 translate-y-1/3"></div>
  
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    @if($article->category)
      <span class="inline-block px-3 py-1 bg-himka-accent text-white text-xs font-bold rounded-full mb-4">
        {{ $article->category->name }}
      </span>
    @endif
    <h1 class="text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-gray-900 mb-6 leading-tight">
      {{ $article->title }}
    </h1>
    <div class="flex flex-wrap items-center gap-4 text-gray-600 text-sm">
      <span class="flex items-center gap-2">
        <span class="material-icons text-sm">person</span>
        {{ $article->user->name ?? 'Admin' }}
      </span>
      <span class="flex items-center gap-2">
        <span class="material-icons text-sm">calendar_today</span>
        {{ $article->published_at?->format('d F Y') ?? $article->created_at->format('d F Y') }}
      </span>
    </div>
  </div>
</section>

<!-- Article Content -->
<section class="py-12 bg-white">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    @if($article->image)
      <div class="mb-10 -mt-20 relative z-10">
        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}"
          class="w-full h-[400px] object-cover rounded-2xl shadow-2xl">
      </div>
    @endif

    @if($article->excerpt)
      <p class="text-xl text-himka-secondary/80 leading-relaxed mb-8 font-medium border-l-4 border-himka-accent pl-6">
        {{ $article->excerpt }}
      </p>
    @endif

    <div class="prose prose-lg max-w-none prose-headings:text-himka-secondary prose-p:text-himka-secondary/80 prose-a:text-himka-accent">
      {!! nl2br(e($article->content)) !!}
    </div>

    <!-- Share Buttons -->
    <div class="mt-12 pt-8 border-t border-himka-cream">
      <p class="text-sm font-medium text-himka-secondary mb-4">Bagikan artikel ini:</p>
      <div class="flex gap-3">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
          class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition-colors">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
        </a>
        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}" target="_blank"
          class="w-10 h-10 rounded-full bg-sky-500 text-white flex items-center justify-center hover:bg-sky-600 transition-colors">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg>
        </a>
        <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->url()) }}" target="_blank"
          class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center hover:bg-green-600 transition-colors">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Related Articles -->
@if($relatedArticles->count() > 0)
<section class="py-16 bg-himka-cream">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-serif font-bold text-himka-secondary mb-8">Artikel Terkait</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @foreach($relatedArticles as $related)
        <article class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition-shadow">
          <a href="{{ route('articles.show', $related) }}" class="block">
            <div class="relative h-48 overflow-hidden">
              @if($related->image)
                <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}"
                  class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
              @else
                <div class="w-full h-full bg-himka-secondary/10 flex items-center justify-center">
                  <span class="material-icons text-6xl text-himka-secondary/30">article</span>
                </div>
              @endif
            </div>
          </a>
          <div class="p-6">
            <h3 class="text-lg font-bold text-himka-secondary line-clamp-2 group-hover:text-himka-accent transition-colors">
              <a href="{{ route('articles.show', $related) }}">{{ $related->title }}</a>
            </h3>
            <p class="text-himka-secondary/60 text-sm mt-2">
              {{ $related->published_at?->format('d M Y') ?? $related->created_at->format('d M Y') }}
            </p>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Back to Articles -->
<section class="py-8 bg-white border-t border-himka-cream">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <a href="{{ route('articles.index') }}" class="inline-flex items-center gap-2 text-himka-accent font-medium hover:text-himka-secondary transition-colors">
      <span class="material-icons">arrow_back</span>
      Kembali ke Daftar Artikel
    </a>
  </div>
</section>
@endsection
