<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class MainCategory extends Model

{

    //

    protected $table = 'main_category';



    public function categories()

    {

    	return $this->hasMany('App\Category');

    }



    public function items()

    {

    	return $this->hasManyThrough('App\Item','App\Category','website_id','category_id','id');

    }

}

