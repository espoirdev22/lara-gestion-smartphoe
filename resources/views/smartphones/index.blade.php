@extends('layouts.app')

@section('content')
<div class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <nav class="text-sm mb-8">
            <ol class="flex items-center space-x-2">
                <li><a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700">Home</a></li>
                <li><span class="text-gray-400">/</span></li>
                <li><a href="{{ route('smartphones.index') }}" class="text-gray-900">Smartphones</a></li>
            </ol>
        </nav>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <!-- Remplacer toute la section des filtres par ce code simple -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <form action="{{ route('smartphones.index') }}" method="GET">
                    <!-- Filtre par marque -->
                    <div class="mb-6">
                        <label for="marque" class="block text-lg font-semibold mb-4">Marque</label>
                        <select name="marque" id="marque" class="w-full rounded-md border-gray-300 shadow-sm" onchange="this.form.submit()">
                            <option value="">Toutes les marques</option>
                            <option value="Samsung" {{ request('marque') == 'Samsung' ? 'selected' : '' }}>Samsung</option>
                            <option value="Apple" {{ request('marque') == 'Apple' ? 'selected' : '' }}>Apple</option>
                            <option value="Xiaomi" {{ request('marque') == 'Xiaomi' ? 'selected' : '' }}>Xiaomi</option>
                        </select>
                    </div>

                    <!-- Filtre par prix -->
                    <div class="mb-6">
                        <label for="prix" class="block text-lg font-semibold mb-4">Prix</label>
                        <select name="prix" id="prix" class="w-full rounded-md border-gray-300 shadow-sm" onchange="this.form.submit()">
                            <option value="">Tous les prix</option>
                            <option value="0-100000" {{ request('prix') == '0-100000' ? 'selected' : '' }}>Moins de 100 000 CFA</option>
                            <option value="100000-300000" {{ request('prix') == '100000-300000' ? 'selected' : '' }}>100 000 - 300 000 CFA</option>
                            <option value="300000+" {{ request('prix') == '300000+' ? 'selected' : '' }}>Plus de 300 000 CFA</option>
                        </select>
                    </div>

                    <!-- Filtre par stockage -->
                    <div class="mb-6">
                        <label for="stockage" class="block text-lg font-semibold mb-4">Stockage</label>
                        <select name="stockage" id="stockage" class="w-full rounded-md border-gray-300 shadow-sm" onchange="this.form.submit()">
                            <option value="">Tous les stockages</option>
                            <option value="64" {{ request('stockage') == '64' ? 'selected' : '' }}>64 GB</option>
                            <option value="128" {{ request('stockage') == '128' ? 'selected' : '' }}>128 GB</option>
                            <option value="256" {{ request('stockage') == '256' ? 'selected' : '' }}>256 GB</option>
                        </select>
                    </div>
                </form>
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
                                    src="{{ $smartphone->photo }}"
                                    alt="{{ $smartphone->nom }}"
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy">
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
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold text-gray-900">{{ number_format($smartphone->prix, 2) }} cfa</span>
                                    <a
                                        href="{{ route('smartphones.show', $smartphone) }}"
                                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500 text-lg">Aucun smartphone trouvé</p>
                        @if(request()->filled('nom'))
                        <a href="{{ route('smartphones.index') }}" class="text-purple-600 hover:text-purple-700 mt-2 inline-block">
                            Réinitialiser la recherche
                        </a>
                        @endif
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
@endsection