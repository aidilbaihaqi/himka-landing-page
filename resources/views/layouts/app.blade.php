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

  <!-- Floating Buttons -->
  <div class="fixed bottom-8 right-8 z-50 flex items-center gap-3">
    <!-- Calendar Button -->
    <button id="calendarBtn" class="w-12 h-12 bg-himka-secondary text-white rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-himka-secondary-dark hover:scale-110 flex items-center justify-center" title="Kalender Kegiatan">
      <span class="material-icons">calendar_month</span>
    </button>
    
    <!-- Back to Top Button -->
    <button id="backToTop" class="w-12 h-12 bg-himka-accent text-white rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-himka-accent-dark hover:scale-110 flex items-center justify-center">
      <span class="material-icons">keyboard_arrow_up</span>
    </button>
  </div>

  <!-- Calendar Modal -->
  <div id="calendarModal" class="fixed inset-0 z-[100] hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" id="calendarBackdrop"></div>
    
    <!-- Modal Content -->
    <div class="absolute inset-4 md:inset-auto md:top-1/2 md:left-1/2 md:-translate-x-1/2 md:-translate-y-1/2 md:w-full md:max-w-lg bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">
      <!-- Header -->
      <div class="bg-himka-secondary text-white p-4 flex items-center justify-between">
        <h3 class="font-bold text-lg flex items-center gap-2">
          <span class="material-icons">event</span>
          Kalender Kegiatan HIMKA
        </h3>
        <button id="closeCalendar" class="w-8 h-8 rounded-full hover:bg-white/20 flex items-center justify-center transition-colors">
          <span class="material-icons">close</span>
        </button>
      </div>
      
      <!-- Calendar Navigation -->
      <div class="p-4 border-b border-gray-200 flex items-center justify-between">
        <button id="prevMonthCal" class="w-10 h-10 rounded-full hover:bg-himka-cream flex items-center justify-center transition-colors">
          <span class="material-icons text-himka-secondary">chevron_left</span>
        </button>
        <h4 id="calendarMonthYear" class="font-bold text-himka-secondary text-lg"></h4>
        <button id="nextMonthCal" class="w-10 h-10 rounded-full hover:bg-himka-cream flex items-center justify-center transition-colors">
          <span class="material-icons text-himka-secondary">chevron_right</span>
        </button>
      </div>
      
      <!-- Calendar Grid -->
      <div class="p-4 flex-1 overflow-y-auto">
        <!-- Day Headers -->
        <div class="grid grid-cols-7 gap-1 mb-2">
          <div class="text-center text-xs font-bold text-red-500 py-2">Min</div>
          <div class="text-center text-xs font-bold text-himka-secondary/60 py-2">Sen</div>
          <div class="text-center text-xs font-bold text-himka-secondary/60 py-2">Sel</div>
          <div class="text-center text-xs font-bold text-himka-secondary/60 py-2">Rab</div>
          <div class="text-center text-xs font-bold text-himka-secondary/60 py-2">Kam</div>
          <div class="text-center text-xs font-bold text-himka-secondary/60 py-2">Jum</div>
          <div class="text-center text-xs font-bold text-himka-secondary/60 py-2">Sab</div>
        </div>
        
        <!-- Calendar Days -->
        <div id="calendarGrid" class="grid grid-cols-7 gap-1">
          <!-- Days will be rendered here -->
        </div>
      </div>
      
      <!-- Legend -->
      <div class="p-4 border-t border-gray-200 bg-himka-cream/30">
        <div class="flex items-center justify-center gap-6 text-xs">
          <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-himka-accent"></span>
            <span class="text-himka-secondary/70">Kegiatan Mendatang</span>
          </div>
          <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-gray-400"></span>
            <span class="text-himka-secondary/70">Kegiatan Selesai</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Event Tooltip -->
  <div id="eventTooltip" class="fixed z-[110] bg-white rounded-xl shadow-xl border border-himka-secondary/10 p-4 max-w-xs hidden pointer-events-none">
    <div id="tooltipContent"></div>
  </div>

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
      
      // Back to top & calendar button visibility
      if (window.scrollY > 500) {
        backToTop.classList.remove('opacity-0', 'invisible');
        backToTop.classList.add('opacity-100', 'visible');
        calendarBtn.classList.remove('opacity-0', 'invisible');
        calendarBtn.classList.add('opacity-100', 'visible');
      } else {
        backToTop.classList.add('opacity-0', 'invisible');
        backToTop.classList.remove('opacity-100', 'visible');
        calendarBtn.classList.add('opacity-0', 'invisible');
        calendarBtn.classList.remove('opacity-100', 'visible');
      }
    });

    // Back to top click
    backToTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Calendar Modal
    const calendarBtn = document.getElementById('calendarBtn');
    const calendarModal = document.getElementById('calendarModal');
    const calendarBackdrop = document.getElementById('calendarBackdrop');
    const closeCalendar = document.getElementById('closeCalendar');
    const calendarGrid = document.getElementById('calendarGrid');
    const calendarMonthYear = document.getElementById('calendarMonthYear');
    const prevMonthCal = document.getElementById('prevMonthCal');
    const nextMonthCal = document.getElementById('nextMonthCal');
    const eventTooltip = document.getElementById('eventTooltip');
    const tooltipContent = document.getElementById('tooltipContent');

    let currentCalDate = new Date();
    let kegiatanData = [];

    const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    function openCalendarModal() {
      calendarModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
      renderCalendar();
    }

    function closeCalendarModal() {
      calendarModal.classList.add('hidden');
      document.body.style.overflow = '';
      hideTooltip();
    }

    calendarBtn.addEventListener('click', openCalendarModal);
    closeCalendar.addEventListener('click', closeCalendarModal);
    calendarBackdrop.addEventListener('click', closeCalendarModal);

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !calendarModal.classList.contains('hidden')) {
        closeCalendarModal();
      }
    });

    prevMonthCal.addEventListener('click', () => {
      currentCalDate.setMonth(currentCalDate.getMonth() - 1);
      renderCalendar();
    });

    nextMonthCal.addEventListener('click', () => {
      currentCalDate.setMonth(currentCalDate.getMonth() + 1);
      renderCalendar();
    });

    async function fetchKegiatanData(year, month) {
      try {
        const response = await fetch(`/api/kegiatan-calendar?year=${year}&month=${month}`);
        return await response.json();
      } catch (error) {
        console.error('Error fetching kegiatan:', error);
        return [];
      }
    }

    async function renderCalendar() {
      const year = currentCalDate.getFullYear();
      const month = currentCalDate.getMonth();
      
      calendarMonthYear.textContent = `${monthNames[month]} ${year}`;
      
      // Fetch kegiatan data
      kegiatanData = await fetchKegiatanData(year, month + 1);
      
      const firstDay = new Date(year, month, 1).getDay();
      const daysInMonth = new Date(year, month + 1, 0).getDate();
      const today = new Date();
      
      let html = '';
      
      // Empty cells
      for (let i = 0; i < firstDay; i++) {
        html += '<div class="p-2"></div>';
      }
      
      // Days
      for (let day = 1; day <= daysInMonth; day++) {
        const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        const dayEvents = kegiatanData.filter(e => e.date === dateStr);
        const hasEvent = dayEvents.length > 0;
        const isToday = today.getDate() === day && today.getMonth() === month && today.getFullYear() === year;
        const isSunday = new Date(year, month, day).getDay() === 0;
        const isPastEvent = hasEvent && dayEvents.every(e => e.isPast);
        
        let classes = 'relative p-2 text-center text-sm rounded-lg transition-all duration-200 ';
        
        if (isToday) {
          classes += 'bg-himka-secondary text-white font-bold ';
        } else if (hasEvent) {
          if (isPastEvent) {
            classes += 'bg-gray-100 text-gray-700 font-medium cursor-pointer hover:bg-gray-200 ';
          } else {
            classes += 'bg-himka-accent/10 text-himka-accent font-medium cursor-pointer hover:bg-himka-accent hover:text-white ';
          }
        } else if (isSunday) {
          classes += 'text-red-500 hover:bg-himka-cream ';
        } else {
          classes += 'text-himka-secondary hover:bg-himka-cream ';
        }
        
        html += `<div class="${classes}" data-date="${dateStr}" ${hasEvent ? `data-events='${JSON.stringify(dayEvents)}'` : ''}>
          ${day}
          ${hasEvent ? `<span class="absolute bottom-1 left-1/2 -translate-x-1/2 w-1.5 h-1.5 rounded-full ${isPastEvent ? 'bg-gray-400' : 'bg-himka-accent'}"></span>` : ''}
        </div>`;
      }
      
      calendarGrid.innerHTML = html;
      
      // Add event listeners for hover
      calendarGrid.querySelectorAll('[data-events]').forEach(el => {
        el.addEventListener('mouseenter', showTooltip);
        el.addEventListener('mouseleave', hideTooltip);
        el.addEventListener('mousemove', moveTooltip);
      });
    }

    function showTooltip(e) {
      const events = JSON.parse(e.target.dataset.events);
      const date = e.target.dataset.date;
      const dateObj = new Date(date);
      const formattedDate = `${dateObj.getDate()} ${monthNames[dateObj.getMonth()]} ${dateObj.getFullYear()}`;
      
      let html = `<div class="text-xs text-himka-secondary/60 mb-2">${formattedDate}</div>`;
      
      events.forEach(event => {
        const statusClass = event.isPast ? 'bg-gray-100 text-gray-600' : 'bg-himka-accent/10 text-himka-accent';
        const statusText = event.isPast ? 'Selesai' : 'Mendatang';
        
        html += `
          <div class="mb-2 last:mb-0">
            <div class="font-bold text-himka-secondary text-sm">${event.title}</div>
            ${event.location ? `<div class="text-xs text-himka-secondary/60 flex items-center gap-1 mt-1"><span class="material-icons text-xs">location_on</span>${event.location}</div>` : ''}
            <span class="inline-block mt-1 text-[10px] px-2 py-0.5 rounded-full ${statusClass}">${statusText}</span>
          </div>
        `;
      });
      
      tooltipContent.innerHTML = html;
      eventTooltip.classList.remove('hidden');
      moveTooltip(e);
    }

    function hideTooltip() {
      eventTooltip.classList.add('hidden');
    }

    function moveTooltip(e) {
      const tooltip = eventTooltip;
      const rect = tooltip.getBoundingClientRect();
      let x = e.clientX + 15;
      let y = e.clientY + 15;
      
      // Prevent overflow
      if (x + rect.width > window.innerWidth) {
        x = e.clientX - rect.width - 15;
      }
      if (y + rect.height > window.innerHeight) {
        y = e.clientY - rect.height - 15;
      }
      
      tooltip.style.left = x + 'px';
      tooltip.style.top = y + 'px';
    }

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