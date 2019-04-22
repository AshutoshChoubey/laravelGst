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
@extends('main') 
@section('content')
<style type="text/css">
  @media print {
    .table {
        background-color: white;  
        color: black
    }
 
    /* More print styles */
  /* ...style="background-color: black;color: white" */
}
</style>
<section class="content" >
  <!-- For Session Message -->
    <div class="row">
      <!-- left column -->
      <div class="col-lg-12 col-sm-12">
        <!-- general form elements -->
        <div class="card box-primary">
          <div class="card-header with-border text-center">
            <h4 class="box-title text-primary ">Please Fill Up Suppliers Details</h4>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          @if(session()->has('message.level'))
          <div class="card-body">

            <div class="alert alert-icon-{{ session('message.level') }} alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <div class="alert-icon icon-part-{{ session('message.level') }}">
                <i class="fa fa-{{ session('message.icon') }}"></i>
              </div>
              <div class="alert-message">
                <span>  {!! session('message.content') !!}</span>
              </div>
            </div>
             
              
          
          </div>
           @endif
        </div>
      </div>
    </div>
  <!-- For Session Message -->
    <div class="row">
      <div  class="col-lg-12 text-center" style="display:{{ isset($id)?'block':'none' }}">
                      
                             <button type="button" class="btn btn-light waves-effect waves-light" data-toggle="modal" data-target="#modal-animation-3"><i class="fa fa-plus">Add Supplier</i></button>
                        
      </div> 

       <div class="modal fade" id="modal-animation-3">
                  <div class="modal-dialog">
                     {{ Form::open(['url' => 'GST/supplier/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
                    {{ csrf_field() }}
                    {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
                    <div class="modal-content animated zoomInUp">
                      <div class="modal-header">
                        <h5 class="modal-title">Supplier Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                            <div class="row">
                    <div class="col-md-12">
                    <div class="form-groupp">
                    <label class="form-col-form-label" for="name">Supplier Name</label>
                    {{Form::text('supplier_name', isset($supplier_name)?$supplier_name: '', ['class' => 'form-control form-control ','id'=>'supplier_name','required', 'placeholder' => '  Name']  )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('supplier_name') ? $errors->first('name', ':message') : '' }}
                    </div>
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label class="form-col-form-label" for="mob_num">Contact Number</label>
                    {{Form::number('mob_num',isset($mob_num)?$mob_num: '', ['class' => 'form-control form-control ', 'placeholder' => 'Mobile Number'] )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('mob_num') ? $errors->first('mob_num', ':message') : '' }}
                    </div>
                    </div>
                    </div> 

                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label class="form-col-form-label" for="Email">Email</label>
                    {{Form::text('email',isset($email)?$email: '', ['class' => 'form-control form-control ', 'placeholder' => 'Email'] )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('email') ? $errors->first('email', ':message') : '' }}
                    </div>
                    </div>
                    </div> 
                  </div>
                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                      <label class="form-col-form-label" for="gstin">GSTIN</label>
                      {{Form::text('gstin',isset($gstin)?$gstin: '', ['class' => 'form-control form-control ', 'placeholder' => 'GSTIN'] )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('gstin') ? $errors->first('gstin', ':message') : '' }}
                      </div>
                    </div>
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label class="form-col-form-label" for="address">Address</label>
                    {{Form::textarea('address',isset($address)?$address: '', ['class' => 'form-control form-control ', 'style'=>'height:75px','placeholder' => 'Address'] )}}
                    <div class="invalid-feedback">
                    {{ 
                    $errors->has('address') ? $errors->first('address', ':message') : '' }}
                    </div>
                    </div>
                    </div> 
                  </div>
                      </div>
                      <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button> --}}
                         <button type="submit" class="btn btn-sm btn-primary" name=""> <i class="fa fa-dot-circle-o"></i>Add</button> 
                <button type="reset" class="btn btn-sm btn-danger" name=""> <i class="fa fa-ban"></i> Reset</button> 
                      </div>
                    </div>
                    {{Form::close()}}
                  </div>
        </div>


        <div class="col-lg-4" >
          {{ Form::open(['url' => 'GST/supplier/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 

          {{ isset($id)?Form::open(['url' => 'GST/supplier/update','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'GST/supplier/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 


          {{ csrf_field() }}
          {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
          <div class="card">
            <div class="card-header text-uppercase">Supplier Details</div>
            <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="form-groupp">
                    <label class="form-col-form-label" for="name">Supplier Name</label>
                    {{Form::text('supplier_name', isset($supplier_name)?$supplier_name: '', ['class' => 'form-control form-control ','id'=>'supplier_name','required', 'placeholder' => '  Name']  )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('supplier_name') ? $errors->first('name', ':message') : '' }}
                    </div>
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label class="form-col-form-label" for="mob_num">Contact Number</label>
                    {{Form::number('mob_num',isset($mob_num)?$mob_num: '', ['class' => 'form-control form-control ', 'placeholder' => 'Mobile Number'] )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('mob_num') ? $errors->first('mob_num', ':message') : '' }}
                    </div>
                    </div>
                    </div> 

                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label class="form-col-form-label" for="Email">Email</label>
                    {{Form::text('email',isset($email)?$email: '', ['class' => 'form-control form-control ', 'placeholder' => 'Email'] )}}
                    <div class="invalid-feedback">
                    {{ $errors->has('email') ? $errors->first('email', ':message') : '' }}
                    </div>
                    </div>
                    </div> 
                  </div>
                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                      <label class="form-col-form-label" for="gstin">GSTIN</label>
                      {{Form::text('gstin',isset($gstin)?$gstin: '', ['class' => 'form-control form-control ', 'placeholder' => 'GSTIN'] )}}
                      <div class="invalid-feedback">
                      {{ $errors->has('gstin') ? $errors->first('gstin', ':message') : '' }}
                      </div>
                    </div>
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label class="form-col-form-label" for="address">Address</label>
                    {{Form::textarea('address',isset($address)?$address: '', ['class' => 'form-control form-control ', 'style'=>'height:75px','placeholder' => 'Address'] )}}
                    <div class="invalid-feedback">
                    {{ 
                    $errors->has('address') ? $errors->first('address', ':message') : '' }}
                    </div>
                    </div>
                    </div> 
                  </div>
            </div>

            <div class="card-footer">
                <div class="row">
                <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-sm btn-primary" name=""> <i class="fa fa-dot-circle-o"></i>{{isset($id) ? 'Update' :'Add' }}</button> 
                <button type="reset" class="btn btn-sm btn-danger" name=""> <i class="fa fa-ban"></i> Reset</button> 
                </div>
              </div>                
            </div>

          </div>
          {{Form::close()}}
        </div>


<div class="col-lg-8">
  <div class="card">
    <div class="card-header text-uppercase">Supplier Details</div>
    <div class="card-body">


    <div class="row">
        <div class="col-sm-12" class="text-center">
          {{ Form::open(['url' => 'GST/supplier/search','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
          <div class="row">
            <div class="col-sm-4">
            <div class="form-group">
            <label for="id-6">Supplier Id</label>
            {{Form::text('id', isset($id)?$id: '', ['class' => 'form-control form-control-rounded ','id'=>'id', 'placeholder' => 'Supplier Id']  )}}
            </div>
            </div>
            <div class="col-sm-4">

            <div class="form-group">
            <label for="input-6">Supplier Name</label>
            {{Form::text('supplier_name', isset($supplier_name)?$supplier_name: '', ['class' => 'form-control form-control-rounded','id'=>'supplier_name', 'placeholder' => '  Job Name']  )}}
            </div>

            </div> 
            <div class="col-sm-4">
            <div class="form-group">
            <label for="mob_num">Mobile Number</label>
            <input type="text"  id="mob_num" class="form-control form-control-rounded" name="mob_num">
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
            <div class="form-group">
            <label for="input-6">To Date</label>
            <input type="text"  id="autoclose-datepicker_to" class="form-control form-control-rounded" name="created_at_from">
            </div>
            </div>
            <div class="col-sm-4">
            <div class="form-group">
            <label for="input-6">From Date</label>
            <input type="text"  id="autoclose-datepicker_from" class="form-control form-control-rounded" name="created_at_to">
            </div>
            </div>
            <div class="col-sm-4">
            <div class="form-group">
            <label for="input-6">Email</label>
            <input type="text"  id="email" class="form-control form-control-rounded" name="email">
            </div>
            </div>

          </div> 
          <div class="row">
            <div class="col-sm-12 text-center">
            <input type="submit" name="search" class="btn btn-warning btn-round waves-effect waves-light m-1" value="Search">
            </div>
            </div>
          {{Form::close()}}
        </div>
      </div>


      

    </div>

    </div>
  </div>
  </div>


      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> supplier Detail
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered" >
                <thead>
                  <tr>
                    <th >Supplier Id</th>
                    <th >Supplier Name</th>
                    <th >Mobile Number</th>
                    <th >Email</th>
                    {{-- <th >Address</th> --}}
                    <th >GSTIN</th>
                    <th >Created Date</th>
                    {{-- <th >Updated Date</th> --}}
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>


                @foreach($supplier as $key => $value)
                  <tr>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['supplier_name'] }}</td>
                    <td>{{ $value['mob_num'] }}</td>
                    <td>{{ $value['email'] }}</td>
                    {{-- <td>{{ $value['address'] }}</td> --}}
                    <td>{{ $value['gstin'] }}</td>
                    <td>{{ $value['created_at'] }}</td>
                    {{-- <td>{{ $value['updated_at'] }}</td> --}}
                    <td >
                    <a href="{{ url('/')}}/GST/supplier/add/{{ $value['id'] }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
                    <a href="{{ url('/')}}/GST/supplier/trash/{{ $value['id']}} " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-remove"></i></a>
                    </td>
                  </tr>  
                @endforeach
                </tbody>
              </table>
              <div class="col-lg-12 text-center">

              </div>
            </div>
          </div>
          </div>
          </div>

       </div>
    
     <!--End Row-->
    

 
                  
  
</section>
<script type="text/javascript">
  $('#autoclose-datepicker_to').datepicker({
        autoclose: true,
        todayHighlight: true
      });
   $('#autoclose-datepicker_from').datepicker({
        autoclose: true,
        todayHighlight: true
      });

   $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
</script>

@endsection