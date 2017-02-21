<?php
	
	header('Content-Type: text/html; charset=utf-8');
	
	function donemEkle($donemYili)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql = "INSERT INTO donem (id, yil) VALUES (NULL, '$donemYili')";
		
		$kontrol;
		if( mysqli_query($conn, $sql) )
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
	
	function donemIDGetir($donemYili)
	{
		$conn=vtBaglantisi();
		mysqli_set_charset($conn, "utf8");
		$sql="SELECT id FROM donem WHERE yil='$donemYili' ";
		$result=mysqli_query($conn, $sql);
		
		$donemID=0;
		if (mysqli_num_rows($result) > 0) 
		{
			$row=mysqli_fetch_assoc($result);
			$donemID=$row["id"];
		} 
		mysqli_close($conn);
		
		return $donemID;
	}

?>