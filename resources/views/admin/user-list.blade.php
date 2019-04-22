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
<style>
  @media print {
    .table {
        background-color: white;  
        color: black
    }
 
    /* More print styles */
  /* ...style="background-color: black;color: white" */
}
</style>

<section class="content" style="margin-left: 20px;margin-right: 20px;">
  <div class="row" style="display:none">

      <div class="col-sm-12" class="text-center">
         {{ Form::open(['url' => 'SaiAutoCare/product/search','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
        <div class="table-responsive">
        <table class="table">
          <tr>
            <td>Product Id</td>
            <td>:</td>
            <td><!-- <input type="text" class="form-control" name="id"> -->
                {{Form::text('id', isset($id)?$id: '', ['class' => 'form-control form-control ','id'=>'id', 'placeholder' => '  Job Id']  )}}
            </td>
            <td>&emsp;&emsp;</td>
            <td>Product Name</td>
            <td>:</td>
            <td>
              {{Form::text('product_name', isset($product_name)?$product_name: '', ['class' => 'form-control form-control ','id'=>'product_name', 'placeholder' => 'Product Name']  )}}
            <td></td>
          </tr>
          <tr>
            <td>To Date</td>
            <td>:</td>
            <td><input type="date" class="form-control" name="created_at_from"></td>
            <td>&emsp;&emsp;</td>
            <td>From Date</td>
            <td>:</td>
            <td><input type="date" class="form-control" name="created_at_to"></td>
            <td></td>
          </tr>
          <tr>
            <td>Company Name</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="company_name"></td>
            <td>&emsp;&emsp;</td>
            <td>Model Number</td>
            <td>:</td>
            <td><input type="text"  class="form-control" name="model_number"></td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="8" class="text-center"><input type="submit" name="search" class="btn btn-primary" value="Search"></td>
          </tr>
        </table>
      </div>
         {{Form::close()}}
      </div>
  </div>
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
    <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> User List
          </div>
          <div class="card-body table-responsive" style="font-size: 13px;padding-left:10px;vertical-align:middle;">
            <table id="example" class="table table-bordered" >
              <thead class="thead-dark">
                <tr>
                  <th style="white-space: nowrap">User Id</th>
                  <th style="white-space: nowrap">User Name</th>
                  <th style="white-space: nowrap">User Email</th>
                  <th style="white-space: nowrap">Role Id</th>
                  <th style="white-space: nowrap">Role Name</th>
                  <th style="white-space: nowrap">User Phone</th>
                  <th style="white-space: nowrap">Address</th>
                 
                  <th style="white-space: nowrap">Created Date</th>
                  <th style="white-space: nowrap">Updated Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tableData as $key => $value)
                <tr>
                  <td>{{ $value['UserId'] }}</td>
                  <td>{{ $value['name'] }}</td>
                  <td>{{ $value['email'] }}</td>
                  <td>{{ $value['role_id'] }}</td>
                  <td>{{ $value['role_name'] }}</td>
                  <td>{{ $value['mobile_number'] }}</td>
                  <td>{{ $value['Address'] }}</td>
                 
                  <td>{{ $value['created_at'] }}</td>
                  <td>{{ $value['updated_at'] }}</td>
                  <td style="white-space: nowrap">
                   <a href="{{ url('/')}}/employee-edit/{{ $value['UserId'] }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
                      {{-- <a href="{{ url('/')}}/employee/trash/{{ $value['UserId'] }} " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-remove"></i></a> --}}
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
                  
  <div class="row">
   
  </div>
</section>


<script type="text/javascript">


  $(document).ready(function() {

   // $('#datable').DataTable();


} );

</script>
<script type="text/javascript">
       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
</script>
@endsection