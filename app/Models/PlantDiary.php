<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantDiary extends Model
{
    use HasFactory;

    protected $fillable = ['plant_type_id', 'plant_note', 'image', 'diary_at'];

    // Cast diary_at to Carbon date object
    protected $casts = [
        'diary_at' => 'datetime',
    ];

    // Relationship: each diary belongs to one plant type
    public function plantType()
    {
        return $this->belongsTo(PlantType::class);
    }
}
