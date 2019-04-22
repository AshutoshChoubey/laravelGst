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

class MasterController extends Controller
{
      public function modal(Request $request)
    {
        $viewData['pageTitle'] = 'Add  Detail'; 
        $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->get();

		$viewData['model_select'] = Modal::pluck('model_name', 'id');
		$viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
		$viewData['service_name_select'] = ServiceName::pluck('service_name', 'id');
		$viewData['brand_select'] = Brand::pluck('brand_name', 'id');
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
    	return view('SaiAutoCare.master.modal',$viewData);
    }
    public function modalUpdate(Request $request,$id=null)
    {
        $viewData['pageTitle'] = 'Add  Detail'; 
        $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->get();

        $viewData['model_select'] = Modal::pluck('model_name', 'id');
        $viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
        $viewData['service_name_select'] = ServiceName::pluck('service_name', 'id');
        $viewData['brand_select'] = Brand::pluck('brand_name', 'id');
        if ($request->isMethod('post')){
           // $ServiceName=$request->all();
           // $ServiceNameSave = new ServiceName($ServiceName);
            $Modal=  request()->except(['_token']);
            if(Modal::where([['id', '=', $request->id]])->update($Modal)){
            // if($ServiceNameSave->save())
            // {
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Modal Name Updated Successfully!');
            }
            $getFormAutoFillup = Modal::whereId($request->id)->first()->toArray();
        }
        else
        {
             $getFormAutoFillup = Modal::whereId($id)->first()->toArray();
        }
            $viewData['model_list'] = Modal::paginate(4);
            $viewData['service_type_list'] = ServiceType::paginate(4);
            $viewData['service_name_list'] = ServiceName::paginate(4);
            $viewData['brand_list'] = Brand::paginate(4);
           
        
         
            return view('SaiAutoCare.master.modal',$viewData)->with($getFormAutoFillup);
    }
     public function service(Request $request)
    {
        $viewData['pageTitle'] = 'Add  Detail'; 
        $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->get();

		$viewData['model_select'] = Modal::pluck('model_name', 'id');
		$viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
		$viewData['service_name_select'] = ServiceName::pluck('service_name', 'id');
		$viewData['brand_select'] = Brand::pluck('brand_name', 'id');
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
    	return view('SaiAutoCare.master.service',$viewData);
    }

