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
  <div class="row">
      <div class="col-sm-12" class="text-center">
         {{ Form::open(['url' => 'SaiAutoCare/supplier/search','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
         <div class="table-responsive">
        <table class="table table-sm">
          <tr>
            <td>Supplier Id</td>
            <td>:</td>
            <td><!-- <input type="text" class="form-control-sm" name="id"> -->
                {{Form::text('id', isset($id)?$id: '', ['class' => 'form-control-sm form-control-sm ','id'=>'id', 'placeholder' => 'Supplier Id']  )}}
            </td>
            <td>&emsp;&emsp;</td>
            <td>Supplier Name</td>
            <td>:</td>
            <td>
              {{Form::text('supplier_name', isset($supplier_name)?$supplier_name: '', ['class' => 'form-control-sm form-control-sm ','id'=>'supplier_name', 'placeholder' => '  Job Name']  )}}
            <td></td>
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
            <td>Mobile Number</td>
            <td>:</td>
            <td><input type="text" class="form-control-sm" name="mob_num"></td>
            <td>&emsp;&emsp;</td>
            <td>Email</td>
            <td>:</td>
            <td><input type="text"  class="form-control-sm" name="email"></td>
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
                  <th style="white-space: nowrap">Supplier Id</th>
                  <th style="white-space: nowrap">Supplier Name</th>
                  <th style="white-space: nowrap">Mobile Number</th>
                  <th style="white-space: nowrap">Email</th>
                  <th style="white-space: nowrap">Address</th>
                  <th style="white-space: nowrap">GSTIN</th>
                  <th style="white-space: nowrap">Created Date</th>
                  <th style="white-space: nowrap">Updated Date</th>
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
                  <td>{{ $value['address'] }}</td>
                  <td>{{ $value['gstin'] }}</td>
                  <td>{{ $value['created_at'] }}</td>
                  <td>{{ $value['updated_at'] }}</td>
                  <td style="white-space: nowrap">
                   <a href="{{ url('/')}}/SaiAutoCare/supplier/add/{{ $value['id'] }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
                      <a href="{{ url('/')}}/SaiAutoCare/supplier/trash/{{ $value['id']}} " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-remove"></i></a>
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

   // $('#datable').DataTable();

     //alert("fine");
  //  $("#table").tableHTMLExport({
  // // csv, txt, json, pdf
  // type:'json',
  // // file name
  // filename:'sample.json'
  // });
  //    $('#json').on('click',function(){
  //     alert("fine");
  //   $("#table").tableHTMLExport({type:'json',filename:'sample.json'});
  // })
  // $('#csv').on('click',function(){
  //      alert("fine");
  //   $("#table").tableHTMLExport({type:'csv',filename:'sample.csv'});
  // })
  // $('#pdf').on('click',function(){
  //      alert("fine");
  //   $("#table").tableHTMLExport({type:'pdf',filename:'sample.pdf'});
  // })
  // $('#json').on('click',function(){
  //     alert("fine");
  //  $('#table').tableExport({type:'csv'});
  // })
  
} );

</script>
@endsection