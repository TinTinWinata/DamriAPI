<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'name',
        'age',
        'id',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'driver_id', 'id');
    }

    use HasFactory;
}
