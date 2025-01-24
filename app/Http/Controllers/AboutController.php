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
            'image1' => 'nullable|image|max:1024', // 1MB limit for images
            'image2' => 'nullable|image|max:1024',
            'video' => 'nullable|mimes:mp4,avi,webm|max:20480', // 20MB limit for videos
        ]);

        // Process uploaded files
        if ($request->hasFile('image1')) {
            $validated['image1'] = $request->file('image1')->store('images', 'public');
        }
        if ($request->hasFile('image2')) {
            $validated['image2'] = $request->file('image2')->store('images', 'public');
        }
        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('videos', 'public');
        }

        return redirect()->route('about')->with('success', 'Data submitted successfully!');
    }
}
