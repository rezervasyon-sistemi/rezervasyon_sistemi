<?php
	
	header('Content-Type: text/html; charset=utf-8');
	
	function vtBaglantisi()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "rezervasyon_sistemi";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		if (!$conn) 
		{
			die("Veritabanı Bağlantısı Başarısız! " . mysqli_connect_error());
		}
		return $conn;
	}
 
?>