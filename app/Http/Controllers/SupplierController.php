<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use Illuminate\Http\Auth;
use App\Supplier;
use DB;
use Auth;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Supplier Detail'; 
       

        $getFormAutoFillup=array();
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = Supplier::whereId($id)->first()->toArray();
    	}
    	else 
    	{
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValue=$request->all();
                $allInputValueManage = new Supplier($allInputValue);
                $allInputValueManage['user_id']=Auth::user()->id;
                if($allInputValueManage->save()){
                    $request->session()->flash('message.level', 'success');
                    $request->session()->flash('message.content', 'Supplier Detail Saved Successfully!');
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
         $viewData['supplier'] = Supplier::orderBy('id','desc')->get();   	
		return view('GST.supplier', $viewData)->with($getFormAutoFillup);
    }

    public function update(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Supplier Detail'; 
        // $viewData['supplier'] = Supplier::orderBy('id','desc')->get();

        $getFormAutoFillup=array();
       
            if(((!isset($id) && $id == null) && $request->isMethod('post') ))
            {
                $allInputValueForUpdate=request()->except(['_token']);
                $allInputValueForUpdate['user_id']=Auth::user()->id;

                if(Supplier::where([['id', '=', $request->id]])->update($allInputValueForUpdate)){
                    $request->session()->flash('message.level', 'info');
                    $request->session()->flash('message.content', 'Supplier Dretails Updated Successfully!');
                    $request->session()->flash('message.icon', 'check');
                } 
                else
                {
                     $request->session()->flash('message.level', 'danger');
                     $request->session()->flash('message.content', 'Somthing went Worng! !');
                    $request->session()->flash('message.icon', 'times');
                }
              
            }
            
             $viewData['supplier'] = Supplier::orderBy('id','desc')->get();  
        return view('GST.supplier', $viewData)->with($getFormAutoFillup);
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
			if($request->has('supplier_name') && $request->supplier_name !=''){
				$Supplier->where('supplier_name', 'like', '%'.$request->supplier_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
                $created_at_from = date("Y-m-d", strtotime($request->created_at_from) );
                $customer->whereDate('created_at', '<=', $created_at_from);
            }
            if($request->has('created_at_to') && $request->created_at_to !=''){
                $created_at_to = date("Y-m-d", strtotime($request->created_at_to) );
                $customer->whereDate('created_at', '>=', $created_at_to);
            }
			if($request->has('mob_num') && $request->mob_num !=''){
				$Supplier->where('mob_num', '=', $request->mob_num);
			}
			if($request->has('email') && $request->email !=''){
				$Supplier->where('email', '=', $request->email);
			}
			$Supplier->orderBy('id','desc');
       		$Supplier= $Supplier->get();
			$viewData['supplier']=json_decode(json_encode($Supplier), true);
		    return view('GST.supplier', $viewData);
    	}else
    	{
    		$viewData['pageTitle'] = 'Supplier';       	
			$viewData['supplier'] = Supplier::orderBy('id','desc')->get();
		    return view('GST.supplier', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (Supplier::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Supplier was Trashed!');
            $viewData['pageTitle'] = 'Supplier';       	
			$viewData['supplier'] = Supplier::get();
			return view('GST.supplier', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Supplier';       	
			$viewData['supplier'] = Supplier::get();;
			return view('GST.supplier', $viewData);
       }
    
    }
    public function trashedList()
    {
         $TrashedParty = Supplier::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.supplier.delete', compact('TrashedParty', 'TrashedParty')); 
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
         return view('GST.supplier', compact('TrashedParty', 'TrashedParty'));
    }
}
