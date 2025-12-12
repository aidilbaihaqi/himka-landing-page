@extends('layouts.admin')

@section('title', 'Pengaturan Kontak')
@section('page-title', 'Pengaturan Kontak')

@section('content')
<div class="max-w-4xl">
  <div class="bg-white rounded-2xl shadow-sm border border-himka-secondary/5 overflow-hidden">
    <div class="p-6 border-b border-himka-secondary/10">
      <h2 class="text-lg font-bold text-himka-secondary">Informasi Kontak Footer</h2>
      <p class="text-sm text-himka-secondary/60 mt-1">Kelola informasi kontak yang ditampilkan di footer website.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="p-6 space-y-6">
      @csrf
      @method('PUT')

      <div>
        <label class="block text-sm font-medium text-himka-secondary mb-2">Email Kontak</label>
        <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email']) }}"
          class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all"
          placeholder="email@example.com" required>
        @error('contact_email')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-himka-secondary mb-2">Nama Admin / PIC</label>
        <input type="text" name="contact_admin_name" value="{{ old('contact_admin_name', $settings['contact_admin_name']) }}"
          class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all"
          placeholder="Nama Admin" required>
        @error('contact_admin_name')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-himka-secondary mb-2">Alamat Lokasi</label>
        <textarea name="contact_address" rows="3"
          class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all resize-none"
          placeholder="Alamat lengkap..." required>{{ old('contact_address', $settings['contact_address']) }}</textarea>
        @error('contact_address')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-himka-secondary mb-2">Google Maps Embed URL</label>
        <input type="url" name="google_maps_embed" value="{{ old('google_maps_embed', $settings['google_maps_embed']) }}"
          class="w-full px-4 py-3 rounded-xl border border-himka-secondary/20 focus:border-himka-accent focus:ring-2 focus:ring-himka-accent/20 outline-none transition-all"
          placeholder="https://www.google.com/maps/embed?pb=...">
        @error('google_maps_embed')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <p class="text-xs text-himka-secondary/50 mt-2">
          <span class="material-icons text-xs align-middle">info</span>
          Cara mendapatkan: Buka Google Maps → Pilih lokasi → Klik "Share" → Tab "Embed a map" → Copy URL dari src="..."
        </p>
      </div>

      @if($settings['google_maps_embed'])
      <div>
        <label class="block text-sm font-medium text-himka-secondary mb-2">Preview Maps</label>
        <div class="rounded-xl overflow-hidden border border-himka-secondary/20">
          <iframe src="{{ $settings['google_maps_embed'] }}" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
      @endif

      <div class="flex justify-end pt-4 border-t border-himka-secondary/10">
        <button type="submit" class="px-6 py-3 bg-himka-accent text-white rounded-xl hover:bg-himka-accent/90 transition-colors flex items-center gap-2">
          <span class="material-icons text-lg">save</span>
          Simpan Pengaturan
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
