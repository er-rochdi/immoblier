<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'area',
        'bedrooms',
        'bathrooms',
        'status',
        'is_featured',
        'city_id',
        'property_type_id',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class)->orderBy('sort_order');
    }
}
