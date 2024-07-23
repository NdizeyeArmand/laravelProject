@extends('layouts.guest')

@section('title', 'About')

@section('header')
<div class="page-heading">
    <h1>{{ __('About Me') }}</h1>
</div>
@endsection

@section('content')
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>{{ __('Project made with ❤️ by Ndizeye Armand-Gaël for the course Backend Web.') }}</p>
                <p><strong>{{ __('Source code can be found') }} <a href="https://github.com/NdizeyeArmand/laravelProject">{{ __('here') }}</a></strong></p>
                <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!') }}</p>
                <p>{{ __('This was made possible by:') }}</p>
                <ul>
                    <li><a href="https://www.phind.com">{{ __('Phind') }}</a></li>
                    <li><a href="https://startbootstrap.com/theme/clean-blog">{{ __('Start Bootstrap - Clean Blog v6.0.9') }}</a></li>
                    <li><a href="https://obsidian.md/blog/">{{ __('Obsidian official website') }}</a></li>
                    <li><a href="https://github.com/osmanaktrk/team2">{{ __('https://github.com/osmanaktrk/team2') }}</a></li>
                    <li><a href="https://github.com/tiretdubas/laravel_10_basics">{{ __('https://github.com/tiretdubas/laravel_10_basics') }}</a></li>
                    <li><a href="https://obsidian.md/blog/">{{ __('Obsidian official website') }}</a></li>
                    <li><a href="https://obsidian.md/blog/">{{ __('Obsidian official website') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection