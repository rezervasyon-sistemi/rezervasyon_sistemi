<?php
	
	header('Content-Type: text/html; charset=utf-8');
	include "../fonksiyonlar/apart_islemleri.php";
	include "../fonksiyonlar/donem_islemleri.php";
	
	$tarih=getdate();
	$apartNo='';
	$girisTarihi='';$cikisTarihi='';
	
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
				<h2 align="center">Rezervasyon Sorgula</h2>
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
						<h5>Sorgulanacak Rezervasyon Bilgilerini Giriniz!</h5>
						<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br/>
							<form class="form-horizontal form-label-left" id="form1" name="form1" method="POST" align="center" data-parsley-validate >
								<div class="form-group">
									<label class="control-label col-md-5 col-sm-5 col-xs-12">Apart Seçiniz</label>
									<div class="col-md-2 col-sm-6 col-xs-9">
										<?php
											$donemID=donemIDGetir($tarih['year']);
											$apartNoListesi=array();
											$apartNoListesi=acilanApartNoListesi($donemID);
											$uzunluk=count($apartNoListesi);
											if( $uzunluk==0 ) 
											{
												$divResult1='<div class="alert alert-warning alert-dismissible fade in"><strong>Bu Dönem İçin Açılan Apart Kaydı Bulunmamaktadır!</strong></div>';
											} 
										?>
									
										<select class="select2_single form-control" name="apart_no" id="apart_no" tabindex="-1">
											<?php for($i=0;$i<$uzunluk;$i++){  ?> 
											
												<option <?php if ($apartNoListesi[$i]==$apartNo) echo 'selected'; ?> value="<?php echo $apartNoListesi[$i];?>" ><?php echo $apartNoListesi[$i]; ?></option>
											
											<?php } ?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-5 col-sm-5 col-xs-12">Giriş Tarihi<span class="required"></span></label>	
									<div class="col-md-2 col-sm-6 col-xs-9">
										<input class="form-control" type="text" id="giris_tarihi" name="giris_tarihi" required="required" data-inputmask="'mask': '99.99.<?php echo $tarih['year'];?>'" /><!--"'mask': '99.99.9999'"-->
										<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
							  
								<div class="form-group">
									<label class="control-label col-md-5 col-sm-5 col-xs-12">Çıkış Tarihi<span class="required"></span></label>
									<div class="col-md-2 col-sm-6 col-xs-9">
										<input class="form-control" type="text" id="cikis_tarihi" name="cikis_tarihi" required="required" data-inputmask="'mask': '99.99.<?php echo $tarih['year'];?>'" />
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
						  <h5>Rezervasyon Bilgileri</h5>
						  <div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br/>
							<?php
								if( isset($_POST['apart_no']) && isset($_POST['giris_tarihi']) && isset($_POST['cikis_tarihi']) )
								{
									$apartNo=$_POST['apart_no'];
									$girisTarihi=$_POST['giris_tarihi'];
									$cikisTarihi=$_POST['cikis_tarihi'];
									
									$apartID=apartIDGetir($apartNo);
									$donemID=donemIDGetir($tarih['year']);
									$acilanApartID=acilanApartIDGetir($apartID,$donemID);
									
									$conn=vtBaglantisi();
									mysqli_set_charset($conn, "utf8");
									 
									$sql="SELECT rezervasyon.giris_tarihi, rezervasyon.cikis_tarihi, rezervasyon.islem_tarihi, rezervasyon.kisi_sayisi, rezervasyon.fiyat, rezervasyon.kapora, apart.apart_no, musteri.ad, musteri.soyad, musteri.tc, musteri.telefon, musteri.adres FROM rezervasyon,apart, acilan_apart, musteri WHERE rezervasyon.giris_tarihi='$girisTarihi' AND rezervasyon.cikis_tarihi='$cikisTarihi' AND rezervasyon.acilan_apart_id='$acilanApartID' AND acilan_apart.apart_id=apart.id AND musteri_id=musteri.id"; 
                                    //$sql.="FROM rezervasyon,apart,musteri"; 
									//$sql.="WHERE giris_tarihi='$girisTarihi' AND cikis_tarihi='$cikisTarihi' AND acilan_apart_id='$acilanApartID' AND musteri_id=musteri.id"; 
									
									$result=mysqli_query($conn, $sql);
									if( mysqli_num_rows($result) > 0 )
									{
										print("<table class=\"table table-hover\">");
										print("<thead>");
										print("<tr>");
										print("<th>Giriş Tarihi</th>");
										print("<th>Çıkış Tarihi</th>");
										print("<th>Apart No</th>");
										print("<th>Kişi Sayısı</th>");
										print("<th>Fiyat</th>");
										print("<th>Yatırılan Kapora</th>");
										print("<th>Müşteri Adı</th>");
										print("<th>Müşteri Soyadı</th>");
										print("<th>Müşteri TC</th>");
										print("<th>Müşteri Telefonu</th>");
										print("<th>Müşteri Adresi</th>");
										print("</tr>");
										print("</thead>");
										print("<tbody>");
										print("<tr>");
										$row = mysqli_fetch_assoc($result);
										print("<td>".$row["giris_tarihi"]."</td>");
										print("<td>".$row["cikis_tarihi"]."</td>");
										print("<td>".$row["apart_no"]."</td>");
										print("<td>".$row["kisi_sayisi"]."</td>");
										print("<td>".$row["fiyat"]." TL"."</td>");
										print("<td>".$row["kapora"]." TL"."</td>");
										print("<td>".$row["ad"]."</td>");
										print("<td>".$row["soyad"]."</td>");
										print("<td>".$row["tc"]."</td>");
										print("<td>".$row["telefon"]."</td>");
										print("<td>".$row["adres"]."</td>");
										print("</tr>");
										print("</tbody>");
										print("</table>");
									}
									else
									{
										$divResult2='<div class="alert alert-danger alert-dismissible fade in"><strong>Rezervasyon Bulunamadı!</strong></div>';
										print("<div>");
											echo $divResult2;
										print("</div>");
									}
									mysqli_close($conn);
								}
								else
								{
									$divResult2='<div class="alert alert-warning alert-dismissible fade in"><strong>Rezervasyonu Sorgulayınız!</strong></div>';
									print("<div>");
										 echo $divResult2;
									print("</div>");
								}
								
							?>
							 
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
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	<!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
	
  </body>
</html>