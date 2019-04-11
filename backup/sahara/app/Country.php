<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable=['country_code','country_name'];

    public function districts()
    {
        return $this->belongsToMany('App\District');
    }

}
