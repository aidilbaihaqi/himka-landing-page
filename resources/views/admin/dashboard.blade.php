@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
  <div class="mb-8">
    <h2 class="text-2xl font-bold text-himka-secondary mb-1">Selamat Datang, {{ auth()->user()->name }}!</h2>
    <p class="text-himka-secondary/60">Berikut ringkasan aktivitas HIMKA UMRAH.</p>
  </div>

  <!-- Stats Grid -->
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5 hover:shadow-md transition-shadow">
      <div class="flex items-center gap-3 lg:gap-4">
        <div class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-500">
          <span class="material-icons text-xl lg:text-2xl">newspaper</span>
        </div>
        <div>
          <p class="text-himka-secondary/50 text-xs uppercase font-bold tracking-wide">Berita</p>
          <h3 class="text-xl lg:text-2xl font-bold text-himka-secondary">{{ $stats['articles'] }}</h3>
        </div>
      </div>
    </div>

    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5 hover:shadow-md transition-shadow">
      <div class="flex items-center gap-3 lg:gap-4">
        <div class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-green-50 flex items-center justify-center text-green-500">
          <span class="material-icons text-xl lg:text-2xl">event</span>
        </div>
        <div>
          <p class="text-himka-secondary/50 text-xs uppercase font-bold tracking-wide">Kegiatan</p>
          <h3 class="text-xl lg:text-2xl font-bold text-himka-secondary">{{ $stats['kegiatan'] }}</h3>
        </div>
      </div>
    </div>

    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5 hover:shadow-md transition-shadow">
      <div class="flex items-center gap-3 lg:gap-4">
        <div class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-purple-50 flex items-center justify-center text-purple-500">
          <span class="material-icons text-xl lg:text-2xl">collections</span>
        </div>
        <div>
          <p class="text-himka-secondary/50 text-xs uppercase font-bold tracking-wide">Galeri</p>
          <h3 class="text-xl lg:text-2xl font-bold text-himka-secondary">{{ $stats['galleries'] }}</h3>
        </div>
      </div>
    </div>

    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5 hover:shadow-md transition-shadow">
      <div class="flex items-center gap-3 lg:gap-4">
        <div class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-orange-50 flex items-center justify-center text-orange-500">
          <span class="material-icons text-xl lg:text-2xl">people</span>
        </div>
        <div>
          <p class="text-himka-secondary/50 text-xs uppercase font-bold tracking-wide">Pengurus</p>
          <h3 class="text-xl lg:text-2xl font-bold text-himka-secondary">{{ $stats['pengurus'] }}</h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Activity Chart & Published Stats -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8 mb-8">
    <!-- Activity Chart -->
    <div class="lg:col-span-2 bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5">
      <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-lg text-himka-secondary">Aktivitas 6 Bulan Terakhir</h3>
      </div>
      <div class="h-64">
        <canvas id="activityChart"></canvas>
      </div>
    </div>

    <!-- Published Stats -->
    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5">
      <h3 class="font-bold text-lg text-himka-secondary mb-6">Status Publikasi</h3>
      
      <div class="space-y-6">
        <!-- Articles -->
        <div>
          <div class="flex justify-between items-center mb-2">
            <span class="text-sm text-himka-secondary/70">Berita</span>
            <span class="text-sm font-bold text-himka-secondary">{{ $publishedStats['articles_published'] }}/{{ $stats['articles'] }}</span>
          </div>
          <div class="w-full bg-himka-cream rounded-full h-3">
            <div class="bg-blue-500 h-3 rounded-full transition-all duration-500" 
                 style="width: {{ $stats['articles'] > 0 ? ($publishedStats['articles_published'] / $stats['articles']) * 100 : 0 }}%"></div>
          </div>
          <div class="flex justify-between mt-1 text-xs text-himka-secondary/50">
            <span>{{ $publishedStats['articles_published'] }} Published</span>
            <span>{{ $publishedStats['articles_draft'] }} Draft</span>
          </div>
        </div>

        <!-- Kegiatan -->
        <div>
          <div class="flex justify-between items-center mb-2">
            <span class="text-sm text-himka-secondary/70">Kegiatan</span>
            <span class="text-sm font-bold text-himka-secondary">{{ $publishedStats['kegiatan_published'] }}/{{ $stats['kegiatan'] }}</span>
          </div>
          <div class="w-full bg-himka-cream rounded-full h-3">
            <div class="bg-green-500 h-3 rounded-full transition-all duration-500" 
                 style="width: {{ $stats['kegiatan'] > 0 ? ($publishedStats['kegiatan_published'] / $stats['kegiatan']) * 100 : 0 }}%"></div>
          </div>
          <div class="flex justify-between mt-1 text-xs text-himka-secondary/50">
            <span>{{ $publishedStats['kegiatan_published'] }} Published</span>
            <span>{{ $publishedStats['kegiatan_draft'] }} Draft</span>
          </div>
        </div>

        <!-- Quick Actions -->
        <div class="pt-4 border-t border-himka-secondary/10">
          <p class="text-xs text-himka-secondary/50 mb-3">Quick Actions</p>
          <div class="grid grid-cols-2 gap-2">
            <a href="{{ route('admin.articles.create') }}" class="flex items-center gap-2 p-2 bg-himka-cream rounded-lg text-sm text-himka-secondary hover:bg-himka-accent hover:text-white transition-colors">
              <span class="material-icons text-sm">add</span> Berita
            </a>
            <a href="{{ route('admin.kegiatan.create') }}" class="flex items-center gap-2 p-2 bg-himka-cream rounded-lg text-sm text-himka-secondary hover:bg-himka-accent hover:text-white transition-colors">
              <span class="material-icons text-sm">add</span> Kegiatan
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Calendar & Upcoming Events -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8 mb-8">
    <!-- Calendar Widget -->
    <div class="lg:col-span-2 bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5">
      <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-lg text-himka-secondary">Kalender Kegiatan</h3>
        <div class="flex items-center gap-2">
          <button id="prevMonth" class="p-1 hover:bg-himka-cream rounded-lg transition-colors">
            <span class="material-icons text-himka-secondary">chevron_left</span>
          </button>
          <span id="currentMonth" class="font-medium text-himka-secondary min-w-[120px] text-center"></span>
          <button id="nextMonth" class="p-1 hover:bg-himka-cream rounded-lg transition-colors">
            <span class="material-icons text-himka-secondary">chevron_right</span>
          </button>
        </div>
      </div>
      
      <!-- Calendar Grid -->
      <div class="grid grid-cols-7 gap-1 mb-2">
        <div class="text-center text-xs font-bold text-himka-secondary/50 py-2">Min</div>
        <div class="text-center text-xs font-bold text-himka-secondary/50 py-2">Sen</div>
        <div class="text-center text-xs font-bold text-himka-secondary/50 py-2">Sel</div>
        <div class="text-center text-xs font-bold text-himka-secondary/50 py-2">Rab</div>
        <div class="text-center text-xs font-bold text-himka-secondary/50 py-2">Kam</div>
        <div class="text-center text-xs font-bold text-himka-secondary/50 py-2">Jum</div>
        <div class="text-center text-xs font-bold text-himka-secondary/50 py-2">Sab</div>
      </div>
      <div id="calendarGrid" class="grid grid-cols-7 gap-1">
        <!-- Calendar days will be rendered here -->
      </div>
    </div>

    <!-- Upcoming Events -->
    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5">
      <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-lg text-himka-secondary">Kegiatan Mendatang</h3>
        <a href="{{ route('admin.kegiatan.index') }}" class="text-himka-accent text-sm hover:underline">Semua</a>
      </div>

      <div class="space-y-4">
        @forelse($upcomingEvents as $event)
          <div class="flex gap-3 items-start p-3 bg-himka-cream/50 rounded-xl hover:bg-himka-cream transition-colors">
            <div class="w-12 h-12 rounded-xl bg-himka-accent text-white flex flex-col items-center justify-center shrink-0">
              <span class="text-xs font-bold">{{ $event->event_date->format('d') }}</span>
              <span class="text-[10px] uppercase">{{ $event->event_date->format('M') }}</span>
            </div>
            <div class="flex-1 min-w-0">
              <h4 class="font-medium text-himka-secondary text-sm truncate">{{ $event->title }}</h4>
              @if($event->location)
                <p class="text-xs text-himka-secondary/50 flex items-center gap-1 mt-1">
                  <span class="material-icons text-xs">location_on</span>
                  {{ $event->location }}
                </p>
              @endif
            </div>
          </div>
        @empty
          <div class="text-center py-8">
            <span class="material-icons text-4xl text-himka-secondary/20 mb-2">event_busy</span>
            <p class="text-himka-secondary/50 text-sm">Tidak ada kegiatan mendatang</p>
          </div>
        @endforelse
      </div>
    </div>
  </div>

  <!-- Recent Content -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
    <!-- Recent Articles -->
    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5">
      <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-lg text-himka-secondary">Berita Terbaru</h3>
        <a href="{{ route('admin.articles.index') }}" class="text-himka-accent text-sm hover:underline">Lihat Semua</a>
      </div>

      <div class="space-y-4">
        @forelse($recentArticles as $article)
          <div class="flex gap-4 items-start hover:bg-himka-cream/30 p-2 -mx-2 rounded-xl transition-colors">
            @if($article->image)
              <img src="{{ Storage::url($article->image) }}" class="w-16 h-16 rounded-lg object-cover shrink-0" alt="">
            @else
              <div class="w-16 h-16 rounded-lg bg-himka-cream flex items-center justify-center shrink-0">
                <span class="material-icons text-himka-secondary/30">image</span>
              </div>
            @endif
            <div class="flex-1 min-w-0">
              <h4 class="font-medium text-himka-secondary truncate">{{ $article->title }}</h4>
              <div class="flex items-center gap-2 mt-1">
                <span class="text-xs px-2 py-0.5 rounded-full {{ $article->is_published ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                  {{ $article->is_published ? 'Published' : 'Draft' }}
                </span>
                <span class="text-xs text-himka-secondary/50">{{ $article->created_at->diffForHumans() }}</span>
              </div>
            </div>
          </div>
        @empty
          <p class="text-himka-secondary/50 text-center py-4">Belum ada berita.</p>
        @endforelse
      </div>
    </div>

    <!-- Recent Notulensi -->
    <div class="bg-white p-4 lg:p-6 rounded-2xl shadow-sm border border-himka-secondary/5">
      <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-lg text-himka-secondary">Notulensi Terbaru</h3>
        <a href="{{ route('admin.notulensi.index') }}" class="text-himka-accent text-sm hover:underline">Lihat Semua</a>
      </div>

      <div class="space-y-4">
        @forelse($recentNotulensi as $notulen)
          <a href="{{ route('admin.notulensi.show', $notulen) }}" class="flex gap-4 items-start hover:bg-himka-cream/30 p-2 -mx-2 rounded-xl transition-colors">
            <div class="w-12 h-12 rounded-lg bg-himka-accent/10 flex items-center justify-center shrink-0">
              <span class="material-icons text-himka-accent">description</span>
            </div>
            <div class="flex-1 min-w-0">
              <h4 class="font-medium text-himka-secondary truncate">{{ $notulen->title }}</h4>
              <p class="text-xs text-himka-secondary/50 mt-1">
                {{ $notulen->meeting_date->format('d M Y') }} • {{ $notulen->user->name }}
              </p>
            </div>
          </a>
        @empty
          <p class="text-himka-secondary/50 text-center py-4">Belum ada notulensi.</p>
        @endforelse
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  // Calendar Events Data
  const calendarEvents = @json($calendarEvents);
  
  // Activity Chart
  const ctx = document.getElementById('activityChart').getContext('2d');
  const monthlyData = @json($monthlyActivity);
  
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: monthlyData.map(d => d.month),
      datasets: [
        {
          label: 'Berita',
          data: monthlyData.map(d => d.articles),
          backgroundColor: 'rgba(59, 130, 246, 0.8)',
          borderRadius: 6,
        },
        {
          label: 'Kegiatan',
          data: monthlyData.map(d => d.kegiatan),
          backgroundColor: 'rgba(34, 197, 94, 0.8)',
          borderRadius: 6,
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'bottom',
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1
          }
        }
      }
    }
  });

  // Calendar Widget
  let currentDate = new Date();
  
  function renderCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    
    // Update month display
    const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    document.getElementById('currentMonth').textContent = `${monthNames[month]} ${year}`;
    
    // Get first day of month and total days
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const today = new Date();
    
    // Build calendar grid
    let html = '';
    
    // Empty cells for days before first day
    for (let i = 0; i < firstDay; i++) {
      html += '<div class="p-2"></div>';
    }
    
    // Days of month
    for (let day = 1; day <= daysInMonth; day++) {
      const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
      const hasEvent = calendarEvents.some(e => e.date === dateStr);
      const isToday = today.getDate() === day && today.getMonth() === month && today.getFullYear() === year;
      
      let classes = 'p-2 text-center text-sm rounded-lg cursor-pointer transition-colors ';
      if (isToday) {
        classes += 'bg-himka-accent text-white font-bold ';
      } else if (hasEvent) {
        classes += 'bg-himka-accent/20 text-himka-accent font-medium hover:bg-himka-accent hover:text-white ';
      } else {
        classes += 'hover:bg-himka-cream text-himka-secondary ';
      }
      
      html += `<div class="${classes}" data-date="${dateStr}">${day}${hasEvent ? '<span class="block w-1 h-1 bg-current rounded-full mx-auto mt-0.5"></span>' : ''}</div>`;
    }
    
    document.getElementById('calendarGrid').innerHTML = html;
  }
  
  document.getElementById('prevMonth').addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar();
  });
  
  document.getElementById('nextMonth').addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar();
  });
  
  renderCalendar();
</script>
@endpush
