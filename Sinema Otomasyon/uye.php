<?php
include("baglan.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width,intital-scale-1.0">
	<link rel="stylesheet" href="css/indexuye.css">
</head>
<body>
	<header>
		<h2>Sinema Otomasyonu</h2>
	</header>
	<h2>Üye Ol</h2>
	<div class="tableouter"><br><br>	
		<form action="" method="post">
			<input type="text" name="musteri_adi_soyadi" placeholder="Müşteri Adı Soyadı" required="" >
			<input type="text" name="kadi" placeholder="Kullanıcı Adı" required="">
			<input type="password" name="sifre" placeholder="Şifre" required="">
			<input type="email" name="eposta" placeholder="Eposta" required="">
			<input type="number" name="telefon" placeholder="Telefon Numarası" required="">
			<input type="number" name="yas" placeholder="Yaş" required="">
			<button type="submit" class="sub" id="giris" name="uye">Üye ol</button>
		</form>
		<a href="musterigiris.php"><button type="submit" class="sub" id="uye">Geri Çık</button></a>
	</div><br>
</body>
</html>
<!------------------------------------------------------------------------------------------------->
<?php
	if(isset($_POST["uye"]))
{
	$uye="insert into musteriler (musteri_adi_soyadi,kadi,sifre,eposta,telefon,yas) VALUES ('" . $_POST["musteri_adi_soyadi"]. "','". $_POST["kadi"]."','". $_POST["sifre"]."','". $_POST["eposta"]."','". $_POST["telefon"]."','". $_POST["yas"]."')";
	$sonuc=mysqli_query($baglan,$uye);
	if($sonuc)
	{
		echo "Başarılı";
	}
	else
	{
		echo "Başarısız";
	}
}
?>
<!------------------------------------------------------------------------------------------------->
