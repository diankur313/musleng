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
    <link href="default/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="default/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="default/css/theme.css" rel="stylesheet" media="all">
    <link href="plugin/DataTables/DataTables-1.10.20/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <link href="plugin/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css">

    <!-- Vendor CSS-->
    <link href="default/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="default/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

</head>

<body>
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
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a class="js-arrow" href="admin-home">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li><li class="has-sub">
                            <a class="js-arrow" href="admin-users">
                                <i class="fas fa-tachometer-alt"></i>User</a>
                        </li>
                        <li><li class="has-sub">
                            <a class="js-arrow" href="admin-event">
                                <i class="fas fa-tachometer-alt"></i>Event</a>
                        </li>
                    </ul>
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
                            <a class="js-arrow" href="admin-home">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li><li class="active has-sub">
                            <a class="js-arrow" href="admin-users">
                                <i class="far fa-user"></i>User</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="admin-event">
                            <i class="far fa-calendar"></i>Event</a>    
                        </li>
                        <li>
                            <a class="js-arrow" href="admin-summary">
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
                      <h4>Data User</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#adduser"><b>Tambah User</b></button>
                        <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#bulk-delete"><b>Hapus User</b></button>
                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#email-bulk"><b>Send Bulk Invitation</b></button>
                        <br><br>
                        @yield('tabel-user')
                        @yield('modal-add-user')
                        @yield('modal-hapus')
                        @yield('modal-detil')
                        @yield('modal-hapus-bulk')
                        @yield('modal-edit-user')
                        @yield('email-bulk')
                        @yield('personal-mail')
                      </div>
                  </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
    
    <style type="text/css">
        div.dataTables_filter input { border: 1px solid black; }
    </style>

    <!-- Jquery JS-->
    <script src="default/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="default/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="default/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="default/vendor/slick/slick.min.js">
    </script>
    <script src="default/vendor/wow/wow.min.js"></script>
    <script src="default/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="default/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="default/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="default/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="default/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="default/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="default/vendor/select2/select2.min.js"></script>
    <script src="plugin/DataTables/DataTables-1.10.20/js/jquery.dataTables.js"></script>
    <script src="plugin/sweetalert2/dist/sweetalert2.all.js"></script>

    <!-- Main JS-->
    <script src="default/js/main.js"></script>
</body>
<script>
                $("#manual").on('click', function(){
                    $("#import").prop("checked", false);
                    $("#name").prop("disabled", false);
                    $("#gender").prop("disabled", false);
                    $("#id_ang").prop("disabled", false);
                    $("#kate").prop("disabled", false);
                    $("#pass").prop("disabled", false);                    
                    $("#masuk").prop("disabled", true);
                });
            </script>
            <script>
                $("#import").on('click', function(){
                    $("#manual").prop("checked", false);
                    $("#name").prop("disabled", true);
                    $("#gender").prop("disabled", true);
                    $("#id_ang").prop("disabled", true);
                    $("#kate").prop("disabled", true);
                    $("#pass").prop("disabled", true);                    
                    $("#masuk").prop("disabled", false);
                });
            </script>
                  <!-- Enable/Disable NIM-->
            <script>
                      function gori() {
                          var val = $('#kate').val();
                          if (val =="Undangan") {
                              $('#nama_angk').prop('disabled', true) && $('#thn_angk').prop('disabled', true) && $('#lev').prop('disabled', true) && $('#bid').prop('disabled', true);
                          } else if (val =="") {
                              $('#nama_angk').prop('disabled', true) && $('#thn_angk').prop('disabled', true) && $('#lev').prop('disabled', true) && $('#bid').prop('disabled', true);
                          } else {
                            $('#nama_angk').prop('disabled', false) && $('#thn_angk').prop('disabled', false) && $('#lev').prop('disabled', false) && $('#bid').prop('disabled', false);
                          }
                      }
            </script>

            <script>
                $(document).ready(function() {
                   t =  $('#tabel-user').DataTable( {                   
                        "processing": true,
                        "serverSide": true,
                         "ajax": "index-user",
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
                            {data:'rownum',sWidth: '5%'},
                            {data: 'id_anggota',sWidth: '7%'},
                            {data: 'nama',sWidth: '10%'},
                            {data: 'level',sWidth: '5%'},
                            {data: 'bidang',sWidth: '5%'},
                            {data: 'email',sWidth: '5%'},
                            {data: 'Aksi',sWidth: '10%'}
                            ],
                    } );
                } );
            </script>

            <script>
                $('#import').on('click', function(){
                    $('#simpan').on('click', function(){
                            if (!$(this).val())
                            {
                                Swal.fire({
                                    title: 'Importing Data. Please Wait...',
                                    allowOutsideClick: false,
                                    showConfirmButton: false
                                    });
                                swal.showLoading();
                            }
                    });
                });
            </script>

</html>
