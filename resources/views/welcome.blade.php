<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    <style>
        /* Sesuaikan dengan template yang diberikan */
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f0f8ff; /* Light Blue background */
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url(https://upload.wikimedia.org/wikipedia/commons/d/da/RRI_Pro_2_Sumenep_2023_%28Alt%29.svg);
            object-fit: cover;
        }

        .login-container {
            background: #46DFBB;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #007bff; /* Blue heading */
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .login-container input {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            font-size: 1rem;
        }

        .login-container button {
            width: 100%;
            padding: 0.75rem;
            background-color: rgb(6, 53, 104); /* Blue button */
            color: white;
            border: none;
            border-radius: 0.375rem;
            font-size: 1rem;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .login-container .forgot-password {
            text-align: center;
            margin-top: 1rem;
        }

        .login-container .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }

        .login-container .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>

    <!-- Form Login -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Input -->
        <div>
            <label for="email" class="sr-only">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
        </div>

        <!-- Password Input + Toggle -->
        <div style="position: relative;">
            <label for="password" class="sr-only">Password</label>
            <input id="password" type="password" name="password" required placeholder="Password">
            <span onclick="togglePassword()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                👁️
            </span>
        </div>

        <!-- Remember Me Checkbox -->
        <div style="display: flex; align-items: center; margin-top: 10px;">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember" style="margin-right: 300px; cursor: pointer;">Remember Me</label>
        </div>

        <!-- Submit Button -->
        <button type="submit">Log in</button>
    </form>

    <!-- Forgot Password Link -->
    <div class="forgot-password">
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">Forgot your password?</a>
        @endif
    </div>
</div>

<!-- JS Toggle Password -->
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    }
</script>
</body>
</html>
