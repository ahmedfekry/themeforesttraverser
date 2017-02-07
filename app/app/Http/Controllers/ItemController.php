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
		$items = $category->items()->paginate(30);
		return view('welcome', compact('items'));
	}

	public function show(Item $item)
	{
		return view('single',compact('item'));
	}
}
