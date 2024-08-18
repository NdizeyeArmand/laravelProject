<h3 class="font-weight-bold mb-3">{{ __('Update Avatar') }}</h3>

<form method="POST" action="{{ route('user-avatar.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="avatar" class="form-label">{{ __('Choose Avatar') }}</label>
        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="reset_default" name="reset_default">
            <label class="form-check-label" for="reset_default">
                {{ __('Reset to default avatar') }}
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">{{ __('Update Avatar') }}</button>
</form>

<div class="mt-3">
    <img src="{{ getAvatarUrl($user->avatar) }}" alt="{{ $user->name }}'s Avatar" class="img-thumbnail" style="max-width: 200px;">
</div>