<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use DB;
use App\Supplier;
use App\ProductColor;
use App\ProductModel;
use App\ProductBrand;
use App\ProductType;
use App\ProductUnit; 
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\SupplierDebitLog;
use App\PurchaseInvoice;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
      $getFormAutoFillup = array();
      $viewData['supplierSelect'] = Supplier::pluck('supplier_name', 'id');

      $productTypeSelect = DB::table('product_types')->leftJoin('products','product_types.id','=','products.product_type')->select('product_types.id','product_types.type_name')->distinct()->get();
      $plucked = $productTypeSelect->pluck('type_name','id');
      $viewData['productTypeSelect']=$plucked;

      $productModel =  DB::table('products')->leftJoin('product_models','product_models.id','=','products.product_model')->select('product_models.id','product_models.model_name')
      ->where('product_models.id','!=',null)
      ->where('products.status','=',1)
      ->distinct()->get();
      $productModelSelect = $productModel->pluck('model_name','id');
      $viewData['productModelSelect']=$productModelSelect;

      $productColor =  DB::table('products')->leftJoin('product_colors','product_colors.id','=','products.product_color')->select('product_colors.id','product_colors.color_name')
      ->where('products.deleted_at','=',null)
      ->where('product_colors.id','!=',null)
      ->where('products.status','=',1)
      ->distinct()->get();
      $productColorSelect = $productColor->pluck('model_name','id');
      $viewData['productColorSelect']=$productColorSelect;

       $productColor =  DB::table('products')->leftJoin('product_colors','product_colors.id','=','products.product_color')->select('product_colors.id','product_colors.color_name')
      ->where('products.deleted_at','=',null)
      ->where('product_colors.id','!=',null)
      ->where('products.status','=',1)
      ->distinct()->get();
      $productColorSelect = $productColor->pluck('color_name','id');
      $viewData['productColorSelect']=$productColorSelect;

      $productBrandName =  DB::table('products')->leftJoin('product_brands','product_brands.id','=','products.product_brand')->select('product_brands.id','product_brands.brand_name')
      ->where('products.deleted_at','=',null)
      ->where('product_brands.id','!=',null)
      ->where('products.status','=',1)
      ->distinct()->get();
      $productBrandNameSelect = $productBrandName->pluck('brand_name','id');
      $viewData['productBrandSelect']=$productBrandNameSelect;



      $ProductName = DB::table('products')->select('products.id','products.product_name')
      ->where('products.deleted_at','=',null)
      ->where('products.status','=',1)
      ->distinct()->get();
      $productNameSelect = $ProductName->pluck('product_name','id');
      $viewData['productNameSelect']=$productNameSelect;


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
			 return view('GST.purchase.add', $viewData)->with($getFormAutoFillup);
    	}
    	else
    		{
	    	if ($request->isMethod('post')){

              $savePurchaseInvoice = new PurchaseInvoice;
              $savePurchaseInvoice->supplier_id = $request->supplier_id;
              $savePurchaseInvoice->purchase_invoice_number =  $request->purchase_invoice_number;
              $savePurchaseInvoice->purchase_invoice_date =  date('Y-m-d H:i:s', strtotime($request->input('purchase_invoice_date')));
              $savePurchaseInvoice->purchase_invoice_amount =  $request->purchase_invoice_amount;
              $savePurchaseInvoice->purchase_discription =  $request->purchase_discription;
              $savePurchaseInvoice->payment_type =  $request->payment_type;
              $savePurchaseInvoice->user_id =  Auth::user()->id;
              $savePurchaseInvoice->total_purchase_amount =  $request->total_purchase_amount;
              $savePurchaseInvoice->purchase_due_amount =  $request->purchase_due_amount;
              if($savePurchaseInvoice->save())
              {
               $purchaseInvoiceId= $savePurchaseInvoice->id;
              }

					for($i=0; $i < count($request->product_name); $i++){
                          $savePurchase = new Purchase;
                          $savePurchase->purchase_invoice_id = $purchaseInvoiceId;
                          $savePurchase->supplier_id = $request->supplier_id;
                          $savePurchase->supplier_name = $request->supplier_name; 
                          $savePurchase->supplier_email =$request->input('supplier_email');                      
                          $savePurchase->supplier_mob_num =  $request->supplier_mob_num;
                          $savePurchase->supplier_address =$request->input('supplier_address'); 
                          $savePurchase->purchase_invoice_number =  $request->purchase_invoice_number;
                          $savePurchase->purchase_invoice_date = date('Y-m-d H:i:s', strtotime($request->input('purchase_invoice_date')));
                          $savePurchase->purchase_invoice_amount =  $request->purchase_invoice_amount;
                          $savePurchase->purchase_discription =  $request->purchase_discription;
                          $savePurchase->payment_type =  $request->payment_type;
                          $savePurchase->product_name =  $request->product_name[$i];
                          $savePurchase->product_code =  $request->product_code[$i];
                          $savePurchase->product_color =  $request->product_color[$i];
                          $savePurchase->product_model =  $request->product_model[$i];
                          $savePurchase->product_brand =  $request->product_brand[$i];
                          $savePurchase->product_type =  $request->product_type[$i];
                          $savePurchase->product_discription =  $request->product_discription[$i];
                          $savePurchase->product_hsn =  $request->product_hsn[$i];
                          $savePurchase->product_gst =  $request->product_gst[$i];
                          $savePurchase->product_sgst =  $request->product_sgst[$i];
                          $savePurchase->product_cgst =  $request->product_cgst[$i];
                          $savePurchase->product_igst =  $request->product_igst[$i];
                          $savePurchase->product_discount_in_perce =  $request->product_discount_in_perce[$i];
                          $savePurchase->product_discount =  $request->product_discount[$i];
                          $savePurchase->product_quantity =  $request->product_quantity[$i];
                          $savePurchase->product_unit =  $request->product_unit[$i];
                          $savePurchase->product_salling_price =  $request->product_salling_price[$i];
                          $savePurchase->product_price_withoutgst =  $request->product_price_withoutgst[$i];
                          $savePurchase->product_price_withgst =  $request->product_price_withgst[$i];
                          $savePurchase->product_salling_price =  $request->product_salling_price[$i];
                          $savePurchase->product_total_amount =  $request->product_total_amount[$i];
                          $totalTaxPrice=($request->product_price_withgst[$i] )-  ($request->product_price_withoutgst[$i]);
                          $savePurchase->product_tax_amount = $totalTaxPrice;
                          $savePurchase->product_total_tax_amount = $totalTaxPrice*$request->product_quantity[$i];
                          $savePurchase->created_by = Auth::user()->id;

                            $productDetail=Product::whereId($request->product_name[$i])->first()->toArray();
                            $productStockIn=$productDetail['stock_in'];
                            $productStockAvailable=$productDetail['available_stock'];
                            $productManame['stock_in']=$productStockIn+$savePurchase->product_quantity;
                            $productManame['available_stock']=$productStockAvailable+$savePurchase->product_quantity;
                            Product::where([['id', '=',$request->product_name[$i]]])->update($productManame);
                            $supplierDetail=Supplier::whereId($request->supplier_id)->first()->toArray();
                            $total_supplier_balance=$supplierDetail['total_supplier_balance'];
                            $total_supplier_debit=$supplierDetail['total_supplier_debit'];
                            $supplierManame['total_supplier_debit']=$total_supplier_debit+$request->product_total_amount[$i];
                            $supplierManame['total_supplier_balance']=$total_supplier_balance-$request->product_total_amount[$i];
                            Supplier::where([['id', '=',$request->supplier_id]])->update($supplierManame);

                            if(!$savePurchase->save())
                            {
                            	$request->session()->flash('message.level', 'Error');
			     			              $request->session()->flash('message.content', 'Somthing Went Wrong!');
                            }
                            else
                            {
                                $saveSupplierDebitLog = new SupplierDebitLog;
                                $saveSupplierDebitLog->user_id =Auth::user()->id;
                                $saveSupplierDebitLog->supplier_id =$request->supplier_id;
                                $saveSupplierDebitLog->purchase_id =$savePurchase->id;
                                $saveSupplierDebitLog->debit_amount = $request->product_total_amount[$i];
                                $saveSupplierDebitLog->save();
                                // return 1;
                            }
                        }
						$request->session()->flash('message.level', 'success');
				     	$request->session()->flash('message.content', ' Saved Successfully!');
            //  exit;
			 }
             
			return view('GST.purchase.add',$viewData);
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

                            // $productDetail=Product::whereId($product_id[$i])->first()->toArray();
                              $productManame['unit_price_exit']=$unit_price_exit[$i];
                           // $productManame['gst']=$gst[$i];
                            Product::where([['id', '=',$product_id[$i]]])->update($productManame);
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
		 return redirect('/GST/purchase/add/'.$request->id);
    }
   // this is for search
    public function view(Request $request)
    {
    	$getFormAutoFillup = array();
    	if($request->isMethod('post'))
    	{
    		$viewData['pageTitle'] = 'Purchase Details'; 
//         use App\ProductColor;
// use App\ProductModel;
// use App\ProductBrand;
// use App\ProductType;
// use App\ProductUnit;       	
			$purchase= DB::table('purchase_invoices');
      $purchase->join('purchases','purchase_invoices.id','=','purchases.purchase_invoice_id');
      $purchase->join('products','products.id','=','purchases.product_name');
             // $purchase->leftJoin('suppliers','suppliers.id','=','purchases.supplier_name');
             // $purchase->leftJoin('product_colors','product_colors.id','=','purchases.model_number');
             // $purchase->leftJoin('product_brands','product_brands.id','=','purchases.company_name');
             $purchase->where('purchase_invoices.deleted_at','=',null);
			if($request->has('id') && $request->id !=''){
				$getFormAutoFillup['id']=$request->id;
				$purchase->where('purchase_invoices.id', '=', $request->id);
			}
			if($request->has('supplier_name') && $request->supplier_name !=''){
				$getFormAutoFillup['supplier_name']=$request->supplier_name;
				$purchase->where('purchases.supplier_name', 'like', '%'.$request->supplier_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$getFormAutoFillup['created_at_from']=$request->created_at_from;
				$purchase->whereDate('purchases.created_at', '<=', $request->created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$getFormAutoFillup['created_at_to']=$request->created_at_to;
				$purchase->whereDate('purchases.created_at', '>=', $request->created_at_to);
			}
			$purchase->select('purchase_invoices.*','purchase_invoices.id as purchaseInvoiceId','purchases.*','purchases.id as productId','products.product_name as Productname');
			$purchase->orderBy('purchases.id','desc');
       		$purchase= $purchase->get();
			$viewData['purchase']=json_decode(json_encode($purchase), true);
			// print_r($viewData['purchase']);
			// exit;

		    return view('GST.purchase.search', $viewData)->with($getFormAutoFillup);;

    	}else
    	{
        $viewData['pageTitle'] = 'Purchase Details';       	
        $purchase= DB::table('purchase_invoices');
        $purchase->join('purchases','purchase_invoices.id','=','purchases.purchase_invoice_id');
        $purchase->join('products','products.id','=','purchases.product_name');
        $purchase->select('purchase_invoices.*','purchase_invoices.id as purchaseInvoiceId','purchases.*','purchases.id as productId','products.product_name as Productname');
        $purchase->where('purchase_invoices.deleted_at','=',null);
        $purchase->orderBy('purchases.id','desc');
        $purchase= $purchase->get();
        $viewData['purchase']=json_decode(json_encode($purchase), true);
            // $viewData['purchase'] = $purchase;
		//	$purchase= DB::table('purchases');
			//$purchase->orderBy('id','desc');
       		//$purchase= $purchase->get();
			//$viewData['purchase']=json_decode(json_encode($purchase), true);
            //Ashu@97047$&(!   ca7zaoly6g7y
		    return view('GST.purchase.search', $viewData);
    	}
      
    }

    public function viewPurchaseInvoice(Request $request)
    {
      $getFormAutoFillup = array();
      if($request->isMethod('post'))
      {
        $viewData['pageTitle'] = 'Purchase Details';       
        $purchase= DB::table('purchase_invoices');
        $purchase->leftJoin('suppliers','suppliers.id','=','purchase_invoices.supplier_id');
        $purchase->where('purchase_invoices.deleted_at','=',null);
      if($request->has('id') && $request->id !=''){
        $getFormAutoFillup['id']=$request->id;
        $purchase->where('purchase_invoices.id', '=', $request->id);
      }
      if($request->has('supplier_name') && $request->supplier_name !=''){
        $getFormAutoFillup['supplier_name']=$request->supplier_name;
        $purchase->where('purchases.supplier_name', 'like', '%'.$request->supplier_name.'%');
      }
      if($request->has('created_at_from') && $request->created_at_from !=''){
        $getFormAutoFillup['created_at_from']=$request->created_at_from;
        $purchase->whereDate('purchases.created_at', '<=', $request->created_at_from);
      }
      if($request->has('created_at_to') && $request->created_at_to !=''){
        $getFormAutoFillup['created_at_to']=$request->created_at_to;
        $purchase->whereDate('purchases.created_at', '>=', $request->created_at_to);
      }
      $sale->select('purchase_invoices.id as purchase_invoice_id','purchase_invoices.*','suppliers.*');
      $purchase->orderBy('purchase_invoices.id','desc');
          $purchase= $purchase->get();
      $viewData['purchase']=json_decode(json_encode($purchase), true);
      // print_r($viewData['purchase']);
      // exit;

        return view('GST.purchase.purchaseInvoiceSearch', $viewData)->with($getFormAutoFillup);;

      }else
      {
        $viewData['pageTitle'] = 'Purchase Details';        
        $purchase= DB::table('purchase_invoices');
        $purchase->leftJoin('suppliers','suppliers.id','=','purchase_invoices.supplier_id');
        $purchase->where('purchase_invoices.deleted_at','=',null);
        $purchase->select('purchase_invoices.id as purchase_invoice_id','purchase_invoices.*','suppliers.*');
        $purchase->orderBy('purchase_invoices.id','desc');
        $purchase= $purchase->get();
        $viewData['purchase']=json_decode(json_encode($purchase), true);
        return view('GST.purchase.purchaseInvoiceSearch', $viewData);
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
			return view('GST.purchase.search', $viewData);
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
			return view('GST.purchase.search', $viewData);
       }
    
    }
    public function trashedList()
    {

         $TrashedPurchase = Purchase::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.purchase.delete', compact('TrashedPurchase', 'TrashedPurchase'));
      
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
         return view('GST.purchase.delete', compact('TrashedPurchase', 'TrashedPurchase'));
    }
    public function purchaseView(Request $request,$id)
    {
      if(($id!=null) && (Purchase::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Purchase was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }
       $TrashedPurchase = Purchase::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(50);
         return view('GST.purchase.delete', compact('TrashedPurchase', 'TrashedPurchase'));
    }
    public function purchaseInvoiceView($invoiceId)
    {
        $purchase= DB::table('purchase_invoices');
        $purchase->join('suppliers','suppliers.id','=','purchase_invoices.supplier_id');
        $purchase->where('purchase_invoices.id','=',$invoiceId);
        $purchase->where('purchase_invoices.deleted_at','=',null);
        $purchase->select('purchase_invoices.*','suppliers.*');
        $purchaseInvoice=$purchase->get();
        $array = json_decode(json_encode($purchaseInvoice), true);
        $purchaseInvoice=$array[0];
       

        $purchaseProduct= DB::table('purchases');
        $purchaseProduct->where('purchases.purchase_invoice_id','=',$invoiceId);
        $purchaseProduct->join('products','products.id','=','purchases.product_name');
        $purchaseProduct->where('purchases.deleted_at','=',null);
        $purchaseProduct->select('purchases.*','products.product_name as productName','purchases.product_name as productId');
        $purchaseProduct=$purchaseProduct->get();


        $viewData['purchaseInvoice']=$purchaseInvoice;
        $viewData['purchaseProduct']=$purchaseProduct;
     return view('GST.purchase.purchaseInvoice',$viewData);
    }
    public function purcheseReturn()
    {
       $purcheseReturn= DB::table('return_purchase_logs'); 
       $purcheseReturn->join('purchases','purchases.id','=','return_purchase_logs.purchase_id');
        $purcheseReturn->join('suppliers','suppliers.id','=','purchases.supplier_id');
        // $sale->leftJoin('sale_invoices','sale_invoices.id','=','return_product_logs.sale_invoice_id');
        $purcheseReturn->where('return_purchase_logs.deleted_at','=',null);
        $purcheseReturn->select('return_purchase_logs.*','suppliers.*');
        $purcheseReturn->orderBy('return_purchase_logs.id','desc');
        $purcheseReturn= $purcheseReturn->get();
        $purcheseReturn=json_decode(json_encode($purcheseReturn),true);
        $viewData['purcheseReturn'] = $purcheseReturn;
      return view('GST.purchase.purcheseReturn', $viewData);
    }
    public function purchaseDebitNotes($invoiceId)
    {

        $purchase= DB::table('purchase_invoices');
        $purchase->join('suppliers','suppliers.id','=','purchase_invoices.supplier_id');
        $purchase->where('purchase_invoices.id','=',$invoiceId);
        $purchase->where('purchase_invoices.deleted_at','=',null);
        $purchase->select('purchase_invoices.*','suppliers.*','purchase_invoices.id as purchaseInvoiceId');
        $purchaseInvoice=$purchase->get();
        $array = json_decode(json_encode($purchaseInvoice), true);
        $purchaseInvoice=$array[0];
       $query="select purchases.*,return_purchase_logs.*,return_purchase_logs.quantity as returnedQuantity,products.product_name as productName,purchases.product_name as productId , sum(return_purchase_logs.quantity) as aggregate from `purchases` inner join `return_purchase_logs` on `return_purchase_logs`.`purchase_id` = `purchases`.`id` inner join `products` on `products`.`id` = `purchases`.`product_name` where `purchases`.`purchase_invoice_id` = ".$invoiceId." and `return_purchase_logs`.`purchase_invoice_id` = ".$invoiceId." and `purchases`.`deleted_at` is null group by `product_id`";
       // echo  $query;
        $purchaseProduct= DB::select(DB::raw($query));
        // $purchaseProduct->join('return_purchase_logs','return_purchase_logs.purchase_id','=','purchases.id');
        // $purchaseProduct->where('purchases.purchase_invoice_id','=',$invoiceId);
        // $purchaseProduct->where('return_purchase_logs.purchase_invoice_id','=',$invoiceId);
        // $purchaseProduct->join('products','products.id','=','purchases.product_name');
        // $purchaseProduct->where('purchases.deleted_at','=',null);
        // $purchaseProduct->select('purchases.*','return_purchase_logs.*','return_purchase_logs.quantity as returnedQuantity','products.product_name as productName','purchases.product_name as productId');
        // $purchaseProduct->groupBy('product_id');
       // $purchaseProduct->where('accepted', 1)
        // $purchaseProduct->sum('returnedQuantity');
        // $purchaseProduct=$purchaseProduct->get();
        // $purchaseProduct=json_decode(json_encode($purchaseProduct),true);
        // print_r($purchaseProduct);
        // exit;

        // print_r($purchaseProduct);
        // $ProductId1=0;
        // $purchaseProductDebit=array();
        // for ($i=0;count($purchaseProduct)>$i; $i++) {
          // $purchaseProduct12=$purchaseProduct[$i]->product_id;
           // echo  "if($purchaseProduct12!=$ProductId1  || $ProductId1==0)<br>";
        //   if($purchaseProduct[$i]['product_id']!=$ProductId1  || $ProductId1==0)
        //   {
        //      // print_r($purchaseProduct[$i]['product_id']);
        //       // echo "<br><br>";
        //       $purchaseProductDebit=$purchaseProduct[$i];
        //        $ProductId1=$purchaseProduct[$i]['product_id'];
        //   }
        
        // }
         // print_r($purchaseProduct);
         // exit;
       $viewData['purchaseInvoice']=$purchaseInvoice;
        $viewData['purchaseProduct']=$purchaseProduct;
        return view('GST.purchase.debitNotes',$viewData);
    }
}
