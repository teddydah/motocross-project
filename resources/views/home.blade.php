<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <title>Auribail Mx Park</title>

    <!-- Favicons -->
    <link href="img/logo-motocross.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Vendor CSS Files -->
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    @vite(['resources/js/app.css', 'resources/js/app.js'])

    <!-- Template Main CSS File -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<header>
    @include('includes.header')
</header>

@include('includes.hero')

<main id="main">
    @yield('content')

    @include('includes.main.about')

    @include('includes.main.about_list')

    @include('includes.main.counts')

    @include('includes.main.services')

    @include('includes.main.portfolio')

    @include('includes.main.team')

    @include('includes.main.testimonials')

    @include('includes.main.contact')
</main>

<footer>
    @include('includes.footer')
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="vendor/purecounter/purecounter_vanilla.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/glightbox/js/glightbox.min.js"></script>
<script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="vendor/swiper/swiper-bundle.min.js"></script>
<!--<script src="vendor/php-email-form/validate.js"></script>-->

<!-- Template Main JS File -->
<script src="js/main.js" type="module"></script>
</body>
</html>
