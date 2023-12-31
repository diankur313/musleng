<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Fontfaces CSS-->
    <link href="default/css/font-face.css" rel="stylesheet" media="all">
    <link href="default/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="plugin/DataTables/DataTables-1.10.20/css/jquery.dataTables.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS-->
    <link href="default/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="default/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="default/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="default/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="default/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="plugin/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css">

    <!-- Main CSS-->
    <link href="default/css/theme.css" rel="stylesheet" media="all">
</head>

<body>
    <style>
        #seting{
            margin-top: 15.5%;
            position: relative;
        }

                /* Style the tab */
        .tab {
          overflow: hidden;
          border: 1px solid #ccc;
          background-color: #f1f1f1;
          margin-top: -7%;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
          background-color: inherit;
          float: left;
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
          background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
          background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
          display: none;
          padding: 6px 12px;
          border: 1px solid #ccc;
          border-top: none;
          height: 650px;
        }
        div.dataTables_filter input { border: 1px solid black; }
    </style>
    <div class="page-wrapper">
            <div class="main-content">
                <div class="col-md-12">
                    <div class="tab">
                      @foreach($cek_status as $cek)
                        @if ($cek->status=== 'Aktif')
                            <button class="tablinks" onclick="content(event, 'qr')" id="defaultOpen">QR Code</button>
                            <button class="tablinks" onclick="content(event, 'manual'), manual()">Manual</button>
                            <button class="tablinks" onclick="content(event, 'izin'), izin_keluar()">Izin Keluar</button>
                        @else
                            <button class="tablinks" onclick="content(event, 'izin')", id="defaultOpen">Izin Keluar</button>
                        @endif
                      @endforeach
                    </div>

                    <div id="qr" class="tabcontent" style="background-color: #ffffff;">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="kamu_verif">{{$verified_you}}</h2>
                                                <span>Peserta</span>
                                                <span>Kamu Verifikasi</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-puzzle-piece"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="kehadiran"></h2>
                                                <span>Kehadiran Anggota</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-check"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="bidang_wakil"></h2>
                                                <span>Perwakilan Bidang</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                 <video id="preview" style="width: 103%; margin-top: 10px;"></video>
                             </div>
                             <div class="col-md-6" style="margin-top: 11px">
                                 <form method="POST">
                                    {{csrf_field()}}
                                     <div class="row">
                                       <div class="col-md-8">
                                         <label><h4>ID:</h4></label>
                                         <input style="font-size: 30px;" class="form-control" id ="id_scan" readonly></input>
                                       </div>
                                       <div class="col-md-4">
                                          <label><h4>Sesi:</h4></label>
                                          <input style="font-size: 30px;" class="form-control" value="{{$judul}}" readonly></input>
                                       </div>
                                     </div>
                                 </form>
                             </div>
                        </div>
                    </div>
                    <div id="manual" class="tabcontent" style="background-color: #ffffff;">
                        @yield('tabel-verifikasi')
                        @yield('modal-konfirmasi')
                    </div>
                    <div id="izin" class="tabcontent" style="background-color: #ffffff;">
                        @yield('tabel-izin')
                        @yield('modal-izin-keluar')
                        @yield('modal-izin-masuk')
                    </div>
                  </div>
                </div>
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
    <script src="plugin/instascan-master/src/instascan.min.js"></script>
    <script src="plugin/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="plugin/DataTables/DataTables-1.10.20/js/jquery.dataTables.js"></script>
    <script src="plugin/bootstrap-notify-master/bootstrap-notify.min.js"></script>

    <!-- Main JS-->
    <script src="default/js/main.js"></script>

</body>

<script>
            //default open tab
            document.getElementById("defaultOpen").click();
            function content(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;
            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
        
            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
        
            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
            }
