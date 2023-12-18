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
	<h2>Film Türü Silme</h1>
		<div class="tableouterfs"><br><br><br>
		<form action="islemler.php" method="post">
			<select name="filmturu" class="sorgu">
				<option>Film Türleri</option>
				<?php
					$sorgu="select*from filmturleri";
					$sonuc=mysqli_query($baglan,$sorgu);
					while($satir=mysqli_fetch_array($sonuc))
					{
					echo '<option value="'.$satir[filmtur_id].'">'.$satir[film_turu].'</option>';
					}	
				?>	
			</select><br>
			<button type="submit" class="sub" id="uye" name="filmturusilme">Film Türünü Sil</button>
		</form>
		<a href="filmturu.php"><button type="submit" class="sub" id="uye" name="uye">Geri Çık</button></a>
</div><br>
</body>
</html>