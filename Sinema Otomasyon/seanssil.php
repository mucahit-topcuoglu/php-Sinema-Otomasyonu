<?php
include "baglan.php";
	$seanssilme=@$_GET['id'];
		$sorgu="DELETE FROM seanslar WHERE seans_id=$seanssilme";
		$sonuc=mysqli_query($baglan,$sorgu);
			if($sonuc)
		{
				echo '<div align="center"><img src="tik.png"></div>';
				header("Refresh: 1; url=seansislemleri.php");
		}
			else
		{
				echo '<div align="center"><img src="hata.png" height="550" ></div>';
				header("Refresh: 1; url=seansislemleri.php");
		}
?>