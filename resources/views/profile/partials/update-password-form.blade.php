<h3 class="font-weight-bold mb-3">{{ __('Update Password') }}</h3>

<form method="POST" action="{{ route('user-password.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
        <input id="current_password" type="password" class="form-control" name="current_password" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">{{ __('New Password') }}</label>
        <input id="password" type="password" class="form-control" name="password" required>
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">{{ __('Confirm New Password') }}</label>
        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
    </div>

    <button type="submit" class="btn btn-primary">{{ __('Update Password') }}</button>
</form>