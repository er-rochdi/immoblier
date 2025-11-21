<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Agence Immobilière')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased">
    <header class="fixed w-full z-50 transition-all duration-300" id="navbar">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">Immo<span
                    class="text-gray-800">Luxe</span></a>
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="hover:text-blue-600 transition font-medium">Accueil</a>
                <a href="{{ route('properties.index') }}" class="hover:text-blue-600 transition font-medium">Nos
                    Biens</a>
                <a href="{{ route('about') }}" class="hover:text-blue-600 transition font-medium">À Propos</a>
                <a href="{{ route('contact') }}" class="hover:text-blue-600 transition font-medium">Contact</a>
            </div>
            <div class="hidden md:block">
                <a href="{{ route('properties.index') }}"
                    class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition transform hover:scale-105">
                    Rechercher
                </a>
            </div>
            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-gray-800 hover:text-blue-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </nav>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t shadow-lg absolute w-full left-0 top-full">
            <div class="flex flex-col px-6 py-4 space-y-4">
                <a href="{{ route('home') }}" class="hover:text-blue-600 transition font-medium">Accueil</a>
                <a href="{{ route('properties.index') }}" class="hover:text-blue-600 transition font-medium">Nos
                    Biens</a>
                <a href="{{ route('about') }}" class="hover:text-blue-600 transition font-medium">À Propos</a>
                <a href="{{ route('contact') }}" class="hover:text-blue-600 transition font-medium">Contact</a>
                <a href="{{ route('properties.index') }}"
                    class="bg-blue-600 text-white px-6 py-2 rounded-full text-center hover:bg-blue-700 transition">
                    Rechercher
                </a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white pt-12 pb-8 md:pt-20 md:pb-10 border-t border-gray-800">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 md:col-span-2">
                    <a href="{{ route('home') }}" class="text-3xl font-bold text-white mb-6 inline-block">Immo<span
                            class="text-blue-500">Luxe</span></a>
                    <p class="text-gray-400 leading-relaxed mb-8 max-w-md">
                        L'excellence immobilière à votre service. Nous sélectionnons pour vous les biens les plus
                        prestigieux pour concrétiser vos rêves d'exception.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 transition duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 transition duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 transition duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-6 text-white">Navigation</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="{{ route('home') }}"
                                class="hover:text-blue-500 transition duration-300 flex items-center"><span
                                    class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>Accueil</a></li>
                        <li><a href="{{ route('properties.index') }}"
                                class="hover:text-blue-500 transition duration-300 flex items-center"><span
                                    class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>Nos Biens</a></li>
                        <li><a href="{{ route('about') }}"
                                class="hover:text-blue-500 transition duration-300 flex items-center"><span
                                    class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>À Propos</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="hover:text-blue-500 transition duration-300 flex items-center"><span
                                    class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-6 text-white">Newsletter</h4>
                    <p class="text-gray-400 mb-4 text-sm">Inscrivez-vous pour recevoir nos dernières offres exclusives.
                    </p>
                    <form class="flex flex-col space-y-3">
                        <input type="email" placeholder="Votre email"
                            class="bg-gray-800 text-white px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 border border-gray-700">
                        <button type="button"
                            class="bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition font-bold">S'inscrire</button>
                    </form>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm mb-4 md:mb-0">&copy; {{ date('Y') }} ImmoLuxe. Tous droits
                    réservés.</p>
                <div class="flex space-x-6 text-sm text-gray-500">
                    <a href="#" class="hover:text-white transition">Mentions Légales</a>
                    <a href="#" class="hover:text-white transition">Politique de Confidentialité</a>
                    <a href="#" class="hover:text-white transition">CGV</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white', 'shadow-md');
            } else {
                navbar.classList.remove('bg-white', 'shadow-md');
            }
        });

        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>

</html>
