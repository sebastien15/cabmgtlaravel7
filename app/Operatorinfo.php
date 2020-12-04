<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operatorinfo extends Model
{
    protected $table = 'operatorinfos';

    protected $fillable = ['operator_id', 'phone', 'company_name', 'car_id'];

    public function car()
    {
    	return $this->belongsTo(Car::class);
    }

    public function User()
    {
    	return $this->belongsTo(User::class);
    }
}
