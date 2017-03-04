<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    //
    protected $table = 'website';

    public function categories()
    {
    	return $this->hasMany('App\Category');
    }

    public function items()
    {
    	return $this->hasManyThrough('App\Item','App\Category','website_id','category_id','id');
    }
}
