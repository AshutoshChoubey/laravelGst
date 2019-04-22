@extends('samples') 
@section('content')
<section class="content" style="margin-left: 20px;margin-right: 20px;">
   {{ isset($id)?Form::open(['url' => 'SaiAutoCare/purchase/update','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'SaiAutoCare/purchase/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
   {{ csrf_field() }}
   {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
  <div class="card">
    <div class="card-header">
      <h4 class="box-title text-primary ">Please Fill Up Product Details</h4>
    </div>
    <div class="card-body">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12 col-sm-12">
        <!-- general form elements -->
          <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
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
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="supplier_name">Supplier Name</label>
          {{Form::select('supplier_name',$supplier ,isset($supplier_name)?$supplier_name: '', ['class' => 'form-control form-control ','id'=>'supplier_name','required', 'placeholder' => '  Supplier Name'] )}}
            <div class="invalid-feedback">
            {{ $errors->has('supplier_name') ? $errors->first('name', ':message') : '' }}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-grou">
          <label class="form-col-form-label" for="bill_num">Bill Number</label>
          {{Form::number('bill_num',isset($bill_num)?$bill_num: '', ['class' => 'form-control form-control ', 'placeholder' => 'Bill Number'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('bill_num') ? $errors->first('bill_num', ':message') : '' }}
          </div>
          </div>
        </div> 
         <div class="col-md-4">
          <div class="form-grou">
          <label class="form-col-form-label" for="bill_date">Bill Date</label>
          {{Form::date('bill_date',isset($bill_date)?$bill_date: '', ['class' => 'form-control form-control ', 'placeholder' => 'Bill Date'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('bill_date') ? $errors->first('bill_date', ':message') : '' }}
          </div>
          </div>
        </div> 
       
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
                  <thead>
                    <tr>
                     <th style="white-space: nowrap" >Product Name</th>
                     <th style="white-space: nowrap" >Company Name</th>
                     <th style="white-space: nowrap" >Model Name</th>
                     <th style="white-space: nowrap" >HSN</th>
                     <th style="white-space: nowrap" >Unit Price</th>
                     <th style="white-space: nowrap" >Unit Price Exit</th>
                     <th style="white-space: nowrap" >Qty</th>
                     <th style="white-space: nowrap" >GST</th>
                     <th style="white-space: nowrap" >Discount</th>
                     <th style="white-space: nowrap" >TAmount</th>
                       @php
                        if(!isset($id))
                        {
                          echo "<th>";
                          echo 'Action';
                          echo "</th>";
                        }
                      
                      @endphp                     
                    </tr>
                  </thead>
                  <tbody id="tBody">
                    <tr id="addRow">
                      <td  class="product_name">{{Form::select('product_id[]',$product, isset($product_id)?$product_id: '', ['class' => 'form-control ','required'=>"true",'placeholder'=>'Select' ,'id' => 'product_id'])}}
                      </td>
                      <td  class="company_name">{{Form::text('company_name[]', isset($company_name)?$company_name: '', ['class' => 'form-control ', 'id' => 'company_name'])}}
                      </td>
                      <td class="model_number">{{Form::text('model_number[]', isset($model_number)?$model_number: '', ['class' => 'form-control ', 'id' => 'model_number'])}}
                      </td>
                      <td class="hsn">{{Form::text('hsn[]', isset($hsn)?$hsn: '', ['class' => 'form-control ', 'id' => 'hsn'])}}
                      </td>
                      <td class="unit_price">{{Form::text('unit_price[]', isset($unit_price)?$unit_price: '', ['class' => 'form-control ', 'id' => 'unit_price'])}}
                      </td>
                       <td class="unit_price_exit">{{Form::text('unit_price_exit[]', isset($unit_price_exit)?$unit_price_exit: '', ['class' => 'form-control ', 'id' => 'unit_price_exit'])}}
                      </td>
                      <td class="quantity">{{Form::text('quantity[]', isset($quantity)?$quantity: '', ['class' => 'form-control ', 'id' => 'quantity'])}}
                      </td>
                      <td class="gst">{{Form::text('gst[]', isset($gst)?$gst: '', ['class' => 'form-control ', 'id' => 'gst'])}}
                      </td>
                      <td class="discount">{{Form::text('discount[]', isset($product_id)?$product_id: '', ['class' => 'form-control ', 'id' => 'discount'])}}
                      </td>
                      <td class="total_amount">{{Form::text('total_amount[]', isset($total_amount)?$total_amount: '', ['class' => 'form-control ', 'id' => 'total_amount'])}}
                      </td>
                      
                        @php
                        if(!isset($id))
                        {
                          echo "<td>";
                          echo '<a href="javascript:void(0)"  class="addMore btn btn-primary btn-sm"><i class="fa fa-plus "></i></a>';
                          echo "</td>";
                        }
                      
                      @endphp
                     
                    </tr>
                  </tbody>
                <!--   <tfoot>
                    <tr>
                      <td colspan="6" class="text-center">
                       
                      </td>
                    </tr>
                  </tfoot> -->
                </table>
               </div> 
            </div>
            <div class="card-footer">
              <div class="text-center">
                <input type="submit"  class="btn btn-primary" value="{{ isset($id)?'update':'Add' }}">
              </div>               
            </div>
          </div>
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
//  alert("hii");
    $(document).ready(function() {
      
      var i=0;
      $('.addMore').on("click",function(){
        i=parseInt(i)+1;
         $("#tBody").append('<tr id="AddRow'+i+'">\
                    <td class="product_name">{{Form::select("product_id[]", $product,"" ,["class" => "form-control ","placeholder"=>"Select" ,"required"=>"true", "id" => "product_id"])}}\
                    </td>\
                    <td class="company_name">{{Form::text("company_name[]", "", ["class" => "form-control ", "id" => "company_name"])}}\
                    </td>\
                    <td class="model_number">{{Form::text("model_number[]", "", ["class" => "form-control ", "id" => "model_number",])}}\
                    </td>\
                    <td class="hsn">{{Form::text("hsn[]", "", ["class" => "form-control ", "id" => "hsn",])}}\
                    </td>\
                    <td class="unit_price">{{Form::text("unit_price[]", "", ["class" => "form-control ", "id" => "unit_price",])}}\
                    </td>\
                     <td class="unit_price_exit">{{Form::text("unit_price_exit[]", "", ["class" => "form-control ", "id" => "unit_price_exit",])}}\
                    </td>\
                    <td class="quantity">{{Form::text("quantity[]", "", ["class" => "form-control ", "id" => "quantity",])}}\
                    </td>\
                    <td class="gst">{{Form::text("gst[]", "", ["class" => "form-control ", "id" => "gst",])}}\
                    </td>\
                    <td class="discount">{{Form::text("discount[]", "", ["class" => "form-control ", "id" => "discount",])}}\
                    </td>\
                    <td class="total_amount">{{Form::text("total_amount[]", "", ["class" => "form-control ", "id" => "total_amount",])}}\
                    </td>\
                    <td>\
                    <a href="javascript:void(0)" id="'+i+'"  class="removeRow btn btn-danger btn-sm"><i class="fa fa-minus "></i></a>\
                    </td>\
                  </tr>');
      });
       $(document).on('click', '.removeRow', function(){  
          var button_id = $(this).attr("id");  
          $('#AddRow'+button_id+'').remove();  
      }); 
       $(document).on('change', '[name^=product_id]', function(){  
         var productId=$(this).val();
         var thisSelf=$(this);
        //  console.log(  $(this).parent().parent().find('[name^=company_name]').val("ftuyh"));
             $.ajax({
             type: "POST",
             url: "{{url('/')}}/ajax/getProduct",
             data: { 
                     "_token": "{{ csrf_token() }}",
                    productId : productId,
                   },
             dataType : 'html',
             cache: false,
             success: function(data){
                var ProductDetail=JSON.parse(data);
                company_name=ProductDetail.company_name;
                model_number=ProductDetail.model_number;
                hsn=ProductDetail.hsn;
                unit_price=ProductDetail.unit_price;
                gst=ProductDetail.gst;
                thisSelf.parent().parent().find('[name^=company_name]').val(company_name);
                thisSelf.parent().parent().find('[name^=model_number]').val(model_number);
                thisSelf.parent().parent().find('[name^=hsn]').val(hsn);
                thisSelf.parent().parent().find('[name^=unit_price]').val(unit_price);
                thisSelf.parent().parent().find('[name^=gst]').val(gst);

             }
             
         }); 
      }); 
  });
</script>


@endsection