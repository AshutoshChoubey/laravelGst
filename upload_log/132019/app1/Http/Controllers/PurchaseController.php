<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use DB;
use App\Supplier;
use App\Product;
use App\Modal;
use App\Brand;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
    	$getFormAutoFillup = array();

        $viewData['pageTitle'] = 'Add Purchase Detail'; 
        $viewData['option1'] = 'Add Supplier'; 
        $viewData['optionValue1'] = "SaiAutoCare/supplier/add";
        $viewData['option2'] = 'Add Product Detail'; 
        $viewData['optionValue2'] = "SaiAutoCare/product/add"; 
        

        $viewData['supplier'] = Supplier::pluck('supplier_name', 'id');
        $viewData['model_select'] = Modal::pluck('model_name', 'id');
        $viewData['brand_select'] = Brand::pluck('brand_name', 'id');

        $viewData['product'] = Product::pluck('product_name', 'id');
    	if(isset($id) && $id != null ){
			$getFormAutoFillup = Purchase::whereId($id)->first();           
            if ($getFormAutoFillup) {
            $getFormAutoFillup = $getFormAutoFillup->toArray();
            }
            else
            {
                $request->session()->flash('message.level', 'Error');
                $request->session()->flash('message.content', 'Somthing Went Wrong!');
            }
			return view('SaiAutoCare.purchase.add', $viewData)->with($getFormAutoFillup);
    	}
    	else
    		{
	    	if ($request->isMethod('post')){	
					$supplier_name = $request->input('supplier_name');
					$bill_num = $request->input('bill_num');
					$bill_date = $request->input('bill_date');
					$product_id = $request->input('product_id');
					$company_name = $request->input('company_name');
					$model_number = $request->input('model_number');
                    $part_number = $request->input('part_number');
                    $discription = $request->input('discription');
					$hsn = $request->input('hsn');
					$unit_price = $request->input('unit_price');
					$quantity = $request->input('quantity');
					$gst = $request->input('gst');
					$discount = $request->input('discount');
					$total_amount = $request->input('total_amount');	
                    $unit_price_exit=$request->input('unit_price_exit');   

					for($i=0; $i < count($product_id); $i++){

                            $savePurchase = new Purchase;
                            $savePurchase->supplier_name = $supplier_name;
                            $savePurchase->bill_num = $bill_num;
                            $savePurchase->bill_date = $bill_date;
                            $savePurchase->product_id = $product_id[$i];
                            $savePurchase->company_name = $company_name[$i];
                            $savePurchase->model_number = $model_number[$i];
                            $savePurchase->part_number = $part_number[$i];
                            $savePurchase->discription = $discription[$i];
                            $savePurchase->hsn = $hsn[$i];
                            $savePurchase->unit_price = $unit_price[$i];
                            $savePurchase->unit_price_exit = $unit_price_exit[$i];
                            $savePurchase->quantity = $quantity[$i];
                            $savePurchase->gst = $gst[$i];
                            $savePurchase->discount = $discount[$i];
                            $savePurchase->total_amount = $total_amount[$i];

//update product
                            $productDetail=Product::whereId($product_id[$i])->first()->toArray();
                            $productStockIn=$productDetail['stock_in'];
                            $productStockAvailable=$productDetail['stock_available'];
                            $productManame['stock_in']=$productStockIn+$savePurchase->quantity;
                            $productManame['stock_available']=$productStockAvailable+$savePurchase->quantity;
                            Product::where([['id', '=',$product_id[$i]]])->update($productManame);

                            if(!$savePurchase->save())
                            {
                            	$request->session()->flash('message.level', 'Error');
				     			$request->session()->flash('message.content', 'Somthing Went Wrong!');
                            }
                        }
						$request->session()->flash('message.level', 'success');
				     	$request->session()->flash('message.content', ' Saved Successfully!');
			}
			return view('SaiAutoCare.purchase.add', $viewData);
		}
    }
    public function update(Request $request, $id = null)
    {
    	$getFormAutoFillup = array();
        $viewData['pageTitle'] = 'Update Purchase Detail'; 
        $viewData['supplier'] = Supplier::pluck('supplier_name', 'id');
        $viewData['model_select'] = Modal::pluck('model_name', 'id');
        $viewData['brand_select'] = Brand::pluck('brand_name', 'id');
	    	if ($request->isMethod('post')){	
					$supplier_name = $request->input('supplier_name');
					$bill_num = $request->input('bill_num');
					$bill_date = $request->input('bill_date');
					$product_id = $request->input('product_id');
					$company_name = $request->input('company_name');
					$model_number = $request->input('model_number');
                    $part_number = $request->input('part_number');
                    $discription = $request->input('discription');
					$hsn = $request->input('hsn');
					$unit_price = $request->input('unit_price');
					$quantity = $request->input('quantity');
					$gst = $request->input('gst');
					$discount = $request->input('discount');
					$total_amount = $request->input('total_amount');	
                    $unit_price_exit = $request->input('unit_price_exit');   

					for($i=0; $i < count($product_id); $i++){
                            $updatePurchaseDetail = Purchase::where('id', '=', $request->id);;
                            // $savePurchase->id = $requst->id;
                            $savePurchase['supplier_name']= $supplier_name;
                            $savePurchase['bill_num']= $bill_num;
                            $savePurchase['bill_date']= $bill_date;
                            $savePurchase['product_id'] = $product_id[$i];
                            $savePurchase['company_name'] = $company_name[$i];
                            $savePurchase['model_number'] = $model_number[$i];
                            $savePurchase['discription'] = $discription[$i];
                            $savePurchase['part_number'] = $part_number[$i];
                            $savePurchase['hsn']= $hsn[$i];
                            $savePurchase['unit_price']= $unit_price[$i];
                            $savePurchase['unit_price_exit'] = $unit_price_exit[$i];
                            // $savePurchase['quantity'] = $quantity[$i];
                            $savePurchase['gst']= $gst[$i];
                            $savePurchase['discount']= $discount[$i];
                            $savePurchase['total_amount'] = $total_amount[$i];

                            //  $productDetail=Product::whereId($product_id[$i])->first()->toArray();
                            // $productStockIn=$productDetail['stock_in'];
                            // $productStockAvailable=$productDetail['stock_available'];
                            // $productManame['stock_in']=$productStockIn+$quantity[$i];
                            // $productManame['stock_available']=$productStockAvailable+$quantity[$i];
                            // Product::where([['id', '=',$product_id[$i]]])->update($productManame);
 
                            if(!$updatePurchaseDetail->update($savePurchase))
                            {
                            	$request->session()->flash('message.level', 'Error');
				     			$request->session()->flash('message.content', 'Somthing Went Wrong!');
                            }
                        }
						$request->session()->flash('message.level', 'success');
				     	$request->session()->flash('message.content', ' Updated Successfully!');
		}
		 return redirect('/SaiAutoCare/purchase/add/'.$request->id);
    }
   // this is for search
    public function view(Request $request)
    {
    	$getFormAutoFillup = array();
    	if($request->isMethod('post'))
    	{
    		$viewData['pageTitle'] = 'Add Party';       	
			$purchase= DB::table('purchases');
             $purchase->leftJoin('products','products.id','=','purchases.product_id');
             $purchase->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name');
             $purchase->leftJoin('modals','modals.id','=','purchases.model_number');
             $purchase->leftJoin('brands','brands.id','=','purchases.company_name');
             $purchase->where('purchases.deleted_at','=',null);
			if($request->has('id') && $request->id !=''){
				$getFormAutoFillup['id']=$request->id;
				$purchase->where('id', '=', $request->id);
			}
			if($request->has('supplier_name') && $request->supplier_name !=''){
				$getFormAutoFillup['supplier_name']=$request->supplier_name;
				$purchase->where('suppliers.supplier_name', 'like', '%'.$request->supplier_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$getFormAutoFillup['created_at_from']=$request->created_at_from;
				$purchase->whereDate('created_at', '<=', $request->created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$getFormAutoFillup['created_at_to']=$request->created_at_to;
				$purchase->whereDate('created_at', '>=', $request->created_at_to);
			}
			if($request->has('product_name') && $request->product_name !=''){
				$getFormAutoFillup['product_name']=$request->product_name;
				$purchase->where('product_id', 'like', '%'.$request->product_name.'%');
			}
			if($request->has('company_name') && $request->company_name !=''){
				$getFormAutoFillup['company_name']=$request->company_name;
				$purchase->where('company_name', '=', $request->company_name);
			}

			$purchase->select('purchases.*','products.product_name as product_name','suppliers.supplier_name as supplier_name_from_supplier');
			$purchase->orderBy('id','desc');
       		$purchase= $purchase->get();
			$viewData['purchase']=json_decode(json_encode($purchase), true);
			// print_r($viewData['purchase']);
			// exit;

		    return view('SaiAutoCare.purchase.search', $viewData)->with($getFormAutoFillup);;

    	}else
    	{
    		$viewData['pageTitle'] = 'Add Party';       	
			$purchase= DB::table('purchases');
            $purchase->where('purchases.deleted_at', '=', null);
             $purchase->leftJoin('products','products.id','=','purchases.product_id');
             $purchase->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name');
             $purchase->leftJoin('modals','modals.id','=','purchases.model_number');
             $purchase->leftJoin('brands','brands.id','=','purchases.company_name');
             $purchase->select('purchases.*','products.product_name as product_name','suppliers.supplier_name as supplier_name_from_supplier','brands.brand_name as company_name_from_brand','modals.model_name as model_number');
             $purchase= $purchase->get();
            $viewData['purchase']=json_decode(json_encode($purchase), true);
            // $viewData['purchase'] = $purchase;
		//	$purchase= DB::table('purchases');
			//$purchase->orderBy('id','desc');
       		//$purchase= $purchase->get();
			//$viewData['purchase']=json_decode(json_encode($purchase), true);
            //Ashu@97047$&(!   ca7zaoly6g7y
		    return view('SaiAutoCare.purchase.search', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (Purchase::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Purchase was Trashed!');
            $viewData['pageTitle'] = 'Purchase';       	
			$purchase= DB::table('purchases');
            $purchase->where('purchases.deleted_at', '=', null);
             $purchase->leftJoin('products','products.id','=','purchases.product_id');
             $purchase->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name');
             $purchase->leftJoin('modals','modals.id','=','purchases.model_number');
             $purchase->leftJoin('brands','brands.id','=','purchases.company_name');
             $purchase->select('purchases.*','products.product_name as product_name','suppliers.supplier_name as supplier_name_from_supplier','brands.brand_name as company_name_from_brand','modals.model_name as model_number');
             $purchase= $purchase->get();
            $viewData['purchase']=json_decode(json_encode($purchase), true);
			return view('SaiAutoCare.purchase.search', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Purchase';       	
			$purchase= DB::table('purchases');
            $purchase->where('purchases.deleted_at', '=', null);
             $purchase->leftJoin('products','products.id','=','purchases.product_id');
             $purchase->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name');
             $purchase->leftJoin('modals','modals.id','=','purchases.model_number');
             $purchase->leftJoin('brands','brands.id','=','purchases.company_name');
             $purchase->select('purchases.*','products.product_name as product_name','suppliers.supplier_name as supplier_name_from_supplier','brands.brand_name as company_name_from_brand','modals.model_name as model_number');
             $purchase= $purchase->get();
            $viewData['purchase']=json_decode(json_encode($purchase), true);
			return view('SaiAutoCare.purchase.search', $viewData);
       }
    
    }
    public function trashedList()
    {

         $TrashedPurchase = Purchase::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('SaiAutoCare.purchase.delete', compact('TrashedPurchase', 'TrashedPurchase'));
      
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (Purchase::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Purchase was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }

    	 $TrashedPurchase = Purchase::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(50);
         return view('SaiAutoCare.purchase.delete', compact('TrashedPurchase', 'TrashedPurchase'));
    }
}
