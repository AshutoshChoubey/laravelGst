@extends('panel.blank_page') 
@section('content')

<div class="container-fluid"> 
  <div class="row">
      <div class="form-group col-12">
         <h2 class="text text-center">
<font color="blue">ROTARY EYE & HEALTH CARE HOSPITAL , JEYPORE</font></h1>  
      </div>
    <div class="form-group col-12">
            <hr>
   </div>
    <div class="col-md-12"></div>
  
 <table width="100%" class="table-borderless">
    <tr>
      <td width="5%">SL#</td>
      <td width="5%"> : </td>
      <td width="10%">{{ $patient['id'] }}</td>
      <td width="5%"></td>
      <td width="5%"></td>
      <td width="10%"></td>
      <td width="5%"></td>
      <td width="10%"></td>
      <td width="5%"></td>
      <td width="5%"></td>
      <td width="10%">Date</td>
      <td width="5%">:</td>
      <td width="20%">{{ $patient['created_at'] }}</td>
   </tr>
   <tr>
      <td>Patient Name</td>
      <td> : </td>
      <td>{{ $patient['patient_name'] }}</td>

      <td></td>
      <td></td>

      <td>Age</td>
      <td>:</td>
      <td>{{ $patient['age'] }}</td>

      <td></td>
      <td></td>

      <td>Sex</td>
      <td> : </td>
      <td>{{ $patient['sex'] }}</td>
   </tr>
    <tr>
      <td>Address</td>
      <td> : </td>
      <td>{{ $patient['address'] }}</td>

      <td></td>
      <td></td>

      <td></td>
      <td></td>
      <td></td>

      <td></td>
      <td></td>
    
      <td>Department</td>
      <td>:</td>
      <td>{{ $patient['department'] }}</td>
   </tr>
    <tr>
      <td>Districty</td>
      <td> : </td>
      <td>{{ $patient['address'] }}</td>

      <td></td>
      <td></td>

      <td></td>
      <td></td>
      <td></td>

      <td></td>
      <td></td>
    
      <td>Mobile Number</td>
      <td>:</td>
      <td>{{ $patient['mob_number'] }}</td>
   </tr>
 </table>
  </div>
  <div class="form-group col-12">
            <hr>
   </div>
   <div class="row">
    <div class="col-md-12"></div>
  
 <table width="100%">
   <tr>
      <td>Chief Complains</td>
      <td align="text-center"> : </td>
      <td>{{ $patient['chief_complain'] }}</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>     
   </tr>
  <tr>
      <td>Cardiac</td>
      <td align="text-center"> : </td>
      <td>{{ $patient['cardiac'] }}</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
   </tr>
    <tr>
      <td>ocular_movement</td>
      <td align="text-center"> : </td>
      <td>{{ $patient['ocular_movement'] }}</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
   </tr>

    <tr>
      <td>VA_Unadeed</td>
      <td align="text-center"> : </td>
      <td>{{ $patient['va_unadeed'] }}</td>
      <td></td>
      <td></td>
      <td>Aided</td>
      <td align="text-center">:</td>
      <td>{{ $patient['aided'] }}</td>
   </tr>
    <tr>
      <td>With PH</td>
      <td align="text-center"> : </td>
      <td>{{ $patient['with_ph'] }}</td>
      <td></td>
      <td></td>
      <td>AR</td>
      <td align="text-center">:</td>
      <td>{{ $patient['ar'] }}</td>
   </tr>
     
    <tr>
      <td>IOP</td>
      <td align="text-center"> : </td>
      <td>{{ $patient['iop'] }}</td>
      <td></td>
      <td></td>
      <td>IPI</td>
      <td align="text-center">:</td>
      <td>{{ $patient['lpi'] }}</td>
   </tr>
    <tr>
      <td>Investigation</td>
      <td align="text-center"> : </td>
      <td>{{ $patient['investigation'] }}</td>
      <td></td>
      <td></td>
      <td>Ext Adenexa</td>
      <td align="text-center">:</td>
      <td>{{ $patient['ext_adenexa'] }}</td>
   </tr> <tr>
      <td>Conjuctiva</td>
      <td align="text-center"> : </td>
      <td>{{ $patient['conjuctiva'] }}</td>
      <td></td>
      <td></td>
      <td>Cornea</td>
      <td align="text-center">:</td>
      <td>{{ $patient['cornea'] }}</td>
   </tr>
     <tr>
      <td>IRIS</td>
      <td align="text-center"> : </td>
      <td>{{ $patient['iris'] }}</td>
      <td></td>
      <td></td>
      <td>Pupil</td>
      <td>:</td>
      <td>{{ $patient['pupil'] }}</td>
   </tr>
   <tr>
      <td>Lens</td>
      <td align="text-center"> : </td>
      <td>{{ $patient['lens'] }}</td>
      <td></td>
      <td></td>
      <td>Founds</td>
      <td align="text-center">:</td>
      <td>{{ $patient['founds'] }}</td>
   </tr>
   <tr><td colspan="7"><hr></td></tr>
    <tr>
      <td>Provisional Diagnosis</td>
      <td align="text-center" > : </td>
      <td>{{ $patient['provisional_diagnosis'] }}</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
   </tr>
 </table>
  </div>
  <div class="text-center"><input type="button"  id="print" class="btn btn-primary" value="Print"/></div>
<div style="height: 40px"></div>
</div>



<!-- /.conainer-fluid -->


  <script type="text/javascript">
  $(document).ready(function(){
      $('#print').on("click",function(){
         $('#print').hide();
     window.print();
      $('#print').show();
    });
  });
  </script>
@endsection