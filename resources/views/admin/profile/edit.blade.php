@extends('layouts.admin')

@section('title', 'Pengaturan Profil')

@section('content')
<div class="mb-6">
  <h1 class="text-2xl font-bold text-himka-secondary">Pengaturan Profil</h1>
  <p class="text-himka-secondary/60 text-sm mt-1">Kelola informasi akun Anda</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
  <!-- Profile Information -->
  <div class="bg-white rounded-2xl shadow-sm p-6">
    <h2 class="text-lg font-bold text-himka-secondary mb-6 flex items-center gap-2">
      <span class="material-icons text-himka-accent">person</span>
      Informasi Profil
    </h2>

    <form action="{{ route('admin.profile.update') }}" method="POST">
      @csrf
      @method('PUT')

      <div class="space-y-4">
        <div>
          <label for="name" class="block text-sm font-medium text-himka-secondary mb-2">Nama Lengkap</label>
          <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required
            class="w-full px-4 py-3 border border-himka-secondary/20 rounded-xl focus:ring-2 focus:ring-himka-accent focus:border-himka-accent transition-colors @error('name') border-red-500 @enderror">
          @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-himka-secondary mb-2">Email</label>
          <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required
            class="w-full px-4 py-3 border border-himka-secondary/20 rounded-xl focus:ring-2 focus:ring-himka-accent focus:border-himka-accent transition-colors @error('email') border-red-500 @enderror">
          @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit"
          class="w-full bg-himka-accent text-white font-bold py-3 rounded-xl hover:bg-himka-accent-dark transition-colors">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>

  <!-- Change Password -->
  <div class="bg-white rounded-2xl shadow-sm p-6">
    <h2 class="text-lg font-bold text-himka-secondary mb-6 flex items-center gap-2">
      <span class="material-icons text-himka-accent">lock</span>
      Ubah Password
    </h2>

    <form action="{{ route('admin.profile.password') }}" method="POST">
      @csrf
      @method('PUT')

      <div class="space-y-4">
        <div>
          <label for="current_password" class="block text-sm font-medium text-himka-secondary mb-2">Password Saat Ini</label>
          <input type="password" name="current_password" id="current_password" required
            class="w-full px-4 py-3 border border-himka-secondary/20 rounded-xl focus:ring-2 focus:ring-himka-accent focus:border-himka-accent transition-colors @error('current_password') border-red-500 @enderror">
          @error('current_password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-himka-secondary mb-2">Password Baru</label>
          <input type="password" name="password" id="password" required
            class="w-full px-4 py-3 border border-himka-secondary/20 rounded-xl focus:ring-2 focus:ring-himka-accent focus:border-himka-accent transition-colors @error('password') border-red-500 @enderror">
          @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-himka-secondary mb-2">Konfirmasi Password Baru</label>
          <input type="password" name="password_confirmation" id="password_confirmation" required
            class="w-full px-4 py-3 border border-himka-secondary/20 rounded-xl focus:ring-2 focus:ring-himka-accent focus:border-himka-accent transition-colors">
        </div>

        <button type="submit"
          class="w-full bg-himka-secondary text-white font-bold py-3 rounded-xl hover:bg-himka-secondary-dark transition-colors">
          Ubah Password
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
