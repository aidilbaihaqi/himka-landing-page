@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
  <div class="mb-8">
    <h2 class="text-2xl font-bold text-himka-secondary mb-1">Selamat Datang, {{ auth()->user()->name }}!</h2>
    <p class="text-himka-secondary/60">Berikut ringkasan aktivitas HIMKA UMRAH.</p>
  </div>

  <!-- Stats Grid -->
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5">
      <div class="flex items-center gap-3 lg:gap-4">
        <div class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-500">
          <span class="material-icons text-xl lg:text-2xl">newspaper</span>
        </div>
        <div>
          <p class="text-himka-secondary/50 text-xs uppercase font-bold tracking-wide">Berita</p>
          <h3 class="text-xl lg:text-2xl font-bold text-himka-secondary">{{ $stats['articles'] }}</h3>
        </div>
      </div>
    </div>

    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5">
      <div class="flex items-center gap-3 lg:gap-4">
        <div class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-green-50 flex items-center justify-center text-green-500">
          <span class="material-icons text-xl lg:text-2xl">event</span>
        </div>
        <div>
          <p class="text-himka-secondary/50 text-xs uppercase font-bold tracking-wide">Kegiatan</p>
          <h3 class="text-xl lg:text-2xl font-bold text-himka-secondary">{{ $stats['kegiatan'] }}</h3>
        </div>
      </div>
    </div>

    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5">
      <div class="flex items-center gap-3 lg:gap-4">
        <div class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-purple-50 flex items-center justify-center text-purple-500">
          <span class="material-icons text-xl lg:text-2xl">collections</span>
        </div>
        <div>
          <p class="text-himka-secondary/50 text-xs uppercase font-bold tracking-wide">Galeri</p>
          <h3 class="text-xl lg:text-2xl font-bold text-himka-secondary">{{ $stats['galleries'] }}</h3>
        </div>
      </div>
    </div>

    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5">
      <div class="flex items-center gap-3 lg:gap-4">
        <div class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-orange-50 flex items-center justify-center text-orange-500">
          <span class="material-icons text-xl lg:text-2xl">people</span>
        </div>
        <div>
          <p class="text-himka-secondary/50 text-xs uppercase font-bold tracking-wide">Pengurus</p>
          <h3 class="text-xl lg:text-2xl font-bold text-himka-secondary">{{ $stats['pengurus'] }}</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
    <!-- Recent Articles -->
    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5">
      <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-lg text-himka-secondary">Berita Terbaru</h3>
        <a href="{{ route('admin.articles.index') }}" class="text-himka-accent text-sm hover:underline">Lihat Semua</a>
      </div>

      <div class="space-y-4">
        @forelse($recentArticles as $article)
          <div class="flex gap-4 items-start">
            @if($article->image)
              <img src="{{ Storage::url($article->image) }}" class="w-16 h-16 rounded-lg object-cover shrink-0" alt="">
            @else
              <div class="w-16 h-16 rounded-lg bg-himka-cream flex items-center justify-center shrink-0">
                <span class="material-icons text-himka-secondary/30">image</span>
              </div>
            @endif
            <div class="flex-1 min-w-0">
              <h4 class="font-medium text-himka-secondary truncate">{{ $article->title }}</h4>
              <p class="text-xs text-himka-secondary/50 mt-1">{{ $article->created_at->diffForHumans() }}</p>
            </div>
          </div>
        @empty
          <p class="text-himka-secondary/50 text-center py-4">Belum ada berita.</p>
        @endforelse
      </div>
    </div>

    <!-- Recent Notulensi -->
    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5">
      <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-lg text-himka-secondary">Notulensi Terbaru</h3>
        <a href="{{ route('admin.notulensi.index') }}" class="text-himka-accent text-sm hover:underline">Lihat Semua</a>
      </div>

      <div class="space-y-4">
        @forelse($recentNotulensi as $notulen)
          <div class="flex gap-4 items-start">
            <div class="w-12 h-12 rounded-lg bg-himka-accent/10 flex items-center justify-center shrink-0">
              <span class="material-icons text-himka-accent">description</span>
            </div>
            <div class="flex-1 min-w-0">
              <h4 class="font-medium text-himka-secondary truncate">{{ $notulen->title }}</h4>
              <p class="text-xs text-himka-secondary/50 mt-1">
                {{ $notulen->meeting_date->format('d M Y') }} • {{ $notulen->user->name }}
              </p>
            </div>
          </div>
        @empty
          <p class="text-himka-secondary/50 text-center py-4">Belum ada notulensi.</p>
        @endforelse
      </div>
    </div>
  </div>
@endsection
