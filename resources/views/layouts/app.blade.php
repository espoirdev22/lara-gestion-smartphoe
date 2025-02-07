<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shop the latest smartphones and electronics at Shopping - Laravel E-commerce">
    <title>Shopping - Laravel E-commerce</title>
    <link rel="canonical" href="{{ url()->current() }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-gray-50">
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <!-- Top Bar -->
            <div class="flex justify-between items-center py-2 text-sm border-b">
                <div class="flex items-center space-x-6">
                    <a href="tel:+221776716206" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        +221776716206
                    </a>
                    <a href="mailto:espoir199@gmail.com" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        ecommerce@laravel.com
                    </a>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="" class="text-gray-600 hover:text-gray-900">Track Order</a>
                    <a href="" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                    <form method="POST" action="" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900">Logout</button>
                    </form>
                </div>
            </div>
            
            <!-- Main Header -->
            <div class="flex justify-between items-center py-4">
                <a href="/" class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span class="text-2xl font-bold text-gray-900">Shopping</span>
                </a>
                
                <div class="flex-1 max-w-2xl mx-8">
            <div class="flex">
                <select class="px-4 py-2 border-r rounded-l bg-white">
                    <option>All Category</option>
                </select>
                <input
                    type="text"
                    placeholder="Search Products Here....."
                    class="flex-1 px-4 py-2 border-l"
                />
                <button class="bg-gray-800 text-white px-6 py-2 rounded-r">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>
                
                <div class="flex items-center space-x-6">
                    <a href="" class="relative group">
                        <svg class="w-6 h-6 group-hover:text-gray-700 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-purple-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">
                     
                        </span>
                    </a>
                    <a href="" class="relative group">
                        <svg class="w-6 h-6 group-hover:text-gray-700 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-purple-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">
                          
                        </span>
                    </a>
                </div>
            </div>
            
            <!-- Navigation -->
<nav class="bg-gray-800 text-white rounded-lg mt-4">
    <div class="container mx-auto">
        <ul class="flex space-x-8 py-4 px-6">
            <li>
                <a href="{{ route('home') }}" class="hover:text-gray-300 transition-colors {{ request()->is('/') ? 'text-purple-400' : 'text-white' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="/about" class="hover:text-gray-300 transition-colors {{ request()->is('about') ? 'text-purple-400' : 'text-white' }}">
                    About Us
                </a>
            </li>
            <li>
                <a href="{{ route('smartphones.index') }}" 
                   class="hover:text-gray-300 transition-colors {{ request()->routeIs('smartphones.*') ? 'text-purple-400' : 'text-white' }} flex items-center gap-2">
                    Products
                    @if(request()->routeIs('smartphones.*'))
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path>
                        </svg>
                    @endif
                </a>
            </li>
            <li>
                <a href="/blog" class="hover:text-gray-300 transition-colors {{ request()->is('blog') ? 'text-purple-400' : 'text-white' }}">
                    Blog
                </a>
            </li>
            <li>
                <a href="/contact" class="hover:text-gray-300 transition-colors {{ request()->is('contact') ? 'text-purple-400' : 'text-white' }}">
                    Contact Us
                </a>
            </li>
        </ul>
    </div>
</nav>
        </div>
    </header>

    <main class="flex-grow">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">About Us</h3>
                    <p class="text-gray-400">Your trusted source for quality electronics and smartphones.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/privacy-policy" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                        <li><a href="/terms" class="text-gray-400 hover:text-white">Terms & Conditions</a></li>
                        <li><a href="/shipping" class="text-gray-400 hover:text-white">Shipping Information</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact Info</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>123 Shopping Street</li>
                        <li>City, Country</li>
                        <li>+221776716206</li>
                        <li>ecommerce@laravel.com</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Newsletter</h3>
                    <form action="" method="POST" class="space-y-4">
                        @csrf
                        <input 
                            type="email" 
                            name="email" 
                            placeholder="Your email address" 
                            class="w-full px-4 py-2 rounded bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500"
                        >
                        <button type="submit" class="bg-purple-500 hover:bg-purple-600 px-6 py-2 rounded text-white transition-colors">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <p class="text-center text-gray-400">&copy; {{ date('Y') }} Shopping. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>