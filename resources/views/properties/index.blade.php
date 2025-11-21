@extends('layouts.app')

@section('title', 'Nos Biens - ImmoLuxe')

@section('content')
    <div class="relative h-80 flex items-center justify-center bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative container mx-auto px-6 text-center z-10 text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 fade-in-up">Nos Propriétés</h1>
            <p class="text-xl text-gray-200 fade-in-up delay-100">Découvrez notre sélection exclusive de biens immobiliers.
            </p>
        </div>
    </div>

    <div class="container mx-auto px-6 py-12">
        <div class="grid md:grid-cols-4 gap-8">
            <!-- Sidebar Filters -->
            <div class="md:col-span-1">
                <div class="bg-white p-6 rounded-xl shadow-lg sticky top-24">
                    <h3 class="text-xl font-bold mb-6">Filtrer</h3>
                    <form id="filter-form" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                            <select name="city" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-600">
                                <option value="">Toutes les villes</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Type de bien</label>
                            <select name="type" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-600">
                                <option value="">Tous les types</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Prix Min</label>
                            <input type="number" name="price_min"
                                class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-600" placeholder="Min €">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Prix Max</label>
                            <input type="number" name="price_max"
                                class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-600" placeholder="Max €">
                        </div>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                            Appliquer
                        </button>
                    </form>
                </div>
            </div>

            <!-- Property Grid -->
            <div class="md:col-span-3" id="properties-container">
                @include('properties.partials.list')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('filter-form').addEventListener('submit', function(e) {
            e.preventDefault();
            fetchProperties();
        });

        function fetchProperties(url = "{{ route('properties.index') }}") {
            const form = document.getElementById('filter-form');
            const formData = new FormData(form);
            const params = new URLSearchParams(formData);

            // If url already has params, append them
            if (url.includes('?')) {
                const urlParams = new URLSearchParams(url.split('?')[1]);
                for (const [key, value] of urlParams) {
                    if (!params.has(key)) {
                        params.append(key, value);
                    }
                }
                url = url.split('?')[0];
            }

            fetch(`${url}?${params.toString()}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('properties-container').innerHTML = html;
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
        }

        // Handle pagination clicks
        document.addEventListener('click', function(e) {
            if (e.target.closest('.pagination a')) {
                e.preventDefault();
                const url = e.target.closest('.pagination a').href;
                fetchProperties(url);
            }
        });
    </script>
@endpush
