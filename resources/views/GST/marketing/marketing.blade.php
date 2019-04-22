@extends('samples') 
@section('content')
<section class="content" style="margin-left: 20px;margin-right: 20px;">
  <div class="row">
      <div class="col-sm-12" class="text-center">
         {{ Form::open(['url' => '/marketing/search','files' => 'true' ,'enctype' => 'multipart/form-data']) }} 
         <div class="table-responsive">
        <table class="table table-sm">
          <tr>
            <td>Marketing Id</td>
            <td>:</td>
            <td><!-- <input type="text" class="form-control-sm" name="id"> -->
                {{Form::text('id', isset($id)?$id: '', ['class' => 'form-control-sm form-control-sm ','id'=>'id', 'placeholder' => 'Supplier Id']  )}}
            </td>
            <td>&emsp;&emsp;</td>
            <td>User Name</td>
            <td>:</td>
            <td>
              {{Form::text('user_name', isset($user_name)?$user_name: '', ['class' => 'form-control-sm form-control-sm ','id'=>'user_name', 'placeholder' => '  Job Name']  )}}
            <td>&emsp;&emsp;</td>
            <td>User Id</td>
            <td>:</td>
            <td><input type="text" class="form-control-sm" name="user_id"></td>
            <td>&emsp;&emsp;</td>
          </tr>
          <tr>
            <td>To Date</td>
            <td>:</td>
            <td><input type="date" class="form-control-sm" name="created_at_from"></td>
            <td>&emsp;&emsp;</td>
            <td>From Date</td>
            <td>:</td>
            <td><input type="date" class="form-control-sm" name="created_at_to"></td>
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
            <i class="fa fa-align-justify"></i> supplier Detail
          </div>
          <div class="card-body table-responsive" style="font-size: 13px;padding-left:10px;vertical-align:middle;">
            <table id="datable_1" class="table  table-hover  " style="font-size: 13px;display:table-cell;" >
              <thead class="thead-dark">
                <tr>
                  <th style="white-space: nowrap">Marketing Id</th>
                  <th style="white-space: nowrap">User Name</th>
                  <th style="white-space: nowrap">User Email</th>
                  <th style="white-space: nowrap">Note</th>
                  <th style="white-space: nowrap">Quantity</th>
                  <th style="white-space: nowrap">Price</th>
                  <th style="white-space: nowrap">Total Price</th>
                  <th style="white-space: nowrap">Created Date</th>
                  <th style="white-space: nowrap">Updated Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($market as $key => $value)
                <tr>
                  <td>{{ $value['id'] }}</td>
                  <td>{{ $value['user_name'] }}</td>
                  <td>{{ $value['user_email'] }}</td>
                  <td>{{ $value['item'] }}</td>
                  <td>{{ $value['item_discription'] }}</td>
                  <td>{{ $value['quantity'] }}</td>
                  <td>{{ $value['price'] }}</td>
                  <td>{{ $value['total_price'] }}</td>
                  <td>{{ $value['created_at'] }}</td>
                  <td>{{ $value['updated_at'] }}</td>
                  <td style="white-space: nowrap">
                   <a href="{{ url('/')}}/marketing/add/{{ $value['id'] }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
                      <a href="{{ url('/')}}/marketing/trash/{{ $value['id']}} " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-remove"></i></a>
                  </td>
                </tr>  
                @endforeach
              </tbody>
            </table>
            <div class="col-lg-12 text-center">
              
            </div>
            <!-- <li><a href="#" id="json"> <i class="fa fa-print"></i> JSON</a></li>
                                <li><a href="#" onclick="$('#table').tableExport({type:'json',escape:'false'});"><img src="images/json.jpg" width="24px">JSON (ignoreColumn)</a></li> -->
           <!--  <p class="lead"><button id="json" class="btn btn-primary">TO JSON</button> <button id="csv" class="btn btn-info">TO CSV</button>  <button id="pdf" class="btn btn-danger">TO PDF</button></p> -->
          </div>
        </div>
    </div>
    
  </div>
                  
  <div class="row">
   
  </div>
</section>


<script type="text/javascript">


  $(document).ready(function() {
} );

</script>
@endsection