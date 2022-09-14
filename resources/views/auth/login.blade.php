@extends('layouts.app')

@section('content')
<header id="login-header" class="header-image text-white d-none d-md-block">
    <div class="header-overlay">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1">Login</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi laboriosam modi est fugiat mollitia nostrum porro doloremque quo adipisci! Esse sit vero consectetur dolorum nisi expedita molestias tenetur temporibus accusamus.</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h1 class="text-center">Login</h1>
            <hr>
            
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3 row">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email')
                        is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control
                        @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember"
                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-decoration-none"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
