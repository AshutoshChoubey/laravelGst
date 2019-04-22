<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use DB;
use App\Customer;
use App\ProductColor;
use App\ProductModel;
use App\ProductBrand;
use App\ProductType;
use App\ProductUnit; 
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\CustomerLog;
use App\SaleInvoice;
// use App\CustomerLog;

class SalesController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
      $getFormAutoFillup = array();
      $viewData['customerSelect'] = Customer::pluck('customer_name', 'id');
      // $viewData['customerSelect'] = Customer::pluck('customer_name', 'id');

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
            $getFormAutoFillup =Sale::whereId($id)->first();           
      if ($getFormAutoFillup) {
          $getFormAutoFillup = $getFormAutoFillup->toArray();
        }
        else
        {
            $request->session()->flash('message.level', 'Error');
            $request->session()->flash('message.content', 'Somthing Went Wrong!');
        }
             return view('GST.sales.add', $viewData)->with($getFormAutoFillup);
        }
        else
            {
            if ($request->isMethod('post')){
  // id  customer_id customer_name customer_contact_number customer_address  customer_email  payment_type  sale_discription  total_sale_amount sale_due_amount discount
              if($request->customer_id==null)
              {
                $customerSave =  new Customer();
                $customerSave->customer_name =$request->customer_name;
                $customerSave->customer_contact_number =$request->customer_contact_number;
                $customerSave->customer_alt_number =$request->customer_alt_number;
                $customerSave->customer_email =$request->customer_email;
                $customerSave->customer_address =$request->customer_address;
                $customerSave->customer_gstin =$request->customer_gstin;
                $customerSave->created_by =Auth::user()->id;    
                $customerSave->save();   
                $request->customer_id=$customerSave->id;
              }
                $saveSaleInvoice = new SaleInvoice;
                $saveSaleInvoice->customer_id = $request->customer_id;
                $saveSaleInvoice->customer_name =$request->customer_name;
                $saveSaleInvoice->customer_contact_number = $request->customer_contact_number;
                $saveSaleInvoice->customer_address = $request->customer_address;
                $saveSaleInvoice->customer_email = $request->customer_email;
                $saveSaleInvoice->payment_type =  $request->payment_type;
                $saveSaleInvoice->sale_discription =  $request->sale_discription;
                $saveSaleInvoice->total_sale_amount =  $request->total_sale_amount;
                $saveSaleInvoice->sale_due_amount =  $request->sale_due_amount;
                $saveSaleInvoice->user_id =  Auth::user()->id;
                $saveSaleInvoice->discount =  $request->discount;
              if($saveSaleInvoice->save())
              {
               $saleInvoiceId= $saveSaleInvoice->id;
              }

                    for($i=0; $i < count($request->product_name); $i++){
                          $saveSale = new Sale;
                          $saveSale->sale_invoice_id = $saleInvoiceId;
                          $saveSale->customer_id = $request->customer_id;
                          $saveSale->customer_name = $request->customer_name;                  
                          $saveSale->customer_contact_number =  $request->customer_contact_number;
                          $saveSale->customer_address =$request->input('customer_address'); 
                          $saveSale->customer_email =  $request->customer_email;
                          $saveSale->payment_type =  $request->payment_type;
                          $saveSale->sale_discription =  $request->sale_discription;
                          $saveSale->user_id =  Auth::user()->id;   
                          $saveSale->product_type =  $request->product_type[$i];
                          $saveSale->product_brand =  $request->product_brand[$i];
                          $saveSale->product_model =  $request->product_model[$i];
                          $saveSale->product_color =  $request->product_color[$i];
                          $saveSale->product_name =  $request->product_name[$i];
                          $saveSale->product_code =  $request->product_code[$i];
                          $saveSale->product_discription =  $request->product_discription[$i];
                          $saveSale->product_unit =  $request->product_unit[$i];
                          $saveSale->product_hsn =  $request->product_hsn[$i];
                          $saveSale->product_price_withgst =  $request->product_price_withoutgst[$i]+ ($request->product_price_withoutgst[$i]* $request->product_gst[$i])/100;
                          $saveSale->product_price_withoutgst =  $request->product_price_withoutgst[$i];
                          $saveSale->product_igst =  $request->product_igst[$i];
                          $saveSale->product_cgst =  $request->product_cgst[$i];
                          $saveSale->product_sgst =  $request->product_sgst[$i];
                          $saveSale->product_gst =  $request->product_gst[$i];
                          // $saveSale->product_salling_price =  $request->product_salling_price[$i];
                          $saveSale->product_quantity =  $request->product_quantity[$i];
                          $saveSale->product_total_amount =  $request->product_total_amount[$i];

                          
                          $productDetail=Product::whereId($request->product_name[$i])->first()->toArray();

                            $productStockOut=$productDetail['stock_out'];
                            $productStockAvailable=$productDetail['available_stock'];
                            $productManame['stock_out']=$productStockOut+$saveSale->product_quantity;
                            $productManame['available_stock']=$productStockAvailable-$saveSale->product_quantity;
                            Product::where([['id', '=',$request->product_name[$i]]])->update($productManame);

                            // $customerDetail=Customer::whereId($request->customer_id)->first()->toArray();
                            // $total_customer_balance=$customerDetail['total_customer_balance'];
                            // $total_customer_debit=$customerDetail['total_customer_debit'];
                            // $customerManame['total_customer_debit']=$total_customer_debit+$request->product_total_amount[$i];
                            // $customerManame['total_customer_balance']=$total_customer_balance-$request->product_total_amount[$i];
                            // Customer::where([['id', '=',$request->customer_id]])->update($customerManame);
                           
                           

                            if(!$saveSale->save())
                            {
                                  $request->session()->flash('message.level', 'Error');
                                  $request->session()->flash('message.content', 'Somthing Went Wrong!');
                            }
                            else
                            {
                                $customerManame['customer_id']= $request->customer_id;
                                $customerManame['sale_invoice_id']=$saleInvoiceId;
                                $customerManame['product_id']=$request->product_name[$i];
                                $customerManame['debit_amount']= $request->product_total_amount[$i];
                                $customerManame['is_debit']=1;
                                $customerManame['comments']=$request->sale_discription;
                                $customerManame['payment_type']= $request->payment_type;
                                CustomerLog::where([['id', '=',$request->customer_id]])->update($customerManame);
                            }
                        }
                        $request->session()->flash('message.level', 'success');
                        $request->session()->flash('message.content', ' Saved Successfully!');
             }
             
            return view('GST.sales.add',$viewData);
          }
    }

     public function update(Request $request, $id = null)
    {
        $getFormAutoFillup = array();
        $viewData['pageTitle'] = 'Update Sale Detail'; 
        $viewData['customer'] = Customer::pluck('customer_name', 'id');

        if ($request->isMethod('post')){ 
         
          $customer_name = $request->input('customer_name');
          $customer_email = $request->input('customer_email');
          $customer_address = $request->input('customer_address');
          $product_name = $request->input('product_name');
          $product_code = $request->input('product_code');
          $product_color = $request->input('product_color');
          $product_model = $request->input('product_model');
          $product_brand = $request->input('product_brand');
          $product_type = $request->input('product_type');
          $product_discription = $request->input('product_discription');
          $product_hsn = $request->input('product_hsn');
          $product_gst = $request->input('product_gst');
          $product_sgst = $request->input('product_sgst');
          $product_cgst = $request->input('product_cgst');  
          $product_igst = $request->input('product_igst');
          $product_quantity = $request->input('product_quantity'); 
          $product_unit = $request->input('product_unit');
          $product_salling_price = $request->input('product_salling_price');   
          $product_price_withoutgst = $request->input('product_price_withoutgst');
          $product_price_withgst = $request->input('product_price_withgst');   

          for($i=0; $i < count($product_name); $i++){
                            $updateSaleDetail = Sale::where('id', '=', $request->id);;
                           

                            $saveSale['customer_name']= $customer_name;
                            $saveSale['customer_contact_number']= $request->customer_contact_number;
                            $saveSale['customer_email']= $request->customer_email;
                            // $saveSale['customer_alt_number']= $request->customer_alt_number;
                            $saveSale['customer_address']= $customer_address[$i];
                            $saveSale['product_name']= $product_name[$i];
                            $saveSale['payment_type']=  $request->payment_type;
                            $saveSale['product_code']= $product_code[$i];
                            $saveSale['product_color']= $product_color[$i];
                            $saveSale['product_model']= $product_model[$i];
                            $saveSale['product_brand']= $product_brand[$i];
                            $saveSale['product_type']= $product_type[$i];
                            $saveSale['product_discription']= $product_discription[$i];  
                            $saveSale['sale_discription']=  $request->sale_discription;                            
                            $saveSale['product_hsn']= $product_hsn[$i];
                            $saveSale['product_gst']= $product_gst[$i];
                            $saveSale['product_sgst']= $product_sgst[$i];
                            $saveSale['product_cgst']= $product_cgst[$i];
                            $saveSale['product_igst']= $product_igst[$i];
                            $saveSale['product_quantity']=$request->product_quantity[$i];
                            $saveSale['product_unit']= $product_unit[$i];
                            $saveSale['product_total_amount']=  $request->product_total_amount[$i];
                            $saveSale['product_price_withoutgst']=$request->product_price_withoutgst[$i];
                            $saveSale['product_price_withgst']= $request->product_price_withoutgst[$i]+ ($request->product_price_withoutgst[$i]* $request->product_gst[$i])/100;

                           
                            // Sale::where([['id', '=',$customer_id[$i]]])->update($saleManame);
 
                            if(!$updateSaleDetail->update($saveSale))
                            {
                              $request->session()->flash('message.level', 'Error');
                  $request->session()->flash('message.content', 'Somthing Went Wrong!');
                            }
                        }
            $request->session()->flash('message.level', 'success');
              $request->session()->flash('message.content', ' Updated Successfully!');
    }
     return redirect('/GST/sales/add/'.$request->id);
    } 

    public function view(Request $request)
    {
      $getFormAutoFillup = array();
      if($request->isMethod('post'))
      {
        $viewData['pageTitle'] = 'Sale Details';       
        $sale= DB::table('sales'); 
        $sale->leftJoin('sale_invoices','sale_invoices.id','=','sales.sale_invoice_id');
        $sale->leftJoin('products','products.id','=','sales.product_name');
        $sale->where('sales.deleted_at','=',null);
        if($request->has('id') && $request->id !=''){
          $getFormAutoFillup['id']=$request->id;
          $sale->where('sale_invoices.id', '=', $request->id);
        }
        if($request->has('customer_name') && $request->customer_name !=''){
          $getFormAutoFillup['customer_name']=$request->customer_name;
          $sale->where('sale.customer_name', 'like', '%'.$request->customer_name.'%');
        }
        if($request->has('created_at_from') && $request->created_at_from !=''){
          $getFormAutoFillup['created_at_from']=$request->created_at_from;
          $sale->whereDate('sale.created_at', '<=', $request->created_at_from);
        }
        if($request->has('created_at_to') && $request->created_at_to !=''){
          $getFormAutoFillup['created_at_to']=$request->created_at_to;
          $sale->whereDate('sale.created_at', '>=', $request->created_at_to);
        }
        $sale->select('sale_invoices.id as saleInvoiceId','sales.*','sales.id as productId','products.product_name as ProductName');
        $sale->orderBy('sales.id','desc');
            $sale= $sale->get();
        $viewData['sale']=json_decode(json_encode($sale), true);

          return view('GST.sales.search', $viewData)->with($getFormAutoFillup);;

      }else
      {
        $viewData['pageTitle'] = 'Sale Details';        
        $sale= DB::table('sales');
        $sale->leftJoin('sale_invoices','sale_invoices.id','=','sales.sale_invoice_id');
        $sale->leftJoin('products','products.id','=','sales.product_name');
        $sale->where('sales.deleted_at','=',null);
        $sale->select('sale_invoices.id as saleInvoiceId','sales.*','sales.id as productId','products.product_name as ProductName');
        $sale->where('sales.deleted_at','=',null);
        $sale->orderBy('sales.id','desc');
        $sale= $sale->get();
        $viewData['sale']=json_decode(json_encode($sale), true);
        return view('GST.sales.search', $viewData);
      }
      
    }
    public function viewSaleInvoice(Request $request)
    {
      $getFormAutoFillup = array();
      if($request->isMethod('post'))
      {
        $viewData['pageTitle'] = 'Sale  invoice Details';       
        $sale= DB::table('sale_invoices'); 
        // $sale->leftJoin('sale_invoices','sale_invoices.id','=','sales.sale_invoice_id');
        // $sale->leftJoin('products','products.id','=','sales.product_name');
        $sale->where('sale_invoices.deleted_at','=',null);
        if($request->has('id') && $request->id !=''){
          $getFormAutoFillup['id']=$request->id;
          $sale->where('sale_invoices.id', '=', $request->id);
        }
        if($request->has('customer_name') && $request->customer_name !=''){
          $getFormAutoFillup['customer_name']=$request->customer_name;
          $sale->where('sale_invoices.customer_name', 'like', '%'.$request->customer_name.'%');
        }
        if($request->has('created_at_from') && $request->created_at_from !=''){
          $getFormAutoFillup['created_at_from']=$request->created_at_from;
          $sale->whereDate('sale_invoices.created_at', '<=', $request->created_at_from);
        }
        if($request->has('created_at_to') && $request->created_at_to !=''){
          $getFormAutoFillup['created_at_to']=$request->created_at_to;
          $sale->whereDate('sale_invoices.created_at', '>=', $request->created_at_to);
        }
        $sale->select('sale_invoices.id as saleInvoiceId','sale_invoices.*');
        $sale->orderBy('sale_invoices.id','desc');
            $sale= $sale->get();
        $viewData['sale']=json_decode(json_encode($sale), true);

          return view('GST.sales.saleInvoie', $viewData)->with($getFormAutoFillup);;

      }else
      {
        $viewData['pageTitle'] = 'Sale invoice Details';        
        $sale= DB::table('sale_invoices');
        // $sale->leftJoin('sale_invoices','sale_invoices.id','=','sales.sale_invoice_id');
        // $sale->leftJoin('products','products.id','=','sale_invoices.product_name');
        $sale->where('sale_invoices.deleted_at','=',null);
        $sale->select('sale_invoices.id as saleInvoiceId','sale_invoices.*');
        $sale->where('sale_invoices.deleted_at','=',null);
        $sale->orderBy('sale_invoices.id','desc');
        $sale= $sale->get();
        $viewData['sale']=json_decode(json_encode($sale), true);
        return view('GST.sales.saleInvoie', $viewData);
      }
      
    }

     public function trash(Request $request,$id)
    {
             if(($id!=null) && (Sale::where('id',$id)->delete())){
          // echo $id;
// exit;
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Sale was Trashed!');
            $viewData['pageTitle'] = 'sale';        
      $viewData['sale'] = Sale::get();
      return view('GST.sales.search', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
      $viewData['pageTitle'] = 'sale';        
      $viewData['sale'] = Sale::get();
      return view('GST.sales.search', $viewData);
       }
    
    }

    public function trashedList()
    {

         $TrashedSale = Sale::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.sale.delete', compact('TrashedSale', 'TrashedSale'));
      
    }
    public function permanemetDelete(Request $request,$id)
    {
      if(($id!=null) && (Sale::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Sale was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }

       $TrashedSale = Sale::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(50);
         return view('GST.sale.delete', compact('TrashedSale', 'TrashedSale'));
    } 
    public function saleReturn()
    {

        $sale= DB::table('return_product_logs'); 
        $sale->join('sales','sales.id','=','return_product_logs.sale_id');
        // $sale->leftJoin('sale_invoices','sale_invoices.id','=','return_product_logs.sale_invoice_id');
        $sale->where('return_product_logs.deleted_at','=',null);
        $sale->select('return_product_logs.*','sales.customer_name','sales.customer_contact_number','sales.customer_email');
        $sale->orderBy('return_product_logs.id','desc');
        $sale= $sale->get();
        $sale=json_decode(json_encode($sale),true);
        $viewData['ReturnSale'] = $sale;
      return view('GST.sales.saleReturnLog', $viewData);
    }
    public function saleInvoiceView($invoiceId)
    {
        $saleInvoice= DB::table('sale_invoices');
        $saleInvoice->join('customers','customers.id','=','sale_invoices.customer_id');
        $saleInvoice->where('sale_invoices.id','=',$invoiceId);
        $saleInvoice->where('sale_invoices.deleted_at','=',null);
        $saleInvoice->select('sale_invoices.*','customers.*');
        $saleInvoice=$saleInvoice->get();
        $array = json_decode(json_encode($saleInvoice), true);
        $saleInvoice=$array[0];
       

        $purchaseProduct= DB::table('sales');
        $purchaseProduct->where('sales.sale_invoice_id','=',$invoiceId);
        $purchaseProduct->join('products','products.id','=','sales.product_name');
        $purchaseProduct->where('sales.deleted_at','=',null);
        $purchaseProduct->select('sales.*','products.product_name as productName','sales.product_name as productId');
        $purchaseProduct=$purchaseProduct->get();


        $viewData['saleInvoice']=$saleInvoice;
        $viewData['purchaseProduct']=$purchaseProduct;
     return view('GST.sales.saleInvoiceView',$viewData);
    }
}