<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link href="{{url('/')}}/img/motocross.png" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Template Main CSS File -->
    <link href="{{url('/')}}/css/style.css" rel="stylesheet">

    <!-- Bootstrap -->
    @vite(['resources/js/app.js'])
</head>
<body>

<header>
    @yield('header')
</header>

<main id="main">
    @yield('main')
</main>

<footer>
    @include('includes.footer')
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{url('/')}}/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="{{url('/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{url('/')}}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{url('/')}}/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{url('/')}}/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="{{url('/')}}/js/main.js" type="module"></script>
</body>
</html>
