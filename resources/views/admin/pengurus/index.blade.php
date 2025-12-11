@extends('layouts.admin')

@section('title', 'Kelola Pengurus')
@section('page-title', 'Pengurus')

@section('content')
  <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
      <h2 class="text-xl lg:text-2xl font-bold text-himka-secondary">Kelola Pengurus</h2>
      <p class="text-himka-secondary/60 text-sm">Kelola data pengurus HIMKA</p>
    </div>
    <a href="{{ route('admin.pengurus.create') }}" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2 transition-colors">
      <span class="material-icons text-sm">add</span> Tambah Pengurus
    </a>
  </div>

  <!-- Filters -->
  <div class="bg-white p-4 rounded-xl shadow-sm border border-himka-secondary/5 mb-6">
    <form action="" method="GET" class="flex flex-col sm:flex-row gap-4">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama..."
        class="flex-1 px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
      <select name="divisi" class="px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
        <option value="">Semua Divisi</option>
        @foreach($divisiList as $divisi)
          <option value="{{ $divisi }}" {{ request('divisi') == $divisi ? 'selected' : '' }}>{{ $divisi }}</option>
        @endforeach
      </select>
      <button type="submit" class="bg-himka-secondary text-white px-4 py-2 rounded-lg hover:bg-himka-secondary-dark transition-colors">
        <span class="material-icons text-sm">search</span>
      </button>
    </form>
  </div>

  <!-- Table -->
  <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="bg-himka-cream">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-bold text-himka-secondary uppercase">Nama</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-himka-secondary uppercase hidden md:table-cell">Jabatan</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-himka-secondary uppercase hidden lg:table-cell">Divisi</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-himka-secondary uppercase hidden lg:table-cell">Periode</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-himka-secondary uppercase hidden lg:table-cell">Status</th>
            <th class="px-4 py-3 text-right text-xs font-bold text-himka-secondary uppercase">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-himka-secondary/5">
          @forelse($pengurus as $item)
            <tr class="hover:bg-himka-cream/50">
              <td class="px-4 py-3">
                <div class="flex items-center gap-3">
                  @if($item->photo)
                    <img src="{{ Storage::url($item->photo) }}" class="w-10 h-10 rounded-full object-cover" alt="">
                  @else
                    <div class="w-10 h-10 rounded-full bg-himka-accent flex items-center justify-center text-white font-bold">
                      {{ substr($item->user->name, 0, 1) }}
                    </div>
                  @endif
                  <div>
                    <p class="font-medium text-himka-secondary">{{ $item->user->name }}</p>
                    <p class="text-xs text-himka-secondary/50">{{ $item->nim }}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm text-himka-secondary hidden md:table-cell">{{ $item->jabatan }}</td>
              <td class="px-4 py-3 text-sm text-himka-secondary/70 hidden lg:table-cell">{{ $item->divisi ?? '-' }}</td>
              <td class="px-4 py-3 text-sm text-himka-secondary/70 hidden lg:table-cell">{{ $item->periode }}</td>
              <td class="px-4 py-3 hidden lg:table-cell">
                @if($item->is_active)
                  <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Aktif</span>
                @else
                  <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Nonaktif</span>
                @endif
              </td>
              <td class="px-4 py-3 text-right">
                <div class="flex items-center justify-end gap-1">
                  <form action="{{ route('admin.pengurus.reset-password', $item) }}" method="POST" onsubmit="return confirm('Reset password ke default?')">
                    @csrf
                    <button type="submit" class="p-2 text-himka-secondary hover:text-himka-accent transition-colors" title="Reset Password">
                      <span class="material-icons text-lg">lock_reset</span>
                    </button>
                  </form>
                  <a href="{{ route('admin.pengurus.edit', $item) }}" class="p-2 text-himka-secondary hover:text-himka-accent transition-colors">
                    <span class="material-icons text-lg">edit</span>
                  </a>
                  <form action="{{ route('admin.pengurus.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="p-2 text-red-500 hover:text-red-700 transition-colors">
                      <span class="material-icons text-lg">delete</span>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="px-4 py-8 text-center text-himka-secondary/50">Belum ada data pengurus.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if($pengurus->hasPages())
      <div class="px-4 py-3 border-t border-himka-secondary/5">
        {{ $pengurus->links() }}
      </div>
    @endif
  </div>
@endsection
