<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'name',
    ];
    public function parkings()
    {
        return $this->hasMany(Parking::class);
    }
}
