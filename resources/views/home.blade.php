@extends('layouts.app')

@section('content')
<div class="relative">
    <div class="container mx-auto px-4 py-12">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-lg p-8 shadow-md">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="md:w-1/2">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900">Exclusive Online Offers</h1>
                    <p class="text-xl text-gray-600 mb-6">Online Offers: Yours to Discover!</p>
                    <a href="{{ route('smartphones.index') }}" class="bg-gray-800 hover:bg-gray-700 text-white px-8 py-3 rounded-lg inline-block transition-colors duration-200">
                        SHOP NOW
                    </a>
                </div>
                <div class="md:w-1/2 bg-gray-200 p-2 rounded-xl">
                    <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-xl">
                        <img 
                            src="{{ asset('https://static.fnac-static.com/multimedia/Images/FR/MDM/c7/f7/a6/27719623/1540-1/tsp20250207080824/Smartphone-Samsung-Galaxy-S25-Ultra-6-9-5G-Nano-SIM-512-Go-Bleu-Titane.jpg') }}" 
                            alt="Exclusive Offers" 
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-900">New Items</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($smartphones as $smartphone)
            <div class="group bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="relative aspect-w-1 aspect-h-1 rounded-t-xl overflow-hidden">
                    <a href="{{ route('smartphones.show', $smartphone) }}">
                        <img 
                            src="{{$smartphone->photo }}" 
                            alt="{{ $smartphone->nom }}" 
                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                </div>

                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 group-hover:text-gray-700 line-clamp-2">{{ $smartphone->nom }}</h3>
                    <p class="mt-2 text-sm text-gray-600">{{ $smartphone->marque }}</p>
                    

                    

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
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500">No smartphones available</p>
            </div>
            @endforelse
        </div>

        @if($smartphones->hasPages())
        <div class="mt-8">
            {{ $smartphones->links() }}
        </div>
        @endif
    </div>
</section>



@endsection