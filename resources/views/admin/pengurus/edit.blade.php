@extends('layouts.admin')

@section('title', 'Edit Pengurus')
@section('page-title', 'Edit Pengurus')

@section('content')
  <div class="max-w-4xl">
    <div class="mb-6">
      <a href="{{ route('admin.pengurus.index') }}" class="text-himka-secondary/60 hover:text-himka-secondary flex items-center gap-1 text-sm">
        <span class="material-icons text-lg">arrow_back</span> Kembali
      </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 p-6">
      <h2 class="text-xl font-bold text-himka-secondary mb-6">Edit Pengurus</h2>

      <form action="{{ route('admin.pengurus.update', $penguru) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
              <input type="text" name="name" value="{{ old('name', $penguru->user->name) }}" required
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Email <span class="text-red-500">*</span></label>
              <input type="email" name="email" value="{{ old('email', $penguru->user->email) }}" required
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">NIM <span class="text-red-500">*</span></label>
              <input type="text" name="nim" value="{{ old('nim', $penguru->nim) }}" required
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">No. HP</label>
              <input type="text" name="phone" value="{{ old('phone', $penguru->phone) }}"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Jabatan <span class="text-red-500">*</span></label>
              <input type="text" name="jabatan" value="{{ old('jabatan', $penguru->jabatan) }}" required
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Divisi</label>
              <input type="text" name="divisi" value="{{ old('divisi', $penguru->divisi) }}"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Periode Mulai <span class="text-red-500">*</span></label>
              <input type="number" name="periode_start" value="{{ old('periode_start', $penguru->periode_start) }}" required
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Periode Selesai <span class="text-red-500">*</span></label>
              <input type="number" name="periode_end" value="{{ old('periode_end', $penguru->periode_end) }}" required
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Bio</label>
            <textarea name="bio" rows="3" class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('bio', $penguru->bio) }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Foto</label>
            @if($penguru->photo)
              <div class="mb-2">
                <img src="{{ Storage::url($penguru->photo) }}" class="w-20 h-20 rounded-full object-cover" alt="">
              </div>
            @endif
            <input type="file" name="photo" accept="image/*"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
          </div>

          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $penguru->is_active) ? 'checked' : '' }}
              class="w-4 h-4 text-himka-accent border-himka-secondary/20 rounded focus:ring-himka-accent">
            <span class="text-sm text-himka-secondary">Aktif</span>
          </label>
        </div>

        <div class="flex gap-4 mt-8">
          <button type="submit" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-6 py-2 rounded-lg font-bold transition-colors">
            Update
          </button>
          <a href="{{ route('admin.pengurus.index') }}" class="bg-himka-cream hover:bg-himka-cream-dark text-himka-secondary px-6 py-2 rounded-lg font-bold transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
