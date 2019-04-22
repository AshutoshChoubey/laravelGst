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
   {{ isset($id)?Form::open(['url' => 'credit-debit/update','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'credit-debit/add','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
   {{ csrf_field() }}
   {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
  <div class="card">
    <div class="card-header">
      <h4 class="box-title text-primary ">Please Fill Up  Credit Debit Log</h4><a href=""></a>
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
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="supplier_name">Log Type</label>
          {{Form::select('is_credit',['1'=>'Debit','0'=>'Credit'], isset($is_credit)?$is_credit: '', ['class' => 'form-control ', 'id' => 'is_credit'])}}
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <label class="form-col-form-label" for="supplier_name">Log Type</label>
              <input type="date"  name="created_at" class="form-control"  value="{{ isset($created_at)? date('m/d/Y', strtotime($created_at)) : '' }}">
          </div>
        </div>
       
       
      </div> 
      <hr/>
      <div class="row">   
        <div class="col-sm-12">  
          <div class="card">
            <div class="card-header">
            <h5 >
            Please fill up the Log  details
            </h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="addmoretable" class="table table-bordered">
                  <thead>
                    <tr>
                     <th style="white-space: nowrap" >Item Name</th>
                     <th style="white-space: nowrap" >Item Discription</th>
                     <th style="white-space: nowrap" >Total Price</th>
                       @php
                        if(!isset($id))
                        {
                          echo "<th>";
                          echo 'Action';
                          echo "</th>";
                        }
                      
                      @endphp                     
                    </tr>
                  </thead>
                  <tbody id="tBody">
                    <tr id="addRow">                 
                      <td class="item">{{Form::text('item[]', isset($item)?$item: '', ['class' => 'form-control ', 'id' => 'item'])}}
                      </td>
                      <td class="item_discription">{{Form::textarea('item_discription[]', isset($item_discription)?$item_discription: '', ['class' => 'form-control ', 'id' => 'item_discription',"style"=>"height: 40px;"])}}
                      </td>                      
                      <td class="amount">{{Form::number('amount[]', isset($amount)?$amount: '', ['class' => 'form-control ', 'id' => 'amount'])}}
                      </td>  
                        @php
                        if(!isset($id))
                        {
                          echo "<td>";
                          echo '<a href="javascript:void(0)"  class="addMore btn btn-primary btn-sm"><i class="fa fa-plus "></i></a>';
                          echo "</td>";
                        }
                      
                      @endphp
                     
                    </tr>
                  </tbody>
                  <tfoot style="display: none;" class="small font-italic text-info text-capitalize">
                    <tr>
                      <td colspan="12">Supplier Name and Product Name Is compalsary <br>
                   
                      After insering the quantity Total Price will be automatically calculated if you click outsite the text field<br/>For Example if unit price is 10,quanity = 2 and gst = 10 % then total price will be (unitprice + gst)*quanity means (10+1)*2=22<br>
                     <span class="text-danger"> you can change default value but make sure calculation is right otherwise it may affect your application.</span>
                      </td>
                    </tr>
                    
                  </tfoot>
                </table>
               </div> 
            </div>
            <div class="card-footer">
              <div class="text-center">
                <input type="submit"  class="btn btn-primary" value="{{ isset($id)?'update':'Add' }}">
              </div>               
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>

  <!--/.col (left) -->
  
{{Form::close()}}
      <!-- /.row -->
</section>

<script type = "text/javascript" language = "javascript">   
  $(document).ready(function(){
    var i=0;
      $('.addMore').on("click",function(){
        i=parseInt(i)+1;
        $("#tBody").append('<tr id="AddRow'+i+'">\
                   \ <td class="item">{{Form::text("item[]", "", ["class" => "form-control ", "id" => "item"])}}\
                    </td>\
                    <td class="item_discription">{{Form::textarea("item_discription[]", "", ["class" => "form-control ", "id" => "item_discription","style"=>"height: 40px;"])}}\
                    </td>\
                    <td class="amount">{{Form::number("amount[]", "", ["class" => "form-control ", "id" => "amount",])}}\
                    <td>\
                    <a href="javascript:void(0)" id="'+i+'"  class="removeRow btn btn-danger btn-sm"><i class="fa fa-minus "></i></a>\
                    </td>\
                  </tr>');
        
      });
       $(document).on('click', '.removeRow', function(){  
          var button_id = $(this).attr("id");  
          $('#AddRow'+button_id+'').remove();  
      });

  })
       
</script>

@endsection