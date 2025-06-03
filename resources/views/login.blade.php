<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMKN 7 BATAM</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="{{ asset('assets/img/logo-skaju.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl overflow-hidden flex flex-col md:flex-row">
        
        <!-- Left Panel (Visible only on md and up) -->
        <div class="hidden md:flex flex-col items-center justify-center bg-gradient-to-r from-yellow-400 to-yellow-600 text-white w-1/2 p-10">
            <img src="{{ asset('assets/img/logo-skaju.png') }}" alt="Logo SMKN 7 BATAM" class="w-24 mb-6">
            <h1 class="text-3xl font-bold mb-4">Welcome Admin!</h1>
            <p class="text-center text-sm">Access your administrator dashboard by signing in with your credentials.</p>
        </div>

        <!-- Right Panel (Login Form / Tampilan Saja) -->
        <div class="w-full md:w-1/2 p-10">
            <div class="flex flex-col space-y-4">
                <h1 class="text-2xl font-bold text-center mb-6">Sign In</h1>
                
                <input type="email" placeholder="Email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                
                <input type="password" placeholder="Password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                
                <a href="#" class="text-sm text-right text-gray-500 hover:text-gray-700">Forgot your password?</a>
                
                <a href="/dashboard"
                    class="text-center bg-yellow-500 text-white uppercase font-bold py-3 rounded-full hover:bg-yellow-400 transition duration-300">
                    Login
                </a>
            </div>
        </div>

    </div>
</body>

</html>
