<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\MainCategory;
use App\Item;

class HomeController extends Controller
{
    public function index()
    {
    	$main_categories = MainCategory::all();
    	return view('welcome',compact('main_categories'));
    }
}
