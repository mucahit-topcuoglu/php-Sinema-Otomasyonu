<?php
include "baglan.php";
	$biletsilme=@$_GET['id'];
		$sorgu="DELETE FROM biletsatisi WHERE bilet_id=$biletsilme";
		$sonuc=mysqli_query($baglan,$sorgu);
			if($sonuc)
		{
				echo '<div align="center"><img src="tik.png"></div>';
				header("Refresh: 1; url=biletislemleri.php");
		}
			else
		{
				echo '<div align="center"><img src="hata.png" height="550" ></div>';
				header("Refresh: 1; url=biletislemleri.php");
		}
?>