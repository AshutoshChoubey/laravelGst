<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductBrand;
use DB;
use Auth;

class ProductBrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
    $viewData['pageTitle'] = 'Product Brand Detail'; 
     $viewData['brandList'] = ProductBrand::where('status', '1')->pluck('brand_name', 'id')->toArray();
       
        $getFormAutoFillup=array();
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = ProductBrand::whereId($id)->first()->toArray();
    	}
    	else 
    	{
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValue=$request->all();
                $allInputValueManage = new ProductBrand($allInputValue);
                $allInputValueManage['created_by']=Auth::user()->id;
                if($allInputValueManage->save()){
                    $request->session()->flash('message.level', 'success');
                    $request->session()->flash('message.content', 'Product Brand Detail Saved Successfully!');
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
         $viewData['productBrand'] = ProductBrand::orderBy('id','desc')->get();   	
		return view('GST.productBrand', $viewData)->with($getFormAutoFillup);
    }

    public function update(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Product Brand Detail'; 
          $viewData['brandList'] = ProductBrand::where('status', '1')->pluck('brand_name', 'id')->toArray();
        // $viewData['productBrand'] = ProductBrand::orderBy('id','desc')->get();

        $getFormAutoFillup=array();
       
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValueForUpdate=request()->except(['_token']);
                $allInputValueForUpdate['created_by']=Auth::user()->id;

                if(ProductBrand::where([['id', '=', $request->id]])->update($allInputValueForUpdate)){
                    $request->session()->flash('message.level', 'info');
                    $request->session()->flash('message.content', 'Product Brand Details Updated Successfully!');
                    $request->session()->flash('message.icon', 'check');
                } 
                else
                {
                     $request->session()->flash('message.level', 'danger');
                     $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                }
              
            }
            
             $viewData['productBrand'] = ProductBrand::orderBy('id','desc')->get();  
        return view('GST.productBrand', $viewData)->with($getFormAutoFillup);
    }


     public function view(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		// echo $request->created_at_from;echo "<br/>";
    		// echo $request->created_at_to;
    		// exit;
    		//DB::enableQueryLog();
    		$viewData['pageTitle'] = 'productBrand';       	
			$productBrand= DB::table('productBrands');
			if($request->has('id') && $request->id !=''){
				$productBrand->where('id', '=', $request->id);
			}
			if($request->has('productBrand_name') && $request->productBrand_name !=''){
				$productBrand->where('productBrand_name', 'like', '%'.$request->productBrand_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$created_at_from = date("Y-m-d", strtotime($request->created_at_from) );
				$productBrand->whereDate('created_at', '<=', $created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$created_at_to = date("Y-m-d", strtotime($request->created_at_to) );
				$productBrand->whereDate('created_at', '>=', $created_at_to);
			}
			if($request->has('productBrand_contact_number') && $request->productBrand_contact_number !=''){
				$productBrand->where('productBrand_contact_number', '=', $request->productBrand_contact_number);
			}
			if($request->has('productBrand_email') && $request->productBrand_email !=''){
				$productBrand->where('productBrand_email', '=', $request->productBrand_email);
			}
			$productBrand->orderBy('id','desc');
       		$productBrand= $productBrand->get();
//        		$queries = DB::getQueryLog();
// print_r($queries);
// exit;
			$viewData['productBrand']=json_decode(json_encode($productBrand), true);
		    return view('GST.productBrand', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'productBrand';       	
			$viewData['productBrand'] = ProductBrand::orderBy('id','desc')->get();
		    return view('GST.productBrand', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (ProductBrand::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Product Brand was Trashed!');
            $viewData['pageTitle'] = 'Product Brand';       	
			$viewData['productBrand'] = ProductBrand::get();
			return view('GST.productBrand', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Product Brand';       	
			$viewData['productBrand'] = ProductBrand::get();;
			return view('GST.productBrand', $viewData);
       }
    
    }
    public function trashedList()
    {
         $TrashedParty = ProductBrand::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.productBrand.delete', compact('TrashedParty', 'TrashedParty')); 
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (ProductBrand::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Product Brand was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }
    	 $TrashedParty = ProductBrand::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.productBrand', compact('TrashedParty', 'TrashedParty'));
    }
}
