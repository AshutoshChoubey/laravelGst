<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductColor;
use DB;
use Auth;


class ProductColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Product Color Details'; 
       
       
        $getFormAutoFillup=array();
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = ProductColor::whereId($id)->first()->toArray();
    	}
    	else 
    	{
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValue=$request->all();
                $allInputValueManage = new ProductColor($allInputValue);
                $allInputValueManage['created_by']=Auth::user()->id;
                if($allInputValueManage->save()){
                    $request->session()->flash('message.level', 'success');
                    $request->session()->flash('message.content', 'Product Color Details Saved Successfully!');
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
         $viewData['productColor'] = ProductColor::orderBy('id','desc')->get();   	
		return view('GST.productColor', $viewData)->with($getFormAutoFillup);
    }

    public function update(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Product Color Details'; 
        // $viewData['productColor'] = ProductColor::orderBy('id','desc')->get();

        $getFormAutoFillup=array();
       
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValueForUpdate=request()->except(['_token']);
                $allInputValueForUpdate['created_by']=Auth::user()->id;

                if(ProductColor::where([['id', '=', $request->id]])->update($allInputValueForUpdate)){
                    $request->session()->flash('message.level', 'info');
                    $request->session()->flash('message.content', 'Product Color Detailss Updated Successfully!');
                    $request->session()->flash('message.icon', 'check');
                } 
                else
                {
                     $request->session()->flash('message.level', 'danger');
                     $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                }
              
            }
            
             $viewData['productColor'] = ProductColor::orderBy('id','desc')->get();  
        return view('GST.productColor', $viewData)->with($getFormAutoFillup);
    }


     public function view(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		// echo $request->created_at_from;echo "<br/>";
    		// echo $request->created_at_to;
    		// exit;
    		//DB::enableQueryLog();
    		$viewData['pageTitle'] = 'Product Color ';       	
			$productColor= DB::table('productColors');
			if($request->has('id') && $request->id !=''){
				$productColor->where('id', '=', $request->id);
			}
			if($request->has('productColor_name') && $request->productColor_name !=''){
				$productColor->where('productColor_name', 'like', '%'.$request->productColor_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$created_at_from = date("Y-m-d", strtotime($request->created_at_from) );
				$productColor->whereDate('created_at', '<=', $created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$created_at_to = date("Y-m-d", strtotime($request->created_at_to) );
				$productColor->whereDate('created_at', '>=', $created_at_to);
			}
			if($request->has('productColor_contact_number') && $request->productColor_contact_number !=''){
				$productColor->where('productColor_contact_number', '=', $request->productColor_contact_number);
			}
			if($request->has('productColor_email') && $request->productColor_email !=''){
				$productColor->where('productColor_email', '=', $request->productColor_email);
			}
			$productColor->orderBy('id','desc');
       		$productColor= $productColor->get();
//        		$queries = DB::getQueryLog();
// print_r($queries);
// exit;
			$viewData['productColor']=json_decode(json_encode($productColor), true);
		    return view('GST.productColor', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'Product Color ';       	
			$viewData['productColor'] = ProductColor::orderBy('id','desc')->get();
		    return view('GST.productColor', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (ProductColor::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Product Color  was Trashed!');
            $viewData['pageTitle'] = 'productColor';       	
			$viewData['productColor'] = ProductColor::get();
			return view('GST.productColor', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'productColor';       	
			$viewData['productColor'] = ProductColor::get();;
			return view('GST.productColor', $viewData);
       }
    
    }
    public function trashedList()
    {
         $TrashedParty = ProductColor::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.productColor.delete', compact('TrashedParty', 'TrashedParty')); 
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (ProductColor::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Product Color  was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }
    	 $TrashedParty = ProductColor::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.productColor', compact('TrashedParty', 'TrashedParty'));
    }
}
