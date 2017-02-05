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
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <!-- sidebar menu -->
			<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                 
                  <ul class="nav side-menu">
                  <li><a href="../index.php"><i class="fa fa-home"></i> Ana Sayfa </a></li>
				  
                  <li>
					<a><i class="fa fa-plus-square"></i> Apart İşlemleri <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="apart_ekle.php">Apart Ekle</a></li>
                      <li><a href="apart_duzenle.php">Apart Düzenle</a></li>
                      <li><a href="apart_kaldir.php">Apart Kaldır</a></li>
					  <li><a href="apart_donemi_ac.php">Apart Dönemi Aç</a></li>
                    </ul>
                  </li>
				   
                  <li>
					<a><i class="fa fa-edit"></i> Rezervasyon İşlemleri <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="rezervasyon_yap.php">Rezervasyon Yap</a></li>
                      <li><a href="rezervasyon_guncelle.php">Rezervasyon Güncelle</a></li>
					  <li><a href="rezervasyon_iptal_et.php">Rezervasyon İptal Et</a></li>
					  <li><a href="rezervasyon_sorgula.php">Rezervasyon Sorgula</a></li>
                    </ul>
                  </li>
				  
                  <li><a href="rezervasyon_satis.php"><i class="fa fa-money"></i> Rezervasyon Satış </a></li>
                   
				  <li><a href="apart_durumlari.php"><i class="fa fa-calendar"></i> Apart Durumları </a></li>
				  
                  <li><a href="apart_etkinlikleri.php"><i class="fa fa-exchange"></i>Apart Etkinlikleri </a></li>
                                        
				  <li><a href="istatistikler.php"><i class="fa fa-bar-chart-o"></i> İstatistikler</a></li>
				  
				  <li><a href="musteri_bilgileri.php"><i class="fa fa-info-circle"></i> Müşteri Bilgileri </a></li>
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
				<h2 align="center">Rezervasyon İptal Et</h2>
            </nav>
			
          </div>
        </div>
        <!-- /top navigation -->

         <!-- page content -->
        <div class="right_col" role="main">
			<!-- /top tiles -->
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">   
						<h5>İptal Edilecek Rezervasyonu Sorgulayınız!</h5>
						<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br/>
							<form align="center" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
								<div class="form-group">
									<label class="control-label col-md-5 col-sm-5 col-xs-12">Apart Seçiniz</label>
									<div class="col-md-2 col-sm-6 col-xs-9">
										<select class="select2_single form-control" tabindex="-1">
											<option value="AK">Apart-1</option>
											<option value="HI">Apart-2</option>
											<option value="CA">Apart-3</option>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-5 col-sm-5 col-xs-12">Giriş Tarihi <span class="required"></span></label>	
									<div class="col-md-2 col-sm-6 col-xs-9">
										<input type="text" class="form-control" required="required" value="21/06/2016" data-inputmask="'mask': '99.99.9999'">
										<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
							  
								<div class="form-group">
									<label class="control-label col-md-5 col-sm-5 col-xs-12">Çıkış Tarihi <span class="required"></span></label>
									<div class="col-md-2 col-sm-6 col-xs-9">
										<input type="text" class="form-control" required="required" value="21/06/2016" data-inputmask="'mask': '99.99.9999'">
										<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
								
								<div class="ln_solid"></div>
								
								<div class="form-group">
									<div class="col-md-6 col-sm-6 col-xs-9 col-md-offset-3">
										<button type="submit" class="btn btn-success" >Sorgula</button>
										<button type="button" class="btn btn-danger" onclick="window.location.href='../index.php' ">İptal</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					
					<div class="x_panel">
						<div class="x_title"> 
						  <h5>İptal Edilecek Rezervasyon Bilgileri</h5>
						  <div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br/>
							 <table class="table table-hover">
								<thead>
									<tr>
										<th>Giriş Tarihi</th>
										<th>Çıkış Tarihi</th>
										<th>Apart No</th>
										<th>Fiyat</th>
										<th>Müşteri Adı</th>
										<th>Müşteri Soyadı</th>
										<th>Müşteri Telefonu</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>26.06.2017</th>
										<td>27.06.2017</th>
										<td>Apart-1</td>
										<td>100 TL</td>
										<td>Ömer</td>
										<td>Yücel</td>
										<td>05554445080</td>
									</tr>
								</tbody>
							</table>
							
							<form align="center" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
								<div class="ln_solid"></div>
								
								<div class="form-group">
									<div class="col-md-6 col-sm-6 col-xs-9 col-md-offset-3">
										<button type="submit" class="btn btn-success" >İptal Et</button>
										<button type="button" class="btn btn-danger" onclick="window.location.href='../index.php' ">İptal</button>
									</div>
								</div>
							</form>
							
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

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>