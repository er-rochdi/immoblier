<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProperties = Property::with(['city', 'type', 'images'])
            ->where('is_featured', true)
            ->where('status', 'active')
            ->latest()
            ->take(6)
            ->get();

        $types = PropertyType::all();

        return view('home', compact('featuredProperties', 'types'));
    }
}
