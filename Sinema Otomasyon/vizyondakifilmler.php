<?php include ("baglan.php");?> <!-- Veritabanı bağlantısını sağlamak için 'baglan.php' dosyasını dahil eder -->
<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width,intital-scale-1.0">
	<link rel="stylesheet" href="css/style.css"> <!-- Sayfa stil dosyasını dahil eder -->
</head>
<body>
	<header>
		<h2><ul>
		<li><a href="bilgilerim.php">Profilim</a></li> <!-- Kullanıcı profil sayfasına yönlendiren link -->
		<li><a href="Biletlerim.php">Biletlerim</a></li> <!-- Kullanıcının almış olduğu biletlerin listeleneceği sayfa -->
		<li><a href="vizyondakifilmler.php">Seanslar</a></li> <!-- Seansların listeleneceği sayfa -->
		<li><a href="cikis.php">Çıkış</a></li> <!-- Kullanıcı çıkışı yapacak -->
		</ul></h2>
	</header>
	<h2>Seanslar</h2> <!-- Sayfa başlığı -->
		<div class="tableouterbg">
				<div align="center">
				<table id="personel">
				<tr>
				<th>Seans id</th> <!-- Seans ID'si -->
				<th>Film Adı</th> <!-- Film adı -->
				<th>Salon Adı</th> <!-- Salon adı -->
				<th>Seans Saati</th> <!-- Seans saati -->
				<th>Bileti Seç</th> <!-- Bilet almak için buton -->
				</tr>
				<?php
				// Veritabanından seans bilgilerini almak için sorgu yazılır
				$sorgu=mysqli_query($baglan,"select*from seanslar
	 			INNER JOIN seans_saati ON seanslar.seansSaat_id=seans_saati.seansSaat_id
	 			INNER JOIN filmler ON seanslar.film_id=filmler.film_id 
				INNER JOIN salon ON seanslar.salon_id=salon.salon_id");
				while($satir=mysqli_fetch_array($sorgu)) // Her bir satır için döngü başlatılır
				{
				?>
				<tr>
				<td><?php echo $satir["seans_id"]?></td> <!-- Seans ID'si -->
				<td><?php echo $satir["film_adi"]?></td> <!-- Film adı -->
				<td><?php echo $satir["salon_adi"]?></td> <!-- Salon adı -->
				<td><?php echo $satir["seans_saati"]?></td> <!-- Seans saati -->
				<td><a href="biletal.php?id=<?php echo $satir['seans_id'];?>"><button type="submit" class="sub1" id="giris" name="">Bilet Al</button></a></td> <!-- Bilet al butonu, kullanıcıyı biletal.php sayfasına yönlendirir -->
				<tr>
				<?php
				}
				?>
				</table>
</div><br>
</body>
</html>
