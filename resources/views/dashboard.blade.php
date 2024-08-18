@extends('layouts.app')

@section('full-title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar -->
        <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door-fill"></i>
                            {{ __('Dashboard') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}">
                            <i class="bi bi-envelope-fill"></i>
                            {{ __('Email & Password') }}
                        </a>
                    </li>
                    @if(auth()->user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.messages.index') }}">
                            <i class="bi bi-gear-fill"></i>
                            {{ __('Contact messages') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">
                            <i class="bi bi-people-fill"></i>
                            {{ __('Manage Users') }}
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            {{ __('Sign out') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Top Section with Background Image -->
            <div class="p-4 mb-4 bg-primary text-white rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">{{ __('Welcome to your dashboard, ') . auth()->user()->name }}</h1>
                    <p class="col-md-8 fs-4">You can contribute to the site by making posts.</p>
                </div>
            </div>

            <!-- Bottom Section with Links -->
            <div class="row">
                <div class="col-md-6">
                    <h2>Writing</h2>
                    <p>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">{{ __('Create new post') }}</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <h2>Reading</h2>
                    <p>
                    <a href="{{ route('posts.random') }}" class="btn btn-primary">{{ __('Read random post') }}</a>
                    </p>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@push('head')
<style>
    #mainNav {
        position: relative;
        border-bottom: 1px solid #dee2e6;
        background-color: #fff;
    }
    #mainNav .navbar-brand,
    #mainNav .navbar-nav > li.nav-item > a.nav-link {
        color: #212529;
    }
    #mainNav .navbar-nav > li.nav-item > a.nav-link:focus, 
    #mainNav .navbar-nav > li.nav-item > a.nav-link:hover,
    #mainNav.is-fixed .navbar-brand,
    #mainNav .navbar-brand:focus, #mainNav .navbar-brand:hover {
        color: #0085A1;
    }
    .dark-mode #mainNav .navbar-brand:focus, .dark-mode #mainNav .navbar-brand:hover {
        color: #0085A1 !important;
    }
    .dark-mode #mainNav .navbar-nav > li.nav-item > a.nav-link:focus, .dark-mode #mainNav .navbar-nav > li.nav-item > a.nav-link:hover {
        color: #0085A1 !important;
    }
    body.dark-mode .sidebar {
        background-color: #343a40;
    }
    body:not(.dark-mode) .sidebar {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity));
    }
</style>
@endpush