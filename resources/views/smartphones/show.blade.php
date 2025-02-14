@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-8" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-sm">
            <li>
                <a href="/" class="text-blue-600 hover:text-blue-800 transition-colors">
                    Accueil
                </a>
            </li>
            <li class="text-gray-500">/</li>
            <li>
                <a href="{{ route('smartphones.index') }}" class="text-blue-600 hover:text-blue-800 transition-colors">
                    Smartphones
                </a>
            </li>
            <li class="text-gray-500">/</li>
            <li class="text-gray-900 font-medium">{{ $smartphone->nom }}</li>
        </ol>
    </nav>

    <!-- Product Details -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Image Section -->
        <div>
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <img 
                    src="{{ $smartphone->photo }}" 
                    alt="{{ $smartphone->nom }}" 
                    class="w-full h-auto object-cover rounded-lg"
                    loading="lazy"
                >
            </div>
        </div>

        <!-- Info Section -->
        <div class="space-y-8">
            <div class="bg-white p-8 rounded-xl shadow-sm">
                <!-- Title and Price -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $smartphone->nom }}</h1>
                    
                    <div class="flex items-baseline gap-3">
                        <span class="text-3xl font-bold text-gray-900">
                            {{ number_format($smartphone->prix, 2) }} cfa
                        </span>
                        @if($smartphone->regular_prix > $smartphone->sale_prix)
                            <span class="text-xl text-gray-500 line-through">
                                {{ number_format($smartphone->regular_prix, 2) }} cfa
                            </span>
                            <span class="bg-green-100 text-green-800 px-4 py-1 rounded-full text-sm font-semibold">
                                -{{ round((($smartphone->regular_prix - $smartphone->sale_prix) / $smartphone->regular_prix) * 100) }}%
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Description -->
                <div class="prose prose-sm max-w-none mb-8">
                    <h2 class="text-xl font-semibold mb-3">Description</h2>
                    <p class="text-gray-600 leading-relaxed">{{ $smartphone->description }}</p>
                </div>

                <!-- Specifications -->
                <div class="space-y-6">
                    <h2 class="text-xl font-semibold">Caractéristiques</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <span class="text-sm text-gray-600 block mb-1">Marque</span>
                            <p class="font-medium text-gray-900">{{ $smartphone->marque }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <span class="text-sm text-gray-600 block mb-1">Mémoire RAM</span>
                            <p class="font-medium text-gray-900">{{ $smartphone->ram }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <span class="text-sm text-gray-600 block mb-1">Stockage</span>
                            <p class="font-medium text-gray-900">{{ $smartphone->rom }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <span class="text-sm text-gray-600 block mb-1">Écran</span>
                            <p class="font-medium text-gray-900">{{ $smartphone->ecran }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <span class="text-sm text-gray-600 block mb-1">couleur</span>
                            <p class="font-medium text-gray-900">{{ $smartphone->couleurs_disponibles }}</p>
                        </div>
                     
                    </div>
                </div>

                <!-- Availability Status -->
                <div class="mt-8">
                    @if($smartphone->is_sold_out)
                        <div class="bg-red-50 text-red-700 px-4 py-3 rounded-lg inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            Produit momentanément indisponible
                        </div>
                    @else
                        <div class="bg-green-50 text-green-700 px-4 py-3 rounded-lg inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            En stock
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection