<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Room extends Model
{

    protected $fillable=['date','floor_id','room_no','room_status','room_type_id','customer_id','checkout_time'];
    public function roomCheck(){
        return $this->hasMany('App\RoomCheck', 'room_id');
    }
    public function customers(){
        return $this->hasMany(Customer::class);
    }
}
