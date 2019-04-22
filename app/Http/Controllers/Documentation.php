<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Documentation extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request, $id=null, $view = null)
    {
        $getMarketingDetails = array();
        /* Field specifiic Validations */   
        if(isset($request->id) && $request->id != null){
            $validationRules = [
                'title' => 'required'
            ];
        }else{
            $validationRules = [
                'title' => 'required'
            ];
        }
        $validator = Validator::make($request->all(), $validationRules);
        if(isset($id) && $id != null ){
           $getMarketingDetails=Market::whereId($id)->first()->toArray();
        }
        else if((!isset($id) && $id == null) && !$request->isMethod('post') )
        {
            $getMarketingDetails = array();
        }
        else {
            if ($request->isMethod('post')){
                if($validator->fails()){
                    return back()->withErrors($validator)->withInput();
                }else{
                                
                    }
            }
        }
    }
// $result = DB::select($sql)->get();
// $resultArray = json_decode(json_encode($result), true);
// $result = $result->toArray();

        $customFields['basic'] = array(
            'separator_1' => array('type' => 'separator_start', 'label' => 'Marketing Detail Details'),
            'menu_id'=>array('type' => 'text', 'label'=>'Item Name',  'mandatory'=>true),
            'title'=>array('type' => 'textarea', 'label'=>'Item Dscripton','style'=>'height:40px',  'mandatory'=>true),
            'quantity'=>array('type' => 'number', 'label'=>'Quantity','mandatory'=>false), 
            'price'=>array('type' => 'number', 'label'=>'Price','mandatory'=>false), 
            'total_price'=>array('type' => 'number', 'label'=>'Total Price','mandatory'=>false), 
            'separator_2' => array('type' => 'separator_end', 'label' => 'Marketing Detail Details'),   
        );
        if(isset($view) && $view == 'view'){ $data['field_disable'] = true; }else{
        $data['field_disable'] = false;
        }
        $viewData=['customFields' => $customFields, 'data' => $data, 'formButton' => isset($id) ? 'Update Details' : 'Save Marketing Details', 'pageTitle' => isset($id) && $id != '' ? 'Edit Employee':'Add Employee'];
        $viewData['formHeaderMessage']="Please fill up necessary fields";
        return view('SaiAutoCare.marketing.add',$viewData )->with($getMarketingDetails);
    }
   // this is for search
    public function view(Request $request)
    {
    	$getFormAutoFillup = array();
    	if($request->isMethod('post'))
    	{
    		$viewData['pageTitle'] = 'Add Party';       	
			$market= DB::table('markets');
            $market->leftJoin('users','users.id','=','markets.user_id');
            $market->leftJoin('user_details','user_details.users_id','=','markets.user_id');
            $market->where('markets.deleted_at','=',null);
			if($request->has('id') && $request->id !=''){
				$getFormAutoFillup['id']=$request->id;
				$market->where('markets.id', '=', $request->id);
			}
			if($request->has('user_name') && $request->user_name !=''){
				$getFormAutoFillup['user_name']=$request->user_name;
				$market->where('users.name', 'like', '%'.$request->user_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$getFormAutoFillup['created_at_from']=$request->created_at_from;
				$market->where('created_at', '>=', $request->created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$getFormAutoFillup['created_at_to']=$request->created_at_to;
				$market->where('created_at', '<', $request->created_at_to);
			}
			if($request->has('user_id') && $request->user_id !=''){
				$getFormAutoFillup['user_id']=$request->user_id;
				$market->where('users.id', 'like', '%'.$request->product_name.'%');
			}

			$market->select('markets.*','users.name as user_name','users.email as user_email');
			$market->orderBy('id','desc');
       		$market= $market->get();
			$viewData['market']=json_decode(json_encode($market), true);
		    return view('SaiAutoCare.marketing.search', $viewData)->with($getFormAutoFillup);;

    	}else
    	{
    		$viewData['pageTitle'] = 'Add Party';       	
			$market= DB::table('markets');
            $market->leftJoin('users','users.id','=','markets.user_id');
            $market->leftJoin('user_details','user_details.users_id','=','markets.user_id');
            $market->where('markets.deleted_at','=',null);
            $market->select('markets.*','users.name as user_name','users.email as user_email');
            $market->orderBy('id','desc');
            $market= $market->get();
            $viewData['market']=json_decode(json_encode($market), true);
            // $viewData['purchase'] = $market;
		//	$market= DB::table('purchases');
			//$market->orderBy('id','desc');
       		//$market= $market->get();
			//$viewData['purchase']=json_decode(json_encode($market), true);
            //Ashu@97047$&(!   ca7zaoly6g7y
		    return view('SaiAutoCare.marketing.search', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (Market::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Purchase was Trashed!');
            $viewData['pageTitle'] = 'Purchase';       	
			$market= DB::table('markets');
            $market->leftJoin('users','users.id','=','markets.user_id');
            $market->leftJoin('user_details','user_details.users_id','=','markets.user_id');
            $market->where('markets.deleted_at','=',null);
            $market->select('markets.*','users.name as user_name','users.email as user_email');
            $market->orderBy('id','desc');
            $market= $market->get();
            $viewData['market']=json_decode(json_encode($market), true);
			return view('SaiAutoCare.marketing.search', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			 $viewData['pageTitle'] = 'Purchase';       	
			$market= DB::table('markets');
            $market->leftJoin('users','users.id','=','markets.user_id');
            $market->leftJoin('user_details','user_details.users_id','=','markets.user_id');
            $market->where('markets.deleted_at','=',null);
            $market->select('markets.*','users.name as user_name','users.email as user_email');
            $market->orderBy('id','desc');
            $market= $market->get();
            $viewData['market']=json_decode(json_encode($market), true);
			return view('SaiAutoCare.marketing.search', $viewData);
       }
    }
    public function trashedList()
    {

         $trashed = Market::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('SaiAutoCare.marketing.delete', compact('trashed', 'trashed'));
      
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (Market::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Purchase was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }

    	 $trashed = Market::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(50);
         return view('SaiAutoCare.marketing.delete', compact('trashed', 'trashed'));
    }
}
