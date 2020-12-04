<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheduler extends Model
{
    protected $table = 'schedulers';

    protected $fillable = [
        'car_id', 
        'route_from', 
        'route_to', 
        'journey_date',
        'departure_time', 
        'arrival_time',
        'journey_time',
        'journey_price',
        'message'
    ];

}
