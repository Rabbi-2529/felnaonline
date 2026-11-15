<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Sign in · Felna Admin</title>
    <link rel="icon" href="{{ asset('website-assets/img/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/felna-admin.css') }}?v={{ @filemtime(public_path('admin-assets/css/felna-admin.css')) }}">
</head>

<body class="fa-body">
    <div class="fa-auth">
        <section class="fa-auth-side">
            <a href="{{ route('home') }}" class="d-inline-flex align-items-center gap-2 text-white" style="position:relative;z-index:1">
                <span class="fa-logo-tile"><img src="{{ asset('website-assets/img/logo.png') }}" alt="Felna Online logo"></span>
                <span>
                    <strong class="d-block" style="font-size:1.15rem;font-weight:800;letter-spacing:-.02em">Felna <span style="color:#00a651">Online</span></strong>
                    <small class="d-block" style="font-size:.68rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.55)">Internet Service Provider</small>
                </span>
            </a>
            <div style="position:relative;z-index:1">
                <h1>Manage your website, packages and orders</h1>
                <p>Sign in to the Felna Online admin panel to update internet packages, website content and SEO.</p>
            </div>
            <small style="position:relative;z-index:1;color:rgba(255,255,255,.5)">© {{ date('Y') }} Felna Online · IGL Network</small>
        </section>

        <main class="fa-auth-main">
            <div class="fa-auth-box">
                <h2>Welcome back</h2>
                <p class="lead-text">Sign in with your admin email and password.</p>

                @if (session('status'))
                    <div class="alert alert-success" style="display:block">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="fa-input-icon">
                            <i class="fa-regular fa-envelope"></i>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="you@example.com"
                                required autofocus autocomplete="username">
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="fa-input-icon">
                            <i class="fa-solid fa-lock"></i>
                            <input id="password" type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Your password"
                                required autocomplete="current-password">
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                        <label for="remember_me" class="d-inline-flex align-items-center m-0" style="font-weight:600;font-size:.875rem;cursor:pointer">
                            <input id="remember_me" type="checkbox" name="remember"> Remember me
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="font-weight:700;font-size:.875rem">Forgot password?</a>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary w-100" style="--bs-btn-padding-y:.75rem">
                        Sign in <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </form>

                <p class="text-center mt-4 mb-0" style="font-size:.85rem">
                    <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left"></i> Back to website</a>
                </p>
            </div>
        </main>
    </div>
</body>

</html>
