@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')
  <div class="max-w-4xl">
    <div class="mb-6">
      <a href="{{ route('admin.articles.index') }}" class="text-himka-secondary/60 hover:text-himka-secondary flex items-center gap-1 text-sm">
        <span class="material-icons text-lg">arrow_back</span> Kembali
      </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 p-6">
      <h2 class="text-xl font-bold text-himka-secondary mb-6">Edit Berita</h2>

      <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Judul <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title', $article->title) }}" required
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Kategori</label>
            <select name="category_id" class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
              <option value="">Pilih Kategori</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Excerpt</label>
            <textarea name="excerpt" rows="2" class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('excerpt', $article->excerpt) }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Konten <span class="text-red-500">*</span></label>
            <textarea name="content" rows="10" required
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('content', $article->content) }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Gambar</label>
            @if($article->image)
              <div class="mb-2">
                <img src="{{ Storage::url($article->image) }}" class="w-32 h-32 object-cover rounded-lg" alt="">
              </div>
            @endif
            <input type="file" name="image" accept="image/*"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
          </div>

          <div class="flex flex-wrap gap-6">
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $article->is_featured) ? 'checked' : '' }}
                class="w-4 h-4 text-himka-accent border-himka-secondary/20 rounded focus:ring-himka-accent">
              <span class="text-sm text-himka-secondary">Featured</span>
            </label>

            <label class="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" name="is_published" value="1" {{ old('is_published', $article->is_published) ? 'checked' : '' }}
                class="w-4 h-4 text-himka-accent border-himka-secondary/20 rounded focus:ring-himka-accent">
              <span class="text-sm text-himka-secondary">Publish</span>
            </label>
          </div>
        </div>

        <div class="flex gap-4 mt-8">
          <button type="submit" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-6 py-2 rounded-lg font-bold transition-colors">
            Update
          </button>
          <a href="{{ route('admin.articles.index') }}" class="bg-himka-cream hover:bg-himka-cream-dark text-himka-secondary px-6 py-2 rounded-lg font-bold transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
