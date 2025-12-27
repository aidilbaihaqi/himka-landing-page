@extends('layouts.admin')

@section('title', 'Kelola Landing Page')
@section('page-title', 'Kelola Landing Page')

@section('content')
<form action="{{ route('admin.landing-page.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
  @csrf
  @method('PUT')

  <!-- Hero Section -->
  <div class="bg-white rounded-2xl shadow-sm border border-himka-secondary/5 overflow-hidden">
    <div class="p-6 border-b border-himka-secondary/10 bg-gradient-to-r from-himka-secondary/5 to-transparent">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-himka-secondary/10 flex items-center justify-center">
          <span class="material-icons text-himka-secondary">view_carousel</span>
        </div>
        <div>
          <h2 class="text-lg font-bold text-himka-secondary">Hero Section</h2>
          <p class="text-sm text-himka-secondary/60">Bagian utama yang pertama kali dilihat pengunjung</p>
        </div>
      </div>
    </div>

    <div class="p-6">
      <div>
        <label class="block text-sm font-medium text-himka-secondary mb-2">Slogan / Tagline</label>
        <input type="text" name="hero_slogan" value="{{ old('hero_slogan', $hero['slogan']) }}"
          class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all"
          placeholder="Masukkan slogan..." required>
        @error('hero_slogan')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <p class="text-xs text-himka-secondary/50 mt-2">Slogan akan ditampilkan di bawah judul hero section</p>
      </div>
    </div>
  </div>

  <!-- Profil Section -->
  <div class="bg-white rounded-2xl shadow-sm border border-himka-secondary/5 overflow-hidden">
    <div class="p-6 border-b border-himka-secondary/10 bg-gradient-to-r from-himka-secondary/5 to-transparent">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-himka-secondary/10 flex items-center justify-center">
          <span class="material-icons text-himka-secondary">info</span>
        </div>
        <div>
          <h2 class="text-lg font-bold text-himka-secondary">Profil Section</h2>
          <p class="text-sm text-himka-secondary/60">Informasi tentang HIMKA UMRAH</p>
        </div>
      </div>
    </div>

    <div class="p-6 space-y-6">
      <!-- Image Upload -->
      <div>
        <label class="block text-sm font-medium text-himka-secondary mb-2">Foto Profil HIMKA</label>
        <div class="flex items-start gap-4">
          @if($profil['image'])
            <div class="relative group">
              <img src="{{ Storage::url($profil['image']) }}" class="w-32 h-32 object-cover rounded-xl border border-himka-secondary/20" alt="Profil">
              <a href="{{ route('admin.landing-page.delete-image') }}" 
                onclick="return confirm('Hapus foto ini?')"
                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                <span class="material-icons text-sm">close</span>
              </a>
            </div>
          @endif
          <div class="flex-1">
            <input type="file" name="profil_image" accept="image/*"
              class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-himka-secondary/10 file:text-himka-secondary file:font-medium hover:file:bg-himka-secondary/20">
            @error('profil_image')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-xs text-himka-secondary/50 mt-2">Format: JPG, PNG. Maksimal 2MB. Rekomendasi: 800x600px</p>
          </div>
        </div>
      </div>

      <!-- Title -->
      <div>
        <label class="block text-sm font-medium text-himka-secondary mb-2">Judul Section</label>
        <input type="text" name="profil_title" value="{{ old('profil_title', $profil['title']) }}"
          class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all"
          placeholder="Contoh: This Is HIMKA" required>
        @error('profil_title')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Description -->
      <div>
        <label class="block text-sm font-medium text-himka-secondary mb-2">Deskripsi Utama</label>
        <textarea name="profil_description" rows="3"
          class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all resize-none"
          placeholder="Deskripsi singkat tentang HIMKA..." required>{{ old('profil_description', $profil['description']) }}</textarea>
        @error('profil_description')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Description 2 -->
      <div>
        <label class="block text-sm font-medium text-himka-secondary mb-2">Deskripsi Tambahan (Opsional)</label>
        <textarea name="profil_description_2" rows="3"
          class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all resize-none"
          placeholder="Deskripsi tambahan...">{{ old('profil_description_2', $profil['description_2'] ?? '') }}</textarea>
        @error('profil_description_2')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Stats -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium text-himka-secondary mb-2">Tahun Berdiri</label>
          <div class="relative">
            <input type="number" name="profil_years_established" value="{{ old('profil_years_established', $profil['years_established']) }}"
              class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all"
              min="1" required>
            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-himka-secondary/40 text-sm">tahun</span>
          </div>
          @error('profil_years_established')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label class="block text-sm font-medium text-himka-secondary mb-2">Jumlah Program Kerja</label>
          <div class="relative">
            <input type="number" name="profil_total_programs" value="{{ old('profil_total_programs', $profil['total_programs']) }}"
              class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all"
              min="1" required>
            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-himka-secondary/40 text-sm">proker</span>
          </div>
          @error('profil_total_programs')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label class="block text-sm font-medium text-himka-secondary mb-2">Jumlah Anggota Aktif</label>
          <div class="relative">
            <input type="number" name="profil_active_members" value="{{ old('profil_active_members', $profil['active_members']) }}"
              class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all"
              min="1" required>
            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-himka-secondary/40 text-sm">orang</span>
          </div>
          @error('profil_active_members')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>
  </div>

  <!-- Ketua Umum Section -->
  <div class="bg-white rounded-2xl shadow-sm border border-himka-secondary/5 overflow-hidden">
    <div class="p-6 border-b border-himka-secondary/10 bg-gradient-to-r from-himka-secondary/5 to-transparent">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-himka-secondary/10 flex items-center justify-center">
          <span class="material-icons text-himka-secondary">person</span>
        </div>
        <div>
          <h2 class="text-lg font-bold text-himka-secondary">Sambutan Ketua Umum</h2>
          <p class="text-sm text-himka-secondary/60">Informasi dan kata sambutan ketua umum HIMKA</p>
        </div>
      </div>
    </div>

    <div class="p-6 space-y-6">
      <!-- Ketua Image Upload -->
      <div>
        <label class="block text-sm font-medium text-himka-secondary mb-2">Foto Ketua Umum</label>
        <div class="flex items-start gap-4">
          @if($ketuaUmum['image'])
            <div class="relative group">
              <img src="{{ Storage::url($ketuaUmum['image']) }}" class="w-32 h-32 object-cover rounded-xl border border-himka-secondary/20" alt="Ketua Umum">
              <a href="{{ route('admin.landing-page.delete-image', ['section' => 'ketua_umum']) }}" 
                onclick="return confirm('Hapus foto ini?')"
                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                <span class="material-icons text-sm">close</span>
              </a>
            </div>
          @endif
          <div class="flex-1">
            <input type="file" name="ketua_image" accept="image/*"
              class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-himka-secondary/10 file:text-himka-secondary file:font-medium hover:file:bg-himka-secondary/20">
            @error('ketua_image')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-xs text-himka-secondary/50 mt-2">Format: JPG, PNG. Maksimal 2MB. Rekomendasi: Portrait 600x800px</p>
          </div>
        </div>
      </div>

      <!-- Name & Position -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-himka-secondary mb-2">Nama Ketua Umum</label>
          <input type="text" name="ketua_name" value="{{ old('ketua_name', $ketuaUmum['name']) }}"
            class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all"
            placeholder="Nama lengkap..." required>
          @error('ketua_name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label class="block text-sm font-medium text-himka-secondary mb-2">Jabatan / Periode</label>
          <input type="text" name="ketua_position" value="{{ old('ketua_position', $ketuaUmum['position']) }}"
            class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all"
            placeholder="Contoh: Ketua Umum HIMKA UMRAH 2024/2025" required>
          @error('ketua_position')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- Quote -->
      <div>
        <label class="block text-sm font-medium text-himka-secondary mb-2">Kata Sambutan</label>
        <textarea name="ketua_quote" rows="4"
          class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all resize-none"
          placeholder="Kata sambutan dari ketua umum..." required>{{ old('ketua_quote', $ketuaUmum['quote']) }}</textarea>
        @error('ketua_quote')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Visi & Misi -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-himka-secondary mb-2">Visi</label>
          <textarea name="ketua_visi" rows="3"
            class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all resize-none"
            placeholder="Visi organisasi..." required>{{ old('ketua_visi', $ketuaUmum['visi']) }}</textarea>
          @error('ketua_visi')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label class="block text-sm font-medium text-himka-secondary mb-2">Misi</label>
          <textarea name="ketua_misi" rows="3"
            class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all resize-none"
            placeholder="Misi organisasi..." required>{{ old('ketua_misi', $ketuaUmum['misi']) }}</textarea>
          @error('ketua_misi')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>
  </div>

  <!-- Submit Button -->
  <div class="flex justify-end">
    <button type="submit" class="px-8 py-3 bg-himka-accent text-white rounded-xl hover:bg-himka-accent/90 transition-colors flex items-center gap-2 font-medium">
      <span class="material-icons text-lg">save</span>
      Simpan Perubahan
    </button>
  </div>
</form>
@endsection
