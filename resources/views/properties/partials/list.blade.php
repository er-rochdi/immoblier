<div class="grid md:grid-cols-3 gap-8" id="property-grid">
    @forelse($properties as $property)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden property-card group fade-in-up">
            <div class="relative overflow-hidden h-64">
                <img src="{{ $property->images->first() ? Storage::url($property->images->first()->image_path) : 'https://via.placeholder.com/400x300' }}"
                    alt="{{ $property->title }}"
                    class="w-full h-full object-cover transition duration-500 property-image">
                <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $property->type->name }}
                </div>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-xl font-bold mb-2 group-hover:text-blue-600 transition">{{ $property->title }}
                        </h3>
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
                    <p class="text-blue-600 font-bold text-lg">{{ number_format($property->price, 0, ',', ' ') }} €</p>
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
    @empty
        <div class="col-span-3 text-center py-12">
            <p class="text-xl text-gray-500">Aucun bien ne correspond à vos critères.</p>
        </div>
    @endforelse
</div>

<div class="mt-8">
    {{ $properties->links() }}
</div>