    public function serviceUpdate(Request $request,$id=null)
    {
        $viewData['pageTitle'] = 'Add  Detail'; 
        $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->get();

        $viewData['model_select'] = Modal::pluck('model_name', 'id');
        $viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
        $viewData['service_name_select'] = ServiceName::pluck('service_name', 'id');
        $viewData['brand_select'] = Brand::pluck('brand_name', 'id');
        if ($request->isMethod('post')){
           // $ServiceName=$request->all();
           // $ServiceNameSave = new ServiceName($ServiceName);
            $ServiceName=  request()->except(['_token']);
            if(ServiceName::where([['id', '=', $request->id]])->update($ServiceName)){
            // if($ServiceNameSave->save())
            // {
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Service Name Updated Successfully!');
            }
            $getFormAutoFillup = ServiceName::whereId($request->id)->first()->toArray();
        }
        else
        {
             $getFormAutoFillup = ServiceName::whereId($id)->first()->toArray();
        }
            $viewData['model_list'] = Modal::paginate(4);
            $viewData['service_type_list'] = ServiceType::paginate(4);
            $viewData['service_name_list'] = ServiceName::paginate(4);
            $viewData['brand_list'] = Brand::paginate(4);
           
        
         
            return view('SaiAutoCare.master.service',$viewData)->with($getFormAutoFillup);
    }
     public function brand(Request $request)
    {
        $viewData['pageTitle'] = 'Add  Detail'; 
        $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->get();

    	 $viewData['model_select'] = Modal::pluck('model_name', 'id');
    	  $viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
    	   $viewData['service_name_select'] = ServiceName::pluck('service_name', 'id');
    	    $viewData['brand_select'] = Brand::pluck('brand_name', 'id');
    	if ($request->isMethod('post')){
    		$Brand=$request->all();
    		$BrandSave = new Brand($Brand);
    		if($BrandSave->save())
    		{
				$request->session()->flash('message.level', 'success');
		     	$request->session()->flash('message.content', 'BrandSave  Saved Successfully!');
    		}
    		
    	}
			$viewData['model_list'] = Modal::get();
			$viewData['service_type_list'] = ServiceType::paginate(4);
			$viewData['service_name_list'] = ServiceName::paginate(4);
			$viewData['brand_list'] = Brand::paginate(4);
    	return view('SaiAutoCare.master.brand',$viewData);
    }
    public function brandUpdate(Request $request,$id=null)
    {
        $viewData['pageTitle'] = 'Add  Detail'; 
        $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->get();

        $viewData['model_select'] = Modal::pluck('model_name', 'id');
        $viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
        $viewData['service_name_select'] = ServiceName::pluck('service_name', 'id');
        $viewData['brand_select'] = Brand::pluck('brand_name', 'id');
        if ($request->isMethod('post')){
           // $ServiceName=$request->all();
           // $ServiceNameSave = new ServiceName($ServiceName);
            $Brand=  request()->except(['_token']);
            if(Brand::where([['id', '=', $request->id]])->update($Brand)){
            // if($ServiceNameSave->save())
            // {
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Modal Name Updated Successfully!');
            }
            $getFormAutoFillup = Brand::whereId($request->id)->first()->toArray();
        }
        else
        {
             $getFormAutoFillup = Brand::whereId($id)->first()->toArray();
        }
            $viewData['model_list'] = Modal::paginate(4);
            $viewData['service_type_list'] = ServiceType::paginate(4);
            $viewData['service_name_list'] = ServiceName::paginate(4);
            $viewData['brand_list'] = Brand::paginate(4);
            return view('SaiAutoCare.master.brand',$viewData)->with($getFormAutoFillup);
    }
     public function serviceType(Request $request)
    {
        $viewData['pageTitle'] = 'Add  Detail'; 
        $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->get();

		$viewData['model_select'] = Modal::pluck('model_name', 'id');
		$viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
		$viewData['service_name_select'] = ServiceName::pluck('service_name', 'id');
		$viewData['brand_select'] = Brand::pluck('brand_name', 'id');

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

    	return view('SaiAutoCare.master.service_type',$viewData);
    }
     public function serviceTypeUpdate(Request $request,$id=null)
    {
        $viewData['pageTitle'] = 'Add  Detail'; 
        $viewData['header_link'] =  HeaderLink::where("menu_id",'5')->select("link_title","link_name")->get();

        $viewData['model_select'] = Modal::pluck('model_name', 'id');
        $viewData['service_type_select'] = ServiceType::pluck('service_type_name', 'id');
        $viewData['service_name_select'] = ServiceName::pluck('service_name', 'id');
        $viewData['brand_select'] = Brand::pluck('brand_name', 'id');
        if ($request->isMethod('post')){
           // $ServiceName=$request->all();
           // $ServiceNameSave = new ServiceName($ServiceName);
            $ServiceType=  request()->except(['_token']);
            if(ServiceType::where([['id', '=', $request->id]])->update($ServiceType)){
            // if($ServiceNameSave->save())
            // {
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Service Type Updated Successfully!');
            }
            $getFormAutoFillup = ServiceType::whereId($request->id)->first()->toArray();
        }
        else
        {
             $getFormAutoFillup = ServiceType::whereId($id)->first()->toArray();
        }
            $viewData['model_list'] = Modal::paginate(4);
            $viewData['service_type_list'] = ServiceType::paginate(4);
            $viewData['service_name_list'] = ServiceName::paginate(4);
            $viewData['brand_list'] = Brand::paginate(4);
            return view('SaiAutoCare.master.service_type',$viewData)->with($getFormAutoFillup);
    }
}
