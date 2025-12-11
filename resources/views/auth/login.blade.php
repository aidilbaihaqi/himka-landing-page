@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-himka-cream py-12 px-4">
  <div class="max-w-md w-full">
    <div class="text-center mb-8">
      <a href="{{ route('home') }}" class="inline-block">
        <img src="{{ asset('assets/img/logo.png') }}" alt="HIMKA" class="h-16 mx-auto mb-4">
      </a>
      <h1 class="text-3xl font-serif font-bold text-himka-secondary">Login Admin</h1>
      <p class="text-himka-secondary/60 mt-2">Masuk ke dashboard HIMKA UMRAH</p>
    </div>

    <div class="bg-white rounded-2xl shadow-xl p-8">
      @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm">
          {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        <div>
          <label for="email" class="block text-sm font-medium text-himka-secondary mb-2">Email</label>
          <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
            class="w-full px-4 py-3 border border-himka-secondary/20 rounded-xl focus:ring-2 focus:ring-himka-accent focus:border-himka-accent transition-colors"
            placeholder="email@example.com">
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-himka-secondary mb-2">Password</label>
          <input type="password" name="password" id="password" required
            class="w-full px-4 py-3 border border-himka-secondary/20 rounded-xl focus:ring-2 focus:ring-himka-accent focus:border-himka-accent transition-colors"
            placeholder="••••••••">
        </div>

        <div class="flex items-center justify-between">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="remember" class="w-4 h-4 text-himka-accent border-himka-secondary/20 rounded focus:ring-himka-accent">
            <span class="text-sm text-himka-secondary/70">Ingat saya</span>
          </label>
        </div>

        <button type="submit"
          class="w-full bg-himka-accent text-white font-bold py-3 rounded-xl hover:bg-himka-accent-dark transition-colors shadow-lg hover:shadow-himka-accent/25">
          Masuk
        </button>
      </form>
    </div>

    <p class="text-center mt-6 text-himka-secondary/60 text-sm">
      <a href="{{ route('home') }}" class="text-himka-accent hover:underline">← Kembali ke Beranda</a>
    </p>
  </div>
</div>
@endsection
