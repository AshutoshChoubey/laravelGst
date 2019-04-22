<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use DB;
use Auth;


class ProductTypeController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Product Type Details'; 
       
        $getFormAutoFillup=array();
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = ProductType::whereId($id)->first()->toArray();
    	}
    	else 
    	{
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValue=$request->all();
                $allInputValueManage = new ProductType($allInputValue);
                $allInputValueManage['created_by']=Auth::user()->id;
                if($allInputValueManage->save()){
                    $request->session()->flash('message.level', 'success');
                    $request->session()->flash('message.content', 'ProductType Detail Saved Successfully!');
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
         $viewData['productType'] = ProductType::orderBy('id','desc')->get();   	
		return view('GST.productType', $viewData)->with($getFormAutoFillup);
    }

    public function update(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Product Type Details'; 
        // $viewData['productType'] = ProductType::orderBy('id','desc')->get();

        $getFormAutoFillup=array();
       
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValueForUpdate=request()->except(['_token']);
                $allInputValueForUpdate['created_by']=Auth::user()->id;

                if(ProductType::where([['id', '=', $request->id]])->update($allInputValueForUpdate)){
                    $request->session()->flash('message.level', 'info');
                    $request->session()->flash('message.content', 'Product Type Details Updated Successfully!');
                    $request->session()->flash('message.icon', 'check');
                } 
                else
                {
                     $request->session()->flash('message.level', 'danger');
                     $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                }
              
            }
            
             $viewData['productType'] = ProductType::orderBy('id','desc')->get();  
        return view('GST.productType', $viewData)->with($getFormAutoFillup);
    }


     public function view(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		// echo $request->created_at_from;echo "<br/>";
    		// echo $request->created_at_to;
    		// exit;
    		//DB::enableQueryLog();
    		$viewData['pageTitle'] = 'Product Type Details';       	
			$productType= DB::table('productTypes');
			if($request->has('id') && $request->id !=''){
				$productType->where('id', '=', $request->id);
			}
			if($request->has('productType_name') && $request->productType_name !=''){
				$productType->where('productType_name', 'like', '%'.$request->productType_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$created_at_from = date("Y-m-d", strtotime($request->created_at_from) );
				$productType->whereDate('created_at', '<=', $created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$created_at_to = date("Y-m-d", strtotime($request->created_at_to) );
				$productType->whereDate('created_at', '>=', $created_at_to);
			}
			if($request->has('productType_contact_number') && $request->productType_contact_number !=''){
				$productType->where('productType_contact_number', '=', $request->productType_contact_number);
			}
			if($request->has('productType_email') && $request->productType_email !=''){
				$productType->where('productType_email', '=', $request->productType_email);
			}
			$productType->orderBy('id','desc');
       		$productType= $productType->get();
//        		$queries = DB::getQueryLog();
// print_r($queries);
// exit;
			$viewData['productType']=json_decode(json_encode($productType), true);
		    return view('GST.productType', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'Product Type Details';       	
			$viewData['productType'] = ProductType::orderBy('id','desc')->get();
		    return view('GST.productType', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (ProductType::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'productType was Trashed!');
            $viewData['pageTitle'] = 'Product Type Details';       	
			$viewData['productType'] = ProductType::get();
			return view('GST.productType', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Product Type Details';       	
			$viewData['productType'] = ProductType::get();;
			return view('GST.productType', $viewData);
       }
    
    }
    public function trashedList()
    {
         $TrashedParty = ProductType::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.productType.delete', compact('TrashedParty', 'TrashedParty')); 
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (ProductType::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Product Type Details was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }
    	 $TrashedParty = ProductType::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.productType', compact('TrashedParty', 'TrashedParty'));
    }
}
