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
@extends('mainWithLessCss')  
@section('content')

<script src="{{ asset('asset/plugins/alerts-boxes/js/sweetalert.min.js') }}"></script>
<link href="{{ asset('/asset/plugins/select2/css/select2.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('/asset/plugins/select2/js/select2.min.js') }}"></script>
<link href="{{ asset('/asset/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('/asset/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <!--inputtags-->
<section class="content" style="margin-left: 20px;margin-right: 20px;">
   {{ isset($id)?Form::open(['url' => 'GST/purchase/update','files' => 'true' ,'id'=>'formId','enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'GST/purchase/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'id'=>'formId','autocomplete' => 'OFF']) }} 
   {{ csrf_field() }}
   {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
 @if(session()->has('message.level') || $errors->any() ) 
   <div class="row">
      <!-- left column -->
      <div class="col-md-12 col-sm-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <!-- /.box-header -->
          <!-- form start -->
          <div class="card-body">
            @if ($errors->any())
            <ul class="alert alert-danger" style="list-style:none">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            @endif
            @if(session()->has('message.level'))
            <div class="alert alert-{{ session('message.level') }} alert-dismissible" onload="javascript: Notify('You`ve got mail.', 'top-right', '5000', 'info', 'fa-envelope', true); return false;">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> {{ ucfirst(session('message.level')) }}!</h4>
              {!! session('message.content') !!}
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endif

<div class="card">
  <div class="card-header text-center">Purchase Detail</div>
  <div class="card-body">
    <div class="row">
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="supplier_id">Supplier Name </label>
          {{Form::select('supplier_id',$supplierSelect,isset($supplier_id)?$supplier_id: '', ['class' => 'form-control form-control single-select', 'placeholder' => 'Supplier Id','required'=>'required'] )}}
           {{Form::text('supplier_name',isset($supplier_name)?$supplier_name: '', ['class' => 'form-control form-control ', 'placeholder' => 'Supplier Name','style'=>'display:none'] )}}
          {{-- {{Form::select('supplier_name',$supplier ,isset($supplier_name)?$supplier_name: '', ['class' => 'form-control form-control ','id'=>'supplier_name','required', 'placeholder' => '  Supplier Name'] )}} --}}
          <div class="invalid-feedback">
          {{ $errors->has('supplier_id') ? $errors->first('supplier_id', ':message') : '' }}
          </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="supplier_mob_num">Supplier Mobile Number</label>
          {{Form::text('supplier_mob_num',isset($supplier_mob_num)?$supplier_mob_num: '', ['class' => 'form-control form-control ', 'placeholder' => 'Supplier Mobile Number'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('supplier_mob_num') ? $errors->first('supplier_mob_num', ':message') : '' }}
          </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="supplier_address ">Supplier Address</label>
          {{Form::textarea('supplier_address',isset($supplier_address )?$supplier_address  : '', ['class' => 'form-control form-control ', 'placeholder' => 'Supplier Address','style'=>'height:55px'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('supplier_address  ') ? $errors->first('supplier_address  ', ':message') : '' }}
          </div>
          </div>
        </div>       
      </div> 
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="supplier_email">Supplier Email </label>
          {{Form::text('supplier_email',isset($supplier_email)?$supplier_email: '', ['class' => 'form-control form-control ', 'placeholder' => 'Supplier Email'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('supplier_email') ? $errors->first('supplier_email', ':message') : '' }}
          </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="purchase_invoice_number">Purchase Invoice Number</label>
          {{Form::text('purchase_invoice_number',isset($purchase_invoice_number)?$purchase_invoice_number: '', ['class' => 'form-control form-control ', 'placeholder' => 'Purchase Invoice Number'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('purchase_invoice_number') ? $errors->first('purchase_invoice_number', ':message') : '' }}
          </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="purchase_invoice_date ">Purchase Invoice Date</label>
          {{Form::text('purchase_invoice_date',isset($purchase_invoice_date  )?$purchase_invoice_date  : '', ['class' => 'form-control form-control ','id'=>'purchase_invoice_date', 'placeholder' => 'Purchase Invoice Date'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('purchase_invoice_date  ') ? $errors->first('purchase_invoice_date  ', ':message') : '' }}
          </div>
          </div>
        </div>       
      </div>
      <div class="row">       
         <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="purchase_invoice_amount">Purchase Invoice Amount</label>
          {{Form::number('purchase_invoice_amount',isset($purchase_invoice_amount)?$purchase_invoice_amount: '', ['class' => 'form-control form-control ', 'placeholder' => 'Purchase Invoice Amount','step'=>'any'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('purchase_invoice_amount') ? $errors->first('purchase_invoice_amount', ':message') : '' }}
          </div>
          </div>
        </div> 
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="payment_type">Payment Type</label>
          {{Form::select('payment_type',['1'=>'By Cash','2'=>'By Internate Banking','3'=>'By Cheque'],isset($payment_type)?$payment_type: '', ['class' => 'form-control form-control ', 'placeholder' => 'Payment Type'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('payment_type') ? $errors->first('payment_type', ':message') : '' }}
          </div>
          </div>
        </div> 
         <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="purchase_discription">Purchase Discription/Notes</label>
          {{Form::textarea('purchase_discription',isset($purchase_discription)?$purchase_discription: '', ['class' => 'form-control form-control ', 'placeholder' => 'Purchase Discription','style'=>'height:55px'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('purchase_discription') ? $errors->first('purchase_discription', ':message') : '' }}
          </div>
          </div>
        </div>        
      </div> 
    
  </div>
   <div class="card-footer"></div>
</div>
      <hr/>
      <div class="row">   
        <div class="col-sm-12">  
          <div class="card">
            <div class="card-header">
            <h5 >
                  Please fill up the Purchase details
            </h5> 
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="addmoretable" class="table table-bordered">
                  <tbody id="tBody">
                    <tr id="addRow__0">                     
                      <td>
                        <div class="form-groupp">
                          <label for="product_type">Product Type</label>
                         {{Form::select('product_type[]',$productTypeSelect,isset($product_type)?$product_type: '', ['class' => 'form-control input-sm ','id'=>'product_type__0', 'placeholder' => 'Product Type','style'=>'width:150px','required'=>'required'] )}}
                        </div>
                         <div class="form-groupp">
                          <label for="product_brand">Product Brand</label>
                          {{Form::select('product_brand[]',["NA"=>"--select--"],isset($product_brand)?$product_brand: '', ['class' => 'form-control input-sm ','id'=>'product_brand__0', 'placeholder' => 'Product Brand','style'=>'width:150px','required'=>'required'] )}}                          
                        </div>
                      </td>
                      <td>
                        <div class="form-groupp">
                          <label for="product_model">Product Model</label>
                          {{Form::select('product_model[]',$productModelSelect,isset($product_model)?$product_model: '', ['class' => 'form-control input-sm ','id'=>'product_model__0', 'placeholder' => 'Product Model','style'=>'width:150px','required'=>'required'] )}}  

                          {{-- <select id="product_model__0" placeholder="Product Model" required="" class="form-control input-sm" style="width:150px" name="product_model" ></select> --}}
                        </div>                        
                         <div class="form-groupp">
                          <label for="product_color">Product Color</label>
                           {{Form::select('product_color[]',$productColorSelect,isset($product_color)?$product_color: '', ['class' => 'form-control input-sm ','id'=>'product_color__0', 'placeholder' => 'Product Color','style'=>'width:150px','required'=>'required'] )}} 

                           {{-- <select id="product_color__0" placeholder="Product Color" required="" class="form-control input-sm" style="width:150px" name="product_color" >
                          </select> --}}
                        </div>
                      </td>
                      <td>
                         <div class="form-groupp">
                          <label for="product_name">Product Name</label>
                          {{Form::select('product_name[]',$productNameSelect,isset($product_name)?$product_name: '', ['class' => 'form-control input-sm ','id'=>'product_name__0', 'placeholder' => 'Product Name','style'=>'width:150px','required'=>'required'] )}} 

                           {{-- <input type="text" id="product_name__0" required="" placeholder="Product Name" class="form-control input-sm" style="width:150px" name="product_name"  /> --}}
                        </div>
                        <div class="form-groupp">
                          <label for="product_color">Product Code</label>
                          {{Form::text('product_code[]',isset($product_code)?$product_code: '', ['class' => 'form-control input-sm ','id'=>'product_code__0', 'placeholder' => 'Product Code','style'=>'width:150px','required'=>'required'] )}}

                           {{-- <input type="text" id="product_code__0" required="" placeholder="Product Code" class="form-control input-sm" style="width:150px" name="product_code"  /> --}}
                        </div>
                      </td>
                      <td>
                        <div class="form-groupp">
                          <label for="product_discription">Product Discription</label>
                          {{Form::textarea('product_discription[]',isset($product_discription)?$product_discription: '', ['class' => 'form-control input-sm ','id'=>'product_discription__0', 'placeholder' => 'Product Discription','style'=>'width:150px;height:55px','required'=>'required'] )}}

                           {{-- <textarea type="text" id="product_discription__0" required="" placeholder="Product Discription" class="form-control input-sm" style="width:150px" name="product_discription__0" ></textarea> --}}
                        </div>
                        <div class="form-groupp">
                          <label for="product_unit">Product Unit</label>
                          {{Form::text('product_unit[]',isset($product_unit)?$product_unit: '', ['class' => 'form-control input-sm ','id'=>'product_unit__0', 'placeholder' => 'Product Unit','style'=>'width:150px','required'=>'required'] )}}

                          {{--  <input type="text" id="product_unit__0" required="" placeholder="product_unit " class="form-control input-sm" style="width:150px" name="product_unit"  /> --}}
                        </div>
                      </td>
                      <td>
                         <div class="form-groupp">
                          <label for="product_color">Product HSN</label>
                          {{Form::text('product_hsn[]',isset($product_hsn)?$product_hsn: '', ['class' => 'form-control input-sm ','id'=>'product_hsn__0', 'placeholder' => 'Product HSN','style'=>'width:150px','required'=>'required'] )}}


                           {{-- <input type="text" id="product_hsn__0" required="" placeholder="Product HSN" class="form-control input-sm" style="width:150px" name="product_hsn"  /> --}}
                        </div>
                         <div class="form-groupp">
                          <label for="product_price_withgst">Product Price With GST</label>
                          {{Form::number('product_price_withgst[]',isset($product_price_withgst)?$product_price_withgst: '', ['class' => 'form-control input-sm ','id'=>'product_price_withgst__0', 'placeholder' => 'Product Price With GST','style'=>'width:150px','required'=>'required','step'=>'any'] )}}

                           {{-- <input type="text" id="product_price_withgst__0" required="" placeholder="Product Price" class="form-control input-sm" style="width:150px" name="product_price_withgst"  /> --}}
                        </div>
                      </td>
                       <td>
                         <div class="form-groupp">
                          <label for="product_color">Product Price<small> Without Gst</small></label>
                          {{Form::number('product_price_withoutgst[]',isset($product_price_withoutgst)?$product_price_withoutgst: '', ['class' => 'form-control input-sm ','id'=>'product_price_withoutgst__0', 'placeholder' => 'Product Price Without Gst','style'=>'width:150px','required'=>'required','step'=>'any'] )}}

                           {{-- <input type="text" id="product_price_withoutgst__0" required="" placeholder="Product Price" class="form-control input-sm" style="width:150px" name="product_price_withoutgst"  /> --}}
                        </div>
                        <div class="form-groupp">
                          <label for="product_igst">Product IGST</label>
                           {{Form::number('product_igst[]',isset($product_igst)?$product_igst: '', ['class' => 'form-control input-sm ','id'=>'product_igst__0', 'placeholder' => 'Product IGST','style'=>'width:150px','required'=>'required','step'=>'any'] )}}

                           {{-- <input type="text" id="product_igst__0" required="" placeholder="product igst " class="form-control input-sm" style="width:150px" name="product_igst"  /> --}}
                        </div>
                      </td>
                       <td>
                         <div class="form-groupp">
                          <label for="product_cgst">Product CGST</label>
                           {{Form::number('product_cgst[]',isset($product_cgst)?$product_cgst: '', ['class' => 'form-control input-sm ','id'=>'product_cgst__0', 'placeholder' => 'Product CGST','style'=>'width:150px','required'=>'required','step'=>'any'] )}}

                           {{-- <input type="text" id="product_cgst__0" required="" placeholder="Product CGST" class="form-control input-sm" style="width:150px" name="product_cgst"  /> --}}
                        </div>
                        <div class="form-groupp">
                          <label for="product_sgst">Product SGST</label>
                          {{Form::number('product_sgst[]',isset($product_sgst)?$product_sgst: '', ['class' => 'form-control input-sm ','id'=>'product_sgst__0', 'placeholder' => 'Product SGST','style'=>'width:150px','required'=>'required','step'=>'any'] )}}

                           {{-- <input type="text" id="product_sgst__0" required="" placeholder="product SGST " class="form-control input-sm" style="width:150px" name="product_sgst"  /> --}}
                        </div>
                      </td>
                      <td>
                         <div class="form-groupp">
                          <label for="product_gst">Product GST</label>
                          {{Form::number('product_gst[]',isset($product_gst)?$product_gst: '', ['class' => 'form-control input-sm ','id'=>'product_gst__0', 'placeholder' => 'Product GST','style'=>'width:150px','required'=>'required','step'=>'any'] )}}

                           {{-- <input type="text" id="product_gst__0" required="" placeholder="Product GST" class="form-control input-sm" style="width:150px" name="product_gst"  /> --}}
                        </div>
                        <div class="form-groupp">
                          <label for="product_salling_price"> <small>Product Selling pricewithout GST</small></label>
                          {{Form::number('product_salling_price[]',isset($product_salling_price)?$product_salling_price: '', ['class' => 'form-control input-sm ','id'=>'product_salling_price__0', 'placeholder' => 'Product Selling pricewithout GST','style'=>'width:150px','required'=>'required','step'=>'any'] )}}

                           {{-- <input type="text" id="product_salling_price__0" required="" placeholder="product Salling Price " class="form-control input-sm" style="width:150px" name="product_salling_price"  /> --}}
                        </div>
                      </td>
                       <td>
                         <div class="form-groupp">
                          <label for="product_discount_in_perce">Discount in %</label>
                          {{Form::number('product_discount_in_perce[]',isset($product_discount_in_perce)?$product_discount_in_perce: 0, ['class' => 'form-control input-sm ','id'=>'product_discount_in_perce__0', 'placeholder' => 'Discount in %','style'=>'width:150px','required'=>'required','step'=>'any'] )}}

                           {{-- <input type="text" id="product_gst__0" required="" placeholder="Product GST" class="form-control input-sm" style="width:150px" name="product_gst"  /> --}}
                        </div>
                        <div class="form-groupp">
                          <label for="product_discount"> <small>Product Discount</small></label>
                          {{Form::number('product_discount[]',isset($product_discount)?$product_discount: 0, ['class' => 'form-control input-sm ','id'=>'product_discount__0', 'placeholder' => 'Product Discount','style'=>'width:150px','required'=>'required','step'=>'any'] )}}

                           {{-- <input type="text" id="product_salling_price__0" required="" placeholder="product Salling Price " class="form-control input-sm" style="width:150px" name="product_salling_price"  /> --}}
                        </div>
                      </td>
                      <td>
                         <div class="form-groupp">
                          <label for="product_color">Product Quantity </label>
                           {{Form::number('product_quantity[]',isset($product_quantity)?$product_quantity: '', ['class' => 'form-control input-sm ','id'=>'product_quantity__0', 'placeholder' => 'Product Quantity','style'=>'width:150px','required'=>'required','step'=>'any'] )}}

                           {{-- <input type="text" id="product_quantity__0" required="" placeholder="Product Quantity" class="form-control input-sm" style="width:150px" name="product_quantity"  /> --}}
                        </div>
                        <div class="form-groupp">
                          <label for="product_total_amount">Total Amount</label>
                          {{Form::number('product_total_amount[]',isset($product_total_amount)?$product_total_amount: '', ['class' => 'form-control input-sm ','id'=>'product_total_amount__0', 'placeholder' => 'Total Amount','style'=>'width:150px','required'=>'required','step'=>'any'] )}}

                           {{-- <input type="text" id="product_total_amount__0" required="" placeholder=" Total Amount " class="form-control input-sm" style="width:150px" name="product_total_amount"  /> --}}
                        </div>
                      </td>

                        @php
                        if(!isset($id))
                        {
                          echo "<td class=\"align-middle\">";
                          echo "<div class=\"align-middle\">";
                          echo '<a href="javascript:void(0)"  class="addMore btn btn-primary btn-sm"><i class="fa fa-plus fa5"></i></a>';
                           echo "</div>";
                          echo "</td>";
                        }
                      
                      @endphp
                     
                    </tr>
                  </tbody>
                  <tfoot >                    
                    <tr> 
                      <td class="small font-italic text-info text-capitalize"></td>
                      <td>Total Purchase Amount</td>
                      <td><input type="number" step="any"  class="form-control form-control-rounded" name="total_purchase_amount"></td>
                      <td><button type="button" id="getTotalPurchaseAmount"  class="btn-sm btn-secondary">Get</button></td>
                      <td>Purchase Paid Amount</td>
                      <td><input type="number" step="any" required="required" class="form-control form-control-rounded" name="purchase_due_amount"></td>
                    </tr>
                  </tfoot>
                </table>
               </div> 
            </div>
            <div class="card-footer">
              <div class="text-center">
                <button   type="submit"  class="btn btn-primary">{{ isset($id)?'update':'Add' }}</button>
                {{-- <input   type="submit"  class="btn btn-primary" value="{{ isset($id)?'update':'Add' }}" /> --}}
              </div>               
            </div>
          </div>
        </div>
      </div>
   

  <!--/.col (left) -->
  
{{Form::close()}}
      <!-- /.row -->
</section>

<script type = "text/javascript" language = "javascript">

    $(document).ready(function() {



      $(document).on("click","#submitBtn",function(){
  var frm = $('#formId');
//console.log(frm.attr('action'));
//console.log("hiiii1111");
     $('form#formId').submit(function (e) {
          console.log("hiiii13333");
           e.preventDefault();
            $.ajax({
                type: frm.attr('method'),
                url:  frm.attr('action'),
                data: frm.serialize(),
                success: function (data) {
                  console.log("data");
                  if(data==1)
                  {
                    swal("Good job!", "Product is Successfully Added You Can Check in Product Search Section", "success");
                  }
                  else
                  {
                    swal("Somthing Wrong!", "OOHooooo!!!!!", "error");
                  }
                },
                error: function (data) {
                  swal("Somthing Wrong!", "OOHooooooooooo!!!!", "error");
                },
           });
        });
});


      var Total=0;
      var i=0;
      $('.addMore').on("click",function(){
        i=parseInt(i)+1;
         $("#tBody").append('');
      });
       $(document).on('click', '.removeRow', function(){  
          var button_id = $(this).attr("id");  
          $('#AddRow'+button_id+'').remove();  
      }); 
        $(document).on('change keyup keydown', '.qtn', function(){  
           var thisSelf=$(this);
           var gst=thisSelf.parent().parent().find('[name^=gst]').val();
            var unit_price=thisSelf.parent().parent().find('[name^=unit_price]').val();
           gst =parseInt(gst);
           unit_price=parseInt(unit_price);
           taxvValue=(unit_price*gst)/100;
           priceWithTax=unit_price+taxvValue;
           totalPrice=priceWithTax*thisSelf.val();
           if(isNaN(totalPrice))
           {
            console.log("Please Insert valid Quantity");
           }
           else
           {
            thisSelf.parent().parent().find('[name^=total_amount]').val(totalPrice);
           }           

      }); 
         
  });

    $(document).ready(function() {
      $(document).on("change","[name^=supplier_id]",function(){
      var thisSelf=$(this);
      var supplierId = $(this).val();
      $.ajax({
        type:"POST",
        url: "{{url('/')}}/ajax/getSupplierDetailById",
        data:{
          "_token": "{{ csrf_token() }}",
          supplierId : supplierId,
        },
        dataType : 'html',
        cache: false,
        success: function(data){
          responseData=JSON.parse(data);
            $('[name^=supplier_mob_num]').val(responseData.mob_num);
            $('[name^=supplier_email]').val(responseData.email);
            $('[name^=supplier_address]').val(responseData.address);
            $('[name^=supplier_name]').val(responseData.supplier_name);       
        }
      });
     }); 


    $(document).on("change","[name^=product_type]",function(){
      var thisSelf=$(this);
      var product_type = $(this).val();
      $.ajax({
        type:"POST",
        url: "{{url('/')}}/ajax/getBrandByProductType",
        data:{
          "_token": "{{ csrf_token() }}",
          product_type : product_type,
        },
        dataType : 'html',
        cache: false,
        success: function(data){
           thisSelf.parent().parent().find('[name^=product_brand]').removeAttr('readonly');
          // $('#product_brand__'+idIndex[1])
          responseData=JSON.parse(data);
            thisSelf.parent().parent().find('[name^=product_brand]')
               .empty()
               .append('<option selected="selected" value="">-Select -</option>');
               for (index = 0; index < responseData.length; ++index) {
               thisSelf.parent().parent().find('[name^=product_brand]').append(
                '<option value="'+responseData[index]['id']+'">'+responseData[index]['brand_name']+'</option>'
              );   
            }      
        }
      });
     }); 

    $(document).on("change","[name^=product_brand]",function(){
        var thisSelf=$(this);
        var product_brand = $(this).val();
        var productBrandId = $(this).attr('id');
        var idIndex=productBrandId.split('__');
        var product_type= thisSelf.parent().parent().parent().find('[name^=product_type]').val();
      $.ajax({
        type:"POST",
        url: "{{url('/')}}/ajax/getModelByBrand",
        data:{
          "_token": "{{ csrf_token() }}",
          product_brand : product_brand,
          product_type : product_type
        },
        dataType : 'html',
        cache: false,
        success: function(data){
           // thisSelf.parent().parent().find('[name^=product_brand]').removeAttr('readonly');
          $('#product_model__'+idIndex[1]).removeAttr('readonly');
          responseData=JSON.parse(data);
             $('#product_model__'+idIndex[1])
               .empty()
               .append('<option selected="selected" value="">-Select -</option>');
               for (index = 0; index < responseData.length; ++index) {
                $('#product_model__'+idIndex[1]).append(
                '<option value="'+responseData[index]['id']+'">'+responseData[index]['model_name']+'</option>'
              );   
            }      
        }
      });
     }); 

    $(document).on("change","[name^=product_model]",function(){
      var thisSelf=$(this);
      var product_model = $(this).val();
      var productBrandId = $(this).attr('id');
      var idIndex=productBrandId.split('__');
      var product_type=thisSelf.parent().parent().parent().find('[name^=product_type]').val();
      var product_brand=$('#product_brand__'+idIndex[1]).val();
      
      $.ajax({
        type:"POST",
        url: "{{url('/')}}/ajax/getColorByBrandModelType",
        data:{
          "_token": "{{ csrf_token() }}",
          product_brand : product_brand,
          product_type : product_type,
          product_model : product_model
        },
        dataType : 'html',
        cache: false,
        success: function(data){
          // console.log("Go");
           // thisSelf.parent().parent().find('[name^=product_brand]').removeAttr('readonly');
          $('#product_color__'+idIndex[1]).removeAttr('readonly');
          responseData=JSON.parse(data);
             $('#product_color__'+idIndex[1])
               .empty()
               .append('<option selected="selected" value="">-Select -</option>');
               for (index = 0; index < responseData.length; ++index) {
                $('#product_color__'+idIndex[1]).append(
                '<option value="'+responseData[index]['id']+'">'+responseData[index]['color_name']+'</option>'
              );   
            }      
        }
      });
     }); 

    $(document).on("change","[name^=product_color]",function(){
      var thisSelf=$(this);
      var product_color = $(this).val();
      var productColorId = $(this).attr('id');
      var idIndex=productColorId.split('__');
      var product_type=thisSelf.parent().parent().parent().find('[name^=product_type]').val();
      var product_brand=$('#product_brand__'+idIndex[1]).val();
      var product_model=$('#product_model__'+idIndex[1]).val();

      $.ajax({
        type:"POST",
        url: "{{url('/')}}/ajax/getNameByBrandModelTypeColor",
        data:{
          "_token": "{{ csrf_token() }}",
          product_brand : product_brand,
          product_type : product_type,
          product_model : product_model,
          product_color : product_color
        },
        dataType : 'html',
        cache: false,
        success: function(data){
          // console.log("Go");
           // thisSelf.parent().parent().find('[name^=product_brand]').removeAttr('readonly');
          $('#product_name__'+idIndex[1]).removeAttr('readonly');
          responseData=JSON.parse(data);
             $('#product_name__'+idIndex[1])
               .empty()
               .append('<option selected="selected" value="">-Select -</option>');
               for (index = 0; index < responseData.length; ++index) {
                $('#product_name__'+idIndex[1]).append(
                '<option value="'+responseData[index]['id']+'">'+responseData[index]['product_name']+'</option>'
              );   
            }      
        }
      });
     }); 

    $(document).on("change","[name^=product_name]",function(){
      var thisSelf=$(this);
      var product_id = $(this).val();
      var productNameId = $(this).attr('id');
      var idIndex=productNameId.split('__');

      $.ajax({
        type:"POST",
        url: "{{url('/')}}/ajax/getProduct",
        data:{
          "_token": "{{ csrf_token() }}",
          product_id : product_id,
        },
        dataType : 'html',
        cache: false,
        success: function(data){


                var ProductDetail=JSON.parse(data);
                var  product_cgst=ProductDetail[0].product_cgst;
                var  product_code=ProductDetail[0].product_code;
                var   product_discription=ProductDetail[0].product_discription;
                var   product_price=ProductDetail[0].product_price;
                var    product_price_without_gst=ProductDetail[0].product_price_without_gst;
                var product_salling_price=ProductDetail[0].product_salling_price;
                var product_hsn=ProductDetail[0].product_hsn;
                var product_unit=ProductDetail[0].product_unit;
                var   product_sgst=ProductDetail[0].product_sgst;
                var   product_igst=ProductDetail[0].product_igst;
                var   product_gst=ProductDetail[0].product_gst;
                var   product_sgst=ProductDetail[0].product_sgst;
                if(product_gst==null)
                {
                  product_gst=0;
                }  
                $('#product_code__'+idIndex[1]).val(product_code);
                $('#product_discription__'+idIndex[1]).val(product_discription);
                $('#product_unit__'+idIndex[1]).val(product_unit);
                $('#product_hsn__'+idIndex[1]).val(product_hsn);
                $('#product_price_withgst__'+idIndex[1]).val(product_price);
                $('#product_price_withoutgst__'+idIndex[1]).val(product_price_without_gst);
                $('#product_igst__'+idIndex[1]).val(product_igst);
                $('#product_cgst__'+idIndex[1]).val(product_cgst);
                $('#product_sgst__'+idIndex[1]).val(product_sgst);
                $('#product_gst__'+idIndex[1]).val(product_gst);
                $('#product_salling_price__'+idIndex[1]).val(product_salling_price);
                $('#product_code__'+idIndex[1]).removeAttr('readonly');
                $('#product_discription__'+idIndex[1]).removeAttr('readonly');
                $('#product_unit__'+idIndex[1]).removeAttr('readonly');
                $('#product_hsn__'+idIndex[1]).removeAttr('readonly');
                $('#product_price_withgst__'+idIndex[1]).removeAttr('readonly');
                $('#product_price_withoutgst__'+idIndex[1]).removeAttr('readonly');
                $('#product_igst__'+idIndex[1]).removeAttr('readonly');
                $('#product_cgst__'+idIndex[1]).removeAttr('readonly');
                $('#product_sgst__'+idIndex[1]).removeAttr('readonly');
                $('#product_gst__'+idIndex[1]).removeAttr('readonly');
                $('#product_salling_price__'+idIndex[1]).removeAttr('readonly');
                $('#product_quantity__'+idIndex[1]).removeAttr('readonly');
                $('#product_total_amount__'+idIndex[1]).removeAttr('readonly');
            }      
        })
      });
    $(document).on("change click keyup keypress keydown","[name^=product_quantity],[name^=product_discount_in_perce],[name^=product_discount]",function(){
      var thisSelf=$(this);
      var product_quantity = $(this).val();
      var productQuantityId = $(this).attr('id');
      var idIndex=productQuantityId.split('__'); 
      var product_igst = $('#product_igst__'+idIndex[1]).val();
      var product_cgst = $('#product_cgst__'+idIndex[1]).val();
      var product_sgst = $('#product_sgst__'+idIndex[1]).val();
      var product_gst = $('#product_gst__'+idIndex[1]).val();
      var product_discount_in_perce = $('#product_discount_in_perce__'+idIndex[1]).val();
      var product_discount = $('#product_discount__'+idIndex[1]).val();
      var quantity = $('#product_quantity__'+idIndex[1]).val();
      var product_price_withoutgst = $('#product_price_withoutgst__'+idIndex[1]).val();
       var totalPrice =(parseFloat(product_price_withoutgst)+(parseFloat(product_price_withoutgst)*parseFloat(product_gst))/100)* parseFloat(quantity);
      
      // console.log(totalPrice);
      // console.log(product_discount_in_perce);
      // console.log(product_discount);
       $('#product_discount_in_perce__'+idIndex[1]).removeAttr('readonly','readonly');
      $('#product_discount__'+idIndex[1]).removeAttr('readonly','readonly');
      if(parseInt(product_discount_in_perce)!=0)
      {        
        var product_price_withoutgst=(parseFloat(product_price_withoutgst)-(parseFloat(product_price_withoutgst)*parseFloat(product_discount_in_perce))/100);
        var totalPrice =(parseFloat(product_price_withoutgst)+(parseFloat(product_price_withoutgst)*parseFloat(product_gst))/100)* parseFloat(quantity);
        $('#product_discount__'+idIndex[1]).attr('readonly','readonly');
         $('#product_discount_in_perce__'+idIndex[1]).removeAttr('readonly','readonly');
         $('#product_discount__'+idIndex[1]).val(0);
        
      }
      if(parseInt(product_discount)!=0)
      {
        var product_price_withoutgst=parseFloat(product_price_withoutgst)-product_discount;
        var totalPrice =(parseFloat(product_price_withoutgst)+(parseFloat(product_price_withoutgst)*parseFloat(product_gst))/100)* parseFloat(quantity);
         $('#product_discount_in_perce__'+idIndex[1]).attr('readonly','readonly');
         $('#product_discount__'+idIndex[1]).removeAttr('readonly','readonly');
         $('#product_discount_in_perce__'+idIndex[1]).val(0);
      }
     
      if(!isNaN(totalPrice))
      {
         $('#product_total_amount__'+idIndex[1]).val(totalPrice);
      }  
    
    });
    $(document).on("change click keyup keypress keydown","[id^=getTotalPurchaseAmount]",function(){
     //  var Total=[];
     //  var totalPurhaseAmount= $("[name^=product_total_amount]");
     //  totalPurhaseAmount.forEachach();
     // Total.push(totalPurhaseAmount)
     var Total=0;
     var values = $("input[name='product_total_amount[]']")
              .map(function(){
                if(!isNaN(parseFloat($(this).val())))
                {
                  Total+=parseFloat($(this).val());
                }
                return parseFloat($(this).val());

              }).get();
              // for(i=0;i<values.length;i++)
              // {
              //   Total1+=Total1+!isNaN(values[i])?values[i]:0;
              // }
            //  console.log(values);
              console.log(Total);
            //  console.log(Total1);
     //$('[name^=product_total_amount]').removeAttr('readonly');
      if(!isNaN(Total))
      {
         $('[name=total_purchase_amount]').val(Total);
      }  
    
    });
    setInterval(function(){
      var Total=0;
     $("[name^='product_total_amount']")
              .map(function(){
                if(!isNaN(parseFloat($(this).val())))
                {
                  Total+=parseFloat($(this).val());
                }
                return parseFloat($(this).val());

              }).get();
              if(!isNaN(Total))
              {
                 $('[name=total_purchase_amount]').val(Total);
              } 

    },1000)
    
    var i=0;
    @php 
          $i=0;
        @endphp
      $('.addMore').on("click",function(){
        i=parseInt(i)+1;
        @php 
          $i=$i+1;
        @endphp
         $("#tBody").append('<tr id="addRow__'+i+'"><td><div class="form-groupp"><label for="product_type">Product Type</label>\
                         {{Form::select("product_type[]",$productTypeSelect, "",["class" => "form-control input-sm ","id"=>"product_type__".$i, "placeholder" => "Product Type","style"=>"width:150px","required"=>"required"] )}}\
                        </div>\
                        <div class="form-groupp">\
                         <label for="product_brand">Product Brand</label>\
                          <select id="product_brand__'+i+'" placeholder="Product Brand" required="" class="form-control input-sm" style="width:150px" name="product_brand[]" ></select>\
                          </div>\
                          </td>\
                      <td>\
                      <div class="form-groupp">\
                      <label for="product_model">Product Model</label>\
                      <select id="product_model__'+i+'" placeholder="Product Model" required="" class="form-control input-sm" style="width:150px" name="product_model[]" ></select>\
                        </div>\
                        <div class="form-groupp">\
                          <label for="product_color">Product Color</label>\
                           <select id="product_color__'+i+'" placeholder="Product Color" required="" class="form-control input-sm" style="width:150px" name="product_color[]" >\
                          </select>\
                        </div>\
                      </td>\
                      <td>\
                         <div class="form-groupp">\
                          <label for="product_color">Product Name</label>\
                           <select  id="product_name__'+i+'" required="" placeholder="Product Name" class="form-control input-sm" style="width:150px" name="product_name[]" ></select>\
                        </div>\
                        <div class="form-groupp">\
                          <label for="product_color">Product Code</label>\
                           <input type="text" id="product_code__'+i+'" required="" placeholder="Product Code" class="form-control input-sm" style="width:150px" name="product_code[]"  />\
                        </div>\
                      </td>\
                      <td>\
                        <div class="form-groupp">\
                          <label for="product_discription">Product Discription</label>\
                           <textarea type="text" id="product_discription__'+i+'" required="" placeholder="Product Discription" class="form-control input-sm" style="width:150px" name="product_discription[]" ></textarea>\
                        </div>\
                        <div class="form-groupp">\
                          <label for="product_color">Product Unit</label>\
                           <input type="text" id="product_unit__'+i+'" required="" placeholder="product_unit " class="form-control input-sm" style="width:150px" name="product_unit[]"  />\
                        </div>\
                      </td>\
                      <td>\
                         <div class="form-groupp">\
                          <label for="product_color">Product HSN</label>\
                           <input type="text" id="product_hsn__'+i+'" required="" placeholder="Product HSN" class="form-control input-sm" style="width:150px" name="product_hsn[]"  />\
                        </div>\
                         <div class="form-groupp">\
                          <label for="product_color">Product Price With GST</label>\
                           <input type="number" id="product_price_withgst__'+i+'" required="" placeholder="Product Price" class="form-control input-sm" step="any" style="width:150px" name="product_price_withgst[]"  />\
                        </div>\
                      </td>\
                       <td>\
                         <div class="form-groupp">\
                          <label for="product_color">Product Price Without Gst</label>\
                           <input type="number" id="product_price_withoutgst__'+i+'" required="" placeholder="Product Price" class="form-control input-sm" step="any" style="width:150px" name="product_price_withoutgst[]"  />\
                        </div>\
                        <div class="form-groupp">\
                          <label for="product_color">Product IGST</label>\
                           <input type="number" id="product_igst__'+i+'" required="" placeholder="product igst " class="form-control input-sm" style="width:150px" name="product_igst[]" step="any"  />\
                        </div>\
                      </td>\
                       <td>\
                         <div class="form-groupp">\
                          <label for="product_color">Product CGST</label>\
                           <input type="number" id="product_cgst__'+i+'" required="" placeholder="Product CGST" class="form-control input-sm" style="width:150px" name="product_cgst[]" step="any"  />\
                        </div>\
                        <div class="form-groupp">\
                          <label for="product_color">Product SGST</label>\
                           <input type="number" id="product_sgst__'+i+'" required="" placeholder="product SGST " class="form-control input-sm" style="width:150px" name="product_sgst[]" step="any"  />\
                        </div>\
                      </td>\
                      <td>\
                         <div class="form-groupp">\
                          <label for="product_color">Product GST</label>\
                           <input type="number" id="product_gst__'+i+'" required="" placeholder="Product GST" class="form-control input-sm" style="width:150px" name="product_gst[]" step="any"  />\
                        </div>\
                        <div class="form-groupp">\
                          <label for="product_color"><small>Product Selling price without GST</small></label>\
                           <input type="number" id="product_salling_price__'+i+'" required="" placeholder="product Salling Price " class="form-control input-sm" step="any" style="width:150px" name="product_salling_price[]"  />\
                        </div>\
                      </td>\
                      <td>\
                         <div class="form-groupp">\
                          <label for="product_discount_in_perce">Discount In pertantage</label>\
                           <input type="number" id="product_discount_in_perce__'+i+'" required="" placeholder="Discount In pertantage" class="form-control input-sm" value="0" style="width:150px" name="product_discount_in_perce[]" step="any"  />\
                        </div>\
                        <div class="form-groupp">\
                          <label for="product_discount"><small>Product Discount</small></label>\
                           <input type="number" id="product_discount__'+i+'" required="" placeholder="Product Discount " class="form-control input-sm" value="0" step="any" style="width:150px" name="product_discount[]"  />\
                        </div>\
                      </td>\
                      <td>\
                         <div class="form-groupp">\
                          <label for="product_color">Product Quantity </label>\
                           <input type="number" id="product_quantity__'+i+'" required="" placeholder="Product Quantity" class="form-control input-sm" style="width:150px" step="any" name="product_quantity[]"  />\
                        </div>\
                        <div class="form-groupp">\
                          <label for="product_total_amount">Total Amount</label>\
                           <input type="number" id="product_total_amount__'+i+'" required="" placeholder=" Total Amount " class="form-control input-sm" style="width:150px" step="any" name="product_total_amount[]"  />\
                        </div>\
                      </td>\
                       <td class="align-middle">\
                    <a href="javascript:void(0)" id="'+i+'"  class="removeRow btn btn-danger btn-sm"><i class="fa fa-minus "></i></a>\
                    </td>\
                      </tr>');
      });
       $(document).on('click', '.removeRow', function(){  
          var button_id = $(this).attr("id");  
          $('#addRow__'+button_id+'').remove();  
      });  

      $('#purchase_invoice_date').datepicker({
        autoclose: true,
        todayHighlight: true
      });
       $('.single-select').select2();
       });
</script>


@endsection