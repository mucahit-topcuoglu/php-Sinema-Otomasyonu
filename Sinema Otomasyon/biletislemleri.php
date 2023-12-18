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
	<h2>Bilet işlemleri</h1>
		<div class="tableouterb" style="height: 400px"><br><br><br>
		<form action="" method="post">
			<input type="text" name="filmseans" placeholder="Seans Ara">
			<button class="sub" type="submit" id="giris" name="seansgoruntule">Seansları Listele</button>
			<input type="text" name="musteriadi" placeholder="Müşteri Ara">
			<button class="sub" type="submit" id="giris" name="biletgoruntule">Biletleri Listele</button>
			
		</form>
		<!------------------------------------------------------------------------------------------------->
				<?php
				if(isset($_POST["biletgoruntule"]))
				{	
				?>
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
				<th>Bilet Silme</th>
				<th>Bileti Güncelle</th>
				</tr>	
				<?php
				$musteriadi=$_POST["musteriadi"];
				$sorgu=mysqli_query($baglan,"select bilet_id, musteri_adi_soyadi,bilet_tipi,film_adi,salon_adi,koltuklar,seans_saati,tutar from biletsatisi 
				INNER JOIN filmler ON biletsatisi.film_id=filmler.film_id 
				INNER JOIN salon ON biletsatisi.salon_id=salon.salon_id
				INNER JOIN koltuk ON biletsatisi.koltuk_id=koltuk.koltuk_id
				INNER JOIN seans_Saati ON biletsatisi.seansSaati_id=seans_saati.seansSaat_id
				INNER JOIN musteriler ON biletsatisi.musteri_id=musteriler.musteri_id WHERE musteri_adi_soyadi LIKE '%$musteriadi%'");
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
				<td><a href="biletguncelle.php?id=<?php echo $satir['bilet_id'];?>"><button type="submit" class="sub1" id="giris" name="guncelleme">Bileti Güncelle</button></a></td>
				<td><a href="biletsil.php?id=<?php echo $satir['bilet_id'];?>"><button type="submit" class="sub1" id="uye" name="musterisil">Bileti Sil</button></a></td>
				<?php
				}
				}
				?>
				</table>
             <!------------------------------------------------------------------------------------------------------------------------------------------------------------->
				<?php
				if(isset($_POST["seansgoruntule"])) 
				{	
				?>
				<div align="center">
				<table id="personel">
				<tr>
				<th>Seans id</th>
				<th>Film Adı</th>
				<th>Salon Adı</th>
				<th>Seans Saati</th>
				<th>Bilet Sat</th>
				</tr>
				<?php
				$filmadi=$_POST["filmseans"];
				$sorgu=mysqli_query($baglan,"select*from seanslar
	 			INNER JOIN seans_saati ON seanslar.seansSaat_id=seans_saati.seansSaat_id
	 			INNER JOIN filmler ON seanslar.film_id=filmler.film_id 
				INNER JOIN salon ON seanslar.salon_id=salon.salon_id WHERE film_adi LIKE '%$filmadi%' ");
				while($satir=mysqli_fetch_array($sorgu))
				{
				?>
				<tr>
				<td><?php echo $satir["seans_id"]?></td>	
				<td><?php echo $satir["film_adi"]?></td>
				<td><?php echo $satir["salon_adi"]?></td>
				<td><?php echo $satir["seans_saati"]?></td>
				<td><a href="biletsat.php?id=<?php echo $satir['seans_id'];?>"><button type="submit" class="sub1" id="giris" name="biletsec">Bilet Sat</button></a></td>
				<tr>
				<?php
				}
				}
				?>
				</table>
	</div>	
</div>
</div><br>
</body>
</html>