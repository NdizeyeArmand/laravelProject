@extends('layouts.guest')

@section('title', 'Contact')

@section('header-image', asset('img/home/contact-bg.jpg'))

@section('header')
<div class="page-heading">
    <h1>{{ __('Contact Us') }}</h1>
    <span class="subheading">{{ __('Have questions? We have answers.') }}</span>
</div>
@endsection

@section('content')
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>{{ __('Want to get in touch? Fill out the form below to send us a message and we will get back to you as soon as possible!') }}</p>
                <div class="my-5">
                    <form id="contactForm" action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" name="name" type="text" placeholder="{{ __('Enter your name...') }}" required />
                            <label for="name">{{ __('Name') }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email" placeholder="{{ __('Enter your email...') }}" required />
                            <label for="email">{{ __('Email address') }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="{{ __('Enter your phone number...') }}" required />
                            <label for="phone">{{ __('Phone Number') }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" name="message" placeholder="{{ __('Enter your message here...') }}" style="height: 12rem" required></textarea>
                            <label for="message">{{ __('Message') }}</label>
                        </div>
                        
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">{{ __('Send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection