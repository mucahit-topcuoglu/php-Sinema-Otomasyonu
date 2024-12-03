<?php 
include ("baglan.php"); // Veritabanı bağlantısının yapıldığı PHP dosyasını dahil ediyoruz. 'baglan.php' içinde veritabanı bağlantı ayarları bulunmaktadır.
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sinema Otomasyonu</title>
	<meta charset="UTF-8"> <!-- Sayfanın karakter setini UTF-8 olarak ayarlıyoruz, böylece Türkçe karakterler doğru şekilde görüntülenir. -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Sayfanın duyarlı (responsive) olmasını sağlıyoruz, farklı ekran boyutlarına göre düzenin uyum sağlamasına yardımcı olur. -->
	<link rel="stylesheet" href="css/style.css"> <!-- Sayfanın stilini belirleyen CSS dosyasını dahil ediyoruz. -->
</head>
<body>
	<header>
		<!-- Sayfanın üst kısmında bir navigasyon menüsü yer alıyor. -->
		<h2>
			<ul>
				<li><a href="bilgilerim.php">Profilim</a></li> <!-- Kullanıcıyı profil sayfasına yönlendiren bağlantı -->
				<li><a href="Biletlerim.php">Biletlerim</a></li> <!-- Kullanıcının biletlerini gösteren sayfaya bağlantı -->
				<li><a href="vizyondakifilmler.php">Seanslar</a></li> <!-- Vizyondaki filmleri ve seansları gösteren sayfaya yönlendiren bağlantı -->
				<li><a href="cikis.php">Çıkış</a></li> <!-- Kullanıcıyı çıkış yapmaya yönlendiren bağlantı -->
			</ul>
		</h2>
	</header>

	<h2>Biletlerim</h2> <!-- Sayfanın başlığını "Biletlerim" olarak belirliyoruz, bu sayfa kullanıcıya ait bilet bilgilerini gösterecek. -->

	<div class="tableouterbg">		
		<div align="center">
			<!-- Kullanıcıya ait biletlerin detaylarını gösteren tabloyu burada oluşturuyoruz. -->
			<table id="personel">
				<tr>
					<!-- Tablo başlıkları (kolon isimleri) -->
					<th>Bilet id</th> <!-- Biletin benzersiz kimliği -->
					<th>Müşteri Adı Soyadı</th> <!-- Biletin alıcısının adı ve soyadı -->
					<th>Bilet Tipi</th> <!-- Biletin tipi (örn. normal, VIP) -->
					<th>Film Adı</th> <!-- İzlenen filmin adı -->
					<th>Salon Adı</th> <!-- Filmin gösterildiği salon adı -->
					<th>Koltuk</th> <!-- Biletin hangi koltuğa ait olduğu -->
					<th>Seans Saati</th> <!-- Film gösteriminin saati -->
					<th>Tutar</th> <!-- Biletin fiyatı -->
					<th>Bilet Sil</th> <!-- Biletin silinebilmesi için buton -->
				</tr>	

				<?php
				// Kullanıcı ID'si oturumdan alınır, bu ID ile sadece bu kullanıcıya ait biletler sorgulanacak.
				$musteriid = @$_SESSION['id']; 

				// Veritabanından, kullanıcının bilet bilgilerini çeken SQL sorgusu:
				// Sorgu, biletsatisi tablosuyla ilgili bilgileri filmler, salon, koltuk, seans_saati ve musteriler tablolarıyla birleştirir (INNER JOIN).
				$sorgu = mysqli_query($baglan, "
					SELECT * 
					FROM biletsatisi 
					INNER JOIN filmler ON biletsatisi.film_id = filmler.film_id 
					INNER JOIN salon ON biletsatisi.salon_id = salon.salon_id
					INNER JOIN koltuk ON biletsatisi.koltuk_id = koltuk.koltuk_id
					INNER JOIN seans_Saati ON biletsatisi.seansSaati_id = seans_saati.seansSaat_id
					INNER JOIN musteriler ON biletsatisi.musteri_id = musteriler.musteri_id 
					WHERE musteriler.musteri_id = '$musteriid'"); 
				
				// Sorgu çalıştırıldığında her bilet satırı için döngü başlatılır:
				while($satir = mysqli_fetch_array($sorgu)) {	
				?>	
				<tr>
					<!-- Her biletin bilgilerini tabloya yazdırıyoruz. -->
					<td><?php echo $satir["bilet_id"]; ?></td> <!-- Biletin ID'si -->
					<td><?php echo $satir["musteri_adi_soyadi"]; ?></td> <!-- Müşterinin adı ve soyadı -->
					<td><?php echo $satir["bilet_tipi"]; ?></td> <!-- Bilet tipi (Normal, VIP vb.) -->
					<td><?php echo $satir["film_adi"]; ?></td> <!-- Filmin adı -->
					<td><?php echo $satir["salon_adi"]; ?></td> <!-- Salonun adı (Örneğin: Salon 1) -->
					<td><?php echo $satir["koltuklar"]; ?></td> <!-- Koltuk numarası -->
					<td><?php echo $satir["seans_saati"]; ?></td> <!-- Seans saati -->
					<td><?php echo $satir["tutar"]; ?></td> <!-- Biletin fiyatı -->
					
					<!-- Bileti silme işlemi için bir bağlantı ve buton ekleniyor -->
					<td>
						<!-- Bilet silme butonunun bulunduğu bağlantı -->
						<a href="biletsilme.php?id=<?php echo $satir['bilet_id']; ?>"> 
							<!-- Bileti silmek için buton -->
							<button type="submit" class="sub1" id="uye" name="musterisil">Bileti Sil</button>
						</a>
					</td>
				</tr>
				<?php
				} // Döngü sonu, her bilet satırı için işlem tekrar edilir.
				?>
			</table>
		</div>
	</div><br>
</body>
</html>
