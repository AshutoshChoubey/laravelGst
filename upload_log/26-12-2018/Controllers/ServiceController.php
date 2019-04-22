<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
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
    	if($request->isMethod('post'))
    	{
    		DB::enableQueryLog();
    		$viewData['pageTitle'] = 'Service';       	
			$Service= DB::table('services');
			if($request->has('id') && $request->id !=''){
				$Service->where('id', '=', $request->id);
			}
			if($request->has('service_name') && $request->service_name !=''){
				$Service->where('service_name', 'like', '%'.$request->service_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$Service->where('created_at', '>=', $request->created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$Service->where('created_at', '<', $request->created_at_to);
			}
			$Service->orderBy('id','desc');
			$Service->get();
			// $query        = DB::getQueryLog();
			// $lastQuery    = end($query);
			// print_r($lastQuery);
			// exit;
       		$Service= $Service->get();
			$viewData['service']=json_decode(json_encode($Service), true);
		    return view('SaiAutoCare.service.search', $viewData);

    	}else
    	{
    		$viewData['pageTitle'] = 'Service';       	
			$viewData['service'] = Service::orderBy('id','desc')->get();
		//	$Service= DB::table('Services');
			//$Service->orderBy('id','desc');
       		//$Service= $Service->get();
			//$viewData['Service']=json_decode(json_encode($Service), true);
		    return view('SaiAutoCare.service.search', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (Service::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Service was Trashed!');
            $viewData['pageTitle'] = 'Service';       	
			$viewData['service'] = Service::paginate(10);
			return view('SaiAutoCare.service.search', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			$viewData['pageTitle'] = 'Service';       	
			$viewData['service'] = Service::paginate(10);
			return view('SaiAutoCare.service.search', $viewData);
       }
    
    }
    public function trashedList()
    {
         $TrashedService = Service::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
          // $TrashedService=$TrashedService
         return view('SaiAutoCare.service.delete', compact('TrashedService', 'TrashedService')); 
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (Service::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Service was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }

    	 $TrashedService = Service::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('SaiAutoCare.service.delete', compact('TrashedService', 'TrashedService'));
    }
}
