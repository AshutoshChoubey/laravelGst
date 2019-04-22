<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;
use DB;
use Auth;
use App\ProductBrand;

class ProductModelController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
    $viewData['pageTitle'] = 'Product Model Details'; 
     $viewData['brandList'] = ProductBrand::where('status', '1')->pluck('brand_name', 'id')->toArray();
       
        $getFormAutoFillup=array();
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = ProductModel::whereId($id)->first()->toArray();
    	}
    	else 
    	{
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValue=$request->all();
                $allInputValueManage = new ProductModel($allInputValue);
                $allInputValueManage['created_by']=Auth::user()->id;
                if($allInputValueManage->save()){
                    $request->session()->flash('message.level', 'success');
                    $request->session()->flash('message.content', 'Product Model Detail Saved Successfully!');
                    $request->session()->flash('message.icon', 'check');
                } 
                else
                {
                     $request->session()->flash('message.level', 'danger');
                     $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                }
              
            }
    		
    	} 
         $viewData['productModel'] = ProductModel::orderBy('id','desc')->get();   	
		return view('GST.productModel', $viewData)->with($getFormAutoFillup);
    }

    public function update(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Product Model Details'; 
          $viewData['brandList'] = ProductBrand::where('status', '1')->pluck('brand_name', 'id')->toArray();
        // $viewData['productModel'] = ProductModel::orderBy('id','desc')->get();

        $getFormAutoFillup=array();
       
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValueForUpdate=request()->except(['_token']);
                $allInputValueForUpdate['created_by']=Auth::user()->id;

                if(ProductModel::where([['id', '=', $request->id]])->update($allInputValueForUpdate)){
                    $request->session()->flash('message.level', 'info');
                    $request->session()->flash('message.content', 'Product Model Detailss Updated Successfully!');
                    $request->session()->flash('message.icon', 'check');
                } 
                else
                {
                     $request->session()->flash('message.level', 'danger');
                     $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                }
              
            }
            
             $viewData['productModel'] = ProductModel::orderBy('id','desc')->get();  
        return view('GST.productModel', $viewData)->with($getFormAutoFillup);
    }


     public function view(Request $request)
    {

    	if($request->isMethod('post'))
    	{
    		// echo $request->created_at_from;echo "<br/>";
    		// echo $request->created_at_to;
    		// exit;
    		//DB::enableQueryLog();
    		$viewData['pageTitle'] = 'Product Model Details';       	
			$productModel= DB::table('productModels');
			if($request->has('id') && $request->id !=''){
				$productModel->where('id', '=', $request->id);
			}
			if($request->has('productModel_name') && $request->productModel_name !=''){
				$productModel->where('productModel_name', 'like', '%'.$request->productModel_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$created_at_from = date("Y-m-d", strtotime($request->created_at_from) );
				$productModel->whereDate('created_at', '<=', $created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$created_at_to = date("Y-m-d", strtotime($request->created_at_to) );
				$productModel->whereDate('created_at', '>=', $created_at_to);
			}
			if($request->has('productModel_contact_number') && $request->productModel_contact_number !=''){
				$productModel->where('productModel_contact_number', '=', $request->productModel_contact_number);
			}
			if($request->has('productModel_email') && $request->productModel_email !=''){
				$productModel->where('productModel_email', '=', $request->productModel_email);
			}
			$productModel->orderBy('id','desc');
       		$productModel= $productModel->get();
//        		$queries = DB::getQueryLog();
// print_r($queries);
			$viewData['productModel']=json_decode(json_encode($productModel), true);
		    return view('GST.productModel', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'Product Model Details';       	
			$viewData['productModel'] = ProductModel::orderBy('id','desc')->get();
		    return view('GST.productModel', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
       $viewData['brandList'] = ProductBrand::where('status', '1')->pluck('brand_name', 'id')->toArray();

    	if(($id!=null) && (ProductModel::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'productModel was Trashed!');
            $viewData['pageTitle'] = 'productModel';       	
			$viewData['productModel'] = ProductModel::get();
			return view('GST.productModel', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Product Model ';       	
			$viewData['productModel'] = ProductModel::get();;
			return view('GST.productModel', $viewData);
       }
    
    }
    public function trashedList()
    {
    	 $viewData['brandList'] = ProductBrand::where('status', '1')->pluck('brand_name', 'id')->toArray();
         $TrashedParty = ProductModel::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.productModel.delete', compact('TrashedParty', 'TrashedParty')); 
    }
    public function permanemetDelete(Request $request,$id)
    {
    	 $viewData['brandList'] = ProductBrand::where('status', '1')->pluck('brand_name', 'id')->toArray();
    	if(($id!=null) && (ProductModel::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Product Model  was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }
    	 $TrashedParty = ProductModel::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.productModel', compact('TrashedParty', 'TrashedParty'));
    }
}
