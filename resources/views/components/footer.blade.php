@php
  $contactInfo = \App\Models\SiteSetting::getContactInfo();
@endphp

<!-- Footer -->
<footer class="bg-gradient-to-br from-himka-cream via-white to-himka-cream pt-16 pb-8 border-t-4 border-himka-accent relative overflow-hidden">
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0 z-0">
    <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=1920&q=80" 
      alt="Chemistry Background" 
      class="w-full h-full object-cover opacity-[0.08]">
    <div class="absolute inset-0 bg-gradient-to-br from-himka-cream/95 via-white/90 to-himka-cream/95"></div>
  </div>
  
  <!-- Decorative Elements -->
  <div class="absolute top-0 left-0 w-64 h-64 bg-himka-secondary/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
  <div class="absolute bottom-0 right-0 w-48 h-48 bg-himka-accent/10 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-12">
      <!-- Brand -->
      <div class="text-center md:text-left" data-aos="fade-up" data-aos-delay="100">
        <a href="{{ url('/') }}" class="inline-flex items-center justify-center md:justify-start gap-3 mb-4 group">
          <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-12 group-hover:scale-110 transition-transform duration-300">
          <span class="text-2xl font-bold tracking-wider text-gray-900">HIMKA UMRAH</span>
        </a>
        <p class="text-gray-600 text-sm leading-relaxed max-w-xs mx-auto md:mx-0">
          Wadah aspirasi dan kreasi mahasiswa Kimia Universitas Maritim Raja Ali Haji. Reaksi Bersatu, Kimia Maju!
        </p>
      </div>

      <!-- Quick Links -->
      <div class="text-center md:text-left" data-aos="fade-up" data-aos-delay="200">
        <h3 class="text-lg font-bold text-himka-secondary mb-6 uppercase tracking-widest">Tautan</h3>
        <ul class="space-y-3 text-gray-600">
          <li><a href="{{ url('/') }}#home" class="hover:text-himka-secondary hover:translate-x-1 inline-block transition-all duration-300">Beranda</a></li>
          <li><a href="{{ url('/') }}#profil" class="hover:text-himka-secondary hover:translate-x-1 inline-block transition-all duration-300">Profil</a></li>
          <li><a href="{{ url('/') }}#galery" class="hover:text-himka-secondary hover:translate-x-1 inline-block transition-all duration-300">Galeri</a></li>
          <li><a href="{{ route('articles.index') }}" class="hover:text-himka-secondary hover:translate-x-1 inline-block transition-all duration-300">Berita</a></li>
          <li><a href="https://bit.ly/BrosurProdiKimia" target="_blank" class="hover:text-himka-secondary hover:translate-x-1 inline-block transition-all duration-300">Brosur Prodi Kimia</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="text-center md:text-left" data-aos="fade-up" data-aos-delay="300">
        <h3 class="text-lg font-bold text-himka-secondary mb-6 uppercase tracking-widest">Kontak</h3>
        <ul class="space-y-4 text-gray-600">
          @if($contactInfo['admin_name'])
          <li class="flex items-start gap-3 justify-center md:justify-start">
            <span class="material-icons text-himka-accent text-lg mt-0.5">person</span>
            <span class="text-sm">{{ $contactInfo['admin_name'] }}</span>
          </li>
          @endif
          @if($contactInfo['email'])
          <li class="flex items-start gap-3 justify-center md:justify-start">
            <span class="material-icons text-himka-accent text-lg mt-0.5">email</span>
            <a href="mailto:{{ $contactInfo['email'] }}" class="text-sm hover:text-himka-secondary transition-colors">{{ $contactInfo['email'] }}</a>
          </li>
          @endif
          @if($contactInfo['address'])
          <li class="flex items-start gap-3 justify-center md:justify-start">
            <span class="material-icons text-himka-accent text-lg mt-0.5">location_on</span>
            <span class="text-sm">{{ $contactInfo['address'] }}</span>
          </li>
          @endif
        </ul>
        
        <!-- Social Media -->
        <div class="flex justify-center md:justify-start gap-3 mt-6">
          <a href="https://instagram.com/himka.umrah" target="_blank"
            class="w-10 h-10 rounded-xl bg-himka-secondary/10 flex items-center justify-center hover:bg-himka-accent transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-himka-accent/25 group">
            <svg class="w-5 h-5 text-himka-secondary group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
            </svg>
          </a>
          @if($contactInfo['email'])
          <a href="mailto:{{ $contactInfo['email'] }}"
            class="w-10 h-10 rounded-xl bg-himka-secondary/10 flex items-center justify-center hover:bg-himka-accent transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-himka-accent/25 group">
            <span class="material-icons text-himka-secondary group-hover:text-white text-lg group-hover:scale-110 transition-transform">email</span>
          </a>
          @endif
        </div>
      </div>

      <!-- Google Maps -->
      <div class="text-center md:text-left" data-aos="fade-up" data-aos-delay="400">
        <h3 class="text-lg font-bold text-himka-secondary mb-6 uppercase tracking-widest">Lokasi</h3>
        @if($contactInfo['maps_embed'])
        <div class="rounded-xl overflow-hidden shadow-lg border border-himka-secondary/10">
          <iframe 
            src="{{ $contactInfo['maps_embed'] }}" 
            width="100%" 
            height="180" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"
            class="grayscale hover:grayscale-0 transition-all duration-500">
          </iframe>
        </div>
        @else
        <div class="rounded-xl bg-himka-secondary/5 h-[180px] flex items-center justify-center">
          <div class="text-center text-himka-secondary/40">
            <span class="material-icons text-4xl mb-2">map</span>
            <p class="text-sm">Peta belum diatur</p>
          </div>
        </div>
        @endif
      </div>
    </div>

    <div class="border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
      <p class="text-gray-500 text-sm tracking-wider">&copy; {{ date('Y') }} HIMKA UMRAH. Built with Chemistry & Code.</p>
      <a href="{{ route('login') }}" class="text-gray-400 hover:text-himka-secondary text-xs transition-colors">Admin Login</a>
    </div>
  </div>
</footer>
