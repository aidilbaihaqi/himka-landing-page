@extends('layouts.admin')

@section('title', 'Buat Notulensi')
@section('page-title', 'Buat Notulensi')

@section('content')
  <div class="max-w-4xl">
    <div class="mb-6">
      <a href="{{ route('admin.notulensi.index') }}" class="text-himka-secondary/60 hover:text-himka-secondary flex items-center gap-1 text-sm">
        <span class="material-icons text-lg">arrow_back</span> Kembali
      </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 p-6">
      <h2 class="text-xl font-bold text-himka-secondary mb-6">Buat Notulensi Rapat</h2>

      <form action="{{ route('admin.notulensi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-6">
          <!-- Judul Rapat -->
          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Judul Rapat <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title') }}" required maxlength="255"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            <p class="text-xs text-himka-secondary/50 mt-1">Judul singkat dan jelas untuk rapat. Maksimal 255 karakter.</p>
          </div>

          <!-- Tanggal, Waktu, Lokasi -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Tanggal <span class="text-red-500">*</span></label>
              <input type="date" name="meeting_date" value="{{ old('meeting_date', date('Y-m-d')) }}" required
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
              <p class="text-xs text-himka-secondary/50 mt-1">Tanggal pelaksanaan rapat.</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Waktu</label>
              <input type="time" name="meeting_time" value="{{ old('meeting_time') }}"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
              <p class="text-xs text-himka-secondary/50 mt-1">Waktu mulai rapat (opsional).</p>
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Lokasi</label>
              <input type="text" name="location" value="{{ old('location') }}" maxlength="255"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
              <p class="text-xs text-himka-secondary/50 mt-1">Tempat rapat dilaksanakan.</p>
            </div>
          </div>

          <!-- Peserta Rapat -->
          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Peserta Rapat</label>
            <div class="border border-himka-secondary/20 rounded-lg p-4 bg-himka-cream/30">
              <!-- Select All -->
              <div class="flex items-center justify-between mb-3 pb-3 border-b border-himka-secondary/10">
                <label class="flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" id="selectAllAttendees" class="w-4 h-4 text-himka-accent rounded border-himka-secondary/30 focus:ring-himka-accent">
                  <span class="text-sm font-medium text-himka-secondary">Pilih Semua Pengurus Aktif</span>
                </label>
                <span class="text-xs text-himka-secondary/50" id="selectedCount">0 dipilih</span>
              </div>
              
              <!-- Pengurus List -->
              @if($pengurusAktif->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 max-h-60 overflow-y-auto">
                  @foreach($pengurusAktif as $p)
                    <label class="flex items-center gap-3 p-2 rounded-lg hover:bg-white cursor-pointer transition-colors">
                      <input type="checkbox" name="attendees_list[]" value="{{ $p->user->name }} ({{ $p->jabatan }})" 
                        class="attendee-checkbox w-4 h-4 text-himka-accent rounded border-himka-secondary/30 focus:ring-himka-accent"
                        {{ in_array($p->user->name . ' (' . $p->jabatan . ')', old('attendees_list', [])) ? 'checked' : '' }}>
                      <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-himka-secondary truncate">{{ $p->user->name }}</p>
                        <p class="text-xs text-himka-secondary/60">{{ $p->jabatan }} - {{ $p->divisi }}</p>
                      </div>
                    </label>
                  @endforeach
                </div>
              @else
                <p class="text-sm text-himka-secondary/50 text-center py-4">Belum ada pengurus aktif.</p>
              @endif
              
              <!-- Manual Input -->
              <div class="mt-3 pt-3 border-t border-himka-secondary/10">
                <label class="block text-xs font-medium text-himka-secondary/70 mb-1">Peserta Tambahan (opsional)</label>
                <input type="text" name="attendees_extra" value="{{ old('attendees_extra') }}" 
                  placeholder="Nama peserta lain yang tidak terdaftar, pisahkan dengan koma"
                  class="w-full px-3 py-2 text-sm border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
              </div>
            </div>
            <p class="text-xs text-himka-secondary/50 mt-1">Pilih pengurus yang hadir dalam rapat. Bisa juga menambahkan peserta lain secara manual.</p>
          </div>

          <!-- Agenda -->
          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Agenda <span class="text-red-500">*</span></label>
            <textarea name="agenda" rows="4" required placeholder="Agenda rapat..."
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('agenda') }}</textarea>
            <p class="text-xs text-himka-secondary/50 mt-1">Daftar topik atau hal yang akan dibahas dalam rapat. Gunakan format list untuk memudahkan pembacaan.</p>
          </div>

          <!-- Pembahasan -->
          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Pembahasan</label>
            <textarea name="discussion" rows="6" placeholder="Isi pembahasan rapat..."
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('discussion') }}</textarea>
            <p class="text-xs text-himka-secondary/50 mt-1">Catatan detail mengenai diskusi yang terjadi selama rapat berlangsung.</p>
          </div>

          <!-- Keputusan -->
          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Keputusan</label>
            <textarea name="decisions" rows="4" placeholder="Keputusan yang diambil..."
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('decisions') }}</textarea>
            <p class="text-xs text-himka-secondary/50 mt-1">Hasil keputusan yang disepakati bersama dalam rapat.</p>
          </div>

          <!-- Action Items -->
          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Action Items</label>
            <textarea name="action_items" rows="4" placeholder="Tindak lanjut yang harus dilakukan..."
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('action_items') }}</textarea>
            <p class="text-xs text-himka-secondary/50 mt-1">Daftar tugas atau tindak lanjut yang harus dilakukan setelah rapat, beserta penanggung jawabnya.</p>
          </div>

          <!-- Lampiran -->
          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Lampiran</label>
            <input type="file" name="attachment"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            <p class="text-xs text-himka-secondary/50 mt-1">Maksimal 5MB. Format yang didukung: PDF, DOC, DOCX, XLS, XLSX. Bisa berupa dokumen pendukung atau materi rapat.</p>
          </div>
        </div>

        <div class="flex gap-4 mt-8">
          <button type="submit" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-6 py-2 rounded-lg font-bold transition-colors">
            Simpan
          </button>
          <a href="{{ route('admin.notulensi.index') }}" class="bg-himka-cream hover:bg-himka-cream-dark text-himka-secondary px-6 py-2 rounded-lg font-bold transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const selectAll = document.getElementById('selectAllAttendees');
      const checkboxes = document.querySelectorAll('.attendee-checkbox');
      const selectedCount = document.getElementById('selectedCount');

      function updateCount() {
        const checked = document.querySelectorAll('.attendee-checkbox:checked').length;
        selectedCount.textContent = checked + ' dipilih';
      }

      selectAll.addEventListener('change', function() {
        checkboxes.forEach(cb => cb.checked = this.checked);
        updateCount();
      });

      checkboxes.forEach(cb => {
        cb.addEventListener('change', function() {
          selectAll.checked = document.querySelectorAll('.attendee-checkbox:checked').length === checkboxes.length;
          updateCount();
        });
      });

      // Initial count
      updateCount();
    });
  </script>
@endsection
