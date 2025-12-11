<!-- Navbar -->
<nav class="fixed w-full z-50 transition-all duration-300 py-6 bg-transparent" id="navbar">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-14">
      <div class="flex-shrink-0 flex items-center gap-3">
        <a href="{{ url('/') }}" class="flex items-center gap-3 group">
          <img
            class="h-10 w-auto drop-shadow-lg transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6"
            src="{{ asset('assets/img/logo.png') }}" alt="HIMKA Logo">
          <div class="hidden md:block">
            <h1 class="text-xl font-bold text-white tracking-wider leading-none shadow-black drop-shadow-md">HIMKA</h1>
            <p class="text-[0.6rem] text-white/90 tracking-widest uppercase drop-shadow-sm">Universitas Maritim Raja Ali
              Haji</p>
          </div>
        </a>
      </div>

      <div class="hidden md:flex space-x-1 items-center">
        @php
          $navItems = [
            ['label' => 'Beranda', 'url' => url('/') . '#home'],
            ['label' => 'Profil', 'url' => url('/') . '#profil'],
            ['label' => 'Galeri', 'url' => url('/') . '#galery'],
            ['label' => 'Berita', 'url' => route('articles.index')],
          ];
        @endphp

        @foreach($navItems as $item)
          <a href="{{ $item['url'] }}"
            class="relative px-4 py-2 text-white hover:text-himka-cream font-medium transition-colors text-sm tracking-wide uppercase group overflow-hidden">
            <span class="relative z-10">{{ $item['label'] }}</span>
            <span
              class="absolute bottom-0 left-0 w-full h-0.5 bg-himka-accent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
          </a>
        @endforeach

        <a href="{{ url('/') }}#kontak"
          class="ml-4 px-6 py-2 rounded-full border border-himka-accent bg-himka-accent text-white hover:bg-white hover:text-himka-accent hover:border-white transition-all duration-300 text-sm font-bold tracking-wide uppercase shadow-lg hover:shadow-himka-accent/50 hover:-translate-y-1">
          Hubungi Kami
        </a>
      </div>

      <div class="md:hidden flex items-center">
        <button id="mobile-menu-btn"
          class="text-white hover:text-himka-cream focus:outline-none transition-transform active:scale-95">
          <svg class="h-8 w-8 drop-shadow-md" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div
    class="hidden md:hidden bg-himka-secondary/95 backdrop-blur-md absolute w-full border-t border-white/10 shadow-2xl transition-all duration-300 origin-top"
    id="mobile-menu">
    <div class="px-4 pt-2 pb-6 space-y-2 text-center">
      <a href="{{ url('/') }}#home"
        class="block px-3 py-3 text-white hover:text-himka-cream hover:bg-white/5 rounded-lg font-medium text-lg transition-colors">Beranda</a>
      <a href="{{ url('/') }}#profil"
        class="block px-3 py-3 text-white hover:text-himka-cream hover:bg-white/5 rounded-lg font-medium text-lg transition-colors">Profil</a>
      <a href="{{ url('/') }}#galery"
        class="block px-3 py-3 text-white hover:text-himka-cream hover:bg-white/5 rounded-lg font-medium text-lg transition-colors">Galeri</a>
      <a href="{{ route('articles.index') }}"
        class="block px-3 py-3 text-white hover:text-himka-cream hover:bg-white/5 rounded-lg font-medium text-lg transition-colors">Berita</a>
      <div class="pt-4">
        <a href="{{ url('/') }}#kontak"
          class="inline-block px-8 py-3 bg-himka-accent text-white rounded-full font-bold text-lg shadow-lg hover:bg-himka-accent-light transition-colors">Hubungi
          Kami</a>
      </div>
    </div>
  </div>
</nav>