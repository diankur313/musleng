<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>E.M.R | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Carlos Alvarez - Alvarez.is">

    <link rel="stylesheet" type="text/css" href="sekretaris/bootstrap/css/bootstrap.min.css" />

    <link href="sekretaris/css/main.css" rel="stylesheet">
    <link href="sekretaris/css/font-style.css" rel="stylesheet">
    <link href="sekretaris/css/flexslider.css" rel="stylesheet">

    <script type="text/javascript" src="sekretaris/js/jquery.js"></script>    
    <script type="text/javascript" src="sekretaris/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="sekretaris/js/lineandbars.js"></script>
    
	<script type="text/javascript" src="sekretaris/js/dash-charts.js"></script>
	<script type="text/javascript" src="sekretaris/js/gauge.js"></script>
	
	<!-- NOTY JAVASCRIPT -->
	<script type="text/javascript" src="sekretaris/js/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="sekretaris/js/noty/layouts/top.js"></script>
	<script type="text/javascript" src="sekretaris/js/noty/layouts/topLeft.js"></script>
	<script type="text/javascript" src="sekretaris/js/noty/layouts/topRight.js"></script>
	<script type="text/javascript" src="sekretaris/js/noty/layouts/topCenter.js"></script>
	
	<!-- You can add more layouts if you want -->
	<script type="text/javascript" src="sekretaris/js/noty/themes/default.js"></script>
    <!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
	<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
	<script src="sekretaris/js/jquery.flexslider.js" type="text/javascript"></script>

    <script type="text/javascript" src="sekretaris/js/admin.js"></script>
      
    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
   

  	<!-- Google Fonts call. Font Used Open Sans & Raleway -->
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

<script type="text/javascript">
    $(document).ready(function () {

        $("#btn-blog-next").click(function () {
            $('#blogCarousel').carousel('next')
        });
        $("#btn-blog-prev").click(function () {
            $('#blogCarousel').carousel('prev')
        });

        $("#btn-client-next").click(function () {
            $('#clientCarousel').carousel('next')
        });
        $("#btn-client-prev").click(function () {
            $('#clientCarousel').carousel('prev')
        });

    });

</script>    
  </head>
  <body>
  
  	<!-- NAVIGATION MENU -->

    <div class="container">

	  <!-- FIRST ROW OF BLOCKS -->     
      <div class="row">

      <!-- USER PROFILE BLOCK -->
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
	      		<dtitle>User Profile</dtitle>
	      		<hr>
				<div class="thumbnail">
					<img src="sekretaris/images/face80x80.png" alt="Marcel Newman" class="img-circle">
				</div><!-- /thumbnail -->
				<h1>{{$nama}}</h1>
				<h3>Sekretaris</h3>
				<br>
					<div class="info-user">
						 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}
                         </form>
						<span aria-hidden="true" class="li_key fs1" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></span>
					</div>
				</div>
        </div>

      <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
		  		<dtitle>Total Sesi</dtitle>
		  		<hr>
		  		<br><br><br><br>
	        	<center><p style="font-size: 88px";>{{$tot_sesi}}</p></center>
			</div>
        </div>

      <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
		  		<dtitle>Kehadiran</dtitle>
		  		<hr>
		  		<br><br><br><br>
	        	<center><p style="font-size: 50px"; id="hadir">Loading...</p></center>
			</div>
        </div>

        <div class="col-sm-3 col-lg-3">
      		<a onclick="kehadiran_bidang()">
      			<div class="dash-unit">
		  		<dtitle>Perwakilan bidang</dtitle>
		  		<hr>
		  		<br><br><br><br>
	        	<center><p style="font-size: 50px"; id="bidang_hadir">Loading...</p></center>
			    </div>
      		</a>
        </div>
      </div><!-- /row -->
      
	<div id="footerwrap">
      	<footer class="clearfix"></footer>
      	<div class="container">
      		<div class="row">
      			<div class="col-sm-12 col-lg-12">
      			<p style="font-size: 90px";>{{$nama_sesi}}</p>
      			</div>

      		</div><!-- /row -->
      	</div><!-- /container -->		
	</div><!-- /footerwrap -->
          
</body>

			<script>
                setInterval(kehadiran, 10000);
                    function kehadiran(){
                        $.ajax({
                            'type' : 'get',
                            'url' : '{{URL::to('jumlah-kehadiran')}}',
                            success : function(data){
                                $('#hadir').empty();
                                $('#hadir').append(data);
                            }
                        });
                    }
            </script>

            <script>
                setInterval(bidang, 10000);
                    function bidang(){
                        $.ajax({
                            'type' : 'get',
                            'url' : '{{URL::to('jumlah-kehadiran-bidang')}}',
                            success : function(data){
                                $('#bidang_hadir').empty();
                                $('#bidang_hadir').append(data);
                            }
                        });
                    }
            </script>

            	<script>
                    function kehadiran_bidang() {
                      myWindow = window.open("detail-kehadiran-bidang", "", "width=500, height=800");
                    }
                </script>

</html>