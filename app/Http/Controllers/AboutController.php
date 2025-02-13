<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Abouts;

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
            'images.*' => 'nullable|image|max:1024',
            'videos' => 'nullable|mimes:mp4,avi,webm|max:20480',
        ]);

        $mediaPaths = [];

        if ($request->media_type === 'images' && $request->hasFile('images')) {
            $mediaPaths = array_map(fn($image) => $image->store('images', 'public'), $request->file('images'));
        } elseif ($request->media_type === 'videos' && $request->hasFile('videos')) {
            $mediaPaths = $request->file('videos')->store('videos', 'public');
        }

        Abouts::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'media_type' => $validated['media_type'],
            'media_paths' => $mediaPaths,
        ]);

        return redirect()->route('about')->with('success', 'Data submitted successfully!');
    }
}
