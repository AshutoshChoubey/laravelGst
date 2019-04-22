@extends('samples') 
@section('content')
<section class="content" style="margin-left: 20px;margin-right: 20px;">
   {{ isset($id)?Form::open(['url' => 'SaiAutoCare/service/update','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'SaiAutoCare/service/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
   {{ csrf_field() }}
   {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
  <div class="card">
    <div class="card-header">
      <h4 class="box-title text-primary ">Please Fill Up Service Details</h4>
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
          <label class="form-col-form-label" for="service_type">Service Type</label>
          {{Form::text('service_type',isset($service_type)?$service_type: '', ['class' => 'form-control form-control ','id'=>'service_type','required', 'placeholder' => '  Service Type'] )}}
            <div class="invalid-feedback">
            {{ $errors->has('service_type') ? $errors->first('service_type', ':message') : '' }}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-grou">
          <label class="form-col-form-label" for="service_name">Service Name</label>
          {{Form::text('service_name',isset($service_name)?$service_name: '', ['class' => 'form-control form-control ', 'placeholder' => 'Service Name'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('service_name') ? $errors->first('service_name', ':message') : '' }}
          </div>
          </div>
        </div> 
        <div class="col-md-4">
          <div class="form-grou">
          <label class="form-col-form-label" for="price">
            Price
          </label>
          {{Form::number('price',isset($price)?$price: '', ['class' => 'form-control form-control ', 'placeholder' => 'Price'] )}}
          <div class="invalid-feedback">
          {{ $errors->has('price') ? $errors->first('price', ':message') : '' }}
          </div>
          </div>
        </div>
      
      </div> 
      <div class="row">
        <div class="col-md-4">
           <div class="form-group">
          <label class="form-col-form-label" for="model_name">Model Name</label>
          {{Form::text('model_name',isset($model_name)?$model_name: '', ['class' => 'form-control form-control ','id'=>'model_name','required', 'placeholder' => '  Model Name'] )}}
            <div class="invalid-feedback">
            {{ $errors->has('model_name') ? $errors->first('model_name', ':message') : '' }}
            </div>
          </div>
          
        </div>
         <div class="col-md-4">
           <div class="form-group">
          <label class="form-col-form-label" for="brand_name">Brand Name</label>
          {{Form::text('brand_name',isset($brand_name)?$brand_name: '', ['class' => 'form-control form-control ','id'=>'brand_name','required', 'placeholder' => '  Service Type'] )}}
            <div class="invalid-feedback">
            {{ $errors->has('brand_name') ? $errors->first('brand_name', ':message') : '' }}
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
    $(document).ready(function() {
  });
</script>


@endsection