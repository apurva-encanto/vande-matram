     <!-- Vendor js -->
     <script src="{{ asset('assets/js/vendor.min.js')}}"></script>     
 

<!-- init js -->

<!-- Plugins js-->
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
<script src="{{ asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<!-- Init js-->
<script src="{{ asset('assets/js/pages/form-pickers.init.js')}}"></script>
<!-- CRM Dashboard init js-->
<script src="{{ asset('assets/js/pages/crm-dashboard.init.js')}}"></script>

<!-- App js -->


@stack('custom-scripts')

<script src="{{ asset('assets/js/app.min.js')}}"></script>   
