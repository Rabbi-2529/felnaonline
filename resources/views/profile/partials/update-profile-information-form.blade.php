<div class="card h-100">
    <div class="card-header">
        <h3 class="card-title">Profile information</h3>
    </div>
    <div class="card-body">
        <p class="text-muted mb-3">Update your name and email address.</p>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $user->name) }}" required autocomplete="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $user->email) }}" required autocomplete="username">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <p class="small mt-2 mb-0">
                        Your email address is not verified.
                        <button form="send-verification" class="btn btn-link btn-sm p-0 align-baseline">Re-send the verification email</button>
                    </p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Save profile</button>
        </form>
    </div>
</div>
