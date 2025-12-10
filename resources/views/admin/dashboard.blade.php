@extends('layouts.admin')

@section('content')
  <div class="mb-8 flex justify-between items-end">
    <div>
      <h1 class="text-2xl font-bold text-himka-purple mb-1">Overview Dashboard</h1>
      <p class="text-himka-purple/60 text-sm">Welcome back, Admin! Here's what's happening today.</p>
    </div>
    <button
      class="bg-himka-red hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-bold flex items-center gap-2 transition-colors">
      <span class="material-icons text-sm">add</span> New Post
    </button>
  </div>

  <!-- Stats Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-himka-purple/5 flex items-center gap-4">
      <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-500">
        <span class="material-icons">visibility</span>
      </div>
      <div>
        <p class="text-himka-purple/50 text-xs uppercase font-bold tracking-wide">Total Visits</p>
        <h3 class="text-2xl font-bold text-himka-purple">24.5k</h3>
      </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-himka-purple/5 flex items-center gap-4">
      <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center text-green-500">
        <span class="material-icons">article</span>
      </div>
      <div>
        <p class="text-himka-purple/50 text-xs uppercase font-bold tracking-wide">Articles</p>
        <h3 class="text-2xl font-bold text-himka-purple">128</h3>
      </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-himka-purple/5 flex items-center gap-4">
      <div class="w-12 h-12 rounded-full bg-purple-50 flex items-center justify-center text-purple-500">
        <span class="material-icons">collections</span>
      </div>
      <div>
        <p class="text-himka-purple/50 text-xs uppercase font-bold tracking-wide">Gallery</p>
        <h3 class="text-2xl font-bold text-himka-purple">432</h3>
      </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-himka-purple/5 flex items-center gap-4">
      <div class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center text-orange-500">
        <span class="material-icons">message</span>
      </div>
      <div>
        <p class="text-himka-purple/50 text-xs uppercase font-bold tracking-wide">Messages</p>
        <h3 class="text-2xl font-bold text-himka-purple">12</h3>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Chart Section -->
    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-himka-purple/5">
      <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-lg text-himka-purple">Visitor Statistics</h3>
        <select class="bg-himka-cream border-none text-sm text-himka-purple rounded-lg px-3 py-1 outline-none">
          <option>Last 7 Days</option>
          <option>Last Month</option>
        </select>
      </div>
      <div class="h-80 relative w-full">
        <canvas id="visitorsChart"></canvas>
      </div>
    </div>

    <!-- Notifications Section -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-himka-purple/5">
      <h3 class="font-bold text-lg text-himka-purple mb-6">Recent Activities</h3>

      <div class="space-y-6">
        <div class="flex gap-4">
          <img src="{{ asset('assets/img/notif1.jpg') }}" class="w-10 h-10 rounded-full object-cover" alt="User">
          <div>
            <p class="text-sm font-bold text-himka-purple">Sarah Putri</p>
            <p class="text-xs text-himka-purple/60 mb-1">submitted a new article proposal.</p>
            <span class="text-[10px] text-himka-purple/40">2 mins ago</span>
          </div>
        </div>

        <div class="flex gap-4">
          <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
            <span class="material-icons text-blue-500 text-sm">upload</span>
          </div>
          <div>
            <p class="text-sm font-bold text-himka-purple">New Gallery Upload</p>
            <p class="text-xs text-himka-purple/60 mb-1">5 new photos added to 'Kegiatan Sosial'</p>
            <span class="text-[10px] text-himka-purple/40">1 hour ago</span>
          </div>
        </div>

        <div class="flex gap-4">
          <img src="{{ asset('assets/img/notif2.jpg') }}" class="w-10 h-10 rounded-full object-cover" alt="User">
          <div>
            <p class="text-sm font-bold text-himka-purple">Budi Santoso</p>
            <p class="text-xs text-himka-purple/60 mb-1">sent a new message via Contact Form.</p>
            <span class="text-[10px] text-himka-purple/40">3 hours ago</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const ctx = document.getElementById('visitorsChart').getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
          datasets: [{
            label: 'Visitors',
            data: [65, 59, 80, 81, 56, 55, 40],
            borderColor: '#2F2F70',
            backgroundColor: 'rgba(47, 47, 112, 0.1)',
            tension: 0.4,
            fill: true
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              grid: {
                display: false
              }
            },
            x: {
              grid: {
                display: false
              }
            }
          }
        }
      });
    });
  </script>
@endsection