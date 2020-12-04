<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
 
    protected $fillable = ['name', 'description', 'image', 'seates', 'status','operator_id','custom_price_per_km','luggage_place'];

    public function operatorinfos(){
        return $this->hasMany(Operatorinfo::class);
    }
}
