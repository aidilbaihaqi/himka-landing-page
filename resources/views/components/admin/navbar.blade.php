<!-- Topbar -->
<header class="h-16 lg:h-20 bg-himka-cream flex items-center justify-between px-4 lg:px-8 border-b border-himka-secondary/10 sticky top-0 z-30">
  <div class="flex items-center gap-4">
    <button class="lg:hidden text-himka-secondary hover:text-himka-accent transition-colors" onclick="toggleSidebar()">
      <span class="material-icons text-2xl">menu</span>
    </button>
    <h1 class="text-lg lg:text-xl font-bold text-himka-secondary hidden sm:block">@yield('page-title', 'Dashboard')</h1>
  </div>

  <div class="flex items-center gap-4">
    <!-- Notifications -->
    <div class="relative">
      <a href="{{ route('admin.notifications.index') }}" class="relative block">
        <span class="material-icons text-himka-secondary text-2xl">notifications</span>
        @if(auth()->user()->unreadNotifications->count() > 0)
          <span class="absolute -top-1 -right-1 h-5 w-5 bg-himka-accent rounded-full text-white text-[10px] flex items-center justify-center">
            {{ auth()->user()->unreadNotifications->count() }}
          </span>
        @endif
      </a>
    </div>

    <!-- Profile Dropdown -->
    <div class="relative" x-data="{ open: false }">
      <button @click="open = !open" class="flex items-center gap-2 text-himka-secondary hover:text-himka-accent transition-colors">
        <div class="h-8 w-8 rounded-full bg-himka-secondary text-white flex items-center justify-center text-sm font-bold">
          {{ substr(auth()->user()->name, 0, 1) }}
        </div>
        <span class="hidden sm:block text-sm font-medium">{{ auth()->user()->name }}</span>
        <span class="material-icons text-sm">expand_more</span>
      </button>

      <div x-show="open" @click.away="open = false" x-transition
        class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-himka-secondary/10 py-2 z-50">
        <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-himka-secondary hover:bg-himka-cream transition-colors">
          <span class="material-icons text-lg">person</span>
          Profil Saya
        </a>
        <hr class="my-2 border-himka-secondary/10">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 text-sm text-red-500 hover:bg-red-50 transition-colors">
            <span class="material-icons text-lg">logout</span>
            Logout
          </button>
        </form>
      </div>
    </div>
  </div>
</header>
