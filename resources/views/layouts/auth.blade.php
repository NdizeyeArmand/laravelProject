<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="keywords" content="{{ __('Obsidian Notes Markdown Think studying') }}">
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
        <link href="{{ asset('css/auth.css') }}" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="@if(session('darkMode')) dark-mode @endif bg-white text-gray-900 transition-colors duration-300">
        <div class="content-container">
            <div class="container-fluid h-100">
                <div class="row h-100">
                    <!-- Left side - Image -->
                    <div class="col-md-7 p-0 bg-image-container">
                        <div class="h-100 bg-image d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('../img/home/snow-effect-with-wallpaper.gif') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-color: #f0f0f0;"></div>
                    </div>

                    <!-- Vertical line -->
                    <div class="col-auto p-0">
                        <div class="vertical-line h-100"></div>
                    </div>
                    
                    <!-- Right side - Login form -->
                    <div class="col-md content-right d-flex align-items-center justify-content-center">
                        <div class="w-100 scrollable-content" style="max-width: 400px;">
                            <!-- Go Back Home button -->
                            <div class="@yield('div-class')">
                            @yield('return-button')
                                <div>
                                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-home"></i> {{ __('Go Back Home') }}
                                    </a>
                                </div>
                            </div>

                            @yield('right-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="{{ asset('js/components/auth-script.js') }}"></script>
    @yield('scripts')
    </body>
</html>