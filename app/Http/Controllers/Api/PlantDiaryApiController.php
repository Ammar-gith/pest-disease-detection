<?php

namespace App\Http\Controllers\Api;

use App\Models\PlantDiary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlantDiaryApiController extends Controller
{
    public function index()
    {
        $plantDiaries = PlantDiary::all();

        return response()->json([
            'success' => true,
            'message' => 'All plant diiaries fetch successfully!',
            'data' => $plantDiaries,
        ], 200);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('plant_diary_images', 'public');
        }
        return response()->json([
            'success' => true,
            'file_path' => $imagePath,
            'url' => asset('storage/' . $imagePath)
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'diary_at' => 'required|date',
            'plant_type_id' => 'nullable|exists:plant_types,id',
            'plant_note' => 'nullable|string|max:1000',
            'image' => 'nullable|string|max:255',
        ]);


        $plantDiary = PlantDiary::create([
            'diary_at' => $validated['diary_at'],
            'plant_type_id' => $validated['plant_type_id'],
            'image' =>  $request->image,
            'plant_note' => $validated['plant_note'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Plant diary created successfully!',
            'data' => $plantDiary,
        ], 201);
    }


    public function edit($id)
    {
        $plantDiary = PlantDiary::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $plantDiary,
        ]);
    }


    public function update(Request $request, $id)
    {
        // \Log::info('Update API called for id: ' . $id);
        // \Log::info('Request data:', $request->all());

        $request->validate([
            'diary_at' => 'required|date',
            'plant_type_id' => 'nullable|exists:plant_types,id',
            'image' => 'nullable|string|max:255',
            'plant_note' => 'nullable|string|max:1000',

        ]);

        $plantDiary = PlantDiary::findOrFail($id);

        $plantDiary->update([
            'diary_at' => $request->diary_at,
            'plant_type_id' => $request->plant_type_id,
            'plant_note' => $request->plant_note,
            'image' => $request->image,
        ]);

        $plantDiary->refresh();
        return response()->json([
            'success' => true,
            'message' => 'Plant diary updated successfully!',
            'data' =>  $plantDiary,

        ], 200);
    }


    public function destroy($id)
    {
        $plantDiary = PlantDiary::findOrFail($id);
        if ($plantDiary) {
            $plantDiary->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Plant diary deleted successfully!',
            'data' => ['id' => $id]
        ], 200);
    }
}
