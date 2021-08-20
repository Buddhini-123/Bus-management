<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus_shedule extends Model
{
    use HasFactory;
    protected $table = 'bus_shedules';
    protected $fillable = [
        'bus_route_id',
        'direction',
        'start_timestamp',
        'end_timestamp',
    ];
}
