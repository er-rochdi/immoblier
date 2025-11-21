@extends('layouts.app')

@section('title', 'À Propos - ImmoLuxe')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gray-900 text-white py-20 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900 to-gray-900 opacity-90"></div>
        <div class="relative container mx-auto px-6 text-center z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Notre Histoire</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">Depuis plus de 10 ans, ImmoLuxe redéfinit l'immobilier de
                prestige en France.</p>
        </div>
    </div>

    <!-- Content -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Notre Agence" class="rounded-xl shadow-2xl">
                </div>
                <div>
                    <h2 class="text-3xl font-bold mb-6 text-gray-900">Une expertise unique</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Chez ImmoLuxe, nous croyons que chaque bien immobilier a une âme. Notre mission est de trouver celle
                        qui résonnera avec la vôtre. Spécialisés dans l'immobilier haut de gamme, nous accompagnons nos
                        clients avec discrétion, professionnalisme et passion.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Notre équipe d'experts parcourt la France pour dénicher des perles rares : appartements
                        haussmanniens, villas contemporaines, lofts atypiques ou demeures historiques.
                    </p>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="border-l-4 border-blue-600 pl-4">
                            <span class="block text-3xl font-bold text-gray-900">500+</span>
                            <span class="text-gray-500">Biens vendus</span>
                        </div>
                        <div class="border-l-4 border-blue-600 pl-4">
                            <span class="block text-3xl font-bold text-gray-900">98%</span>
                            <span class="text-gray-500">Clients satisfaits</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-900">Notre Équipe</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden text-center group">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                            alt="Directeur"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-1">Jean Dupont</h3>
                        <p class="text-blue-600 mb-4">Directeur Général</p>
                        <p class="text-gray-500 text-sm">Passionné d'architecture et d'urbanisme, Jean dirige l'agence avec
                            vision.</p>
                    </div>
                </div>
                <!-- Team Member 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden text-center group">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                            alt="Agent" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-1">Sophie Martin</h3>
                        <p class="text-blue-600 mb-4">Responsable des Ventes</p>
                        <p class="text-gray-500 text-sm">Experte en négociation, Sophie trouve toujours le meilleur accord.
                        </p>
                    </div>
                </div>
                <!-- Team Member 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden text-center group">
                    <div class="h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80"
                            alt="Agent" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-1">Marc Dubois</h3>
                        <p class="text-blue-600 mb-4">Chasseur de Biens</p>
                        <p class="text-gray-500 text-sm">Marc a l'œil pour repérer les potentiels cachés.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
