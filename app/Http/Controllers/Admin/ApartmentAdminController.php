<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ApartmentAdminController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'floor_id' => 'required|exists:floors,id',
            'name' => 'required|string',
            'size' => 'nullable|string',
            'coords' => 'nullable|string',
            'status' => 'required|in:free,occupied,reserved,maintenance',
            'image_path' => 'nullable|string',
            'rooms_count' => 'nullable|integer',
            'total_area' => 'nullable|numeric',
            'info' => 'nullable|string',
        ]);

        if (!empty($data['size'])) {
            $data['size'] = str_replace(',', '.', $data['size']);
        }

        $data['slug'] = Str::slug($data['name']) . '-' . Str::random(4);

        Apartment::create($data);

        return back()->with('success', 'Apartment created');
    }

    public function update(Request $request, Apartment $apartment)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'size' => 'nullable|string',
            'status' => 'required|string',
        ]);

        if (!empty($data['size'])) {
            $data['size'] = str_replace(',', '.', $data['size']);
        }
        $apartment->update($data);
        return back()->with('success', 'Apartment updated');
    }

    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        return back();
    }
}
