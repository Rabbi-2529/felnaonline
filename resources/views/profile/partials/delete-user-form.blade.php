<div class="card" style="border-color:#f6c9cb">
    <div class="card-header">
        <h3 class="card-title" style="color:#b4161c">Delete account</h3>
    </div>
    <div class="card-body">
        <p class="text-muted mb-3">
            Deleting your account removes your admin login permanently. Enter your password to confirm.
        </p>
        <form method="post" action="{{ route('profile.destroy') }}" class="d-flex flex-wrap align-items-start gap-2">
            @csrf
            @method('delete')
            <div style="flex:1;min-width:220px;max-width:360px">
                <label for="delete_password" class="visually-hidden">Password</label>
                <input id="delete_password" name="password" type="password"
                    class="form-control {{ $errors->userDeletion->has('password') ? 'is-invalid' : '' }}" placeholder="Your password">
                @if ($errors->userDeletion->has('password'))
                    <span class="text-danger">{{ $errors->userDeletion->first('password') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete account</button>
        </form>
    </div>
</div>
