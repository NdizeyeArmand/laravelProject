@extends('layouts.guest')

@section('title', 'Contact')

@section('header-image', asset('img/home/contact-bg.jpg'))

@section('header')
<div class="page-heading">
    <h1>{{ __('Contact Me') }}</h1>
    <span class="subheading">{{ __('Have questions? I have answers.') }}</span>
</div>
@endsection

@section('content')
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>{{ __('Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!') }}</p>
                <div class="my-5">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <div class="form-floating">
                            <input class="form-control" id="name" type="text" placeholder="{{ __('Enter your name...') }}" data-sb-validations="required" />
                            <label for="name">{{ __('Name') }}</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">{{ __('A name is required.') }}</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" type="email" placeholder="{{ __('Enter your email...') }}" data-sb-validations="required,email" />
                            <label for="email">{{ __('Email address') }}</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">{{ __('An email is required.') }}</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">{{ __('Email is not valid.') }}</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="phone" type="tel" placeholder="{{ __('Enter your phone number...') }}" data-sb-validations="required" />
                            <label for="phone">{{ __('Phone Number') }}</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">{{ __('A phone number is required.') }}</div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="message" placeholder="{{ __('Enter your message here...') }}" style="height: 12rem" data-sb-validations="required"></textarea>
                            <label for="message">{{ __('Message') }}</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">{{ __('A message is required.') }}</div>
                        </div>
                        <br />
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">{{ __('Form submission successful!') }}</div>
                                {{ __('To activate this form, sign up at') }}
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">{{ __('Error sending message!') }}</div></div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase disabled" id="submitButton" type="submit">{{ __('Send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
