@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
  <div>
    <h1 class="text-2xl font-bold text-himka-secondary">Kategori</h1>
    <p class="text-himka-secondary/60 text-sm mt-1">Kelola kategori artikel</p>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
  <!-- Add Category Form -->
  <div class="bg-white rounded-2xl shadow-sm p-6">
    <h2 class="text-lg font-bold text-himka-secondary mb-4">Tambah Kategori</h2>
    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block text-sm font-medium text-himka-secondary mb-2">Nama Kategori</label>
        <input type="text" name="name" required
          class="w-full px-4 py-3 border border-himka-secondary/20 rounded-xl focus:ring-2 focus:ring-himka-accent">
      </div>
      <input type="hidden" name="type" value="article">
      <button type="submit" class="w-full bg-himka-accent text-white font-bold py-3 rounded-xl hover:bg-himka-accent-dark">
        Tambah Kategori
      </button>
    </form>
  </div>


  <!-- Categories List -->
  <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="bg-himka-cream">
          <tr>
            <th class="px-6 py-4 text-left text-xs font-bold text-himka-secondary uppercase">Nama</th>
            <th class="px-6 py-4 text-left text-xs font-bold text-himka-secondary uppercase">Slug</th>
            <th class="px-6 py-4 text-left text-xs font-bold text-himka-secondary uppercase">Artikel</th>
            <th class="px-6 py-4 text-right text-xs font-bold text-himka-secondary uppercase">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-himka-cream">
          @forelse($categories as $category)
            <tr class="hover:bg-himka-cream/50 transition-colors">
              <td class="px-6 py-4">
                <span class="font-medium text-himka-secondary">{{ $category->name }}</span>
              </td>
              <td class="px-6 py-4 text-himka-secondary/70 text-sm">{{ $category->slug }}</td>
              <td class="px-6 py-4">
                <span class="px-2 py-1 bg-himka-cream text-himka-secondary text-xs rounded-full">
                  {{ $category->articles_count ?? 0 }} artikel
                </span>
              </td>
              <td class="px-6 py-4 text-right">
                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline"
                  onsubmit="return confirm('Hapus kategori ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500 hover:text-red-700">
                    <span class="material-icons text-lg">delete</span>
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="px-6 py-12 text-center text-himka-secondary/60">
                Belum ada kategori
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection