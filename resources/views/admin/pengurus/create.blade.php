@extends('layouts.admin')

@section('title', 'Tambah Pengurus')
@section('page-title', 'Tambah Pengurus')

@section('content')
  <div class="max-w-4xl">
    <div class="mb-6">
      <a href="{{ route('admin.pengurus.index') }}" class="text-himka-secondary/60 hover:text-himka-secondary flex items-center gap-1 text-sm">
        <span class="material-icons text-lg">arrow_back</span> Kembali
      </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 p-6">
      <h2 class="text-xl font-bold text-himka-secondary mb-2">Tambah Pengurus Baru</h2>
      <p class="text-himka-secondary/60 text-sm mb-6">Password default: <code class="bg-himka-cream px-2 py-1 rounded">himkajaya01</code></p>

      <form action="{{ route('admin.pengurus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
              <input type="text" name="name" value="{{ old('name') }}" required
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
              @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Email <span class="text-red-500">*</span></label>
              <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
              @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">NIM <span class="text-red-500">*</span></label>
              <input type="text" name="nim" value="{{ old('nim') }}" required
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
              @error('nim')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">No. HP</label>
              <input type="text" name="phone" value="{{ old('phone') }}"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Jabatan <span class="text-red-500">*</span></label>
              <input type="text" name="jabatan" value="{{ old('jabatan') }}" required placeholder="Contoh: Ketua Umum"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Divisi</label>
              <input type="text" name="divisi" value="{{ old('divisi') }}" placeholder="Contoh: Kominfo"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Periode Mulai <span class="text-red-500">*</span></label>
              <input type="number" name="periode_start" value="{{ old('periode_start', date('Y')) }}" required min="2000" max="2100"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Periode Selesai <span class="text-red-500">*</span></label>
              <input type="number" name="periode_end" value="{{ old('periode_end', date('Y') + 1) }}" required min="2000" max="2100"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Bio</label>
            <textarea name="bio" rows="3" class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('bio') }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Foto</label>
            <input type="file" name="photo" accept="image/*"
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
          <a href="{{ route('admin.pengurus.index') }}" class="bg-himka-cream hover:bg-himka-cream-dark text-himka-secondary px-6 py-2 rounded-lg font-bold transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
