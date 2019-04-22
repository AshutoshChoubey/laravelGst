@extends('panel.blank_page') 
@section('content')
<div class="container-fluid"> 
  <div class="row">
<div class="col-md-8">

  @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }} alert-dismissible" onload="javascript: Notify('You`ve got mail.', 'top-right', '5000', 'info', 'fa-envelope', true); return false;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> {{ ucfirst(session('message.level')) }}!</h4>
      {!! session('message.content') !!}
    </div>
  @endif
</div>
    <div class="col-md-8">
     {{ Form::open(['url' => 'rotary','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
     {{ csrf_field() }}
     {{ Form::hidden('id', isset($id) ? $id :'', []) }} 

        <table style="font-size: 12px">
          <tr>
            <td><span style="color:red;"><sup><b></b></sup></span>Patient Name:</td>
            <td>
            <input class="form-control" style="width: 200" type="text" id="patient_name" value="{{ isset($patient_name) ? $patient_name :'' }}" name="patient_name" required/>
            </td>
            <td></td>
            <td></td>
            <td><span style="color:red;"><sup><b></b></sup></span>Age</td>
            <td>
            <input class="form-control"  style="width: 200" type="text" id="age" name="age" value="{{ isset($age) ? $age :'' }}" />
            </td>
          </tr>
          <tr height="10px"/>
          <tr>
            <td><span style="color:red;"><sup><b></b></sup></span>Sex</td>
            <td>
            <select class="form-control" name="sex" id="sex" style="width: 200">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>
            </td>
            <td></td>
            <td></td>
            <td><span style="color:red;"><sup><b></b></sup></span>Department</td>
            <td>
            <input class="form-control"  style="width: 200" type="text" value="{{ isset($department) ? $department :'' }}"  id="department" name="department" />
            </td>
          </tr>

          <tr height="10px"/>
          <tr>
            <td><span style="color:red;"><sup><b></b></sup></span>Address</td>
            <td>
            <textarea class="form-control"  style="width: 200" type="text" value="{{ isset($address) ? $address :'' }}"  id="address" name="address" ></textarea>
            </td>
            <td></td>
            <td></td>
            <td><span style="color:red;"><sup><b></b></sup></span>District</td>
            <td>
            <input class="form-control" style="width: 200" type="text" id="district" name="district" value="{{ isset($district) ? $district :'' }}"  />
            </td>
          </tr>
          <tr height="10px"/>
          
          <tr height="10px"/>
          <tr>
            <td><span style="color:red;"><sup><b></b></sup></span>Mobile Number</td>
            <td>
            <input class="form-control"  style="width: 200" type="number" id="mob_number" value="{{ isset($mob_number) ? $mob_number :'' }}" name="mob_number" />
            </td>
            <td></td>
            <td></td>
            <td><span style="color:red;"><sup><b></b></sup></span>Chief Complain</td>
            <td>
            <textarea class="form-control"  style="width: 200" type="text" id="chief_complain" name="chief_complain" >{{ isset($mob_number) ? $mob_number :'' }}</textarea>
            </td>
          </tr>
          
          <tr>
            <td><span style="color:red;"><sup><b></b></sup></span>HIO-DM/HT/Cardiac</td>
            <td>
              <textarea class="form-control"  style="width: 200" id="cardiac" name="cardiac" ></textarea> 
            </td>
            <td></td>
            <td></td>
            <td><span style="color:red;"><sup><b></b></sup></span>Ocular Movement</td>
            <td>
             <textarea class="form-control"  style="width: 200" id="ocular_movement" name="ocular_movement" ></textarea> 
            </td>
          </tr>
          <tr>
            <td><span style="color:red;"><sup><b></b></sup></span>VA-Unaided</td>
            <td>
              <input type="text" class="form-control"  style="width: 200" id="va_unadeed" name="va_unadeed" />
            </td>
            <td></td>
            <td></td>
            <td><span style="color:red;"><sup><b></b></sup></span>Aided</td>
            <td>
              <input type="text" class="form-control"  style="width: 200"  id="aided" name="aided" />
            </td>
          </tr>
          <tr>
            <td><span style="color:red;"><sup><b></b></sup></span>With PH</td>
            <td>
              <textarea class="form-control"  style="width: 200" id="with_ph" name="with_ph" ></textarea> 
            </td>
            <td></td>
            <td></td>
            <td><span style="color:red;"><sup><b></b></sup></span>AR</td>
            <td>
               <input type="text" class="form-control"  style="width: 200"  id="ar" name="ar" />
            </td>
          </tr>
          <tr>
            <td><span style="color:red;"><sup><b></b></sup></span>IOP</td>
            <td>
              <textarea class="form-control"  style="width: 200" id="iop" name="iop" ></textarea> 
            </td>
            <td></td>
            <td></td>
            <td><span style="color:red;"><sup><b></b></sup></span>LPI</td>
            <td>
               <input type="text" class="form-control"  style="width: 200"  id="lpi" name="lpi" />
            </td>
          </tr>

          <tr>
            <td><span style="color:red;"><sup><b></b></sup></span>Investigation</td>
            <td>
              <textarea class="form-control"  style="width: 200" id="investigation" name="investigation" ></textarea> 
            </td>
            <td></td>
            <td></td>
            <td><span style="color:red;"><sup><b></b></sup></span>Ext Adenexa</td>
            <td>
               <input type="text" class="form-control"  style="width: 200"  id="ext_adenexa" name="ext_adenexa" />
            </td>
          </tr>
          <tr>
            <td><span style="color:red;"><sup><b></b></sup></span>Conjuctiva</td>
            <td>
                <input type="text" class="form-control"  style="width: 200"  id="conjuctiva" name="conjuctiva" />
              
            </td>
            <td></td>
            <td></td>
            <td><span style="color:red;"><sup><b></b></sup></span>Cornea</td>
            <td>
               <input type="text" class="form-control"  style="width: 200"  id="cornea" name="cornea" />
            </td>
          </tr>
          <tr>
            <td><span style="color:red;"><sup><b></b></sup></span>Iris</td>
            <td>
               <input type="text" class="form-control"  style="width: 200"  id="iris" name="iris" />
             
            <td></td>
            <td></td>
            <td><span style="color:red;"><sup><b></b></sup></span>Pupil</td>
            <td>
               <input type="text" class="form-control"  style="width: 200"  id="pupil" name="pupil" />
            </td>
          </tr>
          <tr>
            <td><span style="color:red;"><sup><b></b></sup></span>Lens</td>
            <td>
               <input type="text" class="form-control"  style="width: 200"  id="lens" name="lens" />
            </td>
            <td></td>
            <td></td>
            <td><span style="color:red;"><sup><b></b></sup></span>founds</td>
            <td>
               <input value="<?php echo isset($founds) ? $founds : '' ?>" type="text" class="form-control"  style="width: 200"  id="founds" name="founds" />
            </td>
          </tr>
          <tr>
            <tr>
            <td></td>
            <td>
              <span style="color:red;"><sup><b></b></sup></span>Provisional Diagnosis
            </td>
            <td></td>
            <td></td>
            <td> <textarea class="form-control"  style="width: 200" id="provisional_diagnosis" name="provisional_diagnosis" ></textarea></td>
            <td>
              </td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><input class="btn btn-primary" type="submit" value="Save"/></td>
            <td>
            </td>
          </tr>
        </table>
  </div>

 {{Form::close()}}
 <div class="col-md-4">
  <div class="h3 class="text-center"">Patient Detail</div>
  <div class="table-responsive">
   <table class="table">
    <thead>
      <th width="20%">patient Id</th>
      <th width="20%">patient Name</th>
      <th width="20%">Mobile Number</th>
      <th width="10%">Sex</th>
      <th width="30%">Action</th>
     </thead>
     <tbody>
      @foreach($patients as $key =>$patient)
      <tr>
        <td width="20%"><a href="{{ url('/') }}/rotary/report/{{ $patient->id }}">{{ $patient->id }}</a></td>
        <td width="20%">{{ $patient->patient_name }}</td>
        <td width="20%">{{ $patient->mob_number }}</td>
        <td width="10%">{{ $patient->sex }}</td>
        <td width="30%"  style="white-space: nowrap"> <a href="{{url('/') }}/rotary/{{ $patient->id }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
           <a href="{{url('/') }}/rotary/delete/{{ $patient->id }}" class="btn btn-success btn-xs"><i class="fa fa-trash"></i></a>
                   </td>
      </tr>
      @endforeach       
     </tbody> 
     <tfoot>
       <tr><td class="text-center">{{ $patients->links() }}</td></tr>
     </tfoot>
   </table>
</div>
 </div>
 </div>
 </div>
<div style="height: 40px"></div>
</div>
@endsection
<!-- /.conainer-fluid -->

@section('extra-javascript')

@endsection