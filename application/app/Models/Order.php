<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'contact_name',
        'contact_phone',
        'start_rent_date',
        'total_rent_days',
        'bus_id',
        'driver_id',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    use HasFactory;
}
