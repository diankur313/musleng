<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="default/css/font-face.css" rel="stylesheet" media="all">
    <link href="default/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="default/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="default/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="default/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="default/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="plugin/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="plugin/DataTables/DataTables-1.10.20/css/jquery.dataTables.css" rel="stylesheet" type="text/css">

    <!-- Main CSS-->
    <link href="default/css/theme.css" rel="stylesheet" media="all">
    <style>
        #seting{
            margin-top: 15.5%;
            position: relative;
        }

        .bootstrap-select .bs-ok-default::after {
            width: 0.3em;
            height: 0.6em;
            border-width: 0 0.1em 0.1em 0;
            transform: rotate(45deg) translateY(0.5rem);
        }

        .btn.dropdown-toggle:focus {
            outline: none !important;
        }
    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                         <div class="logo" >
                <img src="default/images/icon/emr.png"/>
            </div>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <li class="active has-sub">
                            <a class="js-arrow" href="admin-home">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="admin-users">
                                <i class="far fa-user"></i>User</a>
                        </li><li class="active has-sub">
                            <a class="js-arrow" href="admin-event">
                            <i class="far fa-calendar"></i>Event</a>    
                        </li>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo" >
                <img src="default/images/icon/emr.png"/>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="verif-home">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="verif-users">
                            <i class="far fa-user"></i>User</a>
                        <li>
                            <a class="js-arrow" href="verif-event">
                            <i class="far fa-calendar"></i>Event</a>    
                        </li>
                        <li><li class="active has-sub">
                            <a class="js-arrow" href="verif-summary">
                            <i class="fa fa-list"></i>Summary</a>    
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}
                               </form>
                                    <a class="btn btn-md btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ti-power-off"></i>
                                    <p>Logout</p>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Kehadiran Selama Musleng</h4>
                    </div>
                    <div class="card-body">
                        @yield('tabel-hadir')
                        <br><br>
                    </div>
                  </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="default/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="default/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="default/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="default/vendor/slick/slick.min.js"></script>
    <script src="default/vendor/wow/wow.min.js"></script>
    <script src="default/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="default/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="default/vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="default/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="default/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="default/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="default/vendor/select2/select2.min.js"></script>
    <script src="plugin/select2/dist/js/select2.min.js"></script>
    <script src="plugin/DataTables/DataTables-1.10.20/js/jquery.dataTables.js"></script>
    <!-- Main JS-->
    <script src="default/js/main.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

             @foreach($user as $a)
                <script>
                    function verif_detil_izin_summary{{$a->id}}() {
                      myWindow = window.open("verif-detail-user-izin="+{{$a->id}}, "", "width=1300, height=300");
                    }
                </script>
             @endforeach

             <script>
                $(document).ready(function() {
                   oTable =  $('#tabel-summary-hadir').DataTable( {                   
                        "processing": true,
                        "serverSide": true,
                         "ajax": "{{ url('verif-index-user-hadir') }}",
                         "dataType": "json",
                         "headers": { 'content-type': 'application/json'},
                         "method": "GET",
                         "language": {
                            "sProcessing": "Mengontak Server...",
                            "sLengthMenu": "Tampilkan _MENU_ entri",
                            "sZeroRecords": "Data Tidak Tersedia",
                            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                            "sInfoPostFix": "",
                            "sSearch": "Pencarian:",
                            "sUrl": "",
                            "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                            }
                        },
                        "columns":[
                            {data: 'id_anggota'},
                            {data: 'nama'},
                            {data: 'kategori'},
                            {data: 'nama_angkatan'},
                            {data: 'bidang'},
                            {data: 'Detail'}
                            ]
                    } );
                } );
            </script>

</body>

</html>

<!-- end document-->
