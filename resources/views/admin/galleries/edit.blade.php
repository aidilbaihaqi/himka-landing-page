@extends('layouts.admin')

@section('title', 'Edit Galeri')
@section('page-title', 'Edit Galeri')

@section('content')
  <div class="max-w-2xl">
    <div class="mb-6">
      <a href="{{ route('admin.galleries.index') }}" class="text-himka-secondary/60 hover:text-himka-secondary flex items-center gap-1 text-sm">
        <span class="material-icons text-lg">arrow_back</span> Kembali
      </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 p-6">
      <h2 class="text-xl font-bold text-himka-secondary mb-6">Edit Foto Galeri</h2>

      <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Judul <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title', $gallery->title) }}" required
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('description', $gallery->description) }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Gambar</label>
            <div class="mb-2">
              <img src="{{ Storage::url($gallery->image) }}" class="w-32 h-32 object-cover rounded-lg" alt="">
            </div>
            <input type="file" name="image" accept="image/*"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Urutan</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $gallery->sort_order) }}"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
          </div>

          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}
              class="w-4 h-4 text-himka-accent border-himka-secondary/20 rounded focus:ring-himka-accent">
            <span class="text-sm text-himka-secondary">Aktif</span>
          </label>
        </div>

        <div class="flex gap-4 mt-8">
          <button type="submit" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-6 py-2 rounded-lg font-bold transition-colors">
            Update
          </button>
          <a href="{{ route('admin.galleries.index') }}" class="bg-himka-cream hover:bg-himka-cream-dark text-himka-secondary px-6 py-2 rounded-lg font-bold transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
