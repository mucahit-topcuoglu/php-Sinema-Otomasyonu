<?php
include ("baglan.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width,intital-scale-1.0">
	<link rel="stylesheet" href="css/index.css">
<body>
	<header class="deneme">
		<h2>Sinema Otomasyonu</h2>
	</header>
	<br>
	<div class="tableouter"><br>
		<h2>Müşteri Giriş</h2>
		<form action="islemler.php" method="post">
			<input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı">
			<input type="password" name="sifre" placeholder="Şifre">
			<button type="submit" class="sub" id="giris" name="musterigiris">Giriş Yap</button>
		</form>
		<a href="uye.php"><button type="submit" class="sub" id="uye" name="uye">Üye Ol</button></a>
		<a href="index.php"><button type="submit" class="sub" id="giris" style="background-color: #292830; color: white;">Personel Girişi için Tıklayın</button></a>
	</div><br>
</body>
</html>