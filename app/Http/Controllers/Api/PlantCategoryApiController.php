<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PlantCategory;
use App\Http\Controllers\Controller;

class PlantCategoryApiController extends Controller
{
    public function index()
    {
        $plantCategories = PlantCategory::all();
        return response()->json([
            'message' => 'All plant category fetch successfully!',
            'data' => $plantCategories,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        $plantCategory = PlantCategory::create([
            'category' => $request->category,
        ]);

        return response()->json([
            'message' => 'Plant Category created successgully!',
            'data' => $plantCategory,
        ], 201);
    }

    public function destroy($id)
    {
        $plantCategory = PlantCategory::findOrFail($id);
        if ($plantCategory) {
            $plantCategory->delete();
        }
        return response()->json([
            'message' => 'Plant category deleted successfully!',
            'data' => ['id' => $id],
        ], 200);
    }
}
