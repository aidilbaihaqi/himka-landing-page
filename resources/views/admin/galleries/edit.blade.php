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
            <label class="block text-sm font-medium text-himka-secondary mb-2">Judul Foto <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title', $gallery->title) }}" required maxlength="255"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('title') border-red-500 @enderror">
            @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Maksimal 255 karakter. Judul akan ditampilkan saat foto di-hover atau di carousel.</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Deskripsi</label>
            <textarea name="description" rows="3" maxlength="500"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('description') border-red-500 @enderror">{{ old('description', $gallery->description) }}</textarea>
            @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Maksimal 500 karakter. Keterangan singkat tentang foto (opsional).</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Gambar</label>
            <div class="mb-3 relative inline-block group">
              <img src="{{ Storage::url($gallery->image) }}" class="w-40 h-28 object-cover rounded-lg border border-himka-secondary/20" alt="">
              <span class="absolute bottom-1 left-1 bg-black/60 text-white text-[10px] px-1.5 py-0.5 rounded">Gambar saat ini</span>
            </div>
            <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-himka-secondary/10 file:text-himka-secondary file:font-medium hover:file:bg-himka-secondary/20 @error('image') border-red-500 @enderror">
            @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Format: JPG, JPEG, PNG, GIF, WEBP. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</p>
          </div>

          <div class="bg-himka-cream/50 p-4 rounded-lg">
            <label class="block text-sm font-medium text-himka-secondary mb-3">Status</label>
            <div class="space-y-3">
              <label class="flex items-start gap-3 cursor-pointer">
                <input type="radio" name="is_active" value="1" {{ old('is_active', $gallery->is_active) == '1' ? 'checked' : '' }}
                  class="w-4 h-4 mt-0.5 text-himka-accent border-himka-secondary/20 focus:ring-himka-accent">
                <div>
                  <span class="text-sm font-medium text-himka-secondary">Aktif</span>
                  <p class="text-xs text-himka-secondary/50">Foto akan ditampilkan di galeri website publik.</p>
                </div>
              </label>
              <label class="flex items-start gap-3 cursor-pointer">
                <input type="radio" name="is_active" value="0" {{ old('is_active', $gallery->is_active) == '0' ? 'checked' : '' }}
                  class="w-4 h-4 mt-0.5 text-himka-accent border-himka-secondary/20 focus:ring-himka-accent">
                <div>
                  <span class="text-sm font-medium text-himka-secondary">Nonaktif</span>
                  <p class="text-xs text-himka-secondary/50">Foto disimpan tapi tidak ditampilkan di website publik.</p>
                </div>
              </label>
            </div>
          </div>
        </div>

        <div class="flex gap-4 mt-8">
          <button type="submit" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-6 py-2 rounded-lg font-bold transition-colors flex items-center gap-2">
            <span class="material-icons text-lg">save</span> Update
          </button>
          <a href="{{ route('admin.galleries.index') }}" class="bg-himka-cream hover:bg-himka-cream-dark text-himka-secondary px-6 py-2 rounded-lg font-bold transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
