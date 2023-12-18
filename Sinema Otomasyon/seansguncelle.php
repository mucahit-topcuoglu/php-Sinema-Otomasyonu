<?php include("baglan.php");
$id=@$_GET['id'];
$tumsorgu="select*from seanslar
INNER JOIN seans_saati ON seanslar.seansSaat_id=seans_saati.seansSaat_id
INNER JOIN filmler ON seanslar.film_id=filmler.film_id 
INNER JOIN salon ON seanslar.salon_id=salon.salon_id where seans_id='$id'";
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
	<h2>Seans Güncelleme</h1>
		<div class="tableouterft" style="height: 300px"><br><br><br>
		<form action="" method="post">
				<select name="filmid" class="sorgu">
					<?php
						echo '<option value="'.$satir[film_id].'">'.$satir[film_adi].'</option>';	
					?>
				</select>
				<select name="salonid" class="sorgu">
					<option>Salonlar</option>
					<?php
						$sorgu="select*from salon";
						$sonuc=mysqli_query($baglan,$sorgu);
						while($salonsatiri=mysqli_fetch_array($sonuc))
						{
						echo '<option value="'.$salonsatiri[salon_id].'">'.$salonsatiri[salon_adi].'</option>';
						}	
					?>	
				</select>
				<select name="seans" class="sorgu">
					<option>Seans Saati</option>
					<?php
						$sorgu="select*from seans_saati";
						$sonuc=mysqli_query($baglan,$sorgu);
						while($seans_saati_satiri=mysqli_fetch_array($sonuc))
						{
						echo '<option value="'.$seans_saati_satiri[seansSaat_id].'">'.$seans_saati_satiri[seans_saati].'</option>';
						}	
					?>
				</select>		
			<button class="sub" type="submit" id="giris" name="seansguncelle">Seansı Güncelle</button>
			</form>
			<a href="seansislemleri.php"><button type="submit" class="sub" id="uye" name="uye">Geri Çık</button></a>
		</div>	
</div><br>
</body>
</html>

<?php
	if(isset($_POST["seansguncelle"]))
	{
	$guncelle="update seanslar set film_id='".$_POST['filmid']. "',salon_id='".$_POST['salonid']."',seansSaat_id='".$_POST['seans']."'where seans_id='$id'";
	$sonuc=mysqli_query($baglan,$guncelle);
	$etkilenensatir=mysqli_affected_rows($baglan);
	if($etkilenensatir>0)
		{
				echo 'Güncellendi.';
		}
			else
		{
				echo 'Güncelleme başarısız.';
		}
	}
?>