<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parking;
use App\Models\Building;
use Illuminate\Http\Request;

class ParkingAdminController extends Controller
{
    public function index()
    {
        $buildings = Building::all();
        return view('admin.parkings.index', compact('buildings'));
    }

    public function store_build(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Building::create($data);

        return back();
    }

    public function show(Building $building)
    {
        $building->load('parkings');
        
        return view('admin.parkings.show', compact('building'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'parking_number' => 'required|string|max:50',
            'coords' => 'nullable|string',
            'status' => 'required|in:available,reserved,sold',
        ]);

        Parking::create($data);

        return back();
    }

    public function update(Request $request, Parking $parking)
    {
        $data = $request->validate([
            'status' => 'required|in:available,reserved,sold',
        ]);

        $parking->update($data);

        return back();
    }

    public function destroy(Parking $parking)
    {
        $parking->delete();
        return back();
    }
}