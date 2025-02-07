<!-- resources/views/smartphones/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="flex mb-8">
        <ol class="flex items-center space-x-2">
            <li><a href="/" class="text-gray-600 hover:text-gray-900">Home</a></li>
            <li class="text-gray-400">/</li>
            <li><a href="{{ route('smartphones.index') }}" class="text-gray-600 hover:text-gray-900">Smartphones</a></li>
            <li class="text-gray-400">/</li>
            <li class="text-gray-900">{{ $smartphone->nom }}</li>
        </ol>
    </nav>

    <!-- Product Details -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Image Section -->
        <div class="space-y-4">
            <div class="bg-white p-4 rounded-lg shadow">
                <img 
                    src="{{ $smartphone->photo }}" 
                    alt="{{ $smartphone->nom }}" 
                    class="w-full h-auto object-cover rounded-lg"
                >
            </div>
        </div>

        <!-- Info Section -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $smartphone->nom }}</h1>
                
                <div class="flex items-center gap-4 mb-6">
                    <span class="text-3xl font-bold text-gray-900">${{ number_format($smartphone->prix, 2) }}</span>
                    @if($smartphone->regular_prix > $smartphone->sale_prix)
                        <span class="text-xl text-gray-500 line-through">${{ number_format($smartphone->regular_prix, 2) }}</span>
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                            -{{ round((($smartphone->regular_prix - $smartphone->sale_prix) / $smartphone->regular_prix) * 100) }}%
                        </span>
                    @endif
                </div>

                <div class="prose max-w-none mb-6">
                    <p class="text-gray-600">{{ $smartphone->description }}</p>
                </div>

                <!-- Specifications -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <span class="text-sm text-gray-500">Brand</span>
                        <p class="font-medium text-gray-900">{{ $smartphone->marque }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <span class="text-sm text-gray-500">RAM</span>
                        <p class="font-medium text-gray-900">{{ $smartphone->ram }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <span class="text-sm text-gray-500">Storage</span>
                        <p class="font-medium text-gray-900">{{ $smartphone->rom }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <span class="text-sm text-gray-500">Screen</span>
                        <p class="font-medium text-gray-900">{{ $smartphone->ecran }}</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-4">
                    <button 
                        onclick="handleCart({{ $smartphone->id }})"
                        class="flex-1 bg-gray-800 hover:bg-gray-700 text-white px-8 py-3 rounded-lg transition-colors"
                        {{ $smartphone->is_sold_out ? 'disabled' : '' }}
                    >
                        {{ $smartphone->is_sold_out ? 'Sold Out' : 'Add to Cart' }}
                    </button>
                    <button 
                        onclick="handleWishlist({{ $smartphone->id }})"
                        class="p-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                </div>
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
            showNotification('Product added to cart successfully', 'success');
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Failed to add product to cart', 'error');
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
            showNotification('Product added to wishlist successfully', 'success');
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification('Failed to add product to wishlist', 'error');
    }
};

const updateCartCounter = (count) => {
    document.querySelector('.cart-count').textContent = count;
};

const updateWishlistCounter = (count) => {
    document.querySelector('.wishlist-count').textContent = count;
};

const showNotification = (message, type) => {
    alert(message);
};
</script>
@endpush
@endsection