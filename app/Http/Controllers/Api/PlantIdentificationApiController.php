<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PlantIdentification;
use App\Http\Controllers\Controller;

class PlantIdentificationApiController extends Controller
{
    public function index()
    {
        $plantIdentifications = PlantIdentification::all();

        return response()->json([
            'status' => true,
            'message' => 'All plant identification successfully!',
            'data' =>  $plantIdentifications,
        ], 200);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('plant_identification_images', 'public');
        }
        return response()->json([
            'success' => true,
            'file_path' => $imagePath,
            'url' => asset('storage/' . $imagePath)
        ], 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|string|max:255',
            'plant_category_id' => 'nullable|exists:plant_categories,id',
            'plant_name' => 'nullable|string|max:255',
            'common_name' => 'nullable|string|max:255',
            'scientific_name' => 'nullable|string|max:255',
            'disease_name' => 'nullable|string|max:255',
            'confidence_level' => 'nullable|numeric',
            'health_status' => 'nullable|string|max:255',
            'family' => 'nullable|string|max:255',
            'native_region' => 'nullable|string|max:255',
            'water_needs' => 'nullable|string|max:255',
            'sunlight_needs' => 'nullable|string|max:255',
            'toxicity' => 'nullable|string|max:255',
            'care_recommendation' => 'nullable|string',
        ]);

        $plantIdentification = PlantIdentification::create([
            'user_id' => auth()->id() ?? null, // use logged in user or dummy user id=NUll
            'plant_category_id' => $request->plant_category_id,
            'image' => $request->image,
            'plant_name' => $request->plant_name,
            'common_name' => $request->common_name,
            'disease_name' => $request->disease_name,
            'scientific_name' => $request->scientific_name,
            'confidence_level' => $request->confidence_level,
            'health_status' => $request->health_status,
            'family' => $request->family,
            'native_region' => $request->native_region,
            'water_needs' => $request->water_needs,
            'sunlight_needs' => $request->sunlight_needs,
            'toxicity' => $request->toxicity,
            'care_recommendation' => $request->care_recommendation,
            'identified_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Plant identification histroy created successfully!',
            'date' => $plantIdentification,
        ], 201);
    }

    public function destroy($id)
    {
        $plantIdentification = PlantIdentification::findOrFail($id);
        if ($plantIdentification) {
            $plantIdentification->delete();
        }
        return response()->json([
            'success' => true,
            'message' => 'Plant identification histroy deleted successfully!',
            'data' => ['id' => $id],
        ], 200);
    }
}