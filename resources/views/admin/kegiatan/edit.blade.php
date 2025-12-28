@extends('layouts.admin')

@section('title', 'Edit Kegiatan')
@section('page-title', 'Edit Kegiatan')

@section('content')
  <div class="max-w-4xl">
    <div class="mb-6">
      <a href="{{ route('admin.kegiatan.index') }}" class="text-himka-secondary/60 hover:text-himka-secondary flex items-center gap-1 text-sm">
        <span class="material-icons text-lg">arrow_back</span> Kembali
      </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 p-6">
      <h2 class="text-xl font-bold text-himka-secondary mb-6">Edit Kegiatan</h2>

      <form action="{{ route('admin.kegiatan.update', $kegiatan) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Judul Kegiatan <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title', $kegiatan->title) }}" required maxlength="255"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('title') border-red-500 @enderror">
            @error('title')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Maksimal 255 karakter. Gunakan judul yang jelas dan deskriptif.</p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Tanggal Kegiatan</label>
              <input type="date" name="event_date" value="{{ old('event_date', $kegiatan->event_date?->format('Y-m-d')) }}"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('event_date') border-red-500 @enderror">
              @error('event_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
              <p class="text-xs text-himka-secondary/50 mt-1">Tanggal pelaksanaan kegiatan.</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Lokasi</label>
              <input type="text" name="location" value="{{ old('location', $kegiatan->location) }}" maxlength="255"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('location') border-red-500 @enderror">
              @error('location')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
              <p class="text-xs text-himka-secondary/50 mt-1">Maksimal 255 karakter. Contoh: Aula FTTK UMRAH</p>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Deskripsi Singkat</label>
            <textarea name="description" rows="2" maxlength="500"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('description') border-red-500 @enderror">{{ old('description', $kegiatan->description) }}</textarea>
            @error('description')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Maksimal 500 karakter. Ringkasan singkat tentang kegiatan.</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Konten Detail <span class="text-red-500">*</span></label>
            <textarea name="content" rows="10" required
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('content') border-red-500 @enderror">{{ old('content', $kegiatan->content) }}</textarea>
            @error('content')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Deskripsi lengkap kegiatan. Tidak ada batasan karakter.</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Gambar Cover</label>
            @if($kegiatan->image)
              <div class="mb-3 relative inline-block group">
                <img src="{{ Storage::url($kegiatan->image) }}" class="w-40 h-24 object-cover rounded-lg border border-himka-secondary/20" alt="">
                <span class="absolute bottom-1 left-1 bg-black/60 text-white text-[10px] px-1.5 py-0.5 rounded">Gambar saat ini</span>
              </div>
            @endif
            <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/webp"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-himka-secondary/10 file:text-himka-secondary file:font-medium hover:file:bg-himka-secondary/20 @error('image') border-red-500 @enderror">
            @error('image')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB. Rekomendasi: 1200x630px (rasio 16:9). Kosongkan jika tidak ingin mengubah gambar.</p>
          </div>

          <div class="bg-himka-cream/50 p-4 rounded-lg">
            <label class="block text-sm font-medium text-himka-secondary mb-3">Status Publikasi <span class="text-red-500">*</span></label>
            <div class="flex gap-6">
              <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="is_published" value="0" {{ old('is_published', $kegiatan->is_published) == '0' ? 'checked' : '' }}
                  class="w-4 h-4 text-himka-accent border-himka-secondary/20 focus:ring-himka-accent">
                <div>
                  <span class="text-sm font-medium text-himka-secondary">Draft</span>
                  <p class="text-xs text-himka-secondary/50">Kegiatan disimpan tapi tidak ditampilkan di website publik</p>
                </div>
              </label>
              <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="is_published" value="1" {{ old('is_published', $kegiatan->is_published) == '1' ? 'checked' : '' }}
                  class="w-4 h-4 text-himka-accent border-himka-secondary/20 focus:ring-himka-accent">
                <div>
                  <span class="text-sm font-medium text-himka-secondary">Publish</span>
                  <p class="text-xs text-himka-secondary/50">Kegiatan langsung ditampilkan di website publik</p>
                </div>
              </label>
            </div>
          </div>
        </div>

        <div class="flex gap-4 mt-8">
          <button type="submit" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-6 py-2 rounded-lg font-bold transition-colors flex items-center gap-2">
            <span class="material-icons text-lg">save</span> Update
          </button>
          <a href="{{ route('admin.kegiatan.index') }}" class="bg-himka-cream hover:bg-himka-cream-dark text-himka-secondary px-6 py-2 rounded-lg font-bold transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
