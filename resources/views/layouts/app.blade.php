<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'HIMKA UMRAH - Kabinet Cakrawala')</title>

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

<body class="font-sans antialiased bg-himka-cream text-himka-secondary overflow-x-hidden">
  @include('components.navbar')

  <main>
    @yield('content')
  </main>

  @include('components.footer')

  <script>
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 20) {
        navbar.classList.add('bg-himka-secondary/90', 'backdrop-blur-md', 'shadow-lg', 'py-0');
        navbar.classList.remove('bg-transparent', 'py-4');
      } else {
        navbar.classList.add('bg-transparent', 'py-4');
        navbar.classList.remove('bg-himka-secondary/90', 'backdrop-blur-md', 'shadow-lg', 'py-0');
      }
    });

    // Mobile menu toggle
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
      const isHidden = menu.classList.contains('hidden');
      navbar.classList.toggle('bg-himka-secondary', !isHidden);
    });
  </script>

  @stack('scripts')
</body>

</html>