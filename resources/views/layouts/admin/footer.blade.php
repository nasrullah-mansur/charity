  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-dark navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
          <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All rights reserved. </span>
          <span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
      </p>
  </footer>
  <!-- BEGIN VENDOR JS-->

  <script src="{{asset('backfront/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>

  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->

  <!-- <script src="{{asset('backfront/app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
  <script src="{{asset('backfront/app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('backfront/app-assets/vendors/js/extensions/unslider-min.js')}}" type="text/javascript"></script>
  <script src="{{asset('backfront/app-assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script> -->

  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->

  <!-- <script src="{{asset('backfront/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('backfront/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{asset('backfront/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script> -->

  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- s -->
  <!-- END PAGE LEVEL JS-->

  <script type="text/javascript" src="{{asset('admin/js/libs.js')}}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  @stack('scripts')