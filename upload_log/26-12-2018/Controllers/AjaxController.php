<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Purchase;
Use App\Service;

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
    public function getPurchase(Request $request)
    {
    	$product_id=$request->product_id;
    	return Purchase::whereId($product_id)->first()->toArray();
    }
     public function getService(Request $request)
    {
    	$service_id=$request->service_id;
    	return Service::whereId($service_id)->first()->toArray();
    }

}
