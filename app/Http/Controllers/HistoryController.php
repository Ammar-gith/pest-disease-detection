<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    // Create a new history entry
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'predictedDisease' => 'required|string',
            'treatment' => 'required|string',
            'precaution' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('history_images', 'public');
        } else {
            $imagePath = null;
        }

        $history = History::create([
            'image' => $imagePath,
            'predictedDisease' => $request->predictedDisease,
            'treatment' => $request->treatment,
            'precaution' => $request->precaution,
        ]);

        return response()->json([
            'message' => 'History record created successfully!',
            'data' => $history
        ], 201);
    }

    // Get all history records
    public function index()
    {
        $history = History::all();
        return response()->json($history);
    }

    // Get a single history record
    public function show($id)
    {
        $history = History::find($id);
        if (!$history) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        return response()->json($history);
    }

    // Update a history record
    public function update(Request $request, $id)
    {
        $history = History::find($id);
        if (!$history) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'predictedDisease' => 'required|string',
            'treatment' => 'required|string',
            'precaution' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('history_images', 'public');
            $history->image = $imagePath;
        }

        $history->predictedDisease = $request->predictedDisease;
        $history->treatment = $request->treatment;
        $history->precaution = $request->precaution;
        $history->save();

        return response()->json([
            'message' => 'History record updated successfully!',
            'data' => $history
        ]);
    }

    // Delete a history record
    public function destroy($id)
    {
        $history = History::find($id);
        if (!$history) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $history->delete();
        return response()->json(['message' => 'History record deleted successfully!']);
    }
}
