<?php include ("baglan.php");
$id=@$_GET['id'];
$tumsorgu="select*from seanslar
	 			INNER JOIN seans_saati ON seanslar.seansSaat_id=seans_saati.seansSaat_id
	 			INNER JOIN filmler ON seanslar.film_id=filmler.film_id 
				INNER JOIN salon ON seanslar.salon_id=salon.salon_id where seans_id='$id'";
$bul=mysqli_query($baglan,$tumsorgu);
$satir=mysqli_fetch_array($bul); ?>
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
	<h2>Bilet Al</h1>
		<div class="tableouterfs">
		<form action="islemler.php" method="post"><br><br><br><br><br>
				<select name="filmid" class="sorgu">
					<?php										
						echo '<option value="'.$satir[film_id].'">'.$satir[film_adi].'</option>';
					?>	
				</select>
				<select name="salonid" class="sorgu">
					<?php
						echo '<option value="'.$satir[salon_id].'">'.$satir[salon_adi].'</option>';	
					?>	
				</select>		
				<select name="seans_saati" class="sorgu">
					<?php
						echo '<option value="'.$satir[seansSaat_id].'">'.$satir[seans_saati].'</option>';
					?>	
				</select>
				<select name="koltukid" class="sorgu">
					<option>Koltuklar</option>
					<?php
						$sorgu="select*from koltuk";
						$sonuc=mysqli_query($baglan,$sorgu);
						while($satir=mysqli_fetch_array($sonuc))
						{
						echo '<option value="'.$satir[koltuk_id].'">'.$satir[koltuklar].'</option>';
						}	
					?>	
				</select><br><br>
			<button type="submit" class="sub" id="giris" name="biletal">Bilet Al</button>
			</form>
	</div>	
</div>
</div><br>
</body>
</html>
