<html>
<head></head>
<body>

<?php
include "baglan.php";
//---------------------------------------------------------------MÜŞTERİ İŞLEMLERİ ---------------------------------------------------------------------------------->
	if(isset($_POST["musteriekle"]))
{
	$musteriekle="insert into musteriler (musteri_adi_soyadi,kadi,sifre,eposta,telefon,yas) VALUES ('" . $_POST["musteri_adi_soyadi"]. "','". $_POST["kadi"]."','". $_POST["sifre"]."','". $_POST["eposta"]."','". $_POST["telefon"]."','". $_POST["yas"]."')";
	$sonuc=mysqli_query($baglan,$musteriekle);
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
	
}
?>
<!------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------FİLM İŞLEMLERİ--------------------------------------------------------------->
<?php
	if(isset($_POST["filmekle"]))
	{
	$filmekle="insert into filmler (film_adi , filmtur_id) VALUES ('" . $_POST["filmadi"]. "','". 	$_POST["filmturu"]."')";
	$sonuc=mysqli_query($baglan,$filmekle);
	if($sonuc)
		{
				echo '<div align="center"><img src="tik.png" ></div>';
				header("Refresh: 1; url=filmler.php");
		}
			else
		{
				echo '<div align="center"><img src="hata.png" height="550" ></div>';
				header("Refresh: 1; url=filmler.php");
		}
	}
?>
 
<!------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------FİLM TÜRÜ İŞLEMLERİ--------------------------------------------------------->
<?php
	if(isset($_POST["filmturuekle"]))
	{
			$filmturekle="insert into filmturleri (film_turu) VALUES ('" . $_POST["filmturu"]. "')";
			$sonuc=mysqli_query($baglan,$filmturekle);
		if($sonuc)
		{
				echo '<div align="center"><img src="tik.png" ></div>';
				header("Refresh: 1; url=filmturu.php");
		}
			else
		{
					echo '<div align="center"><img src="hata.png" height="550" ></div>';
				header("Refresh: 1; url=filmturu.php");
		}
	}
?>

<?php
	if(isset($_POST["filmturusilme"]))
	{
		$filmturusil= $_POST['filmturu'];
		$sorgu="DELETE FROM filmturleri WHERE filmtur_id=$filmturusil";
		$sonuc=mysqli_query($baglan,$sorgu);
				if($sonuc)
		{
				echo '<div align="center"><img src="tik.png" ></div>';
				header("Refresh: 1; url=filmturusil.php");
		}
			else
		{
				echo '<div align="center"><img src="hata.png" height="550" ></div>';
				header("Refresh: 1; url=filmturusil.php");
		}
	}
?>
<!------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------SEANS İŞLEMLERİ------------------------------------------------------------->
	<?php
	if(isset($_POST["seansekle"]))
	{
		$seansekle="insert into seanslar (film_id,salon_id,seansSaat_id) VALUES ('"   . $_POST["filmid"]. "','" . $_POST["salonid"]."','" . $_POST["seans"]. "')";
		$sonuc=mysqli_query($baglan,$seansekle);
		if($sonuc)
		{
				echo '<div align="center"><img src="tik.png" ></div>';
				header("Refresh: 1; url=seansislemleri.php");
		}
			else
		{
				echo '<div align="center"><img src="hata.png" height="550" ></div>';
				header("Refresh: 1; url=seansislemleri.php");
		}
	}
	?>

<!------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------BİLET İŞLEMLERİ------------------------------------------------------------->
<?php
if(isset($_POST["biletsat"])) 
{
if($_POST["bilettipi"]=="Öğrenci")
{
	$ucret="10TL";
}
elseif ($_POST["bilettipi"]=="Tam") 
{
	$ucret="15TL";
}
$film= $_POST['filmid'];
$salon= $_POST['salonid'];
$seansSaat= $_POST['seans_saati'];
$sorgu="Select*from seanslar WHERE film_id='$film' AND salon_id='$salon' AND seansSaat_id='$seansSaat'";
$sonuc=mysqli_query($baglan, $sorgu);
$kayitsayisi=mysqli_num_rows($sonuc);
if($kayitsayisi>0)
{
	$biletsat="insert into biletsatisi (musteri_id,bilet_tipi,film_id,salon_id,koltuk_id,seansSaati_id,tutar) VALUES ('" . $_POST["musteriId"]. "','" . $_POST["bilettipi"]. "','" . $_POST["filmid"]. "','" . $_POST["salonid"]. "','" .$_POST["koltukid"]. "','" . $_POST["seans_saati"]."','"."$ucret". "')";
	$biletsorgu=mysqli_query($baglan,$biletsat);
	if($biletsorgu)
	{
	echo '<div align="center"><img src="tik.png" ></div>';
	header("Refresh: 1; url=biletislemleri.php");
	}
	else
	{
	echo '<div align="center"><img src="hata.png" height="550" ></div>';
	header("Refresh: 1; url=biletislemleri.php");
	}
}
else
{
	echo '<div align="center"><img src="hata.png" height="550" ></div>';
	header("Refresh: 1; url=biletislemleri.php");
}
}
?>


