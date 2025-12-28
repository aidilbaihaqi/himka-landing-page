<!-- Sidebar -->
<aside class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-himka-secondary text-white flex flex-col shadow-2xl transition-transform duration-300 transform -translate-x-full lg:translate-x-0" id="sidebar">
  <div class="h-16 lg:h-20 flex items-center justify-between px-6 border-b border-white/10">
    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
      <img src="{{ asset('assets/img/logo.png') }}" class="h-8" alt="Logo">
      <span class="text-lg font-bold tracking-wider">HIMKA</span>
    </a>
    <button class="lg:hidden text-white" onclick="toggleSidebar()">
      <span class="material-icons">close</span>
    </button>
  </div>

  <div class="p-4 border-b border-white/10 bg-black/20">
    <div class="flex items-center gap-3">
      <div class="h-10 w-10 rounded-full bg-himka-accent flex items-center justify-center text-white font-bold">
        {{ substr(auth()->user()->name, 0, 1) }}
      </div>
      <div class="flex-1 min-w-0">
        <p class="font-medium text-sm truncate">{{ auth()->user()->name }}</p>
        <p class="text-xs text-white/50 truncate">{{ auth()->user()->email }}</p>
      </div>
    </div>
  </div>

  <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
    <a href="{{ route('admin.dashboard') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-himka-accent text-white shadow-lg' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
      <span class="material-icons text-xl">dashboard</span>
      Dashboard
    </a>

    <a href="{{ route('admin.categories.index') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium {{ request()->routeIs('admin.categories.*') ? 'bg-himka-accent text-white shadow-lg' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
      <span class="material-icons text-xl">category</span>
      Kategori
    </a>

    <a href="{{ route('admin.kegiatan.index') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium {{ request()->routeIs('admin.kegiatan.*') ? 'bg-himka-accent text-white shadow-lg' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
      <span class="material-icons text-xl">event</span>
      Kegiatan
    </a>

    <a href="{{ route('admin.articles.index') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium {{ request()->routeIs('admin.articles.*') ? 'bg-himka-accent text-white shadow-lg' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
      <span class="material-icons text-xl">newspaper</span>
      Berita
    </a>

    <a href="{{ route('admin.galleries.index') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium {{ request()->routeIs('admin.galleries.*') ? 'bg-himka-accent text-white shadow-lg' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
      <span class="material-icons text-xl">collections</span>
      Galeri
    </a>

    <a href="{{ route('admin.notulensi.index') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium {{ request()->routeIs('admin.notulensi.*') ? 'bg-himka-accent text-white shadow-lg' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
      <span class="material-icons text-xl">description</span>
      Notulensi
    </a>

    <a href="{{ route('admin.notifications.index') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium {{ request()->routeIs('admin.notifications.*') ? 'bg-himka-accent text-white shadow-lg' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
      <span class="material-icons text-xl">notifications</span>
      Inbox
      @if(auth()->user()->unreadNotifications->count() > 0)
        <span class="bg-himka-accent text-white text-[10px] px-1.5 py-0.5 rounded-full ml-auto">
          {{ auth()->user()->unreadNotifications->count() }}
        </span>
      @endif
    </a>
  </nav>

  <div class="p-3 border-t border-white/10">
    <a href="{{ route('admin.landing-page.edit') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium {{ request()->routeIs('admin.landing-page.*') ? 'bg-himka-accent text-white shadow-lg' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
      <span class="material-icons text-xl">web</span>
      Landing Page
    </a>
    <a href="{{ route('admin.settings.edit') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium {{ request()->routeIs('admin.settings.*') ? 'bg-himka-accent text-white' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
      <span class="material-icons text-xl">contact_mail</span>
      Kontak Footer
    </a>
    <a href="{{ route('admin.pengurus.index') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium {{ request()->routeIs('admin.pengurus.*') ? 'bg-himka-accent text-white shadow-lg' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
      <span class="material-icons text-xl">people</span>
      Data Pengurus
    </a>
    <a href="{{ route('admin.profile.edit') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium {{ request()->routeIs('admin.profile.*') ? 'bg-himka-accent text-white' : 'text-white/60 hover:bg-white/10 hover:text-white' }}">
      <span class="material-icons text-xl">person</span>
      Profil Saya
    </a>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-300 hover:bg-red-500/10 rounded-xl transition-colors font-medium">
        <span class="material-icons text-xl">logout</span>
        Logout
      </button>
    </form>
  </div>
</aside>

<!-- Overlay for mobile -->
<div class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden" id="sidebarOverlay" onclick="toggleSidebar()"></div>
