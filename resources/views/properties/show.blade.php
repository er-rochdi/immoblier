@extends('layouts.app')

@section('title', $property->title . ' - ImmoLuxe')

@section('content')
    <div class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $property->title }}</h1>
            <p class="text-xl text-gray-400 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                {{ $property->city->name }}
            </p>
        </div>
    </div>

    <div class="container mx-auto px-6 py-12">
        <div class="grid md:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="md:col-span-2">
                <!-- Gallery -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                    <div class="relative h-96">
                        @if ($property->images->count() > 0)
                            <img src="{{ Storage::url($property->images->first()->image_path) }}"
                                alt="{{ $property->title }}" class="w-full h-full object-cover" id="main-image">
                        @else
                            <img src="https://via.placeholder.com/800x600" alt="Placeholder"
                                class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="p-4 flex space-x-4 overflow-x-auto">
                        @foreach ($property->images as $image)
                            <img src="{{ Storage::url($image->image_path) }}" alt="Gallery"
                                class="w-24 h-24 object-cover rounded cursor-pointer hover:opacity-75 transition"
                                onclick="document.getElementById('main-image').src = this.src">
                        @endforeach
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Description</h2>
                    <div class="prose max-w-none text-gray-600">
                        {{ $property->description }}
                    </div>
                </div>

                <!-- Features -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold mb-6">Caractéristiques</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <span class="block text-gray-500 text-sm">Surface</span>
                            <span class="block text-xl font-bold text-blue-600">{{ $property->area }} m²</span>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <span class="block text-gray-500 text-sm">Chambres</span>
                            <span class="block text-xl font-bold text-blue-600">{{ $property->bedrooms }}</span>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <span class="block text-gray-500 text-sm">Salles de bain</span>
                            <span class="block text-xl font-bold text-blue-600">{{ $property->bathrooms }}</span>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <span class="block text-gray-500 text-sm">Type</span>
                            <span class="block text-xl font-bold text-blue-600">{{ $property->type->name }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="md:col-span-1">
                <!-- Price Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8 sticky top-24">
                    <div class="text-3xl font-bold text-blue-600 mb-2">{{ number_format($property->price, 0, ',', ' ') }} €
                    </div>
                    <div class="text-gray-500 mb-6">{{ $property->status === 'active' ? 'Disponible' : 'Vendu' }}</div>

                    <form class="space-y-4">
                        <input type="text" placeholder="Votre Nom"
                            class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-600">
                        <input type="email" placeholder="Votre Email"
                            class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-600">
                        <input type="tel" placeholder="Votre Téléphone"
                            class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-600">
                        <textarea rows="4" placeholder="Bonjour, je suis intéressé par ce bien..."
                            class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-600"></textarea>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition font-bold">
                            Contacter l'agence
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
