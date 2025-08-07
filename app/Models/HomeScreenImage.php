<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeScreenImage extends Model
{
    use HasFactory;

    protected $fillable = ['image_title', 'image_sub_title', 'image'];
}
