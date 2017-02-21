<?php
	
	header('Content-Type: text/html; charset=utf-8');
	
	function rezervasyonKaydi($acilanApartID, $musteriID, $girisTarihi, $cikisTarihi, $islemTarihi, $kisiSayisi, $konaklamaFiyatı, $kapora)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql = "INSERT INTO rezervasyon (id, acilan_apart_id, musteri_id, giris_tarihi, cikis_tarihi, islem_tarihi, kisi_sayisi, fiyat, kapora) VALUES (NULL, '$acilanApartID', '$musteriID' ,'$girisTarihi', '$cikisTarihi', '$islemTarihi', '$kisiSayisi', '$konaklamaFiyatı', '$kapora') ";
		
		$kontrol;
		if(mysqli_query($conn, $sql)) 
		{
			$kontrol=true;
		} 
		else 
		{
			$kontrol=false;
		} 
		mysqli_close($conn);
		
		return $kontrol;
	}
	
	function rezervasyonIptalEt($rezervasyonID)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql = "DELETE FROM rezervasyon WHERE id=$rezervasyonID";
		
		$kontrol;
		if (mysqli_query($conn, $sql)) 
		{
			$kontrol=true;
		} 
		else 
		{
			$kontrol=false;
			//$divResult='<div class="alert alert-danger alert-dismissible fade in"><strong>Apart Sistemden Silinememiştir! Hata: '.mysqli_error($conn).'</strong></div>';
		} 
		mysqli_close($conn);
		
		return $kontrol;
	}
	
	function tarihUygunluk($girisTarihi,$cikisTarihi)
	{
		$giris=explode(".", $girisTarihi);
		$cikis=explode(".", $cikisTarihi);
		
		$giris[0]=(int)$giris[0];
		$giris[1]=(int)$giris[1];
		$cikis[0]=(int)$cikis[0];
		$cikis[1]=(int)$cikis[1];
		
		$kontrol;
		if( $giris[0]<32 && $giris[1]<13 && $cikis[0]<32 && $cikis[1]<13 )
		{
			if( $giris[1]<$cikis[1] )
			{
				$kontrol=true;
			}
			else if( $giris[1]>$cikis[1] )
			{
				$kontrol=false;
			}
			else if( $giris[1]==$cikis[1] )
			{
				if( $giris[0]<$cikis[0] )
				{
					$kontrol=true;
				}
				else
				{
					$kontrol=false;
				}
			}
			else
			{
				$kontrol=false;
			}
		}
		else
		{
			$kontrol=false;
		}
		return $kontrol;
	}
	
	function tarihlerBosMu($donemID, $acilanApartID, $girisTarihi, $cikisTarihi)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		
		$giris=explode(".", $girisTarihi);
		$cikis=explode(".", $cikisTarihi);
		
		$giris[0]=(int)$giris[0]; //Giriş Günü
		$giris[1]=(int)$giris[1]; //Giriş Ayı
		
		$cikis[0]=(int)$cikis[0]; //Çıkış Günü
		$cikis[1]=(int)$cikis[1]; //Çıkış Ayı
				
		$kontrol=true;
		if($giris[1]==6) //Giriş Haziran
		{
			if($cikis[1]==6) //Giriş Haziran-Çıkış Haziran
			{
				for($gun=$giris[0];$gun<$cikis[0];$gun++)
				{
					$sql="SELECT musteri_id FROM haziran WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}
					}
				}
			}
			else if($cikis[1]==7) //Giriş Haziran-Çıkış Temmuz
			{
				for($gun=$giris[0];$gun<31;$gun++)
				{
					$sql="SELECT musteri_id FROM haziran WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="SELECT musteri_id FROM temmuz WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
			}
			else if($cikis[1]==8) //Giriş Haziran-Çıkış Ağustos
			{
				for($gun=$giris[0];$gun<31;$gun++)
				{
					$sql="SELECT musteri_id FROM haziran WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
				for($gun=1;$gun<32;$gun++)
				{
					$sql="SELECT musteri_id FROM temmuz WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="SELECT musteri_id FROM agustos WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
			}
			else if($cikis[1]==9) //Giriş Haziran-Çıkış Eylül
			{
				for($gun=$giris[0];$gun<31;$gun++)
				{
					$sql="SELECT musteri_id FROM haziran WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
				for($gun=1;$gun<32;$gun++)
				{
					$sql="SELECT musteri_id FROM temmuz WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
				for($gun=1;$gun<32;$gun++)
				{
					$sql="SELECT musteri_id FROM agustos WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="SELECT musteri_id FROM eylul WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
			}
		}
		
		else if($giris[1]==7) //Giriş Temmuz
		{
			if($cikis[1]==7) //Giriş Temmuz-Çıkış Temmuz
			{
				for($gun=$giris[0];$gun<$cikis[0];$gun++)
				{
					$sql="SELECT musteri_id FROM temmuz WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
			}
			else if($cikis[1]==8) //Giriş Temmuz-Çıkış Ağustos
			{
				for($gun=$giris[0];$gun<32;$gun++)
				{
					$sql="SELECT musteri_id FROM temmuz WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="SELECT musteri_id FROM agustos WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
			}
			else if($cikis[1]==9) //Giriş Temmuz-Çıkış Eylül
			{
				for($gun=$giris[0];$gun<32;$gun++)
				{
					$sql="SELECT musteri_id FROM temmuz WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
				for($gun=1;$gun<32;$gun++)
				{
					$sql="SELECT musteri_id FROM agustos WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="SELECT musteri_id FROM eylul WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
			}
		}
		
		else if($giris[1]==8) //Giriş Agustos
		{
			if($cikis[1]==8) //Giriş Agustos-Çıkış Agustos
			{
				for($gun=$giris[0];$gun<$cikis[0];$gun++)
				{
					$sql="SELECT musteri_id FROM agustos WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
			}
			else if($cikis[1]==9) //Giriş Ağustos-Çıkış Eylül
			{
				for($gun=$giris[0];$gun<32;$gun++)
				{
					$sql="SELECT musteri_id FROM agustos WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="SELECT musteri_id FROM eylul WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
			}
		}
		
		else if($giris[1]==9) //Giriş Eylül
		{
			if($cikis[1]==9) //Giriş Eylül-Çıkış Eylül
			{
				for($gun=$giris[0];$gun<$cikis[0];$gun++)
				{
					$sql="SELECT musteri_id FROM eylul WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no='$gun'";
					$result=mysqli_query($conn, $sql);
					if( mysqli_num_rows($result) > 0 ) 
					{
						$row = mysqli_fetch_assoc($result);
						if($row["musteri_id"]!=NULL)
						{
							$kontrol=false;
						}	
					}
				}
			}
		}
		
		else
		{
			$kontrol=true;
		}
	
		mysqli_close($conn);
		
		return $kontrol; 
	}
	
	function rezervasyonTarihKaydi($donemID, $acilanApartID, $girisTarihi, $cikisTarihi, $musteriID)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		
		$giris=explode(".", $girisTarihi);
		$cikis=explode(".", $cikisTarihi);
		
		$giris[0]=(int)$giris[0]; //Giriş Günü
		$giris[1]=(int)$giris[1]; //Giriş Ayı
		
		$cikis[0]=(int)$cikis[0]; //Çıkış Günü
		$cikis[1]=(int)$cikis[1]; //Çıkış Ayı
		
		$kontrol;
		if($giris[1]==6) //Giriş Haziran
		{
			if($cikis[1]==6) //Giriş Haziran-Çıkış Haziran
			{
				for($gun=$giris[0];$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE haziran SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else if($cikis[1]==7) //Giriş Haziran-Çıkış Temmuz
			{
				for($gun=$giris[0];$gun<31;$gun++)
				{
					$sql="UPDATE haziran SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE temmuz SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else if($cikis[1]==8) //Giriş Haziran-Çıkış Ağustos
			{
				for($gun=$giris[0];$gun<31;$gun++)
				{
					$sql="UPDATE haziran SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<32;$gun++)
				{
					$sql="UPDATE temmuz SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE agustos SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else if($cikis[1]==9) //Giriş Haziran-Çıkış Eylül
			{
				for($gun=$giris[0];$gun<31;$gun++)
				{
					$sql="UPDATE haziran SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<32;$gun++)
				{
					$sql="UPDATE temmuz SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<32;$gun++)
				{
					$sql="UPDATE agustos SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE eylul SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else
			{
				$kontrol=false;
			}
		}
		
		else if($giris[1]==7) //Giriş Temmuz
		{
			if($cikis[1]==7) //Giriş Temmuz-Çıkış Temmuz
			{
				for($gun=$giris[0];$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE temmuz SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else if($cikis[1]==8) //Giriş Temmuz-Çıkış Ağustos
			{
				for($gun=$giris[0];$gun<32;$gun++)
				{
					$sql="UPDATE temmuz SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE agustos SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else if($cikis[1]==9) //Giriş Temmuz-Çıkış Eylül
			{
				for($gun=$giris[0];$gun<32;$gun++)
				{
					$sql="UPDATE temmuz SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<32;$gun++)
				{
					$sql="UPDATE agustos SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE eylul SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else
			{
				$kontrol=false;
			}
		}
		
		else if($giris[1]==8) //Giriş Ağustos
		{
			if($cikis[1]==8) //Giriş Ağustos-Çıkış Ağustos
			{
				for($gun=$giris[0];$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE agustos SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else if($cikis[1]==9) //Giriş Ağustos-Çıkış Eylül
			{
				for($gun=$giris[0];$gun<32;$gun++)
				{
					$sql="UPDATE agustos SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE eylul SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else
			{
				$kontrol=false;
			}
		}
		
		else if($giris[1]==9) //Giriş Eylül
		{
			if($cikis[1]==9) //Giriş Eylül-Çıkış Eylül
			{
				for($gun=$giris[0];$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE eylul SET musteri_id='$musteriID' WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else
			{
				$kontrol=false;
			}
		}
		
		else
		{
			$kontrol=false;
		}
		mysqli_close($conn);
		
		return $kontrol;
	}
	
	function rezervasyonTarihKaydiSil($donemID, $acilanApartID, $girisTarihi, $cikisTarihi, $musteriID)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		
		$giris=explode(".", $girisTarihi);
		$cikis=explode(".", $cikisTarihi);
		
		$giris[0]=(int)$giris[0]; //Giriş Günü
		$giris[1]=(int)$giris[1]; //Giriş Ayı
		
		$cikis[0]=(int)$cikis[0]; //Çıkış Günü
		$cikis[1]=(int)$cikis[1]; //Çıkış Ayı
		
		$kontrol;
		if($giris[1]==6) //Giriş Haziran
		{
			if($cikis[1]==6) //Giriş Haziran-Çıkış Haziran
			{
				for($gun=$giris[0];$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE haziran SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else if($cikis[1]==7) //Giriş Haziran-Çıkış Temmuz
			{
				for($gun=$giris[0];$gun<31;$gun++)
				{
					$sql="UPDATE haziran SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE temmuz SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else if($cikis[1]==8) //Giriş Haziran-Çıkış Ağustos
			{
				for($gun=$giris[0];$gun<31;$gun++)
				{
					$sql="UPDATE haziran SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<32;$gun++)
				{
					$sql="UPDATE temmuz SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE agustos SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else if($cikis[1]==9) //Giriş Haziran-Çıkış Eylül
			{
				for($gun=$giris[0];$gun<31;$gun++)
				{
					$sql="UPDATE haziran SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<32;$gun++)
				{
					$sql="UPDATE temmuz SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<32;$gun++)
				{
					$sql="UPDATE agustos SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE eylul SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else
			{
				$kontrol=false;
			}
		}
		
		else if($giris[1]==7) //Giriş Temmuz
		{
			if($cikis[1]==7) //Giriş Temmuz-Çıkış Temmuz
			{
				for($gun=$giris[0];$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE temmuz SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else if($cikis[1]==8) //Giriş Temmuz-Çıkış Ağustos
			{
				for($gun=$giris[0];$gun<32;$gun++)
				{
					$sql="UPDATE temmuz SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE agustos SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else if($cikis[1]==9) //Giriş Temmuz-Çıkış Eylül
			{
				for($gun=$giris[0];$gun<32;$gun++)
				{
					$sql="UPDATE temmuz SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<32;$gun++)
				{
					$sql="UPDATE agustos SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE eylul SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else
			{
				$kontrol=false;
			}
		}
		
		else if($giris[1]==8) //Giriş Ağustos
		{
			if($cikis[1]==8) //Giriş Ağustos-Çıkış Ağustos
			{
				for($gun=$giris[0];$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE agustos SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else if($cikis[1]==9) //Giriş Ağustos-Çıkış Eylül
			{
				for($gun=$giris[0];$gun<32;$gun++)
				{
					$sql="UPDATE agustos SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				for($gun=1;$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE eylul SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else
			{
				$kontrol=false;
			}
		}
		
		else if($giris[1]==9) //Giriş Eylül
		{
			if($cikis[1]==9) //Giriş Eylül-Çıkış Eylül
			{
				for($gun=$giris[0];$gun<$cikis[0];$gun++)
				{
					$sql="UPDATE eylul SET musteri_id=NULL WHERE donem_id='$donemID' AND acilan_apart_id='$acilanApartID' AND musteri_id='$musteriID' AND gun_no=$gun";
					mysqli_query($conn, $sql);
				}
				$kontrol=true;
			}
			else
			{
				$kontrol=false;
			}
		}
		
		else
		{
			$kontrol=false;
		}
		mysqli_close($conn);
		
		return $kontrol;
	}
	
	function kacGun($girisTarihi, $cikisTarihi)
	{
		$baslangic=strtotime($girisTarihi);
		$bitis=strtotime($cikisTarihi);
		$gunSayisi=ceil( abs($bitis - $baslangic) / 86400 );
		
		return $gunSayisi;
	}
	
	function rezervasyonSatis($rezervasyonID, $gunSayisi, $toplamTutar)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql = "INSERT INTO satis (id, rezervasyon_id, gun_sayisi, toplam_tutar) VALUES (NULL, '$rezervasyonID', '$gunSayisi', '$toplamTutar')";
		
		$kontrol;
		if (mysqli_query($conn, $sql)) 
		{
			$kontrol=true;
		} 
		else 
		{
			$kontrol=false;
		} 
		mysqli_close($conn);
		
		return $kontrol;
	}
	
	function rezervasyonSatisVarMi($rezervasyonID)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql = "SELECT id FROM satis where rezervasyon_id=$rezervasyonID";
		$result=mysqli_query($conn, $sql);
		
		$kontrol;
		if( mysqli_num_rows($result) > 0) 
		{
			//$row=mysqli_fetch_assoc($result);
			$kontrol=true;
		} 
		else 
		{
			$kontrol=false;
		} 
		mysqli_close($conn);
		
		return $kontrol;
	}
	
?>