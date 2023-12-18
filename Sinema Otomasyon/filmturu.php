<?php include ("baglan.php") ?>
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
	<h2>Film Türü Ekle</h1>
		<div class="tableouterft"><br><br><br><br>
		<form action="islemler.php" method="post">
			<input type="text" name="filmturu" placeholder="Film Türü" required="">
			<button type="submit" class="sub" id="giris" name="filmturuekle">Film Türü Ekle</button>	
		</form>
		<form action="" method="post">
			<button class="sub" type="submit" id="giris" name="filmturugoruntule">Film Türlerini Görüntüle</button>
		</form>
		<a href="filmturusil.php"><button type="submit" class="sub" id="uye" name="uye">Film Türünü Sil</button></a>
				<?php
				if(isset($_POST["filmturugoruntule"]))
				{
				?>
				<div align="center">
						<table id="personel">
							<tr>
								<th>Film Türü id</th>
								<th>Film Türü</th>	
							</tr>
						<?php
						$sorgu=mysqli_query($baglan,"select*from filmturleri");
						while($satir=mysqli_fetch_array($sorgu))
						{
						echo "<tr>";
						echo "<td>".$satir["filmtur_id"]."</td>";
						echo "<td>".$satir["film_turu"]."</td>";
						echo "<tr>";
						}
					}
					?>
						</table>
				</div>
		</div><br>
</body>
</html>