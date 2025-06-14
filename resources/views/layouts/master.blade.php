<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneShop</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-950 text-gray-100">

    <!-- Header -->
    <header class="bg-gray-900 shadow-md py-4 px-6 flex justify-between items-center sticky top-0 z-50">
        <div class="text-3xl font-extrabold text-cyan-400 tracking-wide">
            <a href="/">📱 PhoneShop</a>
        </div>
        <nav class="hidden md:flex space-x-6 text-lg font-semibold">
            <a href="/" class="hover:text-violet-400 transition duration-300">Home</a>
            <a href="#" class="hover:text-violet-400 transition duration-300">About</a>
            <a href="#" class="hover:text-violet-400 transition duration-300">Contact</a>
        </nav>

        <div class="flex items-center space-x-5">
            @auth
                <span class="text-cyan-400 font-bold text-lg flex items-center space-x-2">
                    <i class="ri-user-3-fill"></i>
                    <span>{{ auth()->user()->name }}</span>
                </span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="bg-violet-500 hover:bg-violet-600 px-4 py-2 rounded text-sm font-semibold">Logout</button>
                </form>
            @else
                <a href="/login" class="bg-cyan-500 hover:bg-cyan-600 px-4 py-2 rounded text-sm font-semibold">Login</a>
                <a href="/register" class="bg-violet-500 hover:bg-violet-600 px-4 py-2 rounded text-sm font-semibold">Sign Up</a>
            @endauth
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-10 px-6 md:px-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 pt-10 pb-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 px-6">
            <!-- Branding -->
            <div>
                <h2 class="text-3xl font-extrabold text-cyan-400 flex items-center space-x-2">
                    <span>📱</span>
                    <span>PhoneShop</span>
                </h2>
                <p class="mt-3 text-sm text-gray-400">Your go-to store for the latest smartphones and gadgets.</p>
            </div>
            <!-- Support -->
            <div>
                <h2 class="text-xl font-bold text-white mb-4">Support</h2>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-cyan-400"><i class="ri-question-line mr-2"></i>FAQs</a></li>
                    <li><a href="#" class="hover:text-cyan-400"><i class="ri-service-line mr-2"></i>Help Center</a></li>
                    <li><a href="#" class="hover:text-cyan-400"><i class="ri-close-circle-line mr-2"></i>Return Policy</a></li>
                </ul>
            </div>

            <!-- Social -->
            <div>
                <h2 class="text-xl font-bold text-white mb-4">Connect With Us</h2>
                <div class="flex space-x-4 text-2xl">
                    <a href="https://facebook.com/prabesh.ach" class="text-blue-500 hover:text-blue-400"><i class="ri-facebook-circle-fill"></i></a>
                    <a href="https://twitter.com/PrabeshAch33319" class="text-sky-400 hover:text-sky-300"><i class="ri-twitter-fill"></i></a>
                    <a href="https://instagram.com/prabesh_ach" class="text-pink-500 hover:text-pink-400"><i class="ri-instagram-fill"></i></a>
                    <a href="mailto:prabesh11100@gmail.com" class="text-amber-400 hover:text-amber-300"><i class="ri-mail-fill"></i></a>
                    <a href="tel:+9779812965110" class="text-green-400 hover:text-green-300"><i class="ri-phone-fill"></i></a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="text-center text-sm text-gray-500 mt-10 border-t border-gray-700 pt-4">
            &copy; 2025 PhoneShop. All rights reserved.
        </div>
    </footer>
</body>
</html>
