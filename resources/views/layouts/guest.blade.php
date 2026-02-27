<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="keywords" content="{{ __('Obsidian Notes Markdown Think studying,obsidian.md,obsidian note taking,obsidian app,obsidian notes,obsidian note,obsidian review,obsidian tutorial,obsidian workflow,obsidian zettlekasten,how to use obsidian,note taking app,https://obsidian.md/index.html,sync obsidian,obsidian onedrive sync,obsidian sync pc with mobile,obsidian sync devices,obsidian sync,obsidian sync free,obsidian sync mobile,obsidian sync tutorial,obsidian sync guide,obsidian sync android,obsidian sync onedrive') }}">
        <meta name="author" content="Armand-Gaël Ndizeye" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
        @section('full-title')
            @yield('title') - {{ config('app.name', 'Explore Obsidian') }}
        @show
        </title>

        <!-- Fonts -->
        <link rel="icon" type="image/png" href="{{ asset('img/obsidian-icon.png') }}" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
        @stack('head')

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="@if(session('darkMode')) dark-mode @endif bg-white text-gray-900 transition-colors duration-300">
        @include('layouts.navigation')

        <!-- Page Header-->
        <header class="masthead" style="background-image: url('@yield('header-image', asset('img/home/home-bg.jpg'))')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                    @yield('header')
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        @yield('content')

        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="https://obsidian.md/" class="obsidian-icon-link">
                                    <img src="{{ asset('img/obsidian-icon.png') }}"
                                         alt="Obsidian"
                                         class="obsidian-icon">
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">&copy; Explore Obsidian 2024</div>
                    </div>
                </div>
            </div>
        </footer>

    <script src="{{ asset('js/components/script.js') }}"></script>
    @yield('scripts')
    </body>
</html>
