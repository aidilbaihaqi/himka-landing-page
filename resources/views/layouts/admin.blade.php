<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Admin - HIMKA Panel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-himka-cream text-himka-secondary">

  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-64 bg-himka-secondary text-white flex flex-col shadow-2xl transition-all duration-300" id="sidebar">
      <div class="h-20 flex items-center px-8 border-b border-white/10">
        <img src="{{ asset('assets/img/logo.png') }}" class="h-8 mr-3" alt="Logo">
        <span class="text-xl font-bold tracking-wider">KAM PANEL</span>
      </div>

      <div class="p-6 border-b border-white/10 bg-black/20">
        <div class="flex items-center gap-4">
          <img src="{{ asset('assets/img/profile.jpg') }}"
            class="h-10 w-10 rounded-full object-cover border-2 border-himka-accent" alt="Admin">
          <div>
            <p class="font-bold text-sm">Super Admin</p>
            <p class="text-xs text-white/50">admin@himka.id</p>
          </div>
        </div>
      </div>

      <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
        <a href="#"
          class="flex items-center gap-3 px-4 py-3 bg-himka-accent text-white rounded-xl transition-colors font-medium shadow-lg shadow-himka-accent/20">
          <span class="material-icons">dashboard</span>
          Dashboard
        </a>
        <a href="#"
          class="flex items-center gap-3 px-4 py-3 text-white/60 hover:bg-white/10 hover:text-white rounded-xl transition-colors font-medium">
          <span class="material-icons">article</span>
          Kegiatan
        </a>
        <a href="#"
          class="flex items-center gap-3 px-4 py-3 text-white/60 hover:bg-white/10 hover:text-white rounded-xl transition-colors font-medium">
          <span class="material-icons">collections</span>
          Galeri
        </a>
        <a href="#"
          class="flex items-center gap-3 px-4 py-3 text-white/60 hover:bg-white/10 hover:text-white rounded-xl transition-colors font-medium">
          <span class="material-icons">mail</span>
          Inbox <span class="bg-himka-accent text-white text-[10px] px-1.5 py-0.5 rounded-full ml-auto">3</span>
        </a>
        <a href="#"
          class="flex items-center gap-3 px-4 py-3 text-white/60 hover:bg-white/10 hover:text-white rounded-xl transition-colors font-medium">
          <span class="material-icons">people</span>
          Pengurus
        </a>
      </nav>

      <div class="p-4 border-t border-white/10">
        <a href="#"
          class="flex items-center gap-3 px-4 py-3 text-himka-accent hover:bg-himka-accent/10 rounded-xl transition-colors font-medium">
          <span class="material-icons">logout</span>
          Logout
        </a>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
      <!-- Topbar -->
      <header
        class="h-20 bg-white shadow-sm flex items-center justify-between px-8 bg-himka-cream border-b border-himka-secondary/10">
        <button class="text-himka-secondary hover:text-himka-accent transition-colors">
          <span class="material-icons text-2xl">menu</span>
        </button>

        <div class="flex items-center gap-6">
          <div class="relative">
            <span class="material-icons text-himka-secondary text-2xl">notifications</span>
            <span
              class="absolute top-0 right-0 h-2.5 w-2.5 bg-himka-accent rounded-full border-2 border-himka-cream"></span>
          </div>
        </div>
      </header>

      <!-- Page Content -->
      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-himka-cream p-8">
        @yield('content')
      </main>
    </div>
  </div>

</body>

</html>