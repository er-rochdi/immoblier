@extends('layouts.app')

@section('title', 'Contact - ImmoLuxe')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gray-900 text-white py-20 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900 to-gray-900 opacity-90"></div>
        <div class="relative container mx-auto px-6 text-center z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Contactez-nous</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">Une question ? Un projet ? Notre équipe est à votre écoute.
            </p>
        </div>
    </div>

    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Contact Info -->
                <div>
                    <h2 class="text-3xl font-bold mb-8 text-gray-900">Nos Coordonnées</h2>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-full mr-4 text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg mb-1">Adresse</h3>
                                <p class="text-gray-600">123 Avenue des Champs-Élysées<br>75008 Paris, France</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-full mr-4 text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg mb-1">Téléphone</h3>
                                <p class="text-gray-600">+33 1 23 45 67 89</p>
                                <p class="text-sm text-gray-500">Du lundi au vendredi, 9h - 19h</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-full mr-4 text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg mb-1">Email</h3>
                                <p class="text-gray-600">contact@immoluxe.fr</p>
                            </div>
                        </div>
                    </div>

                    <!-- Map Placeholder -->
                    <div class="mt-8 bg-gray-200 rounded-xl h-64 w-full flex items-center justify-center text-gray-500">
                        [Carte Google Maps ici]
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <h2 class="text-2xl font-bold mb-6">Envoyez-nous un message</h2>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                                <input type="text" name="name" required
                                    class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                                <input type="text" name="lastname"
                                    class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" required
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sujet</label>
                            <select name="subject"
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition">
                                <option value="Achat">Je souhaite acheter un bien</option>
                                <option value="Vente">Je souhaite vendre un bien</option>
                                <option value="Info">Demande d'information</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea name="message" rows="5" required
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-4 rounded-lg font-bold hover:bg-blue-700 transition transform hover:-translate-y-1 shadow-lg">
                            Envoyer le message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