<!------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------------------------>
<?php
if(isset($_POST["giris"]))
{
$sorgu=mysqli_query($baglan,"SELECT * FROM personel WHERE personel_kullanici='".$_POST["kullanici_adi"]."' AND sifre='".$_POST["sifre"]."'");
if($bilgiler=mysqli_fetch_array($sorgu)) 
{
	$_SESSION["id"]=$bilgiler["personel_id"];
    $_SESSION["isim"]=$bilgiler["personel_adi_soyadi"];
    $_SESSION["kadi"]=$bilgiler["personel_kullanici"];
    $_SESSION["sifre"]=$bilgiler["sifre"];
	header("Refresh: 0; url=filmler.php");
}
else
{
  echo "Kullanıcı adı veya şifre yanlış";
  header("Refresh: 1; url=index.php");
}
}
?>

<?php
if(isset($_POST["musterigiris"]))
{
$sorgu=mysqli_query($baglan,"SELECT * FROM musteriler WHERE kadi='".$_POST["kullanici_adi"]."' AND sifre='".$_POST["sifre"]."'");
 if ($bilgiler=mysqli_fetch_array($sorgu)) 
 {
  $_SESSION["id"]=$bilgiler["musteri_id"];
  $_SESSION["isim"]=$bilgiler["musteri_adi_soyadi"];
  $_SESSION["kadi"]=$bilgiler["kadi"];
  $_SESSION["sifre"]=$bilgiler["sifre"];
  $_SESSION["eposta"]=$bilgiler["eposta"];
  $_SESSION["telefon"]=$bilgiler["telefon"];
  $_SESSION["yas"]=$bilgiler["yas"];
  header("Refresh: 0; url=bilgilerim.php");
}
	else
	{
		echo "Kullanıcı adı veya şifre yanlış!";
		header("Refresh: 1; url=musterigiris.php");
	}
}
?>
<!------------------------------------------------------------------------------------------------------------------------------------------------->
<?php
if(isset($_POST["biletal"])) 
{
if($_SESSION["yas"]<=24)
{
	$ucret="10TL";
	$bilettipi="Öğrenci";
}
else
{
	$ucret="15TL";
	$bilettipi="Tam";
}


$film= $_POST['filmid'];
$salon= $_POST['salonid'];
$seansSaat= $_POST['seans_saati'];
$sorgu="Select*from seanslar WHERE film_id='$film' AND salon_id='$salon' AND seansSaat_id='$seansSaat'";
$sonuc=mysqli_query($baglan, $sorgu);
$kayitsayisi=mysqli_num_rows($sonuc);
if($kayitsayisi>0)
{
	$biletsat="insert into biletsatisi (musteri_id,bilet_tipi,film_id,salon_id,koltuk_id,seansSaati_id,tutar) VALUES ('" . $_SESSION["id"]. "','" ."$bilettipi". "','" . $_POST["filmid"]. "','" . $_POST["salonid"]. "','" .$_POST["koltukid"]. "','" . $_POST["seans_saati"]."','"."$ucret". "')";
	$sonuc=mysqli_query($baglan,$biletsat);
	if($sonuc)
	{
	echo '<div align="center"><img src="tik.png" ></div>';
	header("Refresh: 1; url=vizyondakifilmler.php");
	}
	else
	{
	echo '<div align="center"><img src="hata.png" height="550" ></div>';
	header("Refresh: 1; url=vizyondakifilmler.php");
	}
}
else
{
	echo '<div align="center"><img src="hata.png" height="550" ></div>';
	header("Refresh: 1; url=vizyondakifilmler.php");
}
}
?>

</body>
</html>