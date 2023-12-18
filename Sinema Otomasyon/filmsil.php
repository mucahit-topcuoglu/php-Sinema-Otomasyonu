<?php
include "baglan.php";
	$filmsilme=@$_GET['id'];
		$sorgu="DELETE FROM filmler WHERE film_id=$filmsilme";
		$sonuc=mysqli_query($baglan,$sorgu);
			if($sonuc)
		{
				echo '<div align="center"><img src="tik.png"></div>';
				header("Refresh: 1; url=filmler.php");
		}
			else
		{
				echo '<div align="center"><img src="hata.png" height="550" ></div>';
				header("Refresh: 1; url=filmler.php");
		}
?>