@extends('layouts.login-signup')

@section('content')
<div class="container mx-auto flex flex-col items-center max-w-lg">
  <h1 class="text-center text-4xl font-semibold text-primary mt-10 mb-12">Log In</h1>
  
  @error('email')
  <div class=" flex text-sm text-gray-700 bg-red-200 p-3 items-center rounded-md mb-4">
    <div class="material-icons mr-3">block</div>
    <div>{{ $message }}</div>
  </div>
  @enderror

  <form class="w-full" method="POST" action="{{ route('login') }}">
    @csrf
    <div>
      <input
        id="email"
        type="email"
        name="email"
        class="w-full py-2 px-4 rounded-xl border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
        value="{{ old('email') }}"
        autocomplete="email"
        placeholder="Email"
        required
        autofocus
      >
    </div>

    <div class="mt-6">
      <input
        id="password"
        type="password"
        class="w-full py-2 px-4 rounded-xl border border-primary bg-gray-50 placeholder-primary focus:placeholder-opacity-25"
        name="password"
        required
        autocomplete="current-password"
        placeholder="Password"
      >

      @error('password')
      <div>{{ $message }}</div>
      @enderror
    </div>

    <div class="flex mt-2 items-center">
      <input
      class="mr-2"
      type="checkbox"
      name="remember"
      id="remember"
      {{ old('remember') ? 'checked' : '' }}
      >

      <label class="text-sm" for="remember">
          {{ __('Ingat Saya') }}
      </label>
    </div>

    <div class="flex flex-col justify-center mt-10">
      <button type="submit" class="border-2 rounded-xl bg-primary px-9 py-2 text-white text-sm">
        {{ __('Masuk') }}
      </button>

      @if (Route::has('register'))
      <div class="text-center mt-6">
        Belum mempunyai akun?
        <a class="font-semibold text-sm text-primary" href="{{ route('register') }}">Buat Akun</a>
      </div>
      @endif

      @if (Route::has('password.request'))
      <a class="text-center text-sm mt-4 font-semibold" href="{{ route('password.request') }}">{{ __('Lupa Password?') }}</a>
      @endif
    </div>
  </form>
</div>
@endsection
