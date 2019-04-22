<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AjaxController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function getProduct(Request $request)
    {
    	$productId=$request->productId;
    	return Product::whereId($productId)->first()->toArray();
    }
}
