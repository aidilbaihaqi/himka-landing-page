<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Dashboard') - HIMKA Admin</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  
  <!-- Quill Editor -->
  <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
  @stack('styles')
</head>

<body class="font-sans antialiased bg-himka-cream text-himka-secondary">

  <div class="flex min-h-screen">
    @include('components.admin.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen lg:ml-0">
      @include('components.admin.navbar')

      <!-- Page Content -->
      <main class="flex-1 overflow-x-hidden overflow-y-auto p-4 lg:p-8">
        <!-- Flash Messages -->
        @if(session('success'))
          <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-xl flex items-center gap-3" x-data="{ show: true }" x-show="show">
            <span class="material-icons">check_circle</span>
            <span class="flex-1">{{ session('success') }}</span>
            <button @click="show = false" class="text-green-500 hover:text-green-700">
              <span class="material-icons text-lg">close</span>
            </button>
          </div>
        @endif

        @if(session('error'))
          <div class="mb-6 p-4 bg-red-100 border border-red-200 text-red-700 rounded-xl flex items-center gap-3" x-data="{ show: true }" x-show="show">
            <span class="material-icons">error</span>
            <span class="flex-1">{{ session('error') }}</span>
            <button @click="show = false" class="text-red-500 hover:text-red-700">
              <span class="material-icons text-lg">close</span>
            </button>
          </div>
        @endif

        @yield('content')
      </main>

      @include('components.admin.footer')
    </div>
  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('sidebarOverlay');

      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    }
  </script>

  @stack('scripts')
</body>

</html>
