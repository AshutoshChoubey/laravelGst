<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceType;
use App\ServiceName;
use App\Modal;
use App\Brand;
use App\HeaderLink;
use DB;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Service Dretail'; 


        $viewData['pageTitle'] = 'Add  Detail'; 
        $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->orderBy('id','desc')->get();

			$viewData['model_list'] = Modal::paginate(4);
			$viewData['service_type_list'] = ServiceType::paginate(4);
			$viewData['service_name_list'] = ServiceName::paginate(4);
			$viewData['brand_list'] = Brand::paginate(4);
			$viewData['model_select'] = Modal::pluck('model_name', 'id');
			$viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
			$viewData['service_name_select'] = ServiceName::pluck('service_name', 'service_name');
			$viewData['brand_select'] = Brand::pluck('brand_name', 'id');

        // This if condition for fill detail for update otherwise for save and update 
     //   	if(isset($id) && $id != null ){
    	// 	$getFormAutoFillup = Service::whereId($id)->first()->toArray();
    	// 	return view('SaiAutoCare.service.add', $viewData)->with($getFormAutoFillup);
    	// }
    	// // else if((!isset($id) && $id == null) && !$request->isMethod('post') )
    	// // {
    	// // 	return view('SaiAutoCare.service.add', $viewData);
    	// // }
    	// else {
    		 // This if condition for fill detail for  update otherwise for  save 
	    	if ($request->isMethod('post')){
	    		$getFormAutoFillup = array();	    		
	    	// 	if(isset($request->id) && $request->id != null)
	    	// 	{
	    	// 		if ($request->isMethod('post')){
			   //  		$serviceManame=	 request()->except(['_token']);
						// if(Service::where([['id', '=', $request->id]])->update($serviceManame)){
						// 	$request->session()->flash('message.level', 'success');
					 //     	$request->session()->flash('message.content', 'Service updated Successfully!');
						// }
				  //   }
				  //    return redirect('/SaiAutoCare/service/add/'.$request->id);
	    	// 	}
	    	// 	else
	    	// 	{
			     	$serviceManame=$request->all();
			     	//print_r($serviceManame);
			     	///exit;
					$serviceManame = new Service($serviceManame);
					
					if($serviceManame->save()){
						$request->session()->flash('message.level', 'success');
				     	$request->session()->flash('message.content', 'Service Saved Successfully!');
					}
					
	    		//}
			}
			return view('SaiAutoCare.service.add', $viewData);
		//s}
    }
    public function update(Request $request, $id = null)
    {
        $viewData['pageTitle'] = 'Service Dretail'; 
         $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->orderBy('id','desc')->get();
        $viewData['model_list'] = Modal::paginate(4);
		$viewData['service_type_list'] = ServiceType::paginate(4);
		$viewData['service_name_list'] = ServiceName::paginate(4);
		$viewData['brand_list'] = Brand::paginate(4);
		$viewData['model_select'] = Modal::pluck('model_name', 'id');
		$viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
		$viewData['service_name_select'] = ServiceName::pluck('service_name', 'service_name');
		$viewData['brand_select'] = Brand::pluck('brand_name', 'id');

        // This if condition for fill detail for update otherwise for save and update 
       	if(isset($id) && $id != null ){
    		$getFormAutoFillup = Service::whereId($id)->first()->toArray();
    		return view('SaiAutoCare.service.add', $viewData)->with($getFormAutoFillup);
    	}
    	// else if((!isset($id) && $id == null) && !$request->isMethod('post') )
    	// {
    	// 	return view('SaiAutoCare.service.add', $viewData);
    	// }
    	 else {
    		 // This if condition for fill detail for  update otherwise for  save 
	    	if ($request->isMethod('post')){
	    		$getFormAutoFillup = array();	    		
	    		if(isset($request->id) && $request->id != null)
	    		{
	    			if ($request->isMethod('post')){
			    		$serviceManame=	 request()->except(['_token']);
						if(Service::where([['id', '=', $request->id]])->update($serviceManame)){
							$request->session()->flash('message.level', 'success');
					     	$request->session()->flash('message.content', 'Service updated Successfully!');
						}
				    }
				     return redirect('/SaiAutoCare/service/add/'.$request->id);
	    		}
	    		else
	    		{
			     	$serviceManame=$request->all();
			     	//print_r($serviceManame);
			     	///exit;
					$serviceManame = new Service($serviceManame);
					
					if($serviceManame->save()){
						$request->session()->flash('message.level', 'success');
				     	$request->session()->flash('message.content', 'Service Saved Successfully!');
					}
					
	    		}
			}
			return view('SaiAutoCare.service.add', $viewData);
		}
    }

     public function view(Request $request)
    {
        $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->orderBy('id','desc')->get();

    	if($request->isMethod('post'))
    	{
    		DB::enableQueryLog();
    		$viewData['pageTitle'] = 'Service';       	
			$Service= DB::table('services');
            $Service->Join('modals','modals.id','=','services.model_name');
            $Service->Join('brands','brands.id','=','services.brand_name');
            $Service->Join('service_types','service_types.id','=','services.service_type');
            // $Service->Join('service_names','service_names.id','=','services.service_name');
            $Service->where('services.deleted_at','=',null);
			if($request->has('id') && $request->id !=''){
				$Service->where('services.id', '=', $request->id);
			}
			if($request->has('service_name') && $request->service_name !=''){
				$Service->where('services.service_name', 'like', '%'.$request->service_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$Service->whereDate('services.created_at', '<=', $request->created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$Service->whereDate('services.created_at', '>=', $request->created_at_to);
			}
            $Service->select('services.*','service_types.service_type_name as service_type_name_from_service_types','brands.brand_name as brand_name_from_brand','services.service_name as service_name_from_service_names','modals.model_name as model_name_from_modal' );
			$Service->orderBy('services.id','desc');
			$Service=$Service->get();
			// $query        = DB::getQueryLog();
			// $lastQuery    = end($query);
			// print_r($lastQuery);
   //          print_r($Service);
			// exit;
   //     		$Service= $Service->get();
			$viewData['service']=json_decode(json_encode($Service), true);
		    return view('SaiAutoCare.service.search', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'Service';  
            $Service= DB::table('services');
            $Service->Join('modals','modals.id','=','services.model_name');
            $Service->Join('brands','brands.id','=','services.brand_name');
            $Service->Join('service_types','service_types.id','=','services.service_type');
            // $Service->Join('service_names','service_names.id','=','services.service_name');
            $Service->where('services.deleted_at','=',null);
            $Service->select('services.*','service_types.service_type_name as service_type_name_from_service_types','brands.brand_name as brand_name_from_brand','services.service_name as service_name_from_service_names','modals.model_name as model_name_from_modal' );
            $Service->orderBy('services.id','desc');
            $Service= $Service->get();  
            $viewData['service']=json_decode(json_encode($Service), true);   	
			//$viewData['service'] = Service::orderBy('id','desc')->get();
		//	$Service= DB::table('Services');
			//$Service->orderBy('id','desc');
       		//$Service= $Service->get();
			//$viewData['Service']=json_decode(json_encode($Service), true);
		    return view('SaiAutoCare.service.search', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
        $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->orderBy('id','desc')->get();

    	if(($id!=null) && (Service::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Service was Trashed!');
            $viewData['pageTitle'] = 'Service'; 
            $Service= DB::table('services');
            $Service->Join('modals','modals.id','=','services.model_name');
            $Service->Join('brands','brands.id','=','services.brand_name');
            $Service->Join('service_types','service_types.id','=','services.service_type');
            // $Service->Join('service_names','service_names.id','=','services.service_name');
            $Service->where('services.deleted_at','=',null);
           $Service->select('services.*','service_types.service_type_name as service_type_name_from_service_types','brands.brand_name as brand_name_from_brand','services.service_name as service_name_from_service_names','modals.model_name as model_name_from_modal' );
            $Service->orderBy('id','desc');
            $Service= $Service->get();  
            $viewData['service']=json_decode(json_encode($Service), true);      
            //$viewData['service'] = Service::orderBy('id','desc')->get();
        //  $Service= DB::table('Services');
            //$Service->orderBy('id','desc');
            //$Service= $Service->get();
            //$viewData['Service']=json_decode(json_encode($Service), true);
            return view('SaiAutoCare.service.search', $viewData);      	
			//$viewData['service'] = Service::paginate(10);
			//return view('SaiAutoCare.service.search', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Service';       	
			//$viewData['service'] = Service::paginate(10);
            $Service= DB::table('services');
            $Service->Join('modals','modals.id','=','services.model_name');
            $Service->Join('brands','brands.id','=','services.brand_name');
            $Service->Join('service_types','service_types.id','=','services.service_type');
            // $Service->Join('service_names','service_names.id','=','services.service_name');
            $Service->where('services.deleted_at','=',null);
            $Service->select('services.*','service_types.service_type as service_type_name_from_service_types','brands.brand_name as brand_name_from_brand','services.service_name as service_name_from_service_names','modals.model_name as model_name_from_modal' );
            $Service->orderBy('id','desc');
            $Service= $Service->get();  
            $viewData['service']=json_decode(json_encode($Service), true);      
            //$viewData['service'] = Service::orderBy('id','desc')->get();
        //  $Service= DB::table('Services');
            //$Service->orderBy('id','desc');
            //$Service= $Service->get();
            //$viewData['Service']=json_decode(json_encode($Service), true);
			return view('SaiAutoCare.service.search', $viewData);
       }
    
    }
    public function trashedList()
    {
         $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->orderBy('id','desc')->get();

         $TrashedService = Service::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
          // $TrashedService=$TrashedService
         return view('SaiAutoCare.service.delete', compact('TrashedService', 'TrashedService')); 
    }
    public function permanemetDelete(Request $request,$id)
    {
        $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->orderBy('id','desc')->get();

    	if(($id!=null) && (Service::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Service was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }
    	 $TrashedService = Service::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('SaiAutoCare.service.delete', compact('TrashedService', 'TrashedService'));
    }
     public function model(Request $request)
    {
        $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->orderBy('id','desc')->get();
		
    	if ($request->isMethod('post')){
    		$modal=$request->all();
    		$BrandSave = new Modal($modal);
    		if($BrandSave->save())
    		{
				$request->session()->flash('message.level', 'success');
		     	$request->session()->flash('message.content', 'Brand Saved Successfully!');
    		}
    		
    	}
		$viewData['model_list'] = Modal::paginate(4);
		$viewData['service_type_list'] = ServiceType::paginate(4);
		$viewData['service_name_list'] = ServiceName::paginate(4);
		$viewData['brand_list'] = Brand::paginate(4);

        $viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
        $viewData['service_name_select'] = ServiceName::pluck('service_name', 'service_name');
        $viewData['model_select'] = Modal::pluck('model_name', 'id');        
        $viewData['brand_select'] = Brand::pluck('brand_name', 'id');
    	return view('SaiAutoCare.service.add',$viewData);
    }
     public function service(Request $request,$id=null)
    {
          $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->orderBy('id','desc')->get();
		
		$viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
		$viewData['service_name_select'] = ServiceName::pluck('service_name', 'service_name');
		
    	if ($request->isMethod('post')){
    		$ServiceName=$request->all();
    		$ServiceNameSave = new ServiceName($ServiceName);
    		if($ServiceNameSave->save())
    		{
				$request->session()->flash('message.level', 'success');
		     	$request->session()->flash('message.content', 'Service Name Saved Successfully!');
    		}
    		
    	}
        $viewData['model_list'] = Modal::paginate(4);
        $viewData['service_type_list'] = ServiceType::paginate(4);
        $viewData['service_name_list'] = ServiceName::paginate(4);
        $viewData['brand_list'] = Brand::paginate(4);

        $viewData['model_select'] = Modal::pluck('model_name', 'id');
        $viewData['brand_select'] = Brand::pluck('brand_name', 'id');
        $viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
        $viewData['service_name_select'] = ServiceName::pluck('service_name', 'service_name');
    	return view('SaiAutoCare.service.add',$viewData);
    }
     public function brand(Request $request)
    {
    	 $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->orderBy('id','desc')->get();
    	   // $viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'service_type_name');
    	   //  $viewData['service_name_select'] = ServiceName::pluck('service_name', 'service_name');
    	   //  $viewData['brand_select'] = Brand::pluck('brand_name', 'id');
    	if ($request->isMethod('post')){
    		$Brand=$request->all();
    		$BrandSave = new Brand($Brand);
    		if($BrandSave->save())
    		{
				$request->session()->flash('message.level', 'success');
		     	$request->session()->flash('message.content', 'BrandSave  Saved Successfully!');
    		}
    		
    	}
        $viewData['model_list'] = Modal::paginate(4);
        $viewData['service_type_list'] = ServiceType::paginate(4);
        $viewData['service_name_list'] = ServiceName::paginate(4);
        $viewData['brand_list'] = Brand::paginate(4);
        $viewData['brand_select'] = Brand::pluck('brand_name', 'id');           
        $viewData['model_select'] = Modal::pluck('model_name', 'id');
        $viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
        $viewData['service_name_select'] = ServiceName::pluck('service_name', 'service_name');
    	return view('SaiAutoCare.service.add',$viewData);
    }
     public function serviceType(Request $request)
    {
          $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->orderBy('id','desc')->get();
    	if ($request->isMethod('post')){
    		$ServiceType=$request->all();
    		$ServiceTypeSave = new ServiceType($ServiceType);
    		if($ServiceTypeSave->save())
    		{
				$request->session()->flash('message.level', 'success');
		     	$request->session()->flash('message.content', 'Service Type Saved Successfully!');
    		}	
    	}
		$viewData['model_list'] = Modal::paginate(4);
		$viewData['service_type_list'] = ServiceType::paginate(4);
		$viewData['service_name_list'] = ServiceName::paginate(4);
		$viewData['brand_list'] = Brand::paginate(4);
        $viewData['model_select'] = Modal::pluck('model_name', 'id');
        $viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
        $viewData['service_name_select'] = ServiceName::pluck('service_name', 'service_name');
        $viewData['brand_select'] = Brand::pluck('brand_name', 'id');

    	return view('SaiAutoCare.service.add',$viewData);
    }

}
