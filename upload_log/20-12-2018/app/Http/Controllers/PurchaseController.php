<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use DB;
use App\Supplier;
use App\Product;

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
        $viewData['supplier'] = Supplier::pluck('supplier_name', 'id');

        $viewData['product'] = Product::pluck('product_name', 'id');
    	if(isset($id) && $id != null ){
			$getFormAutoFillup = Purchase::whereId($id)->first()->toArray();
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
	    	if ($request->isMethod('post')){	
					$supplier_name = $request->input('supplier_name');
					$bill_num = $request->input('bill_num');
					$bill_date = $request->input('bill_date');
					$product_id = $request->input('product_id');
					$company_name = $request->input('company_name');
					$model_number = $request->input('model_number');
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
                            $savePurchase['hsn']= $hsn[$i];
                            $savePurchase['unit_price']= $unit_price[$i];
                            $savePurchase['unit_price_exit'] = $unit_price_exit[$i];
                            $savePurchase['quantity'] = $quantity[$i];
                            $savePurchase['gst']= $gst[$i];
                            $savePurchase['discount']= $discount[$i];
                            $savePurchase['total_amount'] = $total_amount[$i];
 
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
			if($request->has('id') && $request->id !=''){
				$getFormAutoFillup['id']=$request->id;
				$purchase->where('id', '=', $request->id);
			}
			if($request->has('supplier_name') && $request->supplier_name !=''){
				$getFormAutoFillup['supplier_name']=$request->supplier_name;
				$purchase->where('supplier_name', 'like', '%'.$request->supplier_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$getFormAutoFillup['created_at_from']=$request->created_at_from;
				$purchase->where('created_at', '>=', $request->created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$getFormAutoFillup['created_at_to']=$request->created_at_to;
				$purchase->where('created_at', '<', $request->created_at_to);
			}
			if($request->has('product_name') && $request->product_name !=''){
				$getFormAutoFillup['product_name']=$request->product_name;
				$purchase->where('product_id', 'like', '%'.$request->product_name.'%');
			}
			if($request->has('company_name') && $request->company_name !=''){
				$getFormAutoFillup['company_name']=$request->company_name;
				$purchase->where('company_name', '=', $request->company_name);
			}
			$purchase->select('purchases.*','purchases.product_id as product_name');
			$purchase->orderBy('id','desc');
       		$purchase= $purchase->get();
			$viewData['purchase']=json_decode(json_encode($purchase), true);
			// print_r($viewData['purchase']);
			// exit;

		    return view('SaiAutoCare.purchase.search', $viewData)->with($getFormAutoFillup);;

    	}else
    	{
    		$viewData['pageTitle'] = 'Add Party';       	
			$viewData['purchase'] = Purchase::orderBy('id','desc')->get();
		//	$purchase= DB::table('purchases');
			//$purchase->orderBy('id','desc');
       		//$purchase= $purchase->get();
			//$viewData['purchase']=json_decode(json_encode($purchase), true);
		    return view('SaiAutoCare.purchase.search', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (Purchase::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Purchase was Trashed!');
            $viewData['pageTitle'] = 'Purchase';       	
			$viewData['purchase'] = Purchase::paginate(10);
			return view('SaiAutoCare.purchase.search', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Purchase';       	
			$viewData['purchase'] = Purchase::paginate(10);
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
