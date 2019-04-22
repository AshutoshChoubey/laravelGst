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
      <div class="row" id="modelDivHide" >
        <div class="col-sm-3 text-primary" id="brandShow" align="center"><button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-1x " aria-hidden="true" ></i></button>Add Brand</div>
        <div class="col-sm-3 text-success" id="modelShow" align="center"><button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-1x " aria-hidden="true" ></i></button>Add Model</div>       
        <div class="col-sm-3 text-success" id="serviceTypeShow" align="center"><button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-1x " aria-hidden="true" ></i></button>Add Service Type</div>
        <div class="col-sm-3 text-primary" id="serviceShow" align="center"><button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle fa-1x " aria-hidden="true" ></i></button>Add Service</div>
      </div>
      <div id="modelDiv" class="row"   > 
        <div class="col-md-6" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 18px 0 rgba(0,0,0,0.19);">
          <div class="card">
            {{ Form::open(['url' => 'SaiAutoCare/model/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'ON']) }}
            <div class="card-header">Add Model Name</div>
            <div class="card-body">
             <div class="row">
              <div class="col-md-6">
                <label class="form-col-form-label" for="brand_id">Brand Name</label>
                {{Form::select('brand_id',$brand_select,isset($brand_id)?$brand_id: '', ['class' => 'form-control form-control ','id'=>'brand_id','required', 'placeholder' => '  Brand Name'] )}}
               </div>
               <div class="col-md-6">
                <label class="form-col-form-label" for="brand_id">Modal Name</label>
                {{Form::text('model_name',isset($model_name)?$model_name: '', ['class' => 'form-control form-control ','id'=>'model_name','required', 'placeholder' => '  Model Name'] )}}
              </div>
             </div>
            </div>
            <div class="card-footer" align="center"><input class="btn btn-sm btn-primary" type="submit" id="add_model" value="Add"></div>
            {{ Form::close() }}
          </div>  
        </div>
        <div class="col-md-6" >
          <div class="card">
            <div class="card-header" style=" color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">Model List </div>
            <div class="card-body">
              <table  style="font-size: 13px;display:table-cell;" class="table  table-hover " >
                <thead >
                  <tr>
                    <th>ID</th>
                    <th>Brand ID</th>
                    <th>Model Name</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($model_list as $key)
                  <tr>
                    <td>{{ $key['id']  }}</td>
                    <td>{{ $key['brand_id']  }}</td>
                    <td>{{ $key['model_name']  }}</td>
                  </tr>

                  @endforeach
                </tbody>
                <tfoot><tr><td style="overflow: auto;" colspan="2">{{ $model_list->links() }}</td></tr></tfoot>

            </table>
            </div>
            <div class="card-footer">&nbsp;</div>
          </div>  
        </div>

      </div>
      <div class="row" id="brandDiv">
        <div class="col-md-6" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 18px 0 rgba(0,0,0,0.19);">
          <div class="card">
            {{ Form::open(['url' => 'SaiAutoCare/brand/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'ON']) }}

            <div class="card-header">Add Brand Name</div>
            <div class="card-body">
              {{Form::text('brand_name',isset($brand_name)?$brand_name: '', ['class' => 'form-control form-control ','id'=>'brand_name','required', 'placeholder' => '  Brand Name'] )}}
            </div>
            <div class="card-footer" align="center"><input class="btn btn-sm btn-primary" type="submit" id="add_model" value="Add"></div>
            {{ Form::close() }}
          </div>  
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Brand List </div>
            <div class="card-body">
                <table style="font-size: 13px;display:table-cell;" class="table  table-hover " >
                  <thead >
                    <tr>
                      <th>ID</th>
                      <th>Brand Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($brand_list as $key)

                    <tr>
                      <td>{{ $key['id']  }}</td>
                      <td>{{ $key['brand_name']  }}</td>
                    </tr>

                    @endforeach
                  </tbody>
                  
                  <tfoot><tr><td style="overflow: auto;" colspan="2">{{ $brand_list->links() }}</td></tr></tfoot>
                  
                </table>
              </div>
            <div class="card-footer"></div>
          </div>  
        </div>
      </div> 

       <div class="row" id="serviceDiv">
        <div class="col-md-6" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 18px 0 rgba(0,0,0,0.19);">
          <div class="card">
            {{ Form::open(['url' => 'SaiAutoCare/service_name/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'ON']) }}

            <div class="card-header">Add Service Name</div>
             <div class="card-body">
                <div class="col-md-6">
                  <label class="form-col-form-label" for="brand_id">Service Type</label>
                  {{Form::select('service_type_id',$service_type_select,isset($service_type_id)?$service_type_id: '', ['class' => 'form-control form-control ','id'=>'service_type','required', 'placeholder' => '  Service Type'] )}}
               </div>
               <div class="col-md-6">
                <label class="form-col-form-label" for="brand_id">Service Name</label>
                {{Form::text('service_name',isset($service_name)?$service_name: '', ['class' => 'form-control form-control ','id'=>'service_name','required', 'placeholder' => '  Service Name'] )}}
              </div>         
            </div>
            <div class="card-footer" align="center"><input class="btn btn-sm btn-primary" type="submit" id="add_model" value="Add"></div>
            {{ Form::close() }}
          </div>  
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Service List </div>
            <div class="card-body">
              <table style="font-size: 13px;display:table-cell;" class="table  table-hover " >
                <thead>
              <tr>
                  <th>ID</th>
                  <th>Service Type Id</th>
                  <th>Service Name</th>
                </tr>
              </thead>
              <tbody>
                @foreach($service_name_list as $key)                
                  <tr>
                     <td>{{ $key['id']  }}</td>
                     <td>{{ $key['service_type_id']  }}</td>
                    <td>{{ $key['service_name']  }}</td>
                  </tr>
                   @endforeach
                    </tbody>
                <tfoot><tr><td style="overflow: auto;" colspan="3">{{ $service_name_list->links() }}</td></tr></tfoot>
                   </table>
            </div>
            <div class="card-footer"></div>
          </div>  
        </div>
      </div> 


       <div class="row" id="serviceTypeDiv">
        <div class="col-md-6" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 18px 0 rgba(0,0,0,0.19);">
          <div class="card">
            {{ Form::open(['url' => 'SaiAutoCare/serviceType/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'ON']) }}

            <div class="card-header">Add Service Type</div>
            <div class="card-body">
              {{Form::text('service_type_name',isset($service_type_name)?$service_type_name: '', ['class' => 'form-control form-control ','id'=>'service_type_name','required', 'placeholder' => '  Service Type'] )}}
            </div>
            <div class="card-footer" align="center"><input class="btn btn-sm btn-primary" type="submit" id="add_model" value="Add"></div>
            {{ Form::close() }}
          </div>  
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Service type List </div>
            <div class="card-body">
              <table style="font-size: 13px;display:table-cell;" class="table  table-hover " >
                <thead>
               <tr>
                  <th>ID</th>
                  <th>Service Type Name</th>
                </tr>
              </thead>
              <tbody>
                @foreach($service_type_list as $key)
                
                  <tr>
                     <td>{{ $key['id']  }}</td>
                    <td>{{ $key['service_type_name']  }}</td>
                  </tr>
                  @endforeach
                   </tbody>
                <tfoot><tr><td style="overflow: auto;" colspan="2">{{ $service_type_list->links() }}</td></tr></tfoot>
                  </table>
            </div>
            <div class="card-footer"></div>
          </div>  
        </div>
      </div>
 <div class="row"><div class="col-md-12">&nbsp;</div></div>
      <div class="row">
        <div class="col-md-12">
            <div class="card">

      {{ isset($id)?Form::open(['url' => 'SaiAutoCare/service/update','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'SaiAutoCare/service/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
   {{ csrf_field() }}
   {{ Form::hidden('id', isset($id) ? $id :'', []) }}  
   <div class="card-body"> 
    <div class="row">
       <div class="col-md-4">
           <div class="form-group">
          <label class="form-col-form-label" for="brand_name">Brand Name</label>
          {{Form::select('brand_name',$brand_select,isset($brand_name)?$brand_name: '', ['class' => 'form-control form-control ','id'=>'brand_name','required', 'placeholder' => '  Service Type'] )}}
            <div class="invalid-feedback">
            {{ $errors->has('brand_name') ? $errors->first('brand_name', ':message') : '' }}
            </div>
          </div>          
        </div> 
        <div class="col-md-4">
           <div class="form-group">
          <label class="form-col-form-label" for="model_name">Model Name</label>
          {{Form::select('model_name',$model_select,isset($model_name)?$model_name: '', ['class' => 'form-control form-control ','id'=>'model_name','required', 'placeholder' => '  Model Name'] )}}
            <div class="invalid-feedback">
            {{ $errors->has('model_name') ? $errors->first('model_name', ':message') : '' }}
            </div>
          </div>          
        </div>               
      </div>  
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="service_type">Service Type</label>
          {{Form::select('service_type',$service_type_select,isset($service_type)?$service_type: '', ['class' => 'form-control form-control ','id'=>'service_type','required', 'placeholder' => '  Service Type'] )}}
            <div class="invalid-feedback">
            {{ $errors->has('service_type') ? $errors->first('service_type', ':message') : '' }}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-grou">
          <label class="form-col-form-label" for="service_name">Service Name</label>
          {{Form::select('service_name',$service_name_select,isset($service_name)?$service_name: '', ['class' => 'form-control form-control ', 'placeholder' => 'Service Name'] )}}
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
      
     
    </div>
     </div>             
      <div class="card-footer">
        <div class="text-center">
          <input type="submit"  class="btn btn-primary" value="{{ isset($id)?'update':'Add' }}">
        </div>               
      </div>
      {{ Form::close() }}
    </div>
    </div>
    </div>
    </div>     
  <!--/.col (left) -->
  

      <!-- /.row -->
</section>

<script type = "text/javascript" language = "javascript">

      hide();
      function hide()
      {
        $('#modelDiv').hide();
        $('#brandDiv').hide();
        $('#serviceDiv').hide();
        $('#serviceTypeDiv').hide();
      }    

      $('#modelShow').on("click",function()
      {
        hide();
         $('#modelDiv').show();
      });
      $('#modelShow').on("dblclick",function()
      {
        hide();
         $('#modelDiv').hide();
      });

       $('#brandShow').on("click",function()
      {
        hide();
         $('#brandDiv').show();
      });
      $('#brandShow').on("dblclick",function()
      {
        hide();
         $('#brandDiv').hide();
      });

      $('#serviceShow').on("click",function()
      {
        hide();
         $('#serviceDiv').show();
      });
      $('#serviceShow').on("dblclick",function()
      {
        hide();
         $('#serviceDiv').hide();
      });
       $('#serviceTypeShow').on("click",function()
      {
        hide();
         $('#serviceTypeDiv').show();
      });
      $('#serviceTypeShow').on("dblclick",function()
      {
        hide();
         $('#serviceTypeDiv').hide();
      });
     $(document).on("change","[name^=brand_name]",function(){
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
          // console.log(data);
          // console.log(modalData);
          // console.log(modalData.id);
          // console.log(modalData.model_name);
          $('[name=model_name]')
               .empty()
               .append('<option selected="selected" value="">-Select -</option>');
               for (index = 0; index < modalData.length; ++index) {
              $('[name=model_name]').append(
                '<option value="'+modalData[index]['id']+'">'+modalData[index]['model_name']+'</option>'
              );   
            }
        }
      });
     });   


      $(document).on("change","[name^=service_type]",function(){
      var service_type_id = $(this).val();
      $.ajax({
        type:"POST",
        url: "{{url('/')}}/ajax/getServiceThroughServiceId",
        data:{
          "_token": "{{ csrf_token() }}",
          service_type_id : service_type_id,
        },
        dataType : 'html',
        cache: false,
        success: function(data){
          modalData=JSON.parse(data);
          // console.log(data);
          // console.log(modalData);
          // console.log(modalData.id);
          // console.log(modalData.model_name);
          $('[name=service_name]')
               .empty()
               .append('<option selected="selected" value="">-Select -</option>');
               for (index = 0; index < modalData.length; ++index) {
              $('[name=service_name]').append(
                '<option value="'+modalData[index]['service_name']+'">'+modalData[index]['service_name']+'</option>'
              );   
            }
        }
      });
     });    

</script>
@endsection