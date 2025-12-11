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
            <label class="block text-sm font-medium text-himka-secondary mb-2">Judul <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title', $kegiatan->title) }}" required
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Tanggal Kegiatan</label>
              <input type="date" name="event_date" value="{{ old('event_date', $kegiatan->event_date?->format('Y-m-d')) }}"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Lokasi</label>
              <input type="text" name="location" value="{{ old('location', $kegiatan->location) }}"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Deskripsi Singkat</label>
            <textarea name="description" rows="2" class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('description', $kegiatan->description) }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Konten <span class="text-red-500">*</span></label>
            <textarea name="content" rows="10" required
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('content', $kegiatan->content) }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Gambar</label>
            @if($kegiatan->image)
              <div class="mb-2">
                <img src="{{ Storage::url($kegiatan->image) }}" class="w-32 h-32 object-cover rounded-lg" alt="">
              </div>
            @endif
            <input type="file" name="image" accept="image/*"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
          </div>

          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $kegiatan->is_published) ? 'checked' : '' }}
              class="w-4 h-4 text-himka-accent border-himka-secondary/20 rounded focus:ring-himka-accent">
            <span class="text-sm text-himka-secondary">Publish</span>
          </label>
        </div>

        <div class="flex gap-4 mt-8">
          <button type="submit" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-6 py-2 rounded-lg font-bold transition-colors">
            Update
          </button>
          <a href="{{ route('admin.kegiatan.index') }}" class="bg-himka-cream hover:bg-himka-cream-dark text-himka-secondary px-6 py-2 rounded-lg font-bold transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
