<?php

namespace App\Http\Controllers\Corrib;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\Building;

class ApartmentController extends Controller
{
    public function show($slug)
    {
        $apartment = Apartment::with('rooms')
            ->where('slug', $slug)
            ->firstOrFail();
         $buildings = Building::with('parkings')->get();
        return view('apartament', compact('apartment', 'buildings'));
    }
}
