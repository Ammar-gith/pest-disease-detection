<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function diaries()
    {
        return $this->hasMany(PlantDiary::class);
    }
}