@extends('samples') 
@section('content')

<section class="container-fluid" style="margin-left: 10px;margin-right: 10px;">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css" />
 
  <source src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.js" type="">
<div class="card border-info">
   {{ Form::open(['url' => 'SaiAutoCare/workshop/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
   {{ csrf_field() }}
   {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
    <div class="card-header text-center">
            <h6 class="box-title text-primary ">Please Fill Up Workshop details</h6>
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
              <h6><i class="icon fa fa-check"></i> {{ ucfirst(session('message.level')) }}!</h6>
              {!! session('message.content') !!}
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
 
    <div class="box-header with-border text-center">
      <h6 class="box-title text-primary ">New Job Card</h6>
    </div>
    <div class="card card-accent-info">
      <div class="card-header">
        <div class="box-header with-border ">
          <h6 class="box-title  ">Contact Detail</h6>
        </div>
      </div> 
      <div class="card-body"> 
        <div class=" form-group row">
          <div class="col-md-3">
            
              <label class="control-label"  for="name"> Name:&emsp;</label>
              {{Form::text('name', isset($name)?$name: '', ['class' => 'form-control','id'=>'name','required', 'placeholder' => '  Name']  )}}
              <div class="invalid-feedback">
              {{ $errors->has('name') ? $errors->first('name', ':message') : '' }}
              </div>
           
          </div>
          <div class="col-md-3">
           
              <label class="control-label"  for="reference">Reference:&emsp;</label>
              {{Form::text('reference',isset($reference)?$reference: '', ['class' => 'form-control', 'placeholder' => 'Reference'] )}}
              <div class="invalid-feedback">
                {{ $errors->has('reference') ? $errors->first('reference', ':message') : '' }}
              </div>
           
          </div> 
          <div class="col-md-3">
           
              <label class="control-label"  for="company">Company:&emsp;</label>
              {{Form::text('company',isset($company)?$company: '', ['class' => 'form-control ', 'placeholder' => 'Company'] )}}
              <div class="invalid-feedback">
                {{ $errors->has('company') ? $errors->first('company', ':message') : '' }}
              </div>
          
          </div> 
           
           <div class="col-md-3">
            
              <label class="control-label"  for="gst_no">GST Number:&emsp;</label>
              {{Form::number('gst_no',isset($gst_no)?$gst_no: '', ['class' => 'form-control', 'placeholder' => 'Gst No'] )}}
              <div class="invalid-feedback">
                {{ $errors->has('gst_no') ? $errors->first('gst_no', ':message') : '' }}
              </div>
           
          </div> 
        </div>
       </div>
    </div>   
    <!--  <div class="row">
       
    </div> -->
    <div class="card card-accent-info">
      <div class="card-header">
       <div class="box-header with-border ">
        <h6 class="box-title  ">Comunication Detail</h6>
      </div>
    </div>
    <div class="card-body">
      <div class="form-group row">
        <div class="col-md-4">
         
          <label class="control-label"  for="mobile">Contact Number:&emsp;</label>
          {{Form::number('mobile', isset($mobile)?$mobile: '', ['class' => 'form-control ','id'=>'mobile', 'placeholder' => ' mobile']  )}}
          <div class="invalid-feedback">
          {{ $errors->has('mobile') ? $errors->first('mobile', ':message') : '' }}
        
          </div>
        </div>
        <div class="col-md-4">
        
            <label class="control-label"  for="email">Email:&emsp;</label>
            {{Form::email('email',isset($email)?$email: '', ['class' => 'form-control ', 'placeholder' => 'Email'] )}}
            <div class="invalid-feedback">
            {{ $errors->has('email') ? $errors->first('email', ':message') : '' }}
            </div>
         
        </div> 
         <div class="col-md-4">
        
            <label class="control-label"  for="landline">Alternate Mobile Number:&emsp;</label>
            {{Form::text('landline',isset($landline)?$landline: '', ['class' => 'form-control ', 'placeholder' => 'landline'] )}}
            <div class="invalid-feedback">
            {{ $errors->has('landline') ? $errors->first('landline', ':message') : '' }}
            </div>
         
        </div> 
      </div>
    </div>
    </div>

    <div class="card card-accent-info">
      <div class="card-header">
      <div class="box-header with-border ">
      <h6 class="box-title  ">Billing Detail</h6>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="address">Address:&emsp;</label>
          {{Form::textarea('address',isset($address)?$address: '', ['class' => 'form-control', 'placeholder' => 'Address','style' => 'height:50px'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('address') ? $errors->first('address', ':message') : '' }}
          </div>
        </div>
      </div> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="city">City:&emsp;</label>
          {{Form::text('city',isset($city)?$city: '', ['class' => 'form-control ', 'placeholder' => 'City'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('city') ? $errors->first('city', ':message') : '' }}
          </div>
        </div>
      </div> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="state">State:&emsp;</label>
          {{Form::text('state',isset($state)?$state: '', ['class' => 'form-control ', 'placeholder' => 'State'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('state') ? $errors->first('state', ':message') : '' }}
          </div>
        </div>
      </div> 
       <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="pin">Pin:&emsp;</label>
          {{Form::number('pin',isset($pin)?$pin: '', ['class' => 'form-control ', 'placeholder' => 'pin'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('pin') ? $errors->first('pin', ':message') : '' }}
          </div>
        </div>
      </div> 
    </div>
  </div>
</div>

<div class="card card-accent-info">
  <div class="card-header">
    <div class="box-header with-border ">
      <h6 class="box-title  ">Vehicals Detail</h6>
    </div>
</div>
<div class="card-body">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="vehicle_reg_number">Vehicle Reg Number:&emsp;</label>
          {{Form::text('vehicle_reg_number',isset($vehicle_reg_number)?$vehicle_reg_number: '', ['class' => 'form-control ', 'placeholder' => 'Vehicle Reg Number'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('vehicle_reg_number') ? $errors->first('address', ':message') : '' }}
          </div>
        </div>
      </div> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="model_year">Model Year:&emsp;</label>
          {{Form::text('model_year',isset($model_year)?$model_year: '', ['class' => 'form-control ', 'placeholder' => 'Model Year'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('model_year') ? $errors->first('Model Year', ':message') : '' }}
          </div>
        </div>
      </div> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="model_number">Model Name:&emsp;</label>
          {{Form::text('model_number',isset($model_number)?$model_number: '', ['class' => 'form-control ', 'placeholder' => 'Model Name'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('model_number') ? $errors->first('model_number', ':message') : '' }}
          </div>
        </div>
      </div> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="city">Chasis Number:&emsp;</label>
          {{Form::text('vin',isset($vin)?$vin: '', ['class' => 'form-control ', 'placeholder' => 'Chasis Number'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('vin') ? $errors->first('vin', ':message') : '' }}
          </div>
        </div>
      </div> 
    </div>
   <!--  <div class="row">
      
    </div> -->
    <div class="row">  
      <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="fuel_type">Fuel Type:&emsp;</label>
          {{Form::select('fuel_type',array('Petrol' => 'Petrol', 'Disel' => 'Disel','CNG'=>'CNG'),isset($fuel_type)?$fuel_type: '', ['class' => 'form-control ', 'placeholder' => 'Fuel Type'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('fuel_type') ? $errors->first('fuel_type', ':message') : '' }}
          </div>
        </div>
      </div> 
       <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="engine_number">Engine Number:&emsp;</label>
          {{Form::text('engine_number',isset($engine_number)?$engine_number: '', ['class' => 'form-control ', 'placeholder' => 'Engine Number'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('engine_number') ? $errors->first('engine_number', ':message') : '' }}
          </div>
        </div>
      </div> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="company_name"> Vehicle Comp Name:&emsp;</label>
          {{Form::text('company_name',isset($company_name)?$company_name: '', ['class' => 'form-control ', 'placeholder' => 'Company Name '] )}}
          <div class="invalid-feedback">
          {{ $errors->has('company_name') ? $errors->first('company_name', ':message') : '' }}
          </div>
        </div>
      </div>
     <div class="col-md-3">
      <div class="form-group">
        <label class="control-label"  for="reg_number">Registered Date:&emsp;</label>
        {{Form::date('reg_number',isset($reg_number)?$reg_number: '', ['class' => 'form-control date'])}}
        <div class="invalid-feedback">
        {{ $errors->has('reg_number') ? $errors->first('reg_number', ':message') : '' }}
        </div>
      </div>
    </div> 
  </div>
  <!-- <div class="row">  
    
  </div> -->
  

  <div class="row">  
      <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="odometer_reading">Odometer Reading:&emsp;</label>
          {{Form::text('odometer_reading',isset($odometer_reading)?$odometer_reading: '', ['class' => 'form-control ', 'placeholder' => 'Odometer Reading'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('odometer_reading') ? $errors->first('odometer_reading', ':message') : '' }}
          </div>
        </div>
      </div> 
       <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="color">color:&emsp;</label>
          {{Form::text('color',isset($color)?$color: '', ['class' => 'form-control ', 'placeholder' => 'color'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('color') ? $errors->first('color', ':message') : '' }}
          </div>
        </div>
      </div> 
       <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="key_number">Key Number:&emsp;</label>
          {{Form::text('key_number',isset($key_number)?$key_number: '', ['class' => 'form-control ', 'placeholder' => 'Key Number'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('key_number') ? $errors->first('key_number', ':message') : '' }}
          </div>
        </div>
      </div> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="due_in">Due In:&emsp;</label>
          {{Form::date('due_in',isset($due_in)?$due_in: '', ['class' => 'form-control ', 'placeholder' => 'Due In'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('due_in') ? $errors->first('due_in', ':message') : '' }}
          </div>
        </div>
      </div>
  </div>
  <!-- <div class="row">    
        
      
  </div> -->
  <div class="row">  
    <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="due_in">Due Out:&emsp;</label>
          {{Form::date('due_out',isset($due_out)?$due_out: '', ['class' => 'form-control date', 'placeholder' => 'Due Out'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('due_out') ? $errors->first('due_out', ':message') : '' }}
          </div>
        </div>
      </div> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="brand">Brand:&emsp;</label>
          {{Form::text('brand',isset($brand)?$brand: '', ['class' => 'form-control ', 'placeholder' => 'Brand'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('brand') ? $errors->first('status', ':message') : '' }}
          </div>
        </div>
      </div> 
       <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="advisor">Advisor:&emsp;</label>
          {{Form::text('advisor',isset($advisor)?$advisor: '', ['class' => 'form-control ', 'placeholder' => 'Advisor'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('advisor') ? $errors->first('advisor', ':message') : '' }}
          </div>
        </div>
      </div> 
       <div class="col-md-3">
        <div class="form-group">
          <label class="control-label"  for="advisor">Notes:&emsp;</label>
          {{Form::textarea('notes',isset($notes)?$notes: '', ['class' => 'form-control ', 'placeholder' => 'Notes','style' => 'height:50px'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('notes') ? $errors->first('notes', ':message') : '' }}
          </div>
        </div>
      </div> 
  </div>
 </div> 
</div>

    <div class="card card-accent-info">
      <div class="card-header">
        <div class="box-header with-border ">
        <h6 class="box-title ">Service Information</h6>
        </div>
      </div>
      <div class="card-body">

 <div class="row"> 
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label"  for="submited_part">Submited Part:&emsp;</label>
           {{Form::textarea('submited_part',isset($submited_part)?$submited_part: '', ['class' => 'form-control ','style' => 'height:90px' ])}}
          <div class="invalid-feedback">
          {{ $errors->has('submited_part') ? $errors->first('submited_part', ':message') : '' }}
          </div>
        </div>
      </div>  
      <!-- <div class="col-md-46>
        <div class="form-group">
          <label class="control-label"  for="others_submited_part">Others Submited Part:&emsp;</label>
           {{Form::textarea('others_submited_part',isset($others_submited_part)?$others_submited_part: '', ['class' => 'form-control ','multiple'=>'' ,'style' => 'height:90px'])}}
          <div class="invalid-feedback">
          {{ $errors->has('others_submited_part') ? $errors->first('others_submited_part', ':message') : '' }}
          </div>
        </div> -->
      </div>
    

        <div class="row">
        <div class="col-md-6">

          <div class="card">
            <div class="card-header">Service</div>
            <div class="card-body">

              <table class="table">
               <thead>
                 <th style="white-space: nowrap;" >Service Name</th>                
                 <th style="white-space: nowrap" >Quantity</th>
                  <th style="white-space: nowrap" >Unit Price</th>
                 <th style="white-space: nowrap" >Action</th>
               </thead>
               <tbody id="tBodyForServiceTable">
                <tr>
                    <td  class="product_name">{{Form::select('service_id[]',$service, isset($service_id)?$service_id: '', ['class' => ' ','required'=>'true','placeholder'=>'Select' ,'id' => 'service_id'])}}
                    </td>
                     <td >
                      {{Form::text('service_quantity[]',isset($service_quantity)?$service_quantity:'',['class'=>'form-control','required'])}}
                    </td>
                    <td ><div id="service_price"></div>

                    <td>
                    <a href="javascript:void(0)"  class="addMoreForService btn btn-primary btn-sm"><i class="fa fa-plus "></i></a>
                    </td>          
                  
                </tr>                 
               </tbody>
               <tfoot>
                 
               </tfoot>
              </table>

              

            </div>
            <div class="card-footer">&emsp;</div>
          </div>
        </div>


        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Product</div>
            <div class="card-body">
              <table class="table">
               <thead>
                 <th style="white-space: nowrap" >Product Name</th>
                 <th style="white-space: nowrap">Quantity</th>
                 <th style="white-space: nowrap" >Unit Price</th>
                 <th style="white-space: nowrap" >Action</th>
                 
               </thead>
               <tbody id="tBodyForProductTable">
                <tr>
                    <td  class="service_name">{{Form::select('product_id[]',$product, isset($product_id)?$product_id: '', ['class' =>  '','required'=>'true','placeholder'=>'Select' ,'id' => 'product_id'])}}
                    </td>
                    <td>
                       {{Form::text('product_quantity[]',isset($product_quantity)?$product_quantity:'',['class'=>'form-control','required'])}}
                    </td>
                     <td  ><div id="product_price"></div>
                    </td>
                    <td>
                    <a href="javascript:void(0)"  class="addMoreForProduct btn btn-primary btn-sm"><i class="fa fa-plus "></i></a>
                    </td>          
                  
                </tr> 
               </tbody>
               <tfoot>
                 
               </tfoot>
              </table>

            </div>
            <div class="card-footer">&emsp;</div>

          </div>
        </div>  
        </div>
      </div>
    </div>
  </div>
  </div>
</div>


</div>
  <!-- <div class="row">
   
  </div> -->
  <div class="card-footer">
    <div class="row">
      <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-sm btn-primary" name=""> <i class="fa fa-dot-circle-o"></i>{{isset($id) ? 'Update' :'Add' }}</button> 
        <button type="reset" class="btn btn-sm btn-danger" name=""> <i class="fa fa-ban"></i> Reset</button> 
      </div>
    </div>
  </div>  
                  
   {{Form::close()}}
 </div>
</section>


<script type="text/javascript">
  $(document).ready(function(){
    $('[name^=product_id]').selectize({
      create: false,
      sortField: 'text'
    });
    $('[name^=service_id]').selectize({
      create: false,
      sortField: 'text'
    });
    var i=0;
    var j=0;

      $('.addMoreForProduct').on("click",function(){
        i=parseInt(i)+1;
          $("#tBodyForProductTable").append('<tr id="AddRowForProduct'+i+'">\
          <td class="service_name">{{Form::select("product_id[]",$product, isset($product_id)?$product_id: "", ["class"=> " product_id","required"=>"true","placeholder"=>"Select" ,"id" => "product_id"])}}\
          </td>\
          <td>{{Form::text("product_quantity[]",isset($product_quantity)?$product_quantity:"",["class"=>"form-control","required"])}}</td>\
          <td  ><div id="product_price"></div>\
          </td>\
          <td>\
          <a href="javascript:void(0)"  id="'+i+'"  class="removeRowForProduct btn btn-danger btn-sm"><i class="fa fa-minus "></i></a>\
          </td>   \
          </tr>');
        $('[name^=product_id]').selectize({
          create: false,
          sortField: 'text'
        });
        $('[name^=service_id]').selectize({
          create: false,
          sortField: 'text'
        });
      });

      $('.addMoreForService').on("click",function(){
        j=parseInt(j)+1;       
          $("#tBodyForServiceTable").append('<tr id="AddRowForService'+j+'">\
          <td class="service_name">{{Form::select("service_id[]",$service, isset($service_id)?$service_id: "", ["class"=> " ","required"=>"true","placeholder"=>"Select" ,"id" => "service_id"])}}\
          </td>\
           <td>{{Form::text("service_quantity[]",isset($service_quantity)?$service_quantity:"",["class"=>"form-control","required"])}}</td>\
          <td ><div id="service_price"></div>\
          </td>\
          <td>\
          <a href="javascript:void(0)" id="'+j+'"  class="removeRowForService  btn btn-danger btn-sm"><i class="fa fa-minus "></i></a>\
          </td>   \
          </tr>');
              $('[name^=product_id]').selectize({
          create: false,
          sortField: 'text'
        });
        $('[name^=service_id]').selectize({
          create: false,
          sortField: 'text'
        });
      });

      $(document).on('click', '.removeRowForProduct', function(){  
          var button_id = $(this).attr("id");  
          $('#AddRowForProduct'+button_id+'').remove();  
      }); 

      $(document).on('click', '.removeRowForService', function(){  
          var button_id = $(this).attr("id");  
          $('#AddRowForService'+button_id+'').remove();  
      }); 

       $(document).on('change', '[name^=service_id]', function(){  

          // var serviceIdTest = [];
          // $('input[name^="service_id"]').each(function() {
          // serviceIdTest.push($(this).val())
          // });

          // console.log(JSON.stringify(serviceIdTest));

         var service_id=$(this).val();
         var thisSelf=$(this);
        //  console.log(  $(this).parent().parent().find('[name^=company_name]').val("ftuyh"));
             $.ajax({
             type: "POST",
             url: "{{url('/')}}/ajax/getService",
             data: { 
                     "_token": "{{ csrf_token() }}",
                    service_id : service_id,
                   },
             dataType : 'html',
             cache: false,
             success: function(data){
                var serviceDetail=JSON.parse(data);
                price=serviceDetail.price;
                thisSelf.parent().parent().find('#service_price').html(price);
                 
             }
             
         }); 
      }); 


   $(document).on('change', '[name^=product_id]', function(){  

          // var product = [];
          // $('input[name^="product_id"]').each(function() {
          // product.push($(this).val())
          // });
          // console.log(JSON.stringify(product));

         var product_id=$(this).val();
         var thisSelf=$(this);
             $.ajax({
             type: "POST",
             url: "{{url('/')}}/ajax/getPurchase",
             data: { 
                     "_token": "{{ csrf_token() }}",
                    product_id : product_id,
                   },
             dataType : 'html',
             cache: false,
             success: function(data){
              var productDetail=JSON.parse(data);
               price=productDetail.unit_price_exit;
               thisSelf.parent().parent().find('#product_price').html(price);
                
             }
             
         }); 
      }); 
  

      
    var workshopId="{{ isset($workshopId) ? $workshopId:null }}";
      if(workshopId!="")
      {
        location.href="{{url('/')}}/SaiAutoCare/workshop/view/"+workshopId;
      }
  });
</script>
@endsection