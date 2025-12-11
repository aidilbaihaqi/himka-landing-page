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

  <!-- AOS Animation Library -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    /* Custom animations */
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
    }
    @keyframes pulse-glow {
      0%, 100% { opacity: 0.4; transform: scale(1); }
      50% { opacity: 0.6; transform: scale(1.05); }
    }
    .animate-float { animation: float 6s ease-in-out infinite; }
    .animate-float-delayed { animation: float 6s ease-in-out infinite 2s; }
    .animate-pulse-glow { animation: pulse-glow 4s ease-in-out infinite; }
    
    /* Counter animation */
    .counter { display: inline-block; }
    
    /* Smooth image hover */
    .img-hover-zoom { overflow: hidden; }
    .img-hover-zoom img { transition: transform 0.5s ease; }
    .img-hover-zoom:hover img { transform: scale(1.1); }
  </style>
</head>

<body class="font-sans antialiased bg-himka-cream text-himka-secondary overflow-x-hidden">
  @include('components.navbar')

  <main>
    @yield('content')
  </main>

  @include('components.footer')

  <!-- Back to Top Button -->
  <button id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-himka-accent text-white rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-himka-accent-dark hover:scale-110 z-50 flex items-center justify-center">
    <span class="material-icons">keyboard_arrow_up</span>
  </button>

  <!-- AOS Library -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
  <script>
    // Initialize AOS
    AOS.init({
      duration: 800,
      easing: 'ease-out-cubic',
      once: true,
      offset: 50
    });

    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    const backToTop = document.getElementById('backToTop');
    const navLinks = document.querySelectorAll('.nav-link');
    const navLogoTitle = document.getElementById('nav-logo-title');
    const navLogoSubtitle = document.getElementById('nav-logo-subtitle');
    const navMobileBtn = document.querySelector('.nav-mobile-btn');
    
    window.addEventListener('scroll', () => {
      if (window.scrollY > 20) {
        // Navbar background
        navbar.classList.add('bg-himka-secondary/90', 'backdrop-blur-md', 'shadow-lg', 'py-0');
        navbar.classList.remove('bg-transparent', 'py-4');
        
        // Change text to white when scrolled
        navLinks.forEach(link => {
          link.classList.remove('text-gray-900', 'hover:text-himka-secondary');
          link.classList.add('text-white', 'hover:text-himka-cream');
        });
        
        if (navLogoTitle) {
          navLogoTitle.classList.remove('text-gray-900');
          navLogoTitle.classList.add('text-white');
        }
        
        if (navLogoSubtitle) {
          navLogoSubtitle.classList.remove('text-gray-600');
          navLogoSubtitle.classList.add('text-white/80');
        }
        
        if (navMobileBtn) {
          navMobileBtn.classList.remove('text-gray-900', 'hover:text-himka-secondary', 'hover:bg-gray-100');
          navMobileBtn.classList.add('text-white', 'hover:text-himka-cream', 'hover:bg-white/10');
        }
      } else {
        // Navbar transparent
        navbar.classList.add('bg-transparent', 'py-4');
        navbar.classList.remove('bg-himka-secondary/90', 'backdrop-blur-md', 'shadow-lg', 'py-0');
        
        // Change text to black when at top
        navLinks.forEach(link => {
          link.classList.remove('text-white', 'hover:text-himka-cream');
          link.classList.add('text-gray-900', 'hover:text-himka-secondary');
        });
        
        if (navLogoTitle) {
          navLogoTitle.classList.remove('text-white');
          navLogoTitle.classList.add('text-gray-900');
        }
        
        if (navLogoSubtitle) {
          navLogoSubtitle.classList.remove('text-white/80');
          navLogoSubtitle.classList.add('text-gray-600');
        }
        
        if (navMobileBtn) {
          navMobileBtn.classList.remove('text-white', 'hover:text-himka-cream', 'hover:bg-white/10');
          navMobileBtn.classList.add('text-gray-900', 'hover:text-himka-secondary', 'hover:bg-gray-100');
        }
      }
      
      // Back to top button visibility
      if (window.scrollY > 500) {
        backToTop.classList.remove('opacity-0', 'invisible');
        backToTop.classList.add('opacity-100', 'visible');
      } else {
        backToTop.classList.add('opacity-0', 'invisible');
        backToTop.classList.remove('opacity-100', 'visible');
      }
    });

    // Back to top click
    backToTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Mobile menu toggle
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
      const isHidden = menu.classList.contains('hidden');
      navbar.classList.toggle('bg-himka-secondary', !isHidden);
    });

    // Counter animation
    function animateCounter(element, target, duration = 2000) {
      let start = 0;
      const increment = target / (duration / 16);
      const timer = setInterval(() => {
        start += increment;
        if (start >= target) {
          element.textContent = target + '+';
          clearInterval(timer);
        } else {
          element.textContent = Math.floor(start) + '+';
        }
      }, 16);
    }

    // Intersection Observer for counters
    const counterObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const counters = entry.target.querySelectorAll('[data-counter]');
          counters.forEach(counter => {
            const target = parseInt(counter.dataset.counter);
            animateCounter(counter, target);
          });
          counterObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    document.querySelectorAll('.counter-section').forEach(section => {
      counterObserver.observe(section);
    });
  </script>

  @stack('scripts')
</body>

</html>