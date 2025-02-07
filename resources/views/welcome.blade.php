
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping - Laravel E-commerce</title>
    <link href="" rel="">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <a href="tel:+1000000001" class="text-gray-600">+1000000001</a>
                    <a href="mailto:ecommerce@laravel.com" class="text-gray-600">ecommerce@laravel.com</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="" class="text-gray-600">Track Order</a>
                    <a href="" class="text-gray-600">Dashboard</a>
                    <a href="" class="text-gray-600">Logout</a>
                </div>
            </div>
            
            <div class="flex justify-between items-center py-4">
                <a href="/" class="flex items-center">
                    <span class="text-xl font-bold">Shopping</span>
                </a>
                
                <div class="flex-1 px-12">
                    <div class="flex">
                        <select class="border-gray-300 rounded-l">
                            <option>All Category</option>
                        </select>
                        <input type="text" placeholder="Search Products Here..." class="flex-1 border-gray-300">
                        <button class="bg-gray-800 text-white px-6 py-2 rounded-r">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="" class="relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-purple-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">0</span>
                    </a>
                    <a href="" class="relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-purple-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">0</span>
                    </a>
                </div>
            </div>
            
            <nav class="bg-gray-800 text-white">
                <div class="container mx-auto">
                    <ul class="flex space-x-8 py-4">
                        <li><a href="/" class="hover:text-gray-300">Home</a></li>
                        <li><a href="/about" class="hover:text-gray-300">About Us</a></li>
                        <li><a href="/products" class="hover:text-gray-300">Products</a></li>
                        <li><a href="/blog" class="hover:text-gray-300">Blog</a></li>
                        <li><a href="/contact" class="hover:text-gray-300">Contact Us</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>




@section('content')
<div class="relative">
    <div class="container mx-auto px-4 py-12">
        <div class="bg-gray-100 rounded-lg p-12">
            <!-- Conteneur flex pour aligner le texte et l'image -->
            <div class="flex flex-col md:flex-row items-center justify-between">
                <!-- Texte et bouton à gauche -->
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-5xl font-bold mb-4">Exclusive Online Offers</h1>
                    <p class="text-xl text-gray-600 mb-8">Online Offers: Yours to Discover!</p>
                    <a href="/shop" class="bg-gray-800 text-white px-8 py-3 rounded-lg inline-block">SHOP NOW</a>
                </div>
                <!-- Image à droite -->
                <div class="md:w-1/2">
                    <img 
                        src="https://www.globalbrandsmagazine.com/wp-content/uploads/2023/01/Top-10-Mobile-Brands-in-World-1.webp" 
                        alt="Exclusive Offers" 
                        class="w-full h-auto rounded-lg shadow-lg"
                        loading="lazy"
                    >
                </div>
            </div>
        </div>
    </div>
</div>

<section class="py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">New Items</h2>
        
        <div class="flex space-x-4 mb-8">
            <button class="px-6 py-2 bg-black text-white rounded">RECENTLY ADDED</button>
            <button class="px-6 py-2 border rounded">MEN'S FASHION</button>
            <button class="px-6 py-2 border rounded">WOMEN'S FASHION</button>
            <button class="px-6 py-2 border rounded">KID'S</button>
        </div>
        
        <div class="grid grid-cols-4 gap-6">
        
            <div class="group">
                <div class="relative">
                    <img src="" alt="" class="w-full h-64 object-cover">
                 
                        <span class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded">HOT</span>
                 
                        <span class="absolute top-4 left-4 bg-blue-500 text-white px-3 py-1 rounded">NEW</span>
                  
                        <span class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded">SOLD OUT</span>
                   
                </div>
                <h3 class="mt-4 text-lg font-medium"></h3>
                <div class="flex items-center space-x-2 mt-2">
                    <span class="text-lg font-bold"></span>
                  
                        <span class="text-gray-500 line-through"></span>
                 
                </div>
            </div>
          
        </div>
    </div>
</section>
