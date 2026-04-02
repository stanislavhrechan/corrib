<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'floor_id',
        'name',
        'slug',
        'size',
        'coords',
        'status',
        'image_path',
        'rooms_count',
        'total_area',
        'info',
    ];

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
