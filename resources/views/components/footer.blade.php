<!-- Footer -->
<footer class="bg-himka-secondary text-white pt-16 pb-8 border-t border-himka-accent">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
      <div class="text-center md:text-left">
        <div class="flex items-center justify-center md:justify-start gap-3 mb-4">
          <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-10">
          <span class="text-2xl font-bold tracking-wider">HIMKA UMRAH</span>
        </div>
        <p class="text-white/80 text-sm leading-relaxed max-w-xs mx-auto md:mx-0">
          Wadah aspirasi dan kreasi mahasiswa Kimia Universitas Maritim Raja Ali Haji. Reaksi Bersatu, Kimia Maju!
        </p>
      </div>

      <div class="text-center">
        <h3 class="text-lg font-bold text-himka-accent mb-6 uppercase tracking-widest">Tautan</h3>
        <ul class="space-y-3 text-white/80">
          <li><a href="{{ url('/') }}#home" class="hover:text-himka-cream transition-colors">Beranda</a></li>
          <li><a href="{{ url('/') }}#profil" class="hover:text-himka-cream transition-colors">Profil</a></li>
          <li><a href="{{ url('/') }}#galery" class="hover:text-himka-cream transition-colors">Galeri</a></li>
          <li><a href="{{ route('articles.index') }}" class="hover:text-himka-cream transition-colors">Berita</a></li>
        </ul>
      </div>

      <div class="text-center md:text-right">
        <h3 class="text-lg font-bold text-himka-accent mb-6 uppercase tracking-widest">Sosial Media</h3>
        <div class="flex justify-center md:justify-end gap-6">
          <a href="https://instagram.com/himka.umrah" target="_blank"
            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-himka-accent transition-all duration-300 hover:-translate-y-1">
            <span class="material-icons text-white text-xl">photo_camera</span>
          </a>
          <a href="mailto:himkafttkumrah@gmail.com"
            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-himka-accent transition-all duration-300 hover:-translate-y-1">
            <span class="material-icons text-white text-xl">email</span>
          </a>
        </div>
      </div>
    </div>

    <div class="border-t border-white/10 pt-8 text-center">
      <p class="text-white/50 text-xs tracking-wider">&copy; {{ date('Y') }} HIMKA UMRAH. Built with Chemistry &
        Code.</p>
    </div>
  </div>
</footer>
