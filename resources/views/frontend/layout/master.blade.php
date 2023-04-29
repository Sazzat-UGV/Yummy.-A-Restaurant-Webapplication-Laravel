<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('frontend.layout.inc.style')

</head>

<body>

    <!-- ======= Header ======= -->
@include('frontend.layout.inc.header')<!-- End Header -->

    <!-- ======= HomeSection ======= -->
    @include('frontend.pages.widgets.home')
<!-- End HomeSection -->

    <main id="main">

        <!-- ======= About Section ======= -->
        @include('frontend.pages.widgets.about')
<!-- End About Section -->

        <!-- ======= Why Us Section ======= -->
        @include('frontend.pages.widgets.why-us')
<!-- End Why Us Section -->

        <!-- ======= Stats Counter Section ======= -->
        @include('frontend.pages.widgets.counter')
<!-- End Stats Counter Section -->

        <!-- ======= Menu Section ======= -->
        @include('frontend.pages.widgets.menu')
<!-- End Menu Section -->

        <!-- ======= Testimonials Section ======= -->
        @include('frontend.pages.widgets.testimonial')
<!-- End Testimonials Section -->

        <!-- ======= Events Section ======= -->
        @include('frontend.pages.widgets.events')
<!-- End Events Section -->

        <!-- ======= Chefs Section ======= -->
        @include('frontend.pages.widgets.chefs')
<!-- End Chefs Section -->

        <!-- ======= Book A Table Section ======= -->
        @include('frontend.pages.widgets.book-table')
<!-- End Book A Table Section -->

        <!-- ======= Gallery Section ======= -->
        @include('frontend.pages.widgets.gallery')
<!-- End Gallery Section -->

        <!-- ======= Contact Section ======= -->
        @include('frontend.pages.widgets.contact')
<!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
@include('frontend.layout.inc.footer')<!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
@include('frontend.layout.inc.script')

</body>

</html>
