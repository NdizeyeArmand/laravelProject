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
                            <i class="bi bi-gear-fill"></i>
                            {{ __('Email & Password') }}
                        </a>
                    </li>
                    @if(auth()->user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.messages.index') }}">
                            <i class="bi bi-envelope-fill"></i>
                            {{ __('Contact messages') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
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
            <div class="dashboard-hero p-4 mb-4 rounded-3">
                <div class="py-4">
                    <h1 class="display-5 fw-bold">{{ __('Welcome to your dashboard, ') . auth()->user()->name }}</h1>
                    <p class="col-md-8 fs-5 mb-2 text-muted">{{ __('What would you like to do today?') }}</p>
                    <a href="{{ route('profile.show', auth()->user()->username) }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-person me-1"></i>{{ __('View my public profile') }}
                    </a>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="dashboard-card p-4 rounded-3 h-100">
                        <h2 class="h5 fw-bold mb-1">✍️ Writing</h2>
                        <p class="text-muted mb-3">Share your thoughts with the community</p>
                        <a href="{{ route('posts.create') }}" class="btn btn-brand">{{ __('Create new post') }}</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="dashboard-card p-4 rounded-3 h-100">
                        <h2 class="h5 fw-bold mb-1">📖 Reading</h2>
                        <p class="text-muted mb-3">Discover something new from the community.</p>
                        <a href="{{ route('posts.random') }}" class="btn btn-brand">{{ __('Read random post') }}</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@push('head')
<style>
    #mainNav .navbar-brand,
    #mainNav .navbar-nav > li.nav-item > a.nav-link {
        color: #212529;
    }
    #mainNav .navbar-nav > li.nav-item > a.nav-link:focus,
    #mainNav .navbar-nav > li.nav-item > a.nav-link:hover,
    #mainNav.is-fixed .navbar-brand:focus,
    #mainNav.is-fixed .navbar-brand:hover,
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
    .dashboard-hero {
        border: 1px solid #dee2e6;
        background-color: #f8f9fa;
    }
    .dark-mode .dashboard-hero {
        background-color: #2b3035;
        border-color: #495057;
    }
    .dark-mode .dashboard-hero h1 {
        color: #f8f9fa;
    }
    .dashboard-card {
        border: 1px solid #dee2e6;
        background-color: #fff;
    }
    .dark-mode .dashboard-card {
        background-color: #2b3035;
        border-color: #495057;
    }
    .dark-mode .dashboard-card h2 {
        color: #f8f9fa;
    }
    .dark-mode .text-muted {
        color: #adb5bd !important;
    }
    .btn-brand {
        background-color: #0085A1;
        border-color: #0085A1;
        color: #fff;
    }
    .btn-brand:hover {
        background-color: #006d84;
        border-color: #006d84;
        color: #fff;
    }
</style>
@endpush
