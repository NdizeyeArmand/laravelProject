@extends('layouts.auth')

@section('full-title', 'Login - Reset Password')

@section('div-class', 'd-flex justify-content-between align-items-center mb-4')

@section('return-button')
    <div>
        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Return
        </a>
    </div>
@endsection

@section('right-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-10 text-muted">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </p>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Email Address -->
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" />
                            </div>

                            <div class="d-flex justify-content-center">
                                <x-primary-button class="btn btn-primary">
                                    {{ __('Email Password Reset Link') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection