<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f4f7fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            direction: rtl;
        }

        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-container img {
            max-width: 400px;
            margin-bottom: 1rem;
        }

        .login-container h2 {
            margin-bottom: 1rem;
            font-size: 24px;
            color: #333;
        }

        .form-group {
            margin-bottom: 1rem;
            text-align: right;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #3b82f6;
            outline: none;
        }

        .form-group .error {
            margin-top: 0.5rem;
            font-size: 13px;
            color: #e74c3c;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .remember-me input {
            margin-left: 0.5rem;
        }

        .remember-me label {
            font-size: 14px;
            color: #555;
        }

        .forgot-password {
            text-align: left;
            margin-bottom: 1rem;
        }

        .forgot-password a {
            font-size: 14px;
            color: #3b82f6;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #1d4ed8;
        }

        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            background-color: #3b82f6;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>
<body>

<div class="login-container">
    <img src="{{ asset('assets/img/logo-test1.png') }}" alt="Logo">
    <h2>تسجيل الدخول</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">البريد الالكتروني</label>
            <input id="email" type="email" name="email" required autofocus autocomplete="username">
            <!-- Error message -->
            <div class="error">{{ $errors->get('email')[0] ?? '' }}</div>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            <!-- Error message -->
            <div class="error">{{ $errors->get('password')[0] ?? '' }}</div>
        </div>

        <!-- Remember Me -->
        <div class="remember-me">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me"> تذكرني</label>
        </div>

        <!-- Forgot Password -->
        <div class="forgot-password">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">هل نسيت كلمة المرور؟</a>
            @endif
        </div>
        <!--  -->
        <div class="forgot-password">
            @if (Route::has('password.request'))
                <a href="https://wa.me/+905537098748">طلب حساب من الادارة</a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-primary">تسجيل دخول</button>
    </form>
</div>

</body>
</html>
