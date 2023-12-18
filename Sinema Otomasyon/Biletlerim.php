<?php 
include ("baglan.php"); ?>
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
		<li><a href="bilgilerim.php">Profilim</a></li>
		<li><a href="Biletlerim.php">Biletlerim</a></li>
		<li><a href="vizyondakifilmler.php">Seanslar</a></li>
		<li><a href="cikis.php">Çıkış</a></li>
		</ul></h2>
	</header>
	<h2>Biletlerim</h1>
		<div class="tableouterbg">		
				<div align="center">
				<table id="personel">
				<tr>
				<th>Bilet id</th>
				<th>Müşteri Adı Soyadı</th>	
				<th>Bilet Tipi</th>					
				<th>Film Adı</th>
				<th>Salon Adı</th>
				<th>Koltuk</th>
				<th>Seans Saati</th>
				<th>Tutar</th>
				<th>Bilet Sil</th>
				</tr>	
				<?php
				$musteriid=@$_SESSION['id'];
				$sorgu=mysqli_query($baglan,"select*from biletsatisi 
				INNER JOIN filmler ON biletsatisi.film_id=filmler.film_id 
				INNER JOIN salon ON biletsatisi.salon_id=salon.salon_id
				INNER JOIN koltuk ON biletsatisi.koltuk_id=koltuk.koltuk_id
				INNER JOIN seans_Saati ON biletsatisi.seansSaati_id=seans_saati.seansSaat_id
				INNER JOIN musteriler ON biletsatisi.musteri_id=musteriler.musteri_id WHERE musteriler.musteri_id='$musteriid'");
				while($satir=mysqli_fetch_array($sorgu))
				{	
				?>	
				<tr>
				<td><?php echo $satir["bilet_id"]?></td>	
				<td><?php echo $satir["musteri_adi_soyadi"]?></td>
				<td><?php echo $satir["bilet_tipi"]?></td>
				<td><?php echo $satir["film_adi"]?></td>
				<td><?php echo $satir["salon_adi"]?></td>
				<td><?php echo $satir["koltuklar"]?></td>
				<td><?php echo $satir["seans_saati"]?></td>
				<td><?php echo $satir["tutar"]?></td>
				<td><a href="biletsilme.php?id=<?php echo $satir['bilet_id'];?>"><button type="submit" class="sub1" id="uye" name="musterisil">Bileti Sil</button></a></td>
				<tr>
				<?php
				}
				?>
			</table>
</div><br>
</body>
</html>
