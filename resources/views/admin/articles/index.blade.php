@extends('layouts.admin')

@section('title', 'Kelola Berita')
@section('page-title', 'Berita')

@section('content')
  <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
      <h2 class="text-xl lg:text-2xl font-bold text-himka-secondary">Kelola Berita</h2>
      <p class="text-himka-secondary/60 text-sm">Kelola artikel dan berita HIMKA</p>
    </div>
    <a href="{{ route('admin.articles.create') }}" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2 transition-colors">
      <span class="material-icons text-sm">add</span> Tambah Berita
    </a>
  </div>

  <!-- Filters -->
  <div class="bg-white p-4 rounded-xl shadow-sm border border-himka-secondary/5 mb-6">
    <form action="" method="GET" class="flex flex-col sm:flex-row gap-4">
      <div class="flex-1">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita..."
          class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
      </div>
      <select name="category" class="px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
        <option value="">Semua Kategori</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
      </select>
      <button type="submit" class="bg-himka-secondary text-white px-4 py-2 rounded-lg hover:bg-himka-secondary-dark transition-colors">
        <span class="material-icons text-sm">search</span>
      </button>
    </form>
  </div>

  <!-- Table -->
  <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="bg-himka-cream">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-bold text-himka-secondary uppercase">Judul</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-himka-secondary uppercase hidden md:table-cell">Kategori</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-himka-secondary uppercase hidden lg:table-cell">Status</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-himka-secondary uppercase hidden lg:table-cell">Tanggal</th>
            <th class="px-4 py-3 text-right text-xs font-bold text-himka-secondary uppercase">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-himka-secondary/5">
          @forelse($articles as $article)
            <tr class="hover:bg-himka-cream/50">
              <td class="px-4 py-3">
                <div class="flex items-center gap-3">
                  @if($article->image)
                    <img src="{{ Storage::url($article->image) }}" class="w-10 h-10 rounded-lg object-cover" alt="">
                  @else
                    <div class="w-10 h-10 rounded-lg bg-himka-cream flex items-center justify-center">
                      <span class="material-icons text-himka-secondary/30 text-sm">image</span>
                    </div>
                  @endif
                  <div>
                    <p class="font-medium text-himka-secondary">{{ Str::limit($article->title, 40) }}</p>
                    <p class="text-xs text-himka-secondary/50">{{ $article->user->name }}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 hidden md:table-cell">
                <span class="px-2 py-1 bg-himka-cream text-himka-secondary text-xs rounded-full">
                  {{ $article->category?->name ?? 'Tanpa Kategori' }}
                </span>
              </td>
              <td class="px-4 py-3 hidden lg:table-cell">
                @if($article->is_published)
                  <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Published</span>
                @else
                  <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-xs rounded-full">Draft</span>
                @endif
              </td>
              <td class="px-4 py-3 text-sm text-himka-secondary/70 hidden lg:table-cell">
                {{ $article->created_at->format('d M Y') }}
              </td>
              <td class="px-4 py-3 text-right">
                <div class="flex items-center justify-end gap-2">
                  <a href="{{ route('admin.articles.edit', $article) }}" class="p-2 text-himka-secondary hover:text-himka-accent transition-colors">
                    <span class="material-icons text-lg">edit</span>
                  </a>
                  <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="p-2 text-red-500 hover:text-red-700 transition-colors">
                      <span class="material-icons text-lg">delete</span>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="px-4 py-8 text-center text-himka-secondary/50">Belum ada berita.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($articles->hasPages())
      <div class="px-4 py-3 border-t border-himka-secondary/5">
        {{ $articles->links() }}
      </div>
    @endif
  </div>
@endsection
