<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $fillable=['date','floor_id','room_no','room_status','room_type_id','customer_id','checkout_time'];
}
