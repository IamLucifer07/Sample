<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    // Fetch all datas
    public function index()
    {
        $datas = Data::all();
        return response()->json($datas);
    }

    // Create a new data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'string',
            'description' => 'string',
        ]);

        $data = Data::create($validatedData);
        return response()->json($data, 201);
    }

    // Fetch a single data
    public function show($id)
    {
        return Data::findOrFail($id);
    }

    // Update a data
    public function update(Request $request, $id)
    {
        $data = Data::findOrFail($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    // Delete a data
    public function destroy($id)
    {
        Data::destroy($id);
        return response()->json(null, 204);
    }
}
