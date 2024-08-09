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
            @foreach($categories as $category)
                <h2>{{ $category->name }}</h2>
                <div class="faq-list">
                    @foreach($category->items as $item)
                        <div class="faq-item">
                            <h3 class="faq-question">{{ __($item->question) }}</h3>
                            <p class="faq-answer">{!! __($item->answer) !!}</p>
                        </div>
                    @endforeach
                </div>
            @endforeach
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