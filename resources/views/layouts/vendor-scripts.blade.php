 <!-- JAVASCRIPT -->
 <script src="{{ URL::asset('/assets/libs/jquery/jquery.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/bootstrap/bootstrap.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/metismenu/metismenu.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/simplebar/simplebar.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/node-waves/node-waves.min.js')}}"></script>
 <!-- Sweet Alerts js -->
 <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

 <!-- Sweet alert init js-->
 <script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js')}}"></script>

 @yield('script')

 <!-- App js -->
 <script src="{{ URL::asset('/assets/js/app.min.js')}}"></script>
 {{--<script src="{{ URL::asset('/assets/js/backend/common.js')}}"></script>--}}

 @yield('script-bottom')
