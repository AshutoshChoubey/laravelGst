<!DOCTYPE html>
<html>
	<head>
		<title>Sale Invoice</title>
		<style>
			/* border: 1px solid black;*/
		</style>
	</head>	
	<body>
		{{-- <table  width="100%" height="100%" border="1"> --}}
			<div style="width:100%;height:57px;" >
				<table  width="100%" rules="cols" border="1">
					<tr>
						<td width="30%" >
							<div>
								&nbsp;
							</div>
						</td>
						<td width="70%" align="center" >
							<div>
								<b>Phoenix Software Solution</b><br>
								Bhumikhal,jayadurga nager<br>
								GSTIN:-52541255<br>
							</div>
						</td>
					</tr>				
				</table>
			</div>
			{{-- <div style="width:100%;height:70px; border: 1px solid black;" >
				<table style="width:100%;height:57px;"   >
					<tr>
						<td align="center" >
							<b>Consignment Details</b><br><br>
						</td>							
					</tr>	
					<tr>
						<td align="left" >
							Notes:-
						</td>							
					</tr>			
				</table>
			</div> --}}
			<div>
				<table style="width:100%;height:57px;"   >
					<tr>
						<td >&nbsp;</td>
						<td >&nbsp;</td>
						<td >&nbsp;</td>
						<td >&nbsp;</td>
						<td >&nbsp;</td>
						<td >&nbsp;</td>
						<td >&nbsp;</td>
						<td >&nbsp;</td>
						<td >&nbsp;</td>
						<td >&nbsp;</td>
						<td >&nbsp;</td>
						<td >&nbsp;</td>							
					</tr>	
					<tr>
						<td colspan="12" align="center" >
							<b>Customer Details</b><br><br>
						</td>							
					</tr>	
					<tr>
						<td colspan="1">&nbsp;</td>
						<td colspan="5" align="left">
							<table  width="100%">
								<tr>
									<td width="50%">Sale Invoice Id :</td>
									<td width="50%" align="left">{{ $saleInvoice['id'] }}</td>
								</tr>
								<tr>
									<td width="50%">Sale Entery Date :</td>
									<td width="50%" align="left">{{ $saleInvoice['created_at'] }}</td>
								</tr>
								<tr>
									<td width="50%">Sale Discription:</td>
									<td width="50%" align="left">{{ $saleInvoice['sale_discription'] }}</td>
								</tr>
								<tr>
									<td width="30%">Sale Paid Amount:</td>
									<td width="70%" align="left">{{ $saleInvoice['sale_due_amount'] }}</td>
								</tr>
								<tr>
									<td width="30%">Customer Name:</td>
									<td width="70%" align="left">{{ $saleInvoice['customer_name'] }}</td>
								</tr>
								
								
							</table>
						</td>						
						<td colspan="5" align="right">
							<table  width="100%">
								{{-- <tr>
									<td width="50%">Bill Number :</td>
									<td width="50%" align="left">{{ $saleInvoice['purchase_invoice_number'] }}</td>
								</tr> --}}
								{{-- <tr>
									<td width="50%">Bill Date:</td>
									<td width="50%" align="left">{{ $saleInvoice['purchase_invoice_date'] }}</td>
								</tr> --}}
								<tr>
									<td width="30%">Customer Mobile Number:</td>
									<td width="70%" align="left">{{ $saleInvoice['customer_contact_number'] }}</td>
								</tr>
								<tr>
									<td width="50%">Customer GSTIN:</td>
									<td width="50%" align="left">{{ $saleInvoice['customer_gstin'] }}</td>
								</tr>
								<tr>
									<td width="50%">Sale Invoice Amount:</td>
									<td width="50%" align="left">{{ number_format ($saleInvoice['total_sale_amount'],2) }}</td>
								</tr>
								<tr>
									<td width="50%">Customer Address:</td>
									<td width="50%" align="left" style="word-wrap:break-word;"><small>{{ $saleInvoice['customer_address']  }}</small></td>
								</tr>
								<tr>
									<td width="50%">Customer Email:</td>
									<td width="50%" align="left">{{ $saleInvoice['customer_email'] }}</td>
								</tr>
								
							</table>
						</td>
						<td colspan="1">&nbsp;</td>
											
					</tr>		
				</table>

				<table border="1" rules="cols" width="100%">
					<thead >
						<tr><th colspan="16" align="center">Product Details</th></tr>
						<tr><th colspan="16" align="center">&nbsp;</th></tr>
						<tr style="border: 1px solid black;">
							<th>Sl#</th>
							<th>Product Id</th>
							<th>Product Name</th>
							<th>Product Code</th>
							{{-- <th>Product Discription</th> --}}
							<th>Product HSN</th>
							<th>Product SGST %</th>
							<th>Product CGST %</th>
							<th>Product IGST %</th>
							<th>Product GST %</th>
							<th>Product Quantity</th>
							<th><small>Product Price Without GST</small></th>
							<th><small>Product Price With GST</small></th>
							{{-- <th><small>Product Total Amount</small></th> --}}
							<th><small>Product Tax Amount Per Unit</small></th>
							<th><small>Product Tax Amount </small></th>
							<th><small>Total Product  Amount </small></th>
						</tr>
					</thead>
					<tbody style="border: 1px solid black;">
						@php
							$TotalPriceWithoutTax=0;
							$TotalPriceWitTax=0;
							$TotalTaxAmount=0;
						@endphp	
						@foreach($purchaseProduct as $key=>$value)
						<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $value->productId }}</td>
								<td>{{ $value->productName }}</td>
								<td>{{ $value->product_code }}</td>
								{{-- <td>{{ $value->product_discription }}</td> --}}
								<td>{{ $value->product_hsn }}</td>
								<td>{{ $value->product_sgst }}</td>
								<td>{{ $value->product_cgst }}</td>
								<td>{{ $value->product_igst }}</td>
								<td>{{ $value->product_gst }}</td>
								<td>{{ $value->product_quantity }}</td>
								<td>{{ $value->product_price_withoutgst }}</td>
								<td>{{ $value->product_price_withgst }}</td>
								{{-- <td>{{ $value->product_total_amount }}</td> --}}
								<td>{{ $value->product_price_withgst-$value->product_price_withoutgst }}</td>
								<td>{{  $value->product_price_withgst* $value->product_quantity-$value->product_price_withoutgst* $value->product_quantity }}</td>
								<td>{{ $value->product_total_amount }}</td>
								{{-- <td>{{ $value->product_total_tax_amount+$value->product_total_amount }}</td> --}}
								@php
									$TotalPriceWithoutTax+= $value->product_total_amount;
									// $TotalPriceWitTax+=$value->product_total_tax_amount+$value->product_total_amount;
									$TotalTaxAmount+=$value->product_price_withgst* $value->product_quantity-$value->product_price_withoutgst* $value->product_quantity;
								@endphp	
							
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td align="right" colspan="16"><b>Total Tax: &emsp;{{ $TotalTaxAmount  }}</b></td>
						</tr>
						<tr>
							<td align="right" colspan="16"><b>Grand Total : &emsp; {{ $TotalPriceWithoutTax }}</b></td>
						</tr>
						{{-- <tr>
							<td align="right" colspan="16"><b>Grand Total WithTax: &emsp; {{ $TotalPriceWitTax }}</b></td>
						</tr> --}}
						
					</tfoot>
				</table>
			</div>
		{{-- </table> --}}
	</body>
</html>