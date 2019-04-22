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
@php
 $role_id=Auth::user()->role_id;
@endphp
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      @if($role_id==1)
      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-primary">
          <div class="card-body pb-0">
            <div class="btn-group float-right">
              <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-settings"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
            <h4 class="mb-0">9.823</h4>
            <p>Job Sheet</p>
          </div>
          <div class="chart-wrapper px-3" style="height:70px;">
            <canvas id="card-chart1" class="chart" height="70"></canvas>
          </div>
        </div>
      </div>
      <!--/.col-->

      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-info">
          <div class="card-body pb-0">
            <button type="button" class="btn btn-transparent p-0 float-right">
              <i class="icon-location-pin"></i>
            </button>
            <h4 class="mb-0">9.823</h4>
            <p>Pending Job</p>
          </div>
          <div class="chart-wrapper px-3" style="height:70px;">
            <canvas id="card-chart2" class="chart" height="70"></canvas>
          </div>
        </div>
      </div>
      <!--/.col-->

      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-warning">
          <div class="card-body pb-0">
            <div class="btn-group float-right">
              <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-settings"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
            <h4 class="mb-0">9.823</h4>
            <p>Invoices</p>
          </div>
          <div class="chart-wrapper" style="height:70px;">
            <canvas id="card-chart3" class="chart" height="70"></canvas>
          </div>
        </div>
      </div>
      <!--/.col-->

      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-danger">
          <div class="card-body pb-0">
            <div class="btn-group float-right">
              <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-settings"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
            <h4 class="mb-0">9.823</h4>
            <p>Others As Per Requirements</p>
          </div>
          <div class="chart-wrapper px-3" style="height:70px;">
            <canvas id="card-chart4" class="chart" height="70"></canvas>
          </div>
        </div>
      </div>
      @else
        <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-info">
          <div class="card-body pb-0">
           <div>Welcome</div>
          </div>
          <div class="chart-wrapper px-3" style="height:70px;">
            <canvas id="card-chart4" class="chart" height="70"></canvas>
          </div>
        </div>
      </div>
       @endif
      <!--/.col-->
    </div>
    <!--/.row-->

   
                  
    <!--/.row-->
  </div>

</div>
@endsection
<!-- /.conainer-fluid -->

@section('myscript')
 <!--  <script src="{{ asset('js/views/main.js') }}"></script> -->
@endsection