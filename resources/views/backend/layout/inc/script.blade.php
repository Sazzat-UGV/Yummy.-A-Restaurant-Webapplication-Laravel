<script src="{{ asset('assets/backend') }}/vendor/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/chart.js/chart.umd.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/echarts/echarts.min.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/quill/quill.min.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/simple-datatables/simple-datatables.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/tinymce/tinymce.min.js"></script>
<script src="{{ asset('assets/backend') }}/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/backend') }}/js/main.js"></script>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

@stack('admin_script')
