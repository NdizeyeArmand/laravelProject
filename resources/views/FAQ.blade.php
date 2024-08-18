@extends('layouts.guest')

@section('title', 'FAQ')

@push('head')
    <link href="{{ asset('css/faq.css') }}" rel="stylesheet" />
@endpush

@section('header')
<div class="page-heading">
    <h1>{{ __('Frequently Asked Questions') }}</h1>
</div>
@endsection

@section('content')
<main class="mb-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
            @can('manage-faq')
                <div class="mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                        {{ __('Add Category') }}
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addCategoryModalLabel">{{ __('Add Category') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('faq.categories.create') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="categoryName" class="form-label">{{ __('Category Name') }}</label>
                                            <input type="text" class="form-control" id="categoryName" name="name" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{ __('Add Category') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            @foreach($categories as $category)
                <h2>{{ $category->name }}</h2>
                @can('manage-faq')
                    <div class="mb-3">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}">
                            {{ __('Edit Category') }}
                        </button>

                        <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel{{ $category->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editCategoryModalLabel{{ $category->id }}">{{ __('Edit Category') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('faq.categories.edit', $category) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="categoryName{{ $category->id }}" class="form-label">{{ __('Category Name') }}</label>
                                                <input type="text" class="form-control" id="categoryName{{ $category->id }}" name="name" value="{{ $category->name }}" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">{{ __('Edit Category') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('faq.categories.destroy', $category) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('Delete Category') }}</button>
                        </form>
                    </div>
                @endcan
                <div class="faq-list">
                    @foreach($category->items as $item)
                        <div class="faq-item">
                            <h3 class="faq-question">{{ __($item->question) }}</h3>
                            <p class="faq-answer">{!! __($item->answer) !!}</p>
                            @can('manage-faq')
                                <div class="mb-3">
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editItemModal{{ $item->id }}">
                                        {{ __('Edit Item') }}
                                    </button>

                                    <div class="modal fade" id="editItemModal{{ $item->id }}" tabindex="-1" aria-labelledby="editItemModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editItemModalLabel{{ $item->id }}">{{ __('Edit Item') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('faq.items.edit', $item) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="itemQuestion{{ $item->id }}" class="form-label">{{ __('Question') }}</label>
                                                            <input type="text" class="form-control" id="itemQuestion{{ $item->id }}" name="question" value="{{ $item->question }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="itemAnswer{{ $item->id }}" class="form-label">{{ __('Answer') }}</label>
                                                            <textarea class="form-control" id="itemAnswer{{ $item->id }}" name="answer" required>{{ $item->answer }}</textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">{{ __('Edit Item') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('faq.items.destroy', $item) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Delete Item') }}</button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    @endforeach
                </div>
                @can('manage-faq')
                    <div class="mb-3">
                        <a href="{{ route('faq.items.create', ['category_id' => $category->id]) }}" class="btn btn-primary">{{ __('Add Item') }}</a>
                    </div>
                @endcan
            @endforeach
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const questions = document.querySelectorAll('.faq-question');
        questions.forEach(question => {
            question.addEventListener('click', function() {
                this.classList.toggle('active');
                const answer = this.nextElementSibling;
                if (answer.style.display === 'block') {
                    answer.style.display = 'none';
                } else {
                    answer.style.display = 'block';
                }
            });
        });
    });
</script>
@endsection