@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-himka-secondary py-12 px-4 relative overflow-hidden">
  <!-- Background Decorations -->
  <div class="absolute inset-0 z-0">
    <div class="absolute top-0 left-0 w-96 h-96 bg-himka-accent/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-himka-accent/5 rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-himka-secondary-dark/50 rounded-full blur-3xl"></div>
    <!-- Grid Pattern -->
    <div class="absolute inset-0 bg-[radial-gradient(#ffffff08_1px,transparent_1px)] bg-size-[32px_32px]"></div>
  </div>

  <div class="max-w-md w-full relative z-10" data-aos="fade-up">
    <div class="text-center mb-8">
      <a href="{{ route('home') }}" class="inline-block group">
        <img src="{{ asset('assets/img/logo.png') }}" alt="HIMKA" class="h-20 mx-auto mb-4 drop-shadow-2xl group-hover:scale-105 transition-transform duration-300">
      </a>
      <h1 class="text-3xl font-serif font-bold text-white">Login Kepengurusan</h1>
      <p class="text-white/60 mt-2">Masuk ke dashboard HIMKA UMRAH</p>
    </div>

    <div class="bg-white/5 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border border-white/10">
      @if($errors->any())
        <div class="mb-6 p-4 bg-red-500/20 border border-red-500/30 text-red-300 rounded-xl text-sm flex items-center gap-3">
          <span class="material-icons text-red-400">error</span>
          {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        <div>
          <label for="email" class="block text-sm font-medium text-white/80 mb-2">Email</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-black/40">
              <span class="material-icons text-xl">email</span>
            </span>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
              class="w-full pl-12 pr-4 py-3.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:outline-none focus:border-himka-accent focus:bg-white/10 transition-all duration-300"
              placeholder="email@example.com">
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-white/80 mb-2">Password</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-black/40">
              <span class="material-icons text-xl">lock</span>
            </span>
            <input type="password" name="password" id="password" required
              class="w-full pl-12 pr-4 py-3.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:outline-none focus:border-himka-accent focus:bg-white/10 transition-all duration-300"
              placeholder="••••••••">
          </div>
        </div>

        <div class="flex items-center justify-between">
          <label class="flex items-center gap-2 cursor-pointer group">
            <input type="checkbox" name="remember" class="w-4 h-4 bg-white/10 border-white/20 rounded text-himka-accent focus:ring-himka-accent focus:ring-offset-0 focus:ring-offset-transparent">
            <span class="text-sm text-white/60 group-hover:text-white/80 transition-colors">Ingat saya</span>
          </label>
        </div>

        <button type="submit"
          class="w-full bg-himka-accent text-white font-bold py-4 rounded-xl hover:bg-himka-accent-dark transition-all duration-300 shadow-lg hover:shadow-himka-accent/30 hover:scale-[1.02] flex items-center justify-center gap-2 group">
          <span>Masuk</span>
          <span class="material-icons text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </button>
      </form>
    </div>

    <p class="text-center mt-8 text-white/50 text-sm">
      <a href="{{ route('home') }}" class="text-himka-accent-light hover:text-white transition-colors inline-flex items-center gap-1 group">
        <span class="material-icons text-sm group-hover:-translate-x-1 transition-transform">arrow_back</span>
        Kembali ke Beranda
      </a>
    </p>

    <!-- Footer -->
    <p class="text-center mt-12 text-white/30 text-xs">
      &copy; {{ date('Y') }} HIMKA UMRAH. All rights reserved.
    </p>
  </div>
</div>
@endsection
