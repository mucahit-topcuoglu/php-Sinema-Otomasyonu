<?php include ("baglan.php"); ?> <!-- Veritabanı bağlantısını yapar. -->
<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title> <!-- Sayfa başlığını belirler. -->
	<meta charset="UTF-8"> <!-- Sayfanın karakter setini belirler. -->
	<meta name="viewport" content="width-device-width,intital-scale-1.0"> <!-- Sayfanın mobil uyumlu olmasını sağlar. -->
	<link rel="stylesheet" href="css/style.css"> <!-- Stil dosyasını sayfaya dahil eder. -->
</head>
<body>
	<header>
		<h2><ul> <!-- Navigasyon menüsünü oluşturur. -->
		<li><a href="filmler.php">Film İşlemleri</a></li> <!-- Film işlemleri sayfasına yönlendiren link -->
		<li><a href="seansislemleri.php">Seans İşlemleri</a></li> <!-- Seans işlemleri sayfasına yönlendiren link -->
		<li><a href="filmturu.php">Film Türü</a></li> <!-- Film türü sayfasına yönlendiren link -->
		<li><a href="biletislemleri.php">Bilet İşlemleri</a></li> <!-- Bilet işlemleri sayfasına yönlendiren link -->
		<li><a href="musteriler.php">Müşteriler</a></li> <!-- Müşteriler sayfasına yönlendiren link -->
		<li><a href="cikis.php">Çıkış</a></li> <!-- Çıkış yapma sayfasına yönlendiren link -->
		</ul></h2>
	</header>
	<h2>Müşteriler</h2> <!-- Sayfa başlığı -->
	<div class="tableouterm" style="height: 735px"><br><br>
		<form action="islemler.php" method="post"> <!-- Müşteri eklemek için form başlangıcı -->
			<input type="text" name="musteri_adi_soyadi" placeholder="Müşteri Adı Soyadı" required=""> <!-- Müşteri adı soyadı alanı -->
			<input type="text" name="kadi" placeholder="Kullanıcı Adı" required=""> <!-- Kullanıcı adı alanı -->
			<input type="password" name="sifre" placeholder="Şifre" required=""> <!-- Şifre alanı -->
			<input type="email" name="eposta" placeholder="Eposta" required=""> <!-- E-posta alanı -->
			<input type="number" name="telefon" placeholder="Telefon Numarası" required=""> <!-- Telefon numarası alanı -->
			<input type="number" name="yas" placeholder="Yaş" required=""> <!-- Yaş alanı -->
			<button type="submit" class="sub" id="giris" name="musteriekle">Müşteri Ekle</button> <!-- Müşteri ekle butonu -->
		</form>
		<table id="personel">
			<tr>
				<th>Müşteri id</th> <!-- Müşteri ID başlığı -->
				<th>Müşteri Adı Soyadı</th> <!-- Müşteri adı soyadı başlığı -->
				<th>Kullanıcı Adı</th> <!-- Kullanıcı adı başlığı -->
				<th>Eposta</th> <!-- E-posta başlığı -->
				<th>Telefon</th> <!-- Telefon başlığı -->
				<th>Yaş</th> <!-- Yaş başlığı -->
				<th>Güncelleme</th> <!-- Güncelleme başlığı -->
				<th>Müşteri Sil</th> <!-- Müşteri silme başlığı -->
			</tr>
			<?php
			$sorgu=mysqli_query($baglan,"select*from musteriler"); // Veritabanındaki tüm müşterileri sorgular
			while($satir=mysqli_fetch_array($sorgu)) // Sorgu sonucunda dönen her bir müşteri için işlem yapar
			{
			?>
			<tr>
			<td><?php echo $satir["musteri_id"]?></td> <!-- Müşteri ID'si -->
			<td><?php echo $satir["musteri_adi_soyadi"]?></td> <!-- Müşteri adı soyadı -->
			<td><?php echo $satir["kadi"]?></td> <!-- Kullanıcı adı -->
			<td><?php echo $satir["eposta"]?></td> <!-- E-posta -->
			<td><?php echo $satir["telefon"]?></td> <!-- Telefon -->
			<td><?php echo $satir["yas"]?></td> <!-- Yaş -->
			<td><a href="musteriguncelle.php?id=<?php echo $satir['musteri_id'];?>"><button type="submit" class="sub1" id="giris">Müşteriyi Düzenle</button></a></td> <!-- Müşteri düzenleme linki -->
			<td><a href="musterisil.php?id=<?php echo $satir['musteri_id'];?>"><button type="submit" class="sub1" id="uye" name="musterisil">Müşteriyi Sil</button></a></td> <!-- Müşteri silme linki -->
			<tr>
			<?php
			}
			?>
		</table>
	</div><br>
</body>
</html>
