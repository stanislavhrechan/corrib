<?php

namespace App\Http\Controllers\Corrib;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
class HomeController extends Controller
{
    public function index()
    {

        $apartments = Apartment::with('rooms')
            ->orderBy('floor_id', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        $floorStatuses = $apartments
            ->groupBy('floor_id')
            ->map(function ($apartments) {
                if ($apartments->contains('status', 'free')) {
                    return 'available';
                }

                if ($apartments->contains('status', 'reserved')) {
                    return 'reserved';
                }

                return 'sold';
            });

        $floorData = $apartments
            ->groupBy('floor_id')
            ->map(function ($apartments) {
                if ($apartments->contains('status', 'free')) {
                    return [
                        'class' => 'available',
                        'text' => 'dostupné byty',
                    ];
                }

                if ($apartments->contains('status', 'reserved')) {
                    return [
                        'class' => 'reserved',
                        'text' => 'rezervované byty',
                    ];
                }

                return [
                    'class' => 'sold',
                    'text' => 'vypredané',
                ];
            });
        return view('index', [
            'floorStatuses' => $floorStatuses,
            'floorData' => $floorData,
        ]);
    }
}
