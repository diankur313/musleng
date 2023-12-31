<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="paper-dashboard-free-v1.1.2/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="paper-dashboard-free-v1.1.2/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="paper-dashboard-free-v1.1.2/assets/css/bootstrap.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="paper-dashboard-free-v1.1.2/assets/css/animate.min.css" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="paper-dashboard-free-v1.1.2/assets/css/paper-dashboard.css" rel="stylesheet" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!-- <link href="paper-dashboard-free-v1.1.2/assets/css/demo.css" rel="stylesheet" /> -->

    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="paper-dashboard-free-v1.1.2/assets/css/themify-icons.css" rel="stylesheet">
    <!-- <link href="{{ asset('datatables/jquery.dataTables.css') }}" rel="stylesheet"> -->
    <link href="https://cdn.datatables.net/v/bs/dt-1.13.2/datatables.css" />

    <!--Sweet alert 2-->
    <link href="{{ asset ('plugin/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        /* Optional: Add custom styles if needed */
        .qr_code {
            max-width: 100%;
            /* max-height: 1650px; */
            height: auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-background-color="black" data-active-color="danger">
            <div class="sidebar-wrapper">
                <div class="logo"></div>
                <!-- Set Active to Dashboard Admin -->
                <ul class="nav">
                    --
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                        </button>
                        @yield('scanner')
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ti-power-off"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @if(!request()->is('scanner-home'))
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright pull-right">
                        &copy; <script>
                            document.write(new Date().getFullYear())
                        </script>, made with <i class="fa fa-heart heart"></i>
                    </div>
                </div>
            </footer>
            @endif
        </div>
    </div>
</body>

<!--   Core JS Files   -->
<script src="paper-dashboard-free-v1.1.2/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="paper-dashboard-free-v1.1.2/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--  Charts Plugin -->
<script src="paper-dashboard-free-v1.1.2/assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="paper-dashboard-free-v1.1.2/assets/js/bootstrap-notify.js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="paper-dashboard-free-v1.1.2/assets/js/paper-dashboard.js"></script>
@yield('script')