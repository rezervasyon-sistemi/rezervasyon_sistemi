<?php
	 
	header('Content-Type: text/html; charset=utf-8');
	
	function musteriEkle($musteriTC, $musteriAdi, $musteriSoyadi, $musteriTel, $musteriAdresi)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql = "INSERT INTO musteri (id, tc, ad, soyad, telefon, adres) VALUES (NULL, '$musteriTC', '$musteriAdi' ,'$musteriSoyadi', '$musteriTel', '$musteriAdresi') ";
		
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
	
	function musteriSil($musteriID)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql = "DELETE FROM musteri WHERE id=$musteriID";
		
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
	
	function musteriIDGetir($musteriTel)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql="SELECT id FROM musteri WHERE telefon='$musteriTel'";
		$result=mysqli_query($conn, $sql);
		
		$musteriID=0;
		if (mysqli_num_rows($result) > 0) 
		{
			$row=mysqli_fetch_assoc($result);
			$musteriID=$row["id"];
		} 
		mysqli_close($conn);
		
		return $musteriID;
	}
	 
?>