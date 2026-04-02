<?php

namespace App\Http\Controllers\Corrib;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Building;
class BuildController extends Controller
{
    public function index()
    {
        $buildings = Building::with('parkings')->get();

        return view('housepage', compact('buildings'));
    }
}
