<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductUnit;
use DB;
use Auth;

class ProductUnitController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Product Unit Details'; 
       
        $getFormAutoFillup=array();
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = ProductUnit::whereId($id)->first()->toArray();
    	}
    	else 
    	{
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValue=$request->all();
                $allInputValueManage = new ProductUnit($allInputValue);
                $allInputValueManage['created_by']=Auth::user()->id;
                if($allInputValueManage->save()){
                    $request->session()->flash('message.level', 'success');
                    $request->session()->flash('message.content', 'Product Unit Details Saved Successfully!');
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
         $viewData['ProductUnit'] = ProductUnit::orderBy('id','desc')->get();   	
		return view('GST.ProductUnit', $viewData)->with($getFormAutoFillup);
    }

    public function update(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Product Unit Details'; 
        // $viewData['ProductUnit'] = ProductUnit::orderBy('id','desc')->get();

        $getFormAutoFillup=array();
       
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValueForUpdate=request()->except(['_token']);
                $allInputValueForUpdate['created_by']=Auth::user()->id;

                if(ProductUnit::where([['id', '=', $request->id]])->update($allInputValueForUpdate)){
                    $request->session()->flash('message.level', 'info');
                    $request->session()->flash('message.content', 'Product Unit Detailss Updated Successfully!');
                    $request->session()->flash('message.icon', 'check');
                } 
                else
                {
                     $request->session()->flash('message.level', 'danger');
                     $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                }
              
            }
            
             $viewData['ProductUnit'] = ProductUnit::orderBy('id','desc')->get();  
        return view('GST.ProductUnit', $viewData)->with($getFormAutoFillup);
    }


     public function view(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		// echo $request->created_at_from;echo "<br/>";
    		// echo $request->created_at_to;
    		// exit;
    		//DB::enableQueryLog();
    		$viewData['pageTitle'] = 'Product Unit Details';       	
			$ProductUnit= DB::table('ProductUnits');
			if($request->has('id') && $request->id !=''){
				$ProductUnit->where('id', '=', $request->id);
			}
			if($request->has('ProductUnit_name') && $request->ProductUnit_name !=''){
				$ProductUnit->where('ProductUnit_name', 'like', '%'.$request->ProductUnit_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$created_at_from = date("Y-m-d", strtotime($request->created_at_from) );
				$ProductUnit->whereDate('created_at', '<=', $created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$created_at_to = date("Y-m-d", strtotime($request->created_at_to) );
				$ProductUnit->whereDate('created_at', '>=', $created_at_to);
			}
			if($request->has('ProductUnit_contact_number') && $request->ProductUnit_contact_number !=''){
				$ProductUnit->where('ProductUnit_contact_number', '=', $request->ProductUnit_contact_number);
			}
			if($request->has('ProductUnit_email') && $request->ProductUnit_email !=''){
				$ProductUnit->where('ProductUnit_email', '=', $request->ProductUnit_email);
			}
			$ProductUnit->orderBy('id','desc');
       		$ProductUnit= $ProductUnit->get();
//        		$queries = DB::getQueryLog();
// print_r($queries);
// exit;
			$viewData['ProductUnit']=json_decode(json_encode($ProductUnit), true);
		    return view('GST.ProductUnit', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'ProductUnit';       	
			$viewData['ProductUnit'] = ProductUnit::orderBy('id','desc')->get();
		    return view('GST.ProductUnit', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (ProductUnit::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'ProductUnit was Trashed!');
            $viewData['pageTitle'] = 'ProductUnit';       	
			$viewData['ProductUnit'] = ProductUnit::get();
			return view('GST.ProductUnit', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'ProductUnit';       	
			$viewData['ProductUnit'] = ProductUnit::get();;
			return view('GST.ProductUnit', $viewData);
       }
    
    }
    public function trashedList()
    {
         $TrashedParty = ProductUnit::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.ProductUnit.delete', compact('TrashedParty', 'TrashedParty')); 
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (ProductUnit::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Product Unit Details was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }
    	 $TrashedParty = ProductUnit::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.ProductUnit', compact('TrashedParty', 'TrashedParty'));
    }
}
