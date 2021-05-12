@extends('layouts.master')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-col justify-center items-center">
          <h1 class="text-center text-4xl font-semibold mt-10 mb-12">Log In</h1>

          <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="">

                  <div class="row-md-6">
                      <input id="email" type="email" class="py-2 px-4 rounded-xl border border-primary placeholder-primary" name="email"
                          value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                      @error('email')
                          <div>{{ $message }}</div>
                      @enderror
                  </div>
              </div>

              <div class="mt-6">

                  <div class="col-md-6">
                      <input id="password" type="password" class="py-2 px-4 rounded-xl border border-primary placeholder-primary" name="password" required
                          autocomplete="current-password" placeholder="Password">

                      @error('password')
                          <span class="invalid-feedback">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="flex mt-2 items-center">
                  <input class="mr-2" type="checkbox" name="remember" id="remember"
                      {{ old('remember') ? 'checked' : '' }}>

                  <label class="text-sm" for="remember">
                      {{ __('Remember Me') }}
                  </label>
              </div>


              <div class="flex flex-col justify-center mt-10">
                  <button type="submit"
                      class="border-2 rounded-xl border-black bg-primary px-9 py-2 text-white text-sm">
                      {{ __('Masuk') }}
                  </button>
                  @if (Route::has('register'))
                    <div class="text-center mt-6">Belum mempunyai akun? <a class="font-semibold" href="{{ route('register') }}">Buat Akun</a></div>
                  @endif
                  @if (Route::has('password.request'))
                      <a class="text-center text-sm mt-4 font-semibold" href="{{ route('password.request') }}">
                          {{ __('Lupa Password?') }}
                      </a>
                  @endif
              </div>

          </form>
            
            
        </div>
    </div>
@endsection
