<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use Auth;
use App\ProductColor;
use App\ProductModel;
use App\ProductBrand;
use App\ProductType;
use App\ProductUnit;
use Helper; 
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Product Details';   

        $getFormAutoFillup=array();
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = Product::whereId($id)->first()->toArray();
    	}
    	else 
    	{
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValue=$request->all();
                $getFormAutoFillup=$request->all();
                $allInputValueManage = new Product($allInputValue);
                $allInputValueManage['user_id']=Auth::user()->id;
                $allInputValueManage['created_by']=Auth::user()->id;
                if($allInputValueManage->save()){
                    $request->session()->flash('message.level', 'success');
                    $request->session()->flash('message.content', 'Product Detail Saved Successfully!');
                    $request->session()->flash('message.icon', 'check');
                     return 1;
                } 
                else
                {
                    $request->session()->flash('message.level', 'danger');
                    $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                     return 0;
                }              
            }    		
    	}
    	$viewData['basicFormField'] = $this->formComponent();
        $viewData['formButton'] = isset($id) ? 'Update Details' : 'Save Details';
        $viewData['supplier'] = Product::orderBy('id','desc')->get();   	
		return view('GST.product.product', $viewData)->with($getFormAutoFillup);
       
    }

    public function update(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Product Detail'; 
        $getFormAutoFillup=array();       
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $getFormAutoFillup=$request->all();
                $allInputValueForUpdate=request()->except(['_token']);
                $allInputValueForUpdate['user_id']=Auth::user()->id;

                if(Product::where([['id', '=', $request->id]])->update($allInputValueForUpdate)){
                    $request->session()->flash('message.level', 'info');
                    $request->session()->flash('message.content', 'Product Dretails Updated Successfully!');
                    $request->session()->flash('message.icon', 'check');
                      return 1;
                } 
                else
                {
                     $request->session()->flash('message.level', 'danger');
                     $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                      return 0;
                }
              
            }
            $viewData['basicFormField'] = $this->formComponent();
            $viewData['formButton'] = isset($id) ? 'Update Details' : 'Save Details';
            $viewData['supplier'] = Product::orderBy('id','desc')->get();  
       return view('GST.product.product', $viewData)->with($getFormAutoFillup);
          
    }


     public function view(Request $request)
    {
          // DB::enableQueryLog();         
    	if($request->isMethod('post'))
    	{
    		$viewData['pageTitle'] = 'Product';  
           
            $Table= DB::table('products');
            $Table->leftJoin('users','users.id','=','products.user_id');
            $Table->leftJoin('product_colors','product_colors.id','=','products.user_id');
            $Table->leftJoin('product_types','product_types.id','=','products.product_type');
            $Table->leftJoin('product_models','product_models.id','=','products.product_model');
            $Table->leftJoin('product_units','product_units.id','=','products.product_unit');
            $Table->leftJoin('product_brands','product_brands.id','=','products.product_brand');
            $Table->where('products.deleted_at', '=',NULL);
			if($request->has('id') && $request->id !=''){
				$Table->where('products.id', '=', $request->id);
			}
			if($request->has('product_name') && $request->product_name !=''){
				$Table->where('products.product_name', 'like', '%'.$request->product_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
                $created_at_from = date("Y-m-d", strtotime($request->created_at_from) );
                $Table->whereDate('products.created_at', '<=', $created_at_from);
            }
            if($request->has('created_at_to') && $request->created_at_to !=''){
                $created_at_to = date("Y-m-d", strtotime($request->created_at_to) );
                $Table->whereDate('products.created_at', '>=', $created_at_to);
            }
            $Table->select('products.*','product_colors.color_name as ProductColorName','product_types.type_name as ProductTypeName','product_models.model_name as ProductModelName','product_units.unit_name as ProductUnitName','product_brands.brand_name as ProductBrandName');
			$Table->orderBy('products.id','desc');
       		$Table= $Table->get();
			$viewData['productList']=json_decode(json_encode($Table), true);
		    return view('GST.product.product_search', $viewData);
    	}else
    	{
    		$viewData['pageTitle'] = 'Product';    

		
            $viewData['productList']=$this->getAllProductDetail();
		    return view('GST.product.product_search', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (Product::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Product was Trashed!');
            $viewData['pageTitle'] = 'Product';       	
			 $viewData['productList']=$this->getAllProductDetail();
			return view('GST.product.product_search', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Product';       	
			 $viewData['productList']=$this->getAllProductDetail();
			return view('GST.product.product_search', $viewData);
       }
    
    }
    public function trashedList()
    {
         $TrashedParty = Product::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.product.product.delete', compact('TrashedParty', 'TrashedParty')); 
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (Product::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Product was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }
    	 $TrashedParty = Product::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.product.product', compact('TrashedParty', 'TrashedParty'));
    }
    public function formComponent()
    {

         $productBrand = array('' => '-- Select --');
         $productType = array('' => '-- Select --');
         $productUnit = array('' => '-- Select --');
         $productColor = array('' => '-- Select --');
         $productModel = array('' => '-- Select --');
        $productModel=   ProductModel::where('status', '1')->select('id','model_name')->pluck('model_name','id')->toArray();
        $productBrand=  ProductBrand::where('status', '1')->select('id','brand_name')->pluck('brand_name','id')->toArray();
        $productType=  ProductType::where('status', '1')->select('id','type_name')->pluck('type_name','id')->toArray();
        $productUnit=  ProductUnit::where('status', '1')->select('id','unit_name')->pluck('unit_name','id')->toArray();
        $productColor=  ProductColor::where('status', '1')->select('id','color_name')->pluck('color_name','id')->toArray();
              


      return  array(
            'separator_1' => array('type' => 'separator_start', 'label' => 'NaN'),
            'product_name'=>array('type' => 'text', 'label'=>'Product Name','mandatory'=>true),
            'product_brand'=>array('type' => 'select', 'label'=>'Product Brand','value' => $productBrand),
            'product_model'=>array('type' => 'select', 'label'=>'Product Model','value' => $productModel),
           
             
            'separator_2' => array('type' => 'separator_end', 'label' => 'NaN'),
            'separator_3' => array('type' => 'separator_start', 'label' => 'NaN'),
             'product_type'=>array('type' => 'select', 'label'=>'Product Type','value' => $productType),
           
           
            'product_unit'=>array('type' => 'select', 'label'=>'Product Unit','value' =>  $productUnit),
            'product_hsn'=>array('type' => 'text', 'label'=>'Product HSN','mandatory'=>false), 
            'separator_4' => array('type' => 'separator_end', 'label' => 'NaN'),
            'separator_5' => array('type' => 'separator_start', 'label' => 'NaN'),
            'product_color'=>array('type' => 'select', 'label'=>'Product Color','value' =>$productColor),
            
            'product_price'=>array('type' => 'number','step'=>'any', 'label'=>'Product Price With GST',  'mandatory'=>false),
            'product_igst'=>array('type' => 'number','step'=>'any', 'label'=>'Product Igst','mandatory'=>false), 
            'separator_6' => array('type' => 'separator_end', 'label' => 'NaN'),
            'separator_7' => array('type' => 'separator_start', 'label' => 'NaN'),
            'product_cgst'=>array('type' => 'number','step'=>'any', 'label'=>'Product Cgst','mandatory'=>false),
            'product_sgst'=>array('type' => 'number','step'=>'any', 'label'=>'Product Sgst',  'mandatory'=>false),
            'product_gst'=>array('type' => 'number','step'=>'any', 'label'=>'Product Gst','mandatory'=>false), 
            'separator_8' => array('type' => 'separator_end', 'label' => 'NaN'),
            'separator_9' => array('type' => 'separator_start', 'label' => 'NaN'),
            'product_price_without_gst'=>array('type' => 'number','step'=>'any', 'label'=>'Product  Price without GST','mandatory'=>false),
            'product_salling_price'=>array('type' => 'number','step'=>'any', 'label'=>'Product Selling Price(Without GST)','mandatory'=>false),
            'product_code'=>array('type' => 'text', 'label'=>'Product Code',  'mandatory'=>false),
            'product_discription'=>array('type' => 'textarea','label'=>'Product Discription','style'=>'height:55px',  'mandatory'=>false),
            'separator_10' => array('type' => 'separator_end', 'label' => 'NaN'),
        );
    }
    public function getAllProductDetail()
    {
           $Table= DB::table('products');
            $Table->leftJoin('users','users.id','=','products.user_id');
            $Table->leftJoin('product_colors','product_colors.id','=','products.product_color');
            $Table->leftJoin('product_types','product_types.id','=','products.product_type');
            $Table->leftJoin('product_models','product_models.id','=','products.product_model');
            $Table->leftJoin('product_units','product_units.id','=','products.product_unit');
            $Table->leftJoin('product_brands','product_brands.id','=','products.product_brand');
            $Table->where('products.deleted_at', '=',NULL);
             $Table->select('products.*','product_colors.color_name as ProductColorName','product_types.type_name as ProductTypeName','product_models.model_name as ProductModelName','product_units.unit_name as ProductUnitName','product_brands.brand_name as ProductBrandName');
            $Table->orderBy('products.id','desc');
            $Table= $Table->get();
           return json_decode(json_encode($Table), true);
    }
}
