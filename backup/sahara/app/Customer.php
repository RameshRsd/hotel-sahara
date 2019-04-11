<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable=['country_id','user_id','name','nationality','id_type','zone_id','district_id','location_id','ward_no','tole','customer_id_no','contact_1','contact_2','contact_3','photo','customer_doc','fb_link'];
}
