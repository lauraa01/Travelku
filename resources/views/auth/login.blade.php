@extends('layouts.app')

@section('title', 'Login')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container" id="Sign">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgba(44, 62, 80,0.7);">
                <div class="card-header" style="border-bottom: 1.5px solid grey; font-weight: bold; font-size: 1.5rem;">
                    {{ __('Login') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="/login">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter the email address" name="email" value="{{Cookie::get('email') != null ? Cookie::get('email') : ""}}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Enter the password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check" style="margin-right: 60%">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-10 offset-md-2" >
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <!-- tombol signin google -->
                                <a class="btn btn-danger" href="{{ '/auth/redirect'}}" style="background:#e82e2e; padding: 1.5% 3%; color: white; text-decoration: none; box-shadow: 0px 1px 1px rgba(0,0,0,.5), 1px 1px 1px rgba(0,0,0,.3);">
                                    Google
                                </a>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                <p class="text-center" style="margin-top: 3%; margin-right: 20%">
                                    Belum punya akun?
                                    <a href="register" style="text-decoration: none;">
                                        <span style="color: #1fbf30; font-weight: bold; font-size: 1rem;">
                                            Register
                                        </span>
                                    </a> sekarang!</p>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
