@extends('layouts.admin')

@section('title', 'Rekap Notulensi')
@section('page-title', 'Notulensi')

@section('content')
  <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
      <h2 class="text-xl lg:text-2xl font-bold text-himka-secondary">Rekap Notulensi Rapat</h2>
      <p class="text-himka-secondary/60 text-sm">Dokumentasi hasil rapat HIMKA</p>
    </div>
    <a href="{{ route('admin.notulensi.create') }}" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2 transition-colors">
      <span class="material-icons text-sm">add</span> Buat Notulensi
    </a>
  </div>

  <!-- Search -->
  <div class="bg-white p-4 rounded-xl shadow-sm border border-himka-secondary/5 mb-6">
    <form action="" method="GET" class="flex gap-4">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari notulensi..."
        class="flex-1 px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
      <button type="submit" class="bg-himka-secondary text-white px-4 py-2 rounded-lg hover:bg-himka-secondary-dark transition-colors">
        <span class="material-icons text-sm">search</span>
      </button>
    </form>
  </div>

  <!-- List -->
  <div class="space-y-4">
    @forelse($notulensi as $item)
      <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 p-4 lg:p-6">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
          <div class="flex-1">
            <div class="flex items-center gap-2 mb-2">
              <span class="material-icons text-himka-accent">description</span>
              <h3 class="font-bold text-himka-secondary">{{ $item->title }}</h3>
            </div>
            <div class="flex flex-wrap gap-4 text-sm text-himka-secondary/60">
              <span class="flex items-center gap-1">
                <span class="material-icons text-sm">calendar_today</span>
                {{ $item->meeting_date->format('d M Y') }}
              </span>
              @if($item->location)
                <span class="flex items-center gap-1">
                  <span class="material-icons text-sm">location_on</span>
                  {{ $item->location }}
                </span>
              @endif
              <span class="flex items-center gap-1">
                <span class="material-icons text-sm">person</span>
                {{ $item->user->name }}
              </span>
            </div>
          </div>
          <div class="flex items-center gap-2">
            <a href="{{ route('admin.notulensi.show', $item) }}" class="p-2 text-himka-secondary hover:text-himka-accent transition-colors" title="Lihat">
              <span class="material-icons">visibility</span>
            </a>
            <a href="{{ route('admin.notulensi.edit', $item) }}" class="p-2 text-himka-secondary hover:text-himka-accent transition-colors" title="Edit">
              <span class="material-icons">edit</span>
            </a>
            <form action="{{ route('admin.notulensi.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
              @csrf @method('DELETE')
              <button type="submit" class="p-2 text-red-500 hover:text-red-700 transition-colors" title="Hapus">
                <span class="material-icons">delete</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    @empty
      <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 p-12 text-center">
        <span class="material-icons text-4xl text-himka-secondary/30 mb-2">description</span>
        <p class="text-himka-secondary/50">Belum ada notulensi rapat.</p>
      </div>
    @endforelse
  </div>

  @if($notulensi->hasPages())
    <div class="mt-6">
      {{ $notulensi->links() }}
    </div>
  @endif
@endsection
