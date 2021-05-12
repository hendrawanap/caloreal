@extends('layouts.master')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-col justify-center items-center">
            
                <h1 class="text-center text-lg font-bold mt-10 mb-4">Login</h1>

                <div class="bg-ternary p-10 rounded-xl">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="">
                            <label for="email" class="">{{ __('E-Mail') }}</label>

                            <div class="">
                                <input id="email" type="email" class="p-2 rounded-lg" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="p-2 rounded-lg" name="password" required
                                    autocomplete="current-password">

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


                        <div class="flex flex-col justify-center mt-6">
                            <button type="submit"
                                class="border-2 rounded-2xl border-black bg-primary px-9 py-2 text-white text-sm">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="text-center text-sm mt-2" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                    </form>
                </div>
            
        </div>
    </div>
@endsection
