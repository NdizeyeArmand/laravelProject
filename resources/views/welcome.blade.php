@extends('layouts.guest')

@section('full-title', 'Explore Obsidian')

@section('header')
<div class="site-heading">
    <h1>{{ __('Explore Obsidian') }}</h1>
    <span class="subheading">{{ __('Discover the Best Note-Taking App') }}</span>
</div>
@endsection

@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
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
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
                @endcan

                @can('delete-post', $post)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endcan
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @endforeach
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary text-uppercase" href="{{ route('main') }}">{{ __('Older Posts →') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
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
</style>
@endpush