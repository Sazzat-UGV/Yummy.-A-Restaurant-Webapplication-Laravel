<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @include('backend.layout.inc.style')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('backend.layout.inc.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('backend.layout.inc.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">

        <!-- End Page Title -->

        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('backend.layout.inc.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    @include('backend.layout.inc.script')

</body>

</html>
