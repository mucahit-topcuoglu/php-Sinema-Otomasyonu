<?php include ("baglan.php");?>
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
	<div class="tableouterm" style="height: 735px"><br><br>
		<form action="islemler.php" method="post">
			<input type="text" name="musteri_adi_soyadi" placeholder="Müşteri Adı Soyadı" required="" >
			<input type="text" name="kadi" placeholder="Kullanıcı Adı" required="">
			<input type="password" name="sifre" placeholder="Şifre" required="">
			<input type="email" name="eposta" placeholder="Eposta" required="">
			<input type="number" name="telefon" placeholder="Telefon Numarası" required="">
			<input type="number" name="yas" placeholder="Yaş" required="">
			<button type="submit" class="sub" id="giris" name="musteriekle">Müşteri Ekle</button>
		</form>
		<table id="personel" >
			<tr>
				<th>Müşteri id</th>
				<th>Müşteri Adı Soyadı</th>
				<th>Kullanıcı Adı</th>
				<th>Eposta</th>
				<th>Telefon</th>
				<th>Yaş</th>
				<th>Güncelleme</th>
				<th>Müşteri Sil</th>
			</tr>
			<?php
			$sorgu=mysqli_query($baglan,"select*from musteriler");
			while($satir=mysqli_fetch_array($sorgu))
			{
			?>
			<tr>
			<td><?php echo $satir["musteri_id"]?></td>
			<td><?php echo $satir["musteri_adi_soyadi"]?></td>
			<td><?php echo $satir["kadi"]?></td>
			<td><?php echo $satir["eposta"]?></td>
			<td><?php echo $satir["telefon"]?></td>
			<td><?php echo $satir["yas"]?></td>
			<td><a href="musteriguncelle.php?id=<?php echo $satir['musteri_id'];?>"><button type="submit" class="sub1" id="giris">Müşteriyi Düzenle</button></a></td>
			<td><a href="musterisil.php?id=<?php echo $satir['musteri_id'];?>"><button type="submit" class="sub1" id="uye" name="musterisil">Müşteriyi Sil</button></a></td>
			<tr>
			<?php
			}
			?>
		</table>
	</div><br>
</body>
</html>