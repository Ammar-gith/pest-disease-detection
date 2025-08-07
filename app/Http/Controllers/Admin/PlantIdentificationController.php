<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PlantCategory;
use App\Models\PlantIdentification;
use App\Http\Controllers\Controller;

class PlantIdentificationController extends Controller
{
    public function index()
    {
        $plantIdentifications = PlantIdentification::all();

        return view('admin.plant_identifications.index', compact('plantIdentifications'));
    }

    public function create()
    {
        $plantCategories = PlantCategory::all();
        return view('admin.plant_identifications.create', compact('plantCategories'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('file')) {
            $imagePath = $request->file('file')->store('plant_identification_images', 'public');
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
            'image' => 'required|string|max:255',
            'plant_category_id' => 'nullable|exists:plant_categories,id',
            'plant_name' => 'nullable|string|max:255',
            'common_name' => 'nullable|string|max:255',
            'scientific_name' => 'nullable|string|max:255',
            'disease_name' => 'nullable|string|max:255',
            'confidence' => 'nullable|numeric',
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
            'identified_at' => now(),
        ]);

        return redirect()->route('plant_identifications.index')->with('success', 'Plant history created successfully!');
    }


    public function edit($id)
    {
        $plantIdentification = PlantIdentification::findOrFail($id);
        $plantCategories = PlantCategory::all();

        return view('admin.plant_identifications.edit', compact(['plantIdentification', 'plantCategories']));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|string|max:255',
            'plant_category_id' => 'nullable|exists:plant_categories,id',
            'plant_name' => 'nullable|string|max:255',
            'common_name' => 'nullable|string|max:255',
            'scientific_name' => 'nullable|string|max:255',
            'disease_name' => 'nullable|string|max:255',
            'confidence' => 'nullable|numeric',
            'health_status' => 'nullable|string|max:255',
            'family' => 'nullable|string|max:255',
            'native_region' => 'nullable|string|max:255',
            'water_needs' => 'nullable|string|max:255',
            'sunlight_needs' => 'nullable|string|max:255',
            'toxicity' => 'nullable|string|max:255',
            'care_recommendation' => 'nullable|string',
        ]);


        $plantIdentification = PlantIdentification::findOrFail($id);
        $plantIdentification->plant_category_id = $request->plant_category_id;
        $plantIdentification->image = $request->image;
        $plantIdentification->save();
        return redirect()->route('plant_identifications.index')->with('success', 'Plant Identification updated successfully!');
    }


    public function show($id)
    {
        $plantIdentification = PlantIdentification::findOrFail($id);
        return view('admin.plant_identifications.show', compact('plantIdentification'));
    }


    public function destroy($id)
    {
        $plantIdentification = PlantIdentification::findOrFail($id);
        if ($plantIdentification) {
            $plantIdentification->delete();
        }
        return back()->with('error', 'Plant identifiatioin histroy deleted successfully!');
    }
}
