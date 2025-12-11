<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="description"
    content="Himpunan Mahasiswa Kimia Universitas Maritim Raja Ali Haji (HIMKA UMRAH). Wadah aspirasi dan kreasi mahasiswa Kimia.">
  <meta name="keywords" content="HIMKA, UMRAH, Kimia, Mahasiswa, Organisasi">

  <title>@yield('title', 'HIMKA UMRAH - Kabinet Cakrawala')</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- AOS Animation Library -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 10px;
    }

    ::-webkit-scrollbar-track {
      background: #2F2F70;
    }

    ::-webkit-scrollbar-thumb {
      background: #A42824;
      border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #C73B36;
    }

    /* Loader */
    #loader {
      position: fixed;
      inset: 0;
      background: #fcfff5;
      z-index: 9999;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: opacity 0.5s ease;
    }
  </style>
</head>

<body
  class="font-sans antialiased bg-himka-cream text-himka-secondary overflow-x-hidden selection:bg-himka-accent selection:text-white">

  <!-- Loading Screen -->
  <div id="loader">
    <div class="flex flex-col items-center">
      <img src="{{ asset('assets/img/logo.png') }}" class="w-16 h-16 animate-bounce mb-4" alt="Loading...">
      <div class="w-12 h-12 border-4 border-himka-accent border-t-transparent rounded-full animate-spin"></div>
    </div>
  </div>

  @include('components.navbar')

  <main>
    @yield('content')
  </main>

  @include('components.footer')

  <!-- Back to Top Button -->
  <button id="backToTop"
    class="fixed bottom-8 right-8 bg-himka-accent text-white p-3 rounded-full shadow-lg translate-y-20 opacity-0 transition-all duration-300 z-40 hover:bg-himka-accent-light hover:-translate-y-1 group">
    <span class="material-icons group-hover:animate-bounce">arrow_upward</span>
  </button>

  <!-- AOS Script -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script>
    // Initialize AOS
    document.addEventListener('DOMContentLoaded', function () {
      AOS.init({
        duration: 800,
        once: true,
        offset: 100,
        easing: 'ease-out-cubic'
      });

      // Loader
      const loader = document.getElementById('loader');
      setTimeout(() => {
        loader.style.opacity = '0';
        setTimeout(() => {
          loader.style.display = 'none';
        }, 500);
      }, 1000); // Minimum load time
    });

    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    const backToTop = document.getElementById('backToTop');
    const isHomePage = document.querySelector('#home') !== null; // Check if the home section exists

    window.addEventListener('scroll', () => {
      const isScrolled = window.scrollY > 20;

      if (isHomePage) {
        if (isScrolled) {
          navbar.classList.add('glass-nav', 'py-3', 'text-himka-secondary');
          navbar.classList.remove('bg-transparent', 'py-6', 'text-white');
        } else {
          navbar.classList.add('bg-transparent', 'py-6', 'text-white');
          navbar.classList.remove('glass-nav', 'py-3', 'text-himka-secondary');
        }
      } else {
        // General Pages (Login, etc)
        if (isScrolled) {
          navbar.classList.add('glass-nav', 'py-3');
          navbar.classList.remove('bg-transparent', 'py-6');
        } else {
          navbar.classList.add('bg-transparent', 'py-6');
          navbar.classList.remove('glass-nav', 'py-3');
        }
      }

      // Back to top
      if (window.scrollY > 300) {
        backToTop.classList.remove('translate-y-20', 'opacity-0');
      } else {
        backToTop.classList.add('translate-y-20', 'opacity-0');
      }
    });

    backToTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Mobile menu toggle
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>

  @stack('scripts')
</body>

</html>