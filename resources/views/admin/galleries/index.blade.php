@extends('layouts.admin')

@section('title', 'Kelola Galeri')
@section('page-title', 'Galeri')

@section('content')
  <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
      <h2 class="text-xl lg:text-2xl font-bold text-himka-secondary">Kelola Galeri</h2>
      <p class="text-himka-secondary/60 text-sm">Kelola foto dan dokumentasi HIMKA</p>
    </div>
    <a href="{{ route('admin.galleries.create') }}" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2 transition-colors">
      <span class="material-icons text-sm">add</span> Tambah Foto
    </a>
  </div>

  <!-- Grid Gallery -->
  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @forelse($galleries as $gallery)
      <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 overflow-hidden group">
        <div class="relative aspect-square">
          <img src="{{ Storage::url($gallery->image) }}" class="w-full h-full object-cover" alt="{{ $gallery->title }}">
          <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="p-2 bg-white rounded-full text-himka-secondary hover:text-himka-accent transition-colors">
              <span class="material-icons">edit</span>
            </a>
            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
              @csrf @method('DELETE')
              <button type="submit" class="p-2 bg-white rounded-full text-red-500 hover:text-red-700 transition-colors">
                <span class="material-icons">delete</span>
              </button>
            </form>
          </div>
          @if(!$gallery->is_active)
            <span class="absolute top-2 right-2 px-2 py-1 bg-yellow-500 text-white text-xs rounded-full">Hidden</span>
          @endif
        </div>
        <div class="p-3">
          <p class="font-medium text-himka-secondary text-sm truncate">{{ $gallery->title }}</p>
          <p class="text-xs text-himka-secondary/50">Order: {{ $gallery->sort_order }}</p>
        </div>
      </div>
    @empty
      <div class="col-span-full py-12 text-center text-himka-secondary/50">
        <span class="material-icons text-4xl mb-2">collections</span>
        <p>Belum ada foto di galeri.</p>
      </div>
    @endforelse
  </div>

  @if($galleries->hasPages())
    <div class="mt-6">
      {{ $galleries->links() }}
    </div>
  @endif
@endsection
