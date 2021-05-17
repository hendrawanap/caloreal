@extends('layouts.login-signup')

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@section('content')
<div class="container mx-auto flex flex-col items-center max-w-lg">
  <h1 class="text-center text-4xl font-semibold text-primary mt-10 mb-12">Reset Password</h1>
  
  @if(session('status'))
  <div class=" flex text-sm text-gray-700 bg-green-200 p-3 items-center rounded-md mb-4">
    <div class="material-icons mr-3">check</div>
    <div>{{ session('status') }}</div>
  </div>
  @endif

  @error('email')
  <div class=" flex text-sm text-gray-700 bg-red-200 p-3 items-center rounded-md mb-4">
    <div class="material-icons mr-3">block</div>
    <div>{{ $message }}</div>
  </div>
  @enderror

  <form class="w-full" method="POST" action="{{ route('password.email') }}">
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

    <div class="flex flex-col justify-center mt-10">
      <button type="submit" class="border-2 rounded-xl bg-primary px-9 py-2 text-white text-sm">
        {{ __('Kirim Tautan Reset Password') }}
      </button>
    </div>
  </form>
</div>
@endsection