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
<style type="text/css">
  @media print {
    .table {
        background-color: white;  
        color: black;
        border-color: black;

    }
     table {
        border: 1px solid black;
    }
    th, td {
       border: 1px solid black;
    }
    table, th, td
 {
   font-size: 11px;
 }
    /* More print styles */
  /* ...style="background-color: black;color: white" */
}
</style>
<section class="content" style="margin-left: 20px;margin-right: 20px;">
  <div class="row">

      <div class="col-sm-12" class="text-center">
         {{ Form::open(['url' => 'GST/product/search','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
        <div class="table-responsive">
        <table class="table">
          <tr>
            <td>Product Id</td>
            <td>:</td>
            <td><!-- <input type="text" class="form-control" name="id"> -->
                {{Form::text('id', isset($id)?$id: '', ['class' => 'form-control  ','id'=>'id', 'placeholder' => 'Product Id']  )}}
            </td>
            <td>&emsp;&emsp;</td>
            <td>Product Name</td>
            <td>:</td>
            <td>
              {{Form::text('product_name', isset($product_name)?$product_name: '', ['class' => 'form-control  ','id'=>'product_name', 'placeholder' => 'Product Name']  )}}
            <td></td>
          </tr>
          <tr>
            <td>From Date</td>
            <td>:</td>
            <td><input type="date" class="form-control" name="created_at_from"></td>
            <td>&emsp;&emsp;</td>
            <td>To Date</td>
            <td>:</td>
            <td><input type="date" class="form-control" name="created_at_to"></td>
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
   @if(session()->has('message.level') && $errors->any() )
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
    @endif

  <div class="row">
    <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Product Detail
          </div>
          <div class="card-body table-responsive" style="font-size: 12px;padding-left:10px;vertical-align:middle;">
            <table  id="example" cellspacing="0" cellpadding="0" class="table  table-hover  " style="font-size: 12px;display:table-cell;" >
              <thead class="thead-dark" style="font-size: 12px;">
                <tr ><!-- style="white-space: nowrap"  -->
                  <th >Product Id</th>
                  <th >Product Name</th>
                  <th >Product Company Name</th>
                  <th >Product Model Name</th>
                  <th >Product Type Name</th>
                  <th >Product Unit Name</th>
                  <th >Product Color Name</th>
                  <th >HSN</th>
                  <th >Product Price with gst</th>
                  <th >Product Price without gst</th>
                  <th >Product Price  Selling Price</th>
                  <th >CGST</th>
                  <th >IGST</th>
                  <th >SGST</th>
                  <th >GST</th>
                  <th >Stock In</th>
                  <th >Stock Out</th>
                  <th >Available Stock</th>
                  <th >Created Date</th>
                  {{-- <th >Updated Date</th> --}}
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($productList as $key => $value)
                <tr>
                  <td>{{ $value['id'] }}</td>
                  <td>{{ $value['product_name'] }}</td>
                  <td>{{ $value['ProductBrandName'] }}</td>
                  <td>{{ $value['ProductModelName'] }}</td>
                  <td>{{ $value['ProductTypeName'] }}</td>
                  <td>{{ $value['ProductUnitName'] }}</td>
                  <td>{{ $value['ProductColorName'] }}</td>
                  <td>{{ $value['product_hsn'] }}</td>
                  <td>{{ $value['product_price'] }}</td>
                  <td>{{ $value['product_price_without_gst'] }}</td>
                  <td>{{ $value['product_salling_price'] }}</td>
                  <td>{{ $value['product_cgst'] }}</td>
                  <td>{{ $value['product_igst'] }}</td>
                  <td>{{ $value['product_sgst'] }}</td>
                  <td>{{ $value['product_gst'] }}</td>
                  <td>{{ $value['stock_in'] }}</td>
                  <td>{{ $value['stock_out'] }}</td>
                  <td>{{ $value['available_stock'] }}</td>
                  <td>{{ $value['created_at'] }}</td>
                  {{-- <td>{{ $value['updated_at'] }}</td> --}}
                  <td >
                   <a href="{{ url('/')}}/GST/product/add/{{ $value['id'] }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
                      <a href="{{ url('/')}}/GST/product/trash/{{ $value['id']}} " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-remove"></i></a>
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
    // $('[tabindex="0"]').onclick(function(e)
    // {
    //   e.preventDefault();
    //   console.log("hiiiii");
    // })

      var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
       table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );

} );

</script>
@endsection