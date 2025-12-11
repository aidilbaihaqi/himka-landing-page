@extends('layouts.app')

@section('content')
  <!-- HERO SECTION -->
  <section class="relative h-screen flex items-center justify-center overflow-hidden parallax" id="home">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
      <div class="absolute inset-0 bg-cover bg-center bg-no-repeat transform scale-105"
        style="background-image: url('https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=2070'); filter: brightness(0.8);">
      </div>
      <!-- Complex Gradient Overlay -->
      <div
        class="absolute inset-0 bg-gradient-to-br from-himka-secondary-dark/95 via-himka-secondary/80 to-himka-secondary-dark/90 mix-blend-multiply">
      </div>

      <!-- Decor Balls -->
      <div class="absolute top-[10%] left-[15%] w-72 h-72 bg-himka-accent/20 rounded-full blur-[100px] animate-pulse">
      </div>
      <div class="absolute bottom-[20%] right-[10%] w-96 h-96 bg-blue-500/20 rounded-full blur-[120px] animate-pulse">
      </div>
    </div>

    <!-- Floating Molecules (Decorative) -->
    <div class="absolute inset-0 pointer-events-none z-0 overflow-hidden">
      <span class="material-icons absolute top-1/4 left-[10%] text-white/10 text-6xl animate-float">bubble_chart</span>
      <span
        class="material-icons absolute bottom-1/3 right-[15%] text-white/5 text-8xl animate-float-delayed">science</span>
      <span class="material-icons absolute top-20 right-1/3 text-white/10 text-4xl animate-float">grain</span>
      <span class="material-icons absolute bottom-20 left-20 text-white/5 text-5xl animate-float-delayed">hub</span>
    </div>

    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto mt-16">
      <div class="overflow-hidden mb-6">
        <h2 class="text-himka-accent font-bold tracking-[0.6em] text-sm md:text-base uppercase animate-slide-up"
          style="animation-delay: 0.2s">
          Himpunan Mahasiswa Kimia
        </h2>
      </div>

      <h1
        class="text-5xl md:text-7xl lg:text-8xl font-serif font-bold text-white mb-8 leading-tight drop-shadow-2xl animate-slide-up"
        style="animation-delay: 0.4s">
        KABINET <br>
        <span
          class="text-transparent bg-clip-text bg-gradient-to-r from-himka-cream via-white to-himka-cream bg-300% animate-gradient">CAKRAWALA</span>
      </h1>

      <p class="text-white/90 text-lg md:text-xl font-light tracking-wide mb-12 max-w-2xl mx-auto animate-slide-up"
        style="animation-delay: 0.6s">
        "Reaksi Bersatu, Kimia Maju, Semangat Tak Pernah Luntur"
      </p>

      <div class="flex flex-col md:flex-row gap-6 justify-center animate-slide-up" style="animation-delay: 0.8s">
        <a href="#profil"
          class="group px-8 py-4 bg-himka-accent text-white font-bold rounded-full hover:bg-himka-accent-light transition-all duration-300 shadow-lg hover:shadow-himka-accent/50 transform hover:-translate-y-1 relative overflow-hidden">
          <span class="relative z-10">Tentang Kami</span>
          <div
            class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700">
          </div>
        </a>
        <a href="#galery"
          class="px-8 py-4 border-2 border-white/30 text-white font-bold rounded-full hover:bg-white/10 backdrop-blur-md transition-all duration-300 hover:border-white">
          Lihat Galeri
        </a>
      </div>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce cursor-pointer z-10">
      <a href="#profil" class="text-white/50 hover:text-white transition-colors flex flex-col items-center gap-2">
        <span class="text-[10px] uppercase tracking-widest">Scroll</span>
        <span class="material-icons text-xl">expand_more</span>
      </a>
    </div>
  </section>

  <!-- ABOUT SECTION -->
  <section class="py-32 bg-himka-cream relative" id="profil">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
        <div class="relative group" data-aos="fade-right">
          <div
            class="absolute -top-6 -left-6 w-32 h-32 border-t-4 border-l-4 border-himka-accent rounded-tl-3xl opacity-50 group-hover:opacity-100 transition-opacity">
          </div>
          <div
            class="absolute -bottom-6 -right-6 w-32 h-32 border-b-4 border-r-4 border-himka-accent rounded-br-3xl opacity-50 group-hover:opacity-100 transition-opacity">
          </div>

          <div
            class="relative overflow-hidden rounded-2xl shadow-2xl transform transition-transform duration-500 group-hover:scale-[1.02]">
            <img src="{{ asset('assets/img/kegiatan2.jpg') }}" alt="About HIMKA"
              class="w-full h-[600px] object-cover filter grayscale group-hover:grayscale-0 transition-all duration-700" loading="lazy">
            <div class="absolute inset-0 bg-himka-secondary/20 group-hover:bg-transparent transition-colors"></div>
          </div>
        </div>

        <div data-aos="fade-left">
          <div class="flex items-center gap-4 mb-6">
            <div class="h-1 w-12 bg-himka-accent"></div>
            <h3 class="text-himka-accent font-bold tracking-[0.2em] text-sm uppercase">Profil Organisasi</h3>
          </div>

          <h2 class="text-5xl md:text-6xl font-serif font-bold text-himka-secondary mb-8 leading-tight">
            Membangun <br> <span class="text-himka-accent">Kimia Masa Depan</span>
          </h2>

          <p class="text-himka-secondary/70 leading-relaxed mb-6 text-lg font-light">
            HIMA Kimia Universitas Maritim Raja Ali Haji (HIMKA UMRAH) dibentuk sebagai rumah bagi aspirasi dan inovasi
            mahasiswa
            Program Studi Kimia. Kami percaya bahwa reaksi kecil dapat memicu perubahan besar.
          </p>
          <p class="text-himka-secondary/70 leading-relaxed mb-10 text-lg font-light">
            Dengan semangat "Reaksi Bersatu, Kimia Maju", kami berkomitmen untuk mencetak generasi kimiawan yang tidak
            hanya
            unggul secara akademis, tetapi juga peduli terhadap lingkungan maritim dan masyarakat.
          </p>

          <div class="grid grid-cols-3 gap-8 py-8 border-t border-himka-secondary/10">
            <div class="text-center md:text-left">
              <span class="block text-5xl font-bold text-himka-secondary mb-2 counter" data-target="5">0</span>
              <span class="text-himka-accent text-xs font-bold uppercase tracking-widest">Tahun Berdiri</span>
            </div>
            <div class="text-center md:text-left">
              <span class="block text-5xl font-bold text-himka-secondary mb-2 counter" data-target="20">0</span>
              <span class="text-himka-accent text-xs font-bold uppercase tracking-widest">Program Kerja</span>
            </div>
            <div class="text-center md:text-left">
              <span class="block text-5xl font-bold text-himka-secondary mb-2 counter" data-target="100">0</span>
              <span class="text-himka-accent text-xs font-bold uppercase tracking-widest">Anggota Aktif</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- VISION MISI START -->
  <section class="py-32 bg-white relative overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-0 right-0 p-20 opacity-5">
      <span class="material-icons text-9xl">science</span>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="text-center mb-20" data-aos="fade-up">
        <h2 class="text-5xl font-serif font-bold text-himka-secondary mb-6">Visi & Misi</h2>
        <div class="h-1 w-24 bg-gradient-to-r from-himka-accent to-purple-600 mx-auto rounded-full"></div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @php
          $misis = [
            ['icon' => 'school', 'title' => 'Pendidikan Tinggi', 'desc' => 'Pusat kecemerlangan pendidikan tinggi, riset, dan tamadun maritim di ASEAN.', 'delay' => 0],
            ['icon' => 'public', 'title' => 'Wawasan Nasional', 'desc' => 'Pendidikan dan pengajaran bidang kimia berwawasan kemaritiman Nasional.', 'delay' => 100],
            ['icon' => 'handshake', 'title' => 'Kolaborasi', 'desc' => 'Pengabdian kepada masyarakat melalui kolaborasi strategis dengan stakeholder.', 'delay' => 200],
            ['icon' => 'storefront', 'title' => 'Entrepreneurship', 'desc' => 'Aktivitas entrepreneurship kimia untuk kesejahteraan masyarakat pesisir.', 'delay' => 300]
          ];
        @endphp

        @foreach($misis as $misi)
          <div
            class="group bg-himka-cream p-10 rounded-3xl transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl hover:bg-white border border-transparent hover:border-himka-cream-dark"
            data-aos="fade-up" data-aos-delay="{{ $misi['delay'] }}">
            <div
              class="w-16 h-16 bg-white rounded-2xl rotate-3 group-hover:rotate-6 flex items-center justify-center mb-8 shadow-sm group-hover:bg-himka-accent transition-all duration-300">
              <span
                class="material-icons text-himka-accent group-hover:text-white text-3xl transition-colors">{{ $misi['icon'] }}</span>
            </div>
            <h3 class="font-bold text-xl mb-4 text-himka-secondary group-hover:text-himka-accent transition-colors">
              {{ $misi['title'] }}</h3>
            <p class="text-himka-secondary/60 text-sm leading-relaxed">{{ $misi['desc'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- GALLERY CAROUSEL section -->
  <section class="py-32 bg-himka-secondary relative overflow-hidden" id="galery">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
        <div class="text-white" data-aos="fade-right">
          <h3 class="text-himka-accent font-bold tracking-[0.2em] text-sm mb-4 uppercase">Dokumentasi</h3>
          <h2 class="text-5xl font-serif font-bold">Galeri Kegiatan</h2>
        </div>

        <div class="flex gap-4" data-aos="fade-left">
          <button id="prevGallery"
            class="w-14 h-14 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-himka-accent hover:border-himka-accent transition-all duration-300 group">
            <span class="material-icons group-hover:-translate-x-1 transition-transform">arrow_back</span>
          </button>
          <button id="nextGallery"
            class="w-14 h-14 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-himka-accent hover:border-himka-accent transition-all duration-300 group">
            <span class="material-icons group-hover:translate-x-1 transition-transform">arrow_forward</span>
          </button>
        </div>
      </div>

      <div class="relative overflow-hidden rounded-3xl shadow-2xl" data-aos="zoom-in">
        <div id="galleryCarousel" class="flex transition-transform duration-700 ease-out h-[600px]">
          @php
            $defaultGalleries = [
              ['img' => 'galeri1.jpg', 'title' => 'Prestasi Mahasiswa', 'desc' => 'Juara 1 Lomba Karya Tulis Ilmiah Nasional'],
              ['img' => 'galeri2.jpg', 'title' => 'Sosialisasi', 'desc' => 'Pengenalan Dunia Kampus ke Sekolah Menengah'],
              ['img' => 'galeri4.jpg', 'title' => 'Seminar Nasional', 'desc' => 'Membangun Karakter Melalui Ilmu Kimia'],
            ];
            $galleryItems = isset($galleries) && $galleries->count() > 0 ? $galleries : collect($defaultGalleries);
          @endphp

          @foreach($galleryItems as $gallery)
            <div class="min-w-full relative h-full group">
              @php
                $imgSrc = is_array($gallery) ? asset('assets/img/' . $gallery['img']) : Storage::url($gallery->image);
                $title = is_array($gallery) ? $gallery['title'] : $gallery->title;
                $desc = is_array($gallery) ? $gallery['desc'] : ($gallery->description ?? 'Kegiatan HIMKA UMRAH');
               @endphp
              <img src="{{ $imgSrc }}"
                class="w-full h-full object-cover transition-transform duration-[2s] group-hover:scale-110"
                alt="{{ $title }}" loading="lazy">

              <div class="absolute inset-0 bg-gradient-to-t from-himka-secondary/90 via-transparent to-transparent">
                <div
                  class="absolute bottom-0 left-0 p-12 md:p-16 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                  <h3 class="text-3xl font-bold text-white mb-2">{{ $title }}</h3>
                  <p
                    class="text-white/80 max-w-lg opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                    {{ $desc }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <!-- NEWS SECTION -->
  <section class="py-32 bg-himka-cream" id="berita">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="mb-16 text-center" data-aos="fade-up">
        <h3 class="text-himka-accent font-bold tracking-[0.2em] text-sm mb-4 uppercase">Informasi Terkini</h3>
        <h2 class="text-5xl font-serif font-bold text-himka-secondary">Berita & Artikel</h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @if(isset($featuredArticle) && $featuredArticle)
          <a href="{{ route('articles.show', $featuredArticle) }}"
            class="md:col-span-2 group relative h-full min-h-[500px] rounded-3xl overflow-hidden shadow-xl"
            data-aos="fade-up">
            <div class="absolute inset-0 bg-himka-secondary/20 z-10 transition-colors group-hover:bg-transparent"></div>
            <img
              src="{{ $featuredArticle->image ? Storage::url($featuredArticle->image) : asset('assets/img/galeri1.jpg') }}"
              class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
              alt="Featured" loading="lazy">

            <div
              class="absolute inset-0 z-20 bg-gradient-to-t from-himka-secondary via-himka-secondary/40 to-transparent flex flex-col justify-end p-10">
              <span
                class="inline-block px-4 py-1 bg-himka-accent text-white text-xs font-bold rounded-full mb-4 w-fit">FEATURED</span>
              <h3 class="text-3xl md:text-4xl font-bold text-white mb-4 group-hover:text-himka-cream transition-colors">
                {{ $featuredArticle->title }}</h3>
              <p class="text-white/80 line-clamp-2 md:line-clamp-3 mb-6">{{ $featuredArticle->excerpt }}</p>
              <div class="flex items-center text-white/70 text-sm gap-6">
                <span class="flex items-center gap-2"><span class="material-icons text-base">calendar_today</span>
                  {{ $featuredArticle->created_at->format('d M Y') }}</span>
              </div>
            </div>
          </a>
        @endif

        <div class="flex flex-col gap-8">
          @if(isset($articles))
            @foreach($articles->take(3) as $article)
              @continue(isset($featuredArticle) && $featuredArticle->id === $article->id)
              <a href="{{ route('articles.show', $article) }}"
                class="flex-1 bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group flex flex-col"
                data-aos="fade-left" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="h-48 overflow-hidden relative">
                  <img src="{{ $article->image ? Storage::url($article->image) : asset('assets/img/galeri2.jpg') }}"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="News" loading="lazy">
                  <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors"></div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                  <div class="text-xs text-himka-accent font-bold mb-2 uppercase tracking-wider">
                    {{ $article->category->name ?? 'Berita' }}</div>
                  <h4
                    class="text-xl font-bold text-himka-secondary mb-3 group-hover:text-himka-accent transition-colors line-clamp-2">
                    {{ $article->title }}</h4>
                  <p class="text-gray-500 text-sm line-clamp-2 mb-auto">{{ $article->excerpt }}</p>
                  <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                    <span>{{ $article->created_at->format('d M Y') }}</span>
                    <span class="group-hover:translate-x-1 transition-transform">Baca Selengkapnya &rarr;</span>
                  </div>
                </div>
              </a>
            @endforeach
          @endif
        </div>
      </div>

      <div class="text-center mt-12">
        <a href="{{ route('articles.index') }}"
          class="inline-flex items-center gap-2 text-himka-secondary font-bold hover:text-himka-accent transition-colors border-b-2 border-himka-accent pb-1">
          Lihat Semua Berita <span class="material-icons text-sm">arrow_forward</span>
        </a>
      </div>
    </div>
  </section>

  <!-- CONTACT SECTION -->
  <section class="py-32 bg-white" id="kontak">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-himka-secondary rounded-[3rem] p-2 overflow-hidden shadow-2xl" data-aos="zoom-in-up">
        <div class="bg-himka-secondary rounded-[2.5rem] p-8 md:p-16 relative overflow-hidden">
          <!-- Background Blobs -->
          <div
            class="absolute top-0 right-0 w-96 h-96 bg-himka-accent/20 rounded-full blur-[100px] translate-x-1/2 -translate-y-1/2 pointer-events-none">
          </div>
          <div
            class="absolute bottom-0 left-0 w-64 h-64 bg-blue-500/20 rounded-full blur-[80px] -translate-x-1/2 translate-y-1/2 pointer-events-none">
          </div>

          <div class="relative z-10 grid md:grid-cols-2 gap-16 items-center">
            <div>
              <h3 class="text-himka-accent font-bold tracking-[0.2em] text-sm mb-4 uppercase">Hubungi Kami</h3>
              <h2 class="text-4xl md:text-5xl font-serif font-bold text-white mb-6">Let's Connect</h2>
              <p class="text-white/80 leading-relaxed mb-10 text-lg font-light">
                Punya pertanyaan, ide kolaborasi, atau sekadar ingin menyapa? Kami siap mendengar aspirasi Anda untuk
                kemajuan bersama.
              </p>

              <div class="space-y-6">
                <div class="flex items-center gap-6 group">
                  <div
                    class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-himka-accent transition-colors">
                    <span class="material-icons text-white">location_on</span>
                  </div>
                  <div>
                    <div class="text-white/50 text-xs uppercase tracking-wider mb-1">Alamat</div>
                    <div class="text-white font-medium">Universitas Maritim Raja Ali Haji</div>
                  </div>
                </div>
                <div class="flex items-center gap-6 group">
                  <div
                    class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-himka-accent transition-colors">
                    <span class="material-icons text-white">email</span>
                  </div>
                  <div>
                    <div class="text-white/50 text-xs uppercase tracking-wider mb-1">Email</div>
                    <div class="text-white font-medium">himkafttkumrah@gmail.com</div>
                  </div>
                </div>
              </div>
            </div>

            <form class="bg-white/5 backdrop-blur-md p-8 rounded-3xl border border-white/10 space-y-6">
              <div class="group">
                <label
                  class="block text-white/70 text-xs uppercase tracking-wider mb-2 group-focus-within:text-himka-accent transition-colors">Nama
                  Lengkap</label>
                <input type="text"
                  class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-himka-accent focus:bg-black/40 transition-all"
                  placeholder="John Doe">
              </div>
              <div class="group">
                <label
                  class="block text-white/70 text-xs uppercase tracking-wider mb-2 group-focus-within:text-himka-accent transition-colors">Email
                  Address</label>
                <input type="email"
                  class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-himka-accent focus:bg-black/40 transition-all"
                  placeholder="john@example.com">
              </div>
              <div class="group">
                <label
                  class="block text-white/70 text-xs uppercase tracking-wider mb-2 group-focus-within:text-himka-accent transition-colors">Pesan</label>
                <textarea rows="4"
                  class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:outline-none focus:border-himka-accent focus:bg-black/40 transition-all"
                  placeholder="Tulis pesan Anda di sini..."></textarea>
              </div>
              <button type="submit"
                class="w-full bg-himka-accent hover:bg-himka-accent-light text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-himka-accent/50 transition-all transform hover:-translate-y-1">
                Kirim Pesan
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    // Simple Counter Animation
    const counters = document.querySelectorAll('.counter');
    const speed = 200; // The lower the slower

    const animateCounters = () => {
      counters.forEach(counter => {
        const updateCount = () => {
          const target = +counter.getAttribute('data-target');
          const count = +counter.innerText;
          const inc = target / speed;

          if (count < target) {
            counter.innerText = Math.ceil(count + inc);
            setTimeout(updateCount, 20);
          } else {
            counter.innerText = target + (target > 50 ? '+' : '');
          }
        };
        updateCount();
      });
    };

    // Trigger counter when in view (simple intersection observer)
    const counterSection = document.querySelector('.counter');
    if (counterSection) {
      const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
          animateCounters();
          observer.disconnect();
        }
      });
      observer.observe(counterSection);
    }

    // Gallery Logic
    const galleryCarousel = document.getElementById('galleryCarousel');
    const prevBtn = document.getElementById('prevGallery');
    const nextBtn = document.getElementById('nextGallery');
    let currentIndex = 0;

    // Calculate total slides based on children count
    const totalSlides = galleryCarousel.children.length; // Approximate, assuming 1 item per view for mobile, need to adjust for desktop?
    // Actually the CSS sets min-w-full, so it's one slide per view.

    const updateGallery = () => {
      galleryCarousel.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    if (prevBtn && nextBtn) {
      prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateGallery();
      });

      nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateGallery();
      });

      // Auto play
      setInterval(() => {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateGallery();
      }, 6000);
    }
  </script>
@endpush