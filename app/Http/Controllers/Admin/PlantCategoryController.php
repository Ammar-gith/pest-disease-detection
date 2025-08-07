<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlantCategory;
use Illuminate\Http\Request;

class PlantCategoryController extends Controller
{
    public function index()
    {

        $plantCategories = PlantCategory::all();
        return view('admin.plant_categories.index', compact('plantCategories'));
    }

    public function create()
    {
        return view('admin.plant_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        $plantCategory = PlantCategory::create([
            'category' => $request->category,
        ]);

        return redirect()->route('plant_categories.index')->with('success', 'Plant category added successfully!');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        $plantCategory = PlantCategory::findOrFail($id);
        $plantCategory->category = $request->category;
        $plantCategory->save();

        return redirect()->route('plant_categories.index')->with('success', 'Plant category updatee successfully!');
    }


    public function edit($id)
    {
        $plantCategory = PlantCategory::findOrFail($id);

        return view('admin.plant_categories.edit', compact('plantCategory'));
    }

    public function destroy($id)
    {
        $plantCategory = PlantCategory::findorFail($id);

        if ($plantCategory) {
            $plantCategory->delete();
        }
        return back()->with('error', 'Plant category delete successfully!');
    }
}