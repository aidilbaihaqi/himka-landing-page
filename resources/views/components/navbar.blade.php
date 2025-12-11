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
        <a href="{{ url('/') }}#home"
          class="text-white hover:text-himka-cream font-medium transition-colors text-sm tracking-wide uppercase">Beranda</a>
        <a href="{{ url('/') }}#profil"
          class="text-white hover:text-himka-cream font-medium transition-colors text-sm tracking-wide uppercase">Profil</a>
        <a href="{{ url('/') }}#galery"
          class="text-white hover:text-himka-cream font-medium transition-colors text-sm tracking-wide uppercase">Galeri</a>
        <a href="{{ route('articles.index') }}"
          class="text-white hover:text-himka-cream font-medium transition-colors text-sm tracking-wide uppercase">Berita</a>
        <a href="{{ url('/') }}#kontak"
          class="px-5 py-2 rounded-full border border-himka-accent bg-himka-accent text-white hover:bg-white hover:text-himka-accent transition-all duration-300 text-sm font-bold tracking-wide uppercase">Hubungi
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
  <div class="hidden md:hidden bg-himka-secondary/95 backdrop-blur-md absolute w-full border-t border-white/10"
    id="mobile-menu">
    <div class="px-4 pt-2 pb-6 space-y-1 text-center">
      <a href="{{ url('/') }}#home" class="block px-3 py-3 text-white hover:text-himka-cream font-medium text-lg">Beranda</a>
      <a href="{{ url('/') }}#profil" class="block px-3 py-3 text-white hover:text-himka-cream font-medium text-lg">Profil</a>
      <a href="{{ url('/') }}#galery" class="block px-3 py-3 text-white hover:text-himka-cream font-medium text-lg">Galeri</a>
      <a href="{{ route('articles.index') }}" class="block px-3 py-3 text-white hover:text-himka-cream font-medium text-lg">Berita</a>
      <a href="{{ url('/') }}#kontak" class="block px-3 py-3 text-himka-accent font-bold text-lg">Hubungi Kami</a>
    </div>
  </div>
</nav>
