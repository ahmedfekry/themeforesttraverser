<?php

namespace App\Http\Controllers;

use App\Website;
use App\Item;
use App\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{


	public function showByCategory($category)
	{
		$category = Category::where('name','=',$category)->first();
		$items = $category->items()->paginate(28);
		return view('category.index', compact('items'));

	}

	public function show($category,$slug)
	{
		$category = Category::where('name','=',$category)->first();

		$item = $category->items()->where('slug','=',$slug)->first();
	
		$rand = Item::inRandomOrder()->take(2)->get();
		return view('single',compact(['item','rand']));
	}

}
