<?php
	
	include "vt_baglantisi.php";
	header('Content-Type: text/html; charset=utf-8');
	
	function apartEkle($apartAdi,$odaTipi)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql = "INSERT INTO apart (id, apart_no, oda_tipi) VALUES (NULL, '$apartAdi', '$odaTipi') ";
		
		$kontrol;
		if( mysqli_query($conn, $sql) ) 
		{
			$kontrol=true;
		} 
		else 
		{
			$kontrol=false;
			//$divResult='<div class="alert alert-danger alert-dismissible fade in"><strong>Apart Sisteme Eklenememiştir! Hata: '.mysqli_error($conn).'</strong></div>';
		} 
		mysqli_close($conn);
		
		return $kontrol;
	}
	
	function apartDuzenle($apartID,$yeniApartAdi,$yeniOdaTipi)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql = "UPDATE apart SET apart_no='$yeniApartAdi', oda_tipi='$yeniOdaTipi' WHERE id=$apartID ";
		
		$kontrol;
		if (mysqli_query($conn, $sql)) 
		{
			$kontrol=true;
		} 
		else 
		{	
			$kontrol=false;
			//$divResult='<div class="alert alert-danger alert-dismissible fade in"><strong>Apart Güncellenememiştir! Hata: '.mysqli_error($conn).'</strong></div>';
		} 
		mysqli_close($conn);
		
		return $kontrol;
	}
	
	function apartKaldir($apartID)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql = "DELETE FROM apart WHERE id=$apartID ";
		
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
	
	function apartDonemiAc($apartNo, $donemYili, $kisiSayisi, $apartID, $donemID)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		
		$donemBilgisi=$apartNo." ".$donemYili;
		
		$sql = "INSERT INTO acilan_apart (id, apart_id, donem_id, donem_bilgisi, kisi_sayisi) VALUES (NULL, '$apartID', '$donemID', '$donemBilgisi', '$kisiSayisi') ";
		
		$kontrol;
		if(mysqli_query($conn, $sql)) 
		{
			$acilanApartID=acilanApartIDGetir($apartID,$donemID);	 
			for($haz=1;$haz<=30;$haz++)
			{
				$sql2 = "INSERT INTO haziran (id, donem_id, acilan_apart_id, gun_no, musteri_id) VALUES (NULL, '$donemID', '$acilanApartID', '$haz', NULL) ";
				mysqli_query($conn, $sql2);
			}
			for($tem=1;$tem<=31;$tem++)
			{
				$sql2 = "INSERT INTO temmuz (id, donem_id, acilan_apart_id, gun_no, musteri_id) VALUES (NULL, '$donemID', '$acilanApartID', '$tem', NULL) ";
				mysqli_query($conn, $sql2);
			}
			for($agu=1;$agu<=31;$agu++)
			{
				$sql2 = "INSERT INTO agustos (id, donem_id, acilan_apart_id, gun_no, musteri_id) VALUES (NULL, '$donemID', '$acilanApartID', '$agu', NULL) ";
				mysqli_query($conn, $sql2);
			}
			for($eyl=1;$eyl<=30;$eyl++)
			{
				$sql2 = "INSERT INTO eylul (id, donem_id, acilan_apart_id, gun_no, musteri_id) VALUES (NULL, '$donemID', '$acilanApartID', '$eyl', NULL) ";
				mysqli_query($conn, $sql2);
			}
			$kontrol=true;
			
		}
		else 
		{
			$kontrol=false;
			//$divResult2='<div class="alert alert-danger alert-dismissible fade in"><strong>Apart Dönemi Açılamamıştır! Hata: '.mysqli_error($conn).'</strong></div>';
		}
		mysqli_close($conn);
		
		return $kontrol;
	}
	
	function apartIDGetir($apartNo)
	{
		$conn=vtBaglantisi();
		$sql="SELECT id FROM apart WHERE apart_no='$apartNo'";
		$result=mysqli_query($conn, $sql);
		
		$apartID=0;
		if (mysqli_num_rows($result) > 0) 
		{
			$row=mysqli_fetch_assoc($result);
			$apartID=$row["id"];
		} 
		mysqli_close($conn);
		
		return $apartID;
	}
	
	function apartBilgileriGetir($apartID)
	{
		$conn=vtBaglantisi();
		$sql="SELECT id, apart_no, oda_tipi FROM apart WHERE id='$apartID'";
		$result=mysqli_query($conn, $sql);
		
		$apartBilgileri=array();
		if( mysqli_num_rows($result) > 0 ) 
		{
			$row=mysqli_fetch_assoc($result);
			$apartBilgileri[0]=$row["id"]; 
			$apartBilgileri[1]=$row["apart_no"]; 
			$apartBilgileri[2]=$row["oda_tipi"]; 
		}
		mysqli_close($conn);
		
		return $apartBilgileri;
	}
	
	function kayitliApartListesi()
	{
		$conn=vtBaglantisi();
		$sql="SELECT apart_no, oda_tipi FROM apart";
		$result=mysqli_query($conn, $sql);
					
        $apartListesi=array();
		if( mysqli_num_rows($result) > 0 ) 
		{
			$i=0;
			while($row = mysqli_fetch_assoc($result)) 
			{
				$apartListesi[$i][0]=$row["apart_no"];
				$apartListesi[$i][1]=$row["oda_tipi"];
				$i++;
			}
		} 
		mysqli_close($conn);
		
		return $apartListesi;
	}
	
	function kayitliApartNoListesi()
	{
		$conn=vtBaglantisi();
		$sql="SELECT apart_no FROM apart";
		$result=mysqli_query($conn, $sql);
					
        $apartNoListesi=array();
		if( mysqli_num_rows($result) > 0 ) 
		{
			$i=0;
			while($row = mysqli_fetch_assoc($result)) 
			{
				$apartNoListesi[$i]=$row["apart_no"];
				$i++;
			}
		} 
		mysqli_close($conn);
		
		return $apartNoListesi;
	}
	
	function acilanApartNoListesi($donemID)
	{
		$conn=vtBaglantisi();
		$sql="SELECT apart.apart_no FROM apart,acilan_apart WHERE acilan_apart.apart_id=apart.id AND acilan_apart.donem_id='$donemID'";
		$result=mysqli_query($conn, $sql);
				
        $apartNoListesi=array();
		if( mysqli_num_rows($result) > 0 ) 
		{
			$i=0;
			while($row = mysqli_fetch_assoc($result)) 
			{
				$apartNoListesi[$i]=$row["apart_no"];
				$i++;
			}
		} 
		mysqli_close($conn);
		
		return $apartNoListesi;
	}
	
	function acilanApartIDGetir($apartID,$donemID)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		
		$sql="SELECT id FROM acilan_apart WHERE apart_id='$apartID' AND donem_id='$donemID'";
		$result=mysqli_query($conn, $sql);
					
        $acilanApartID=0;
		if(mysqli_num_rows($result) > 0) 
		{ 
			$row=mysqli_fetch_assoc($result);
			$acilanApartID=$row["id"];
		} 
		mysqli_close($conn);
		
		return $acilanApartID;
	}
	
	function acilanApartSayisi($donemID)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		
		$sql="SELECT count(donem_id) AS acilan_apart_sayisi FROM acilan_apart WHERE donem_id='$donemID'";
		$result=mysqli_query($conn, $sql);
		 				
        $apartSayisi=0;
		if(mysqli_num_rows($result) > 0) 
		{ 
			$row=mysqli_fetch_assoc($result);
			$apartSayisi=$row["acilan_apart_sayisi"];
		} 
		mysqli_close($conn);
		
		return $apartSayisi;
	}
	 
?>