@extends('layouts.app')

@push('scripts')
<script>
  // Force navbar to scrolled state on page load
  document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('navbar');
    const navLinks = document.querySelectorAll('.nav-link');
    const navLogoTitle = document.getElementById('nav-logo-title');
    const navLogoSubtitle = document.getElementById('nav-logo-subtitle');
    const navMobileBtn = document.querySelector('.nav-mobile-btn');
    
    // Apply scrolled state immediately
    navbar.classList.add('bg-himka-secondary/90', 'backdrop-blur-md', 'shadow-lg');
    navbar.classList.remove('bg-transparent');
    
    navLinks.forEach(link => {
      link.classList.remove('text-gray-900', 'hover:text-himka-secondary');
      link.classList.add('text-white', 'hover:text-himka-cream');
    });
    
    if (navLogoTitle) {
      navLogoTitle.classList.remove('text-gray-900');
      navLogoTitle.classList.add('text-white');
    }
    
    if (navLogoSubtitle) {
      navLogoSubtitle.classList.remove('text-gray-600');
      navLogoSubtitle.classList.add('text-white/80');
    }
    
    if (navMobileBtn) {
      navMobileBtn.classList.remove('text-gray-900', 'hover:text-himka-secondary', 'hover:bg-gray-100');
      navMobileBtn.classList.add('text-white', 'hover:text-himka-cream', 'hover:bg-white/10');
    }
  });
</script>
@endpush

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-himka-cream via-white to-himka-cream py-12 px-4 relative overflow-hidden">
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0 z-0">
    <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=1920&q=80" 
      alt="Chemistry Background" 
      class="w-full h-full object-cover opacity-20">
    <div class="absolute inset-0 bg-gradient-to-br from-himka-cream/80 via-white/70 to-himka-cream/80"></div>
  </div>
  
  <!-- Background Decorations -->
  <div class="absolute inset-0 z-0">
    <div class="absolute top-0 left-0 w-96 h-96 bg-himka-secondary/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 animate-pulse-glow"></div>
    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-himka-accent/10 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 animate-pulse-glow"></div>
    <!-- Grid Pattern -->
    <div class="absolute inset-0 bg-[radial-gradient(#00000008_1px,transparent_1px)] bg-size-[32px_32px]"></div>
  </div>

  <div class="max-w-md w-full relative z-10" data-aos="fade-up">
    <div class="text-center mb-8">
      <a href="{{ route('home') }}" class="inline-block group">
        <img src="{{ asset('assets/img/logo.png') }}" alt="HIMKA" class="h-20 mx-auto mb-4 drop-shadow-lg group-hover:scale-105 transition-transform duration-300">
      </a>
      <h1 class="text-3xl font-serif font-bold text-gray-900">Login Kepengurusan</h1>
      <p class="text-gray-600 mt-2">Masuk ke dashboard HIMKA UMRAH</p>
    </div>

    <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-200">
      @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm flex items-center gap-3">
          <span class="material-icons text-red-500">error</span>
          {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <span class="material-icons text-xl">email</span>
            </span>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
              class="w-full pl-12 pr-4 py-3.5 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:border-himka-secondary focus:ring-2 focus:ring-himka-secondary/20 transition-all duration-300"
              placeholder="email@example.com">
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <span class="material-icons text-xl">lock</span>
            </span>
            <input type="password" name="password" id="password" required
              class="w-full pl-12 pr-4 py-3.5 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:border-himka-secondary focus:ring-2 focus:ring-himka-secondary/20 transition-all duration-300"
              placeholder="••••••••">
          </div>
        </div>

        <div class="flex items-center justify-between">
          <label class="flex items-center gap-2 cursor-pointer group">
            <input type="checkbox" name="remember" class="w-4 h-4 bg-white border-gray-300 rounded text-himka-secondary focus:ring-himka-secondary focus:ring-offset-0">
            <span class="text-sm text-gray-600 group-hover:text-gray-900 transition-colors">Ingat saya</span>
          </label>
        </div>

        <button type="submit"
          class="w-full bg-himka-accent text-white font-bold py-4 rounded-xl hover:bg-himka-accent-dark transition-all duration-300 shadow-lg hover:shadow-himka-accent/30 hover:scale-[1.02] flex items-center justify-center gap-2 group">
          <span>Masuk</span>
          <span class="material-icons text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </button>
      </form>
    </div>

    <p class="text-center mt-8 text-gray-500 text-sm">
      <a href="{{ route('home') }}" class="text-himka-secondary hover:text-himka-accent transition-colors inline-flex items-center gap-1 group">
        <span class="material-icons text-sm group-hover:-translate-x-1 transition-transform">arrow_back</span>
        Kembali ke Beranda
      </a>
    </p>

    <!-- Footer -->
    <p class="text-center mt-12 text-gray-400 text-xs">
      &copy; {{ date('Y') }} HIMKA UMRAH. All rights reserved.
    </p>
  </div>
</div>
@endsection
