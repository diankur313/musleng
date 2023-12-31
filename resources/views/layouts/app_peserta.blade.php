<!DOCTYPE html>
<html>

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assessment/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assessment/assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Home</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.7 -->
    <link href="{{ asset('assessment/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset ('assessment/assets/css/paper-dashboard.css') }}" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="{{asset('assessment/assets/css/animate.min.css')}}" rel="stylesheet" />
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('assessment/assets/css/themify-icons.css')}}" rel="stylesheet">
    <link href="plugin/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css">

    <!-- custom css -->
    <link href="{{asset ('css/custom.css') }}" rel="stylesheet" />
</head>

<body>
@yield('content')
</body>
<!-- Bootstrap 3.3.7 JS -->
<script src="{!! asset ('assessment/assets/js/jquery-3.3.1.min.js') !!}" type="text/javascript"></script>
<script src="{{asset('assessment/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="{{asset('assessment/assets/js/paper-dashboard.js')}}"></script>
<script src="plugin/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="{{'js/peserta/index.js'}}" type="text/javascript"></script>
@yield('script')
</html>