@extends('samples') 
@section('content')

<section class="content" >
  <div class="row">
    <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> 
          </div>
          <div class="card-body table-responsive">
            <table class="table table-responsive-sm table-striped">
              <thead>
                <tr>
                  <th>Party Id</th>
                  <th>Party Name</th>
                  <th>Mobile Number</th>
                  <th>Address</th>
                  <th>GSTIN</th>
                  <th>Email</th>
                  <th>Email Varified</th>
                  <th>Nature Of business</th>
                  <th>Created Date</th> 
                  <th>Updated date</th> 
                  <th width="50px">Action</th>    
                </tr>
              </thead>
              <tbody>
                @foreach($PartyManage as $key => $value)
                <tr>
                  <td>{{ $value['id'] }}</td>
                  <td>{{ $value['party_name'] }}</td>
                  <td>{{ $value['mob_num'] }}</td>
                  <td>{{ $value['address'] }}</td>
                  <td>{{ $value['gstin'] }}</td>
                  <td>{{ $value['email'] }}</td>
                  <td>{{ $value['email_verified_at'] }}</td>
                  <td>{{ $value['nature_of_busines'] }}</td>
                  <td>{{ $value['created_at'] }}</td>
                  <td>{{ $value['updated_at'] }}</td>
                  <td>
                   <a href="{{ url('/')}}gst/manage-party/add/{{ $value['id'] }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a> 
                      <a href="{{-- {{ url('/')}}gst/manage-party/add{{ $value['id']}} --}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>  
                @endforeach
              </tbody>
            </table>
            <div class="col-lg-12 text-center">
              {{ $PartyManage->links() }}
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