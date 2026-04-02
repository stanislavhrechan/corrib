<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'number' => 'required|string|max:20',
            'name' => 'required|string|max:255',
            'area' => 'required|string',
        ]);
        $data['area'] = str_replace(',', '.', $data['area']);
        
        Room::create($data);

        return back()->with('success', 'Room created');
    }

    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            'number' => 'required|string',
            'name' => 'required|string',
            'area' => 'required|numeric',
        ]);

        $room->update($data);

        return back()->with('success', 'Room updated');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return back();
    }
}
