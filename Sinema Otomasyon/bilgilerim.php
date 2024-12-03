<?php
include ("baglan.php"); // Veritabanı bağlantısını sağlamak için baglan.php dosyasını dahil ediyoruz.

$id = $_SESSION['id']; // Kullanıcı oturumu açtıktan sonra oturumda saklanan 'id' bilgisi alınır. Bu, kullanıcının benzersiz kimliğidir.

$bul = mysqli_query($baglan, "select*from musteriler where musteri_id='$id'"); // 'musteriler' tablosundan, oturum açan kullanıcının bilgilerini almak için sorgu yapıyoruz.
$satir = mysqli_fetch_array($bul); // Sorgu sonucundan veriyi alıp bir dizi olarak saklıyoruz.
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width,intital-scale-1.0">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<h2>
			<ul>
				<li><a href="bilgilerim.php">Profilim</a></li>
				<li><a href="Biletlerim.php">Biletlerim</a></li>
				<li><a href="vizyondakifilmler.php">Seanslar</a></li>
				<li><a href="cikis.php">Çıkış</a></li>
			</ul>
		</h2>
	</header>
	<h2>Bilgilerim</h2>
	<div class="tableouterm" style="height: 625px"><br><br>
		<!-- Kullanıcı bilgilerini güncellemek için form -->
		<form action="" method="post">
			<!-- Kullanıcı adı, şifre, e-posta, telefon ve yaş bilgileri girilebilir -->
			<input type="text" name="musteri_adi_soyadi" placeholder="Müşteri Adı Soyadı" value="<?php echo $satir['musteri_adi_soyadi'];?>" required="" >
			<input type="text" name="kadi" placeholder="Kullanıcı Adı" value="<?php echo $satir['kadi'];?>" required="">
			<input type="password" name="sifre" placeholder="Şifre" value="<?php echo $satir['sifre'];?>" required="">
			<input type="email" name="eposta" placeholder="Eposta" value="<?php echo $satir['eposta'];?>" required="">
			<input type="number" name="telefon" placeholder="Telefon Numarası" value="<?php echo $satir['telefon'];?>" required=""><br>
			<input type="number" name="yas" placeholder="Yaş" value="<?php echo $satir['yas'];?>" required="">
			<button type="submit" class="sub" id="giris" name="musteriguncelle2">Güncelle</button>
		</form>
	</div><br>
</body>
</html>

<?php
if(isset($_POST["musteriguncelle2"])) { // Eğer formda 'Güncelle' butonuna tıklanırsa
	// Kullanıcıdan alınan verilere göre veritabanındaki kullanıcı bilgilerini güncelleyen SQL sorgusu
	$guncelle = "update musteriler set musteri_adi_soyadi='".$_POST['musteri_adi_soyadi']."', kadi='".$_POST['kadi']."', sifre='".$_POST['sifre']."', eposta='".$_POST['eposta']."', telefon='".$_POST['telefon']."', yas='".$_POST['yas']."' where musteri_id='$id'";

	// SQL sorgusunu veritabanına gönderiyoruz
	$sonuc = mysqli_query($baglan, $guncelle);

	// Etkilenen satır sayısını kontrol ederek işlemin başarılı olup olmadığını kontrol ediyoruz
	$etkilenensatir = mysqli_affected_rows($baglan);
	if($etkilenensatir > 0) { // Eğer en az bir satır güncellenmişse
		echo "Güncellendi"; // Kullanıcıya başarılı güncelleme mesajı veriyoruz
		header("Refresh: 2; url=bilgilerim.php"); // 2 saniye sonra 'bilgilerim.php' sayfasına yönlendiriyoruz
	} else {
		echo "Güncellemede sorun oluştu. Tekrar deneyin"; // Eğer hiçbir şey değişmediyse hata mesajı veriyoruz
		header("Refresh: 1; url=bilgilerim.php"); // 1 saniye sonra 'bilgilerim.php' sayfasına yönlendiriyoruz
	}
}
?>
