<?php include("baglan.php");
$id=@$_GET['id'];
$tumsorgu="select*from filmler where film_id=$id";
$bul=mysqli_query($baglan,$tumsorgu);
$satir=mysqli_fetch_array($bul);?>
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
	<h2>Film Güncelleme</h1>
		<div class="tableouterf" style="height: 400px"><br><br><br>
		<form action="" method="post">
			<input type="text" name="filmadi" placeholder="Film Adı" required="" value="<?php echo $satir['film_adi'];?>"><br>			
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
			<button class="sub" type="submit" id="giris" name="filmguncelle">Filmi Güncelle</button>		
		</form>
		<a href="filmler.php"><button type="submit" class="sub" id="uye" name="uye">Geri Çık</button></a><br>
	</div><br>	
</body>
</html>

<?php
if(isset($_POST["filmguncelle"]))
{
	$guncelle="update filmler set film_adi='".$_POST['filmadi']."',filmtur_id='". $_POST['filmturu']."'where film_id='$id'";
	$sonuc=mysqli_query($baglan,$guncelle);
	$etkilenensatir=mysqli_affected_rows($baglan);
	if($etkilenensatir>0)
		{
				echo 'Güncellendi';
		}
			else
		{
			echo 'Güncelleme Başarısız.';
		}
}
?>