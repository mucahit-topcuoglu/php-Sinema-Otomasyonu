<?php 
// Veritabanı bağlantısını içeren dosya dahil edilir.
include ("baglan.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stil dosyasının sayfaya bağlanması -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<!-- Başlık kısmı ve navigasyon menüsü -->
		<h2>
			<ul>
				<!-- Diğer sayfalara yönlendirme bağlantıları -->
				<li><a href="filmler.php">Film İşlemleri</a></li>
				<li><a href="seansislemleri.php">Seans İşlemleri</a></li>
				<li><a href="filmturu.php">Film Türü</a></li>
				<li><a href="biletislemleri.php">Bilet İşlemleri</a></li>
				<li><a href="musteriler.php">Müşteriler</a></li>
				<li><a href="cikis.php">Çıkış</a></li>
			</ul>
		</h2>
	</header>

	<h2>Bilet İşlemleri</h2>
	<div class="tableouterb" style="height: 400px">
		<!-- Kullanıcıdan giriş alınan form -->
		<form action="" method="post">
			<!-- Kullanıcının seans araması için input -->
			<input type="text" name="filmseans" placeholder="Seans Ara">
			<!-- Seans arama işlemini başlatan buton -->
			<button class="sub" type="submit" name="seansgoruntule">Seansları Listele</button>

			<!-- Kullanıcının müşteri adıyla arama yapabileceği input -->
			<input type="text" name="musteriadi" placeholder="Müşteri Ara">
			<!-- Bilet arama işlemini başlatan buton -->
			<button class="sub" type="submit" name="biletgoruntule">Biletleri Listele</button>
		</form>

		<?php 
		// Eğer kullanıcı "Biletleri Listele" butonuna tıklamışsa:
		if (isset($_POST["biletgoruntule"])): 
		?>
			<div align="center">
				<!-- Arama sonuçlarının gösterileceği tablo -->
				<table id="personel">
					<tr>
						<!-- Tablo başlıkları -->
						<th>Bilet id</th>
						<th>Müşteri Adı Soyadı</th>
						<th>Bilet Tipi</th>
						<th>Film Adı</th>
						<th>Salon Adı</th>
						<th>Koltuk</th>
						<th>Seans Saati</th>
						<th>Tutar</th>
						<th>Bilet Silme</th>
						<th>Bileti Güncelle</th>
					</tr>
					<?php
					// Kullanıcının arama inputundan girilen müşteri adını al
					$musteriadi = $_POST["musteriadi"];

					// Veritabanında müşteri adına göre arama yap
					$sorgu = mysqli_query($baglan, "
						SELECT bilet_id, musteri_adi_soyadi, bilet_tipi, film_adi, salon_adi, koltuklar, seans_saati, tutar 
						FROM biletsatisi 
						INNER JOIN filmler ON biletsatisi.film_id = filmler.film_id 
						INNER JOIN salon ON biletsatisi.salon_id = salon.salon_id
						INNER JOIN koltuk ON biletsatisi.koltuk_id = koltuk.koltuk_id
						INNER JOIN seans_Saati ON biletsatisi.seansSaati_id = seans_saati.seansSaat_id
						INNER JOIN musteriler ON biletsatisi.musteri_id = musteriler.musteri_id 
						WHERE musteri_adi_soyadi LIKE '%$musteriadi%'
					");

					// Veritabanındaki her sonuç satırını tabloya ekle
					while ($satir = mysqli_fetch_array($sorgu)): 
					?>
					<tr>
						<!-- Her sütuna ilgili veritabanı kolonundan gelen değer yazdırılır -->
						<td><?php echo $satir["bilet_id"]; ?></td>
						<td><?php echo $satir["musteri_adi_soyadi"]; ?></td>
						<td><?php echo $satir["bilet_tipi"]; ?></td>
						<td><?php echo $satir["film_adi"]; ?></td>
						<td><?php echo $satir["salon_adi"]; ?></td>
						<td><?php echo $satir["koltuklar"]; ?></td>
						<td><?php echo $satir["seans_saati"]; ?></td>
						<td><?php echo $satir["tutar"]; ?></td>
						<!-- Bilet güncelleme ve silme butonları -->
						<td><a href="biletsil.php?id=<?php echo $satir['bilet_id']; ?>">
							<button type="button" class="sub1">Bileti Sil</button></a></td>
						<td><a href="biletguncelle.php?id=<?php echo $satir['bilet_id']; ?>">
							<button type="button" class="sub1">Bileti Güncelle</button></a></td>
					</tr>
					<?php endwhile; ?>
				</table>
			</div>
		<?php endif; ?>

		<?php 
		// Eğer kullanıcı "Seansları Listele" butonuna tıklamışsa:
		if (isset($_POST["seansgoruntule"])): 
		?>
			<div align="center">
				<!-- Seans bilgileri için tablo -->
				<table id="personel">
					<tr>
						<th>Seans id</th>
						<th>Film Adı</th>
						<th>Salon Adı</th>
						<th>Seans Saati</th>
						<th>Bilet Sat</th>
					</tr>
					<?php
					// Kullanıcının film arama inputundan aldığı değeri al
					$filmadi = $_POST["filmseans"];

					// Veritabanında film adına göre seansları ara
					$sorgu = mysqli_query($baglan, "
						SELECT seans_id, film_adi, salon_adi, seans_saati 
						FROM seanslar 
						INNER JOIN seans_saati ON seanslar.seansSaat_id = seans_saati.seansSaat_id
						INNER JOIN filmler ON seanslar.film_id = filmler.film_id 
						INNER JOIN salon ON seanslar.salon_id = salon.salon_id 
						WHERE film_adi LIKE '%$filmadi%'
					");

					// Gelen her sonucu tabloya ekle
					while ($satir = mysqli_fetch_array($sorgu)): 
					?>
					<tr>
						<td><?php echo $satir["seans_id"]; ?></td>
						<td><?php echo $satir["film_adi"]; ?></td>
						<td><?php echo $satir["salon_adi"]; ?></td>
						<td><?php echo $satir["seans_saati"]; ?></td>
						<!-- Bilet satma bağlantısı -->
						<td><a href="biletsat.php?id=<?php echo $satir['seans_id']; ?>">
							<button type="button" class="sub1">Bilet Sat</button></a></td>
					</tr>
					<?php endwhile; ?>
				</table>
			</div>
		<?php endif; ?>
	</div>
</body>
</html>
