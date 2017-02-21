<?php
	include "../fonksiyonlar/apart_islemleri.php";
	include "../fonksiyonlar/donem_islemleri.php";
	header('Content-Type: text/html; charset=utf-8');
	$divResult1='';
	$divResult2='';
	$apartNo='';$donemYili='';
	
	if( isset($_GET['apart_no']) )
	{
		$apartNo=$_GET['apart_no'];
		$donemYili=$_GET['apart_donem_yili'];
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
				<h2 align="center">Apart Durumları</h2>
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
							<h5>Apart Tarihleri İçin Apart ve Dönem Seçiniz!</h5>
							<div class="clearfix"></div>
						</div>
						
						<div class="x_content">
							<br/>
							<form align="center" id="form1" method="GET" data-parsley-validate class="form-horizontal form-label-left">

								<div class="form-group">
									<label class="control-label col-md-5 col-sm-6 col-xs-12">Apart Seçiniz</label>
									<div class="col-md-2 col-sm-6 col-xs-9">
										<?php
	
											$apartNoListesi=array();
											$apartNoListesi=kayitliApartNoListesi();
											$uzunluk=count($apartNoListesi);
											if($uzunluk == 0) 
											{
												$divResult='<div class="alert alert-warning alert-dismissible fade in"><strong>Sistemde Apart Kaydı Bulunmamaktadır!</strong></div>';
											}
										
										?>
										
										<select name="apart_no" id="apart_no" class="select2_single form-control" tabindex="-1">
											<?php for($i=0;$i<$uzunluk;$i++){  ?> 
											
												<option><?php echo $apartNoListesi[$i]; ?></option>
											
											<?php } ?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-5 col-sm-6 col-xs-12">Dönem Seçiniz</label>
									<div class="col-md-2 col-sm-6 col-xs-9">
										<select name="apart_donem_yili" id="apart_donem_yili" class="select2_single form-control" tabindex="-1">
											<option value="2017">2017</option>
											<option value="2018">2018</option>
											<option value="2019">2019</option>
											<option value="2020">2020</option>
										</select>
									</div>
								</div>					  
							   
								<div class="ln_solid"></div>
								
								<div class="form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									 <button type="submit" class="btn btn-success">Sorgula</button>
									</div>
								</div>

							</form>
						</div>
						 
					</div>
					
					<div>
						<?php echo $divResult1; ?>   
					</div>
					
					<div class="x_panel">
						<div class="x_title"> 
						  <h5><?php echo $apartNo." ".$donemYili; ?> Tarih Durumları</h5>
						  <div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br/>
							<?php
								if( isset($_GET['apart_no']) && isset($_GET['apart_donem_yili']) )
								{
									$apartNo=$_GET['apart_no'];
									$donemYili=$_GET['apart_donem_yili'];
									
									$apartID=apartIDGetir($apartNo);
									$donemID=donemIDGetir($donemYili);
									$acilanApartID=acilanApartIDGetir($apartID,$donemID);	 
								
									$conn=vtBaglantisi();
									mysqli_set_charset($conn, "utf8");
									
									//HAZIRAN
									$sql="SELECT gun_no, musteri_id FROM haziran WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID'";
									$result=mysqli_query($conn, $sql);
									if(mysqli_num_rows($result) > 0) 
									{
										print("<table class=\"table table-bordered\">");
										print("<tr>");
										print("<th colspan=\"30\" scope=\"row\"><center>HAZİRAN $donemYili</center></th>");
										print("</tr>");
										print("</thead>");
										print("<tbody>");
										print("<tr>");
										while($row = mysqli_fetch_assoc($result)) 
										{
											if($row["musteri_id"]==NULL)
												print("<td style=\"color:green;font-weight:bold;\">".$row["gun_no"]."</td>") ;
											else
												print("<td style=\"color:red;\">".$row["gun_no"]."</td>");
										}
										print("</tr>");
										print("</tbody>");
										print("</table class=\"table table-bordered\">");
									}
									else
									{
										$divResult2='<div class="alert alert-danger alert-dismissible fade in"><strong>Seçilen Apart ve Dönem Aktif Değildir!</strong></div>';
										print("<div>");
											echo $divResult2;
										print("</div>");
									}
									
									//TEMMUZ
									$sql="SELECT gun_no, musteri_id FROM temmuz WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID'";
									$result=mysqli_query($conn, $sql);
									if(mysqli_num_rows($result) > 0) 
									{
										print("</br>");
										print("<table class=\"table table-bordered\">");
										print("<tr>");
										print("<th colspan=\"31\" scope=\"row\"><center>TEMMUZ $donemYili</center></th>");
										print("</tr>");
										print("</thead>");
										print("<tbody>");
										print("<tr>");
										while($row = mysqli_fetch_assoc($result)) 
										{
											if($row["musteri_id"]==NULL)
												print("<td style=\"color:green;font-weight:bold;\">".$row["gun_no"]."</td>") ;
											else
												print("<td style=\"color:red;\">".$row["gun_no"]."</td>");
										}
										print("</tr>");
										print("</tbody>");
										print("</table class=\"table table-bordered\">");
									}
									
									//AGUSTOS
									$sql="SELECT gun_no, musteri_id FROM agustos WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID'";
									$result=mysqli_query($conn, $sql);
									if(mysqli_num_rows($result) > 0) 
									{
										print("</br>");
										print("<table class=\"table table-bordered\">");
										print("<tr>");
										print("<th colspan=\"31\" scope=\"row\"><center>AĞUSTOS $donemYili</center></th>");
										print("</tr>");
										print("</thead>");
										print("<tbody>");
										print("<tr>");
										while($row = mysqli_fetch_assoc($result)) 
										{
											if($row["musteri_id"]==NULL)
												print("<td style=\"color:green;font-weight:bold;\">".$row["gun_no"]."</td>") ;
											else
												print("<td style=\"color:red;\">".$row["gun_no"]."</td>");
										}
										print("</tr>");
										print("</tbody>");
										print("</table class=\"table table-bordered\">");
									}
									
									//EYLUL
									$sql="SELECT gun_no, musteri_id FROM eylul WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID'";
									$result=mysqli_query($conn, $sql);
									if(mysqli_num_rows($result) > 0) 
									{
										print("</br>");
										print("<table class=\"table table-bordered\">");
										print("<tr>");
										print("<th colspan=\"30\" scope=\"row\"><center>EYLÜL $donemYili</center></th>");
										print("</tr>");
										print("</thead>");
										print("<tbody>");
										print("<tr>");
										while($row = mysqli_fetch_assoc($result)) 
										{
											if($row["musteri_id"]==NULL)
												print("<td style=\"color:green;font-weight:bold;\">".$row["gun_no"]."</td>") ;
											else
												print("<td style=\"color:red;\">".$row["gun_no"]."</td>");
										}
										print("</tr>");
										print("</tbody>");
										print("</table class=\"table table-bordered\">");
									}
											
									mysqli_close($conn);
								}
								else
								{
									$divResult2='<div class="alert alert-warning alert-dismissible fade in"><strong>Apart Tarih Listesini Görebilmek İçin Apart Seçiniz!</strong></div>';
									print("<div>");
										 echo $divResult2;
									print("</div>");
								}
							?>
					
						</div>
					</div>
					 
					<div class="x_panel">
						<div class="x_title">   
							<h5><?php echo $apartNo." ".$donemYili; ?> Konaklayan Müşteriler</h5>
							<div class="clearfix"></div>
						</div>
						
						<div class="x_content">
							<br/>
							<?php
								if( isset($_GET['apart_no']) && isset($_GET['apart_donem_yili']) )
								{
									$apartNo=$_GET['apart_no'];
									$donemYili=$_GET['apart_donem_yili'];
									 
									$apartID=apartIDGetir($apartNo);
									$donemID=donemIDGetir($donemYili);
									$acilanApartID=acilanApartIDGetir($apartID,$donemID);
									
									$conn=vtBaglantisi();
									mysqli_set_charset($conn, "utf8");
									
									//HAZİRAN
									$sql="SELECT haziran.gun_no, apart.apart_no, musteri.ad, musteri.soyad FROM musteri, haziran, apart, acilan_apart WHERE musteri.id=haziran.musteri_id AND haziran.acilan_apart_id='$apartID' AND acilan_apart.apart_id=apart.id AND haziran.donem_id='$donemID'";
									$result=mysqli_query($conn, $sql);
									if( mysqli_num_rows($result) > 0 ) 
									{
										print("</br>");
										print("<table class=\"table table-bordered\">");
										print("<tr>");
										print("<th colspan=\"3\" scope=\"row\" style=\"font-weight:bold;font-size:16px;\"><center>".$apartNo."  ".$donemYili." "."Haziran"."</center></th>");
										print("</tr>");
										print("<tr>");
										print("<th scope=\"row\"><center>GÜNLER</center></th>");
										print("<th scope=\"row\"><center>MÜŞTERİ ADI</center></th>");
										print("<th scope=\"row\"><center>MÜŞTERİ SOYADI</center></th>");
										print("</tr>");
										print("</thead>");
										print("<tbody>");
										
										while($row = mysqli_fetch_assoc($result)) 
										{
											print("<tr>");
											print("<td style=\"color:red;font-weight:bold;\"><center>".$row["gun_no"]."</center></td>");
											print("<td style=\"font-weight:bold;\"><center>".$row["ad"]."</center></td>");
											print("<td style=\"font-weight:bold;\"><center>".$row["soyad"]."</center></td>") ;
											print("</tr>");
										}
										
										print("</tbody>");
										print("</table class=\"table table-bordered\">");
									}
									else
									{
										$divResult2='<div class="alert alert-danger alert-dismissible fade in"><strong>Seçilen Apart ve Dönem Aktif Değildir!</strong></div>';
										print("<div>");
											echo $divResult2;
										print("</div>");
									}
									
									//TEMMUZ
									$sql="SELECT temmuz.gun_no, apart.apart_no, musteri.ad, musteri.soyad FROM musteri, temmuz, apart, acilan_apart WHERE musteri.id=temmuz.musteri_id AND temmuz.acilan_apart_id='$apartID' AND acilan_apart.apart_id=apart.id AND temmuz.donem_id='$donemID'";
									$result=mysqli_query($conn, $sql);
									if( mysqli_num_rows($result) > 0 ) 
									{
										print("</br>");
										print("<table class=\"table table-bordered\">");
										print("<tr>");
										print("<th colspan=\"3\" scope=\"row\" style=\"font-weight:bold;font-size:16px;\"><center>".$apartNo."  ".$donemYili." "."Temmuz"."</center></th>");
										print("</tr>");
										print("<tr>");
										print("<th scope=\"row\"><center>GÜNLER</center></th>");
										print("<th scope=\"row\"><center>MÜŞTERİ ADI</center></th>");
										print("<th scope=\"row\"><center>MÜŞTERİ SOYADI</center></th>");
										print("</tr>");
										print("</thead>");
										print("<tbody>");
										
										while($row = mysqli_fetch_assoc($result)) 
										{
											print("<tr>");
											print("<td style=\"color:red;font-weight:bold;\"><center>".$row["gun_no"]."</center></td>");
											print("<td style=\"font-weight:bold;\"><center>".$row["ad"]."</center></td>");
											print("<td style=\"font-weight:bold;\"><center>".$row["soyad"]."</center></td>") ;
											print("</tr>");
										}
										
										print("</tbody>");
										print("</table class=\"table table-bordered\">");
									}
									
									//AĞUSTOS
									$sql="SELECT agustos.gun_no, apart.apart_no, musteri.ad, musteri.soyad FROM musteri, agustos, apart, acilan_apart WHERE musteri.id=agustos.musteri_id AND agustos.acilan_apart_id='$apartID' AND acilan_apart.apart_id=apart.id AND agustos.donem_id='$donemID'";
									$result=mysqli_query($conn, $sql);
									if( mysqli_num_rows($result) > 0 ) 
									{
										print("</br>");
										print("<table class=\"table table-bordered\">");
										print("<tr>");
										print("<th colspan=\"3\" scope=\"row\" style=\"font-weight:bold;font-size:16px;\"><center>".$apartNo."  ".$donemYili." "."Ağustos"."</center></th>");
										print("</tr>");
										print("<tr>");
										print("<th scope=\"row\"><center>GÜNLER</center></th>");
										print("<th scope=\"row\"><center>MÜŞTERİ ADI</center></th>");
										print("<th scope=\"row\"><center>MÜŞTERİ SOYADI</center></th>");
										print("</tr>");
										print("</thead>");
										print("<tbody>");
										
										while($row = mysqli_fetch_assoc($result)) 
										{
											print("<tr>");
											print("<td style=\"color:red;font-weight:bold;\"><center>".$row["gun_no"]."</center></td>");
											print("<td style=\"font-weight:bold;\"><center>".$row["ad"]."</center></td>");
											print("<td style=\"font-weight:bold;\"><center>".$row["soyad"]."</center></td>") ;
											print("</tr>");
										}
										
										print("</tbody>");
										print("</table class=\"table table-bordered\">");
									}
									
									//Eylül
									$sql="SELECT eylul.gun_no, apart.apart_no, musteri.ad, musteri.soyad FROM musteri, eylul, apart, acilan_apart WHERE musteri.id=eylul.musteri_id AND eylul.acilan_apart_id='$apartID' AND acilan_apart.apart_id=apart.id AND eylul.donem_id='$donemID'";
									$result=mysqli_query($conn, $sql);
									if( mysqli_num_rows($result) > 0 ) 
									{
										print("</br>");
										print("<table class=\"table table-bordered\">");
										print("<tr>");
										print("<th colspan=\"3\" scope=\"row\" style=\"font-weight:bold;font-size:16px;\"><center>".$apartNo."  ".$donemYili." "."Eylül"."</center></th>");
										print("</tr>");
										print("<tr>");
										print("<th scope=\"row\"><center>GÜNLER</center></th>");
										print("<th scope=\"row\"><center>MÜŞTERİ ADI</center></th>");
										print("<th scope=\"row\"><center>MÜŞTERİ SOYADI</center></th>");
										print("</tr>");
										print("</thead>");
										print("<tbody>");
										
										while($row = mysqli_fetch_assoc($result)) 
										{
											print("<tr>");
											print("<td style=\"color:red;font-weight:bold;\"><center>".$row["gun_no"]."</center></td>");
											print("<td style=\"font-weight:bold;\"><center>".$row["ad"]."</center></td>");
											print("<td style=\"font-weight:bold;\"><center>".$row["soyad"]."</center></td>") ;
											print("</tr>");
										}
										
										print("</tbody>");
										print("</table class=\"table table-bordered\">");
									}
									
									mysqli_close($conn);
								}
								else
								{
									$divResult3='<div class="alert alert-warning alert-dismissible fade in"><strong>Aylara Göre Konaklayan Müşteri Listesini Görebilmek İçin Apart Seçiniz!</strong></div>';
									print("<div>");
										 echo $divResult3;
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