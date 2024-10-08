@extends('layouts.guest')

@section('title', $post->title)

@section('header-image', getCoverImageUrl($post->cover_image))

@section('header')
<div class="post-heading">
    <h1>{{ $post->title }}</h1>
    <h2 class="subheading">{{ $post->subheading }}</h2>
    <span class="meta">
        {{ __('Posted by') }}
        <a href="{{ route('profile.show', $post->user->username) }}">
            <img src="{{ getAvatarUrl($post->user->avatar) }}" alt="{{ $post->user->name }}'s Avatar" style="width: 30px; height: 30px; border-radius: 50%; margin-right: 5px;">
            {{ $post->user->username }}
        </a>
        {{ $post->published_at->format('F d, Y') }}
    </span>
    <div class="post-tags">
        @foreach($post->tags as $tag)
            <a href="{{ route('posts.by.tag', $tag->slug) }}" class="badge bg-secondary text-decoration-none link-light">{{ $tag->name }}</a>
        @endforeach
    </div>
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
@endsection

@section('content')
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                {!! $post->content !!}
            </div>
        </div>
    </div>
</article>
@endsection
