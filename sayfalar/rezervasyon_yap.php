<?php

	include "../fonksiyonlar/apart_islemleri.php";
	include "../fonksiyonlar/donem_islemleri.php";
	include "../fonksiyonlar/musteri_islemleri.php";
	include "../fonksiyonlar/rezervasyon_islemleri.php";
	
	header('Content-Type: text/html; charset=utf-8');
	
	$divResult1='';$divResult2='';$divResult3='';
	$apartNo='';
	$tarih=getdate();
	$islemGunu=( ($tarih['mday']<10) ? '0' : '') .$tarih['mday']. '.' .( ($tarih['mon']<10) ? '0' : '') .$tarih['mon']. '.' .$tarih['year'];
	
	if( isset($_GET['apart_no']) )
	{
		$apartNo=$_GET['apart_no'];
	}
	
	if( isset($_POST['giris_tarihi']) && isset($_POST['cikis_tarihi']) )
	{
		$apartNo=$_GET['apart_no'];
		$apartID=apartIDGetir($apartNo);
		$donemID=donemIDGetir($tarih['year']);
		
		//Müşteri Bilgileri
		$musteriTC=$_POST['musteri_tc'];
		$musteriAdi=$_POST['musteri_adi'];
		$musteriSoyadi=$_POST['musteri_soyadi'];
		$musteriTel=$_POST['musteri_tel'];
		$musteriAdresi=$_POST['musteri_adresi'];
		
		//Rezervasyon Bilgileri
		$acilanApartID=acilanApartIDGetir($apartID,$donemID);
		$girisTarihi=$_POST['giris_tarihi'];
		$cikisTarihi=$_POST['cikis_tarihi'];
		$islemTarihi=$_POST['islem_tarihi'];
		$kisiSayisi=$_POST['kisi_sayisi'];
		$konaklamaFiyati=(double)$_POST['konaklama_fiyati'];
		$kapora=(double)$_POST['kapora'];
		
		if( musteriEkle($musteriTC, $musteriAdi, $musteriSoyadi, $musteriTel, $musteriAdresi) )
		{
			$musteriID=musteriIDGetir($musteriTel);
			
			if( rezervasyonKaydi($acilanApartID, $musteriID, $girisTarihi, $cikisTarihi, $islemTarihi, $kisiSayisi, $konaklamaFiyati, $kapora) )
			{
				if( rezervasyonTarihKaydi($donemID, $acilanApartID, $girisTarihi, $cikisTarihi, $musteriID) )
				{
					$divResult3='<div class="alert alert-success alert-dismissible fade in"><strong>Rezarvasyon İşlemi Başarıyla Geçekleştirilmiştir!</strong></div>';
				}
				else
				{
					$divResult3='<div class="alert alert-success alert-dismissible fade in"><strong>Rezarvasyon İşlemi Gerçekleştirilememiştir!</strong></div>';
				}
			}
			else
			{
				$divResult3='<div class="alert alert-success alert-dismissible fade in"><strong>Rezarvasyon İşlemi Gerçekleştirilememiştir!</strong></div>';
			}
		}
		else
		{
			$divResult3='<div class="alert alert-danger alert-dismissible fade in"><strong>Müşteri Sisteme Eklenememiştir!</strong></div>';
		}
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
				<h2 align="center">Rezervasyon Yap</h2>
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
						  <h5>Uygun Rezervasyon Tarihlerini Sorgulayınız!</h5>
						  <div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br/>
							<form class="form-horizontal form-label-left" align="center" id="form1" name="form1" method="GET" data-parsley-validate>
								<div class="form-group">
									<label class="control-label col-md-5 col-sm-6 col-xs-9">Apart Seçiniz</label>
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
									 
										<select name="apart_no" id="apart_no" class="select2_single form-control" tabindex="-1">
											<?php for($i=0;$i<$uzunluk;$i++){  ?> 
											
												<option <?php if ($apartNoListesi[$i]==$apartNo) echo 'selected'; ?> value="<?php echo $apartNoListesi[$i];?>" ><?php echo $apartNoListesi[$i]; ?></option>
											
											<?php } ?>
										</select>
									</div>
								</div>
							
								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-6 col-sm-6 col-xs-9 col-md-offset-3">
										<button type="submit" class="btn btn-success" >Sorgula</button>
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
						  <h5><?php echo $apartNo; ?> Rezervasyon Tarihleri</h5>
						  <div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br/>
							<?php
								if(isset($_GET['apart_no']))
								{
									$apartNo=$_GET['apart_no'];
									$donemYili=$tarih['year'];
									
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
											if(@$row["musteri_id"]==NULL)
												print("<td style=\"color:green;font-weight:bold;\">".$row["gun_no"]."</td>") ;
											else
												print("<td style=\"color:red;\">".$row["gun_no"]."</td>");
										}
										print("</tr>");
										print("</tbody>");
										print("</table class=\"table table-bordered\">");
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
											if(@$row["musteri_id"]==NULL)
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
											if(@$row["musteri_id"]==NULL)
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
											if(@$row["musteri_id"]==NULL)
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
									$divResult2='<div class="alert alert-warning alert-dismissible fade in"><strong>Rezervasyon Tarih Listesini Görebilmek İçin Apart Seçiniz!</strong></div>';
									print("<div>");
										 echo $divResult2;
									print("</div>");
								}
							?>
					
						</div>
					</div>
					
					<div class="x_panel">
						<div class="x_title"> 
						  <h5>Tarihleri Kontrol Ediniz!</h5>
						  <div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br/>
							<?php 
								$divResult4='';
								$giris_tarihi='';
								$cikis_tarihi='';
								if( isset($_POST['kontrol_giris_tarihi']) && isset($_POST['kontrol_cikis_tarihi']) ) 
								{
									if( tarihUygunluk($_POST['kontrol_giris_tarihi'], $_POST['kontrol_cikis_tarihi'] ) )
									{
										$apartNo=$_GET['apart_no'];
										$apartID=apartIDGetir($apartNo);
										$donemID=donemIDGetir($tarih['year']); 
										$acilanApartID=acilanApartIDGetir($apartID,$donemID);
										
										if( tarihlerBosMu($donemID, $acilanApartID, $_POST['kontrol_giris_tarihi'], $_POST['kontrol_cikis_tarihi']) )
										{
											$giris_tarihi=$_POST['kontrol_giris_tarihi'];
											$cikis_tarihi=$_POST['kontrol_cikis_tarihi'];
										}
										else
										{
											$divResult4='<div class="alert alert-danger alert-dismissible fade in"><strong>Tarihlerin Uygunluğunu Kontrol Ediniz!</strong></div>';
										}
									}
									else
									{
										$divResult4='<div class="alert alert-danger alert-dismissible fade in"><strong>Tarihlerin Uygunluğunu Kontrol Ediniz!</strong></div>';
									}
									 
								}
								
								?>
							<form class="form-horizontal form-label-left" align="center" id="form2" name="form2" method="POST" data-parsley-validate>
								
								<div class="form-group">
									<label class="control-label col-md-5 col-sm-5 col-xs-12">Giriş Tarihi <span class="required"></span></label>							
									<div class="col-md-2 col-sm-6 col-xs-9">
										<input class="form-control" type="text" id="kontrol_giris_tarihi" name="kontrol_giris_tarihi" required="required" data-inputmask="'mask': '99.99.<?php echo $tarih['year'];?>'" />
										<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
							  
								<div class="form-group">
									<label class="control-label col-md-5 col-sm-5 col-xs-12">Çıkış Tarihi <span class="required"></span></label>
									<div class="col-md-2 col-sm-6 col-xs-9"><!--"'mask': '99.99.9999'"-->
										<input class="form-control" type="text" id="kontrol_cikis_tarihi" name="kontrol_cikis_tarihi" required="required" data-inputmask="'mask': '99.99.<?php echo $tarih['year'];?>'" />
										<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
								 
								<div class="ln_solid"></div>
								
								<div class="form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
										<button type="submit" class="btn btn-success">Kontrol Et</button>
									</div>
								</div>
								
							</form>
						</div>
					</div>
					
					<div>
						<?php echo $divResult4; ?>   
					</div>
					
					<div class="x_panel">
						<div class="x_title"> 
						  <h5>Rezervasyon Bilgilerini Giriniz!</h5>
						  <div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br/>
							<form class="form-horizontal form-label-left" align="center" id="form3" name="form3" method="POST" onsubmit="return confirm('Rezervasyonu Onaylıyor Musunuz?')" data-parsley-validate>
								
								<div class="form-group">
									 
									<label class="control-label col-md-4 col-sm-3 col-xs-3">İşlem Tarihi<span class="required"></span></label>							
									<div class="col-md-4 col-sm-5 col-xs-12">
										<input class="form-control" type="text" id="islem_tarihi" name="islem_tarihi"  readonly="readonly" value="<?php echo "$islemGunu";  ?>" />
										<span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Apart No</label>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<input class="form-control col-md-7 col-xs-12" type="text" id="apart_no" name="apart_no" readonly="readonly" value="<?php echo "$apartNo"; ?>" />
										<span class="fa fa-check form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-3">Giriş Tarihi <span class="required"></span></label>							
									<div class="col-md-4 col-sm-5 col-xs-12">
										<input class="form-control" type="text" id="giris_tarihi" name="giris_tarihi"  readonly="readonly" value="<?php echo "$giris_tarihi"; ?>"/>
										<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
							  
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-3">Çıkış Tarihi <span class="required"></span></label>
									<div class="col-md-4 col-sm-6 col-xs-12"><!--"'mask': '99.99.9999'"-->
										<input class="form-control" type="text" id="cikis_tarihi" name="cikis_tarihi" readonly="readonly" value="<?php echo "$cikis_tarihi"; ?>"/>
										<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Kişi Sayısı <span class="required"></span></label>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<input class="form-control col-md-7 col-xs-12" type="text" id="kisi_sayisi" name="kisi_sayisi" required="required" />
										<span class="fa fa-users form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Konaklama Fiyatı <span class="required"></span></label>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<input class="form-control col-md-7 col-xs-12" type="text" id="konaklama_fiyati" name="konaklama_fiyati" required="required" />
										<span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
							  
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Yatırılan Kapora<span class="required"></span></label>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<input class="form-control col-md-7 col-xs-12" type="text" id="kapora" name="kapora" required="required" />
										<span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
								
								</br>
							  
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" for="musteri-adi">Müşteri Adı<span class="required"></span></label>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<input class="form-control col-md-7 col-xs-12" type="text" id="musteri_adi" name="musteri_adi" required="required" />
										<span class="fa fa-info form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" for="musteri-soyadi">Müşteri Soyadı<span class="required"></span></label>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<input class="form-control col-md-7 col-xs-12" type="text" id="musteri_soyadi" name="musteri_soyadi" required="required" />
										<span class="fa fa-info form-control-feedback right" aria-hidden="true"></span>
									</div>
								 </div>
								 
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" for="musteri-tc">Müşteri TC</label>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<input class="form-control" type="text" id="musteri_tc" name="musteri_tc" data-inputmask="'mask': '99999999999'" />
										<span class="fa fa-info form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Müşteri Telefonu<span class="required"></span></label>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<input class="form-control" type="text" id="musteri_tel" name="musteri_tel" required="required" data-inputmask="'mask': '0 999 999 99 99'" />
										<span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Müşteri Adresi<span class="required"></span></label>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<input class="form-control col-md-7 col-xs-12" type="text" id="musteri_adresi" name="musteri_adresi" required="required">
										<span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
									</div>
								</div>
								
								<div class="ln_solid"></div>
								
								<div class="form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
										<button type="submit" class="btn btn-success">Kaydet</button>
										<button type="button" class="btn btn-danger" onclick="window.location.href='../index.php' ">İptal</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					
					<div>
						<?php echo $divResult3; ?>   
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