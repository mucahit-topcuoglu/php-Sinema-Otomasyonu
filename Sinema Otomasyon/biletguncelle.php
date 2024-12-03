<?php 
// Veritabanı bağlantısını dahil ediyoruz. baglan.php dosyasında MySQL bağlantı bilgileri bulunmaktadır.
include("baglan.php");

// URL üzerinden gelen 'id' parametresini alıyoruz. 
// @ operatörü ile hata mesajlarının görüntülenmesini engelliyoruz. Güvenlik için doğrulama yapılması önerilir.
$id = @$_GET['id'];

// Seçilen bilet bilgilerini almak için gerekli SQL sorgusu.
// biletsatisi, filmler, salon, koltuk, seans_saati ve musteriler tablolarını birleştirerek (INNER JOIN) bilet bilgilerini alıyoruz.
$tumsorgu = "SELECT * FROM biletsatisi 
             INNER JOIN filmler ON biletsatisi.film_id = filmler.film_id 
             INNER JOIN salon ON biletsatisi.salon_id = salon.salon_id
             INNER JOIN koltuk ON biletsatisi.koltuk_id = koltuk.koltuk_id
             INNER JOIN seans_Saati ON biletsatisi.seansSaati_id = seans_saati.seansSaat_id
             INNER JOIN musteriler ON biletsatisi.musteri_id = musteriler.musteri_id 
             WHERE bilet_id = '$id'";

// SQL sorgusunu çalıştırıyoruz ve sonucu alıyoruz.
$bul = mysqli_query($baglan, $tumsorgu);

// Gelen veriyi dizi olarak çekiyoruz.
$satir = mysqli_fetch_array($bul);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sinema Otomasyonu</title>
    <!-- Sayfanın karakter setini UTF-8 olarak ayarlıyoruz (Türkçe karakterler için uygun). -->
    <meta charset="UTF-8">
    <!-- Sayfanın mobil cihazlarda düzgün görünmesini sağlayan ayar. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Harici CSS dosyasını sayfaya dahil ediyoruz. -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <!-- Yönetim paneli için bir navigasyon menüsü. -->
        <h2>
            <ul>
                <li><a href="filmler.php">Film İşlemleri</a></li>
                <li><a href="seansislemleri.php">Seans İşlemleri</a></li>
                <li><a href="filmturu.php">Film Türü</a></li>
                <li><a href="biletislemleri.php">Bilet İşlemleri</a></li>
                <li><a href="musteriler.php">Müşteriler</a></li>
                <li><a href="cikis.php">Çıkış</a></li>
            </ul>
        </h2>
    </header>

    <!-- Sayfa başlığı -->
    <h2>Bilet Güncelleme</h2>

    <!-- Güncelleme formu -->
    <div class="tableouterbg" style="height: 250px">
        <form action="" method="post"><br><br><br>
            <!-- Müşteri seçimi dropdown -->
            <select name="musteriId" class="sorgu">
                <?php
                    // Varsayılan müşteri bilgisi
                    echo '<option value="'.$satir['musteri_id'].'">'.$satir['musteri_adi_soyadi'].'</option>';
                ?>    
            </select>

            <!-- Film seçimi dropdown -->
            <select name="filmid" class="sorgu">
                <?php
                    // Varsayılan film bilgisi
                    echo '<option value="'.$satir['film_id'].'">'.$satir['film_adi'].'</option>';
                ?>    
            </select>

            <!-- Salon seçimi dropdown -->
            <select name="salonid" class="sorgu">
                <?php
                    // Varsayılan salon bilgisi
                    echo '<option value="'.$satir['salon_id'].'">'.$satir['salon_adi'].'</option>';
                ?>    
            </select>        

            <!-- Seans saati seçimi dropdown -->
            <select name="seans_saati" class="sorgu">
                <?php
                    // Varsayılan seans saati bilgisi
                    echo '<option value="'.$satir['seansSaat_id'].'">'.$satir['seans_saati'].'</option>';
                ?>    
            </select>

            <!-- Bilet tipi seçimi dropdown -->
            <select name="bilettipi" class="sorgu">
                <option>Tam</option>
                <option>Öğrenci</option>
            </select>

            <!-- Koltuk seçimi dropdown -->
            <select name="koltukid" class="sorgu">
                <option>Koltuklar</option>
                <?php
                    // Tüm koltukları veritabanından çekiyoruz.
                    $sorgu = "SELECT * FROM koltuk";
                    $sonuc = mysqli_query($baglan, $sorgu);
                    while ($satir = mysqli_fetch_array($sonuc)) {
                        echo '<option value="'.$satir['koltuk_id'].'">'.$satir['koltuklar'].'</option>';
                    }    
                ?>    
            </select>
            <br><br>
            
            <!-- Güncelleme işlemini başlatan buton -->
            <button class="sub" type="submit" id="giris" name="biletguncelle">Bileti Güncelle</button>    
        </form>
    </div><br>
</body>
</html>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->

<?php
// Eğer güncelleme butonuna tıklanırsa
if (isset($_POST["biletguncelle"])) {
    // Bilet tipi seçimine göre ücret belirliyoruz.
    if ($_POST["bilettipi"] == "Öğrenci") {
        $ucret = "10TL";
    } elseif ($_POST["bilettipi"] == "Tam") {
        $ucret = "15TL";
    }

    // Veritabanında bilet bilgilerini güncelleyen SQL sorgusu
    $guncelle = "UPDATE biletsatisi 
                 SET musteri_id = '".$_POST['musteriId']."',
                     bilet_tipi = '".$_POST["bilettipi"]."',
                     film_id = '".$_POST['filmid']."',
                     salon_id = '".$_POST['salonid']."',
                     koltuk_id = '".$_POST['koltukid']."',
                     seansSaati_id = '".$_POST['seans_saati']."',
                     tutar = '".$ucret."' 
                 WHERE bilet_id = '$id'";
                 
    // Sorguyu çalıştırıyoruz.
    $sonuc = mysqli_query($baglan, $guncelle);
    
    // Güncelleme işleminin sonucunu kontrol ediyoruz.
    $etkilenensatir = mysqli_affected_rows($baglan);
    if ($etkilenensatir > 0) {
        // Başarılı bir güncelleme mesajı
        echo 'Güncellendi.';
        header("Refresh: 2; url=biletislemleri.php"); // Sayfayı 2 saniye sonra bilet işlemleri sayfasına yönlendir.
    } else {
        // Hata durumunda mesaj
        echo 'Güncellemede hata oluştu. Tekrar Deneyin.';
        header("Refresh: 2; url=biletislemleri.php");
    }
}
?>
