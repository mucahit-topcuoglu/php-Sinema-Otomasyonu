<?php include ("baglan.php");
$id=@$_GET['id'];
$tumsorgu="select*from biletsatisi 
INNER JOIN filmler ON biletsatisi.film_id=filmler.film_id 
INNER JOIN salon ON biletsatisi.salon_id=salon.salon_id
INNER JOIN koltuk ON biletsatisi.koltuk_id=koltuk.koltuk_id
				INNER JOIN seans_Saati ON biletsatisi.seansSaati_id=seans_saati.seansSaat_id
				INNER JOIN musteriler ON biletsatisi.musteri_id=musteriler.musteri_id where bilet_id='$id'";
$bul=mysqli_query($baglan,$tumsorgu);
$satir=mysqli_fetch_array($bul);?>
<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width,intital-scale-1.0">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<h2><ul>
		<li><a href="filmler.php">Film İşlemleri</a></li>
		<li><a href="seansislemleri.php">Seans İşlemleri</a></li>
		<li><a href="filmturu.php">Film Türü</a></li>
		<li><a href="biletislemleri.php">Bilet İşlemleri</a></li>
		<li><a href="musteriler.php">Müşteriler</a></li>
		<li><a href="cikis.php">Çıkış</a></li>
		</ul></h2>
	</header>
	<h2>Bilet Güncelleme</h1>
		<div class="tableouterbg" style="height: 250px">
		<form action="" method="post"><br><br><br>
				<select name="musteriId" class="sorgu">
					<?php
						echo '<option value="'.$satir[musteri_id].'">'.$satir[musteri_adi_soyadi].'</option>';
					?>	
				</select>
				<select name="filmid" class="sorgu">
					<?php
						echo '<option value="'.$satir[film_id].'">'.$satir[film_adi].'</option>';
						
					?>	
				</select>
				<select name="salonid" class="sorgu">
					<?php
						echo '<option value="'.$satir[salon_id].'">'.$satir[salon_adi].'</option>';
					?>	
				</select>		
				<select name="seans_saati" class="sorgu">
					<?php
						echo '<option value="'.$satir[seansSaat_id].'">'.$satir[seans_saati].'</option>';
					?>	
				</select>
				<select name="bilettipi" class="sorgu">
					<option>Tam</option>
					<option>Öğrenci</option>
				</select>
				<select name="koltukid" class="sorgu">
					<option>Koltuklar</option>
					<?php
						$sorgu="select*from koltuk";
						$sonuc=mysqli_query($baglan,$sorgu);
						while($satir=mysqli_fetch_array($sonuc))
						{
						echo '<option value="'.$satir[koltuk_id].'">'.$satir[koltuklar].'</option>';
						}	
					?>	
			</select><br><br>
			<button class="sub" type="submit" id="giris" name="biletguncelle">Bileti Güncelle</button>	
			</form>
</div><br>
</body>
</html>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php
if(isset($_POST["biletguncelle"]))
{
	if($_POST["bilettipi"]=="Öğrenci")
	{
	$ucret="10TL";
	}
	elseif ($_POST["bilettipi"]=="Tam") 
	{
	$ucret="15TL";
	}
	$guncelle="update biletsatisi set musteri_id='".$_POST['musteriId']."',bilet_tipi='".$_POST["bilettipi"]."',film_id='".$_POST['filmid']. "',salon_id='".$_POST['salonid']."',koltuk_id='".$_POST['koltukid']."',seansSaati_id='".$_POST['seans_saati']."',tutar='"."$ucret"."'where bilet_id='$id'";
	$sonuc=mysqli_query($baglan,$guncelle);
	$etkilenensatir=mysqli_affected_rows($baglan);
	if($etkilenensatir>0)
		{
				echo 'Güncellendi.';
				header("Refresh: 2; url=biletislemleri.php");
		}
			else
		{
				echo 'Güncellemede hata oluştu. Tekrar Deneyin.';
				header("Refresh: 2; url=biletislemleri.php");
		}
}
?>