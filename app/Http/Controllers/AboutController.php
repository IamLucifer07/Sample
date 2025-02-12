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

        $validated[($request->media_type === 'images' && $request->hasFile('images')) ? 'images' : 'video'] =
            $request->media_type === 'images'
            ? array_map(fn($image) => $image->store('images', 'public'), $request->file('images'))
            : ($request->media_type === 'videos' ? $request->file('videos')->store('videos', 'public') : null);

        // laravel is crazyyy :D

        // return redirect()->route('about')->with('success', 'Data submitted successfully!');
    }
}
