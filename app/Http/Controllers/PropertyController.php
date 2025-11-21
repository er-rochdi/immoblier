<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with(['city', 'type', 'images'])
            ->where('status', 'active');

        if ($request->filled('city')) {
            $query->where('city_id', $request->city);
        }

        if ($request->filled('type')) {
            $query->where('property_type_id', $request->type);
        }

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        $properties = $query->latest()->paginate(9);
        $cities = City::orderBy('name')->get();
        $types = PropertyType::orderBy('name')->get();

        if ($request->ajax()) {
            return view('properties.partials.list', compact('properties'))->render();
        }

        return view('properties.index', compact('properties', 'cities', 'types'));
    }

    public function show(Property $property)
    {
        $property->load(['city', 'type', 'images']);
        $relatedProperties = Property::where('city_id', $property->city_id)
            ->where('id', '!=', $property->id)
            ->take(3)
            ->get();

        return view('properties.show', compact('property', 'relatedProperties'));
    }
}
