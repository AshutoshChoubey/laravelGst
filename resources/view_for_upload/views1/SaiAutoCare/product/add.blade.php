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
@extends('samples') 
@section('content')
<section class="content" style="margin-left: 20px;margin-right: 20px;">
   {{ isset($id)?Form::open(['url' => 'SaiAutoCare/product/update','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'SaiAutoCare/product/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
   {{ csrf_field() }}
   {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
  <div class="card">
    <div class="card-header">
      <h4 class="box-title text-primary ">Please Fill Up Spare Details</h4>
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
          <label class="form-col-form-label" for="product_name">Spare Name</label>
          {{Form::text('product_name',isset($product_name)?$product_name: '', ['class' => 'form-control form-control ','id'=>'product_name','required', 'placeholder' => '  Spare Name'] )}}
            <div class="invalid-feedback">
            {{ $errors->has('product_name') ? $errors->first('product_name', ':message') : '' }}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-grou">
          <label class="form-col-form-label" for="company_name">Brand Name</label>
          {{Form::select('company_name',$brand_select,isset($company_name)?$company_name: '', ['class' => 'form-control form-control ', 'placeholder' => 'Brand Name'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('company_name') ? $errors->first('company_name', ':message') : '' }}
          </div>
          </div>
        </div> 
        <div class="col-md-4">
          <div class="form-grou">
          <label class="form-col-form-label" for="model_number">Model Name</label>
          {{Form::select('model_number',$model_select,isset($model_number)?$model_number: '', ['class' => 'form-control form-control ', 'placeholder' => 'Model Name'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('model_number') ? $errors->first('model_number', ':message') : '' }}
          </div>
          </div>
        </div>
      </div> 
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="hsn">HSN</label>
          {{Form::text('hsn',isset($hsn)?$hsn: '', ['class' => 'form-control form-control ','id'=>'hsn','required', 'placeholder' => 'HSN'] )}}
            <div class="invalid-feedback">
            {{ $errors->has('hsn') ? $errors->first('hsn', ':message') : '' }}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-grou">
          <label class="form-col-form-label" for="unit_price">Unit Price</label>
          {{Form::number('unit_price',isset($unit_price)?$unit_price: '', ['class' => 'form-control form-control ', 'placeholder' => 'Unit Price'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('unit_price') ? $errors->first('unit_price', ':message') : '' }}
          </div>
          </div>
        </div> 
        <div class="col-md-4">
          <div class="form-grou">
          <label class="form-col-form-label" for="gst">GST</label>
          {{Form::number('gst',isset($gst)?$gst: '', ['class' => 'form-control form-control ', 'placeholder' => 'GST'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('gst') ? $errors->first('gst', ':message') : '' }}
          </div>
          </div>
        </div>
      </div> 
     </div>             
      <div class="card-footer">
        <div class="text-center">
          <input type="submit"  class="btn btn-primary" value="{{ isset($id)?'update':'Add' }}">
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
      $(document).on("change","[name^=company_name]",function(){
          var thisSelf=$(this);
      var brand = $(this).val();
      $.ajax({
        type:"POST",
        url: "{{url('/')}}/ajax/getModal",
        data:{
          "_token": "{{ csrf_token() }}",
          brand : brand,
        },
        dataType : 'html',
        cache: false,
        success: function(data){
          modalData=JSON.parse(data);
          // console.log(modalData.id);
          // console.log(modalData.model_name);
           $('[name^=model_number]')
               .empty()
               .append('<option selected="selected" value="">-Select -</option>');
               for (index = 0; index < modalData.length; ++index) {
               $('[name^=model_number]').append(
                '<option value="'+modalData[index]['id']+'">'+modalData[index]['model_name']+'</option>'
              );   
            }
        }
      });
     }); 
      
  });
</script>


@endsection