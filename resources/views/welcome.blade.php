@extends('layouts.guest')

@section('full-title', 'Explore Obsidian')

@section('header')
<div class="site-heading">
    <h1>{{ __('Clean Blog') }}</h1>
    <span class="subheading">{{ __('A Blog Theme by Start Bootstrap') }}</span>
</div>
@endsection

@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{ route('post') }}">
                    <h2 class="post-title">{{ __('Man must explore, and this is exploration at its greatest') }}</h2>
                    <h3 class="post-subtitle">{{ __('Problems look mighty small from 150 miles up') }}</h3>
                </a>
                <p class="post-meta">
                {{ __('Posted by') }}
                    <a href="#!">{{ __('Start Bootstrap') }}</a>
                    {{ __('on September 24, 2023') }}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{ route('post') }}"><h2 class="post-title">{{ __('Some flowery bs about bs') }}</h2></a>
                <p class="post-meta">
                {{ __('Posted by') }}
                    <a href="#!">{{ __('Start Bootstrap') }}</a>
                      {{ __('on September 18, 2023') }}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{ route('post') }}">
                    <h2 class="post-title">{{ __('Science has not yet mastered prophecy') }}</h2>
                    <h3 class="post-subtitle">{{ __('We predict too much for the next year and yet far too little for the next ten.') }}</h3>
                </a>
                <p class="post-meta">
                {{ __('Posted by') }}
                    <a href="#!">{{ __('Start Bootstrap') }}</a>
                    {{ __('on August 24, 2023') }}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{ route('post') }}">
                    <h2 class="post-title">{{ __('Failure is not an option') }}</h2>
                    <h3 class="post-subtitle">{{ __('Many say exploration is part of our destiny, but it’s actually our duty to future generations.') }}</h3>
                </a>
                <p class="post-meta">
                {{ __('Posted by') }}
                    <a href="#!">{{ __('Start Bootstrap') }}</a>
                      {{ __('on July 8, 2023') }}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">{{ __('Older Posts →') }}</a></div>
        </div>
    </div>
</div>
@endsection
