<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class IndexController extends Controller
{
    //
    public function welcome()
    {
    	//$products = Product::paginate(9);
    	//return view('welcome')->with(compact('products'));
    	$categories = Category::has('products')->get();
    	return view('welcome')->with(compact('categories'));
    }
}
