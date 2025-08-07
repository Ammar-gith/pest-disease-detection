<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantIdentification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plant_category_id',
        'image',
        'plant_name',
        'common_name',
        'scientific_name',
        'disease_name',
        'confidence_level',
        'health_status',
        'family',
        'native_region',
        'water_needs',
        'sunlight_needs',
        'toxicity',
        'care_recommendation',
        'identified_at',
    ];

    protected $casts = [
        'identified_at' => 'datetime',
        // 'confidence' => 'float', // optional: ensures you always get float
    ];

    // Relationship: each identification belongs to one plant category
    public function plantCategory()
    {
        return $this->belongsTo(PlantCategory::class);
    }
}
