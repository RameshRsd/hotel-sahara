<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomCheck extends Model
{

    protected $fillable=['user_id','customer_id','time','date','room_id','male','female','relation','purpose','remarks','total_transaction','guest_paid','guest_due'];
    public function customer(){
        return $this->belongsTo(\App\Customer::class);
    }

}
