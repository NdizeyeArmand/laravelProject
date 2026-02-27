@extends('layouts.app')

@section('full-title', 'Profile')

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

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container py-5">
                <h2 class="font-weight-bold mb-4 text-dark">{{ __('Profile') }}</h2>

                <div class="row g-4">
                    <div class="col-12">
                        <div class="card bg-light shadow-sm">
                            <div class="card-body">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card bg-light shadow-sm">
                            <div class="card-body">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card bg-light shadow-sm">
                            <div class="card-body">
                                @include('profile.partials.update-avatar-form')
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card bg-light shadow-sm">
                            <div class="card-body">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
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
    .dark-mode .text-dark { color: #f8f9fa !important; }
    body.dark-mode .sidebar {
        background-color: #343a40;
    }
    body:not(.dark-mode) .sidebar {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity));
    }
</style>
@endpush
