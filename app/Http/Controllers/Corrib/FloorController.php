<?php

namespace App\Http\Controllers\Corrib;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Floor;
use App\Models\Building;

class FloorController extends Controller
{
    public function show($id) {
        $buildings = Building::with('parkings')->get();
        $floor = Floor::with('apartments')->findOrFail($id);
	$apartments = $floor->apartments()->with('rooms')->orderBy('floor_id', 'asc')->orderBy('name', 'asc')->get();
        return view('floorpage', [
            'floor' => $floor,
            'apartments' => $apartments,
            'buildings' => $buildings
        ]);
    }
}
