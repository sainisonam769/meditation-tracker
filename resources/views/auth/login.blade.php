
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f7f7f7;
        }
        .login-card {
            max-width: 400px;
            margin: 8% auto;
            padding: 2rem;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .btn-primary-custom {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }
        .btn-primary-custom:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h3 class="text-center mb-4">Login to Your Account</h3>
    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                   name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                   name="password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
            <label class="form-check-label" for="remember_me">
                Remember me
            </label>
        </div>

        
        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary btn-primary-custom">Login</button>
        </div>

        @if (Route::has('password.request'))
            <div class="text-center mb-2">
                <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot your password?</a>
            </div>
        @endif
        @if (Route::has('register'))
            <div class="text-center">
                <a href="{{ route('register') }}" class="text-decoration-none">Don't have an account? Register</a>
            </div>
        @endif
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>