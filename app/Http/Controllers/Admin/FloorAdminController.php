<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use Illuminate\Http\Request;

class FloorAdminController extends Controller
{
    public function index()
    {
        $floors = Floor::with('apartments')->latest()->get();
        return view('admin.index', compact('floors'));
    }

    public function show(Floor $floor)
    {
        $floor->load('apartments');

        return view('admin.floors.index', compact('floor'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'floor_number' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        Floor::create($data);

        return back()->with('success', 'Floor created');
    }

    public function update(Request $request, Floor $floor)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'floor_number' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $floor->update($data);

        return back()->with('success', 'Floor updated');
    }

    public function destroy(Floor $floor)
    {
        $floor->delete();

        return back()->with('success', 'Floor deleted');
    }
}
