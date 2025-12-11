<!-- Footer -->
<footer class="bg-himka-secondary text-white pt-20 pb-10 border-t-4 border-himka-accent relative overflow-hidden">
  <!-- Decorative background elements -->
  <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
    <div class="absolute top-20 left-10 w-64 h-64 rounded-full bg-himka-accent blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 rounded-full bg-blue-500 blur-3xl"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
      <div class="text-center md:text-left" data-aos="fade-up" data-aos-delay="0">
        <div class="flex items-center justify-center md:justify-start gap-4 mb-6">
          <img src="{{ asset('assets/img/logo.png') }}" alt="Logo"
            class="h-16 w-auto drop-shadow-2xl filter brightness-110">
          <div>
            <span class="block text-2xl font-bold tracking-wider font-serif">HIMKA UMRAH</span>
            <span class="block text-xs uppercase tracking-[0.2em] text-white/70">Kabinet Cakrawala</span>
          </div>
        </div>
        <p class="text-white/80 text-sm leading-relaxed max-w-xs mx-auto md:mx-0 font-light">
          Wadah aspirasi dan kreasi mahasiswa Kimia Universitas Maritim Raja Ali Haji. Bersama membangun iklim akademik
          yang prestatif dan kekeluargaan yang erat.
          <br><br>
          <span class="font-medium text-himka-cream italic">"Reaksi Bersatu, Kimia Maju!"</span>
        </p>
      </div>

      <div class="text-center" data-aos="fade-up" data-aos-delay="100">
        <h3 class="text-lg font-bold text-himka-accent mb-8 uppercase tracking-widest relative inline-block">
          Tautan Cepat
          <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-8 h-1 bg-himka-accent rounded-full"></span>
        </h3>
        <ul class="space-y-4 text-white/80">
          <li><a href="{{ url('/') }}#home"
              class="hover:text-himka-cream hover:translate-x-2 inline-block transition-all duration-300">Beranda</a>
          </li>
          <li><a href="{{ url('/') }}#profil"
              class="hover:text-himka-cream hover:translate-x-2 inline-block transition-all duration-300">Profil</a>
          </li>
          <li><a href="{{ url('/') }}#galery"
              class="hover:text-himka-cream hover:translate-x-2 inline-block transition-all duration-300">Galeri</a>
          </li>
          <li><a href="{{ route('articles.index') }}"
              class="hover:text-himka-cream hover:translate-x-2 inline-block transition-all duration-300">Berita &
              Artikel</a></li>
          <li><a href="{{ url('/login') }}"
              class="hover:text-himka-cream hover:translate-x-2 inline-block transition-all duration-300">Administrator</a>
          </li>
        </ul>
      </div>

      <div class="text-center md:text-right" data-aos="fade-up" data-aos-delay="200">
        <h3
          class="text-lg font-bold text-himka-accent mb-8 uppercase tracking-widest relative inline-block md:inline-block">
          Terhubung Dengan Kami
          <span
            class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-8 h-1 bg-himka-accent rounded-full md:left-auto md:right-0 md:translate-x-0"></span>
        </h3>
        <p class="text-white/70 text-sm mb-6">Jangan lewatkan informasi terbaru dari HIMKA UMRAH.</p>
        <div class="flex justify-center md:justify-end gap-4">
          <a href="https://instagram.com/himka.umrah" target="_blank"
            class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center hover:bg-gradient-to-tr hover:from-purple-500 hover:to-pink-500 transition-all duration-300 hover:-translate-y-2 shadow-lg group">
            <span class="material-icons text-white text-2xl group-hover:animate-pulse">photo_camera</span>
          </a>
          <a href="mailto:himkafttkumrah@gmail.com"
            class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center hover:bg-red-500 transition-all duration-300 hover:-translate-y-2 shadow-lg group">
            <span class="material-icons text-white text-2xl group-hover:animate-pulse">email</span>
          </a>
          <a href="#" target="_blank"
            class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center hover:bg-blue-600 transition-all duration-300 hover:-translate-y-2 shadow-lg group">
            <span class="material-icons text-white text-2xl group-hover:animate-pulse">facebook</span>
          </a>
        </div>

        <div class="mt-8 text-sm text-white/60">
          <p>Sekretariat:</p>
          <p>Gedung FTTK, Kampus Dompak, Tanjungpinang</p>
        </div>
      </div>
    </div>

    <div class="border-t border-white/10 pt-8 text-center flex flex-col md:flex-row justify-between items-center gap-4">
      <p class="text-white/50 text-xs tracking-wider order-2 md:order-1">&copy; {{ date('Y') }} HIMKA UMRAH. Built with
        <span class="text-red-500">♥</span> & Chemistry.</p>
      <div class="order-1 md:order-2 flex gap-4">
        <a href="#" class="text-xs text-white/50 hover:text-white transition-colors">Privacy Policy</a>
        <a href="#" class="text-xs text-white/50 hover:text-white transition-colors">Terms of Service</a>
      </div>
    </div>
  </div>
</footer>