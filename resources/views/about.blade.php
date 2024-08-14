@extends('layouts.guest')

@section('title', 'About')

@section('header-image', asset('img/home/about-bg.jpg'))

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
                <p>{{ __('This was made possible by:') }}</p>
                <ul>
                    <li><a href="https://claude.ai/">{{ __('Claude') }}</a></li>
                    <li><a href="https://www.phind.com">{{ __('Phind') }}</a></li>
                    <li><a href="https://startbootstrap.com/theme/clean-blog">{{ __('Start Bootstrap - Clean Blog v6.0.9') }}</a></li>
                    <li><a href="https://obsidian.md/blog/">{{ __('Obsidian official website') }}</a></li>
                    <li><a href="https://github.com/osmanaktrk/team2">{{ __('https://github.com/osmanaktrk/team2') }}</a></li>
                    <li><a href="https://github.com/tiretdubas/laravel_10_basics">{{ __('https://github.com/tiretdubas/laravel_10_basics') }}</a></li>
                    <li><a href="https://github.com/samuelsong70/obsidian-dynamic-background">{{ __('samuelsong70 - Obsidian dynamic background image') }}</a></li>
                    <li><a href="https://www.originalmacguy.com/obsidian-the-good-the-bad-the-ugly/">{{ __('Original Mac Guy - Obsidian: The Good, The Bad, The Ugly') }}</a></li>
                    <li><a href="https://jasinski.info/2023/02/23/obsidian-canvas-iphone-ipad/">{{ __('Jasinski.info - Obsidian Canvas for iPhone and iPad') }}</a></li>
                    <li><p>
                        Image: <a href="https://commons.wikimedia.org/wiki/File:Obsidian_desktop_demo_workflow.jpg">Obsidian open with a chemistry note, graph view, and calendar open</a> by 
                        <a href="https://commons.wikimedia.org/w/index.php?title=User:Langstonzac25&action=edit&redlink=1">Langstonzac25</a> is licensed under 
                        <a href="https://creativecommons.org/licenses/by/4.0/">CC BY 4.0</a>.
                    </p></li>
                    <li><p>
                        Image: <a href="https://commons.wikimedia.org/wiki/File:Obsidian_desktop_demo_workflow.jpg">Obsidian open with a chemistry note, graph view, and calendar open</a> by 
                        <a href="https://commons.wikimedia.org/w/index.php?title=User:Langstonzac25&action=edit&redlink=1">Langstonzac25</a> is licensed under 
                        <a href="https://creativecommons.org/licenses/by/4.0/">CC BY 4.0</a>.
                    </p></li>
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection