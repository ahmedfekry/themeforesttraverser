<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'category';

	public function website()
	{
		return $this->belongsTo('App\Website');
	}

	public function items()
	{
		return $this->hasMany('App\Item');
	}
}
