<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin Login | Gurukul Takshshila</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            
            .login-card {
                background: white;
                border-radius: 20px;
                box-shadow: 0 20px 60px rgba(0,0,0,0.3);
                border: 3px solid #ff6600;
            }
            
            .logo-container {
                background: white;
                padding: 20px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                margin-bottom: 30px;
            }
            
            .logo-container img {
                max-width: 150px;
                height: auto;
            }
            
            .btn-orange {
                background-color: #ff6600;
                color: white;
                padding: 12px 24px;
                border-radius: 8px;
                font-weight: 600;
                transition: all 0.3s;
                border: none;
                width: 100%;
            }
            
            .btn-orange:hover {
                background-color: #e55a00;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(255, 102, 0, 0.4);
            }
            
            .form-input {
                border: 2px solid #e0e0e0;
                border-radius: 8px;
                padding: 12px 15px;
                transition: all 0.3s;
            }
            
            .form-input:focus {
                border-color: #ff6600;
                outline: none;
                box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.1);
            }
            
            .login-title {
                color: #ff6600;
                font-size: 28px;
                font-weight: 700;
                margin-bottom: 10px;
            }
            
            .login-subtitle {
                color: #666;
                font-size: 14px;
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="logo-container">
                <img src="{{ asset('frontend/img/logo.jpeg') }}" alt="Gurukul Takshshila Logo">
            </div>

            <div class="w-full sm:max-w-md px-8 py-8 login-card" style="padding:20px; !important;">
                <div class="text-center mb-6">
                    <h2 class="login-title">Admin Login</h2>
                    <p class="login-subtitle">Welcome back! Please login to your account.</p>
                </div>
                {{ $slot }}
            </div>
            
            <div class="mt-6 text-center text-white text-sm">
                <p>&copy; {{ date('Y') }} Gurukul Takshshila. All rights reserved.</p>
            </div>
        </div>
    </body>
</html>
