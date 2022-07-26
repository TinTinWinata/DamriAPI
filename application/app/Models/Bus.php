<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = [
        'plate_number',
        'brand',
        'seat',
        'price_per_day'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'bus_id', 'id');
    }

    use HasFactory;
}
