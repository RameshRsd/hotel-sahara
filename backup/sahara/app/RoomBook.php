<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomBook extends Model
{

    protected $fillable=['user_id','customer_name','phone','male','purpose','female','relation','time','date','room_id'];
}
