@extends('layouts.admin')

@section('title', 'Tambah Berita')
@section('page-title', 'Tambah Berita')

@push('styles')
<style>
  .ql-editor { min-height: 300px; font-size: 14px; }
  .ql-toolbar { border-radius: 8px 8px 0 0; border-color: rgba(var(--color-himka-secondary), 0.2); }
  .ql-container { border-radius: 0 0 8px 8px; border-color: rgba(var(--color-himka-secondary), 0.2); }
</style>
@endpush

@section('content')
  <div class="max-w-4xl">
    <div class="mb-6">
      <a href="{{ route('admin.articles.index') }}" class="text-himka-secondary/60 hover:text-himka-secondary flex items-center gap-1 text-sm">
        <span class="material-icons text-lg">arrow_back</span> Kembali
      </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 p-6">
      <h2 class="text-xl font-bold text-himka-secondary mb-6">Tambah Berita Baru</h2>

      <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" id="articleForm">
        @csrf

        <div class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Judul Berita <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title') }}" required maxlength="255"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('title') border-red-500 @enderror">
            @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Maksimal 255 karakter. Gunakan judul yang menarik dan informatif.</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Kategori</label>
            <select name="category_id" class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('category_id') border-red-500 @enderror">
              <option value="">Pilih Kategori</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
            @error('category_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Pilih kategori untuk mengelompokkan berita. Opsional.</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Excerpt (Ringkasan)</label>
            <textarea name="excerpt" rows="2" maxlength="500"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent @error('excerpt') border-red-500 @enderror">{{ old('excerpt') }}</textarea>
            @error('excerpt')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Maksimal 500 karakter. Ringkasan singkat yang akan ditampilkan di daftar berita dan preview.</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Konten Berita <span class="text-red-500">*</span></label>
            <div id="editor-container">
              <div id="editor">{!! old('content') !!}</div>
            </div>
            <input type="hidden" name="content" id="content-input">
            @error('content')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Gunakan toolbar untuk memformat teks: Bold, Italic, Underline, List, Link, dll.</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Gambar Cover</label>
            <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-himka-secondary/10 file:text-himka-secondary file:font-medium hover:file:bg-himka-secondary/20 @error('image') border-red-500 @enderror">
            @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            <p class="text-xs text-himka-secondary/50 mt-1">Format: JPG, JPEG, PNG, GIF, WEBP. Maksimal 2MB. Rekomendasi: 1200x630px (rasio 16:9).</p>
          </div>

          <div class="bg-himka-cream/50 p-4 rounded-lg space-y-4">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-3">Opsi Tampilan</label>
              <label class="flex items-start gap-3 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                  class="w-4 h-4 mt-0.5 text-himka-accent border-himka-secondary/20 rounded focus:ring-himka-accent">
                <div>
                  <span class="text-sm font-medium text-himka-secondary">Featured (Unggulan)</span>
                  <p class="text-xs text-himka-secondary/50">Berita akan ditampilkan di bagian utama/highlight dengan label "FEATURED".</p>
                </div>
              </label>
            </div>

            <div class="border-t border-himka-secondary/10 pt-4">
              <label class="block text-sm font-medium text-himka-secondary mb-3">Status Publikasi <span class="text-red-500">*</span></label>
              <div class="space-y-3">
                <label class="flex items-start gap-3 cursor-pointer">
                  <input type="radio" name="is_published" value="0" {{ old('is_published', '0') == '0' ? 'checked' : '' }}
                    class="w-4 h-4 mt-0.5 text-himka-accent border-himka-secondary/20 focus:ring-himka-accent">
                  <div>
                    <span class="text-sm font-medium text-himka-secondary">Draft</span>
                    <p class="text-xs text-himka-secondary/50">Berita disimpan sebagai draft dan tidak akan ditampilkan di website publik.</p>
                  </div>
                </label>
                <label class="flex items-start gap-3 cursor-pointer">
                  <input type="radio" name="is_published" value="1" {{ old('is_published') == '1' ? 'checked' : '' }}
                    class="w-4 h-4 mt-0.5 text-himka-accent border-himka-secondary/20 focus:ring-himka-accent">
                  <div>
                    <span class="text-sm font-medium text-himka-secondary">Publish</span>
                    <p class="text-xs text-himka-secondary/50">Berita langsung dipublikasikan dan dapat dilihat oleh semua pengunjung website.</p>
                  </div>
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="flex gap-4 mt-8">
          <button type="submit" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-6 py-2 rounded-lg font-bold transition-colors flex items-center gap-2">
            <span class="material-icons text-lg">save</span> Simpan
          </button>
          <a href="{{ route('admin.articles.index') }}" class="bg-himka-cream hover:bg-himka-cream-dark text-himka-secondary px-6 py-2 rounded-lg font-bold transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  var quill = new Quill('#editor', {
    theme: 'snow',
    placeholder: 'Tulis konten berita di sini...',
    modules: {
      toolbar: [
        [{ 'header': [1, 2, 3, false] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'align': [] }],
        ['link', 'blockquote'],
        ['clean']
      ]
    }
  });

  // Sync content to hidden input before submit
  document.getElementById('articleForm').addEventListener('submit', function() {
    document.getElementById('content-input').value = quill.root.innerHTML;
  });
</script>
@endpush
