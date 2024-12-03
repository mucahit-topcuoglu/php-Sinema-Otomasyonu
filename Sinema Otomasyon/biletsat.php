<?php include ("baglan.php"); // Veritabanı bağlantısı için baglan.php dosyasını dahil ediyoruz
$id=@$_GET['id']; // Seans ID'sini URL'den alıyoruz
$tumsorgu="select*from seanslar
INNER JOIN seans_saati ON seanslar.seansSaat_id=seans_saati.seansSaat_id
INNER JOIN filmler ON seanslar.film_id=filmler.film_id 
INNER JOIN salon ON seanslar.salon_id=salon.salon_id where seans_id='$id'"; // Seans verisini almak için gerekli sorgu
$bul=mysqli_query($baglan,$tumsorgu); // Sorguyu çalıştırıyoruz
$satir=mysqli_fetch_array($bul); // Sorgudan dönen verileri alıyoruz
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width,intital-scale-1.0">
	<link rel="stylesheet" href="css/style.css"> <!-- Sayfa için stil dosyasını dahil ediyoruz -->
</head>
<body>
	<header>
		<h2>
			<ul>
				<li><a href="filmler.php">Film İşlemleri</a></li>
				<li><a href="seansislemleri.php">Seans İşlemleri</a></li>
				<li><a href="filmturu.php">Film Türü</a></li>
				<li><a href="biletislemleri.php">Bilet İşlemleri</a></li>
				<li><a href="musteriler.php">Müşteriler</a></li>
				<li><a href="cikis.php">Çıkış</a></li>
			</ul>
		</h2>
	</header>
	<h2>Bilet Satışı</h2> <!-- Sayfa başlığı -->
	<div class="tableouterb" style="height: 250px"> <!-- Formu saran dış div -->
		<form action="islemler.php" method="post"> <!-- Formu başlatıyoruz, işlem için islemler.php'ye veri gönderilecek -->
			<br><br><br><br>
			<select name="filmid" class="sorgu"> <!-- Film seçim dropdown'ı -->
				<?php
					echo '<option value="'.$satir[film_id].'">'.$satir[film_adi].'</option>'; // Veritabanından seçili filmin adı
				?>	
			</select>
			<select name="salonid" class="sorgu"> <!-- Salon seçim dropdown'ı -->
				<?php
					echo '<option value="'.$satir[salon_id].'">'.$satir[salon_adi].'</option>'; // Seçili salon adı
				?>	
			</select>
			<select name="seans_saati" class="sorgu"> <!-- Seans saati dropdown'ı -->
				<?php
					echo '<option value="'.$satir[seansSaat_id].'">'.$satir[seans_saati].'</option>'; // Seçili seans saati
				?>	
			</select>
			<select name="musteriId" class="sorgu"> <!-- Müşteri seçimi dropdown'ı -->
				<option>Müşteriler</option> <!-- Varsayılan seçenek -->
				<?php
					$sorgu="select*from musteriler"; // Müşterileri sorguluyoruz
					$sql=mysqli_query($baglan,$sorgu); // Sorguyu çalıştırıyoruz
					while($satir=mysqli_fetch_array($sql)) { // Her müşteri için döngü
						echo '<option value="'.$satir[musteri_id].'">'.$satir[musteri_adi_soyadi].'</option>'; // Müşteri ismi ekleniyor
					}	
				?>	
			</select>
			<select name="bilettipi" class="sorgu"> <!-- Bilet tipi seçimi dropdown'ı -->
				<option>Tam</option> <!-- Tam bilet seçeneği -->
				<option>Öğrenci</option> <!-- Öğrenci bilet seçeneği -->
			</select>
			<select name="koltukid" class="sorgu"> <!-- Koltuk seçimi dropdown'ı -->
				<option>Koltuklar</option> <!-- Varsayılan seçenek -->
				<?php
					$sorgu="select*from koltuk"; // Koltukları sorguluyoruz
					$sonuc=mysqli_query($baglan,$sorgu); // Koltukları veritabanından alıyoruz
					while($satir=mysqli_fetch_array($sonuc)) { // Her koltuk için döngü
						echo '<option value="'.$satir[koltuk_id].'">'.$satir[koltuklar].'</option>'; // Koltuk adı ekleniyor
					}	
				?>	
			</select>
			<button type="submit" class="sub" id="giris" name="biletsat">Bilet Sat</button> <!-- Bilet satma butonu -->
		</form>
	</div>
</body>
</html>
