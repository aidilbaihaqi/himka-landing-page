@extends('layouts.admin')

@section('title', 'Detail Notulensi')
@section('page-title', 'Detail Notulensi')

@section('content')
  <div class="max-w-4xl">
    <div class="mb-6 flex justify-between items-center">
      <a href="{{ route('admin.notulensi.index') }}" class="text-himka-secondary/60 hover:text-himka-secondary flex items-center gap-1 text-sm">
        <span class="material-icons text-lg">arrow_back</span> Kembali
      </a>
      <a href="{{ route('admin.notulensi.edit', $notulensi) }}" class="bg-himka-accent hover:bg-himka-accent-dark text-white px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2 transition-colors">
        <span class="material-icons text-sm">edit</span> Edit
      </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-himka-secondary/5 p-6">
      <h1 class="text-2xl font-bold text-himka-secondary mb-4">{{ $notulensi->title }}</h1>

      <div class="flex flex-wrap gap-4 text-sm text-himka-secondary/60 mb-8 pb-6 border-b border-himka-secondary/10">
        <span class="flex items-center gap-1">
          <span class="material-icons text-sm">calendar_today</span>
          {{ $notulensi->meeting_date->format('d F Y') }}
        </span>
        @if($notulensi->meeting_time)
          <span class="flex items-center gap-1">
            <span class="material-icons text-sm">schedule</span>
            {{ $notulensi->meeting_time }}
          </span>
        @endif
        @if($notulensi->location)
          <span class="flex items-center gap-1">
            <span class="material-icons text-sm">location_on</span>
            {{ $notulensi->location }}
          </span>
        @endif
        <span class="flex items-center gap-1">
          <span class="material-icons text-sm">person</span>
          {{ $notulensi->user->name }}
        </span>
      </div>

      <div class="space-y-6">
        @if($notulensi->attendees)
          <div>
            <h3 class="font-bold text-himka-secondary mb-2 flex items-center gap-2">
              <span class="material-icons text-himka-accent">groups</span> Peserta Rapat
            </h3>
            <div class="bg-himka-cream/50 p-4 rounded-lg text-himka-secondary/80 whitespace-pre-line">{{ $notulensi->attendees }}</div>
          </div>
        @endif

        <div>
          <h3 class="font-bold text-himka-secondary mb-2 flex items-center gap-2">
            <span class="material-icons text-himka-accent">list</span> Agenda
          </h3>
          <div class="bg-himka-cream/50 p-4 rounded-lg text-himka-secondary/80 whitespace-pre-line">{{ $notulensi->agenda }}</div>
        </div>

        @if($notulensi->discussion)
          <div>
            <h3 class="font-bold text-himka-secondary mb-2 flex items-center gap-2">
              <span class="material-icons text-himka-accent">forum</span> Pembahasan
            </h3>
            <div class="bg-himka-cream/50 p-4 rounded-lg text-himka-secondary/80 whitespace-pre-line">{{ $notulensi->discussion }}</div>
          </div>
        @endif

        @if($notulensi->decisions)
          <div>
            <h3 class="font-bold text-himka-secondary mb-2 flex items-center gap-2">
              <span class="material-icons text-himka-accent">gavel</span> Keputusan
            </h3>
            <div class="bg-himka-cream/50 p-4 rounded-lg text-himka-secondary/80 whitespace-pre-line">{{ $notulensi->decisions }}</div>
          </div>
        @endif

        @if($notulensi->action_items)
          <div>
            <h3 class="font-bold text-himka-secondary mb-2 flex items-center gap-2">
              <span class="material-icons text-himka-accent">task_alt</span> Action Items
            </h3>
            <div class="bg-himka-cream/50 p-4 rounded-lg text-himka-secondary/80 whitespace-pre-line">{{ $notulensi->action_items }}</div>
          </div>
        @endif

        @if($notulensi->attachment)
          <div>
            <h3 class="font-bold text-himka-secondary mb-2 flex items-center gap-2">
              <span class="material-icons text-himka-accent">attach_file</span> Lampiran
            </h3>
            <a href="{{ Storage::url($notulensi->attachment) }}" target="_blank"
              class="inline-flex items-center gap-2 bg-himka-secondary text-white px-4 py-2 rounded-lg hover:bg-himka-secondary-dark transition-colors">
              <span class="material-icons">download</span> Download Lampiran
            </a>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection
