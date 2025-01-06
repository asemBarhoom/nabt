<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Abaayah|عباية</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('/admin/imgs/logo_abaya.png')}}" rel="icon">
    <link href="{{asset('/admin/imgs/logo_abaya.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
{{--    <link href="https://fonts.googleapis.com/css?family=Tajawal:400,500,700" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('website/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('website/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('website/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('website/assets/vendor/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('website/assets/vendor/slick/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('website/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('website/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('website/assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Appland - v2.0.0
    * Template URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>
<!-- preload -->
<div class="se-pre-con" id="loader">
    <div data-loader="jumping"></div>
</div>


@yield('page_content')



<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('website/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('website/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('website/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('website/assets/vendor/slick/slick.js')}}"></script>
<script src="{{asset('website/assets/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('website/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('admin/sweetalert2.js')}}" type="text/javascript"></script>

@if(session()->has('message'))
    <script>
        $(document).ready(function () {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: "{{ session()->get('message') }}",
                showConfirmButton: false,
                timer: 1500
            })
        })
    </script>
@endif
<!-- Template Main JS File -->
<script src="{{asset('website/assets/js/main.js')}}"></script>
@yield("custom_scripts")
</body>
</html>