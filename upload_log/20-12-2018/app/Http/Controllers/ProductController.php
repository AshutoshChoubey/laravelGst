<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Supplier Dretail'; 
        // This if condition for fill detail for update otherwise for save and update 
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = Product::whereId($id)->first()->toArray();
    		return view('SaiAutoCare.product.add', $viewData)->with($getFormAutoFillup);
    	}
    	else if((!isset($id) && $id == null) && !$request->isMethod('post') )
    	{
    		return view('SaiAutoCare.product.add', $viewData);
    	}
    	else {
    		 // This if condition for fill detail for  update otherwise for  save 
	    	if ($request->isMethod('post')){
	    		$getFormAutoFillup = array();	    		
	    		if(isset($request->id) && $request->id != null)
	    		{
	    			if ($request->isMethod('post')){
			    		$productManame=	 request()->except(['_token']);
						if(Product::where([['id', '=', $request->id]])->update($productManame)){
							$request->session()->flash('message.level', 'success');
					     	$request->session()->flash('message.content', 'Product updated Successfully!');
						}
				    }
				     return redirect('/SaiAutoCare/product/add/'.$request->id);
	    		}
	    		else
	    		{
			     	$productManame=$request->all();
			     	//print_r($productManame);
			     	///exit;
					$productManame = new Product($productManame);
					
					if($productManame->save()){
						$request->session()->flash('message.level', 'success');
				     	$request->session()->flash('message.content', ' Saved Successfully!');
					}
					return view('SaiAutoCare.product.add', $viewData);
	    		}
			}
		}
    }
     public function view(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$viewData['pageTitle'] = 'Supplier';       	
			$Supplier= DB::table('products');
			if($request->has('id') && $request->id !=''){
				$Supplier->where('id', '=', $request->id);
			}
			if($request->has('name') && $request->name !=''){
				$Supplier->where('product_name', 'like', '%'.$request->name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$Supplier->where('created_at', '>=', $request->created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$Supplier->where('created_at', '<', $request->created_at_to);
			}
			if($request->has('mobile') && $request->mobile !=''){
				$Supplier->where('mobile', '=', $request->mobile);
			}
			if($request->has('email') && $request->email !=''){
				$Supplier->where('email', '=', $request->email);
			}
			$Supplier->orderBy('id','desc');
       		$Supplier= $Supplier->get();
			$viewData['product']=json_decode(json_encode($Supplier), true);
		    return view('SaiAutoCare.product.search', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'Supplier';       	
			$viewData['product'] = Product::orderBy('id','desc')->get();
		//	$Supplier= DB::table('Suppliers');
			//$Supplier->orderBy('id','desc');
       		//$Supplier= $Supplier->get();
			//$viewData['Supplier']=json_decode(json_encode($Supplier), true);
		    return view('SaiAutoCare.product.search', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (Product::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Product was Trashed!');
            $viewData['pageTitle'] = 'Supplier';       	
			$viewData['product'] = Product::paginate(10);
			return view('SaiAutoCare.product.search', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Supplier';       	
			$viewData['product'] = Product::paginate(10);
			return view('SaiAutoCare.product.search', $viewData);
       }
    
    }
    public function trashedList()
    {
         $TrashedParty = Product::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
          // $TrashedParty=$TrashedParty
         return view('SaiAutoCare.product.delete', compact('TrashedParty', 'TrashedParty')); 
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
         return view('SaiAutoCare.product.delete', compact('TrashedParty', 'TrashedParty'));
    }
}
