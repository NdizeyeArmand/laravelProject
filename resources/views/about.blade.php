@extends('layouts.guest')

@section('title', 'About')

@section('header')
<div class="page-heading">
    <h1>{{ __('About Me') }}</h1>
    <span class="subheading">{{ __('This is what I do.') }}</span>
</div>
@endsection

@section('content')
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>{{ __('This project is made by Ndizeye Amrand-Gaël for the course Backend Web.') }}</p>
                <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!') }}</p>
                <p><strong>{{ __('Source code can be found') }} <a href="https://github.com/NdizeyeArmand/laravelProject">{{ __('here') }}</a></strong></p>
                <p>{{ __('This was made possible by:') }}</p>
                <ul>
                    <li>{{ __('Source 1') }}</li>
                    <li>{{ __('Source 2') }}</li>
                    <li>{{ __('Source 3') }}</li>
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection