<!DOCTYPE html>
<html>
<head>
	<script src="{{ asset('js/jQuery.min.js') }}"></script>
	 <link rel="stylesheet" href="{{ asset('bootstrap-4.1.3/dist/css/bootstrap.css') }}">  
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<style>
	/*.image-slide-title {
          display: block !important;
          height: 100%;
          width: 100%;
          position: absolute;
          top: 1;
          z-index: 2000;
          font-family: "open sans";
          font-size: 100%;
          font-weight: 100;
          margin-bottom: 100px;
          line-height: 1.8;
          color: #333
        }*/

     /*@media screen and (max-width: 900px) {
          .image-slide-title {
              do what you want here 
             display: none !important;
          }
      }*/
      /*.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, 0.03);
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
.float-left {
    float: left !important;
}
.float-right {
    float: right !important;
}
  
.card-footer {
    padding: 0.75rem 1.25rem;
    background-color: rgba(0, 0, 0, 0.03);
    border-top: 1px solid rgba(0, 0, 0, 0.125);
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.card-footer:last-child {
    border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
}

.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}
.text-primary {
    color: #007bff !important;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    margin-bottom: 0.5rem;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.2;
    color: inherit;
}
h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: 0.5rem;
}
.container-fluid {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.text-center {
    text-align: center !important;
}*/
</style>
<title>Page Title</title>
</head>
<body>
	<table class="table-borderless" width="100%" style="width:100%;">
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			
			<td colspan="4" >&nbsp;</td>
			<td colspan="4" class="text-primary"> Sai Auto Care Workshop Detail</td>
			<td colspan="4" >&nbsp;</td>
			
		</tr>
		<tr>
			<td colspan="4">
				<table width="100%">
					<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Job Id</td>
				   		<td>:</td>
				   		<td>{{ $id }}</td>
				   		<td>&nbsp;</td>
				   	</tr>
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Job Name</td>
				   		<td>:</td>
				   		<td>{{ $name }}</td>
				   		<td>&nbsp;</td>
				   	</tr>
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Reference</td>
				   		<td>:</td>
				   		<td>{{ $reference }}</td>
				   		<td>&nbsp;</td>
				   	</tr>	
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Company</td>
				   		<td>:</td>
				   		<td>{{ $company }}</td>
				   		<td>&nbsp;</td>
				   	</tr>	
				</table>
		   </td>
		   <td colspan="4">&nbsp;</td>
		   <td colspan="4">
				<table width="90%">
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Job/Workshop Date</td>
				   		<td>:</td>
				   		<td>{{ $created_at }}</td>
				   		<td>&nbsp;</td>
				   	</tr>
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Email</td>
				   		<td>:</td>
				   		<td>{{ $email }}</td>
				   		<td>&nbsp;</td>
				   	</tr>	
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Contact Number</td>
				   		<td>:</td>
				   		<td>{{ $mobile }}{{ isset($landline)?"/".$landline:"" }}</td>
				   		<td>&nbsp;</td>
				   	</tr>	
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Address</td>
				   		<td>:</td>
				   		<td>{{ $address }}{{ isset($city)?", ".$city:"" }}{{ isset($state)?", ".$state:"" }}{{ isset($pin)?", ".$pin:"" }}</td>
				   		<td>&nbsp;</td>
				   	</tr>
			</table>
		   </td>			
		</tr>
		<tr>
			<td colspan="12">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
			<td colspan="4"  class="text-info"> Sai Auto Care Workshop Detail</td>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="12">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4">
				<table width="100%" >
					<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">GST Number</td>
				   		<td>:</td>
				   		<td>{{ $gst_no }}</td>
				   		<td>&nbsp;</td>
				   	</tr>
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Vehicle Reg Number</td>
				   		<td>:</td>
				   		<td>{{ $vehicle_reg_number }}</td>
				   		<td>&nbsp;</td>
				   	</tr>
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Model Year</td>
				   		<td>:</td>
				   		<td>{{ $model_year }}</td>
				   		<td>&nbsp;</td>
				   	</tr>	
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Vehical Company Name</td>
				   		<td>:</td>
				   		<td>{{ $company_name }}</td>
				   		<td>&nbsp;</td>
				   	</tr>	
				</table>
			</td>
			<td colspan="4">&nbsp;</td>
			<td colspan="4">
				<table width="100%">
					<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">GST Number</td>
				   		<td>:</td>
				   		<td>{{ $gst_no }}</td>
				   		<td>&nbsp;</td>
				   	</tr>
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Vehicle Reg Number</td>
				   		<td>:</td>
				   		<td>{{ $vehicle_reg_number }}</td>
				   		<td>&nbsp;</td>
				   	</tr>
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Model Year</td>
				   		<td>:</td>
				   		<td>{{ $model_year }}</td>
				   		<td>&nbsp;</td>
				   	</tr>	
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Vehical Company Name</td>
				   		<td>:</td>
				   		<td>{{ $company_name }}</td>
				   		<td>&nbsp;</td>
				   	</tr>	
				</table>
			</td>
			
		</tr>
		<tr>
			<td colspan="4">
				<table width="100%" >
					<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">GST Number</td>
				   		<td>:</td>
				   		<td>{{ $gst_no }}</td>
				   		<td>&nbsp;</td>
				   	</tr>
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Vehicle Reg Number</td>
				   		<td>:</td>
				   		<td>{{ $vehicle_reg_number }}</td>
				   		<td>&nbsp;</td>
				   	</tr>
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Model Year</td>
				   		<td>:</td>
				   		<td>{{ $model_year }}</td>
				   		<td>&nbsp;</td>
				   	</tr>	
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Vehical Company Name</td>
				   		<td>:</td>
				   		<td>{{ $company_name }}</td>
				   		<td>&nbsp;</td>
				   	</tr>	
				</table>
			</td>
			<td colspan="4">&nbsp;</td>
			<td colspan="4">
				<table width="100%">
				<tr>
			   		<td>&nbsp;</td>
			   		<td align="left">GST Number</td>
			   		<td>:</td>
			   		<td>{{ $gst_no }}</td>
			   		<td>&nbsp;</td>
			   	</tr>
			   	<tr>
			   		<td>&nbsp;</td>
			   		<td align="left">Vehicle Reg Number</td>
			   		<td>:</td>
			   		<td>{{ $vehicle_reg_number }}</td>
			   		<td>&nbsp;</td>
			   	</tr>
			   	<tr>
			   		<td>&nbsp;</td>
			   		<td align="left">Model Year</td>
			   		<td>:</td>
			   		<td>{{ $model_year }}</td>
			   		<td>&nbsp;</td>
			   	</tr>	
			   	<tr>
			   		<td>&nbsp;</td>
			   		<td align="left">Vehical Company Name</td>
			   		<td>:</td>
			   		<td>{{ $company_name }}</td>
			   		<td>&nbsp;</td>
			   	</tr>	
			</table>
			</td>
			
		</tr>
		<tr>
			<td>
				<table width="100%">
					<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Notes</td>
				   		<td>:</td>
				   		<td>{{ $notes }}</td>
				   		<td>&nbsp;</td>
				   		<td>&nbsp;</td>
				   		<td align="left">Expected Price</td>
				   		<td>:</td>
				   		<td>{{ $expected_price }}</td>
				   		<td>&nbsp;</td>
				   		<td>&nbsp;</td>
				   		<td align="left">Submited Part</td>
				   		<td>:</td>
				   		<td>{{ $submited_part }}</td>
				   		<td>&nbsp;</td>
				   		<td>&nbsp;</td>
				   		<td align="left">Others Submited Part</td>
				   		<td>:</td>
				   		<td>{{ $others_submited_part }}</td>
				   		<td>&nbsp;</td>
				   </tr>	
				</table>
			</td>	
		</tr>



	</table>
	
</body>
<script src="{{ asset('bootstrap-4.1.3/dist/js/bootstrap.js') }}"></script>
</html>
