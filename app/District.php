<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    protected $fillable=['name','zone_id'];

    public function zones()
    {
        return $this->belongsToMany('App\Zone');
    }
    public function locations()
    {
        return $this->belongsToMany('App\Location');
    }
    public function countries()
    {
        return $this->belongsToMany('App\Country');
    }
}
