@extends('layouts.admin')

@section('title', 'Inbox Notifikasi')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
  <div>
    <h1 class="text-2xl font-bold text-himka-secondary">Inbox Notifikasi</h1>
    <p class="text-himka-secondary/60 text-sm mt-1">Notifikasi terbaru untuk Anda</p>
  </div>
  @if(auth()->user()->unreadNotifications->count() > 0)
    <form action="{{ route('admin.notifications.read-all') }}" method="POST">
      @csrf
      <button type="submit" class="px-4 py-2 bg-himka-secondary text-white rounded-xl hover:bg-himka-secondary-dark transition-colors text-sm font-medium">
        <span class="material-icons text-sm align-middle mr-1">done_all</span>
        Tandai Semua Dibaca
      </button>
    </form>
  @endif
</div>

<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
  @forelse($notifications as $notification)
    <div class="p-4 border-b border-himka-cream last:border-b-0 {{ $notification->read_at ? 'bg-white' : 'bg-himka-accent/5' }}">
      <div class="flex items-start gap-4">
        <div class="w-10 h-10 rounded-full {{ $notification->read_at ? 'bg-himka-cream' : 'bg-himka-accent' }} flex items-center justify-center flex-shrink-0">
          <span class="material-icons {{ $notification->read_at ? 'text-himka-secondary/50' : 'text-white' }}">description</span>
        </div>
        <div class="flex-1 min-w-0">
          <div class="flex items-start justify-between gap-4">
            <div>
              <h3 class="font-medium text-himka-secondary {{ !$notification->read_at ? 'font-bold' : '' }}">
                {{ $notification->data['title'] ?? 'Notifikasi Baru' }}
              </h3>
              <p class="text-sm text-himka-secondary/70 mt-1">{{ $notification->data['message'] ?? '' }}</p>
              <p class="text-xs text-himka-secondary/50 mt-2">{{ $notification->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex items-center gap-2">
              @if(isset($notification->data['notulensi_id']))
                <a href="{{ route('admin.notulensi.show', $notification->data['notulensi_id']) }}"
                  class="text-himka-accent hover:text-himka-secondary text-sm font-medium">
                  Lihat
                </a>
              @endif
              @if(!$notification->read_at)
                <form action="{{ route('admin.notifications.read', $notification->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="text-himka-secondary/50 hover:text-himka-accent" title="Tandai dibaca">
                    <span class="material-icons text-lg">check_circle</span>
                  </button>
                </form>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  @empty
    <div class="p-12 text-center">
      <span class="material-icons text-6xl text-himka-secondary/20 mb-4">notifications_none</span>
      <h3 class="text-lg font-medium text-himka-secondary mb-2">Tidak ada notifikasi</h3>
      <p class="text-himka-secondary/60 text-sm">Notifikasi baru akan muncul di sini</p>
    </div>
  @endforelse
</div>

@if($notifications->hasPages())
  <div class="mt-6">
    {{ $notifications->links() }}
  </div>
@endif
@endsection
