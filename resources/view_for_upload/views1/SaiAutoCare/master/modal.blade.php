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
      <h4 class="box-title text-primary ">Please Fill Up Modal Details</h4>
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
	<div id="modelDiv" class="row"   > 
        <div class="col-md-12" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 18px 0 rgba(0,0,0,0.19);">
          <div class="card">
             {{ !isset($id)?Form::open(['url' => '/master/modal','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => '/master/modal/update','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
          {{ csrf_field() }}
          {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
            <div class="card-header">Add Model Name</div>
            <div class="card-body">
             <div class="row">
              <div class="col-md-6">
                <label class="form-col-form-label" for="brand_id">Brand Name</label>
                {{Form::select('brand_id',$brand_select,isset($brand_id)?$brand_id: '', ['class' => 'form-control form-control ','id'=>'brand_id','required', 'placeholder' => '  Brand Name'] )}}
               </div>
               <div class="col-md-6">
                <label class="form-col-form-label" for="brand_id">Model Name</label>
                {{Form::text('model_name',isset($model_name)?$model_name: '', ['class' => 'form-control form-control ','id'=>'model_name','required', 'placeholder' => '  Model Name'] )}}
              </div>
             </div>
            </div>
            <div class="card-footer" align="center"><input class="btn btn-sm btn-primary" type="submit" id="add_model" value="Add"></div>
            {{ Form::close() }}
          </div>  
        </div>
      </div>
         <div class="row">
        <div class="col-md-12" >
          <div class="card">
            <div class="card-header" >Model List </div>
            <div class="card-body">
              <table  style="font-size: 13px;display:table-cell;" class="table  table-hover " >
                <thead >
                  <tr>
                    <th>ID</th>
                    <th>Brand ID</th>
                    <th>Model Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($model_list as $value)
                  <tr>
                    <td>{{ $value['id']  }}</td>
                    <td>{{ $value['brand_id']  }}</td>
                    <td>{{ $value['model_name']  }}</td>
                    <td style="white-space: nowrap">
                   <a href="{{ url('/')}}/master/modal/update/{{ $value['id'] }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
                      <a href="{{ url('/')}}/master/modal/trash/{{ $value['id']}} " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-remove"></i></a>
                  </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot><tr><td colspan="2">{{ $model_list->links() }}</td></tr></tfoot>

            </table>
            </div>
            <div class="card-footer">&nbsp;</div>
          </div>  
        </div>
</div>
      </div>
</section>
@endsection