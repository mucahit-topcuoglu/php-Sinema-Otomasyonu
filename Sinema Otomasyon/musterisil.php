<?php
include "baglan.php";
	$musterisilme=@$_GET['id'];
		$sorgu="DELETE FROM musteriler WHERE musteri_id=$musterisilme";
		$sonuc=mysqli_query($baglan,$sorgu);
			if($sonuc)
		{
				echo '<div align="center"><img src="tik.png" ></div>';
				header("Refresh: 1; url=musteriler.php");
		}
			else
		{
				echo '<div align="center"><img src="hata.png" height="550" ></div>';
				header("Refresh: 1; url=musteriler.php");
		}
?>