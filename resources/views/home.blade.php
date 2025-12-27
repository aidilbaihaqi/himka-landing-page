@extends('layouts.app')

@php
  $heroContent = \App\Models\LandingPageContent::getHero();
  $profilContent = \App\Models\LandingPageContent::getProfil();
  $ketuaUmumContent = \App\Models\LandingPageContent::getKetuaUmum();
@endphp

@section('content')
  <!-- HERO SECTION -->
  <section class="relative h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-himka-cream via-white to-himka-cream" id="home">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
      <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=1920&q=80" 
        alt="Chemistry Background" 
        class="w-full h-full object-cover opacity-20">
      <div class="absolute inset-0 bg-gradient-to-br from-himka-cream/80 via-white/70 to-himka-cream/80"></div>
    </div>
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 z-0">
      <!-- Subtle Pattern Overlay -->
      <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#000_1px,transparent_1px)] bg-size-[32px_32px]"></div>
      <!-- Animated Accent Circles -->
      <div class="absolute top-0 left-0 w-96 h-96 bg-himka-secondary/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 animate-pulse-glow"></div>
      <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-himka-accent/10 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 animate-pulse-glow"></div>
      <!-- Floating Decorative Elements -->
      <div class="absolute top-1/4 right-1/4 w-4 h-4 bg-himka-secondary/20 rounded-full animate-float"></div>
      <div class="absolute top-1/3 left-1/4 w-3 h-3 bg-himka-accent/20 rounded-full animate-float-delayed"></div>
      <div class="absolute bottom-1/3 right-1/3 w-2 h-2 bg-himka-secondary/20 rounded-full animate-float"></div>
    </div>

    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto">
      <div data-aos="fade-down" data-aos-delay="100" class="inline-block mb-6">
        <h2 class="bg-himka-accent text-white font-bold tracking-[0.3em] md:tracking-[0.5em] text-sm md:text-base px-2 md:px-3 py-1 md:py-2 uppercase">
          HIMPUNAN MAHASISWA KIMIA
        </h2>
      </div>
      <h1 data-aos="fade-up" data-aos-delay="200" class="text-5xl md:text-7xl lg:text-8xl font-serif font-bold text-gray-900 mb-6 leading-tight">
        KABINET <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-himka-secondary to-himka-accent">CAKRAWALA</span>
      </h1>
      <p data-aos="fade-up" data-aos-delay="300" class="text-gray-700 text-lg md:text-xl font-light tracking-wide mb-10 max-w-2xl mx-auto">
        "{{ $heroContent['slogan'] }}"
      </p>

      <div data-aos="fade-up" data-aos-delay="400" class="flex flex-col md:flex-row gap-4 justify-center">
        <a href="#profil"
          class="group px-8 py-4 bg-himka-accent text-white font-bold rounded-full hover:bg-himka-accent-dark transition-all duration-300 shadow-lg hover:shadow-himka-accent/25 transform hover:-translate-y-1 flex items-center justify-center gap-2">
          Tentang Kami
          <span class="material-icons text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </a>
        <a href="#galery"
          class="px-8 py-4 border-2 border-himka-secondary text-himka-secondary font-bold rounded-full hover:bg-himka-secondary hover:text-white transition-all duration-300">
          Lihat Galeri
        </a>
      </div>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
      <a href="#profil" class="text-gray-400 hover:text-himka-secondary transition-colors flex flex-col items-center gap-1">
        <span class="text-xs uppercase tracking-widest">Scroll</span>
        <span class="material-icons text-3xl">expand_more</span>
      </a>
    </div>
  </section>

  <!-- ABOUT SECTION -->
  <section class="py-24 bg-white" id="profil">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="relative" data-aos="fade-right">
          <div class="absolute -top-4 -left-4 w-24 h-24 border-t-4 border-l-4 border-himka-secondary transition-all duration-500 hover:w-32 hover:h-32"></div>
          <div class="absolute -bottom-4 -right-4 w-24 h-24 border-b-4 border-r-4 border-himka-secondary transition-all duration-500 hover:w-32 hover:h-32"></div>
          <div class="img-hover-zoom rounded-lg shadow-2xl overflow-hidden">
            @if($profilContent['image'])
              <img src="{{ Storage::url($profilContent['image']) }}" alt="About"
                class="w-full h-[500px] object-cover grayscale hover:grayscale-0 transition-all duration-700">
            @else
              <img src="{{ asset('assets/img/kegiatan2.jpg') }}" alt="About"
                class="w-full h-[500px] object-cover grayscale hover:grayscale-0 transition-all duration-700">
            @endif
          </div>
        </div>

        <div data-aos="fade-left">
          <h3 class="text-himka-secondary font-bold tracking-widest text-sm mb-2 uppercase">Profil Organisasi</h3>
          <h2 class="text-4xl md:text-5xl font-serif font-bold text-gray-900 mb-8">{{ $profilContent['title'] }}</h2>
          <p class="text-gray-700 leading-relaxed mb-6 text-lg">
            {{ $profilContent['description'] }}
          </p>
          @if(!empty($profilContent['description_2']))
          <p class="text-gray-600 leading-relaxed mb-8">
            {{ $profilContent['description_2'] }}
          </p>
          @endif

          <div class="counter-section flex gap-8 border-t border-gray-200 pt-8">
            <div class="text-center">
              <span class="block text-4xl font-bold text-himka-secondary mb-1" data-counter="{{ $profilContent['years_established'] }}">0+</span>
              <span class="text-gray-600 text-sm uppercase tracking-wide">Tahun Berdiri</span>
            </div>
            <div class="text-center">
              <span class="block text-4xl font-bold text-himka-secondary mb-1" data-counter="{{ $profilContent['total_programs'] }}">0+</span>
              <span class="text-gray-600 text-sm uppercase tracking-wide">Program Kerja</span>
            </div>
            <div class="text-center">
              <span class="block text-4xl font-bold text-himka-secondary mb-1" data-counter="{{ $profilContent['active_members'] }}">0+</span>
              <span class="text-gray-600 text-sm uppercase tracking-wide">Anggota Aktif</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- VISION MISI START -->
  <section class="py-24 bg-himka-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16" data-aos="fade-up">
        <h2 class="text-4xl font-serif font-bold text-gray-900 mb-4">Visi & Misi</h2>
        <div class="w-24 h-1 bg-himka-secondary mx-auto rounded-full"></div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @php
          $visiMisi = [
            ['icon' => 'school', 'title' => 'Pendidikan Tinggi', 'desc' => 'Menjadikan program studi kimia sebagai pusat kecemerlangan pendidikan tinggi, riset, dan tamadun maritim di ASEAN.'],
            ['icon' => 'public', 'title' => 'Wawasan Nasional', 'desc' => 'Menyelenggarakan pendidikan dan pengajaran bidang kimia berwawasan kemaritiman di tingkat Nasional dan Regional.'],
            ['icon' => 'handshake', 'title' => 'Kolaborasi', 'desc' => 'Penerapan kimia berwawasan kemaritiman dalam bentuk pengabdian kepada masyarakat melalui kolaborasi dengan stakeholder.'],
            ['icon' => 'storefront', 'title' => 'Entrepreneurship', 'desc' => 'Aktivitas entrepreneurship di bidang kimia untuk kesejahteraan sosial masyarakat pesisir.'],
          ];
        @endphp

        @foreach($visiMisi as $index => $item)
          <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}"
            class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group hover:-translate-y-2">
            <div
              class="w-14 h-14 bg-himka-cream rounded-full flex items-center justify-center mb-6 group-hover:bg-himka-secondary transition-colors duration-300 shadow-sm group-hover:scale-110">
              <span class="material-icons text-himka-secondary group-hover:text-white text-2xl transition-colors">{{ $item['icon'] }}</span>
            </div>
            <h3 class="font-bold text-lg mb-3 text-gray-900">{{ $item['title'] }}</h3>
            <p class="text-gray-600 text-sm leading-relaxed">{{ $item['desc'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- KETUA UMUM SECTION -->
  <section class="py-24 bg-white" id="ketua-umum">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16" data-aos="fade-up">
        <h3 class="text-himka-secondary font-bold tracking-widest text-sm mb-2 uppercase">Sambutan</h3>
        <h2 class="text-4xl font-serif font-bold text-gray-900 mb-4">Ketua Umum HIMKA</h2>
        <div class="w-24 h-1 bg-himka-secondary mx-auto rounded-full"></div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Photo -->
        <div class="relative" data-aos="fade-right">
          <div class="absolute -top-4 -left-4 w-24 h-24 border-t-4 border-l-4 border-himka-secondary transition-all duration-500 hover:w-32 hover:h-32"></div>
          <div class="absolute -bottom-4 -right-4 w-24 h-24 border-b-4 border-r-4 border-himka-secondary transition-all duration-500 hover:w-32 hover:h-32"></div>
          <div class="relative rounded-2xl overflow-hidden shadow-2xl">
            @if($ketuaUmumContent['image'])
              <img src="{{ Storage::url($ketuaUmumContent['image']) }}" 
                alt="{{ $ketuaUmumContent['name'] }}" 
                class="w-full h-[500px] object-cover object-top">
            @else
              <img src="{{ asset('images/ketuaumum.jpg') }}" 
                alt="{{ $ketuaUmumContent['name'] }}" 
                class="w-full h-[500px] object-cover object-top">
            @endif
            <div class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-himka-secondary/90 to-transparent p-6">
              <h3 class="text-white font-bold text-xl">{{ $ketuaUmumContent['name'] }}</h3>
              <p class="text-white/80 text-sm">{{ $ketuaUmumContent['position'] }}</p>
            </div>
          </div>
        </div>

        <!-- Quote -->
        <div data-aos="fade-left">
          <div class="relative">
            <span class="material-icons text-himka-secondary/20 text-[120px] absolute -top-8 -left-4">format_quote</span>
            <div class="relative z-10 pl-8">
              <p class="text-gray-700 text-lg md:text-xl leading-relaxed italic mb-8">
                "{{ $ketuaUmumContent['quote'] }}"
              </p>
              <div class="flex items-center gap-4">
                <div class="w-16 h-1 bg-himka-secondary rounded-full"></div>
                <div>
                  <h4 class="font-bold text-gray-900">{{ $ketuaUmumContent['name'] }}</h4>
                  <p class="text-gray-600 text-sm">{{ $ketuaUmumContent['position'] }}</p>
                </div>
              </div>
            </div>
          </div>

          <div class="mt-10 grid grid-cols-2 gap-4">
            <div class="bg-himka-cream p-6 rounded-xl">
              <span class="material-icons text-himka-secondary text-3xl mb-2">emoji_events</span>
              <h5 class="font-bold text-gray-900 mb-1">Visi</h5>
              <p class="text-gray-600 text-sm">{{ $ketuaUmumContent['visi'] }}</p>
            </div>
            <div class="bg-himka-cream p-6 rounded-xl">
              <span class="material-icons text-himka-secondary text-3xl mb-2">groups</span>
              <h5 class="font-bold text-gray-900 mb-1">Misi</h5>
              <p class="text-gray-600 text-sm">{{ $ketuaUmumContent['misi'] }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- DIVISION SECTION -->
  <section class="py-24 bg-gradient-to-br from-himka-cream via-white to-himka-cream relative overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
      <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=1920&q=80" 
        alt="Chemistry Background" 
        class="w-full h-full object-cover opacity-[0.08]">
      <div class="absolute inset-0 bg-gradient-to-br from-himka-cream/95 via-white/90 to-himka-cream/95"></div>
    </div>
    
    <div class="absolute inset-0 bg-[radial-gradient(#00000011_1px,transparent_1px)] bg-size-[16px_16px] opacity-30"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="text-center mb-16" data-aos="fade-up">
        <h2 class="text-4xl font-serif font-bold text-gray-900 mb-4">Divisi & Tupoksi</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Struktur organisasi yang solid untuk menjalankan roda kepengurusan HIMKA UMRAH.</p>
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

        @foreach($divisions as $index => $div)
          <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}"
            class="bg-white border border-gray-100 p-6 rounded-2xl hover:shadow-xl transition-all duration-300 group hover:-translate-y-1 hover:border-himka-secondary/30">
            <div class="flex items-center gap-4 mb-4">
              <div class="w-12 h-12 rounded-xl bg-himka-secondary/10 flex items-center justify-center group-hover:bg-himka-secondary transition-colors duration-300">
                <span class="material-icons text-himka-secondary group-hover:text-white text-2xl group-hover:scale-110 transition-all">{{ $div['icon'] }}</span>
              </div>
              <h3 class="text-xl font-bold text-gray-900">{{ $div['title'] }}</h3>
            </div>
            <p class="text-gray-600 text-sm leading-relaxed">{{ $div['desc'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- GALLERY CAROUSEL SECTION -->
  <section class="py-24 bg-white" id="galery">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row justify-between items-center md:items-end mb-12 text-center md:text-left" data-aos="fade-up">
        <div class="mb-4 md:mb-0">
          <h3 class="text-himka-secondary font-bold tracking-widest text-sm mb-2 uppercase">Dokumentasi</h3>
          <h2 class="text-4xl font-serif font-bold text-gray-900">Galeri Kegiatan</h2>
        </div>
        <div class="flex items-center gap-4">
          <button id="prevGallery" class="w-12 h-12 rounded-full bg-himka-secondary text-white flex items-center justify-center hover:bg-himka-accent transition-all duration-300 hover:scale-110 shadow-lg">
            <span class="material-icons">chevron_left</span>
          </button>
          <button id="nextGallery" class="w-12 h-12 rounded-full bg-himka-secondary text-white flex items-center justify-center hover:bg-himka-accent transition-all duration-300 hover:scale-110 shadow-lg">
            <span class="material-icons">chevron_right</span>
          </button>
        </div>
      </div>

      <!-- Carousel Container -->
      <div class="relative overflow-hidden rounded-2xl">
        <div id="galleryCarousel" class="flex transition-transform duration-500 ease-in-out">
          @php
            $defaultGalleries = [
              ['img' => 'galeri1.jpg', 'title' => 'Prestasi Mahasiswa'],
              ['img' => 'galeri2.jpg', 'title' => 'Sosialisasi'],
              ['img' => 'galeri3.jpg', 'title' => 'Kegiatan Laboratorium'],
              ['img' => 'galeri4.jpg', 'title' => 'Seminar Nasional'],
              ['img' => 'galeri6.jpg', 'title' => 'Olahraga Bersama'],
            ];
            $galleryItems = isset($galleries) && $galleries->count() > 0 ? $galleries : collect($defaultGalleries);
          @endphp

          @foreach($galleryItems as $index => $gallery)
            <div class="min-w-full relative group">
              @if(is_array($gallery))
                <img src="{{ asset('assets/img/' . $gallery['img']) }}"
                  class="w-full h-[500px] object-cover" alt="{{ $gallery['title'] }}">
              @else
                <img src="{{ Storage::url($gallery->image) }}"
                  class="w-full h-[500px] object-cover" alt="{{ $gallery->title }}">
              @endif
              <div class="absolute inset-0 bg-linear-to-t from-himka-secondary/90 via-transparent to-transparent flex items-end p-8">
                <div>
                  <h3 class="text-white font-bold text-2xl mb-2">{{ is_array($gallery) ? $gallery['title'] : $gallery->title }}</h3>
                  <p class="text-white/80 text-sm">{{ is_array($gallery) ? 'HIMKA UMRAH' : ($gallery->description ?? 'HIMKA UMRAH') }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <!-- Indicators -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2">
          @foreach($galleryItems as $index => $gallery)
            <button class="gallery-indicator w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-colors" data-index="{{ $index }}"></button>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <!-- NEWS SECTION -->
  <section class="py-24 bg-himka-cream" id="berita">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row justify-between items-center md:items-end mb-12 text-center md:text-left" data-aos="fade-up">
        <div class="mb-4 md:mb-0">
          <h3 class="text-himka-secondary font-bold tracking-widest text-sm mb-2 uppercase">Informasi Terkini</h3>
          <h2 class="text-4xl font-serif font-bold text-gray-900">Berita & Artikel</h2>
        </div>
        <a href="{{ route('articles.index') }}"
          class="group hidden md:flex items-center gap-2 text-himka-secondary font-bold hover:text-himka-accent transition-colors">
          Lihat Semua <span class="material-icons text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </a>
      </div>

      <!-- Category Filter -->
      @if(isset($categories) && $categories->count() > 0)
        <div class="flex items-center gap-2 mb-8 overflow-x-auto pb-2">
          <a href="{{ route('home') }}#berita" class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap bg-himka-secondary text-white">
            Semua
          </a>
          @foreach($categories as $category)
            <a href="{{ route('articles.index', ['category' => $category->slug]) }}"
              class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap bg-white text-gray-700 hover:bg-himka-secondary hover:text-white transition-colors">
              {{ $category->name }}
            </a>
          @endforeach
        </div>
      @endif

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @if(isset($articles) && $articles->count() > 0)
          @php
            $displayArticles = $articles->take(6);
          @endphp
          @foreach($displayArticles as $index => $article)
            <a href="{{ route('articles.show', $article) }}" class="relative group overflow-hidden rounded-2xl shadow-lg block bg-white flex flex-col h-full" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
              <div class="aspect-[4/3] overflow-hidden flex-shrink-0">
                @if($article->image)
                  <img src="{{ Storage::url($article->image) }}"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="{{ $article->title }}">
                @else
                  <div class="w-full h-full bg-himka-secondary/10 flex items-center justify-center">
                    <span class="material-icons text-5xl text-himka-secondary/30">article</span>
                  </div>
                @endif
              </div>
              <div class="p-5 flex flex-col flex-grow">
                @if($index === 0)
                  <span class="inline-block px-2.5 py-1 bg-himka-accent text-white text-[10px] font-bold rounded-full mb-2 w-fit">FEATURED</span>
                @endif
                <h4 class="text-gray-900 font-bold text-base mb-2 line-clamp-2 group-hover:text-himka-secondary transition-colors">{{ $article->title }}</h4>
                <div class="mt-auto">
                  <span class="text-gray-500 text-xs flex items-center gap-1">
                    <span class="material-icons text-xs">calendar_today</span>
                    {{ $article->published_at?->format('d M Y') ?? $article->created_at->format('d M Y') }}
                  </span>
                </div>
              </div>
            </a>
          @endforeach
        @else
          <!-- Default static content when no articles -->
          @php
            $defaultNews = [
              ['img' => 'galeri1.jpg', 'title' => 'Mahasiswa Kimia UMRAH Raih Juara 1', 'date' => '10 Des 2024'],
              ['img' => 'galeri2.jpg', 'title' => 'Sosialisasi Program Kerja HIMKA 2024', 'date' => '8 Des 2024'],
              ['img' => 'galeri3.jpg', 'title' => 'Workshop Analisis Kimia Instrumen', 'date' => '5 Des 2024'],
              ['img' => 'galeri4.jpg', 'title' => 'Seminar Nasional Kimia Maritim', 'date' => '3 Des 2024'],
            ];
          @endphp
          @foreach($defaultNews as $index => $news)
            <div class="relative group overflow-hidden rounded-2xl shadow-lg bg-white flex flex-col h-full" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
              <div class="aspect-[4/3] overflow-hidden flex-shrink-0">
                <img src="{{ asset('assets/img/' . $news['img']) }}"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="{{ $news['title'] }}">
              </div>
              <div class="p-5 flex flex-col flex-grow">
                <h4 class="text-gray-900 font-bold text-base mb-2 line-clamp-2 group-hover:text-himka-secondary transition-colors">{{ $news['title'] }}</h4>
                <div class="mt-auto">
                  <span class="text-gray-500 text-xs flex items-center gap-1">
                    <span class="material-icons text-xs">calendar_today</span>
                    {{ $news['date'] }}
                  </span>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </section>

  <!-- CONTACT SECTION -->
  <section class="py-24 bg-white border-t border-gray-200" id="kontak">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-gradient-to-br from-himka-cream via-white to-himka-cream rounded-3xl p-1 md:p-12 overflow-hidden relative shadow-2xl border border-gray-200" data-aos="fade-up">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0 rounded-3xl overflow-hidden">
          <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=1920&q=80" 
            alt="Chemistry Background" 
            class="w-full h-full object-cover opacity-[0.08]">
          <div class="absolute inset-0 bg-gradient-to-br from-himka-cream/95 via-white/90 to-himka-cream/95"></div>
        </div>
        
        <div class="absolute top-0 right-0 w-64 h-64 bg-himka-secondary/10 rounded-full blur-3xl translate-x-1/3 -translate-y-1/3 animate-pulse-glow"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-himka-accent/10 rounded-full blur-3xl -translate-x-1/3 translate-y-1/3 animate-pulse-glow"></div>

        <div class="relative z-10 grid md:grid-cols-2 gap-12 p-8 md:p-0">
          <div data-aos="fade-right" data-aos-delay="200">
            <h2 class="text-3xl font-serif font-bold text-gray-900 mb-6">Hubungi Kami</h2>
            <p class="text-gray-600 mb-8 leading-relaxed">
              Jangan ragu untuk berbagi ide, keluhan, maupun aspirasi. Mari bersama membangun HIMKA UMRAH yang lebih baik.
            </p>

            <div class="space-y-4">
              <a href="mailto:himkafttkumrah@gmail.com" class="flex items-center gap-4 text-gray-700 hover:text-himka-secondary transition-colors group">
                <span class="w-10 h-10 rounded-full bg-himka-secondary/10 flex items-center justify-center group-hover:bg-himka-secondary transition-colors">
                  <span class="material-icons text-himka-secondary group-hover:text-white">email</span>
                </span>
                <span>himkafttkumrah@gmail.com</span>
              </a>
              <a href="https://instagram.com/himka.umrah" target="_blank" class="flex items-center gap-4 text-gray-700 hover:text-himka-secondary transition-colors group">
                <span class="w-10 h-10 rounded-full bg-himka-secondary/10 flex items-center justify-center group-hover:bg-himka-secondary transition-colors">
                  <span class="material-icons text-himka-secondary group-hover:text-white">photo_camera</span>
                </span>
                <span>@himka.umrah</span>
              </a>
              <div class="flex items-center gap-4 text-gray-700">
                <span class="w-10 h-10 rounded-full bg-himka-secondary/10 flex items-center justify-center">
                  <span class="material-icons text-himka-secondary">location_on</span>
                </span>
                <span>Universitas Maritim Raja Ali Haji</span>
              </div>
            </div>
          </div>

          <form class="space-y-4" data-aos="fade-left" data-aos-delay="300">
            <div>
              <input type="text" placeholder="Nama Lengkap"
                class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:border-himka-secondary focus:ring-2 focus:ring-himka-secondary/20 transition-all duration-300">
            </div>
            <div>
              <input type="email" placeholder="Alamat Email"
                class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:border-himka-secondary focus:ring-2 focus:ring-himka-secondary/20 transition-all duration-300">
            </div>
            <div>
              <textarea placeholder="Pesan Anda..." rows="4"
                class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:border-himka-secondary focus:ring-2 focus:ring-himka-secondary/20 transition-all duration-300 resize-none"></textarea>
            </div>
            <button type="submit"
              class="w-full bg-himka-accent text-white font-bold py-4 rounded-xl hover:bg-himka-accent-dark transition-all duration-300 hover:shadow-lg hover:shadow-himka-accent/25 flex items-center justify-center gap-2 group">
              <span>Kirim Pesan</span>
              <span class="material-icons text-sm group-hover:translate-x-1 transition-transform">send</span>
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
  const totalSlides = indicators.length;

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