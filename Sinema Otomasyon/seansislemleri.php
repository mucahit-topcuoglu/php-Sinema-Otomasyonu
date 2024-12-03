<?php include("baglan.php")?>  <!-- Veritabanı bağlantısı için baglan.php dosyasını dahil eder. -->
<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width,intital-scale-1.0">
	<link rel="stylesheet" href="css/style.css">  <!-- CSS dosyasını dahil eder. -->
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

	<h2>Seans İşlemleri</h2>
	<div class="tableouters" style="height: 400px"><br><br><br>
		<!-- Seans Ekleme Formu -->
		<form action="islemler.php" method="post">
			<select name="filmid" class="sorgu">
				<option>Filmler</option>
				<?php
					// Filmleri veritabanından listeleyip seçilen film ile birlikte dropdown menüsünü oluşturur
					$sorgu = "SELECT * FROM filmler";
					$sonuc = mysqli_query($baglan, $sorgu);
					while($satir = mysqli_fetch_array($sonuc)) {
						echo '<option value="'.$satir['film_id'].'">'.$satir['film_adi'].'</option>';
					}	
				?>
			</select>

			<select name="salonid" class="sorgu">
				<option>Salonlar</option>
				<?php
					// Salonları veritabanından listeleyip dropdown menüsüne ekler
					$sorgu = "SELECT * FROM salon";
					$sonuc = mysqli_query($baglan, $sorgu);
					while($satir = mysqli_fetch_array($sonuc)) {
						echo '<option value="'.$satir['salon_id'].'">'.$satir['salon_adi'].'</option>';
					}	
				?>	
			</select>

			<select name="seans" class="sorgu">
				<option>Seans Saati</option>
				<?php
					// Seans saatlerini veritabanından listeleyip dropdown menüsüne ekler
					$sorgu = "SELECT * FROM seans_saati";
					$sonuc = mysqli_query($baglan, $sorgu);
					while($satir = mysqli_fetch_array($sonuc)) {
						echo '<option value="'.$satir['seansSaat_id'].'">'.$satir['seans_saati'].'</option>';
					}	
				?>
			</select>		

			<button class="sub" type="submit" id="giris" name="seansekle">Seans Oluştur</button>
		</form>

		<!-- Seans Arama Formu -->
		<form action="" method="post">
			<input type="text" name="seanslar" placeholder="Seans Ara">
			<button class="sub" type="submit" id="giris" name="seansgoruntule">Seansları Görüntüle</button>
		</form>

		<!-- Seansları Görüntüleme -->
		<?php
			if(isset($_POST["seansgoruntule"])) {	
		?>
		<div align="center">
			<table id="personel">
				<tr>
					<th>Seans id</th>
					<th>Film Adı</th>
					<th>Salon Adı</th>
					<th>Seans Saati</th>
					<th>Seans Güncelleme</th>
					<th>Seans Silme</th>
				</tr>
				<?php
				// Arama yapılan film adına göre seansları sorgular
				$filmadi = $_POST["seanslar"];
				$sorgu = mysqli_query($baglan, "SELECT * FROM seanslar
					INNER JOIN seans_saati ON seanslar.seansSaat_id = seans_saati.seansSaat_id
					INNER JOIN filmler ON seanslar.film_id = filmler.film_id 
					INNER JOIN salon ON seanslar.salon_id = salon.salon_id 
					WHERE film_adi LIKE '%$filmadi%'");
				
				// Sorgu sonucu gelen seansları tabloda listeler
				while($satir = mysqli_fetch_array($sorgu)) {
				?>
				<tr>
					<td><?php echo $satir["seans_id"]?></td>	
					<td><?php echo $satir["film_adi"]?></td>
					<td><?php echo $satir["salon_adi"]?></td>
					<td><?php echo $satir["seans_saati"]?></td>
					<td><a href="seansguncelle.php?id=<?php echo $satir['seans_id'];?>"><button type="submit" class="sub1" id="giris" name="uye">Seansı Düzenle</button></a></td>
					<td><a href="seanssil.php?id=<?php echo $satir['seans_id'];?>"><button type="submit" class="sub1" id="uye" name="biletsec">Seansı Sil</button></a></td>
				<tr>
				<?php
				}
			}
		?>
			</table>
		</div>	
	</div><br>
</body>
</html>
