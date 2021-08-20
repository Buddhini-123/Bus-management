<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $table  = 'routes';
    protected $fillable = [
        'id',
        'node_one',
        'node_two',
        'route_number',
        'distance',
        'time',
    ];
}
