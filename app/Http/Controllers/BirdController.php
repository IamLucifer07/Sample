<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class BirdController extends Controller
{
    public function edit($id)
    {
        $entry = Entry::findOrFail($id);
        return view('bird.edit', compact('entry'));
    }

    public function destroy($id)
    {
        Entry::destroy($id);
        return redirect()->back()->with('success', 'Entry deleted.');
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'bird_count' => 'required|integer|min:0',
            'notes' => 'nullable|string|max:1000',
        ]);

        $entry = Entry::findOrFail($id);
        $entry->update([
            'bird_count' => $validated['bird_count'],
            'notes' => $validated['notes'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Bird entry updated successfully.');
    }
}
