<?php

namespace App\Http\Controllers\Api;

use App\Models\PlantType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PlantTypeApiController extends Controller
{
    public function index() {}


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|max:255',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $plantTypes = PlantType::create([
            'type' => $request->type,
        ]);

        return response()->json([
            'message' => 'plant type created successfully!',
            'date' => $plantTypes
        ], 201);
    }

    public function destroy($id)
    {
        $plantType = PlantType::findOrFail($id);
        if ($plantType) {
            $plantType->delete();
        }
        return response()->json([
            'message' => 'Plant type deleted successfully!',
            'data' => ['id' => $id],
        ], 200);
    }
}
