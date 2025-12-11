@extends('layouts.app')

@section('content')
  <div class="min-h-screen flex relative overflow-hidden bg-himka-cream">
    <!-- Decorative Background -->
    <div class="absolute inset-0 z-0">
      <div
        class="absolute top-0 right-0 w-[600px] h-[600px] bg-gradient-to-br from-himka-secondary/20 to-himka-accent/20 rounded-full blur-[120px] translate-x-1/3 -translate-y-1/3 pointer-events-none">
      </div>
      <div
        class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-gradient-to-tr from-blue-500/20 to-purple-500/20 rounded-full blur-[100px] -translate-x-1/3 translate-y-1/3 pointer-events-none">
      </div>

      <!-- Floating Elements -->
      <span class="material-icons absolute top-20 left-20 text-himka-secondary/5 text-6xl animate-float">science</span>
      <span
        class="material-icons absolute bottom-40 right-40 text-himka-accent/5 text-8xl animate-float-delayed">biotech</span>
    </div>

    <div class="flex-1 flex items-center justify-center p-4 relative z-10 pt-20"> <!-- Added pt-20 for navbar space -->
      <div
        class="bg-white/60 backdrop-blur-xl border border-white/40 shadow-2xl rounded-[2.5rem] p-4 flex w-full max-w-5xl overflow-hidden min-h-[600px]"
        data-aos="zoom-in">

        <!-- Left Side: Image/Branding -->
        <div
          class="hidden lg:flex w-1/2 bg-himka-secondary relative rounded-3xl overflow-hidden flex-col items-center justify-center text-center p-12 text-white group">
          <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
          </div>
          <div
            class="absolute inset-0 bg-gradient-to-br from-himka-secondary via-himka-secondary to-himka-secondary-dark opacity-90">
          </div>

          <div class="relative z-10 transform group-hover:scale-105 transition-transform duration-700">
            <img src="{{ asset('assets/img/logo.png') }}" alt="HIMKA"
              class="h-32 w-auto mb-8 drop-shadow-2xl animate-float">
            <h2 class="text-3xl font-serif font-bold mb-4">HIMKA UMRAH</h2>
            <p class="text-white/80 font-light text-sm leading-relaxed max-w-xs mx-auto">
              Selamat datang kembali di Dashboard Administrator. Silakan login untuk mengelola konten dan anggota.
            </p>
          </div>

          <!-- Animated Circles -->
          <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-himka-accent/30 rounded-full blur-2xl animate-pulse">
          </div>
          <div class="absolute top-10 right-10 w-20 h-20 bg-white/10 rounded-full blur-xl animate-bounce"></div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full lg:w-1/2 p-8 md:p-12 flex flex-col justify-center">
          <div class="text-center lg:text-left mb-10">
            <h1 class="text-3xl font-serif font-bold text-himka-secondary mb-2">Welcome Back!</h1>
            <p class="text-himka-secondary/60">Masukan kredensial Anda untuk melanjutkan.</p>
          </div>

          @if($errors->any())
            <div
              class="mb-6 p-4 bg-red-50 border border-red-100 text-red-600 rounded-2xl text-sm flex items-center gap-3 animate-slide-up">
              <span class="material-icons text-red-500">error_outline</span>
              {{ $errors->first() }}
            </div>
          @endif

          <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div class="group">
              <label for="email" class="block text-sm font-bold text-himka-secondary mb-2 ml-1">Email Address</label>
              <div class="relative">
                <span
                  class="material-icons absolute left-4 top-1/2 -translate-y-1/2 text-himka-secondary/40 group-focus-within:text-himka-accent transition-colors">email</span>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                  class="w-full pl-12 pr-4 py-4 bg-white border border-himka-secondary/10 rounded-2xl focus:ring-4 focus:ring-himka-accent/10 focus:border-himka-accent transition-all outline-none text-himka-secondary placeholder-himka-secondary/30"
                  placeholder="name@example.com">
              </div>
            </div>

            <div class="group">
              <label for="password" class="block text-sm font-bold text-himka-secondary mb-2 ml-1">Password</label>
              <div class="relative">
                <span
                  class="material-icons absolute left-4 top-1/2 -translate-y-1/2 text-himka-secondary/40 group-focus-within:text-himka-accent transition-colors">lock</span>
                <input type="password" name="password" id="password" required
                  class="w-full pl-12 pr-4 py-4 bg-white border border-himka-secondary/10 rounded-2xl focus:ring-4 focus:ring-himka-accent/10 focus:border-himka-accent transition-all outline-none text-himka-secondary placeholder-himka-secondary/30"
                  placeholder="••••••••">
              </div>
            </div>

            <div class="flex items-center justify-between ml-1">
              <label class="flex items-center gap-2 cursor-pointer group">
                <div class="relative flex items-center">
                  <input type="checkbox" name="remember" class="peer sr-only">
                  <div
                    class="w-5 h-5 border-2 border-himka-secondary/30 rounded peer-checked:bg-himka-accent peer-checked:border-himka-accent transition-all">
                  </div>
                  <span
                    class="material-icons text-white text-xs absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 opacity-0 peer-checked:opacity-100 transition-opacity pointer-events-none">check</span>
                </div>
                <span class="text-sm text-himka-secondary/70 group-hover:text-himka-secondary transition-colors">Ingat
                  saya</span>
              </label>

              @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                  class="text-sm font-bold text-himka-accent hover:text-himka-accent-dark hover:underline transition-colors">
                  Lupa Password?
                </a>
              @endif
            </div>

            <button type="submit"
              class="w-full bg-himka-accent text-white font-bold py-4 rounded-2xl hover:bg-himka-accent-dark transition-all shadow-lg hover:shadow-himka-accent/30 hover:-translate-y-1 active:translate-y-0 text-lg flex items-center justify-center gap-2 group">
              Masuk
              <span
                class="material-icons text-white/70 group-hover:text-white transition-colors group-hover:translate-x-1">arrow_forward</span>
            </button>
          </form>

          <p class="text-center mt-8 text-himka-secondary/60 text-sm">
            Bukan admin? <a href="{{ route('home') }}"
              class="text-himka-secondary font-bold hover:text-himka-accent transition-colors">Kembali ke Beranda</a>
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection