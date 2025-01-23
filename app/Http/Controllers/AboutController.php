<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image1' => 'nullable|image|max:1024', // Max 1MB
            'image2' => 'nullable|image|max:1024', // Max 1MB
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:10240', // Max 10MB
        ]);

        // Handle file uploads
        $image1Path = $request->file('image1') ? $request->file('image1')->store('images', 'public') : null;
        $image2Path = $request->file('image2') ? $request->file('image2')->store('images', 'public') : null;
        $videoPath = $request->file('video') ? $request->file('video')->store('videos', 'public') : null;

        // Save data or perform other logic
        // Example:
        // About::create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'image1' => $image1Path,
        //     'image2' => $image2Path,
        //     'video' => $videoPath,
        // ]);

        return back()->with('success', 'Form submitted successfully!');
    }
    public function index()
    {
        // Return view or perform logic
        return view('about');
    }
}
