@extends('layouts.guest')

@section('title', 'FAQ')

@push('head')
    <link href="{{ asset('css/faq.css') }}" rel="stylesheet" />
@endpush

@section('header')
<div class="page-heading">
    <h1>{{ __('Frequently Asked Questions') }}</h1>
</div>
@endsection

@section('content')
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="faq-list">
                    <div class="faq-item">
                        <h3 class="faq-question">{{ __('What is this website about?') }}</h3>
                        <p class="faq-answer">{{ __('This website is a project made by Ndizeye Armand-Gaël for the Backend Web course. It showcases various features and functionalities implemented using Laravel.') }}</p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">{{ __('Where can I find the source code?') }}</h3>
                        <p class="faq-answer">{{ __('The source code for this project can be found ') }}<a href="https://github.com/NdizeyeArmand/laravelProject">{{ __('here') }}</a>.</p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">{{ __('What technologies were used to create this website?') }}</h3>
                        <p class="faq-answer">{{ __('This website was created using Laravel, a PHP framework, along with HTML, CSS, and JavaScript. The design is based on the Clean Blog theme from Start Bootstrap.') }}</p>
                    </div>
                    <div class="faq-item">
                        <h3 class="faq-question">{{ __('How can I contact the developer?') }}</h3>
                        <p class="faq-answer">{{ __('You can contact the developer through their ') }}<a href="https://github.com/NdizeyeArmand">{{ __('GitHub') }}</a>{{ __(' profile or through the contact form on this website.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const questions = document.querySelectorAll('.faq-question');
        questions.forEach(question => {
            question.addEventListener('click', function() {
                this.classList.toggle('active');
                const answer = this.nextElementSibling;
                if (answer.style.display === 'block') {
                    answer.style.display = 'none';
                } else {
                    answer.style.display = 'block';
                }
            });
        });
    });
</script>
@endsection