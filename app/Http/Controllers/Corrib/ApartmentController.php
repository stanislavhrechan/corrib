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

        $apartments = Apartment::where('floor_id', $apartment->floor_id)
            ->orderBy('id')
            ->get();

        $currentIndex = $apartments->search(function ($item) use ($apartment) {
            return $item->id === $apartment->id;
        });

        $prevApartment = $apartments[$currentIndex - 1] ?? null;
        $nextApartment = $apartments[$currentIndex + 1] ?? null;

        $buildings = Building::with('parkings')->get();

        return view('apartament', compact(
            'apartment',
            'buildings',
            'prevApartment',
            'nextApartment'
        ));
    }
}
