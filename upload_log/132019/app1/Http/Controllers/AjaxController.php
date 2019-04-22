<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Purchase;
Use App\Service;
use DB;
use App\Brand;
use App\Modal;
use App\ServiceName;

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
    	return Purchase::where('product_id',$product_id)->first()->toArray();
    }
     public function getService(Request $request)
    {
    	$service_id=$request->service_id;
    	return Service::whereId($service_id)->first()->toArray();
    }
    public function getModal(Request $request)
    {
        $brandId=$request->brand;
        $allModalList= Modal::where('brand_id',$brandId)->get();
         return json_encode($allModalList);
    }
    public function getServiceThroughServiceId(Request $request)
    {
        $service_type_id=$request->service_type_id;
        $allServiceList= ServiceName::where('service_type_id',$service_type_id)->get();
         return json_encode($allServiceList);
    }

}
