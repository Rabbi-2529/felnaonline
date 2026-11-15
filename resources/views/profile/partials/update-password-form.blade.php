<div class="card h-100">
    <div class="card-header">
        <h3 class="card-title">Change password</h3>
    </div>
    <div class="card-body">
        <p class="text-muted mb-3">Use a long, random password to keep the admin panel secure.</p>

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="update_password_current_password" class="form-label">Current password</label>
                <input id="update_password_current_password" name="current_password" type="password"
                    class="form-control {{ $errors->updatePassword->has('current_password') ? 'is-invalid' : '' }}" autocomplete="current-password">
                @if ($errors->updatePassword->has('current_password'))
                    <span class="text-danger">{{ $errors->updatePassword->first('current_password') }}</span>
                @endif
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="update_password_password" class="form-label">New password</label>
                    <input id="update_password_password" name="password" type="password"
                        class="form-control {{ $errors->updatePassword->has('password') ? 'is-invalid' : '' }}" autocomplete="new-password">
                    @if ($errors->updatePassword->has('password'))
                        <span class="text-danger">{{ $errors->updatePassword->first('password') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="update_password_password_confirmation" class="form-label">Confirm new password</label>
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                        class="form-control {{ $errors->updatePassword->has('password_confirmation') ? 'is-invalid' : '' }}" autocomplete="new-password">
                    @if ($errors->updatePassword->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->updatePassword->first('password_confirmation') }}</span>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3"><i class="fa-solid fa-key"></i> Update password</button>
        </form>
    </div>
</div>
