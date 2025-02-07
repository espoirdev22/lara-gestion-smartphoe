@extends('layouts.app')

@section('content')
<div class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <nav class="text-sm mb-8">
            <ol class="flex items-center space-x-2">
                <li><a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700">Home</a></li>
                <li><span class="text-gray-400">/</span></li>
                <li> <a href="{{ route('smartphones.index') }}" class="text-gray-900">Smartphones</a></li>
            </ol>
        </nav>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <div class="lg:w-64 flex-shrink-0">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Categories</h2>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="checkbox" id="brand1" class="rounded border-gray-300">
                            <label for="brand1" class="ml-2 text-gray-700">Samsung</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="brand2" class="rounded border-gray-300">
                            <label for="brand2" class="ml-2 text-gray-700">Apple</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="brand3" class="rounded border-gray-300">
                            <label for="brand3" class="ml-2 text-gray-700">Xiaomi</label>
                        </div>
                    </div>

                    <hr class="my-6">

                    <h2 class="text-lg font-semibold mb-4">Price Range</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm text-gray-600">Min Price</label>
                            <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="0">
                        </div>
                        <div>
                            <label class="text-sm text-gray-600">Max Price</label>
                            <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="2000">
                        </div>
                    </div>

                    <hr class="my-6">

                    <h2 class="text-lg font-semibold mb-4">Storage</h2>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="checkbox" id="storage1" class="rounded border-gray-300">
                            <label for="storage1" class="ml-2 text-gray-700">64GB</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="storage2" class="rounded border-gray-300">
                            <label for="storage2" class="ml-2 text-gray-700">128GB</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="storage3" class="rounded border-gray-300">
                            <label for="storage3" class="ml-2 text-gray-700">256GB</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1">
                <!-- Sort and View Options -->
                <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <label class="text-gray-600">Sort By:</label>
                            <select class="rounded-md border-gray-300 shadow-sm">
                                <option>Latest</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                                <option>Most Popular</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="p-2 rounded-lg hover:bg-gray-100">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                </svg>
                            </button>
                            <button class="p-2 rounded-lg hover:bg-gray-100">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($smartphones as $smartphone)
                    <div class="group bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="relative aspect-w-1 aspect-h-1 rounded-t-xl overflow-hidden">
                            <a href="{{ route('smartphones.show', $smartphone) }}">
                                <img 
                                src="{{ $smartphone->photo}}" 
                                    alt="{{ $smartphone->nom }}" 
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </a>
                        </div>

                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 group-hover:text-gray-700 line-clamp-2">
                                {{ $smartphone->nom }}
                            </h3>
                            <p class="mt-2 text-sm text-gray-600">{{ $smartphone->marque }}</p>
                            
                            <div class="mt-4 space-y-2">
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    RAM: {{ $smartphone->ram }}
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                                    </svg>
                                    Storage: {{ $smartphone->rom }}
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Screen: {{ $smartphone->ecran }}
                                </div>
                            </div>

                            <div class="mt-6">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-2xl font-bold text-gray-900">${{ number_format($smartphone->prix, 2) }}</span>
                                </div>
                                
                                <div class="flex gap-2">
                                    <button 
                                        class="flex-1 bg-gray-800 hover:bg-gray-700 text-white px-4 py-2.5 rounded-lg transition-colors text-sm font-medium"
                                        onclick="handleCart({{ $smartphone->id }})"
                                    >
                                        Add to Cart
                                    </button>
                                    <button 
                                        class="p-2.5 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors"
                                        onclick="handleWishlist({{ $smartphone->id }})"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500">No smartphones available</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($smartphones->hasPages())
                <div class="mt-8">
                    {{ $smartphones->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
const handleCart = async (id) => {
    try {
        const response = await fetch(`/cart/add/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });
        const data = await response.json();
        if (data.success) {
            updateCartCounter(data.cartCount);
            alert('Product added to cart successfully');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to add product to cart');
    }
};

const handleWishlist = async (id) => {
    try {
        const response = await fetch(`/wishlist/add/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });
        const data = await response.json();
        if (data.success) {
            updateWishlistCounter(data.wishlistCount);
            alert('Product added to wishlist successfully');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to add product to wishlist');
    }
};
</script>
@endpush
@endsection