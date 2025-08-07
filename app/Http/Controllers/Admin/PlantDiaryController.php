<?php

namespace App\Http\Controllers\Admin;

use App\Models\PlantType;
use App\Models\PlantDiary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlantDiaryController extends Controller
{
    public function index()
    {
        $plantDiaries = PlantDiary::all();
        return view('admin.plant_diaries.index', compact('plantDiaries'));
    }

    public function create()
    {
        $plantTypes = PlantType::all();
        return view('admin.plant_diaries.create', compact('plantTypes'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('file')) {
            $imagePath = $request->file('file')->store('plant_diary_images', 'public');
        }
        return response()->json([
            'success' => true,
            'file_path' => $imagePath,
            'url' => asset('storage/' . $imagePath)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'diary_at' => 'required|date',
            'plant_type_id' => 'required|exists:plant_types,id',
            'image' => 'nullable|string|max:255',
            'plant_note' => 'nullable|string|max:1000',
        ]);

        PlantDiary::create([
            'diary_at' => $request->diary_at,
            'plant_type_id' => $request->plant_type_id,
            'image' => $request->image,
            'plant_note' => $request->plant_note,
        ]);

        return redirect()->route('plant_diaries.index')->with('success', 'Plant diary created successfully!');
    }

    public function edit($id)
    {
        $plantDiary = PlantDiary::findOrFail($id);
        $plantTypes = PlantType::all();

        return view('admin.plant_diaries.edit', compact(['plantDiary', 'plantTypes']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'diary_at' => 'required|date',
            'plant_type_id' => 'required|exists:plant_types,id',
            'image' => 'nullable|string|max:255',
            'plant_note' => 'nullable|string|max:1000',
        ]);

        $plantDiary = PlantDiary::findOrFail($id);
        $plantDiary->diary_at = $request->diary_at;
        $plantDiary->plant_type_id = $request->plant_type_id;
        $plantDiary->image = $request->image;
        $plantDiary->plant_note = $request->plant_note;
        $plantDiary->save();

        return redirect()->route('plant_diaries.index')->with('success', 'Plant diary updated successfully!');
    }

    public function destroy($id)
    {
        $plantDiary = PlantDiary::findorFail($id);
        if ($plantDiary) {
            $plantDiary->delete();
        }
        return back()->with('error', 'Plant diary deleted successfully!');
    }
}
