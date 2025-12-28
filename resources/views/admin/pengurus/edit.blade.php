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
              <input type="text" name="name" value="{{ old('name', $penguru->user->name) }}" required maxlength="255"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('name') border-red-500 @enderror">
              @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
              <p class="text-xs text-himka-secondary/50 mt-1">Maksimal 255 karakter.</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Email <span class="text-red-500">*</span></label>
              <input type="email" name="email" value="{{ old('email', $penguru->user->email) }}" required
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('email') border-red-500 @enderror">
              @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
              <p class="text-xs text-himka-secondary/50 mt-1">Email harus unik dan valid. Digunakan untuk login.</p>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">NIM <span class="text-red-500">*</span></label>
              <input type="text" name="nim" value="{{ old('nim', $penguru->nim) }}" required maxlength="20"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('nim') border-red-500 @enderror">
              @error('nim')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
              <p class="text-xs text-himka-secondary/50 mt-1">Nomor Induk Mahasiswa. Maksimal 20 karakter.</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">No. HP</label>
              <input type="text" name="phone" value="{{ old('phone', $penguru->phone) }}" maxlength="20"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('phone') border-red-500 @enderror">
              @error('phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
              <p class="text-xs text-himka-secondary/50 mt-1">Opsional. Contoh: 08123456789</p>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Jabatan <span class="text-red-500">*</span></label>
              <input type="text" name="jabatan" value="{{ old('jabatan', $penguru->jabatan) }}" required maxlength="100"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('jabatan') border-red-500 @enderror">
              @error('jabatan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
              <p class="text-xs text-himka-secondary/50 mt-1">Maksimal 100 karakter. Contoh: Ketua Umum, Sekretaris, Bendahara.</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Divisi</label>
              <input type="text" name="divisi" value="{{ old('divisi', $penguru->divisi) }}" maxlength="100"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('divisi') border-red-500 @enderror">
              @error('divisi')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
              <p class="text-xs text-himka-secondary/50 mt-1">Opsional. Contoh: Kominfo, PSDM, Kaderisasi.</p>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Periode Mulai <span class="text-red-500">*</span></label>
              <input type="number" name="periode_start" value="{{ old('periode_start', $penguru->periode_start) }}" required min="2000" max="2100"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('periode_start') border-red-500 @enderror">
              @error('periode_start')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
              <p class="text-xs text-himka-secondary/50 mt-1">Tahun mulai kepengurusan. Contoh: 2024</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Periode Selesai <span class="text-red-500">*</span></label>
              <input type="number" name="periode_end" value="{{ old('periode_end', $penguru->periode_end) }}" required min="2000" max="2100"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('periode_end') border-red-500 @enderror">
              @error('periode_end')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
              <p class="text-xs text-himka-secondary/50 mt-1">Tahun selesai kepengurusan. Contoh: 2025</p>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Bio</label>
            <textarea name="bio" rows="3" maxlength="500"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('bio') border-red-500 @enderror">{{ old('bio', $penguru->bio) }}</textarea>
            @error('bio')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Opsional. Maksimal 500 karakter. Deskripsi singkat tentang pengurus.</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Urutan Tampil</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $penguru->sort_order) }}" min="0"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('sort_order') border-red-500 @enderror">
            @error('sort_order')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Angka lebih kecil akan ditampilkan lebih dulu. Contoh: Ketua Umum = 1, Wakil Ketua = 2, dst.</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Foto</label>
            @if($penguru->photo)
              <div class="mb-3 relative inline-block group">
                <img src="{{ Storage::url($penguru->photo) }}" class="w-24 h-24 rounded-full object-cover border border-himka-secondary/20" alt="">
                <span class="absolute bottom-0 left-0 right-0 bg-black/60 text-white text-[10px] px-1.5 py-0.5 rounded-b-full text-center">Foto saat ini</span>
              </div>
            @endif
            <input type="file" name="photo" accept="image/jpeg,image/png,image/jpg,image/webp"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-himka-secondary/10 file:text-himka-secondary file:font-medium hover:file:bg-himka-secondary/20 @error('photo') border-red-500 @enderror">
            @error('photo')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</p>
          </div>

          <div class="bg-himka-cream/50 p-4 rounded-lg">
            <label class="block text-sm font-medium text-himka-secondary mb-3">Status</label>
            <div class="space-y-3">
              <label class="flex items-start gap-3 cursor-pointer">
                <input type="radio" name="is_active" value="1" {{ old('is_active', $penguru->is_active) == '1' ? 'checked' : '' }}
                  class="w-4 h-4 mt-0.5 text-himka-accent border-himka-secondary/20 focus:ring-himka-accent">
                <div>
                  <span class="text-sm font-medium text-himka-secondary">Aktif</span>
                  <p class="text-xs text-himka-secondary/50">Pengurus dapat login dan ditampilkan di website.</p>
                </div>
              </label>
              <label class="flex items-start gap-3 cursor-pointer">
                <input type="radio" name="is_active" value="0" {{ old('is_active', $penguru->is_active) == '0' ? 'checked' : '' }}
                  class="w-4 h-4 mt-0.5 text-himka-accent border-himka-secondary/20 focus:ring-himka-accent">
                <div>
                  <span class="text-sm font-medium text-himka-secondary">Nonaktif</span>
                  <p class="text-xs text-himka-secondary/50">Pengurus tidak dapat login dan tidak ditampilkan di website.</p>
                </div>
              </label>
            </div>
          </div>
        </div>

        <div class="flex gap-4 mt-8">
          <button type="submit" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-6 py-2 rounded-lg font-bold transition-colors flex items-center gap-2">
            <span class="material-icons text-lg">save</span> Update
          </button>
          <a href="{{ route('admin.pengurus.index') }}" class="bg-himka-cream hover:bg-himka-cream-dark text-himka-secondary px-6 py-2 rounded-lg font-bold transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
