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
            <table id="datable_1" class="table  table-hover  " style="font-size: 13px;display:table-cell;" >
              <thead class="thead-dark">
                <tr>
                  <th style="white-space: nowrap">Marketing Id</th>
                  <th style="white-space: nowrap">User Name</th>
                  <th style="white-space: nowrap">User Email</th>
                  <th style="white-space: nowrap">Item</th>
                  <th style="white-space: nowrap">Item Discription</th>
                  <th style="white-space: nowrap">Quantity</th>
                  <th style="white-space: nowrap">Price</th>
                  <th style="white-space: nowrap">Total Price</th>
                  <th style="white-space: nowrap">Created Date</th>
                  <th style="white-space: nowrap">Updated Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($trashed as $key => $value)
                <tr>
                  <td>{{ $value['id'] }}</td>
                  <td>{{ $value['user_name'] }}</td>
                  <td>{{ $value['user_email'] }}</td>
                  <td>{{ $value['item'] }}</td>
                  <td>{{ $value['item_discription'] }}</td>
                  <td>{{ $value['quantity'] }}</td>
                  <td>{{ $value['price'] }}</td>
                  <td>{{ $value['total_price'] }}</td>
                  <td>{{ $value['created_at'] }}</td>
                  <td>{{ $value['updated_at'] }}</td>
                  <td style="white-space: nowrap">
                      <a href="{{ url('/')}}/marketing/delete/{{ $value['id']}} " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-remove"></i></a>
                  </td>
                </tr>  
                @endforeach
              </tbody>
            </table>
            <div class="col-lg-12 text-center">
              {{ $trashed->links() }}
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