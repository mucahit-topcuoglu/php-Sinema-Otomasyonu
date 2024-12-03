<?php
include("baglan.php");  // Veritabanı bağlantısını sağlamak için 'baglan.php' dosyasını dahil eder.
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width,intital-scale-1.0">
	<link rel="stylesheet" href="css/indexuye.css">  <!-- Sayfa stil dosyasını dahil eder -->
</head>
<body>
	<header>
		<h2>Sinema Otomasyonu</h2>  <!-- Başlık kısmı -->
	</header>
	<h2>Üye Ol</h2>
	<div class="tableouter"><br><br>	
		<form action="" method="post">  <!-- Form, kullanıcı bilgilerini POST yöntemiyle gönderir -->
			<input type="text" name="musteri_adi_soyadi" placeholder="Müşteri Adı Soyadı" required="" >
			<input type="text" name="kadi" placeholder="Kullanıcı Adı" required="">
			<input type="password" name="sifre" placeholder="Şifre" required="">
			<input type="email" name="eposta" placeholder="Eposta" required="">
			<input type="number" name="telefon" placeholder="Telefon Numarası" required="">
			<input type="number" name="yas" placeholder="Yaş" required="">
			<button type="submit" class="sub" id="giris" name="uye">Üye ol</button>  <!-- Üye ol butonu -->
		</form>
		<a href="musterigiris.php"><button type="submit" class="sub" id="uye">Geri Çık</button></a>  <!-- Geri çıkma butonu -->
	</div><br>
</body>
</html>
<!------------------------------------------------------------------------------------------------->
<?php
	// Formdan gelen veriler ile kullanıcı kaydı yapılır
	if(isset($_POST["uye"]))
	{
		// 'musteriler' tablosuna yeni kullanıcı bilgilerini ekler
		$uye = "INSERT INTO musteriler (musteri_adi_soyadi, kadi, sifre, eposta, telefon, yas) 
				VALUES ('" . $_POST["musteri_adi_soyadi"] . "', 
				        '" . $_POST["kadi"] . "', 
				        '" . $_POST["sifre"] . "', 
				        '" . $_POST["eposta"] . "', 
				        '" . $_POST["telefon"] . "', 
				        '" . $_POST["yas"] . "')";
		// Sorguyu çalıştırır ve sonucu $sonuc değişkenine atar
		$sonuc = mysqli_query($baglan, $uye);

		// Eğer kayıt başarılıysa
		if($sonuc)
		{
			echo "Başarılı";  // Başarılı mesajı
		}
		else
		{
			echo "Başarısız";  // Başarısız mesajı
		}
	}
?>
<!------------------------------------------------------------------------------------------------->
