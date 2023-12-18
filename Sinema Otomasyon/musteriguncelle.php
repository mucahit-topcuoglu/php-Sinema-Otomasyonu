<?php include ("baglan.php");
$id=@$_GET['id'];
$bul=mysqli_query($baglan,"select*from musteriler where musteri_id='$id'");
$satir=mysqli_fetch_array($bul);
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
		<h2><ul>
		<li><a href="filmler.php">Film İşlemleri</a></li>
		<li><a href="seansislemleri.php">Seans İşlemleri</a></li>
		<li><a href="filmturu.php">Film Türü</a></li>
		<li><a href="biletislemleri.php">Bilet İşlemleri</a></li>
		<li><a href="musteriler.php">Müşteriler</a></li>
		<li><a href="cikis.php">Çıkış</a></li>
		</ul></h2>
	</header>
	<h2>Müşteriler</h1>
	<div class="tableouterm" style="height: 730px"><br><br>
		<form action="" method="post">
			<input type="text" name="musteri_adi_soyadi" placeholder="Müşteri Adı Soyadı" value="<?php echo $satir['musteri_adi_soyadi'];?>" required="" >
			<input type="text" name="kadi" placeholder="Kullanıcı Adı" value="<?php echo $satir['kadi'];?>" required="">
			<input type="password" name="sifre" placeholder="Şifre" value="<?php echo $satir['sifre'];?>" required="">
			<input type="email" name="eposta" placeholder="Eposta" value="<?php echo $satir['eposta'];?>" required="">
			<input type="number" name="telefon" placeholder="Telefon Numarası" value="<?php echo $satir['telefon'];?>" required="">
			<input type="text" name="yas" placeholder="Yaş"  value="<?php echo $satir['yas'];?>"  required=""><br>
			<button type="submit" class="sub" id="giris" name="musteriguncelle">Güncelle</button>
		</form>
		<a href="musteriler.php"><button type="submit" class="sub" id="uye" name="uye">Geri Çık</button></a>
		</div>
	</div><br>
</body>
</html>

<?php
if(isset($_POST["musteriguncelle"]))
{
	$guncelle="update musteriler set musteri_adi_soyadi='".$_POST['musteri_adi_soyadi']."',kadi='".$_POST['kadi']."',sifre='".$_POST['sifre']."',eposta='".$_POST['eposta']."',telefon='".strval($_POST['telefon'])."',yas='".$_POST['yas']."'where musteri_id='$id'";
	$sonuc=mysqli_query($baglan,$guncelle);
	$etkilenensatir=mysqli_affected_rows($baglan);
	if($etkilenensatir>0)
		{
				echo "Güncellendi";
				header("Refresh: 2; url=musteriler.php");
				
		}
			else
		{
				echo "Güncellemede sorun oluştu. Tekrar deneyin";
				header("Refresh: 1; url=musteriler.php");
		}
}
?>
