<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus_schedule_booking extends Model
{
    use HasFactory;
    protected $table  = 'bus_schedule_bookings';
    protected $fillable = [
        'id',
        'bus_seats_id',
        'user_id',
        'seat_number',
        'price',
        'status',
    ];
}
