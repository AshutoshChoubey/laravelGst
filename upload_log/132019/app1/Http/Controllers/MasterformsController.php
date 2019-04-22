<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDF;
use Crypt;
use Helper;
use Auth;
use App\User;
use App\UserDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Role;
use Analytics;

class MasterformsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
   
	
	public function addUser(Request $request, $id=null, $view = null)
	{
		$getRoles = array('' => '-- Select --');
		$getRoles += Role::where('is_active', '1')->pluck('role_name', 'id')->toArray();
		$getEmployeeDetails = array();
		/* Field specifiic Validations */	
		if(isset($request->id) && $request->id != null){
	        $validationRules = [
	            'name' => 'required|max:255',
	            'email' => 'required|email|max:150',
				'confirm_password' => 'same:password',
				'role_id'	=> 'required'
	        ];
    	}else{
			$validationRules = [
	            'name' => 'required|max:255',
	            'email' => 'required|email|max:150|unique:users',
	            'password' => 'required',
				'confirm_password' => 'required|same:password',
				'role_id'	=> 'required'
	        ];
    	}
    	$validator = Validator::make($request->all(), $validationRules);
    	if(isset($id) && $id != null ){
    		$employeeDetails = User::where('id', $id)->with('user_detail')->first()->toArray();
			unset($employeeDetails['user_detail']['id']);
			if(isset($employeeDetails['user_detail']))
			{
				$getEmployeeDetails = array_merge($employeeDetails, $employeeDetails['user_detail']);
			}
			else{
				$getEmployeeDetails =$employeeDetails;
			}			
    	}
    	else if((!isset($id) && $id == null) && !$request->isMethod('post') )
    	{
    		$getEmployeeDetails = array();
    	}
    	else {
			if ($request->isMethod('post')){
				$userData = $request->only(['name', 'email', 'password', 'confirm_password','password_hint', 'role_id']);
				$userOtherData = $request->only(['Address', 'office_address', 'mobile_number', 'bank_account_name', 'bank_account_no', 'bank_ifsc_code', 'department_name', 'employee_gender', 'specimen_of_full_signature' ]);
				if($validator->fails()){
	            	return back()->withErrors($validator)->withInput();
	            }else{
	            	if(isset($request->id) && $request->id != null){
	            		/**
			 * Separates Data for Both Tables
			 */


		    		$userData['password'] = Hash::make($userData['password']);
		    		if(!isset($request->password) && $request->password == ''){
		    			unset($userData['password']);
		    			unset($userData['confirm_password']);
		    			unset($userData['_token']);
		    		}else{
						unset($userData['confirm_password']);
		    			unset($userData['_token']);
					}
					//dd($userData);
		    		//dd($request->toArray());
		    		if(User::where([['id', '=', $request->id], ['role_id', '!=', '1']])->update($userData)){
						
						if(UserDetail::where('users_id', $request->id)->count() == '0'){
							$userDetailVoidEntry = new UserDetail(['users_id' => $request->id]);
							$userDetailVoidEntry->save();
						}
						
						if(UserDetail::where('users_id', $request->id)->update($userOtherData)){
		    				$request->session()->flash('message.level', 'info');
							$request->session()->flash('message.content', 'User Details are Updated Successfully !');
						}else{
							session()->flash('status', ['danger', 'Updation was Failed!']);	
						}
		    		}else{
		        		session()->flash('status', ['danger', 'Addition was Failed!']);
		        	}
		        	return redirect('/employee-edit/'.$request->id);
		        }else{
			
			//$saveUser = $request->toArray();
		    		$userData['password'] = Hash::make($userData['password']);
					/**
					 * Specimen's File uploading
					 */
					if( $request->hasFile('avatar_raw')) {
						$file = Input::file('avatar_raw');
						// Validate each file
						$rules = array('file' => 'required|mimes:png,gif,jpeg');
						$validator = Validator::make(array('file'=> $file), $rules);
						if($validator->passes()) {							
							$filename = 'avatar_'.time().'.'.$file->getClientOriginalName();
							$userData['avatar'] = '/uploads/employee/avatars/'.$filename;
							$upload_success = $file->move(public_path('uploads/employee/avatars'), $filename);
						} else {
							// redirect back with errors.
							return redirect('/employee')->withErrors($validator)->withInput();
						}
					}
					if( $request->hasFile('specimen_of_full_signature')) {
						$file = Input::file('specimen_of_full_signature');
						// Validate each file
						$rules = array('file' => 'required|mimes:png,gif,jpeg');
						$validator = Validator::make(array('file'=> $file), $rules);
						if($validator->passes()) {
							//$prodctGallery[$pG]['products_id'] = $productId;
							$userOtherData['specimen_of_full_signature'] = $filename = 'Emp_specimen_initial_'.time().'.'.$file->getClientOriginalName();
							$upload_success = $file->move(public_path('uploads/employee'), $filename);
						} else {
							// redirect back with errors.
							return redirect('/employee')->withErrors($validator)->withInput();
						}
					}
					//End of FIle Uploading

					$empSave = new User($userData);

		    		if($empSave->save()){
						/**
						 * Save User other Informations in the User_Details Table
						 */
						$userOtherData['users_id'] = $empSave->id;
						$userDetailsSave = new UserDetail($userOtherData);
						if($userDetailsSave->save()){
							$request->session()->flash('message.level', 'success');
							$request->session()->flash('message.content', 'User was successfully added!');
						}
		        	}else{
		        		session()->flash('status', ['danger', 'Addition of User Failed!']);
		        	}

	            }
	        }
			}
		}

// $result = DB::select($sql)->get();
// $resultArray = json_decode(json_encode($result), true);
// $result = $result->toArray();

		$customFields['basic'] = array(
			'separator_1' => array('type' => 'separator_start', 'label' => 'Employee Details'),
			'name'=>array('type' => 'text', 'label'=>'Employee Name','mandatory'=>true),
			'avatar_raw'=>array('type' => 'file', 'label'=>'Profile Photo',  'mandatory'=>false),
			'Address'=>array('type' => 'text', 'label'=>'Address','mandatory'=>false), 
			'office_address'=>array('type' => 'text', 'label'=>'Office Address','mandatory'=>false), 
			'separator_2' => array('type' => 'separator_end', 'label' => 'Employee Details'),

			'separator_3' => array('type' => 'separator_start', 'label' => 'Bank Account Details'),
			'mobile_number'=>array('type' => 'text', 'label'=>'Mobile Number','mandatory'=>false),
			'bank_account_name'=>array('type' => 'text', 'label'=>'Name as in Bank Account','mandatory'=>false),
			'bank_account_no'=>array('type' => 'text', 'label'=>'Bank Account Number','mandatory'=>false),
			'bank_ifsc_code'=>array('type' => 'text', 'label'=>'Bank IFSC code','mandatory'=>false),
			'separator_4' => array('type' => 'separator_end', 'label' => 'Bank Account Details'),

			'separator_5' => array('type' => 'separator_start', 'label' => 'Other Details'),
	        'department_name'=>array('type' => 'select', 'label' => 'Department Name', 'value' => array('' => '-- Select --', 'administrative' => 'Administrative','other' => 'Other'), 'mandatory'=>false),
			'role_id'=>array('type' => 'select', 'label'=>'Employee Designation', 'value' => $getRoles,'mandatory'=>false),
			'employee_gender'=>array('type' => 'select', 'label' => 'Gender', 'value'=> array('' =>'-- Select --','male'=>'Male','female'=> 'Female'), 'mandatory'=>false),
			'specimen_of_full_signature'=>array('type' => 'file', 'label'=>'Specimen of Signature','mandatory'=>false),
			'separator_6' => array('type' => 'separator_end', 'label' => 'Other Details'),

			
			'separator_7' => array('type' => 'separator_start', 'label' => 'Login Details'),
			'email'=>array('type' => 'text', 'label'=>'Email ID','mandatory'=>false),
			'password'=>array('type' => 'password', 'label'=>'Password','mandatory'=>false),
			'confirm_password'=>array('type' => 'password', 'label'=>'Confirm Password','mandatory'=>false),
			'password_hint'=>array('type' => 'text', 'label'=>'Password Hint','mandatory'=>false),
			'separator_8' => array('type' => 'separator_end', 'label' => 'Login Details'),

			
		);
		if(isset($view) && $view == 'view'){ $data['field_disable'] = true; }else{
		$data['field_disable'] = false;
		}
		$viewData=['otherLinks' => array('link' => url('/').'/employee-list', 'text' => 'Employee List'), 'customFields' => $customFields, 'data' => $data, 'formButton' => isset($id) ? 'Update Details' : 'Save Details', 'pageTitle' => isset($id) && $id != '' ? 'Edit Employee':'Add Employee'];
		$viewData['formHeaderMessage']="Please fill up necessary fields";
		return view('admin.user',$viewData )->with($getEmployeeDetails);
	}

	public function userList()
	{
		$users = User::where('role_id', '!=', '1')->orderBy('id', 'desc')->with('role')->get();
		$customFields['basic'] = array(
			'name'=>array('type' => 'text', 'label'=>'Employee Name','mandatory'=>false),
			'email'=>array('type' => 'text', 'label'=>'Email ID','mandatory'=>false),
    	);
		return view('admin.user-list', ['otherLinks' => array('link' => url('/').'/employee', 'text' => 'Add Employee'), 'pageTitle' => 'Employee List', 'users' => $users, 'customFields' => $customFields, 'loopInit' => '1']);
	}

	public function blockUser(Request $request, $bool = null, $uid = null)
	{
		$status = $bool == '1' ? 'Unblocked' : 'Blocked';
		if(isset($uid) && $uid !=''){
			if(User::where('id', Crypt::decrypt($uid))->update(['is_active' => $bool])){
				$request->session()->flash('message.level', 'success');
				$request->session()->flash('message.content', 'User was successfully '.$status.' !');
				return redirect()->back();
			}
		}
	}
	public function trashUser(Request $request, $bool = null, $uid = null)
	{
		$status = $bool == '0' ? 'removed from Trash' : 'Trashed';
		if(isset($uid) && $uid !=''){
			if(User::where('id', Crypt::decrypt($uid))->delete()){
				$request->session()->flash('message.level', 'success');
				$request->session()->flash('message.content', 'User was successfully '.$status.' !');
				return redirect()->back();
			}
		}
	}

	
}
