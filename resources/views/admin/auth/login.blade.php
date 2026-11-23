<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - DIJA Group Export CMS</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #0A192F;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 440px;
            padding: 40px;
        }
        .btn-primary-dija {
            background: #F26820;
            border: none;
            color: #fff;
            font-weight: 700;
            padding: 12px;
            border-radius: 8px;
            width: 100%;
            font-size: 16px;
        }
        .btn-primary-dija:hover {
            background: #d85715;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <img src="{{ asset('assets/images/logo/dija-logo.png') }}" alt="DIJA Group" style="height: 52px; width: auto;" class="mb-3">
            <h4 class="fw-bold">CMS Admin Portal</h4>
            <p class="text-muted small">Sign in to manage and edit website content</p>
        </div>

        @if($errors->any())
        <div class="alert alert-danger py-2 small">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" value="{{ old('email', 'admin@dijagroup.com') }}" required autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" required placeholder="••••••••">
                </div>
            </div>

            <div class="mb-4 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember" checked>
                <label class="form-check-label text-muted small" for="remember">Remember my session</label>
            </div>

            <button type="submit" class="btn btn-primary-dija">
                Sign In to Dashboard <i class="fa-solid fa-arrow-right ms-1"></i>
            </button>
        </form>

        <div class="text-center mt-4 pt-3 border-top">
            <a href="{{ route('home') }}" class="text-decoration-none small text-muted">
                &larr; Back to Public Website
            </a>
        </div>
    </div>
</body>
</html>
