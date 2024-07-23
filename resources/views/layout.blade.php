<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ env('APP_URL') }}/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ env('APP_URL') }}/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/custom.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/user_info.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/formlogin.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @notifyCss
</head>

<body>
    @include('HeaderAndFooter.header');
    @yield('content');
    @include('HeaderAndFooter.footer');
    <!-- ALL JS FILES -->
    <script src="{{ env('APP_URL') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ env('APP_URL') }}/js/popper.min.js"></script>
    <script src="{{ env('APP_URL') }}/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ env('APP_URL') }}/js/jquery.superslides.min.js"></script>
    <script src="{{ env('APP_URL') }}/js/bootstrap-select.js"></script>
    <script src="{{ env('APP_URL') }}/js/inewsticker.js"></script>
    <script src="{{ env('APP_URL') }}/js/bootsnav.js"></script>
    <script src="{{ env('APP_URL') }}/js/images-loded.min.js"></script>
    <script src="{{ env('APP_URL') }}/js/isotope.min.js"></script>
    <script src="{{ env('APP_URL') }}/js/owl.carousel.min.js"></script>
    <script src="{{ env('APP_URL') }}/js/baguetteBox.min.js"></script>
    <script src="{{ env('APP_URL') }}/js/form-validator.min.js"></script>
    <script src="{{ env('APP_URL') }}/js/contact-form-script.js"></script>
    <script src="{{ env('APP_URL') }}/js/custom.js"></script>
    <script src="{{ env('APP_URL') }}/js/jquery-ui.js"></script>
    <script src="{{ env('APP_URL') }}/js/jquery.nicescroll.min.js"></script>
    <script src="{{ env('APP_URL') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ env('APP_URL') }}/js/main.js"></script>
    <script src="{{ env('APP_URL') }}/js/app.js"></script>
    @notifyJs
</body>

</html>