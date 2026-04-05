<?php

namespace App\Http\Controllers\Corrib;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Apartment;
class BuildController extends Controller
{
    public function index()
    {
        $buildings = Building::with('parkings')->get();
        $apartments = Apartment::all();
        return view('housepage', compact('buildings', 'apartments'));
    }
}
