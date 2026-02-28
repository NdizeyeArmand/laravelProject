@extends('layouts.app')

@section('title', $user->username)

@section('content')
<div class="container py-5">

    <div class="profile-header content-surface p-4 rounded-3 mb-4">
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
                <img src="{{ getAvatarUrl($user->avatar) }}" alt="{{ $user->username }}'s Avatar" class="img-fluid rounded-circle profile-avatar mb-3 mb-md-0">
            </div>
            <div class="col-md-9">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <h1 class="mb-1">{{ $user->username }}</h1>
                @if(Auth::id() === $user->id)
                    <a href="{{ route('profile.edit') }}" class="btn btn-brand btn-sm">
                        <i class="bi bi-pencil-fill me-1"></i>{{ __('Edit Profile') }}
                    </a>
                @endif
            </div>
            @if($user->birthday)
                <p class="text-muted mb-2">
                    <i class="bi bi-cake me-1"></i>{{ $user->birthday->format('F j, Y') }}
                </p>
            @endif
            <p class="mb-0 profile-bio">{{ $user->bio ?? __('No bio available.') }}</p>
            </div>
        </div>
    </div>


    <div class="content-surface p-4 rounded-3">
        <h2 class="h5 fw-bold mb-4">
            <i class="bi bi-file-text me-2"></i>{{ __('Posts by ') . $user->username }}
        </h2>
        @if($user->posts->isEmpty())
            <p class="text-muted">{{ __('No posts yet.') }}</p>
        @else
            <div class="row g-3">
                @foreach($user->posts->sortByDesc('published_at') as $post)
                    <div class="col-md-6">
                        <a href="{{ route('posts.show', $post->slug) }}" class="text-decoration-none">
                            <div class="profile-post-card p-3 rounded-3 h-100">
                                @if($post->cover_image)
                                    <img src="{{ getCoverImageUrl($post->cover_image) }}"
                                        alt="{{ $post->title }}"
                                        class="img-fluid rounded-2 mb-2"
                                        style="width: 100%; height: 140px; object-fit: cover;">
                                @endif
                                <h3 class="h6 fw-bold mb-1">{{ $post->title }}</h3>
                                @if($post->subheading)
                                    <p class="text-muted small mb-1">{{ $post->subheading }}</p>
                                @endif
                                <p class="text-muted small mb-0">
                                    <i class="bi bi-calendar3 me-1"></i>{{ $post->published_at->format('M d, Y') }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
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
    .profile-avatar {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border: 3px solid #0085A1;
    }

    .profile-bio {
        line-height: 1.6;
    }

    .profile-post-card {
        border: 1px solid #dee2e6;
        background-color: #f8f9fa;
        transition: border-color 0.2s ease, transform 0.2s ease;
    }
    .profile-post-card:hover {
        border-color: #0085A1;
        transform: translateY(-2px);
    }
    .profile-post-card h3 {
        color: #212529;
    }
    .dark-mode .profile-post-card {
        background-color: #343a40;
        border-color: #495057;
    }
    .dark-mode .profile-post-card:hover {
        border-color: #0085A1;
    }
    .dark-mode .profile-post-card h3 {
        color: #f8f9fa;
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
