<?php
include ("baglan.php"); // Veritabanı bağlantısı için baglan.php dosyasını dahil eder
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width,intital-scale-1.0">
	<link rel="stylesheet" href="css/index.css"> <!-- CSS dosyasını dahil eder -->
</head>
<body>
	<header class="deneme">
		<h2>Sinema Otomasyonu</h2> <!-- Başlık kısmı -->
	</header>
	<br>
	<div class="tableouter"><br>
		<h2>Müşteri Giriş</h2> <!-- Sayfa başlığı -->

		<!-- Kullanıcı adı ve şifre ile giriş formu -->
		<form action="islemler.php" method="post"> 
			<input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı"> <!-- Kullanıcı adı girişi -->
			<input type="password" name="sifre" placeholder="Şifre"> <!-- Şifre girişi -->
			<button type="submit" class="sub" id="giris" name="musterigiris">Giriş Yap</button> <!-- Giriş yap butonu -->
		</form>

		<!-- Üye olma linki -->
		<a href="uye.php"><button type="submit" class="sub" id="uye" name="uye">Üye Ol</button></a>

		<!-- Personel giriş linki -->
		<a href="index.php"><button type="submit" class="sub" id="giris" style="background-color: #292830; color: white;">Personel Girişi için Tıklayın</button></a>
	</div><br>
</body>
</html>
