@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ getAvatarUrl($user->avatar) }}" alt="{{ $user->username }}'s Avatar" class="img-fluid rounded-circle mb-3">
            @if(Auth::id() === $user->id)
                <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block">Edit Profile</a>
            @endif
        </div>
        <div class="col-md-8">
            <h1>{{ $user->username }}</h1>
            <p><strong>Birthday:</strong> {{ $user->birthday ? $user->birthday->format('F j, Y') : 'Not specified' }}</p>
            <h3>About Me</h3>
            <p>{{ $user->bio ?? 'No bio available.' }}</p>
        </div>
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
</style>
@endpush
