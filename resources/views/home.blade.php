@extends('layouts.app')

@section('content')
  <!-- HERO SECTION -->
  <section class="relative h-screen flex items-center justify-center overflow-hidden" id="home">
    <!-- Background Image with Chemistry Theme -->
    <div class="absolute inset-0 z-0">
      <!-- Chemistry Background Image -->
      <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
           style="background-image: url('https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=2070');">
      </div>
      <!-- Dark Overlay for better text readability -->
      <div class="absolute inset-0 bg-gradient-to-br from-himka-secondary/90 via-himka-secondary/85 to-himka-secondary-dark/90"></div>
      <!-- Animated Accent Circles -->
      <div
        class="absolute top-0 left-0 w-96 h-96 bg-himka-accent/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 animate-pulse">
      </div>
      <div
        class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-himka-accent/15 rounded-full blur-3xl translate-x-1/3 translate-y-1/3">
      </div>
    </div>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto" data-aos="fade-up">
      <h2 class="text-himka-accent font-bold tracking-[0.5em] text-sm md:text-base mb-4 uppercase">Himpunan Mahasiswa Kimia
      </h2>
      <h1 class="text-5xl md:text-7xl lg:text-8xl font-serif font-bold text-white mb-6 leading-tight drop-shadow-2xl">
        KABINET <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-himka-cream to-white">CAKRAWALA</span>
      </h1>
      <p class="text-white/90 text-lg md:text-xl font-light tracking-wide mb-10 max-w-2xl mx-auto">
        "Reaksi Bersatu, Kimia Maju, Semangat Tak Pernah Luntur"
      </p>

      <div class="flex flex-col md:flex-row gap-4 justify-center">
        <a href="#profil"
          class="px-8 py-4 bg-himka-accent text-white font-bold rounded-full hover:bg-himka-accent-dark transition-all duration-300 shadow-lg hover:shadow-himka-accent/25 transform hover:-translate-y-1">
          Tentang Kami
        </a>
        <a href="#kegiatan"
          class="px-8 py-4 border-2 border-himka-cream/40 text-white font-bold rounded-full hover:bg-himka-cream/10 backdrop-blur-sm transition-all duration-300">
          Lihat Program
        </a>
      </div>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
      <a href="#profil" class="text-white/50 hover:text-white transition-colors">
        <span class="material-icons text-4xl">expand_more</span>
      </a>
    </div>
  </section>

  <!-- ABOUT SECTION -->
  <section class="py-24 bg-himka-cream" id="profil">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="relative">
          <div class="absolute -top-4 -left-4 w-24 h-24 border-t-4 border-l-4 border-himka-accent"></div>
          <div class="absolute -bottom-4 -right-4 w-24 h-24 border-b-4 border-r-4 border-himka-accent"></div>
          <img src="{{ asset('assets/img/kegiatan2.jpg') }}" alt="About"
            class="rounded-lg shadow-2xl w-full h-[500px] object-cover grayscale hover:grayscale-0 transition-all duration-700">
        </div>

        <div>
          <h3 class="text-himka-accent font-bold tracking-widest text-sm mb-2 uppercase">Profil Organisasi</h3>
          <h2 class="text-4xl md:text-5xl font-serif font-bold text-himka-secondary mb-8">This Is HIMKA</h2>
          <p class="text-himka-secondary/80 leading-relaxed mb-6 text-lg">
            HIMA Kimia Universitas Maritim Raja Ali Haji (HIMKA UMRAH) dibentuk sebagai organisasi resmi yang menaungi
            seluruh mahasiswa Program Studi Kimia.
          </p>
          <p class="text-himka-secondary/80 leading-relaxed mb-8">
            Sejak berdiri, HIMKA UMRAH aktif menyelenggarakan berbagai kegiatan seperti seminar ilmiah, pelatihan,
            kompetisi, hingga kegiatan sosial untuk memperkuat kontribusi mahasiswa dalam lingkungan kampus dan masyarakat
            luas.
          </p>

          <div class="flex gap-8 border-t border-himka-secondary/10 pt-8">
            <div>
              <span class="block text-4xl font-bold text-himka-accent mb-1">5+</span>
              <span class="text-himka-secondary/60 text-sm uppercase tracking-wide">Tahun Berdiri</span>
            </div>
            <div>
              <span class="block text-4xl font-bold text-himka-accent mb-1">20+</span>
              <span class="text-himka-secondary/60 text-sm uppercase tracking-wide">Program Kerja</span>
            </div>
            <div>
              <span class="block text-4xl font-bold text-himka-accent mb-1">100+</span>
              <span class="text-himka-secondary/60 text-sm uppercase tracking-wide">Anggota Aktif</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- VISION MISI START -->
  <section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-serif font-bold text-himka-secondary mb-4">Visi & Misi</h2>
        <div class="w-24 h-1 bg-himka-accent mx-auto rounded-full"></div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Visi Cards (Actually the list items from original HTML) -->
        <div
          class="bg-himka-cream p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-himka-secondary/5 group">
          <div
            class="w-14 h-14 bg-white rounded-full flex items-center justify-center mb-6 group-hover:bg-himka-accent transition-colors duration-300 shadow-sm">
            <span class="material-icons text-himka-accent group-hover:text-white text-2xl">school</span>
          </div>
          <h3 class="font-bold text-lg mb-3 text-himka-secondary">Pendidikan Tinggi</h3>
          <p class="text-himka-secondary/70 text-sm leading-relaxed">Menjadikan program studi kimia sebagai pusat
            kecemerlangan
            pendidikan tinggi, riset, dan tamadun maritim di ASEAN.</p>
        </div>

        <div
          class="bg-himka-cream p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-himka-secondary/5 group">
          <div
            class="w-14 h-14 bg-white rounded-full flex items-center justify-center mb-6 group-hover:bg-himka-accent transition-colors duration-300 shadow-sm">
            <span class="material-icons text-himka-accent group-hover:text-white text-2xl">public</span>
          </div>
          <h3 class="font-bold text-lg mb-3 text-himka-secondary">Wawasan Nasional</h3>
          <p class="text-himka-secondary/70 text-sm leading-relaxed">Menyelenggarakan pendidikan dan pengajaran bidang kimia
            berwawasan kemaritiman di tingkat Nasional dan Regional.</p>
        </div>

        <div
          class="bg-himka-cream p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-himka-secondary/5 group">
          <div
            class="w-14 h-14 bg-white rounded-full flex items-center justify-center mb-6 group-hover:bg-himka-accent transition-colors duration-300 shadow-sm">
            <span class="material-icons text-himka-accent group-hover:text-white text-2xl">handshake</span>
          </div>
          <h3 class="font-bold text-lg mb-3 text-himka-secondary">Kolaborasi</h3>
          <p class="text-himka-secondary/70 text-sm leading-relaxed">Penerapan kimia berwawasan kemaritiman dalam bentuk
            pengabdian
            kepada masyarakat melalui kolaborasi dengan stakeholder.</p>
        </div>

        <div
          class="bg-himka-cream p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-himka-secondary/5 group">
          <div
            class="w-14 h-14 bg-white rounded-full flex items-center justify-center mb-6 group-hover:bg-himka-accent transition-colors duration-300 shadow-sm">
            <span class="material-icons text-himka-accent group-hover:text-white text-2xl">storefront</span>
          </div>
          <h3 class="font-bold text-lg mb-3 text-himka-secondary">Entrepreneurship</h3>
          <p class="text-himka-secondary/70 text-sm leading-relaxed">Aktivitas entrepreneurship di bidang kimia untuk
            kesejahteraan
            sosial masyarakat pesisir.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- DIVISION SECTION -->
  <section class="py-24 bg-himka-secondary text-white relative overflow-hidden">
    <div
      class="absolute inset-0 bg-[radial-gradient(#ffffff33_1px,transparent_1px)] [background-size:16px_16px] opacity-20">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-serif font-bold text-white mb-4">Divisi & Tupoksi</h2>
        <p class="text-himka-cream/90 max-w-2xl mx-auto">Struktur organisasi yang solid untuk menjalankan roda
          kepengurusan
          HIMKA UMRAH.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
          $divisions = [
            ['title' => 'Sekretaris', 'icon' => 'edit_note', 'desc' => 'Mengelola administrasi organisasi, surat menyurat, dan dokumentasi arsip.'],
            ['title' => 'Bendahara', 'icon' => 'account_balance_wallet', 'desc' => 'Mengatur keuangan organisasi secara transparan dan akuntabel.'],
            ['title' => 'Kaderisasi', 'icon' => 'groups', 'desc' => 'Merancang dan melaksanakan proses pembentukan kader yang berkualitas.'],
            ['title' => 'PSDM', 'icon' => 'psychology', 'desc' => 'Mengembangkan potensi dan keterampilan soft skill anggota.'],
            ['title' => 'Kominfo', 'icon' => 'share', 'desc' => 'Mengelola media informasi dan membangun citra positif organisasi.'],
            ['title' => 'Kewirausahaan', 'icon' => 'store', 'desc' => 'Mengembangkan kreativitas dan kemandirian finansial organisasi.'],
          ];
        @endphp

        @foreach($divisions as $div)
          <div
            class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-2xl hover:bg-white/10 transition-all duration-300 group">
            <div class="flex items-center gap-4 mb-4">
              <span
                class="material-icons text-himka-accent text-3xl group-hover:scale-110 transition-transform">{{ $div['icon'] }}</span>
              <h3 class="text-xl font-bold">{{ $div['title'] }}</h3>
            </div>
            <p class="text-white/70 text-sm leading-relaxed">{{ $div['desc'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- GALLERY CAROUSEL SECTION -->
  <section class="py-24 bg-himka-cream" id="galery">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row justify-between items-end mb-12">
        <div>
          <h3 class="text-himka-accent font-bold tracking-widest text-sm mb-2 uppercase">Dokumentasi</h3>
          <h2 class="text-4xl font-serif font-bold text-himka-secondary">Galeri Kegiatan</h2>
        </div>
        <div class="flex items-center gap-4">
          <button id="prevGallery" class="w-10 h-10 rounded-full bg-himka-secondary text-white flex items-center justify-center hover:bg-himka-secondary-dark transition-colors">
            <span class="material-icons">chevron_left</span>
          </button>
          <button id="nextGallery" class="w-10 h-10 rounded-full bg-himka-secondary text-white flex items-center justify-center hover:bg-himka-secondary-dark transition-colors">
            <span class="material-icons">chevron_right</span>
          </button>
        </div>
      </div>

      <!-- Carousel Container -->
      <div class="relative overflow-hidden rounded-2xl">
        <div id="galleryCarousel" class="flex transition-transform duration-500 ease-in-out">
          @php
            $galleries = [
              ['img' => 'galeri1.jpg', 'title' => 'Prestasi Mahasiswa'],
              ['img' => 'galeri2.jpg', 'title' => 'Sosialisasi'],
              ['img' => 'galeri3.jpg', 'title' => 'Kegiatan Laboratorium'],
              ['img' => 'galeri4.jpg', 'title' => 'Seminar Nasional'],
              ['img' => 'galeri6.jpg', 'title' => 'Olahraga Bersama'],
            ];
          @endphp

          @foreach($galleries as $gallery)
            <div class="min-w-full relative group">
              <img src="{{ asset('assets/img/' . $gallery['img']) }}"
                class="w-full h-[500px] object-cover" alt="{{ $gallery['title'] }}">
              <div class="absolute inset-0 bg-linear-to-t from-himka-secondary/90 via-transparent to-transparent flex items-end p-8">
                <div>
                  <h3 class="text-white font-bold text-2xl mb-2">{{ $gallery['title'] }}</h3>
                  <p class="text-white/80 text-sm">HIMKA UMRAH</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <!-- Indicators -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2">
          @foreach($galleries as $index => $gallery)
            <button class="gallery-indicator w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors" data-index="{{ $index }}"></button>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <!-- NEWS SECTION -->
  <section class="py-24 bg-white" id="berita">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row justify-between items-end mb-12">
        <div>
          <h3 class="text-himka-accent font-bold tracking-widest text-sm mb-2 uppercase">Informasi Terkini</h3>
          <h2 class="text-4xl font-serif font-bold text-himka-secondary">Berita & Artikel</h2>
        </div>
        <a href="#"
          class="hidden md:flex items-center gap-2 text-himka-accent font-bold hover:text-himka-secondary transition-colors">
          Lihat Semua <span class="material-icons text-sm">arrow_forward</span>
        </a>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Featured News (Large) -->
        <div class="md:col-span-2 md:row-span-2 relative group overflow-hidden rounded-2xl shadow-lg">
          <img src="{{ asset('assets/img/galeri1.jpg') }}"
            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Featured News">
          <div class="absolute inset-0 bg-linear-to-t from-himka-secondary/95 via-himka-secondary/50 to-transparent flex items-end p-8">
            <div>
              <span class="inline-block px-3 py-1 bg-himka-accent text-white text-xs font-bold rounded-full mb-3">FEATURED</span>
              <h3 class="text-white font-bold text-3xl mb-3 leading-tight">Mahasiswa Kimia UMRAH Raih Juara 1 Kompetisi Nasional</h3>
              <p class="text-white/90 mb-4 line-clamp-2">Tim mahasiswa HIMKA berhasil meraih prestasi gemilang dalam kompetisi kimia tingkat nasional yang diselenggarakan di Jakarta.</p>
              <div class="flex items-center gap-4 text-white/80 text-sm">
                <span class="flex items-center gap-1">
                  <span class="material-icons text-sm">calendar_today</span>
                  10 Des 2024
                </span>
                <span class="flex items-center gap-1">
                  <span class="material-icons text-sm">person</span>
                  Admin HIMKA
                </span>
              </div>
            </div>
          </div>
        </div>

        <!-- Regular News Items -->
        <div class="relative group overflow-hidden rounded-2xl shadow-lg">
          <img src="{{ asset('assets/img/galeri2.jpg') }}"
            class="w-full h-[250px] object-cover transition-transform duration-700 group-hover:scale-110" alt="News 1">
          <div class="absolute inset-0 bg-linear-to-t from-himka-secondary/90 via-transparent to-transparent flex items-end p-6">
            <div>
              <h4 class="text-white font-bold text-lg mb-2 line-clamp-2">Sosialisasi Program Kerja HIMKA 2024</h4>
              <span class="text-white/80 text-xs flex items-center gap-1">
                <span class="material-icons text-xs">calendar_today</span>
                8 Des 2024
              </span>
            </div>
          </div>
        </div>

        <div class="relative group overflow-hidden rounded-2xl shadow-lg">
          <img src="{{ asset('assets/img/galeri3.jpg') }}"
            class="w-full h-[250px] object-cover transition-transform duration-700 group-hover:scale-110" alt="News 2">
          <div class="absolute inset-0 bg-linear-to-t from-himka-secondary/90 via-transparent to-transparent flex items-end p-6">
            <div>
              <h4 class="text-white font-bold text-lg mb-2 line-clamp-2">Workshop Analisis Kimia Instrumen</h4>
              <span class="text-white/80 text-xs flex items-center gap-1">
                <span class="material-icons text-xs">calendar_today</span>
                5 Des 2024
              </span>
            </div>
          </div>
        </div>

        <div class="relative group overflow-hidden rounded-2xl shadow-lg">
          <img src="{{ asset('assets/img/galeri4.jpg') }}"
            class="w-full h-[250px] object-cover transition-transform duration-700 group-hover:scale-110" alt="News 3">
          <div class="absolute inset-0 bg-linear-to-t from-himka-secondary/90 via-transparent to-transparent flex items-end p-6">
            <div>
              <h4 class="text-white font-bold text-lg mb-2 line-clamp-2">Seminar Nasional Kimia Maritim</h4>
              <span class="text-white/80 text-xs flex items-center gap-1">
                <span class="material-icons text-xs">calendar_today</span>
                3 Des 2024
              </span>
            </div>
          </div>
        </div>

        <div class="relative group overflow-hidden rounded-2xl shadow-lg">
          <img src="{{ asset('assets/img/galeri6.jpg') }}"
            class="w-full h-[250px] object-cover transition-transform duration-700 group-hover:scale-110" alt="News 4">
          <div class="absolute inset-0 bg-linear-to-t from-himka-secondary/90 via-transparent to-transparent flex items-end p-6">
            <div>
              <h4 class="text-white font-bold text-lg mb-2 line-clamp-2">Kegiatan Olahraga Bersama HIMKA</h4>
              <span class="text-white/80 text-xs flex items-center gap-1">
                <span class="material-icons text-xs">calendar_today</span>
                1 Des 2024
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACT SECTION -->
  <section class="py-24 bg-white border-t border-himka-cream" id="kontak">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-himka-secondary rounded-3xl p-1 md:p-12 overflow-hidden relative shadow-2xl">
        <div
          class="absolute top-0 right-0 w-64 h-64 bg-himka-accent/20 rounded-full blur-3xl translate-x-1/3 -translate-y-1/3">
        </div>

        <div class="relative z-10 grid md:grid-cols-2 gap-12 p-8 md:p-0">
          <div>
            <h2 class="text-3xl font-serif font-bold text-white mb-6">Hubungi Kami</h2>
            <p class="text-white/80 mb-8 leading-relaxed">
              Jangan ragu untuk berbagi ide, keluhan, maupun aspirasi. Mari bersama membangun HIMKA UMRAH yang lebih baik.
            </p>

            <div class="space-y-4">
              <div class="flex items-center gap-4 text-white/90">
                <span class="material-icons text-himka-accent">email</span>
                <span>himkafttkumrah@gmail.com</span>
              </div>
              <div class="flex items-center gap-4 text-white/90">
                <span class="material-icons text-himka-accent">location_on</span>
                <span>Universitas Maritim Raja Ali Haji</span>
              </div>
            </div>
          </div>

          <form class="space-y-4">
            <div>
              <input type="text" placeholder="Nama Lengkap"
                class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:outline-none focus:border-himka-accent transition-colors">
            </div>
            <div>
              <input type="email" placeholder="Alamat Email"
                class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:outline-none focus:border-himka-accent transition-colors">
            </div>
            <div>
              <textarea placeholder="Pesan Anda..." rows="4"
                class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:outline-none focus:border-himka-accent transition-colors"></textarea>
            </div>
            <button type="submit"
              class="w-full bg-himka-accent text-white font-bold py-3 rounded-lg hover:bg-himka-accent-dark transition-colors">
              Kirim Pesan
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
<script>
  // Gallery Carousel
  const galleryCarousel = document.getElementById('galleryCarousel');
  const prevBtn = document.getElementById('prevGallery');
  const nextBtn = document.getElementById('nextGallery');
  const indicators = document.querySelectorAll('.gallery-indicator');
  let currentIndex = 0;
  const totalSlides = {{ count($galleries) }};

  function updateCarousel() {
    galleryCarousel.style.transform = `translateX(-${currentIndex * 100}%)`;
    indicators.forEach((indicator, index) => {
      if (index === currentIndex) {
        indicator.classList.remove('bg-white/50');
        indicator.classList.add('bg-white');
      } else {
        indicator.classList.remove('bg-white');
        indicator.classList.add('bg-white/50');
      }
    });
  }

  prevBtn.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateCarousel();
  });

  nextBtn.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateCarousel();
  });

  indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
      currentIndex = index;
      updateCarousel();
    });
  });

  // Auto-play carousel
  setInterval(() => {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateCarousel();
  }, 5000);
</script>
@endpush