@extends('layouts.app')

@section('title', 'Accueil - ImmoLuxe')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center bg-cover bg-center bg-fixed"
        style="background-image: url('https://images.unsplash.com/photo-1600596542815-2251c3052068?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-transparent"></div>

        <div class="relative z-10 text-center text-white px-6 max-w-5xl mx-auto">
            <span
                class="inline-block py-1 px-3 rounded-full bg-blue-600/20 border border-blue-400/30 text-blue-300 text-sm font-semibold mb-6 fade-in-up backdrop-blur-sm">
                L'immobilier de prestige
            </span>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 fade-in-up leading-tight tracking-tight">
                Trouvez votre bien <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">d'exception</span>
            </h1>
            <p class="text-xl md:text-2xl mb-10 fade-in-up delay-100 text-gray-200 font-light">
                Des propriétés uniques pour des moments inoubliables.
            </p>

            <div class="bg-white/10 backdrop-blur-md p-4 rounded-2xl shadow-2xl border border-white/20 fade-in-up delay-200">
                <form action="{{ route('properties.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <select name="city"
                            class="w-full pl-10 pr-4 py-4 bg-white/90 border-0 rounded-xl text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:bg-white transition appearance-none cursor-pointer">
                            <option value="">Toutes les villes</option>
                            @foreach (\App\Models\City::all() as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </div>
                        <select name="type"
                            class="w-full pl-10 pr-4 py-4 bg-white/90 border-0 rounded-xl text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:bg-white transition appearance-none cursor-pointer">
                            <option value="">Type de bien</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                        class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-4 rounded-xl hover:from-blue-700 hover:to-blue-800 transition font-bold shadow-lg transform hover:scale-105 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Rechercher
                    </button>
                </form>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce text-white/50">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Featured Properties -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Biens à la Une</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($featuredProperties as $property)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden property-card group">
                        <div class="relative overflow-hidden h-64">
                            <img src="{{ $property->images->first() ? Storage::url($property->images->first()->image_path) : 'https://via.placeholder.com/400x300' }}"
                                alt="{{ $property->title }}"
                                class="w-full h-full object-cover transition duration-500 property-image">
                            <div
                                class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $property->type->name }}
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-xl font-bold mb-2 group-hover:text-blue-600 transition">
                                        {{ $property->title }}</h3>
                                    <p class="text-gray-500 text-sm flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $property->city->name }}
                                    </p>
                                </div>
                                <p class="text-blue-600 font-bold text-lg">
                                    {{ number_format($property->price, 0, ',', ' ') }} €</p>
                            </div>
                            <div class="flex justify-between border-t pt-4 text-gray-500 text-sm">
                                <span>{{ $property->bedrooms }} Chambres</span>
                                <span>{{ $property->bathrooms }} SDB</span>
                                <span>{{ $property->area }} m²</span>
                            </div>
                            <a href="{{ route('properties.show', $property) }}"
                                class="block mt-4 text-center bg-gray-100 text-gray-800 py-2 rounded hover:bg-blue-600 hover:text-white transition">
                                Voir détails
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('properties.index') }}"
                    class="inline-block border-2 border-blue-600 text-blue-600 px-8 py-3 rounded-full hover:bg-blue-600 hover:text-white transition font-semibold">
                    Voir tous nos biens
                </a>
            </div>
        </div>
    </section>
@endsection
