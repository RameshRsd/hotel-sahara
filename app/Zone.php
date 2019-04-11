<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{

    protected $fillable=['name','zone_id'];

    public function districts()
    {
        return $this->belongsToMany('App\District');
    }
}
