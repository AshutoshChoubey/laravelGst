<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CreditDebitDetail;
use Illuminate\Support\Facades\Auth;
use DB;

class CreditDebitController extends Controller
{
   	public function __construct()
    {
        $this->middleware('auth');
    }
     public function save(Request $request, $id = null)
    {
        $getFormAutoFillup = array();

        $viewData['pageTitle'] = 'Credit Debit Detail'; 
        if(isset($id) && $id != null ){
            $getFormAutoFillup = CreditDebitDetail::whereId($id)->first();           
            if ($getFormAutoFillup) {
            $getFormAutoFillup = $getFormAutoFillup->toArray();
            }
            else
            {
                $request->session()->flash('message.level', 'Error');
                $request->session()->flash('message.content', 'Somthing Went Wrong!');
            }
            return view('GST.credit-debit-log.add', $viewData)->with($getFormAutoFillup);
        }
        else
            {
            if ($request->isMethod('post')){    
                    $item = $request->input('item');
                    $item_discription = $request->input('item_discription');
                    $amount = $request->input('amount');
                    $is_credit = $request->input('is_credit');
                    $created_at = $request->input('created_at');
                    $user_id=Auth::user()->id;
                  

                    for($i=0; $i < count($item); $i++){
							$saveCreditdebit = new CreditDebitDetail;
							$saveCreditdebit->item = $item[$i];
							$saveCreditdebit->item_discription = $item_discription[$i];
							$saveCreditdebit->amount = $amount[$i];
							$saveCreditdebit->is_credit = $is_credit;
							$saveCreditdebit->user_id = $user_id;
                            $saveCreditdebit->created_at = $created_at;

                            if(!$saveCreditdebit->save())
                            {
                                $request->session()->flash('message.level', 'Error');
                                $request->session()->flash('message.content', 'Somthing Went Wrong!');
                            }
                        }
                        $request->session()->flash('message.level', 'success');
                        $request->session()->flash('message.content', ' Saved Successfully!');
            }
            return view('GST.credit-debit-log.add', $viewData);
        }
    }
    public function update(Request $request, $id = null)
    {
        $getFormAutoFillup = array();
        $viewData['pageTitle'] = 'Credit Debit Log  Detail';       
            if ($request->isMethod('post')){    
                    $item = $request->input('item');
                    $item_discription = $request->input('item_discription');
                    $amount = $request->input('amount');
                    $is_credit = $request->input('is_credit');  
                    $user_id=Auth::user()->id;

                    for($i=0; $i < count($item); $i++){
                        
                            $updateCreditDebitDetail = CreditDebitDetail::where('id', '=', $request->id);;
                            $saveCreditdebit['item'] = $item[$i];
							$saveCreditdebit['item_discription'] = $item_discription[$i];
							$saveCreditdebit['amount'] = $amount[$i];
							$saveCreditdebit['is_credit'] = $is_credit; 
							$saveCreditdebit['user_id'] = $user_id; 
                            $saveCreditdebit['created_at'] = $request->input('created_at');                          
 
                            if(!$updateCreditDebitDetail->update($saveCreditdebit))
                            {
                                $request->session()->flash('message.level', 'Error');
                                $request->session()->flash('message.content', 'Somthing Went Wrong!');
                            }
                        }
                        $request->session()->flash('message.level', 'success');
                        $request->session()->flash('message.content', ' Updated Successfully!');
        }
         return redirect('/credit-debit/add/'.$request->id);
    }
   // this is for search
    public function view(Request $request)
    {
    	$getFormAutoFillup = array();
    	if($request->isMethod('post'))
    	{
    		$viewData['pageTitle'] = 'Credit Debit Log';       	
			$market= DB::table('credit_debit_details');
            $market->leftJoin('users','users.id','=','credit_debit_details.user_id');
            $market->leftJoin('user_details','user_details.users_id','=','credit_debit_details.user_id');
           $user_role_id= Auth::user()->role_id;
           $userId= Auth::user()->id;
           if($user_role_id!=1)
           {
           	  $market->where('users.id','=',$userId);
           }          
            $market->where('credit_debit_details.deleted_at','=',null);
			if($request->has('id') && $request->id !=''){
				$getFormAutoFillup['id']=$request->id;
				$market->where('credit_debit_details.id', '=', $request->id);
			}
			if($request->has('user_name') && $request->user_name !=''){
				$getFormAutoFillup['user_name']=$request->user_name;
				$market->where('users.name', 'like', '%'.$request->user_name.'%');
			}
			if($request->has('created_at_from') && $request->created_at_from !=''){
				$getFormAutoFillup['created_at_from']=$request->created_at_from;
				$market->where('credit_debit_details.created_at', '>=', $request->created_at_from);
			}
			if($request->has('created_at_to') && $request->created_at_to !=''){
				$getFormAutoFillup['created_at_to']=$request->created_at_to;
				$market->where('credit_debit_details.created_at', '<', $request->created_at_to);
			}
			if($request->has('user_id') && $request->user_id !=''){
				$getFormAutoFillup['user_id']=$request->user_id;
				$market->where('users.id', 'like', $request->user_id);
			}

			$market->select('credit_debit_details.*','users.name as user_name','users.email as user_email');
			$market->orderBy('created_at','ASC');
       		$market= $market->get();
			$viewData['market']=json_decode(json_encode($market), true);
		    return view('GST.credit-debit-log.search', $viewData)->with($getFormAutoFillup);;

    	}else
    	{
    		$viewData['pageTitle'] = 'Credit Debit Log';   
    		$user_role_id= Auth::user()->role_id;    	
			$market= DB::table('credit_debit_details');
            $market->leftJoin('users','users.id','=','credit_debit_details.user_id');
            $market->leftJoin('user_details','user_details.users_id','=','credit_debit_details.user_id');
            $market->where('credit_debit_details.deleted_at','=',null);
              $userId= Auth::user()->id;
           if($user_role_id!=1)
           {
           	 $market->where('users.id','=',$userId);
           }
            $market->select('credit_debit_details.*','users.name as user_name','users.email as user_email');
            $market->orderBy('created_at','ASC');
            $market= $market->get();
            $viewData['market']=json_decode(json_encode($market), true);
            // $viewData['purchase'] = $market;
		//	$market= DB::table('purchases');
			//$market->orderBy('id','desc');
       		//$market= $market->get();
			//$viewData['purchase']=json_decode(json_encode($market), true);
            //Ashu@97047$&(!   ca7zaoly6g7y
		    return view('GST.credit-debit-log.search', $viewData);
    	}
      
    }
    public function trash(Request $request,$id)
    {
    	if(($id!=null) && (CreditDebitDetail::where('id',$id)->delete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', 'Purchase was Trashed!');
            $viewData['pageTitle'] = 'Purchase';       	
			$market= DB::table('credit_debit_details');
            $market->leftJoin('users','users.id','=','credit_debit_details.user_id');
            $market->leftJoin('user_details','user_details.users_id','=','credit_debit_details.user_id');
            $market->where('credit_debit_details.deleted_at','=',null);
            $market->select('credit_debit_details.*','users.name as user_name','users.email as user_email');
            $market->orderBy('created_at','ASC');
            $market= $market->get();
            $viewData['market']=json_decode(json_encode($market), true);
			return view('GST.credit-debit-log.search', $viewData);
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
			 $viewData['pageTitle'] = 'Purchase';       	
			$market= DB::table('credit_debit_details');
            $market->leftJoin('users','users.id','=','credit_debit_details.user_id');
            $market->leftJoin('user_details','user_details.users_id','=','credit_debit_details.user_id');
            $market->where('credit_debit_details.deleted_at','=',null);
            $market->select('credit_debit_details.*','users.name as user_name','users.email as user_email');
            $market->orderBy('created_at','ASC');
            $market= $market->get();
            $viewData['market']=json_decode(json_encode($market), true);
			return view('GST.credit-debit-log.search', $viewData);
       }
    }
    public function trashedList()
    {

         $trashed = CreditDebitDetail::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(10);
         return view('GST.credit-debit-log.delete', compact('trashed', 'trashed'));
      
    }
    public function permanemetDelete(Request $request,$id)
    {
    	if(($id!=null) && (CreditDebitDetail::where('id',$id)->forceDelete())){
            $request->session()->flash('message.level', 'warning');
            $request->session()->flash('message.content', "Purchase was deleted Permanently and Can't rollback in Future!"); 
        }else{
            session()->flash('status', ['danger', 'Operation was Failed!']);
       }

    	 $trashed = CreditDebitDetail::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(50);
         return view('GST.credit-debit-log.delete', compact('trashed', 'trashed'));
    }
}