</script>

            <script>
                $(document).ready(function() {
                     tabel_manual =  $('#tabel-verifikasi').DataTable( {                   
                        "processing": true,
                        "serverSide": true,
                         "ajax": "{{ url('index-user-verif') }}",
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
                            {data: 'bidang'},
                            {data: 'Aksi'}
                            ]
                    } );
                } );
            </script>

            <script>
                $(document).ready(function() {
                     tabel_izin =  $('#tabel-izin').DataTable( {                   
                        "processing": true,
                        "serverSide": true,
                         "ajax": "index-user-izin="+{{$id}},
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
                            {data: 'bidang'},
                            {data: 'Aksi'}
                            ]
                    } );
                } );
            </script>

            <script>
                function manual(){
                    tabel_manual.ajax.reload();
                }  

                function izin_keluar(){
                    tabel_izin.ajax.reload();
                }    
            </script>

            <!-- Izin Keluar -->
            <script>
                @foreach($user as $i)
                 $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}}); 
                 $('#izin_keluar{{$i->id}} form').on('submit', function(e){
                    e.preventDefault();
                             $.ajax({
                               url : "izin-keluar",
                               type : "POST",
                               data : $('#izin_keluar{{$i->id}} form').serialize(),
                               success : function(data){
                                $('#alasan_keluar{{$i->id}}').val('');
                                $('#id_anggota{{$i->id}}').val('');
                                $('#sesi{{$i->id}}').val('');
                                $('#izin_keluar{{$i->id}}').modal('hide');
                                 tabel_izin.ajax.reload();
                               },
                               error : function(){
                                 alert("Tidak dapat menyimpan data!");
                               }   
                             });
                             return false;
                       });
                @endforeach
            </script>

            <!-- Izin Masuk -->
            <script>
                @foreach($user as $j)
                     $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}}); 
                     $('#izin_masuk{{$j->id}} form').on('submit', function(e){
                        e.preventDefault();
                                 $.ajax({
                                   url : "izin-masuk",
                                   type : "POST",
                                   data : $('#izin_masuk{{$j->id}} form').serialize(),
                                   success : function(data){
                                    $('#masuk{{$j->id}}').val('');
                                    $('#izin_masuk{{$j->id}}').modal('hide');
                                     tabel_izin.ajax.reload();
                                   },
                                   error : function(){
                                     alert("Tidak dapat menyimpan data!");
                                   }   
                                 });
                                 return false;
                           });
                @endforeach
            </script>
            @foreach($user as $f)
                <script>
                    $('#ya{{$f->id}}').on('click', function(){
                        var _token = {
                                '_token' : $('input[name="_token"]').val(),                     
                                };      
                        $.ajax({
                           url : "konfirmasi-admin="+{{$f->id}},
                           type : "POST",
                           data : _token,
                           success : function(data){                       
                           tabel_manual.ajax.reload();
                           $('#verif{{$f->id}}').modal('hide');
                           $.notify({
                                    message: "<h4>Berhasil Memverifikasi</h4>"
                                },{
                                    type: 'info',
                                    delay: 1000,
                                });
                           },
                         });
                        });
                </script>
            @endforeach

            @foreach($user as $k)
                <script>
                    function detil_izin{{$k->id}}() {
                      myWindow = window.open("detail-user-izin="+{{$k->id}}, "", "width=1300, height=300");
                    }
                </script>
            @endforeach

             <script>
                setInterval(kehadiran, 10000);
                    $('#kehadiran').empty();
                    function kehadiran(){
                        $.ajax({
                            'type' : 'get',
                            'url' : '{{URL::to('admin-kehadiran')}}',
                            success : function(data){
                                $('#kehadiran').empty();
                                $('#kehadiran').append(data);
                            }
                        });
                    }
            </script>

            <script>
                setInterval(bidang, 10000);
                    $('#bidang').empty();
                    function bidang(){
                        $.ajax({
                            'type' : 'get',
                            'url' : '{{URL::to('admin-bidang-hadir')}}',
                            success : function(data){
                                $('#bidang_wakil').empty();
                                $('#bidang_wakil').append(data);
                            }
                        });
                    }
            </script>

    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
      var success = document.createElement('audio');
      var error = document.createElement('audio');
      success.setAttribute('src', 'plugin/beep-07.mp3');
      error.setAttribute('src','plugin/beep-05.mp3'); 
      scanner.addListener('scan', function (content) {
        $("#id_scan").val(content);
        $.ajax({
            'type': 'post',
            'url': "admin-konfirmasi-kehadiran="+(content),
            success : function(){
                      success.play();                       
                      $("#id_scan").val('');
                      Swal.fire({
                            icon: 'success',
                            title: 'Yeay...!',
                            text: 'Verified',
                            showConfirmButton: false,
                            timer: 3000
                            });
                      $.ajax({
                            'type' : 'get',
                            'url' : '{{URL::to('admin-verified-you')}}',
                            success : function(data){
                                $('#kamu_verif').empty();
                                $('#kamu_verif').append(data);
                            }
                        });
                    },
            error: function(xhr) {
                    var err = eval("(" + xhr.responseText + ")");
                    error.play();
                    $("#id_scan").val('');
                      Swal.fire({
                            icon: 'error',
                            title: 'Oops...!',
                            text: err,
                            showConfirmButton: false,
                            timer: 3000
                            });
            },
            });
        });

      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
</html>
<!-- end document-->
