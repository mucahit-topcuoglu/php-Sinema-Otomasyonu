<?php 
// Veritabanı bağlantısını dahil ediyoruz. baglan.php dosyasında MySQL bağlantı bilgileri bulunur.
include("baglan.php");

// URL parametresinden 'id' değerini alıyoruz. Güvenlik için bu değerin doğrulanması önemlidir.
$id = @$_GET['id'];

// Seçilen seans bilgilerini almak için gerekli SQL sorgusu.
// Bu sorgu, seanslar, seans_saati, filmler ve salon tablolarını birleştirir (INNER JOIN).
$tumsorgu = "SELECT * FROM seanslar
             INNER JOIN seans_saati ON seanslar.seansSaat_id = seans_saati.seansSaat_id
             INNER JOIN filmler ON seanslar.film_id = filmler.film_id 
             INNER JOIN salon ON seanslar.salon_id = salon.salon_id 
             WHERE seans_id = '$id'";

// SQL sorgusunu çalıştırıyoruz ve sonucu alıyoruz.
$bul = mysqli_query($baglan, $tumsorgu);
$satir = mysqli_fetch_array($bul); // Sonuçları bir dizi olarak alıyoruz.
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sinema Otomasyonu</title>
    <!-- Sayfanın karakter setini UTF-8 olarak ayarlıyoruz (Türkçe karakterler için gerekli). -->
    <meta charset="UTF-8">
    <!-- Sayfanın farklı cihazlarda (özellikle mobilde) düzgün görünmesini sağlayan ayar. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Sayfa için CSS dosyasını bağlıyoruz. -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <!-- Kullanıcıya farklı sayfalara erişim sağlayan bir navigasyon menüsü. -->
        <h2>
            <ul>
                <li><a href="bilgilerim.php">Profilim</a></li>
                <li><a href="Biletlerim.php">Biletlerim</a></li>
                <li><a href="vizyondakifilmler.php">Seanslar</a></li>
                <li><a href="cikis.php">Çıkış</a></li>
            </ul>
        </h2>
    </header>

    <!-- Sayfa başlığı -->
    <h2>Bilet Al</h2>

    <!-- Bilet alma formu -->
    <div class="tableouterfs">
        <form action="islemler.php" method="post">
            <br><br><br><br><br>
            
            <!-- Film seçimi dropdown -->
            <select name="filmid" class="sorgu">
                <?php
                    // Varsayılan olarak seçilen seansın film bilgisi.
                    echo '<option value="'.$satir['film_id'].'">'.$satir['film_adi'].'</option>';
                ?>
            </select>

            <!-- Salon seçimi dropdown -->
            <select name="salonid" class="sorgu">
                <?php
                    // Varsayılan olarak seçilen seansın salon bilgisi.
                    echo '<option value="'.$satir['salon_id'].'">'.$satir['salon_adi'].'</option>';    
                ?>
            </select>        

            <!-- Seans saati seçimi dropdown -->
            <select name="seans_saati" class="sorgu">
                <?php
                    // Varsayılan olarak seçilen seansın saati.
                    echo '<option value="'.$satir['seansSaat_id'].'">'.$satir['seans_saati'].'</option>';
                ?>
            </select>

            <!-- Koltuk seçimi dropdown -->
            <select name="koltukid" class="sorgu">
                <option>Koltuklar</option>
                <?php
                    // Tüm koltukları almak için bir SQL sorgusu çalıştırıyoruz.
                    $sorgu = "SELECT * FROM koltuk";
                    $sonuc = mysqli_query($baglan, $sorgu);
                    while ($satir = mysqli_fetch_array($sonuc)) {
                        // Her koltuğu bir seçenek olarak ekliyoruz.
                        echo '<option value="'.$satir['koltuk_id'].'">'.$satir['koltuklar'].'</option>';
                    }    
                ?>    
            </select>
            <br><br>
            
            <!-- Bilet alma işlemini başlatan buton -->
            <button type="submit" class="sub" id="giris" name="biletal">Bilet Al</button>
        </form>
    </div>  
</body>
</html>
