<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{
    public function index()
    {
    	$categories = Category::with(['items'=>function($query){
    					       return $query->limit(10);
    					    }])->get();
    	return $categories;
    	return view('welcome',compact('categories'));
    }
}
