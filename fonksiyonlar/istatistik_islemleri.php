<?php

	header('Content-Type: text/html; charset=utf-8');
	
	function donemeIstatistikEkle($donemID)
	{	
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql = "INSERT INTO istatistik (id, donem_id, toplam_gelir, ortalama_fiyat, doluluk_orani, dolu_gun_sayisi) VALUES (NULL, '$donemID', '0', '0', '0', '0') ";
		
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
	
	function istatistikGuncelle($rezervasyonID, $donemID)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		
		$gunSayisi=0.0;$toplamTutar=0.0;
		$sql = "SELECT gun_sayisi, toplam_tutar FROM satis WHERE rezervasyon_id='$rezervasyonID'";
		$result=mysqli_query($conn, $sql);
		if( mysqli_num_rows($result) > 0 )
		{
			$row=mysqli_fetch_assoc($result);
			$gunSayisi=$row["gun_sayisi"];
			$toplamTutar=$row["toplam_tutar"];
		}	
		
		$donemIstatistigi=array("toplam_gelir"=>0.0, "ortalama_fiyat"=>0.0, "doluluk_orani"=>0.0, "dolu_gun_sayisi"=>0);
		$donemIstatistigi=donemIstatistigiGetir($donemID);
		$apartSayisi=acilanApartSayisi($donemID);
		
		$donemIstatistigi['toplam_gelir']+=$toplamTutar;
		$donemIstatistigi['dolu_gun_sayisi']+=$gunSayisi;
		$donemIstatistigi['ortalama_fiyat']=($donemIstatistigi['toplam_gelir']/$donemIstatistigi['dolu_gun_sayisi']);
		$donemIstatistigi['doluluk_orani']=($donemIstatistigi['dolu_gun_sayisi']/(double)($apartSayisi*122))*100;
		
		$toplamGelir=$donemIstatistigi['toplam_gelir'];
		$ortalamaFiyat=round($donemIstatistigi['ortalama_fiyat'],2);
		$dolulukOrani=round($donemIstatistigi['doluluk_orani'],2); 
		$doluGunSayisi=$donemIstatistigi['dolu_gun_sayisi'];
		
		$sql = "UPDATE istatistik SET toplam_gelir=$toplamGelir, ortalama_fiyat=$ortalamaFiyat, doluluk_orani=$dolulukOrani, dolu_gun_sayisi=$doluGunSayisi WHERE donem_id=$donemID";
		$kontrol;
		if( $result=mysqli_query($conn, $sql) )
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
	
	function donemIstatistigiGetir($donemID)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql = "SELECT toplam_gelir, ortalama_fiyat, doluluk_orani, dolu_gun_sayisi FROM istatistik WHERE donem_id='$donemID'";
		$result=mysqli_query($conn, $sql);
		
		$donemIstatistigi=array("toplam_gelir"=>0.0, "ortalama_fiyat"=>0.0, "doluluk_orani"=>0.0, "dolu_gun_sayisi"=>0);
		if( mysqli_num_rows($result) > 0) 
		{
			$row=mysqli_fetch_assoc($result);
			$donemIstatistigi['toplam_gelir']=$row["toplam_gelir"];
			$donemIstatistigi['ortalama_fiyat']=$row["ortalama_fiyat"];
			$donemIstatistigi['doluluk_orani']=$row["doluluk_orani"];
			$donemIstatistigi['dolu_gun_sayisi']=$row["dolu_gun_sayisi"];
		} 
		mysqli_close($conn);
		
		return $donemIstatistigi;
	}
	
	function apartDoluGunSayisi($acilanApartID, $donemID)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		
		$apartIstatistikleri=array("haziran"=>0, "temmuz"=>0, "agustos"=>0, "eylul"=>0);
		
		$sql = "SELECT count(musteri_id) AS dolu_gun FROM haziran WHERE acilan_apart_id='$acilanApartID' AND donem_id='$donemID' AND musteri_id IS NOT NULL";
		$result=mysqli_query($conn, $sql);
		
		if( mysqli_num_rows($result) > 0)
		{
			$row=mysqli_fetch_assoc($result);
			$apartIstatistikleri['haziran']=$row["dolu_gun"];
		}
		
		$sql = "SELECT count(musteri_id) AS dolu_gun FROM temmuz WHERE acilan_apart_id='$acilanApartID' AND donem_id='$donemID' AND musteri_id IS NOT NULL";
		$result=mysqli_query($conn, $sql);
		
		if( mysqli_num_rows($result) > 0)
		{
			$row=mysqli_fetch_assoc($result);
			$apartIstatistikleri['temmuz']=$row["dolu_gun"];
		}
		
		$sql = "SELECT count(musteri_id) AS dolu_gun FROM agustos WHERE acilan_apart_id='$acilanApartID' AND donem_id='$donemID' AND musteri_id IS NOT NULL";
		$result=mysqli_query($conn, $sql);
		
		if( mysqli_num_rows($result) > 0)
		{
			$row=mysqli_fetch_assoc($result);
			$apartIstatistikleri['agustos']=$row["dolu_gun"];
		}
		
		$sql = "SELECT count(musteri_id) AS dolu_gun FROM eylul WHERE acilan_apart_id='$acilanApartID' AND donem_id='$donemID' AND musteri_id IS NOT NULL";
		$result=mysqli_query($conn, $sql);
		
		if( mysqli_num_rows($result) > 0)
		{
			$row=mysqli_fetch_assoc($result);
			$apartIstatistikleri['eylul']=$row["dolu_gun"];
		}
		
		mysqli_close($conn);
		
		return $apartIstatistikleri;
	}
	 

?>