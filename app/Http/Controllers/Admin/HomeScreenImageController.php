<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeScreenImage;
use Illuminate\Http\Request;

class HomeScreenImageController extends Controller
{
    public function index()
    {
        $homeImages = HomeScreenImage::all();
        return view('admin.home_screen_images.index', compact('homeImages'));
    }


    public function create()
    {
        return view('admin.home_screen_images.create');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('file')) {
            $imagePath = $request->file('file')->store('home_screen_images', 'public');
        }

        return response()->json([
            'success' => true,
            'file_path' => $imagePath,
            'url' =>  asset('storage/' . $imagePath),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_title' =>  'nullable|string|max:255',
            'image_sub_title' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        $homeImage = HomeScreenImage::create([
            'image_title' => $request->image_title,
            'image_sub_title' => $request->image_sub_title,
            'image' =>  $request->image,
        ]);

        return redirect()->route('home_screen_images.index')->with('success', 'Home screen created successfully!');
    }


    public function destroy($id)
    {
        $homeImage = HomeScreenImage::findOrFail($id);
        if ($homeImage) {
            $homeImage->delete();
        }

        return back()->with('error', 'Home screen image delete successfully!');
    }
}
