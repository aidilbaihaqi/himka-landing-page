@extends('layouts.admin')

@section('title', 'Edit Notulensi')
@section('page-title', 'Edit Notulensi')

@section('content')
  <div class="max-w-4xl">
    <div class="mb-6">
      <a href="{{ route('admin.notulensi.index') }}" class="text-himka-secondary/60 hover:text-himka-secondary flex items-center gap-1 text-sm">
        <span class="material-icons text-lg">arrow_back</span> Kembali
      </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 p-6">
      <h2 class="text-xl font-bold text-himka-secondary mb-6">Edit Notulensi</h2>

      <form action="{{ route('admin.notulensi.update', $notulensi) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Judul Rapat <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title', $notulensi->title) }}" required
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Tanggal <span class="text-red-500">*</span></label>
              <input type="date" name="meeting_date" value="{{ old('meeting_date', $notulensi->meeting_date->format('Y-m-d')) }}" required
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Waktu</label>
              <input type="time" name="meeting_time" value="{{ old('meeting_time', $notulensi->meeting_time) }}"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
            <div>
              <label class="block text-sm font-medium text-himka-secondary mb-2">Lokasi</label>
              <input type="text" name="location" value="{{ old('location', $notulensi->location) }}"
                class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Peserta Rapat</label>
            <textarea name="attendees" rows="2"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('attendees', $notulensi->attendees) }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Agenda <span class="text-red-500">*</span></label>
            <textarea name="agenda" rows="4" required
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('agenda', $notulensi->agenda) }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Pembahasan</label>
            <textarea name="discussion" rows="6"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('discussion', $notulensi->discussion) }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Keputusan</label>
            <textarea name="decisions" rows="4"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('decisions', $notulensi->decisions) }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Action Items</label>
            <textarea name="action_items" rows="4"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">{{ old('action_items', $notulensi->action_items) }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-himka-secondary mb-2">Lampiran</label>
            @if($notulensi->attachment)
              <p class="text-sm text-himka-secondary/60 mb-2">File saat ini: <a href="{{ Storage::url($notulensi->attachment) }}" target="_blank" class="text-himka-accent hover:underline">Download</a></p>
            @endif
            <input type="file" name="attachment"
              class="w-full px-4 py-2 border border-himka-secondary/20 rounded-lg focus:outline-none focus:border-himka-accent">
          </div>
        </div>

        <div class="flex gap-4 mt-8">
          <button type="submit" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-6 py-2 rounded-lg font-bold transition-colors">
            Update
          </button>
          <a href="{{ route('admin.notulensi.index') }}" class="bg-himka-cream hover:bg-himka-cream-dark text-himka-secondary px-6 py-2 rounded-lg font-bold transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
