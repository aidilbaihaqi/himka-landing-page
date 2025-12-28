<!-- Navbar -->
<nav class="fixed w-full z-50 transition-all duration-500" id="navbar">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-20">
      <a href="{{ url('/') }}" class="shrink-0 flex items-center gap-3 group">
        <img class="h-12 w-auto drop-shadow-lg group-hover:scale-105 transition-transform duration-300" src="{{ asset('assets/img/logo.png') }}" alt="HIMKA Logo">
        <div class="hidden md:block">
          <h1 id="nav-logo-title" class="text-xl font-bold text-gray-900 tracking-wider leading-none transition-colors duration-300">HIMKA</h1>
          <p id="nav-logo-subtitle" class="text-[0.6rem] text-gray-600 tracking-widest uppercase transition-colors duration-300">Universitas Maritim Raja Ali Haji</p>
        </div>
      </a>

      <div class="hidden md:flex space-x-1 items-center">
        <a href="{{ url('/') }}#home" class="nav-link relative px-4 py-2 text-gray-900 hover:text-himka-secondary font-medium transition-all duration-300 text-sm tracking-wide uppercase group">
          Beranda
          <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-himka-accent group-hover:w-3/4 transition-all duration-300"></span>
        </a>
        <a href="{{ url('/') }}#profil" class="nav-link relative px-4 py-2 text-gray-900 hover:text-himka-secondary font-medium transition-all duration-300 text-sm tracking-wide uppercase group">
          Profil
          <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-himka-accent group-hover:w-3/4 transition-all duration-300"></span>
        </a>
        <a href="{{ route('pengurus.index') }}" class="nav-link relative px-4 py-2 text-gray-900 hover:text-himka-secondary font-medium transition-all duration-300 text-sm tracking-wide uppercase group {{ request()->routeIs('pengurus.index') ? 'text-himka-secondary' : '' }}">
          Pengurus
          <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-himka-accent group-hover:w-3/4 transition-all duration-300 {{ request()->routeIs('pengurus.index') ? 'w-3/4' : '' }}"></span>
        </a>
        <a href="{{ url('/') }}#galery" class="nav-link relative px-4 py-2 text-gray-900 hover:text-himka-secondary font-medium transition-all duration-300 text-sm tracking-wide uppercase group">
          Galeri
          <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-himka-accent group-hover:w-3/4 transition-all duration-300"></span>
        </a>
        <a href="{{ route('articles.index') }}" class="nav-link relative px-4 py-2 text-gray-900 hover:text-himka-secondary font-medium transition-all duration-300 text-sm tracking-wide uppercase group {{ request()->routeIs('articles.*') ? 'text-himka-secondary' : '' }}">
          Berita
          <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-himka-accent group-hover:w-3/4 transition-all duration-300 {{ request()->routeIs('articles.*') ? 'w-3/4' : '' }}"></span>
        </a>
        <a href="{{ url('/') }}#kontak"
          class="ml-4 px-6 py-2.5 rounded-full border-2 border-himka-accent bg-himka-accent text-white hover:bg-himka-accent-dark transition-all duration-300 text-sm font-bold tracking-wide uppercase hover:scale-105">
          Hubungi Kami
        </a>
      </div>

      <div class="md:hidden flex items-center">
        <button id="mobile-menu-btn" class="nav-mobile-btn text-gray-900 hover:text-himka-secondary focus:outline-none p-2 rounded-lg hover:bg-gray-100 transition-colors">
          <svg class="h-7 w-7 menu-icon transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div class="hidden md:hidden bg-himka-secondary/98 backdrop-blur-lg absolute w-full border-t border-white/10 shadow-2xl" id="mobile-menu">
    <div class="px-4 pt-4 pb-6 space-y-2">
      <a href="{{ url('/') }}#home" class="block px-4 py-3 text-white hover:text-himka-cream hover:bg-white/5 font-medium text-lg rounded-xl transition-all duration-300">Beranda</a>
      <a href="{{ url('/') }}#profil" class="block px-4 py-3 text-white hover:text-himka-cream hover:bg-white/5 font-medium text-lg rounded-xl transition-all duration-300">Profil</a>
      <a href="{{ route('pengurus.index') }}" class="block px-4 py-3 text-white hover:text-himka-cream hover:bg-white/5 font-medium text-lg rounded-xl transition-all duration-300 {{ request()->routeIs('pengurus.index') ? 'bg-white/10' : '' }}">Pengurus</a>
      <a href="{{ url('/') }}#galery" class="block px-4 py-3 text-white hover:text-himka-cream hover:bg-white/5 font-medium text-lg rounded-xl transition-all duration-300">Galeri</a>
      <a href="{{ route('articles.index') }}" class="block px-4 py-3 text-white hover:text-himka-cream hover:bg-white/5 font-medium text-lg rounded-xl transition-all duration-300 {{ request()->routeIs('articles.*') ? 'bg-white/10' : '' }}">Berita</a>
      <div class="pt-2 mt-2 border-t border-white/10">
        <a href="{{ url('/') }}#kontak" class="block px-4 py-3 bg-himka-accent text-white font-bold text-lg rounded-xl text-center hover:bg-himka-accent-dark transition-colors">Hubungi Kami</a>
      </div>
    </div>
  </div>
</nav>
