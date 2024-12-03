<?php include("baglan.php"); // Veritabanı bağlantısını içeri aktarır.
$id=@$_GET['id']; // 'id' parametresini GET yöntemi ile alır. Bu, güncellenmek istenen filmin ID'sidir.

$tumsorgu="select*from filmler where film_id=$id"; // Seçilen film ID'sine göre 'filmler' tablosundan film bilgilerini sorgular.
$bul=mysqli_query($baglan,$tumsorgu); // SQL sorgusunu çalıştırır ve sonucu $bul değişkenine atar.
$satir=mysqli_fetch_array($bul); // Sorgu sonucunu bir dizi olarak alır.
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,intital-scale=1.0">
	<link rel="stylesheet" href="css/style.css"> <!-- Stil dosyasını bağlar. -->
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
	<h2>Film Güncelleme</h2>
		<div class="tableouterf" style="height: 400px"><br><br><br>
		<form action="" method="post">
			<input type="text" name="filmadi" placeholder="Film Adı" required="" value="<?php echo $satir['film_adi'];?>"><br> <!-- Film adı prefilled olarak gelir. -->
			
			<select name="filmturu" class="sorgu">
				<option>Film Türü</option>
				<?php
					$sorgu="select*from filmturleri"; // Film türlerini almak için sorgu çalıştırılır.
					$sonuc=mysqli_query($baglan,$sorgu); // Sorgu çalıştırılır ve sonuç alınır.
					while($satir=mysqli_fetch_array($sonuc)) // Her film türü için bir seçenek oluşturulur.
					{
					echo '<option value="'.$satir[filmtur_id].'">'.$satir[film_turu].'</option>';
					}	
				?>	
			</select><br>
			<button class="sub" type="submit" id="giris" name="filmguncelle">Filmi Güncelle</button> <!-- Form gönderme butonu -->
		</form>
		<a href="filmler.php"><button type="submit" class="sub" id="uye" name="uye">Geri Çık</button></a><br> <!-- Geri dönme butonu -->
	</div><br>	
</body>
</html>

<?php
// Form gönderildiyse, yani 'filmguncelle' butonuna tıklanmışsa:
if(isset($_POST["filmguncelle"]))
{
	// Film bilgilerini güncelleme sorgusu
	$guncelle="update filmler set film_adi='".$_POST['filmadi']."',filmtur_id='". $_POST['filmturu']."'where film_id='$id'";

	// Sorguyu çalıştırır
	$sonuc=mysqli_query($baglan,$guncelle);
	// Etkilenen satır sayısını kontrol eder
	$etkilenensatir=mysqli_affected_rows($baglan);
	if($etkilenensatir>0) // Eğer etkilenen satır varsa, güncelleme başarılı
		{
				echo 'Güncellendi';
		}
			else // Güncelleme başarısız olduysa
		{
			echo 'Güncelleme Başarısız.';
		}
}
?>
