<!DOCTYPE html>
<html>
	<head>
		<title>Purchase Invoice</title>
		<style>
			/* border: 1px solid black;*/
		</style>
	</head>	
	<style>
		
@media print {
  
        background-color: #1a4567 !important;
        -webkit-print-color-adjust: exact; 
  
}

	</style>
	<body style="font-family: Calibri, sans-serif;font-size: 12px">
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
			<div style="width:100%;height:70px; border: 1px solid black;" >
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
			</div>
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
							<b>Supplier Details</b><br><br>
						</td>							
					</tr>	
					<tr>
						<td colspan="1">&nbsp;</td>
						<td colspan="5" align="left">
							<table  width="100%">
								<tr>
									<td width="50%">Purchase Invoice Id :</td>
									<td width="50%" align="left">{{ $purchaseInvoice['purchaseInvoiceId'] }}</td>
								</tr>
								<tr>
									<td width="50%">Purchase Entery Date :</td>
									<td width="50%" align="left">{{ $purchaseInvoice['created_at'] }}</td>
								</tr>
								<tr>
									<td width="50%">Purchase Discription:</td>
									<td width="50%" align="left">{{ $purchaseInvoice['purchase_discription'] }}</td>
								</tr>
								<tr>
									<td width="30%">Purchase Paid Amount:</td>
									<td width="70%" align="left">{{ $purchaseInvoice['purchase_due_amount'] }}</td>
								</tr>
								<tr>
									<td width="30%">Supplier Name:</td>
									<td width="70%" align="left">{{ $purchaseInvoice['supplier_name'] }}</td>
								</tr>
								<tr>
									<td width="30%">Supplier Mobile Number:</td>
									<td width="70%" align="left">{{ $purchaseInvoice['mob_num'] }}</td>
								</tr>
								
							</table>
						</td>						
						<td colspan="5" align="right">
							<table  width="100%">
								<tr>
									<td width="50%">Bill Number :</td>
									<td width="50%" align="left">{{ $purchaseInvoice['purchase_invoice_number'] }}</td>
								</tr>
								<tr>
									<td width="50%">Bill Date:</td>
									<td width="50%" align="left">{{ $purchaseInvoice['purchase_invoice_date'] }}</td>
								</tr>
								<tr>
									<td width="50%">Bill Amount:</td>
									<td width="50%" align="left">{{ $purchaseInvoice['purchase_invoice_amount'] }}</td>
								</tr>
								<tr>
									<td width="50%">Purchase Invoice Amount:</td>
									<td width="50%" align="left">{{ number_format ($purchaseInvoice['total_purchase_amount'],2) }}</td>
								</tr>
								<tr>
									<td width="50%">Supplier Address:</td>
									<td width="50%" align="left" style="word-wrap:break-word;"><small>{{ $purchaseInvoice['address']  }}</small></td>
								</tr>
								<tr>
									<td width="50%">Supplier Email:</td>
									<td width="50%" align="left">{{ $purchaseInvoice['email'] }}</td>
								</tr>
								
							</table>
						</td>
						<td colspan="1">&nbsp;</td>
											
					</tr>		
				</table>

				<table border="1" rules="cols" width="100%">
					<thead >
						<tr><th colspan="21" align="center">Product Returned  Details</th></tr>
						<tr><th colspan="21" align="center">&nbsp;</th></tr>
						<tr style="border: 1px solid black;">
							<th rowspan="2" scope="col" >Sl#</th>
							{{-- <th rowspan="2" scope="col" >Prod. Id</th> --}}
							<th rowspan="2" scope="col" >Prod. Name</th>
							{{-- <th rowspan="2" scope="col"  >Prod. Code</th> --}}
							<th rowspan="2" scope="col"  >Returned Discription</th>
							<th rowspan="2" scope="col"  >Prod. HSN</th>
							{{-- <th rowspan="2" scope="col"  >SGST %</th>
							<th rowspan="2" scope="col"  >CGST %</th>
							<th rowspan="2" scope="col"  >IGST %</th>
							<th rowspan="2" scope="col"  >GST %</th> --}}
							<th rowspan="2" scope="col"  ><small>Returned Qty</small></th>
							<th rowspan="2" scope="col"  ><small>Price Without GST</small></th>
							<th rowspan="2" scope="col"  ><small>Price With GST</small></th>
							<th rowspan="2"  scope="col" ><small>Discount %</small></th>
							<th rowspan="2" scope="col"  ><small>Discount </small></th>
							{{-- <th><small>Product Total Amount</small></th> --}}
							<th rowspan="2" scope="col" ><small>Tax Amount<small></th>
							<th   scope="col" colspan="2">CGST</th>
							<th   scope="col" colspan="2">SGST</th>
							<th   scope="col" colspan="2">IGST</th>
							<th   scope="col" colspan="2">GST</th>
							<th rowspan="2"  >Total</th>
							{{-- <th ><small>Tax Amount Per Unit</small></th> --}}
							{{-- <th><small>Tax Amount Per Unit</small></th> --}}
							{{-- <th><small>Product Tax Amount </small></th>
							<th><small>Total Product  Amount </small></th> --}}
						</tr>
						<tr style="border: 1px solid black;">						
							
							<th scope="row">Rate</th>
							<th >Amount	</th>							
							<th scope="row">Rate</th>
							<th >Amount	</th>
							<th scope="row">Rate</th>
							<th >Amount	</th>	
							<th scope="row">Rate</th>
							<th >Amount	</th>
							
							</tr>					
					</thead>
					<tbody style="border: 1px solid black;">
						@php
							$TotalReturned= 0;
							$TotalPertantageDiscount= 0;
							$TotalDiscount=0;
							$TotalProductTax=0;
							$TotalPriceWitTax=0;
							$TotalTaxAmount=0;
							$TotalCGST=0;
							$TotalSGST=0;
							$TotalIGST=0;
							$TotalGST=0;
							$GrandTotalPrice=0;

							// $TotalPriceWithoutTax=0;
							// $TotalPriceWitTax=0;
							// $TotalTaxAmount=0;

							// $productId=0;
							// $purchaseProduct
							// $object = new stdClass();
							// $object =  array();
							// foreach($purchaseProduct as $key=>$value)
							// {
							// 	echo "if($productId==0 || $value->productId!=$productId)<br/>";
							// 	if($productId==0 || $value->productId!=$productId)
							// 	{
							// 		$object[$key]=(array)$value;
							// 		$object[$key]['returnedQuantity']+=$value->returnedQuantity;
							// 		$productId=$value->productId;
							// 		echo "hii<br>";
									
							// 	}
							// }
							// $purchaseProduct=$object;
							// print_r($purchaseProduct[0]);
							// exit;
						@endphp	
					{{-- 	@for($i=0;count($purchaseProduct)>$i;$i++)
							@php
								$purchaseProduct=(object)$purchaseProduct
							@endphp --}}
						@foreach($purchaseProduct as $key=>$value)
						<tr>
							
								<td>{{ $loop->iteration }}</td>
								{{-- <td>{{ $value->productId }}</td> --}}
								<td>{{ $value->productName }}</td>
								{{-- <td>{{ $value->product_code }}</td> --}}
								<td>{{ $value->comments }}</td>
								<td>{{ $value->product_hsn }}</td>
								{{-- <td>{{ $value->product_sgst }}</td>
								<td>{{ $value->product_cgst }}</td>
								<td>{{ $value->product_igst }}</td>
								<td>{{ $value->product_gst }}</td> --}}
								<td>{{ $value->returnedQuantity }}</td>
								<td>{{ $value->product_price_withoutgst }}</td>
								<td>{{ $value->product_price_withgst }}</td>
								<td>{{ $value->product_discount_in_perce }}</td>
								<td>{{ $value->product_discount }}</td>
								
								{{-- <td>{{ $value->product_total_amount }}</td> --}}
								<td>{{ $value->product_tax_amount }}</td>
							
									
										<td>{{ $value->product_cgst }}</td>
										<td>{{ (($value->product_price_withoutgst)*($value->product_cgst)/100) }}</td>
										<td>{{ $value->product_sgst }}</td>
										<td>{{ (($value->product_price_withoutgst)*($value->product_sgst)/100) }}</td>
										<td>{{ $value->product_igst }}</td>
										<td>{{ (($value->product_price_withoutgst)*($value->product_igst)/100) }}</td>
										<td>{{ $value->product_gst }}</td>
										<td>{{ (($value->product_price_withoutgst)*($value->product_gst)/100) }}</td>
									<td>{{ $value->product_price_withoutgst+(($value->product_price_withoutgst)*($value->product_gst)/100) }}</td>
							
								{{-- <td>{{ $value->product_total_tax_amount }}</td>
								<td>{{ $value->product_total_amount }}</td> --}}
								{{-- <td>{{ $value->product_total_tax_amount+$value->product_total_amount }}</td> --}}
								@php
									$TotalReturned+= $value->returnedQuantity;
									$TotalPertantageDiscount+= $value->product_discount_in_perce;
									$TotalDiscount+= $value->product_discount ;
									$TotalProductTax+=$value->product_tax_amount ;
									$TotalPriceWitTax+=$value->product_total_tax_amount+$value->product_total_amount;
									$TotalTaxAmount+=$value->product_total_tax_amount;

									$TotalCGST+=(($value->product_price_withoutgst)*($value->product_cgst)/100);
									$TotalSGST+=(($value->product_price_withoutgst)*($value->product_sgst)/100);
									$TotalIGST+= (($value->product_price_withoutgst)*($value->product_igst)/100);
									$TotalGST+= (($value->product_price_withoutgst)*($value->product_gst)/100);
									$GrandTotalPrice+= $value->product_price_withoutgst+(($value->product_price_withoutgst)*($value->product_gst)/100);
									
								@endphp	
							
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr  style="border: 1px solid black; font-weight: bold">							
							<td colspan="4"><b>Grand Total</b></td>				
							<td>{{ $TotalReturned }}</td>
							<td></td>
							<td></td>
							<td>{{ $TotalPertantageDiscount }}</td>
							<td>{{ $TotalDiscount }}</td>
							<td>{{ $TotalProductTax }}</td>						
							<td>&nbsp;</td>
							<td>{{ $TotalCGST }}</td>
							<td>&nbsp;</td>
							<td>{{ $TotalSGST }}</td>
							<td>&nbsp;</td>
							<td>{{ $TotalIGST }}</td>
							<td>&nbsp;</td>
							<td>{{ $TotalGST }}</td>
							<td>{{ $GrandTotalPrice }}</td>								
						</tr>
						<tr  style="border: 1px solid black; font-weight: bold">
						@php
							use NumberToWords\NumberToWords;

// create the number to words "manager" class
$numberToWords = new NumberToWords();

// build a new number transformer using the RFC 3066 language identifier
$numberTransformer = $numberToWords->getNumberTransformer('en');
						@endphp							
							<td colspan="4"><b>Total Amount In Word:</b></td>				
							<td colspan="15">{{ $numberTransformer->toWords($GrandTotalPrice) }}</td>
							
							{{-- <td colspan="11">&nbsp;</td> --}}
							{{-- <td>&nbsp;</td>
							<td>&nbsp;</td>						
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td> --}}								
						</tr>
						{{-- <tr>
							<td align="right" colspan="16"><b>Total Tax: &emsp;{{ $TotalTaxAmount  }}</b></td>
						</tr>
						<tr>
							<td align="right" colspan="16"><b>Grand Total : &emsp; {{ $TotalPriceWithoutTax }}</b></td>
						</tr> --}}
						{{-- <tr>
							<td align="right" colspan="16"><b>Grand Total WithTax: &emsp; {{ $TotalPriceWitTax }}</b></td>
						</tr> --}}
						
					</tfoot>
				</table>
			</div>
		{{-- </table> --}}
	</body>
</html>