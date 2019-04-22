<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workshop;
use App\Product;
use App\Service;
use DB;
use App\WorkshopProduct;
use App\WorkshopService;

class WorkshopController extends Controller
{
  	public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Add wWorkshop'; 
        $viewData['product'] = Product::pluck('product_name', 'id');
        $viewData['service'] = Service::pluck('service_name', 'id');
        // This if condition for fill detail for update otherwise for save and update 
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = Workshop::whereId($id)->first()->toArray();
    		return view('SaiAutoCare.workshop.add', $viewData)->with($getFormAutoFillup);
    	}
    	else if((!isset($id) && $id == null) && !$request->isMethod('post') )
    	{
    		return view('SaiAutoCare.workshop.add', $viewData);
    	}
    	else {
    		 // This if condition for fill detail for  update otherwise for  save 
	    	if ($request->isMethod('post')){
	    		$getFormAutoFillup = array();	    		
	    		if(isset($request->id) && $request->id != null) 
	    		{
	    			if ($request->isMethod('post')){

			    		$PartyManage=	 request()->except(['_token','service_id','product_id','status','service_quantity','product_quantity']);
                         $PartyManage['status']="pending";

						if(Workshop::where([['id', '=', $request->id]])->update($PartyManage)){
							$request->session()->flash('message.level', 'success');
					     	$request->session()->flash('message.content', ' updated Successfully!');
						}
				    }
				     return redirect('/SaiAutoCare/workshop/add/'.$request->id);
	    		}
	    		else
	    		{
			     	$PartyManage =	request()->except(['_token','service_id','product_id','status','service_quantity','product_quantity']);
                    $PartyManage['status']="pending";
					$PartyManage = new Workshop($PartyManage);
					if($PartyManage->save()){

                        $unit_price_exit=DB::table('purchases')->where('id', $request->product_id)->value('unit_price_exit');
                        $gstForPurchase=DB::table('purchases')->where('id', $request->product_id)->value('gst');
                        $price=DB::table('services')->where('id', $request->service_id)->value('price');
                        $gstForService=DB::table('services')->where('id', $request->service_id)->value('gst');

                        for($i=0; $i < count($request->product_id); $i++){

                                $WorkshopProduct= new WorkshopProduct();
                                $WorkshopProduct->workshop_id    = $PartyManage->id;
                                $WorkshopProduct->product_id    = $request->product_id[$i];
                                $WorkshopProduct->product_price    = $unit_price_exit+($unit_price_exit*$gstForPurchase/100);                               
                                $WorkshopProduct->save();
                       } 
                        for($i=0; $i < count($request->service_id); $i++){

                                $WorkshopService= new WorkshopService();
                                $WorkshopService->workshop_id    = $PartyManage->id;
                                $WorkshopService->service_id    = $request->service_id[0];
                                $WorkshopService->service_price    = $price+($price*$gstForService/100);
                                $WorkshopService->save();
                        }
                     
						$request->session()->flash('message.level', 'success');
				     	$request->session()->flash('message.content', ' Saved Successfully!');
					}
					 $viewData['workshopId'] = $PartyManage->id;
					return view('SaiAutoCare.workshop.add', $viewData);
	    		}
			}
		}
    }

   // this is for search
    public function view(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$viewData['pageTitle'] = 'Add Party';       	
			$workshop= DB::table('workshops');
			if($request->has('id') && $request->id !=''){
				$workshop->where('id', '=', $request->id);
			}
			if($request->has('name') && $request->name !=''){
				$workshop->where('name', 'like', '%'.$request->name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$workshop->where('created_at', '>=', $request->created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$workshop->where('created_at', '<', $request->created_at_to);
			}
			if($request->has('mobile') && $request->mobile !=''){
				$workshop->where('mobile', '=', $request->mobile);
			}
			if($request->has('email') && $request->email !=''){
				$workshop->where('email', '=', $request->email);
			}
			$workshop->orderBy('id','desc');
       		$workshop= $workshop->get();
			$viewData['workshop']=json_decode(json_encode($workshop), true);
			// print_r($viewData['workshop']);
			// exit;
		    return view('SaiAutoCare.workshop.search', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'Add Party';       	
			$viewData['workshop'] = Workshop::orderBy('id','desc')->get();
		//	$workshop= DB::table('workshops');
			//$workshop->orderBy('id','desc');
       		//$workshop= $workshop->get();
			//$viewData['workshop']=json_decode(json_encode($workshop), true);
		    return view('SaiAutoCare.workshop.search', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (Workshop::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Workshop was Trashed!');
            $viewData['pageTitle'] = 'Workshop';       	
			$viewData['workshop'] = Workshop::paginate(10);
			return view('SaiAutoCare.workshop.search', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Workshop';       	
			$viewData['workshop'] = Workshop::paginate(10);
			return view('SaiAutoCare.workshop.search', $viewData);
       }
    
    }
    public function trashedList()
    {

         $TrashedParty = Workshop::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('SaiAutoCare.workshop.delete', compact('TrashedParty', 'TrashedParty'));
      
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (Workshop::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Workshop was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }

    	 $TrashedParty = Workshop::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('SaiAutoCare.workshop.delete', compact('TrashedParty', 'TrashedParty'));
    }
    public function viewIndivisual($id)
    {
    	$getIndivisualWorkshopDetail = Workshop::whereId($id)->first()->toArray();
     //   print_r($getIndivisualWorkshopDetail['id']);
        $WorkshopProduct = DB::table('workshop_products')
        ->join('products','products.id','=','workshop_products.product_id')
        ->where('workshop_id',$getIndivisualWorkshopDetail['id'])->get();

        $WorkshopService = DB::table('workshop_services')
        ->join('services','services.id','=','workshop_services.service_id')
        ->where('workshop_id',$getIndivisualWorkshopDetail['id'])->get();
        $viewData['WorkshopProduct']=$WorkshopProduct;
        $viewData['WorkshopService']=$WorkshopService;
      

    	return view('SaiAutoCare.workshop.view',$viewData)->with($getIndivisualWorkshopDetail);
    }
} 
