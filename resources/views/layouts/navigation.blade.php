<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('home') }}">{{ __('Explore Obsidian') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        {{ __('Menu') }}
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                @if (Route::has('register'))
                    @guest
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('main') }}">{{ __('Main') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('FAQ') }}">{{ __('FAQ') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('about') }}">{{ __('About') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endguest
                    @auth
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('main') }}">{{ __('Main') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('FAQ') }}">{{ __('FAQ') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('about') }}">{{ __('About') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
    <button id="themeToggle" onclick="toggleTheme()" class="btn btn-outline-secondary">
        <i class="fas fa-moon"></i>
        <i class="fas fa-sun d-none"></i>
    </button>
</nav>