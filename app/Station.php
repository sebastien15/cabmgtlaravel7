<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $stations;

    protected $fillable = ['route_id','from', 'to', 'from_postcode', 'to_postcode', 'price','kilometers','time'];

}
