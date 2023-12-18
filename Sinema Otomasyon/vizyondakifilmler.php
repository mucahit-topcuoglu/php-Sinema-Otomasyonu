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
		<li><a href="bilgilerim.php">Profilim</a></li>
		<li><a href="Biletlerim.php">Biletlerim</a></li>
		<li><a href="vizyondakifilmler.php">Seanslar</a></li>
		<li><a href="cikis.php">Çıkış</a></li>
		</ul></h2>
	</header>
	<h2>Seanslar</h1>
		<div class="tableouterbg">
				<div align="center">
				<table id="personel">
				<tr>
				<th>Seans id</th>
				<th>Film Adı</th>
				<th>Salon Adı</th>
				<th>Seans Saati</th>
				<th>Bileti Seç</th>
				</tr>
				<?php
				$sorgu=mysqli_query($baglan,"select*from seanslar
	 			INNER JOIN seans_saati ON seanslar.seansSaat_id=seans_saati.seansSaat_id
	 			INNER JOIN filmler ON seanslar.film_id=filmler.film_id 
				INNER JOIN salon ON seanslar.salon_id=salon.salon_id");
				while($satir=mysqli_fetch_array($sorgu))
				{
				?>
				<tr>
				<td><?php echo $satir["seans_id"]?></td>	
				<td><?php echo $satir["film_adi"]?></td>
				<td><?php echo $satir["salon_adi"]?></td>
				<td><?php echo $satir["seans_saati"]?></td>
				<td><a href="biletal.php?id=<?php echo $satir['seans_id'];?>"><button type="submit" class="sub1" id="giris" name="">Bilet Al</button></a></td>
				<tr>
				<?php
				}
				?>
				</table>
</div><br>
</body>
</html>
