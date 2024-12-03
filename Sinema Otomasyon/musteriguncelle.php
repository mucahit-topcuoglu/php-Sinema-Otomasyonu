<?php
include ("baglan.php"); // Veritabanı bağlantısını sağlamak için baglan.php dosyasını dahil eder

$id=@$_GET['id']; // URL'den 'id' parametresini alır (Müşteri ID'si)
$bul=mysqli_query($baglan,"select*from musteriler where musteri_id='$id'"); // Müşteri ID'si ile veritabanından müşteri bilgilerini sorgular
$satir=mysqli_fetch_array($bul); // Sorgu sonucu bir satır döndürülür
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width,intital-scale-1.0">
	<link rel="stylesheet" href="css/style.css"> <!-- CSS dosyasını dahil eder -->
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
	<h2>Müşteriler</h2> <!-- Sayfa başlığı -->
	<div class="tableouterm" style="height: 730px"><br><br>
		<!-- Formun içine mevcut müşteri bilgileri yerleştirilir -->
		<form action="" method="post">
			<input type="text" name="musteri_adi_soyadi" placeholder="Müşteri Adı Soyadı" value="<?php echo $satir['musteri_adi_soyadi'];?>" required="" > <!-- Müşteri adı soyadı -->
			<input type="text" name="kadi" placeholder="Kullanıcı Adı" value="<?php echo $satir['kadi'];?>" required=""> <!-- Kullanıcı adı -->
			<input type="password" name="sifre" placeholder="Şifre" value="<?php echo $satir['sifre'];?>" required=""> <!-- Şifre -->
			<input type="email" name="eposta" placeholder="Eposta" value="<?php echo $satir['eposta'];?>" required=""> <!-- Eposta -->
			<input type="number" name="telefon" placeholder="Telefon Numarası" value="<?php echo $satir['telefon'];?>" required=""> <!-- Telefon numarası -->
			<input type="text" name="yas" placeholder="Yaş" value="<?php echo $satir['yas'];?>" required=""><br> <!-- Yaş -->
			<button type="submit" class="sub" id="giris" name="musteriguncelle">Güncelle</button> <!-- Güncelleme butonu -->
		</form>
		<!-- Geri dönme butonu -->
		<a href="musteriler.php"><button type="submit" class="sub" id="uye" name="uye">Geri Çık</button></a>
	</div>
	</div><br>
</body>
</html>

<?php
if(isset($_POST["musteriguncelle"])) // Eğer form gönderildiyse
{
	// Veritabanında müşteri bilgilerini güncelleyen sorgu
	$guncelle="update musteriler set musteri_adi_soyadi='".$_POST['musteri_adi_soyadi']."',kadi='".$_POST['kadi']."',sifre='".$_POST['sifre']."',eposta='".$_POST['eposta']."',telefon='".strval($_POST['telefon'])."',yas='".$_POST['yas']."' where musteri_id='$id'";
	$sonuc=mysqli_query($baglan,$guncelle); // Sorguyu veritabanında çalıştır
	$etkilenensatir=mysqli_affected_rows($baglan); // Etkilenen satır sayısını al
	if($etkilenensatir>0) // Eğer herhangi bir satır güncellendiyse
		{
				echo "Güncellendi"; // Başarılı mesajı
				header("Refresh: 2; url=musteriler.php"); // 2 saniye sonra müşteri listesi sayfasına yönlendir
		}
			else
		{
				echo "Güncellemede sorun oluştu. Tekrar deneyin"; // Hata mesajı
				header("Refresh: 1; url=musteriler.php"); // Hata durumunda müşteri listesi sayfasına yönlendir
		}
}
?>
