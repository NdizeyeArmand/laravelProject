@extends('layouts.auth')

@section('full-title', 'Login')

@section('div-class', 'text-end mb-4')

@section('right-content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Session Status -->
        <x-auth-session-status class="" :status="session('status')" />

        <!-- Email Address -->
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="mb-3"> 
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
            <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
        </div>

        <div class="d-flex justify-content-start align-items-center">
            @if (Route::has('password.request'))
                <a class="text-decoration-none me-3" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <div class="d-flex justify-content-start align-items-center">
            <a class="text-decoration-none me-3" href="{{ route('register') }}">
                {{ __('Not a member yet?') }}
            </a>
        </div>
    </form>
@endsection