<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{
    public function index()
    {
    	$categories = Category::with(array('items'=>function($query){
				        $query->limit(10);
				    }))->get();

    	// return $category;
    	return view('welcome',compact('categories'));
    }
}
