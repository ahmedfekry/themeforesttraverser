<?php

namespace App\Http\Controllers;

use App\Website;

use Illuminate\Http\Request;

class ItemController extends Controller
{
	public function index()
	{
		$website = Website::first();
		$category = $website->categories()->first();
		// return $category->items;
		return view('welcome');
	}
}
