<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus_seat extends Model
{
    use HasFactory;
    protected $table  = 'bus_seats';
    protected $fillable = [
        'id',
        'bus_id',
        'seat_number',
        'price',
    ];
}
