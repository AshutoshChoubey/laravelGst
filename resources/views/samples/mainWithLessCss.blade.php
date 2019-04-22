<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/dashtreme/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jan 2019 07:38:07 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content="This is the advance Gst Billing Software "/>
  <meta name="author" content="Ashutosh Kumar Choubey"/>
  <title>{{ isset($pageTitle)?$pageTitle:'Gst Billing' }}</title>

  <!--favicon--> 
  {{-- <link rel="icon" href="{{ asset('/asset/images/favicon.ico" type="image/x-icon') }}"> --}}
  <!-- Vector CSS -->
  <link href="{{ asset('/asset/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="{{ asset('/asset/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('/asset/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ asset('/asset/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('/asset/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="{{ asset('/asset/css/sidebar-menu.css') }}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{ asset('/asset/css/app-style.css') }}" rel="stylesheet"/>
  <!--Select Plugins-->
 
  {{-- <link href="{{ asset('/asset/plugins/select2/css/select2.min.css') }}" rel="stylesheet"/>
  <!--inputtags-->

  <link href="{{ asset('/asset/plugins/inputtags/css/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
  <!--multi select-->

  <link href="{{ asset('/asset/plugins/jquery-multi-select/multi-select.css') }}" rel="stylesheet"/>
  <!--Bootstrap Datepicker-->
  
  <link href="{{ asset('/asset/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/>
  <!--Touchspin-->
 
  <link href="{{ asset('/asset/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css') }}" rel="stylesheet"/>
  <link href="{{ asset('/asset/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('/asset/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"/> --}}
  
</head>

<body class="bg-theme bg-theme1">

   <!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" >{{-- <div class="loader"></div> --}}</div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
  @include('core.leftside')
  <!--End sidebar-wrapper-->

  <!--Start topbar header-->
  @include('core.header')
  <!--End topbar header-->

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">
@include('core.script')
      <!--Start Dashboard Content-->
             @yield('content')
      <!--End Dashboard Content-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  
  <!--Start footer-->
  <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 Phoenix Software Solution
        </div>
      </div>
  </footer>
  <!--End footer-->
  
  <!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
      </ul>
      {{-- <p class="mb-0">Extra Gradient Background</p>
      <hr>
       <ul class="switcher">
        <li id="theme100"></li>
        <li id="theme101"></li>
        <li id="theme102"></li>
        <li id="theme103"></li>
        <li id="theme104"></li>
      </ul> --}}
      
     </div>
   </div>
  <!--end color cwitcher-->
   
  </div><!--End wrapper-->

  
{{-- @include('core.script') --}}
  
</body>

<!-- Mirrored from codervent.com/dashtreme/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jan 2019 07:39:39 GMT -->
</html>
