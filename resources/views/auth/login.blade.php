@extends('Layouts.Frontend.master')
@section('title', 'Login | Ensiklopedia Pesisir Barat')

@section('css')
@stop

@section('content')
    <div class="row">
        <div class="col">
            <div class="bg-white">

                <h3>Form Login</h3>
                <hr>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="col">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Ingat saya') }}
                            </label>
                        </div>
                    </div> --}}

                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Lupa password?') }}
                            </a>
                            |
                            <a class="btn btn-link" href="{{ route('register') }}">
                                {{ __('Buat akun baru') }}
                            </a>
                        @endif
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@stop
