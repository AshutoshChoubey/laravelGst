<!DOCTYPE html>
<html>
<head>
	<script src="{{ asset('js/jQuery.min.js') }}"></script>
	 <link rel="stylesheet" href="{{ asset('bootstrap-4.1.3/dist/css/bootstrap.css') }}">  
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	    {{-- /*
 *  File Name              :
 *  Type                   :   
 *  Description            :   
 *  Author                 : Ashtosh Kumar Choubey
 *  Contact                : 9658476170
 *  Email                  : ashutoshphoenixsoft@gmail.com
 *  Date                   : 12/12/2018  
 *  Modified By            :       
 *  Date of Modification   :     
 *  Purpose of Modification: 
 * 
 */ --}}
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
	<section style="margin-left: 30px;margin-right: 30px;">
		<table  style="display: table-col; border: 1px solid #000;"    width="100%" style="width:100%;">
			<!-- <tr style="border: 0px" >
				<td width="5%">&nbsp;</td>
				<td width="9%">&nbsp;</td>
				<td width="9%">&nbsp;</td>
				<td width="9%">&nbsp;</td>
				<td width="9%">&nbsp;</td>
				<td width="9%">&nbsp;</td>
				<td width="9%">&nbsp;</td>
				<td width="9%">&nbsp;</td>
				<td width="9%">&nbsp;</td>
				<td width="9%">&nbsp;</td>
				<td width="5%">&nbsp;</td>
			</tr> -->
			<tr style="display: table-row; border: 1px solid #000;">
				
				<!-- <td colspan="4" >&nbsp;</td> -->
				<td colspan="12" class="text-primary text-center"> Sai Auto Care Workshop Detail</td>
				<!-- <td colspan="4" >&nbsp;</td> -->
				
			</tr>
			<tr>
				<td colspan="4">
					<table    width="100%">
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
			   <td style="border-left:  1px solid #000;" colspan="2">&nbsp;</td>
			   <td colspan="6">
					<table    width="90%">
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
			    <!-- <td colspan="2">&nbsp;</td>		 -->
			</tr>
			<tr>
				<td colspan="12">&nbsp;</td>
			</tr>
			<tr style="display: table-row; border: 1px solid #000;">
				<!-- <td colspan="4">&nbsp;</td> -->
				<td colspan="12"  class="text-info text-center"> Vehical Detail</td>
				<!-- <td colspan="4">&nbsp;</td> -->
			</tr>
			<tr>
				<td colspan="12">&nbsp;</td>
			</tr>
			<tr>

				<td    colspan="4">
					<table    width="100%" >
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
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Odometer Reading</td>
					   		<td>:</td>
					   		<td>{{ $odometer_reading }}</td>
					   		<td>&nbsp;</td>
					   	</tr>
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Fuel Type</td>
					   		<td>:</td>
					   		<td>{{ $fuel_type }}</td>
					   		<td>&nbsp;</td>
					   	</tr>
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">color</td>
					   		<td>:</td>
					   		<td>{{ $color }}</td>
					   		<td>&nbsp;</td>
					   	</tr>	
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Engine Number</td>
					   		<td>:</td>
					   		<td>{{ $engine_number }}</td>
					   		<td>&nbsp;</td>
					   	</tr>	
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Submited Part</td>
					   		<td>:</td>
					   		<td>{{ $submited_part }}</td>
					   		<td>&nbsp;</td>
					   	</tr>
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Advisor</td>
					   		<td>:</td>
					   		<td>{{ $advisor }}</td>
					   		<td>&nbsp;</td>
					   	</tr>
					</table>
				</td>
				<td colspan="1" style="border-left:  1px solid #000;" >&nbsp;</td>
				<td    colspan="7">
					<table    width="100%">
						<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Model Name</td>
					   		<td>:</td>
					   		<td>{{ $model_number }}</td>
					   		<td>&nbsp;</td>
					   	</tr>
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Brand</td>
					   		<td>:</td>
					   		<td>{{ $brand }}</td>
					   		<td>&nbsp;</td>
					   	</tr>
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">VIN</td>
					   		<td>:</td>
					   		<td>{{ $vin }}</td>
					   		<td>&nbsp;</td>
					   	</tr>	
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Reg Number</td>
					   		<td>:</td>
					   		<td>{{ $reg_number }}</td>
					   		<td>&nbsp;</td>
					   	</tr>	
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Key Number</td>
					   		<td>:</td>
					   		<td>{{ $key_number }}</td>
					   		<td>&nbsp;</td>
					   	</tr>
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Due In</td>
					   		<td>:</td>
					   		<td>{{ $due_in }}</td>
					   		<td>&nbsp;</td>
					   	</tr>
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Due Out</td>
					   		<td>:</td>
					   		<td>{{ $due_out }}</td>
					   		<td>&nbsp;</td>
					   	</tr>	
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Status</td>
					   		<td>:</td>
					   		<td>{{ $status }}</td>
					   		<td>&nbsp;</td>
					   	</tr>	

					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Notes</td>
					   		<td>:</td>
					   		<td>{{ $notes }}</td>
					   		<td>&nbsp;</td>
					   	</tr>	
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Expected Price</td>
					   		<td>:</td>
					   		<td>{{ $expected_price }}</td>
					   		<td>&nbsp;</td>
					   	</tr>	
					</table>
				</td>
				
			</tr>
			<tr style="display: table-row; border: 1px solid #000;">
				<td colspan="12" class="text-success text-center"> Expected Price</td>			
			</tr>
			<tr>
				<td  colspan="4">
					<table    width="100%" >

						<thead>
							<tr><td align="center" colspan="2">Services</td></tr>
							<tr>
								<th>Service Name</th>
								<th>Price</th>
							</tr>
							
							<!-- <th></th> -->
							
						</thead>
						<tbody>
							@php
							$total_service_price=0;
							$total_product_price=0;
							$grandTotal=0;

							@endphp
							@foreach($WorkshopService as $value)
							<tr>
								<td>{{  $value->service_name }}</td>								
								<td>{{  $value->service_price }}</td>
							</tr>
							@php
								$total_service_price+=$value->service_price;
							@endphp
							@endforeach
						</tbody>
						<tfoot>
							<tr><td colspan="2" align="center" >Total Service Price : {{ $total_service_price }}</td></tr>
							
						</tfoot>
						<!-- <tr>
							<td width="10">&nbsp;</td>
							<td width="40">&nbsp;</td>
							<td width="5">&nbsp;</td>
							<td width="40">&nbsp;</td>
							<td width="10">&nbsp;</td>
						</tr> -->
						<!-- <tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Odometer Reading</td>
					   		<td>:</td>
					   		<td>{{ $odometer_reading }}</td>
					   		<td>&nbsp;</td>
					   	</tr>
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Fuel Type</td>
					   		<td>:</td>
					   		<td>{{ $fuel_type }}</td>
					   		<td>&nbsp;</td>
					   	</tr>
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">color</td>
					   		<td>:</td>
					   		<td>{{ $color }}</td>
					   		<td>&nbsp;</td>
					   	</tr>	
					   	<tr>
					   		<td>&nbsp;</td>
					   		<td align="left">Engine Number</td>
					   		<td>:</td>
					   		<td>{{ $engine_number }}</td>
					   		<td>&nbsp;</td>
					   	</tr>	 -->
					</table>
					
				</td>
				<td colspan="1" style="border-left:  1px solid #000;" >&nbsp;</td>
				<td  colspan="7">
					<table    width="100%">
						
						<thead>
							<tr><td align="center" colspan="2">Products</td></tr>
							<tr>
								<th>Service Name</th>
								<th>Product Quantitty</th>
								<th>Unit Product Price</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							@foreach($WorkshopProduct as $value)
							<tr>
								<td>{{ $value->product_name }}</td>
								<td>{{ $value->product_quantity }} </td>
								<td>{{ $value->product_price }} </td>
								<td>{{ $value->product_price*$value->product_quantity }}</td>
							</tr>
							@php

							$total_product_price+=$value->product_price;
							@endphp
							@endforeach
						</tbody>
						<tfoot>
							<tr><td colspan="2" align="center"> Total Product Price : {{ $total_product_price }}</td></tr>
						</tfoot>
					<!-- <tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Key Number</td>
				   		<td>:</td>
				   		<td>{{ $key_number }}</td>
				   		<td>&nbsp;</td>
				   	</tr>
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Due In</td>
				   		<td>:</td>
				   		<td>{{ $due_in }}</td>
				   		<td>&nbsp;</td>
				   	</tr>
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Due Out</td>
				   		<td>:</td>
				   		<td>{{ $due_out }}</td>
				   		<td>&nbsp;</td>
				   	</tr>	
				   	<tr>
				   		<td>&nbsp;</td>
				   		<td align="left">Status</td>
				   		<td>:</td>
				   		<td>{{ $status }}</td>
				   		<td>&nbsp;</td>
				   	</tr>	 -->
				</table>
				</td>
				
			</tr>
			<tr style="display: table-row; border: 1px solid #000;">
				<td align="center" colspan="12">
					Grand Total: {{ $total_product_price+$total_service_price }}
				</td>	
			</tr>



		</table>
	</section>
</body>
<script src="{{ asset('bootstrap-4.1.3/dist/js/bootstrap.js') }}"></script>
</html>
