<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable=['country_id','user_id','name','gender','nationality','id_type','zone_id','district_id','location_id','ward_no','tole','customer_id_no','contact_1','contact_2','contact_3','photo','customer_doc','fb_link'];
    public function district(){
        return $this->belongsTo(\App\District::class);
    }
    public function country(){
        return $this->belongsTo(\App\Country::class);
    }
    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }
    public function roomCheck()
    {
        return $this->belongsTo(RoomCheck::class);
    }


}
