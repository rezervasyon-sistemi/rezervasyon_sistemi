<?php
	
	header('Content-Type: text/html; charset=utf-8');
	include "../fonksiyonlar/vt_baglantisi.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rezervasyon Sistemi </title>

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
				  
                  <li><a href="rezervasyon_satis.php"><i class="fa fa-credit-card"></i> Rezervasyon Satış </a></li>
                   
				  <li><a href="apart_durumlari.php"><i class="fa fa-calendar"></i> Apart Durumları </a></li>
				  
                  <li><a href="apart_etkinlikleri.php"><i class="fa fa-exchange"></i>Apart Etkinlikleri </a></li>
                                        
				  <li><a href="musteri_bilgileri.php"><i class="fa fa-info-circle"></i> Müşteri Bilgileri </a></li>
				
				  <li>
					<a><i class="fa fa-bar-chart-o"></i> İstatistikler <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="apart_istatistikleri.php">Apart İstatistikleri</a></li>
                      <li><a href="donem_istatistikleri.php">Dönem İstatistikleri</a></li>
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
				<h2 align="center">Müşteri Bilgileri</h2>
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
				  <h5>Sorgulanacak Müşteriye Ait Sorgulama Kriterini Seçip Sorgulama Yapınız!</h5>
				  <div class="clearfix"></div>
                </div>
				<div class="x_content">
					<br/>
					<form class="form-horizontal form-label-left" align="center" id="form1" method="POST"  data-parsley-validate >
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-5 col-xs-12">Sorgulama Kiriteri</label>
							<div class="col-md-3 col-sm-6 col-xs-9">
								<select class="select2_single form-control" id="kriter" name="kriter" tabindex="-1">
									<option value="ada_gore">Ada Göre</option>
									<option value="soyada_gore">Soyada Göre</option>
									<option value="telefona_gore">Telefon Numarasına Göre</option>
									<option value="tarihe_gore">Tarihe Göre</option>
								</select>
							</div>
							
							<div class="form-group">
								<div class="col-md-3 col-sm-1 col-xs-2">
									<input class="form-control col-md-3 col-xs-5" type="text" id="bilgi" name="bilgi" required="required" placeholder="Bilgi" />
									<span class="fa fa-info form-control-feedback right" aria-hidden="true"></span>
								</div>
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
					<h5>Konaklayan Müşteri Bilgileri</h5>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br/>
					<?php
						if( isset($_POST['kriter']) && isset($_POST['bilgi']) )
						{
							$kriter=$_POST['kriter'];
							$bilgi=$_POST['bilgi'];
							
							$conn=vtBaglantisi();
							mysqli_set_charset($conn, "utf8");
							
							if( $kriter=="ada_gore" )
							{
								$sql="SELECT apart.apart_no, rezervasyon.giris_tarihi, rezervasyon.cikis_tarihi, rezervasyon.kisi_sayisi, rezervasyon.fiyat, musteri.ad, musteri.soyad, musteri.tc, musteri.telefon, musteri.adres FROM apart, musteri, rezervasyon, acilan_apart where musteri.ad='$bilgi' AND acilan_apart_id=apart.id AND musteri_id=musteri.id";
								$result=mysqli_query($conn, $sql);
								if( mysqli_num_rows($result) > 0 )
								{
									print("<table class=\"table table-hover\">");
									print("<thead>");
									print("<tr>");
									print("<th>Apart No</th>");
									print("<th>Giriş Tarihi</th>");
									print("<th>Çıkış Tarihi</th>");
									print("<th>Kisi Sayısı</th>");
									print("<th>Fiyat</th>");
									print("<th>Müşteri Adı</th>");
									print("<th>Müşteri Soyadı</th>");
									print("<th>Müşteri TC</th>");
									print("<th>Müşteri Telefonu</th>");
									print("<th>Müşteri Adresi</th>");
									print("</tr>");
									print("</thead>");
									while( $row = mysqli_fetch_assoc($result) )
									{
										print("<tbody>");
										print("<tr>");
										print("<td>".$row["apart_no"]."</td>");
										print("<td>".$row["giris_tarihi"]."</td>");
										print("<td>".$row["cikis_tarihi"]."</td>");
										print("<td>".$row["kisi_sayisi"]."</td>");
										print("<td>".$row["fiyat"]." TL"."</td>");
										print("<td>".$row["ad"]."</td>");
										print("<td>".$row["soyad"]."</td>");
										print("<td>".$row["tc"]."</td>");
										print("<td>".$row["telefon"]."</td>");
										print("<td>".$row["adres"]."</td>");
										print("</tr>");
									}
									print("</tbody>");
									print("</table>");									
								}
								else
								{
									$divResult2='<div class="alert alert-danger alert-dismissible fade in"><strong>Müşteri Bulunamadı!</strong></div>';
									print("<div>");
										echo $divResult2;
									print("</div>");
								}
							}
							
							else if( $kriter=="soyada_gore" )
							{
								$sql="SELECT apart.apart_no, rezervasyon.giris_tarihi, rezervasyon.cikis_tarihi, rezervasyon.kisi_sayisi, rezervasyon.fiyat, musteri.ad, musteri.soyad, musteri.tc, musteri.telefon, musteri.adres FROM apart, musteri, rezervasyon, acilan_apart where musteri.soyad='$bilgi' AND acilan_apart_id=apart.id AND musteri_id=musteri.id";
								$result=mysqli_query($conn, $sql);
								if( mysqli_num_rows($result) > 0 )
								{
									print("<table class=\"table table-hover\">");
									print("<thead>");
									print("<tr>");
									print("<th>Apart No</th>");
									print("<th>Giriş Tarihi</th>");
									print("<th>Çıkış Tarihi</th>");
									print("<th>Kisi Sayısı</th>");
									print("<th>Fiyat</th>");
									print("<th>Müşteri Adı</th>");
									print("<th>Müşteri Soyadı</th>");
									print("<th>Müşteri TC</th>");
									print("<th>Müşteri Telefonu</th>");
									print("<th>Müşteri Adresi</th>");
									print("</tr>");
									print("</thead>");
									while( $row = mysqli_fetch_assoc($result) )
									{
										print("<tbody>");
										print("<tr>");
										print("<td>".$row["apart_no"]."</td>");
										print("<td>".$row["giris_tarihi"]."</td>");
										print("<td>".$row["cikis_tarihi"]."</td>");
										print("<td>".$row["kisi_sayisi"]."</td>");
										print("<td>".$row["fiyat"]." TL"."</td>");
										print("<td>".$row["ad"]."</td>");
										print("<td>".$row["soyad"]."</td>");
										print("<td>".$row["tc"]."</td>");
										print("<td>".$row["telefon"]."</td>");
										print("<td>".$row["adres"]."</td>");
										print("</tr>");
									}
									print("</tbody>");
									print("</table>");									
								}
								else
								{
									$divResult2='<div class="alert alert-danger alert-dismissible fade in"><strong>Müşteri Bulunamadı!</strong></div>';
									print("<div>");
										echo $divResult2;
									print("</div>");
								}
							}
							
							else if( $kriter=="telefona_gore" )
							{
								$bilgi=$bilgi[0].' '.$bilgi[1].$bilgi[2].$bilgi[3].' '.$bilgi[4].$bilgi[5].$bilgi[6].' '.$bilgi[7].$bilgi[8].' '.$bilgi[9].$bilgi[10];
								$sql="SELECT apart.apart_no, rezervasyon.giris_tarihi, rezervasyon.cikis_tarihi, rezervasyon.kisi_sayisi, rezervasyon.fiyat, musteri.ad, musteri.soyad, musteri.tc, musteri.telefon, musteri.adres FROM apart, musteri, rezervasyon, acilan_apart where musteri.telefon='$bilgi' AND acilan_apart_id=apart.id AND musteri_id=musteri.id";
								$result=mysqli_query($conn, $sql);
								if( mysqli_num_rows($result) > 0 )
								{
									print("<table class=\"table table-hover\">");
									print("<thead>");
									print("<tr>");
									print("<th>Apart No</th>");
									print("<th>Giriş Tarihi</th>");
									print("<th>Çıkış Tarihi</th>");
									print("<th>Kisi Sayısı</th>");
									print("<th>Fiyat</th>");
									print("<th>Müşteri Adı</th>");
									print("<th>Müşteri Soyadı</th>");
									print("<th>Müşteri TC</th>");
									print("<th>Müşteri Telefonu</th>");
									print("<th>Müşteri Adresi</th>");
									print("</tr>");
									print("</thead>");
									while( $row = mysqli_fetch_assoc($result) )
									{
										print("<tbody>");
										print("<tr>");
										print("<td>".$row["apart_no"]."</td>");
										print("<td>".$row["giris_tarihi"]."</td>");
										print("<td>".$row["cikis_tarihi"]."</td>");
										print("<td>".$row["kisi_sayisi"]."</td>");
										print("<td>".$row["fiyat"]." TL"."</td>");
										print("<td>".$row["ad"]."</td>");
										print("<td>".$row["soyad"]."</td>");
										print("<td>".$row["tc"]."</td>");
										print("<td>".$row["telefon"]."</td>");
										print("<td>".$row["adres"]."</td>");
										print("</tr>");
									}
									print("</tbody>");
									print("</table>");									
								}
								else
								{
									$divResult2='<div class="alert alert-warning alert-dismissible fade in"><strong>Müşteri Bulunamadı!</strong></div>';
									print("<div>");
										echo $divResult2;
									print("</div>");
								}
							}
							
							else
							{
								$sql="SELECT apart.apart_no, rezervasyon.giris_tarihi, rezervasyon.cikis_tarihi, rezervasyon.kisi_sayisi, rezervasyon.fiyat, musteri.ad, musteri.soyad, musteri.tc, musteri.telefon, musteri.adres FROM apart, musteri, rezervasyon, acilan_apart where (rezervasyon.giris_tarihi='$bilgi' OR  rezervasyon.cikis_tarihi='$bilgi') AND acilan_apart_id=apart.id AND musteri_id=musteri.id";
								$result=mysqli_query($conn, $sql);
								if( mysqli_num_rows($result) > 0 )
								{
									print("<table class=\"table table-hover\">");
									print("<thead>");
									print("<tr>");
									print("<th>Apart No</th>");
									print("<th>Giriş Tarihi</th>");
									print("<th>Çıkış Tarihi</th>");
									print("<th>Kisi Sayısı</th>");
									print("<th>Fiyat</th>");
									print("<th>Müşteri Adı</th>");
									print("<th>Müşteri Soyadı</th>");
									print("<th>Müşteri TC</th>");
									print("<th>Müşteri Telefonu</th>");
									print("<th>Müşteri Adresi</th>");
									print("</tr>");
									print("</thead>");
									while( $row = mysqli_fetch_assoc($result) )
									{
										print("<tbody>");
										print("<tr>");
										print("<td>".$row["apart_no"]."</td>");
										print("<td>".$row["giris_tarihi"]."</td>");
										print("<td>".$row["cikis_tarihi"]."</td>");
										print("<td>".$row["kisi_sayisi"]."</td>");
										print("<td>".$row["fiyat"]." TL"."</td>");
										print("<td>".$row["ad"]."</td>");
										print("<td>".$row["soyad"]."</td>");
										print("<td>".$row["tc"]."</td>");
										print("<td>".$row["telefon"]."</td>");
										print("<td>".$row["adres"]."</td>");
										print("</tr>");
									}
									print("</tbody>");
									print("</table>");									
								}
								else
								{
									$divResult2='<div class="alert alert-warning alert-dismissible fade in"><strong>Müşteri Bulunamadı!</strong></div>';
									print("<div>");
										echo $divResult2;
									print("</div>");
								}
							}
							
							mysqli_close($conn);
						}
						else
						{
							$divResult2='<div class="alert alert-warning alert-dismissible fade in"><strong>Konaklayan Müşteriyi Sorgulayınız!</strong></div>';
							print("<div>");
								 echo $divResult2;
							print("</div>");
						}
					?>
					  
				</div>
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