<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'HIMKA UMRH - Kabinet Cakrawala')</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;1,600&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-himka-cream text-himka-purple overflow-x-hidden">
  <!-- Navbar -->
  <nav class="fixed w-full z-50 transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-20">
        <div class="flex-shrink-0 flex items-center gap-3">
          <img class="h-12 w-auto drop-shadow-lg" src="{{ asset('assets/img/logo.png') }}" alt="HIMKA Logo">
          <div class="hidden md:block">
            <h1 class="text-xl font-bold text-white tracking-wider leading-none">HIMKA</h1>
            <p class="text-[0.6rem] text-white/80 tracking-widest uppercase">Universitas Maritim Raja Ali Haji</p>
          </div>
        </div>

        <div class="hidden md:flex space-x-8 items-center">
          <a href="#home"
            class="text-white hover:text-himka-cream font-medium transition-colors text-sm tracking-wide uppercase">Beranda</a>
          <a href="#profil"
            class="text-white hover:text-himka-cream font-medium transition-colors text-sm tracking-wide uppercase">Profil</a>
          <a href="#galery"
            class="text-white hover:text-himka-cream font-medium transition-colors text-sm tracking-wide uppercase">Galeri</a>
          <a href="#kegiatan"
            class="text-white hover:text-himka-cream font-medium transition-colors text-sm tracking-wide uppercase">Kegiatan</a>
          <a href="#kontak"
            class="px-5 py-2 rounded-full border border-himka-red bg-himka-red text-white hover:bg-white hover:text-himka-red transition-all duration-300 text-sm font-bold tracking-wide uppercase">Hubungi
            Kami</a>
        </div>

        <div class="md:hidden flex items-center">
          <button id="mobile-menu-btn" class="text-white hover:text-himka-cream focus:outline-none">
            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div class="hidden md:hidden bg-himka-purple/95 backdrop-blur-md absolute w-full border-t border-white/10"
      id="mobile-menu">
      <div class="px-4 pt-2 pb-6 space-y-1 text-center">
        <a href="#home" class="block px-3 py-3 text-white hover:text-himka-cream font-medium text-lg">Beranda</a>
        <a href="#profil" class="block px-3 py-3 text-white hover:text-himka-cream font-medium text-lg">Profil</a>
        <a href="#galery" class="block px-3 py-3 text-white hover:text-himka-cream font-medium text-lg">Galeri</a>
        <a href="#kegiatan" class="block px-3 py-3 text-white hover:text-himka-cream font-medium text-lg">Kegiatan</a>
        <a href="#kontak" class="block px-3 py-3 text-himka-red font-bold text-lg">Hubungi Kami</a>
      </div>
    </div>
  </nav>

  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-himka-purple text-white pt-16 pb-8 border-t border-himka-red">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
        <div class="text-center md:text-left">
          <div class="flex items-center justify-center md:justify-start gap-3 mb-4">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-10">
            <span class="text-2xl font-bold tracking-wider">HIMKA UMRH</span>
          </div>
          <p class="text-white/70 text-sm leading-relaxed max-w-xs mx-auto md:mx-0">
            Wadah aspirasi dan kreasi mahasiswa Kimia Universitas Maritim Raja Ali Haji. Reaksi Bersatu, Kimia Maju!
          </p>
        </div>

        <div class="text-center">
          <h3 class="text-lg font-bold text-himka-red mb-6 uppercase tracking-widest">Tautan</h3>
          <ul class="space-y-3 text-white/80">
            <li><a href="#home" class="hover:text-himka-cream transition-colors">Beranda</a></li>
            <li><a href="#profil" class="hover:text-himka-cream transition-colors">Profil</a></li>
            <li><a href="#kegiatan" class="hover:text-himka-cream transition-colors">Kegiatan</a></li>
          </ul>
        </div>

        <div class="text-center md:text-right">
          <h3 class="text-lg font-bold text-himka-red mb-6 uppercase tracking-widest">Sosial Media</h3>
          <div class="flex justify-center md:justify-end gap-6">
            <a href="https://instagram.com/himka.umrah" target="_blank"
              class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-himka-red transition-all duration-300 hover:-translate-y-1">
              <span class="material-icons text-white text-xl">photo_camera</span>
            </a>
            <a href="mailto:himkafttkumrah@gmail.com"
              class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-himka-red transition-all duration-300 hover:-translate-y-1">
              <span class="material-icons text-white text-xl">email</span>
            </a>
          </div>
        </div>
      </div>

      <div class="border-t border-white/10 pt-8 text-center">
        <p class="text-white/50 text-xs tracking-wider">&copy; {{ date('Y') }} HIMKA UMRAH. Built with Chemistry &
          Code.</p>
      </div>
    </div>
  </footer>

  <script>
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 20) {
        navbar.classList.add('bg-himka-purple/90', 'backdrop-blur-md', 'shadow-lg', 'py-0');
        navbar.classList.remove('bg-transparent', 'py-4');
      } else {
        navbar.classList.add('bg-transparent', 'py-4');
        navbar.classList.remove('bg-himka-purple/90', 'backdrop-blur-md', 'shadow-lg', 'py-0');
      }
    });

    // Mobile menu toggle
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
      const isHidden = menu.classList.contains('hidden');
      navbar.classList.toggle('bg-himka-purple', !isHidden);
    });
  </script>
</body>

</html>