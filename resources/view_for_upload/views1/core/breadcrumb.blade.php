<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active"><a href="{{asset('/')}}dashboard">Dashboard</a></li>
  @if(isset($header_link))

  @foreach($header_link as $key => $value)
 <li class='breadcrumb-item'><a href='{{asset("/")}}{{ $value["link_name"]  }}'>{{ $value['link_title'] }}</a></li>
  @endforeach
  @endif
 {{-- @php
 if(isset($option1))
 {
  @endphp
  <li class='breadcrumb-item'><a href='{{asset("/")}}{{ $optionValue1 }}'>{{ $option1 }}</a></li>
  @php
 }
 if(isset($option2))
 {
   @endphp
 <li class='breadcrumb-item'><a href='{{asset("/")}}{{ $optionValue2 }}'>{{$option2}}</a></li>
   @php
 }
 if(isset($option3))
 {
   @endphp
  <li class='breadcrumb-item'><a href='{{asset("/")}}{{$optionValue3}}'>{{$option3}}</a></li>
   @php
 }
 if(isset($option4))
 {
   @endphp
  <li class='breadcrumb-item'><a href='{{asset("/")}}{{$optionValue4}}'>{{$option4}}</a></li>
   @php
 }
 if(isset($option5))
 {
   @endphp
  <li class='breadcrumb-item'><a href='{{asset("/")}}{{$optionValue5}}'>{{$option5}}</a></li>
   @php
 }
 @endphp --}}
   
  <!-- Breadcrumb Menu-->
  <li class="breadcrumb-menu d-md-down-none">
    <div class="btn-group" role="group" aria-label="Button group">
      <a class="btn" href="#"><i class="icon-speech"></i></a>
      <a class="btn" href="{{asset('/')}}home"><i class="icon-graph"></i> &nbsp;Home</a>
      <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
    </div>
  </li>
</ol>
