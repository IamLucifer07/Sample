<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'media_type' => 'required|in:images,videos',
            'images.*' => 'nullable|image|max:1024', // Each image has a 1MB limit
            'videos' => 'nullable|mimes:mp4,avi,webm|max:20480', // Video has a 20MB limit
        ]);

        // Process media files based on the selected media type
        if ($request->media_type === 'images' && $request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('images', 'public'); // Store images in the 'public/images' directory
            }
            $validated['images'] = $imagePaths;
        }

        if ($request->media_type === 'videos' && $request->hasFile('videos')) {
            $validated['video'] = $request->file('videos')->store('videos', 'public'); // Store video in the 'public/videos' directory
        }

        // Optionally save the data to a database or perform other actions

        return redirect()->route('about')->with('success', 'Data submitted successfully!');
    }
}
