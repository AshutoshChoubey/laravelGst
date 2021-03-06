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
<script src="{{ asset('asset/plugins/alerts-boxes/js/sweetalert.min.js') }}"></script>
  {{-- <script src="{{ asset('asset/plugins/alerts-boxes/js/sweet-alert-script.js') }}"></script> --}}
<section class="content" style="margin-left: 20px;margin-right: 20px;">
   {{ isset($id)?Form::open(['url' => 'GST/product/update','files' => 'true' ,'id'=>'formId','enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => 'GST/product/add','files' => 'true' ,'id'=>'formId','enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
   {{ csrf_field() }}
   {{ Form::hidden('id', isset($id) ? $id :'', []) }} 
    <div class="row">
      <!-- left column -->
      <div class="col-lg-12 col-sm-12">
        <!-- general form elements -->
        <div class="card ">
          <div class="card-header with-border text-center">
            <h4 class=" text-primary ">Please Fill Up Product Details</h4>
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
<div class="card"> 
  <div class="card-body"> 
    @foreach($basicFormField as $key => $value)
      @if($value['type'] == 'separator_start')
        <div class="row">
        @elseif($value['type'] != 'separator_start' && $value['type'] != 'separator_end')

          @php $class = isset($value['class']) ? $value['class'] : '';
          $error=$errors->has($key) ? 'is-invalid' : 'is-valid';
          @endphp
        @if($value['type'] == 'text')
          <div class="col-lg-4">
          <div class="form-group">
          <label for="input-1">{{ $value['label'] }}</label>
          {{ Form::text($key, isset($$key) ? $$key :'', ['class' => 'form-control form-control-rounded '.$class.''.$error.' ', 'id' => isset($value['id']) ? $value['id']: '', 'style' => isset($value['style']) ? $value['style']: '', 'placeholder' => $value['label'], 'autocomplete' => 'off',$value['mandatory']==true?'required':'']) }}
          </div>
          </div>
        @endif
        @if($value['type'] == 'select')
          <div class="col-lg-4">
          <div class="form-group">
          <label for="input-1">{{ $value['label'] }}</label>
          {{ Form::select($key, $value['value'],  isset($$key) ? $$key :'', ['class' => 'form-control form-control-rounded '.$class.''.$error.' ', 'style' => isset($value['style']) ? $value['style']: '' ]) }}
          </div>
          </div>
        @endif
        @if($value['type'] == 'number')
          <div class="col-lg-4">
          <div class="form-group">
          <label for="input-1">{{ $value['label'] }}</label>
          {{ Form::number($key, isset($$key) ? $$key :0, ['class' => 'form-control form-control-rounded '.$class.''.$error.' ', 'id' => isset($value['id']) ? $value['id']: '', 'style' => isset($value['style']) ? $value['style']: '', 'step' => isset($value['step']) ? $value['step']: '','placeholder' => $value['label'], 'autocomplete' => 'off']) }}
          </div>
          </div>
        @endif
        @if($value['type'] == 'textarea')
          <div class="col-lg-4">
          <div class="form-group">
          <label for="input-1">{{ $value['label'] }}</label>
          {{ Form::textarea($key, isset($$key) ? $$key :'', ['class' => 'form-control form-control-rounded '.$class.''.$error.' ', 'id' => isset($value['id']) ? $value['id']: '' ,'style' => isset($value['style']) ? $value['style']: '','placeholder' => $value['label'], 'autocomplete' => 'off']) }}
          </div>
          </div>
      @endif
      @elseif($value['type'] == 'separator_end')
        </div>
      @endif                               
    @endforeach
  </div>  
  <div class="card-footer">
   {{--  <div class="card-footer text-center">
        <div class="row">
          <div class="col-md-12 text-center">
            <button id="submitBtn"  class="btn btn-sm btn-success" name=""> <i class="fa fa-dot-circle-o"></i>{{ $formButton }}</button> 
            <button id="resetBtn" type="reset" class="btn btn-sm btn-warning" name=""> <i class="fa fa-ban"></i> Reset</button> 
          </div>
        </div>
        </div> --}}
  </div>
</div>    
{{Form::close()}}
 <div class="card-footer">
    <div class="card-footer text-center">
        <div class="row">
          <div class="col-md-12 text-center">
            <button id="submitBtn"  class="btn btn-sm btn-success" name=""> <i class="fa fa-dot-circle-o"></i>{{ $formButton }}</button> 
            <button id="resetBtn" type="reset" class="btn btn-sm btn-warning" name=""> <i class="fa fa-ban"></i> Reset</button> 
          </div>
        </div>
        </div>
  </div>
      <!-- /.row -->
</section>
<script type = "text/javascript" language = "javascript">
    $(document).ready(function() {

$(document).on("click","#submitBtn",function(){
  var frm = $('#formId');
        // frm.submit(function (e) {
            // e.preventDefault();
            if($('[name=product_name]').val()=='' || $('[name=product_name]').val()==null || $('[name=product_price]').val()=='' || $('[name=product_price]').val()==null || $('[name=product_price_without_gst]').val()=='' || $('[name=product_price_without_gst]').val()==null  || $('[name=product_salling_price]').val()=='' || $('[name=product_salling_price]').val()==null)
            {
              swal("Somthing Wrong!", "Please Filled Required Field", "error");
            }
            else
            {
               $.ajax({
                      type: frm.attr('method'),
                      url:  frm.attr('action'),
                      data: frm.serialize(),
                      success: function (data) {
                        if(data==1)
                        {
                          swal("Good job!", "Product is Successfully Added You Can Check in Product Search Section", "success");
                        }
                        else
                        {
                          swal("Somthing Wrong!", "OOHooooo!!!!!", "error");
                        }
                      },
                      error: function (data) {
                        swal("Somthing Wrong!", "OOHooooooooooo!!!!", "error");
                      },
                  // });
              });
            }
           
})

      


      $(document).on("click change keyup keypress keydown","[name^=product_igst],[name^=product_cgst],[name^=product_sgst]",function(){
        var product_igst=$("[name^=product_igst]").val();       
        var product_cgst=$("[name^=product_cgst]").val();       
        var product_sgst=$("[name^=product_sgst]").val(); 
        if(!isNaN(product_igst) && !isNaN(product_cgst) && !isNaN(product_sgst))
        {
            var gst=parseFloat(product_igst)+parseFloat(product_cgst)+parseFloat(product_sgst);
            $("[name^=product_gst]").val(gst); 
        }   
     });     
  });
  //  $('[name^=product_model]').prop('disabled', 'disabled');
   // $('[name^=product_price_without_gst]').prop('readyonly', 'readyonly');
    setInterval(function(){
     gst = $("[name^=product_gst]").val();
     product_price = $("[name^=product_price]").val();
     product_price= parseFloat(product_price)
     gst= parseFloat(gst)
     if(gst && !isNaN(gst) && product_price && !isNaN(product_price))
     {
       
       // $('[name^=product_price_without_gst]').prop('disabled', false);
       var pricePercentageOfProduct= gst+100;
       var originalPrice= (product_price*100)/pricePercentageOfProduct;
       $('[name^=product_price_without_gst]').val(originalPrice);
     }  

   }, 1000);
     $(document).on("change ","[name^=product_brand]",function(){
          var thisSelf=$(this);
      var brand = $(this).val();
      $.ajax({
        type:"POST",
        url: "{{url('/')}}/ajax/getModal",
        data:{
          "_token": "{{ csrf_token() }}",
          brand : brand,
        },
        dataType : 'html',
        cache: false,
        success: function(data){
          modalData=JSON.parse(data);
          $('[name^=product_model]').prop('disabled', false);
          $('[name^=product_model]')
               .empty()
               .append('<option selected="selected" value="">-Select -</option>');
               for (index = 0; index < modalData.length; ++index) {
               $('[name^=product_model]').append(
                '<option value="'+modalData[index]['id']+'">'+modalData[index]['model_name']+'</option>'
              );   
            }
        }
      });
     }); 
</script>


@endsection