<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\HomeScreenImage;
use App\Http\Controllers\Controller;

class HomeScreenImageApiController extends Controller
{
    public function index()
    {
        $homeImages = HomeScreenImage::all();
        return response()->json([
            'success' => true,
            'message' =>  'All images fetch successfully!',
            'data' => $homeImages
        ], 200);
    }
}
