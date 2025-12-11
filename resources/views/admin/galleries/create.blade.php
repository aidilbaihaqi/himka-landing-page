@extends('layouts.admin')

@section('title', 'Tambah Galeri')
@section('page-title', 'Tambah Galeri')

@section('content')
  <div class="max-w-2xl">
    <div class="mb-6">
      <a href="{{ route('admin.galleries.index') }}" class="text-himka-secondary/60 hover:text-himka-secondary flex items-center gap-1 text-sm">
        <span class="material-icons text-lg">arrow_back</span> Kembali
      </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 p-6">
      <h2 class="text-xl font-bold text-himka-secondary mb-6">Tambah Foto Galeri</h2>

      <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Judul <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title') }}" required
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('description') }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Gambar <span class="text-red-500">*</span></label>
            <input type="file" name="image" accept="image/*" required
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Urutan</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
          </div>

          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
              class="w-4 h-4 text-himka-accent border-himka-secondary/20 rounded focus:ring-himka-accent">
            <span class="text-sm text-himka-secondary">Aktif</span>
          </label>
        </div>

        <div class="flex gap-4 mt-8">
          <button type="submit" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-6 py-2 rounded-lg font-bold transition-colors">
            Simpan
          </button>
          <a href="{{ route('admin.galleries.index') }}" class="bg-himka-cream hover:bg-himka-cream-dark text-himka-secondary px-6 py-2 rounded-lg font-bold transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
