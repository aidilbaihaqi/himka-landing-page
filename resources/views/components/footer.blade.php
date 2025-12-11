<!-- Footer -->
<footer class="bg-himka-secondary text-white pt-16 pb-8 border-t-4 border-himka-accent relative overflow-hidden">
  <!-- Decorative Elements -->
  <div class="absolute top-0 left-0 w-64 h-64 bg-himka-accent/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
  <div class="absolute bottom-0 right-0 w-48 h-48 bg-himka-accent/5 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
      <div class="text-center md:text-left" data-aos="fade-up" data-aos-delay="100">
        <a href="{{ url('/') }}" class="inline-flex items-center justify-center md:justify-start gap-3 mb-4 group">
          <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-12 group-hover:scale-110 transition-transform duration-300">
          <span class="text-2xl font-bold tracking-wider">HIMKA UMRAH</span>
        </a>
        <p class="text-white/70 text-sm leading-relaxed max-w-xs mx-auto md:mx-0">
          Wadah aspirasi dan kreasi mahasiswa Kimia Universitas Maritim Raja Ali Haji. Reaksi Bersatu, Kimia Maju!
        </p>
      </div>

      <div class="text-center" data-aos="fade-up" data-aos-delay="200">
        <h3 class="text-lg font-bold text-himka-accent-light mb-6 uppercase tracking-widest">Tautan</h3>
        <ul class="space-y-3 text-white/70">
          <li><a href="{{ url('/') }}#home" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-300">Beranda</a></li>
          <li><a href="{{ url('/') }}#profil" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-300">Profil</a></li>
          <li><a href="{{ url('/') }}#galery" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-300">Galeri</a></li>
          <li><a href="{{ route('articles.index') }}" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-300">Berita</a></li>
        </ul>
      </div>

      <div class="text-center md:text-right" data-aos="fade-up" data-aos-delay="300">
        <h3 class="text-lg font-bold text-himka-accent-light mb-6 uppercase tracking-widest">Sosial Media</h3>
        <div class="flex justify-center md:justify-end gap-4">
          <a href="https://instagram.com/himka.umrah" target="_blank"
            class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center hover:bg-himka-accent transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-himka-accent/25 group">
            <span class="material-icons text-white text-xl group-hover:scale-110 transition-transform">photo_camera</span>
          </a>
          <a href="mailto:himkafttkumrah@gmail.com"
            class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center hover:bg-himka-accent transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-himka-accent/25 group">
            <span class="material-icons text-white text-xl group-hover:scale-110 transition-transform">email</span>
          </a>
        </div>
      </div>
    </div>

    <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
      <p class="text-white/50 text-sm tracking-wider">&copy; {{ date('Y') }} HIMKA UMRAH. Built with Chemistry & Code.</p>
      <a href="{{ route('login') }}" class="text-white/30 hover:text-white/60 text-xs transition-colors">Admin Login</a>
    </div>
  </div>
</footer>
