<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = [
        'name',
        'floor_number',
        'description',
        'rooms_count',
        'image_path',
    ];

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }
}
