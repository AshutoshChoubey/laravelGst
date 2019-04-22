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

<section class="content" style="margin-left: 20px;margin-right: 20px;">
  <div class="row">
      <div class="col-sm-12" class="text-center">
         {{ Form::open(['url' => 'GST/purchase/search','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
         <div class="table-responsive">
        <table class="table table-sm">
          <tr>
            <td>Purchase Invoice Id</td>
            <td>:</td>
            <td><!-- <input type="text" class="form-control-sm" name="id"> -->
                {{Form::text('id', isset($id)?$id: '', ['class' => 'form-control-sm form-control-sm ','id'=>'id', 'placeholder' => ' Supplier Id']  )}}
            </td>
            <td>&emsp;&emsp;</td>
            <td>supplier Name</td>
            <td>:</td>
            <td>
              {{Form::text('supplier_name', isset($supplier_name)?$supplier_name: '', ['class' => 'form-control-sm form-control-sm ','id'=>'supplier_name', 'placeholder' => '  supplier Name']  )}}
            <td>&emsp;&emsp;</td>
           {{--  <td>Product Name</td>
            <td>:</td>
            <td><input type="text" class="form-control-sm" name="product_name"></td>
            <td></td> --}}
          </tr>
          <tr>
             <td>From Date</td>
            <td>:</td>
            <td><input type="date" class="form-control-sm" name="created_at_to"></td>            
            <td>&emsp;&emsp;</td>
            <td>To Date</td>
            <td>:</td>
            <td><input type="date" class="form-control-sm" name="created_at_from"></td>
            <td>&emsp;&emsp;</td>
           {{--  <td>Company Name</td>
            <td>:</td>
            <td><input type="text"  class="form-control-sm" name="company_name"></td>
            <td></td> --}}
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="13" class="text-center"><input type="submit" name="search" class="btn btn-primary" value="Search"></td>
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
            <i class="fa fa-align-justify"></i> Purchase Details
          </div>
          <div class="card-body table-responsive" style="font-size: 13px;padding-left:10px;vertical-align:middle;">
            <table  id="example"  class="table   table-hover  " style="font-size: 13px;display:table-cell;" >
              <thead class="thead-dark">
                <tr>
                  <th style="white-space: nowrap">Purchase Id</th>
                  <th style="white-space: nowrap"><small>Purchase Invoice Id</small></th>
                  <th style="white-space: nowrap">Supplier Name</th>
                  <th style="white-space: nowrap">Supplier Mobile Name</th>
                  <th style="white-space: nowrap">Supplier Email Id</th>
                  <th style="white-space: nowrap">Supplier Address</th>
                  <th style="white-space: nowrap">Purchase Invoice Number</th>
                  <th style="white-space: nowrap">Purchase Invoice Date</th>
                  <th style="white-space: nowrap">Purchase Invoice Amount</th>
                  <th style="white-space: nowrap">Product Name</th>
                  <th style="white-space: nowrap">Product Discription</th>
                  <th style="white-space: nowrap">Product HSN</th>
                  <th style="white-space: nowrap">Product GST</th>
                  <th style="white-space: nowrap"><small>Product Selling Price(Without GST)</small></th>
                  <th style="white-space: nowrap"><small>Product  Price(Without GST)</small></th>
                  <th style="white-space: nowrap"><small>Product  Price(With GST)</small></th>
                  <th style="white-space: nowrap"><small>Product  Quantity</small></th>
                  <th style="white-space: nowrap"><small>Product  Tax Amount</small></th>
                  <th style="white-space: nowrap"><small>Product Total  Tax Amount</small></th>                   
                  <th style="white-space: nowrap">Created Date</th>
                  <th style="white-space: nowrap">Action</th>
                  {{-- <th>Action</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach($purchase as $key => $value)
                <tr>
                  <td>{{ $value['id'] }}</td>
                  <td>{{ $value['purchase_invoice_id'] }}</td>
                  <td>{{ $value['supplier_name'] }}</td>
                  <td>{{ $value['supplier_mob_num'] }}</td>
                  <td>{{ $value['supplier_email'] }}</td>
                  <td><small>{{ $value['supplier_address'] }}</small></td>
                  <td>{{ $value['purchase_invoice_number'] }}</td>
                  <td>{{ $value['purchase_invoice_date'] }}</td>
                  <td>{{ $value['purchase_invoice_amount'] }}</td>
                  <td>{{ $value['Productname'] }}</td>
                  <td>{{ $value['product_discription'] }}</td>
                  <td>{{ $value['product_hsn'] }}</td>
                  <td>{{ $value['product_gst'] }}</td>
                  <td>{{ $value['product_salling_price'] }}</td>
                  <td>{{ $value['product_price_withoutgst'] }}</td>
                  <td>{{ $value['product_price_withgst'] }}</td>
                  <td>{{ $value['product_quantity'] }}</td>                  
                  <td>{{ $value['product_tax_amount'] }}</td>
                  <td>{{ $value['product_total_tax_amount'] }}</td>
                  <td>{{ $value['created_at'] }}</td>
                  <td>
                    <a href="{{ url('/') }}/purchase-invoice-view/{{ $value['purchase_invoice_id'] }}" target="blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                     <a type="button" id="{{ $value['id'] }}" class="btn btn-light waves-effect waves-light openModelForPurchaseReturn" data-toggle="modal" data-target="#modal-animation-3"><i aria-hidden="true" class="fa fa-undo"></i></a>
                  </td>
                  {{-- <td style="white-space: nowrap">
                   <a href="{{ url('/')}}/GST/purchase/add/{{ $value['id'] }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
                      <a href="{{ url('/')}}/GST/purchase/trash/{{ $value['id']}} " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-remove"></i></a>
                  </td> --}}
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
                  
  {{-- this modal for Purchase Return:start --}}
              <div class="modal fade" id="modal-animation-3">
                  <div class="modal-dialog">
                    <div class="modal-content animated zoomInUp ">
                      <div class="modal-header bg-warning">
                        <h5 class="modal-title">Purchase Return</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <table class="table table-responsive table-hover table-bordered">
                          <thead>
                            <tr>
                              <th>Purchase Id</th>
                              <th>Quantity</th>
                              <th>Discription</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td id="purchaseIdForModel"></td>
                                <td><input type="hidden" class="form-control" name="purchaseIdForModel"><input type="text" class="form-control" name="quantityForModel"></td>
                                <td><input type="text" class="form-control" name="discriptionForModel"></td>                         
                            </tr>                            
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer bg-warning">
                        {{-- <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button> --}}
                        <button type="button" id="purchaseReturn" class="btn btn-success"><i class="fa fa-check-square-o"></i> Save</button>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- this modal for Purchase Return:Stop --}}
</section>

<script src="{{ asset('/asset/plugins/alerts-boxes/js/sweetalert.min.js') }}"></script>
<script type="text/javascript">
 $(document).ready(function() {
        var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
        } );
        table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );

} );

 //For Disount : start
 $(document).on('click','#purchaseReturn',function()
 {
    var discriptionForModel=$('[name=discriptionForModel]').val();
    var purchaseIdForModel=$('[name=purchaseIdForModel]').val();
    var quantityForModel=$('[name=quantityForModel]').val();
       if(quantityForModel=="")
       {
         swal("warning!", "Please enter Amount", "");
       }
       else
       {
          $.ajax({
          type:"POST",
          url: "{{  url('/') }}/ajax/purchaseReturn",
          data:{
          "_token": "{{ csrf_token() }}",
          discriptionForModel : discriptionForModel,
          purchaseIdForModel : purchaseIdForModel,
          quantityForModel : quantityForModel
          },
          dataType : 'html',
          cache: false,
          success: function(data){
              var workshopIdForDiscount=$('[name=workshopIdForDiscount]').val();
             if(data==1)
             {
              swal("Good job!", " Returned  Successfully", "success");
              $('[name=quantityForModel]').val("");      
             }
             else{
                 swal("Somthing Wrong!", "OOHooooooooooo!!!!", "error");
                  $('[name^=amountForWorkshop]').val("");
             }                 
          },
          error: function (data) {
            swal("Somthing Wrong!", "OOHooooooooooo!!!!", "error");
          }
          });
        }         
 })

$(document).on('click','.openModelForPurchaseReturn',function()
 {
      var purchaseIdForModel = $(this).attr('id');
      $('[name="purchaseIdForModel"]').val(purchaseIdForModel)
      $('[id="purchaseIdForModel"]').html(purchaseIdForModel)
 })
//For Disount : end

</script>
@endsection