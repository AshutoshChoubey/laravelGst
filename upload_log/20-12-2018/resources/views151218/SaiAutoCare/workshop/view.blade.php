<!DOCTYPE html>
<html>
<head>
	<script src="{{ asset('js/jQuery.min.js') }}"></script>
	 <link rel="stylesheet" href="{{ asset('bootstrap-4.1.3/dist/css/bootstrap.css') }}">  
<title>Page Title</title>
</head>
<body>
<div class="content small">
	<div class="card text-center">
	  <div class="card-header text-primary">
	    Sai Auto Care Workshop Detail
	  </div>
	  <div class="card-body">
	   
	<div class="row ">
		<div class="col-md-3 float-left ">
			<table width="100%">
				<tr>
			   		<td></td>
			   		<td align="left">Job Id</td>
			   		<td>:</td>
			   		<td>{{ $id }}</td>
			   		<td></td>
			   	</tr>
			   	<tr>
			   		<td></td>
			   		<td align="left">Job Name</td>
			   		<td>:</td>
			   		<td>{{ $name }}</td>
			   		<td></td>
			   	</tr>
			   	<tr>
			   		<td></td>
			   		<td align="left">Reference</td>
			   		<td>:</td>
			   		<td>{{ $reference }}</td>
			   		<td></td>
			   	</tr>	
			   	<tr>
			   		<td></td>
			   		<td align="left">Company</td>
			   		<td>:</td>
			   		<td>{{ $company }}</td>
			   		<td></td>
			   	</tr>	
			</table>
		</div>
		<div class="col-md-6 float-right">
		</div>
		<div class="col-md-3 float-right">
			<table width="100%">
			   	<tr>
			   		<td></td>
			   		<td align="left">Job/Workshop Date</td>
			   		<td>:</td>
			   		<td>{{ $created_at }}</td>
			   		<td></td>
			   	</tr>
			   	<tr>
			   		<td></td>
			   		<td align="left">Email</td>
			   		<td>:</td>
			   		<td>{{ $email }}</td>
			   		<td></td>
			   	</tr>	
			   	<tr>
			   		<td></td>
			   		<td align="left">Contact Number</td>
			   		<td>:</td>
			   		<td>{{ $mobile }}{{ isset($landline)?"/".$landline:"" }}</td>
			   		<td></td>
			   	</tr>	
			   	<tr>
			   		<td></td>
			   		<td align="left">Address</td>
			   		<td>:</td>
			   		<td>{{ $address }}{{ isset($city)?", ".$city:"" }}{{ isset($state)?", ".$state:"" }}{{ isset($pin)?", ".$pin:"" }}</td>
			   		<td></td>
			   	</tr>
			</table>
		</div>
	</div>
	<hr/>
	<div class="row">
			<div class="col-md-12 ">
		<div class="card">
			<div class="card-header">
				<h4 class="text-primary">Vehical Detail</h4>
		</div>
				
			
			<div class="card-body">
				<div class="col-md-3 float-left ">
				
			<table width="100%">
				<tr>
			   		<td></td>
			   		<td align="left">GST Number</td>
			   		<td>:</td>
			   		<td>{{ $gst_no }}</td>
			   		<td></td>
			   	</tr>
			   	<tr>
			   		<td></td>
			   		<td align="left">Vehicle Reg Number</td>
			   		<td>:</td>
			   		<td>{{ $vehicle_reg_number }}</td>
			   		<td></td>
			   	</tr>
			   	<tr>
			   		<td></td>
			   		<td align="left">Model Year</td>
			   		<td>:</td>
			   		<td>{{ $model_year }}</td>
			   		<td></td>
			   	</tr>	
			   	<tr>
			   		<td></td>
			   		<td align="left">Vehical Company Name</td>
			   		<td>:</td>
			   		<td>{{ $company_name }}</td>
			   		<td></td>
			   	</tr>	
			</table>
		</div>
		<div class="col-md-3 float-left ">
			<table width="100%">
				<tr>
			   		<td></td>
			   		<td align="left">Model Number</td>
			   		<td>:</td>
			   		<td>{{ $model_number }}</td>
			   		<td></td>
			   	</tr>
			   	<tr>
			   		<td></td>
			   		<td align="left">VIN</td>
			   		<td>:</td>
			   		<td>{{ $vin }}</td>
			   		<td></td>
			   	</tr>
			   	<tr>
			   		<td></td>
			   		<td align="left">Reg Number</td>
			   		<td>:</td>
			   		<td>{{ $reg_number }}</td>
			   		<td></td>
			   	</tr>	
			   	<tr>
			   		<td></td>
			   		<td align="left">Odometer Reading</td>
			   		<td>:</td>
			   		<td>{{ $odometer_reading }}</td>
			   		<td></td>
			   	</tr>	
			</table>
				
			</div>
			<!-- id ,name,reference,company,gst_no,mobile,landline,email,address,city,state,pin,vehicle_reg_number,model_year,company_name,model_number,vin,reg_number,odometer_reading,color,fuel_type,engine_number,key_number,due_in,due_out,
	status,advisor,notes,expected_price,submited_part,others_submited_part,deleted_at,created_at,updated_at

	    -->
	    <div class="col-md-3 float-left ">
			<table width="100%">
				<tr>
			   		<td></td>
			   		<td align="left">Color</td>
			   		<td>:</td>
			   		<td>{{ $color }}</td>
			   		<td></td>
			   	</tr>
			   	<tr>
			   		<td></td>
			   		<td align="left">Fuel Type</td>
			   		<td>:</td>
			   		<td>{{ $fuel_type }}</td>
			   		<td></td>
			   	</tr>
			   	<tr>
			   		<td></td>
			   		<td align="left">Engine Number</td>
			   		<td>:</td>
			   		<td>{{ $engine_number }}</td>
			   		<td></td>
			   	</tr>	
			   	<tr>
			   		<td></td>
			   		<td align="left">Key Number</td>
			   		<td>:</td>
			   		<td>{{ $key_number }}</td>
			   		<td></td>
			   	</tr>	
			</table>
				
			</div>

	    <div class="col-md-3 float-left ">
			<table width="100%">
				<tr>
			   		<td></td>
			   		<td align="left">Due In</td>
			   		<td>:</td>
			   		<td>{{ $due_in }}</td>
			   		<td></td>
			   	</tr>
			   	<tr>
			   		<td></td>
			   		<td align="left">Due Out</td>
			   		<td>:</td>
			   		<td>{{ $due_out }}</td>
			   		<td></td>
			   	</tr>
			   	<tr>
			   		<td></td>
			   		<td align="left">Status</td>
			   		<td>:</td>
			   		<td>{{ $status }}</td>
			   		<td></td>
			   	</tr>	
			   	<tr>
			   		<td></td>
			   		<td align="left">Advisor</td>
			   		<td>:</td>
			   		<td>{{ $advisor }}</td>
			   		<td></td>
			   	</tr>	
			</table>
				
			</div>
		</div>
			<div class="card-footer">
				<!-- id ,name,reference,company,gst_no,mobile,landline,email,address,city,state,pin,vehicle_reg_number,model_year,company_name,model_number,vin,reg_number,odometer_reading,color,fuel_type,engine_number,key_number,due_in,due_out,
	status,advisor,notes,expected_price,submited_part,others_submited_part,deleted_at,created_at,updated_at

	    -->
	    <div class="col-md-12 float-center ">
			<table width="100%">
				<tr>
			   		<td></td>
			   		<td align="left">Notes</td>
			   		<td>:</td>
			   		<td>{{ $notes }}</td>
			   		<td></td>
			   		<td></td>
			   		<td align="left">Expected Price</td>
			   		<td>:</td>
			   		<td>{{ $expected_price }}</td>
			   		<td></td>
			   		<td></td>
			   		<td align="left">Submited Part</td>
			   		<td>:</td>
			   		<td>{{ $submited_part }}</td>
			   		<td></td>
			   		<td></td>
			   		<td align="left">Others Submited Part</td>
			   		<td>:</td>
			   		<td>{{ $others_submited_part }}</td>
			   		<td></td>
			   </tr>	
			</table>
				
			</div>
			</div>
			
		</div>
	</div>
	</div>
	  </div>
	  <div class="card-footer text-muted">
	   Address
	  </div>
	</div>
</div>
</body>
<script src="{{ asset('bootstrap-4.1.3/dist/js/bootstrap.js') }}"></script>
</html>
