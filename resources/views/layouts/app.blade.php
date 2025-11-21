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

    <footer class="bg-gray-900 text-white py-12 mt-20">
        <div class="container mx-auto px-6 grid md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">ImmoLuxe</h3>
                <p class="text-gray-400">Votre partenaire de confiance pour trouver le bien de vos rêves.</p>
            </div>
            <div>
                <h4 class="font-bold mb-4">Liens Rapides</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Accueil</a></li>
                    <li><a href="{{ route('properties.index') }}" class="hover:text-white">Biens</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">Contact</h4>
                <ul class="space-y-2 text-gray-400">
                    <li>contact@immoluxe.fr</li>
                    <li>+33 1 23 45 67 89</li>
                </ul>
            </div>
        </div>
        <div class="text-center text-gray-500 mt-12 pt-8 border-t border-gray-800">
            &copy; {{ date('Y') }} ImmoLuxe. Tous droits réservés.
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
