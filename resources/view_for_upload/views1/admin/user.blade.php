@extends('samples') 
@section('content')
<section class="content" style="margin-left: 20px;margin-right: 20px;">
   {{ Form::open(['url' => 'employee-save', 'files' => true]) }} 
           {{ csrf_field() }}
           {{ Form::hidden('id', isset($id) ? $id :'', []) }}
<div class="card">
  <div class="card-header text-center text-info"><h5>{{ $formHeaderMessage }}<h5></div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          @if(session()->has('message.level') || $errors->any())
          <div class="card">
            <div class="card-body">
                @if(session()->has('message.level'))
                <div class="alert alert-{{ session('message.level') }} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> {{ ucfirst(session('message.level')) }}!</h4>
                {!! session('message.content') !!}
                </div>
                @endif

                @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <ul>
                          @foreach ($errors->all() as $key => $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
            </div> 
          </div>
          @endif
           @foreach($customFields['basic'] as $key => $value)
            @if($value['type'] == 'separator_start')
              <div class="card card-accent-info">
                <div class="card-header">
                    <h6 class="text-center text-info">{{ $value['label'] }}</h6>
                </div> 
                <div class="card-body"> 
                   <div class=" form-group row">
             @elseif($value['type'] != 'separator_start' && $value['type'] != 'separator_end')
                                <div class="col-sm-3 {{ isset($value['optColDiv']) ? $value['optColDiv']: '' }}">
                                <div class="form-group {{ $errors->has($key) ? 'has-danger' : ''}}">
                                      <label class="form-col-form-label" for="{{ $key }}">{{ $value['label'] }} 
                                      @if($value['mandatory'])
                                          <span class="text-danger"> *</span>
                                      @endif
                                  </label>
                                 
                                      @php $class = isset($value['class']) ? $value['class'] : '';
                                      $error=$errors->has($key) ? 'is-invalid' : 'is-valid';
                                       @endphp
                                    @if($value['type'] == 'text')
                                      {{ Form::text($key, isset($$key) ? $$key :'', ['class' => 'form-control input-md '.$class.''.$error.' ', 'id' => isset($value['id']) ? $value['id']: '', 'style' => isset($value['style']) ? $value['style']: '', 'placeholder' => $value['label'], 'autocomplete' => 'off']) }}
                                    @elseif($value['type'] == 'select')
                                      {{ Form::select($key, $value['value'],  isset($$key) ? $$key :'', ['class' => 'form-control input-md '.$class.''.$error.' ', 'style' => isset($value['style']) ? $value['style']: '' ]) }}
                                    @elseif($value['type'] == 'file')
                                      {{ Form::file($key, ['id' => '', 'class' => 'form-control']) }}
                                    @elseif($value['type'] == 'password')
                                      {{ Form::password($key, ['id' => '', 'class' => 'form-control'.' '.$error.' ']) }}
                                    @endif
                                
                                  <p class="invalid-feedback">
                                    {{ $errors->has($key) ? $errors->first($key, ':message') : '' }}
                                  </p>
                                </div>
                              </div>
                               
            @elseif($value['type'] == 'separator_end')
                              </div> 
                            </div>  
                          </div>
            @endif                               
        @endforeach  
        </div>
      </div>
    </div>
     <div class="card-footer text-center">
        <div class="row">
          <div class="col-md-12 text-center">
            <button id="submitBtn" type="submit" class="btn btn-sm btn-success" name=""> <i class="fa fa-dot-circle-o"></i>{{ $formButton }}</button> 
            <button id="resetBtn" type="reset" class="btn btn-sm btn-warning" name=""> <i class="fa fa-ban"></i> Reset</button> 
          </div>
        </div>
        </div>
  </div>
      </div>
       
        {{ Form::close() }}
   
  </section>
  <script type="text/javascript">
    @php if(isset($data['field_disable']) && $data['field_disable'] === true){ @endphp
          $('input').attr('readonly', 'readonly');
          $('select').attr('readonly', 'readonly');
          $('#submitBtn').hide();
          $('#resetBtn').hide();
        @php } @endphp
  </script>
    <!-- /.content -->
@endsection