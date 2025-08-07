<?php

namespace App\Http\Controllers\Admin;

use App\Models\PlantType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PlantTypeController extends Controller
{
    public function index()
    {

        $plantTypes = PlantType::all();

        return view('admin.plant_types.index', compact('plantTypes'));
    }


    public function create()
    {
        return view('admin.plant_types.create');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'type' => 'required|string|max:255',
        ]);

        $plantTypes = PlantType::create([
            'type' => $request->type,
        ]);

        return redirect()->route('plant_types.index')->with('success', 'Plant type added successfully!');
    }

    public function edit($id)
    {
        $plantType = PlantType::findOrFail($id);

        return view('admin.plant_types.edit', compact('plantType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
        ]);

        $plantType = PlantType::findOrFail($id);
        $plantType->type = $request->type;
        $plantType->save();

        return redirect()->route('plant_types.index')->with('success', 'Plant Type updated successfully!');
    }

    public function destroy($id)
    {
        $plantType = PlantType::findorFail($id);

        if ($plantType) {
            $plantType->delete();
        }
        return back()->with('error', 'Plant Type Delete successfully!');
    }
}