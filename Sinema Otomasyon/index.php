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
</head>
<body>
	<header class="deneme">
		<h2>Sinema Otomasyonu</h2>
	</header>
	<h6></h6>
	<div class="tableouter"><br><br><br>
		<form action="islemler.php" method="post">
			<input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı">
			<input type="password" name="sifre" placeholder="Şifre">
			<button type="submit" class="sub" id="giris" name="giris">Giriş Yap</button>
		</form>
		<a href="musterigiris.php"><button type="submit" class="sub" id="giris" style="background-color: #292830; color: white;">Müşteri Girişi için Tıklayın</button></a>
	</div><br>
</body>
</html>