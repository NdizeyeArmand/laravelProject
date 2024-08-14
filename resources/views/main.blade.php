@extends('layouts.guest')

@section('full-title', 'Main')

@section('header')
<div class="site-heading">
    <h1>{{ __('Explore Obsidian') }}</h1>
    @if(isset($tag))
        <span class="subheading">{{ __('Posts tagged with: ') . $tag->name }}</span>
    @else
        <span class="subheading">{{ __('Explore Our Latest Posts') }}</span>
    @endif
</div>
@endsection

@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center mb-4">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <div class="card tags-card">
                <div class="card-body">
                    <div class="tags-cloud">
                        @foreach($tags as $tag)
                            <a href="{{ route('posts.by.tag', $tag->slug) }}" class="tag-item">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('main') }}" method="GET">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <input type="text" name="q" id="q" class="form-control" placeholder="{{ __('Search posts...') }}" value="{{ request('q') }}">
                        </div>
                        <div class="col-md-4">
                            <select name="sort" class="form-select" id="sort" onchange="this.form.submit()">
                                <option value="">Sort by...</option>
                                <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>{{ __('Most Recent') }}</option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>{{ __('Oldest First') }}</option>
                                <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>{{ __('Title (A-Z)') }}</option>
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
                <p class="post-tags">
                    @foreach($post->tags as $tag)
                        <a href="{{ route('posts.by.tag', $tag->slug) }}" class="badge bg-secondary text-decoration-none link-light">{{ $tag->name }}</a>
                    @endforeach
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
    .post-tags {
        margin-top: 0.5rem;
    }
    .post-tags .badge {
        margin-right: 0.3rem;
        padding: 0.3em 0.6em;
        font-size: 0.75em;
    }
    .dark-mode .badge {
        background-color: #495057 !important;
    }
    .tags-card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: none;
        margin-bottom: 2rem;
    }
    .dark-mode .tags-card {
        background-color: #343a40;
    }
    .tags-cloud {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }
    .tag-item {
        background-color: #e9ecef;
        color: #495057;
        padding: 5px 10px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 0.9em;
        transition: background-color 0.3s ease;
    }
    .tag-item:hover {
        background-color: #ced4da;
        text-decoration: none;
    }
    .dark-mode .tag-item {
        background-color: #495057;
        color: #e9ecef;
    }
    .dark-mode .tag-item:hover {
        background-color: #6c757d;
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