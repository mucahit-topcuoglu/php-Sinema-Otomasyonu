<?php include "baglan.php";?>
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
	<h2>Film İşlemleri</h1>
		<div class="tableouterf" style="height: 400px"><br><br><br>
		<form action="islemler.php" method="post">
			<input type="text" name="filmadi" placeholder="Film Adı" required=""><br>			
			<select name="filmturu" class="sorgu">
				<option>Film Türü</option>
				<?php
					$sorgu="select*from filmturleri";
					$sonuc=mysqli_query($baglan,$sorgu);
					while($satir=mysqli_fetch_array($sonuc))
					{
					echo '<option value="'.$satir[filmtur_id].'">'.$satir[film_turu].'</option>';
					}	
				?>	
			</select><br>
			<button class="sub" type="submit" id="giris" name="filmekle">Film Ekle</button>
		</form>
		<form action="" method="post">
		<button class="sub" type="submit" id="giris" name="filmgoruntule">Filmleri Görüntüle</button>
		</form>			
<?php
if(isset($_POST["filmgoruntule"]))
{	
?>
<table id="personel">
<tr>
	<th>Film id</th>
	<th>Film adı</th>	
	<th>Film Türü</th>
	<th>Filmi Güncelle</th>
	<th>Filmi Sil</th>
</tr>
<?php
$listele="select film_id, film_adi, film_turu from filmler INNER JOIN filmturleri ON filmler.filmtur_id=filmturleri.filmtur_id";
$sorgu=mysqli_query($baglan,$listele);
while($satir=mysqli_fetch_array($sorgu))
{
?>
<tr>
<td><?php echo $satir["film_id"]?></td>
<td><?php echo $satir["film_adi"]?></td>
<td><?php echo $satir["film_turu"]?></td>
<td><a href="filmguncelle.php?id=<?php echo $satir['film_id'];?>"><button type="submit" class="sub1" id="giris" name="uye">Filmi Güncelle</button></a></td>
<td><a href="filmsil.php?id=<?php echo $satir['film_id'];?>"><button type="submit" class="sub1" id="uye" name="uye">Filmi Sil</button></a></td>
</tr>
<?php
}
}
?>
</table>
	</div><br>	
</body>
</html>

