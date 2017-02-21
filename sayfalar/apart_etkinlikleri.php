<?php
	
	include "../fonksiyonlar/apart_islemleri.php";
	include "../fonksiyonlar/donem_islemleri.php";
	header('Content-Type: text/html; charset=utf-8');
	
	$divResult1='';$divResult2='';
	
	$istenenGun='';
	
	if( isset($_POST['gun']) )
	{
		$istenenGun=$_POST['gun'];
	}

?>

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
				<h2 align="center">Apart Etkinlikleri</h2>
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
						<h5>Apart Etkinliklerini Görüntülemek için Gün Seçiniz!</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br/>
						<form align="center" id="form1" method="POST" data-parsley-validate class="form-horizontal form-label-left">
							<div class="form-group">
								<label class="control-label col-md-5 col-sm-6 col-xs-12">Gün Seçiniz</label>
								<div class="col-md-2 col-sm-6 col-xs-9">
									<select name="gun" id="gun" class="select2_single form-control" tabindex="-1">
										<option <?php if($istenenGun=="bugun") echo 'selected' ?> value="bugun">Bugün</option>
										<option <?php if($istenenGun=="yarin") echo 'selected' ?> value="yarin">Yarın</option>
									</select>
								</div>
							</div>					  
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button type="submit" class="btn btn-success">Görüntüle</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				
				
				<div class="x_panel">
					<div class="x_title">
						<h5>Apart Giriş ve Çıkışları</h5>
						<div class="clearfix"></div>
					</div>
					
					 <div class="x_content">
						<?php
							if( isset($_POST['gun']) )
							{
								$istenenGun=$_POST['gun'];
								
								switch($istenenGun) 
								{
									case "bugun":
									
										$tarih=getdate();
										$gun=$tarih['mday'];
										$ay=$tarih['mon'];
										$yil=$tarih['year'];
										$donemID=donemIDGetir($yil);
										$bugun=( ($gun<10) ? '0' : '').$gun.".".( ($ay<10) ? '0' : '').$ay.".".$yil;
										//$bugun="15.06.2017";
										
										$conn=vtBaglantisi();
										mysqli_set_charset($conn, "utf8");
										
										//Bugüne Ait Girişler
										$sql="SELECT distinct apart.apart_no, rezervasyon.giris_tarihi, rezervasyon.cikis_tarihi, rezervasyon.kisi_sayisi, musteri.ad, musteri.soyad, musteri.telefon, musteri.adres FROM musteri, rezervasyon, apart, acilan_apart, donem, haziran WHERE donem.id='$donemID' AND rezervasyon.giris_tarihi='$bugun' AND apart.id=acilan_apart.apart_id AND rezervasyon.musteri_id=musteri.id"; 
										$result=mysqli_query($conn, $sql);
										if(mysqli_num_rows($result) > 0) 
										{
											print("<table class=\"table table-bordered\">");
											print("<tr>");
											print("<th colspan=\"8\" scope=\"row\" style=\"font-weight:bold;font-size:16px;\"><center>".$bugun." Apart Giriş Etkinliği</center></th>");
											print("</tr>");
											print("<tr>");
											print("<th scope=\"row\"><center>Apart No</center></th>");
											print("<th scope=\"row\"><center>Kişi Sayısı</center></th>");
											print("<th scope=\"row\"><center>Giriş Tarihi</center></th>");
											print("<th scope=\"row\"><center>Çıkış Tarihi</center></th>");
											print("<th scope=\"row\"><center>Müşteri Adı</center></th>");
											print("<th scope=\"row\"><center>Müşteri Soyadı</center></th>");
											print("<th scope=\"row\"><center>Müşteri Telefonu</center></th>");
											print("<th scope=\"row\"><center>Müşteri Adresi</center></th>");
											print("</tr>");
											print("</thead>");
											print("<tbody>");
											
											while( $row = mysqli_fetch_assoc($result) )
											{
												print("<tr>");
												print("<td align=\"center\">".$row["apart_no"]."</td>");
												print("<td align=\"center\">".$row["kisi_sayisi"]."</td>");
												print("<td align=\"center\">".$row["giris_tarihi"]."</td>");
												print("<td align=\"center\">".$row["cikis_tarihi"]."</td>");
												print("<td align=\"center\">".$row["ad"]."</td>");
												print("<td align=\"center\">".$row["soyad"]."</td>");
												print("<td align=\"center\">".$row["telefon"]."</td>");
												print("<td align=\"center\">".$row["adres"]."</td>");
												print("</tr>");
											}
											print("</tbody>");
											print("</table>");
										}
										else
										{
											$divResult1='<div class="alert alert-danger alert-dismissible fade in"><strong>Bugün Apart Giriş Etkinliği Bulunmamaktadır!</strong></div>';
											print("<div>");
											echo $divResult1;
											print("</div>");
										}
										
										//Bugüne Ait Çıkışlar
										$sql="SELECT distinct apart.apart_no, rezervasyon.giris_tarihi, rezervasyon.cikis_tarihi, rezervasyon.kisi_sayisi, musteri.ad, musteri.soyad, musteri.telefon, musteri.adres FROM musteri, rezervasyon, apart, acilan_apart, donem, haziran WHERE donem.id='$donemID' AND rezervasyon.cikis_tarihi='$bugun' AND apart.id=acilan_apart.apart_id AND rezervasyon.musteri_id=musteri.id"; 
			 
										$result=mysqli_query($conn, $sql);
										if(mysqli_num_rows($result) > 0) 
										{
											print("<table class=\"table table-bordered\">");
											print("<tr>");
											print("<th colspan=\"8\" scope=\"row\" style=\"font-weight:bold;font-size:16px;\"><center>".$bugun." Apart Çıkış Etkinliği</center></th>");
											print("</tr>");
											print("<tr>");
											print("<th scope=\"row\"><center>Apart No</center></th>");
											print("<th scope=\"row\"><center>Kişi Sayısı</center></th>");
											print("<th scope=\"row\"><center>Giriş Tarihi</center></th>");
											print("<th scope=\"row\"><center>Çıkış Tarihi</center></th>");
											print("<th scope=\"row\"><center>Müşteri Adı</center></th>");
											print("<th scope=\"row\"><center>Müşteri Soyadı</center></th>");
											print("<th scope=\"row\"><center>Müşteri Telefonu</center></th>");
											print("<th scope=\"row\"><center>Müşteri Adresi</center></th>");
											print("</tr>");
											print("</thead>");
											print("<tbody>");
											
											while( $row = mysqli_fetch_assoc($result) )
											{
												print("<tr>");
												print("<td align=\"center\">".$row["apart_no"]."</td>");
												print("<td align=\"center\">".$row["kisi_sayisi"]."</td>");
												print("<td align=\"center\">".$row["giris_tarihi"]."</td>");
												print("<td align=\"center\">".$row["cikis_tarihi"]."</td>");
												print("<td align=\"center\">".$row["ad"]."</td>");
												print("<td align=\"center\">".$row["soyad"]."</td>");
												print("<td align=\"center\">".$row["telefon"]."</td>");
												print("<td align=\"center\">".$row["adres"]."</td>");
												print("</tr>");
											}
											print("</tbody>");
											print("</table>");
										}
										else
										{
											$divResult1='<div class="alert alert-danger alert-dismissible fade in"><strong>Bugün Apart Çıkış Etkinliği Bulunmamaktadır!</strong></div>';
											print("<div>");
											echo $divResult1;
											print("</div>");
										}
										
										mysqli_close($conn);
										break;
										
									case "yarin":
										
										$tarih=getdate(strtotime("tomorrow"));
										$gun=$tarih['mday'];
										$ay=$tarih['mon'];
										$yil=$tarih['year'];
										$donemID=donemIDGetir($yil);
										$yarin=( ($gun<10) ? '0' : '').$gun.".".( ($ay<10) ? '0' : '').$ay.".".$yil;
										//$yarin="15.06.2017";
										
										$conn=vtBaglantisi();
										mysqli_set_charset($conn, "utf8");
										
										//Yarına Ait Giriş
										$sql="SELECT distinct apart.apart_no, rezervasyon.giris_tarihi, rezervasyon.cikis_tarihi, rezervasyon.kisi_sayisi, musteri.ad, musteri.soyad, musteri.telefon, musteri.adres FROM musteri, rezervasyon, apart, acilan_apart, donem, haziran WHERE donem.id='$donemID' AND rezervasyon.giris_tarihi='$yarin' AND apart.id=acilan_apart.apart_id AND rezervasyon.musteri_id=musteri.id"; 
										$result=mysqli_query($conn, $sql);
										if(mysqli_num_rows($result) > 0) 
										{
											print("</br>");
											print("<table class=\"table table-bordered\">");
											print("<tr>");
											print("<th colspan=\"8\" scope=\"row\" style=\"font-weight:bold;font-size:16px;\"><center>".$yarin." Apart Giriş Etkinliği</center></th>");
											print("</tr>");
											print("<tr>");
											print("<th scope=\"row\"><center>Apart No</center></th>");
											print("<th scope=\"row\"><center>Kişi Sayısı</center></th>");
											print("<th scope=\"row\"><center>Giriş Tarihi</center></th>");
											print("<th scope=\"row\"><center>Çıkış Tarihi</center></th>");
											print("<th scope=\"row\"><center>Müşteri Adı</center></th>");
											print("<th scope=\"row\"><center>Müşteri Soyadı</center></th>");
											print("<th scope=\"row\"><center>Müşteri Telefonu</center></th>");
											print("<th scope=\"row\"><center>Müşteri Adresi</center></th>");
											print("</tr>");
											print("</thead>");
											print("<tbody>");
											
											while( $row = mysqli_fetch_assoc($result) )
											{
												print("<tr>");
												print("<td align=\"center\">".$row["apart_no"]."</td>");
												print("<td align=\"center\">".$row["kisi_sayisi"]."</td>");
												print("<td align=\"center\">".$row["giris_tarihi"]."</td>");
												print("<td align=\"center\">".$row["cikis_tarihi"]."</td>");
												print("<td align=\"center\">".$row["ad"]."</td>");
												print("<td align=\"center\">".$row["soyad"]."</td>");
												print("<td align=\"center\">".$row["telefon"]."</td>");
												print("<td align=\"center\">".$row["adres"]."</td>");
												print("</tr>");
											}
											print("</tbody>");
											print("</table>");
										}
										else
										{
											$divResult1='<div class="alert alert-danger alert-dismissible fade in"><strong>Yarın Apart Giriş Etkinliği Bulunmamaktadır!</strong></div>';
											print("<div>");
											echo $divResult1;
											print("</div>");
										}
										
										//Yarına Ait Çıkış
										$sql="SELECT distinct apart.apart_no, rezervasyon.giris_tarihi, rezervasyon.cikis_tarihi, rezervasyon.kisi_sayisi, musteri.ad, musteri.soyad, musteri.telefon, musteri.adres FROM musteri, rezervasyon, apart, acilan_apart, donem, haziran WHERE donem.id='$donemID' AND rezervasyon.cikis_tarihi='$yarin' AND apart.id=acilan_apart.apart_id AND rezervasyon.musteri_id=musteri.id"; 

										$result=mysqli_query($conn, $sql);
										if(mysqli_num_rows($result) > 0) 
										{
											print("</br>");
											print("<table class=\"table table-bordered\">");
											print("<tr>");
											print("<th colspan=\"8\" scope=\"row\" style=\"font-weight:bold;font-size:16px;\"><center>".$yarin." Apart Çıkış Etkinliği</center></th>");
											print("</tr>");
											print("<tr>");
											print("<th scope=\"row\"><center>Apart No</center></th>");
											print("<th scope=\"row\"><center>Kişi Sayısı</center></th>");
											print("<th scope=\"row\"><center>Giriş Tarihi</center></th>");
											print("<th scope=\"row\"><center>Çıkış Tarihi</center></th>");
											print("<th scope=\"row\"><center>Müşteri Adı</center></th>");
											print("<th scope=\"row\"><center>Müşteri Soyadı</center></th>");
											print("<th scope=\"row\"><center>Müşteri Telefonu</center></th>");
											print("<th scope=\"row\"><center>Müşteri Adresi</center></th>");
											print("</tr>");
											print("</thead>");
											print("<tbody>");
											
											while( $row = mysqli_fetch_assoc($result) )
											{
												print("<tr>");
												print("<td align=\"center\">".$row["apart_no"]."</td>");
												print("<td align=\"center\">".$row["kisi_sayisi"]."</td>");
												print("<td align=\"center\">".$row["giris_tarihi"]."</td>");
												print("<td align=\"center\">".$row["cikis_tarihi"]."</td>");
												print("<td align=\"center\">".$row["ad"]."</td>");
												print("<td align=\"center\">".$row["soyad"]."</td>");
												print("<td align=\"center\">".$row["telefon"]."</td>");
												print("<td align=\"center\">".$row["adres"]."</td>");
												print("</tr>");
											}
											print("</tbody>");
											print("</table>");
										}
										else
										{
											$divResult1='<div class="alert alert-danger alert-dismissible fade in"><strong>Yarın Apart Çıkış Etkinliği Bulunmamaktadır!</strong></div>';
											print("<div>");
											echo $divResult1;
											print("</div>");
										}
										
										mysqli_close($conn);
										break;
								}
							}
							else
							{
								$divResult2='<div class="alert alert-warning alert-dismissible fade in"><strong>Apart Giriş ve Çıkışlarını Görebilmek İçin Gün Seçiniz!</strong></div>';
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