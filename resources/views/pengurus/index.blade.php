@extends('layouts.app')

@section('title', 'Pengurus HIMKA - HIMKA UMRAH')

@section('content')
  <!-- Hero Section -->
  <section class="relative pt-32 pb-16 bg-gradient-to-br from-himka-cream via-white to-himka-cream overflow-hidden">
    <div class="absolute inset-0 z-0">
      <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=1920&q=80" 
        alt="Chemistry Background" 
        class="w-full h-full object-cover opacity-10">
      <div class="absolute inset-0 bg-gradient-to-br from-himka-cream/90 via-white/80 to-himka-cream/90"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="text-center" data-aos="fade-up">
        <h3 class="text-himka-secondary font-bold tracking-widest text-sm mb-2 uppercase">Kepengurusan</h3>
        <h1 class="text-4xl md:text-5xl font-serif font-bold text-gray-900 mb-4">Pengurus HIMKA</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">Pengurus aktif yang menjalankan roda organisasi HIMKA UMRAH Kabinet Cakrawala.</p>
        <div class="w-24 h-1 bg-himka-secondary mx-auto rounded-full mt-6"></div>
      </div>
    </div>
  </section>

  <!-- Pengurus Grid Section -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      @if($pengurus->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
          @foreach($pengurus as $index => $p)
            <div data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 100 }}"
              class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group hover:-translate-y-2">
              <!-- Photo -->
              <div class="relative aspect-[4/5] overflow-hidden">
                @if($p->photo)
                  <img src="{{ Storage::url($p->photo) }}" 
                    alt="{{ $p->user->name }}" 
                    class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105">
                @else
                  <div class="w-full h-full bg-himka-cream flex items-center justify-center">
                    <span class="material-icons text-6xl text-himka-secondary/30">person</span>
                  </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-himka-secondary/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                <!-- Jabatan Badge -->
                <div class="absolute top-3 left-3">
                  <span class="px-3 py-1 bg-himka-secondary text-white text-xs font-bold rounded-full shadow-lg">
                    {{ $p->jabatan }}
                  </span>
                </div>
              </div>

              <!-- Info -->
              <div class="p-5">
                <h3 class="font-bold text-lg text-gray-900 mb-1 group-hover:text-himka-secondary transition-colors">
                  {{ $p->user->name }}
                </h3>
                <p class="text-himka-secondary text-sm font-medium mb-2">{{ $p->nim }}</p>
                
                <div class="flex items-center gap-2 text-gray-500 text-xs mb-2">
                  <span class="material-icons text-sm">business</span>
                  <span>{{ $p->divisi }}</span>
                </div>
                
                <div class="flex items-center gap-2 text-gray-500 text-xs mb-3">
                  <span class="material-icons text-sm">date_range</span>
                  <span>Periode {{ $p->periode }}</span>
                </div>

                @if($p->bio)
                  <p class="text-gray-600 text-sm line-clamp-3">{{ $p->bio }}</p>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="text-center py-16">
          <span class="material-icons text-8xl text-gray-300 mb-4">groups</span>
          <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Data Pengurus</h3>
          <p class="text-gray-500">Data pengurus akan segera ditampilkan.</p>
        </div>
      @endif
    </div>
  </section>
@endsection
