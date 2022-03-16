@extends('Layouts.Frontend.master')
@section('title', 'Registrasi | Ensiklopedia Pesisir Barat')

@section('css')
@stop

@section('content')
    <div class="row">
        <div class="col">
            <div class="bg-white">
                <h3>Form Registrasi</h3>
                <hr>


                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="col">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama Lengkap') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="col">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="col">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                    <div class="col">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('Konfirm Password') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registrasi') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('js')
@stop
