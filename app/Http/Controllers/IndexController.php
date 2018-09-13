<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class IndexController extends Controller
{
    //
    public function welcome()
    {
    	$products = Product::all();
    	return view('welcome')->with(compact('products'));
    }
}
