<?php 
include("baglan.php");  // Veritabanı bağlantısı için baglan.php dosyasını dahil eder.

$id = @$_GET['id'];  // URL üzerinden gelen 'id' parametresini alır. Bu, güncellenmek istenen seansın ID'sidir. '@' sembolü, hata mesajlarını gizler.

$tumsorgu = "SELECT * FROM seanslar
INNER JOIN seans_saati ON seanslar.seansSaat_id = seans_saati.seansSaat_id
INNER JOIN filmler ON seanslar.film_id = filmler.film_id
INNER JOIN salon ON seanslar.salon_id = salon.salon_id 
WHERE seans_id = '$id'";  // Seansın bilgilerini almak için INNER JOIN kullanarak ilgili tablolardan veri çekmek için sorgu yazılır.

$bul = mysqli_query($baglan, $tumsorgu);  // Sorguyu çalıştırır.
$satir = mysqli_fetch_array($bul);  // Çekilen veriyi satırlara ayırır, ve ilk satırı $satir değişkenine atar.
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width,intital-scale-1.0">
	<link rel="stylesheet" href="css/style.css">  <!-- CSS dosyasını dahil eder -->
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

	<h2>Seans Güncelleme</h2>
	<div class="tableouterft" style="height: 300px">
		<br><br><br>
		<form action="" method="post">  <!-- Form başlangıcı -->
			<select name="filmid" class="sorgu">
				<?php
					// Seansla ilgili mevcut film bilgilerini seçili şekilde göstermek için:
					echo '<option value="'.$satir['film_id'].'">'.$satir['film_adi'].'</option>';	
				?>
			</select>

			<select name="salonid" class="sorgu">
				<option>Salonlar</option>
				<?php
					// Salonları listelemek için sorgu
					$sorgu = "SELECT * FROM salon";
					$sonuc = mysqli_query($baglan, $sorgu);
					while($salonsatiri = mysqli_fetch_array($sonuc)) {
						echo '<option value="'.$salonsatiri['salon_id'].'">'.$salonsatiri['salon_adi'].'</option>';
					}
				?>	
			</select>

			<select name="seans" class="sorgu">
				<option>Seans Saati</option>
				<?php
					// Seans saatlerini listelemek için sorgu
					$sorgu = "SELECT * FROM seans_saati";
					$sonuc = mysqli_query($baglan, $sorgu);
					while($seans_saati_satiri = mysqli_fetch_array($sonuc)) {
						echo '<option value="'.$seans_saati_satiri['seansSaat_id'].'">'.$seans_saati_satiri['seans_saati'].'</option>';
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
// Eğer formda "Seansı Güncelle" butonuna tıklanmışsa
if(isset($_POST["seansguncelle"])) {
	// Seans verilerini güncellemek için SQL sorgusu yazılır
	$guncelle = "UPDATE seanslar SET 
		film_id = '".$_POST['filmid']."',
		salon_id = '".$_POST['salonid']."',
		seansSaat_id = '".$_POST['seans']."' 
		WHERE seans_id = '$id'";  // Seansın ID'sine göre güncelleme yapılır.

	$sonuc = mysqli_query($baglan, $guncelle);  // Sorgu çalıştırılır.
	$etkilenensatir = mysqli_affected_rows($baglan);  // Etkilenen satır sayısını alır.

	// Eğer sorgu başarılı olmuşsa
	if($etkilenensatir > 0) {
		echo 'Güncellendi.';  // Başarı mesajı gösterilir.
	} else {
		echo 'Güncelleme başarısız.';  // Eğer işlem başarısızsa hata mesajı gösterilir.
	}
}
?>
