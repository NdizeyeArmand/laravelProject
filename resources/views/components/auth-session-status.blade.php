@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-info mb-4']) }} role="alert">
        {{ $status }}
    </div>
@endif
