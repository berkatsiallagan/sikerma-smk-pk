<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SMKN 7 BATAM</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="{{ asset('assets/img/logo-skaju.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8fafc;
        }
        .login-container {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            position: relative; /* Added for close button positioning */
        }
        .btn-login {
            letter-spacing: 0.5px;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(251, 191, 36, 0.3);
        }
        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(251, 191, 36, 0.2);
        }
        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        .close-btn:hover {
            color: #ef4444;
            transform: scale(1.1);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
    <div class="login-container bg-white rounded-xl w-full max-w-4xl overflow-hidden flex flex-col md:flex-row">
        
        <!-- Close Button -->
        <a href="/" class="close-btn">
            <i class="fas fa-times"></i>
        </a>
        
        <!-- Left Panel -->
        <div class="hidden md:flex flex-col items-center justify-center bg-gradient-to-br from-yellow-400 to-yellow-500 text-white w-1/2 p-8 lg:p-12">
            <div class="text-center">
                <img src="{{ asset('assets/img/logo-skaju.png') }}" alt="Logo SMKN 7 BATAM" class="w-28 mx-auto mb-6">
                <h1 class="text-3xl font-bold mb-4">Selamat Datang Admin!</h1>
                <p class="text-center text-yellow-100">Masuk ke dashboard administrator dengan kredensial Anda.</p>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="w-full md:w-1/2 p-8 lg:p-12">
            <div class="flex flex-col space-y-6">
                <div class="text-center">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Masuk Admin</h1>
                    <p class="text-gray-500 text-sm">Silakan masuk dengan akun Anda</p>
                </div>
                
                @if ($errors->any())
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Masuk',
                                html: `{!! implode('<br>', $errors->all()) !!}`,
                                confirmButtonColor: false,
                                timer: 2000, // otomatis hilang dalam 2 detik
                                timerProgressBar: false
                            });
                        });
                    </script>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" placeholder="email@smkn7batam.sch.id" value="{{ old('email') }}"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg input-field focus:outline-none focus:border-yellow-400" required />
                        </div>
                        
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                            <div class="relative">
                                <input type="password" id="password" name="kata_sandi" placeholder="••••••••"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg input-field focus:outline-none focus:border-yellow-400" required />
                                <button type="button" class="absolute right-3 top-3 text-gray-400 hover:text-gray-600" onclick="togglePassword(this)">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400 border-gray-300 rounded">
                                <label for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-sm text-yellow-600 hover:text-yellow-500 font-medium">Lupa kata sandi?</a>
                        </div>
                    </div>
                    
                    <button type="submit"
                        class="w-full text-center bg-yellow-500 text-white font-bold py-3 rounded-lg btn-login hover:bg-yellow-400 transition duration-300">
                        <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                    </button>
                </form>
                
                <div class="text-center text-sm text-gray-500 mt-4">
                    © <span id="year">{{ date('Y') }}</span> SMKN 7 BATAM. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <script>
        // @ts-nocheck
        function togglePassword(button) {
            const passwordInput = document.getElementById('password');
            const eyeIcon = button.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>
</html>