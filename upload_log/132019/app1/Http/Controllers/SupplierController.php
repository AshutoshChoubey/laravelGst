<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use DB;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Supplier Dretail'; 
        $viewData['pageTitle'] = 'Add Purchase Detail'; 
        $viewData['option1'] = 'Add Supplier'; 
        $viewData['optionValue1'] = "SaiAutoCare/supplier/add";
        $viewData['option2'] = 'Add Product Detail'; 
        $viewData['optionValue2'] = "SaiAutoCare/product/add";
        // This if condition for fill detail for update otherwise for save and update 
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = Supplier::whereId($id)->first()->toArray();
    		return view('SaiAutoCare.supplier.add', $viewData)->with($getFormAutoFillup);
    	}
    	else if((!isset($id) && $id == null) && !$request->isMethod('post') )
    	{
    		return view('SaiAutoCare.supplier.add', $viewData);
    	}
    	else {
    		 // This if condition for fill detail for  update otherwise for  save 
	    	if ($request->isMethod('post')){
	    		$getFormAutoFillup = array();	    		
	    		if(isset($request->id) && $request->id != null)
	    		{
	    			if ($request->isMethod('post')){
			    		$supplierManame=request()->except(['_token']);
						if(Supplier::where([['id', '=', $request->id]])->update($supplierManame)){
							$request->session()->flash('message.level', 'success');
					     	$request->session()->flash('message.content', 'Supplpier updated Successfully!');
						}
				    }
				     return redirect('/SaiAutoCare/supplier/add/'.$request->id);
	    		}
	    		else
	    		{
			     	$supplierManame=$request->all();
			     	//print_r($supplierManame);
			     	///exit;
					$supplierManame = new Supplier($supplierManame);
					
					if($supplierManame->save()){
						$request->session()->flash('message.level', 'success');
				     	$request->session()->flash('message.content', 'Supplpier Saved Successfully!');
					}
					return view('SaiAutoCare.supplier.add', $viewData);
	    		}
			}
		}
    }
     public function view(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$viewData['pageTitle'] = 'Supplier';       	
			$Supplier= DB::table('suppliers');
			if($request->has('id') && $request->id !=''){
				$Supplier->where('id', '=', $request->id);
			}
			if($request->has('name') && $request->name !=''){
				$Supplier->where('supplier_name', 'like', '%'.$request->name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$Supplier->whereDate('created_at', '<=', $request->created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$Supplier->whereDate('created_at', '>=', $request->created_at_to);
			}
			if($request->has('mobile') && $request->mobile !=''){
				$Supplier->where('mobile', '=', $request->mobile);
			}
			if($request->has('email') && $request->email !=''){
				$Supplier->where('email', '=', $request->email);
			}
			$Supplier->orderBy('id','desc');
       		$Supplier= $Supplier->get();
			$viewData['supplier']=json_decode(json_encode($Supplier), true);
		    return view('SaiAutoCare.supplier.search', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'Supplier';       	
			$viewData['supplier'] = Supplier::orderBy('id','desc')->get();
		//	$Supplier= DB::table('Suppliers');
			//$Supplier->orderBy('id','desc');
       		//$Supplier= $Supplier->get();
			//$viewData['Supplier']=json_decode(json_encode($Supplier), true);
		    return view('SaiAutoCare.supplier.search', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (Supplier::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Supplier was Trashed!');
            $viewData['pageTitle'] = 'Supplier';       	
			$viewData['supplier'] = Supplier::paginate(10);
			return view('SaiAutoCare.supplier.search', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Supplier';       	
			$viewData['supplier'] = Supplier::paginate(10);
			return view('SaiAutoCare.supplier.search', $viewData);
       }
    
    }
    public function trashedList()
    {
         $TrashedParty = Supplier::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
          // $TrashedParty=$TrashedParty
         return view('SaiAutoCare.supplier.delete', compact('TrashedParty', 'TrashedParty')); 
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (Supplier::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Supplier was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }

    	 $TrashedParty = Supplier::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('SaiAutoCare.supplier.delete', compact('TrashedParty', 'TrashedParty'));
    }
}
