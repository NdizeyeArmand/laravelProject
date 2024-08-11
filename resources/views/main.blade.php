@extends('layouts.guest')

@section('full-title', 'Main')

@section('header')
<div class="site-heading">
    <h1>{{ __('Explore Obsidian') }}</h1>
    <span class="subheading">{{ __('Explore Our Latest Posts') }}</span>
</div>
@endsection

@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('main') }}" method="GET">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <input type="text" name="q" id="q" class="form-control" placeholder="Search posts..." value="{{ request('q') }}">
                        </div>
                        <div class="col-md-4">
                            <select name="sort" class="form-select" id="sort" onchange="this.form.submit()">
                                <option value="">Sort by...</option>
                                <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>Most Recent</option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                                <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Title (A-Z)</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

            @foreach($posts as $post)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{ route('posts.show', $post->slug) }}">
                @if($post->cover_image)
                    <img src="{{ asset($post->cover_image) }}" alt="{{ $post->title }}" class="img-fluid mb-3">
                @endif
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <h3 class="post-subtitle">{{ $post->subheading }}</h3>
                </a>
                <p class="post-meta">
                    {{ __('Posted by') }}
                    <a href="#!">{{ $post->user->name }}</a>
                    {{ $post->published_at->format('F d, Y') }}
                </p>
                @can('update-post', $post)
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                @endcan

                @can('delete-post', $post)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                @endcan
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @endforeach

            <!-- Pagination -->
            <div class="mb-4">
                {!! $posts->appends(request()->query())->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: none;
    margin-bottom: 2rem;
    }
    .form-control, .form-select, .btn {
        border-radius: 20px;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .dark-mode .form-control,
    .dark-mode .form-select {
        background-color: #343a40;
        color: #f8f9fa;
        border-color: #495057;
    }
    .dark-mode .form-control::placeholder {
        color: #6c757d;
    }
    .dark-mode .post-title,
    .dark-mode .post-subtitle {
        color: #f8f9fa;
    }
    .dark-mode .post-meta {
        color: #adb5bd;
    }
    .dark-mode hr {
        border-color: #495057;
    }
</style>
@endpush