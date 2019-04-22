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
            <i class="fa fa-align-justify"></i> Trashed Party
          </div>
          <div class="card-body table-responsive" style="font-size: 13px;padding-left:10px;vertical-align:middle;">
            <table id="datable_1" class="table  table-hover  " style="font-size: 13px;display:table-cell;width:100%;" >
              <thead class="thead-dark">
                <tr>
                  <th  style="white-space: nowrap">Job Id</th>
                  <th style="white-space: nowrap"style="white-space: nowrap" >Job Name</th>
                 <!--  <th width="20%" >Reference</th>
                  <th width="10%" >Company</th>
                  <th width="10%" >GSTIN</th> -->
                  <th  style="white-space: nowrap">Mobile</th>
                  <th style="white-space: nowrap" >Email</th>
                  <!-- <th style="white-space: nowrap" >Address</th> -->
                  <th style="white-space: nowrap">Vehicle Reg. Number</th>
                  <!-- <th width="30%">Model Year</th> -->
                  <th style="white-space: nowrap">Company Name</th>
                  <th style="white-space: nowrap">Model Number</th>
                  <!-- <th width="30%">VIN</th>
                  <th width="30%">Reg Number</th>
                  <th width="30%">Odometer Reading</th>
                  <th width="30%">Color</th>
                  <th width="30%">Fuel Type</th>
                  <th width="30%">Engine Number</th>
                  <th width="30%">Key Number</th> -->
                  <th style="white-space: nowrap">Due In</th>
                  <th style="white-space: nowrap">due Out</th>
                  <th style="white-space: nowrap">Status</th>
                  <!-- <th width="30%">Advisor</th> -->
                  <th style="white-space: nowrap">Notes</th>
                  <th style="white-space: nowrap">Created Date</th>
                  <!-- <th width="30%">Updated Date</th> -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($TrashedParty as $key => $value)
               <tr>
                  <td>{{ $value['id'] }}</td>
                  <td>{{ $value['name'] }}</td>
                 <!--  <td>{{ $value['reference'] }}</td>
                  <td>{{ $value['company'] }}</td>
                  <td>{{ $value['gst_no'] }}</td> -->
                  <td>{{ $value['mobile'] }}</td>
                  <td>{{ $value['email'] }}</td>
                 <!--  <td>{{ $value['address'].",
                  ".$value['city'].",
                  ".$value['state'].",
                  ".$value['pin'] }}</td> -->
                  <td>{{ $value['vehicle_reg_number'] }}</td>
                  <!-- <td>{{ $value['model_year'] }}</td> -->
                  <td>{{ $value['company_name'] }}</td>
                  <td>{{ $value['model_number'] }}</td>
                 <!--  <td>{{ $value['vin'] }}</td>
                  <td>{{ $value['reg_number'] }}</td>
                  <td>{{ $value['odometer_reading'] }}</td>
                  <td>{{ $value['color'] }}</td>
                  <td>{{ $value['fuel_type'] }}</td>
                  <td>{{ $value['engine_number'] }}</td>
                  <td>{{ $value['key_number'] }}</td> -->
                  <td>{{ $value['due_in'] }}</td>
                  <td>{{ $value['due_out'] }}</td>
                  <td>{{ $value['status'] }}</td>
                  <!-- <td>{{ $value['advisor'] }}</td> -->
                  <td>{{ $value['notes'] }}</td>
                  <td>{{ $value['created_at'] }}</td>
                  <!-- <td>{{ $value['updated_at'] }}</td> -->
                  <td style="white-space: nowrap">
                   <!-- <a href="{{ url('/')}}/gst/manage-party/add/{{ $value['id'] }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>  -->
                      <a href="{{ url('/')}}/SaiAutoCare/workshop/delete/{{ $value['id']}} " class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>  
                @endforeach
              </tbody>
            </table>
            <div class="col-lg-12 text-center">
              {{ $TrashedParty->links() }}
            </div>
          </div>
        </div>
    </div>
    
  </div>
                  
  <div class="row">
   
  </div>
</section>
@endsection
@section('extra-javascript')
<script type="text/javascript">
  
</script>
@endsection