<?php

namespace App\Http\Controllers;

use App\Website;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
	public function index()
	{
		$website = Website::first();
		$category = $website->categories()->first();
		$items = $category->items()->paginate(50);
		return view('welcome', compact('items'));
	}

	public function show($slug)
	{
		$item = Item::where('slug','=',$slug)->first();
	
		$rand = Item::inRandomOrder()->take(2)->get();
		return view('single',compact(['item','rand']));
	}

}
