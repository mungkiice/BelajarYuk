<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BelajarYuk &mdash; Proses Belajar menjadi Asik!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BelajarYuk Website Pembelajaran Online" />
    <meta name="keywords" content="belajar, guru les, private, pelajaran, pertanyaan, donasi" />
    <meta name="author" content="BelajarYuk" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        window.App = {!! json_encode([
          'csrf_token' => csrf_token(),
          'user' => Auth::guard('web_user')->user(),
          'pengajar' => Auth::guard('web_pengajar')->user(),
          'pengajarSignedIn' => Auth::guard('web_pengajar')->check(),
          'userSignedIn' => Auth::guard('web_user')->check(),
          ])!!}
      </script>
    <!-- 
    //////////////////////////////////////////////////////

    FREE HTML5 TEMPLATE 
    DESIGNED & DEVELOPED by FREEHTML5.CO
        
    Website:        http://freehtml5.co/
    Email:          info@freehtml5.co
    Twitter:        http://twitter.com/fh5co
    Facebook:       https://www.facebook.com/fh5co

    //////////////////////////////////////////////////////
-->

<!-- Facebook and Twitter integration -->
<meta property="og:title" content=""/>
<meta property="og:image" content=""/>
<meta property="og:url" content=""/>
<meta property="og:site_name" content=""/>
<meta property="og:description" content=""/>
<meta name="twitter:title" content="" />
<meta name="twitter:image" content="" />
<meta name="twitter:url" content="" />
<meta name="twitter:card" content="" />

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<link rel="shortcut icon" href="favicon.ico">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Monsterrat:400,700|Merriweather:400,300italic,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
<!-- Animate.css -->
<link rel="stylesheet" href="{{asset('css/animate.css')}}">
<!-- Icomoon Icon Fonts-->
<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
<!-- Magnific Popup-->
<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
<!-- Bootstrap  -->
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

<!-- Cards -->
<link rel="stylesheet" href="{{asset('css/cards.css')}}">
<link rel="stylesheet" href="{{asset('css/main.css')}}">

<!-- Modernizr JS -->
<script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
<!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <div id="app">
        <div id="fh5co-page">
            @include('layouts.nav')    
            @yield('content')
            @include('layouts.fab')
            @include('layouts.footer')
        </div>
        <form-login></form-login>
        <loading></loading>
    </div>
    <!-- END page-->

    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- jQuery Easing -->
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Waypoints -->
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
    <!-- Owl Carousel -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <!-- Magnific Popup -->
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Stellar -->
    <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
    <!-- countTo -->
    <script src="{{asset('js/jquery.countTo.js')}}"></script>
    <!-- WOW -->
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>
    <!-- Main -->
    <script src="{{asset('js/main.js')}}"></script>
    {{-- script for using vue js --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        $('.dropdown-toggle').dropdown();
    </script>
</body>
</html>
