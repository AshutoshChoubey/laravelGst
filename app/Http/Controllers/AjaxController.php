<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Product;
use App\Supplier;
use DB;
use App\ProductBrand;
use App\ProductModel;
use App\ProductType;
use App\ProductUnit;
use App\Customer;
use App\Sale;
use App\SaleInvoice;
use App\ReturnProductLog;
use Auth;
use App\PurchaseInvoice;
use App\Purchase;
use App\ReturnPurchaseLog;

class AjaxController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function getSupplierDetailById(Request $request)
    {
            $supplier= Supplier::whereId($request->supplierId)->first()->toArray();
            return json_encode($supplier);
    }
    public function getCustomerDetailById(Request $request)
    {
        
        $customer= Customer::whereId($request->customerId)->first()->toArray();
        return json_encode($customer);
    }

   
    public function getProductModel(Request $request)
    {
        $brandId=$request->brand;
        $allProductModelList= ProductModel::where('brand_id',$brandId)->get();
         return json_encode($allProductModelList);
    }
    public function getBrandByProductType(Request $request)
    {
        $product_type=$request->product_type;
        $productTypeSelect = DB::table('products')->leftJoin('product_brands','product_brands.id','=','products.product_brand')->select('product_brands.id','product_brands.brand_name')->where('products.product_type','=',$product_type)
            ->where('products.deleted_at','=',null)
            ->where('product_brands.id','!=',null)
            ->where('products.status','=',1)
            ->distinct()->get();
         return json_encode($productTypeSelect);
    }
    public function getModelByBrand(Request $request)
    {
        $product_type=$request->product_type;
        $product_brand=$request->product_brand;
        $productTypeSelect = DB::table('products')->leftJoin('product_models','product_models.id','=','products.product_model')->select('product_models.id','product_models.model_name')->where('products.product_type','=',$product_type)->where('products.product_brand','=',$product_brand)
            ->where('products.deleted_at','=',null)
            ->where('product_models.id','!=',null)
            ->where('products.status','=',1)
            ->distinct()->get();
         return json_encode($productTypeSelect); 
    }
    public function getColorByBrandModelType(Request $request)
    {
        $product_type=$request->product_type;
        $product_brand=$request->product_brand;
        $product_model=$request->product_model;
        $productTypeSelect = DB::table('products')->leftJoin('product_colors','product_colors.id','=','products.product_color')->select('product_colors.id','product_colors.color_name')->where('products.product_type','=',$product_type)
            ->where('products.product_brand','=',$product_brand)
            ->where('products.product_model','=',$product_model)
            ->where('products.deleted_at','=',null)
            ->where('product_colors.id','!=',null)
            ->where('products.status','=',1)
            ->distinct()->get();
         return json_encode($productTypeSelect); 
    }
     public function getNameByBrandModelTypeColor(Request $request)
    {
        $product_type=$request->product_type;
        $product_brand=$request->product_brand;
        $product_model=$request->product_model;
        $product_color=$request->product_color;
        $productName = DB::table('products')->select('products.id','products.product_name')->where('products.product_type','=',$product_type)
            ->where('products.product_brand','=',$product_brand)
            ->where('products.product_model','=',$product_model)
            ->where('products.product_color','=',$product_color)
            ->where('products.deleted_at','=',null)
            ->where('products.product_name','!=',null)
            ->where('products.status','=',1)
            ->distinct()->get();
         return json_encode($productName); 
    }
    public function getProduct(Request $request)
    {
         $productId=$request->product_id;
         $productDiscription = DB::table('products')->where('products.id','=',$productId) 
            ->where('products.deleted_at','=',null)
            ->where('products.status','=',1)
            ->distinct()->get();
         return json_encode($productDiscription); 
    }
    public function saleReturn(Request $request)
    {
        $discriptionForModel=$request->discriptionForModel;
        $saleIdForModel=$request->saleIdForModel;
        $quantityForModel=$request->quantityForModel;
        $SaleDetail=Sale::where('id','=',$request->saleIdForModel)->first()->toArray();
        // print_r($SaleDetail);
        // exit;
        $sale_invoice_id=$SaleDetail['sale_invoice_id'];
        $product_quantity=$SaleDetail['product_quantity'];
        $product_id=$SaleDetail['product_name'];
        $product_total_amount=$SaleDetail['product_total_amount'];
        $SaleInvoiceDetail=SaleInvoice::where('id','=',$sale_invoice_id)->first()->toArray();
        $total_sale_amount=$SaleInvoiceDetail['total_sale_amount'];

        if($product_quantity>=$request->quantityForModel)
        {
            $saleManage['product_quantity']=$product_quantity-$request->quantityForModel;
             // $saleManage['product_quantity']=$product_quantity-$request->quantityForModel;
            $saleManage['product_total_amount']=$product_total_amount-($product_total_amount/$product_quantity)*$request->quantityForModel;
            $saleManage['is_returned']=1;
            Sale::where([['id', '=',$request->saleIdForModel]])->update($saleManage);
            SaleInvoice::where([['id', '=',$sale_invoice_id]])->update(['total_sale_amount'=>$total_sale_amount-$saleManage['product_total_amount']]);

            $getProductDetail=Product::whereId($product_id)->first()->toArray();
            $stock_out= $getProductDetail['stock_out'];
            $stock_available  = $getProductDetail['available_stock']; 
            $productName  = $getProductDetail['product_name']; 

            $productManage['stock_out']=$stock_out-$quantityForModel;
            $productManage['available_stock']=$stock_available+$request->quantity;
            Product::where([['id', '=',$product_id]])->update($productManage);
            $ReturnProductLog = new ReturnProductLog();
            $ReturnProductLog->user_id =Auth::user()->id;
            $ReturnProductLog->comments =$discriptionForModel;
            $ReturnProductLog->product_id =$product_id;
            $ReturnProductLog->sale_id = $saleIdForModel ;
            $ReturnProductLog->sale_invoice_id =$sale_invoice_id;
            $ReturnProductLog->product_name =$productName;
            $ReturnProductLog->quantity =$quantityForModel;
            if($ReturnProductLog->save())
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;  
        }  
    }
    public function purchaseReturn(Request $request)
    {
        $discriptionForModel=$request->discriptionForModel;
        $purchaseIdForModel=$request->purchaseIdForModel;
        $quantityForModel=$request->quantityForModel;
        $Purchase=Purchase::where('id','=',$request->purchaseIdForModel)->first()->toArray();
        // print_r($SaleDetail);
        // exit;
        $purchase_invoice_id=$Purchase['purchase_invoice_id'];
        $product_quantity=$Purchase['product_quantity'];
        $product_id=$Purchase['product_name'];
        $product_total_amount=$Purchase['product_total_amount'];
        $PurchaseInvoice=PurchaseInvoice::where('id','=',$purchase_invoice_id)->first()->toArray();
        $total_purchase_amount=$PurchaseInvoice['total_purchase_amount'];

        if($product_quantity>=$request->quantityForModel)
        {
            $Manage['product_quantity']=$product_quantity-$request->quantityForModel;
             // $saleManage['product_quantity']=$product_quantity-$request->quantityForModel;
            $Manage['product_total_amount']=$product_total_amount-($product_total_amount/$product_quantity)*$request->quantityForModel;
            $Manage['is_returned']=1;
            Purchase::where([['id', '=',$request->purchaseIdForModel]])->update($Manage);
            PurchaseInvoice::where([['id', '=',$purchase_invoice_id]])->update(['total_purchase_amount'=>$total_purchase_amount-$Manage['product_total_amount']]);

            $getProductDetail=Product::whereId($product_id)->first()->toArray();
            $stock_in= $getProductDetail['stock_in'];
            $stock_available  = $getProductDetail['available_stock']; 
            $productName  = $getProductDetail['product_name']; 

            $productManage['stock_in']=$stock_in-$quantityForModel;
            $productManage['available_stock']=$stock_available+$request->quantity;
            Product::where([['id', '=',$product_id]])->update($productManage);
            $ReturnProductLog = new ReturnPurchaseLog();
            $ReturnProductLog->user_id =Auth::user()->id;
            $ReturnProductLog->comments =$discriptionForModel;
            $ReturnProductLog->product_id =$product_id;
            $ReturnProductLog->purchase_id = $purchaseIdForModel ;
            $ReturnProductLog->purchase_invoice_id =$purchase_invoice_id;
            $ReturnProductLog->product_name =$productName;
            $ReturnProductLog->quantity =$quantityForModel;
            if($ReturnProductLog->save())
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;  
        }  
    }

    
    // public function getServiceTypeForWorkshopThroughModel(Request $request)
    // {
    //      $model_number=$request->model_number;
    //      $brand=$request->brand;
    //      $SericeTypeName=DB::table('services')->join("service_types","service_types.id","=","services.service_type")
    //      ->where('brand_name','=',$brand)
    //      ->where('model_name','=',$model_number)
    //      ->select('service_types.id','service_types.service_type_name')
    //      ->distinct()
    //      ->get();
    //      return json_encode($SericeTypeName);
    // }
    // public function getProductThroughModelAndProductBrand(Request $request)
    // {
    //     $model_number=$request->model_number;
    //     $brand=$request->brand;
    //     $Product=DB::table('products')
    //      ->where('company_name','=',$brand)
    //      ->where('model_number','=',$model_number)
    //      ->distinct()
    //      ->get();
    //      return json_encode($Product);
        
    // }

}
