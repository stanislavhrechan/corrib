<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $fillable = [
        'building_id',
        'parking_number',
        'coords',
        'status',
    ];
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'available' => 'Voľné',
            'reserved' => 'Rezervované',
            'sold' => 'Predané',
            default => $this->status,
        };
    }
}
