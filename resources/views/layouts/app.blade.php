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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
        @stack('head')

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="@if(session('darkMode')) dark-mode @endif bg-white text-gray-900 transition-colors duration-300 exception-page">
        @include('layouts.navigation')

        <!-- Main Content -->
        @yield('content')

    <script src="{{ asset('js/components/script.js') }}"></script>
    @yield('scripts')
    </body>
</html>