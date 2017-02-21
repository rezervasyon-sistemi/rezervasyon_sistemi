<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rezervasyon Sistemi</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md" onload="tarihYaz() ; saatOlustur()">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">             
            <!-- sidebar menu -->
			<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                 
                <ul class="nav side-menu">
                  <li><a href=""><i class="fa fa-home"></i> Ana Sayfa </a></li>
				  
                  <li>
					<a><i class="fa fa-plus-square"></i> Apart İşlemleri <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sayfalar/apart_ekle.php">Apart Ekle</a></li>
                      <li><a href="sayfalar/apart_duzenle.php">Apart Düzenle</a></li>
                      <li><a href="sayfalar/apart_kaldir.php">Apart Kaldır</a></li>
					  <li><a href="sayfalar/apart_donemi_ac.php">Apart Dönemi Aç</a></li>
                    </ul>
                  </li>
				   
                  <li>
					<a><i class="fa fa-edit"></i> Rezervasyon İşlemleri <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sayfalar/rezervasyon_yap.php">Rezervasyon Yap</a></li>
                      <li><a href="sayfalar/rezervasyon_guncelle.php">Rezervasyon Güncelle</a></li>
					  <li><a href="sayfalar/rezervasyon_iptal_et.php">Rezervasyon İptal Et</a></li>
					  <li><a href="sayfalar/rezervasyon_sorgula.php">Rezervasyon Sorgula</a></li>
                    </ul>
                  </li>
				  
                  <li><a href="sayfalar/rezervasyon_satis.php"><i class="fa fa-credit-card"></i> Rezervasyon Satış </a></li>
                   
				  <li><a href="sayfalar/apart_durumlari.php"><i class="fa fa-calendar"></i> Apart Durumları </a></li>
				  
                  <li><a href="sayfalar/apart_etkinlikleri.php"><i class="fa fa-exchange"></i>Apart Etkinlikleri </a></li>
                   
				  <li><a href="sayfalar/musteri_bilgileri.php"><i class="fa fa-info-circle"></i> Müşteri Bilgileri </a></li>
				
				  <li>
					<a><i class="fa fa-bar-chart-o"></i> İstatistikler <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sayfalar/apart_istatistikleri.php">Apart İstatistikleri</a></li>
                      <li><a href="sayfalar/donem_istatistikleri.php">Dönem İstatistikleri</a></li>
                    </ul>
                  </li>
 
                </ul>
				
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
				<h2 align="center">Ana Sayfa</h2>
            </nav>
			
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main"> 
          <!-- /top tiles -->
          </br> </br> </br> </br> </br> </br>  
			<div align="center">
				<div> 
					<div class="x_content">
						<div class="alert alert-success" style="margin-left:300px; margin-right:300px;">
							<span style="font-size:28px; color:black;">Apart Rezervasyon Sistemi</span>
						</div>
						<!--<span style="font-size:30px; color:black;">Apart Rezervasyon Sistemi</span>-->
						</br> </br>
						<p class="text-muted well well-sm no-shadow" style="margin-top: 100px; margin-left:300px; margin-right:300px;">
							 <span id="span_tarih" style="font-size:50px;"></span></u>
							</br>
							<span id="span_saat" style="font-size:60px;"></span>
						</p>
						</br> </br> 
					</div>
				</div>  
			</div>
		</div>
		<!-- /page content -->
		
    </div>
	</div>
	<!-- footer content -->
        <footer>
          <div class="pull-right">
            Apart Rezevasyon Sistemi - @Ömer Yücel - Yunus Emre Küçük
          </div>
          <div class="clearfix"></div>
        </footer>
    <!-- /footer content -->
		
	<script type="text/JavaScript">
		function tarihYaz()
		{
			var t=new Date();
			var gun=t.getDate();
			var ay=t.getMonth() + 1;
			var yil=t.getFullYear();
			var tarih=( (gun<10) ? '0' : '' ) + gun + '.' + ( (ay<10) ? '0' : '' ) + ay + '.' + yil; 
			span_tarih.innerHTML=tarih;
		}
				
		function saatOlustur()
		{
			var zaman=new Date();
			var saat=zaman.getHours();
			var dakika=zaman.getMinutes();
			var saniye=zaman.getSeconds();
			suankiZaman=( (saat<10) ? '0' : '' ) + saat + ':' + ( (dakika<10) ? '0' : '' ) + dakika + ':' + ( (saniye<10) ? '0' : '' ) + saniye;
			span_saat.innerHTML=suankiZaman;
			setTimeout("saatOlustur()",1000);
		}
	</script>

	<!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
     
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
  
</html>