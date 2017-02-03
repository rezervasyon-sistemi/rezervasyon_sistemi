<?php
	
	include "vt_baglantisi.php";
	header('Content-Type: text/html; charset=utf-8');
	
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
		else
		{
			echo "0 results";
		}

		mysqli_close($conn);
		
		return $apartID;
	}
	
	function kayitliApartListesi()
	{
		$conn=vtBaglantisi();
		$sql="SELECT apart_no, oda_tipi FROM apart";
		$result=mysqli_query($conn, $sql);
					
        $apartListesi=array(array(2));
		
		if(mysqli_num_rows($result) > 0) 
		{
			$i=0;
			while($row = mysqli_fetch_assoc($result)) 
			{
				$apartListesi[$i][0]=$row["apart_no"];
				$apartListesi[$i][1]=$row["oda_tipi"];
				$i++;
			}
		} 
		else 
		{
			 
		}
		mysqli_close($conn);
		
		return $apartListesi;
	}
	 
?>