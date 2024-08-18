@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="container">
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="subheading" class="form-label">Subheading</label>
            <input type="text" class="form-control" id="subheading" name="subheading" value="{{ old('subheading', $post->subheading) }}">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image</label>
            <input type="file" class="form-control" id="cover_image" name="cover_image">
            @if ($post->cover_image)
                <img src="{{ getCoverImageUrl($post->cover_image) }}" alt="Cover Image" class="img-thumbnail mt-2" style="max-width: 200px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection