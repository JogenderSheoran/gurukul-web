<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoAid - Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            overflow: hidden;
        }

        .blob {
            position: absolute;
            opacity: 0.08;
            border-radius: 50%;
            animation: float linear infinite;
        }

        .blob1 {
            width: 350px;
            height: 350px;
            background: #dc143c;
            top: -10%;
            left: -5%;
            animation: float 20s linear infinite;
        }

        .blob2 {
            width: 300px;
            height: 300px;
            background: #1e5a96;
            bottom: -10%;
            right: -5%;
            animation: float 25s linear infinite reverse;
        }

        .blob3 {
            width: 250px;
            height: 250px;
            background: #dc143c;
            top: 50%;
            left: 50%;
            animation: float 30s linear infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px) translateX(0px);
            }
            50% {
                transform: translateY(-50px) translateX(30px);
            }
            100% {
                transform: translateY(0px) translateX(0px);
            }
        }

        .login-container {
            width: 100%;
            max-width: 520px;
            z-index: 10;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 25px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: cardPop 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes cardPop {
            0% {
                opacity: 0;
                transform: scale(0.75) rotateY(-15deg);
            }
            100% {
                opacity: 1;
                transform: scale(1) rotateY(0deg);
            }
        }

        .login-header {
            background: linear-gradient(135deg, #ffffff 0%, #f0f4f8 100%);
            padding: 50px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-bottom: 3px solid #dc143c;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(220, 20, 60, 0.1), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }
            100% {
                left: 100%;
            }
        }

        .logo-container {
            margin-bottom: 20px;
            animation: logoZoom 0.8s ease;
        }

        .logo-text {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -1px;
        }

        .logo-go {
            color: #dc143c;
            animation: colorPulse 2s ease-in-out infinite;
        }

        .logo-aid {
            color: #1e5a96;
        }

        .logo-tagline {
            font-size: 12px;
            color: #666;
            font-weight: 500;
            letter-spacing: 0.5px;
            animation: fadeInDown 0.8s ease 0.2s backwards;
        }

        @keyframes logoZoom {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes colorPulse {
            0%, 100% {
                filter: drop-shadow(0 0 0px rgba(220, 20, 60, 0));
            }
            50% {
                filter: drop-shadow(0 0 8px rgba(220, 20, 60, 0.4));
            }
        }

        .login-subtitle {
            font-size: 16px;
            color: #555;
            margin-top: 15px;
            animation: fadeInDown 0.8s ease 0.3s backwards;
        }

        .login-body {
            padding: 45px;
        }

        .form-group {
            margin-bottom: 28px;
            animation: slideInLeft 0.6s ease backwards;
        }

        .form-group:nth-child(1) { animation-delay: 0.4s; }
        .form-group:nth-child(2) { animation-delay: 0.5s; }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-40px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-label {
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            font-size: 14px;
            display: block;
            position: relative;
        }

        .form-label i {
            margin-right: 8px;
            color: #dc143c;
        }

        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 16px 18px;
            font-size: 14px;
            transition: all 0.4s ease;
            position: relative;
            background: #f8fafb;
        }

        .form-control:focus {
            border-color: #dc143c;
            box-shadow: 0 0 0 0.4rem rgba(220, 20, 60, 0.1);
            background: white;
            outline: none;
            transform: translateY(-3px);
        }

        .form-control::placeholder {
            color: #bbb;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            margin-bottom: 30px;
            animation: slideInLeft 0.6s ease 0.6s backwards;
        }

        .form-check-label {
            margin-bottom: 0;
            color: #666;
            cursor: pointer;
            user-select: none;
            font-weight: 500;
        }

        .form-check-input {
            border-color: #e5e7eb;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-check-input:checked {
            background-color: #dc143c;
            border-color: #dc143c;
            box-shadow: 0 0 0 0.2rem rgba(220, 20, 60, 0.25);
            animation: checkmark 0.4s ease;
        }

        @keyframes checkmark {
            0% {
                transform: scale(0);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        a {
            color: #1e5a96;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            font-weight: 600;
        }

        a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #1e5a96;
            transition: width 0.3s ease;
        }

        a:hover::after {
            width: 100%;
        }

        a:hover {
            color: #dc143c;
        }

        .btn-login {
            background: linear-gradient(135deg, #dc143c 0%, #b81030 100%);
            border: none;
            color: white;
            font-weight: 700;
            padding: 16px;
            border-radius: 12px;
            width: 100%;
            transition: all 0.4s ease;
            margin-top: 20px;
            position: relative;
            overflow: hidden;
            animation: slideInLeft 0.6s ease 0.6s backwards;
            font-size: 16px;
            letter-spacing: 0.5px;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.7s ease, height 0.7s ease;
        }

        .btn-login:hover::before {
            width: 350px;
            height: 350px;
        }

        .btn-login:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 40px rgba(220, 20, 60, 0.35);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .btn-login span {
            position: relative;
            z-index: 1;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 35px 0;
            color: #999;
            font-size: 13px;
            animation: slideInLeft 0.6s ease 0.7s backwards;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 2px;
            background: linear-gradient(to right, transparent, #e5e7eb, transparent);
        }

        .divider span {
            margin: 0 12px;
            font-weight: 500;
        }

        .social-login {
            display: flex;
            gap: 18px;
            margin-bottom: 25px;
            animation: slideInLeft 0.6s ease 0.8s backwards;
        }

        .social-btn {
            flex: 1;
            border: 2.5px solid #e5e7eb;
            background: white;
            border-radius: 12px;
            padding: 14px;
            color: #666;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            position: relative;
            overflow: hidden;
        }

        .social-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: #1e5a96;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.5s ease, height 0.5s ease;
            z-index: 0;
        }

        .social-btn span {
            position: relative;
            z-index: 1;
        }

        .social-btn:hover {
            border-color: #1e5a96;
            color: white;
        }

        .social-btn:hover::before {
            width: 160px;
            height: 160px;
        }

        .signup-link {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-top: 25px;
            animation: slideInLeft 0.6s ease 0.9s backwards;
        }

        .signup-link a {
            color: #dc143c;
            font-weight: 700;
        }

        .signup-link a:hover {
            color: #b81030;
        }

        .pulse {
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(220, 20, 60, 0.7);
            }
            50% {
                box-shadow: 0 0 0 12px rgba(220, 20, 60, 0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 480px) {
            .login-body {
                padding: 30px;
            }

            .login-header {
                padding: 40px 20px;
            }

            .logo-text {
                font-size: 34px;
            }

            .blob1, .blob2, .blob3 {
                opacity: 0.04;
            }
        }
    </style>
</head>
<body>
    <div class="bg-animation">
        <div class="blob blob1"></div>
        <div class="blob blob2"></div>
        <div class="blob blob3"></div>
    </div>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo-container">
                    <div class="logo-text">
                        <span class="logo-go">Go</span><span class="logo-aid">Aid</span>
                    </div>
                    <div class="logo-tagline">हर पल आपके साथ</div>
                </div>
                <p class="login-subtitle">Welcome to GoAid</p>
            </div>

            <div class="login-body">
                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i>Email Address
                        </label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i>Password
                        </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="remember-forgot">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-login" id="submitBtn">
                        <span>Sign In</span>
                    </button>
                </form>

                <div class="divider">
                    <span>Or continue with</span>
                </div>

                <div class="social-login">
                    <a href="#" class="social-btn" title="Login with Google">
                        <span><i class="fab fa-google"></i></span>
                    </a>
                    <a href="#" class="social-btn" title="Login with Facebook">
                        <span><i class="fab fa-facebook-f"></i></span>
                    </a>
                    <a href="#" class="social-btn" title="Login with Twitter">
                        <span><i class="fab fa-twitter"></i></span>
                    </a>
                </div>

                <div class="signup-link">
                    Don't have an account? <a href="#">Sign up now</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        const form = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');
        const originalBtnHtml = submitBtn.innerHTML;

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span><i class="fas fa-spinner fa-spin"></i> Signing in...</span>';
            
            // Submit the form after a short delay to show the loading state
            setTimeout(() => {
                form.submit();
            }, 500);
        });

        // Keep the focus animation
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.parentElement.style.animation = 'none';
            });
        });

        // Restore button state if there are validation errors
        @if($errors->any())
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnHtml;
        @endif
    </script>
</body>
</html>