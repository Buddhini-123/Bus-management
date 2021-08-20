<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus_route extends Model
{
    use HasFactory;
    protected $table  = 'bus_routes';
    protected $fillable = [
        'id',
        'name',
        'type',
        'vehicle_number',
    ];
}
