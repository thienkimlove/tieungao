<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>mPurpose - Multipurpose Feature Rich Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="{{url('v1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('v1/css/icomoon-social.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{url('v1/css/leaflet.css')}}" />
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{url('v1/css/leaflet.ie.css')}}" />
    <![endif]-->
    <link rel="stylesheet" href="{{url('v1/css/main.css')}}">

    <script src="{{url('v1/js/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->


<!-- Navigation & Logo-->
@include('v1.nav')

@yield('content')

<!-- Footer -->
@include('v1.footer')
<!-- Javascripts -->
<script src="{{url('v1/js/jquery-1.9.1.min.js')}}"></script>
<script>window.jQuery || document.write('<script src="{{url('v1/js/jquery-1.9.1.min.js')}}"><\/script>')</script>
<script src="{{url('v1/js/bootstrap.min.js')}}"></script>
<script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
<script src="{{url('v1/js/jquery.fitvids.js')}}"></script>
<script src="{{url('v1/js/jquery.sequence-min.js')}}"></script>
<script src="{{url('v1/js/jquery.bxslider.js')}}"></script>
<script src="{{url('v1/js/main-menu.js')}}"></script>
<script src="{{url('v1/js/template.js')}}"></script>

</body>
</html>