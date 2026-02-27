@extends('layouts.app')

@section('title', __('Contact messages'))

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
            <h1>Contact Messages</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->phone }}</td>
                            <td>{!! nl2br(e($message->message)) !!}</td>
                            <td>{{ $message->created_at->timezone('Europe/Brussels')->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $messages->links() }}
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
    body.dark-mode .sidebar {
        background-color: #343a40;
    }
    body:not(.dark-mode) .sidebar {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity));
    }
</style>
@endpush
