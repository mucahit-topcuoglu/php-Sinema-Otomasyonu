<?php
include "baglan.php";  // Veritabanı bağlantısını dahil eder.

$filmsilme = @$_GET['id'];  // URL'den 'id' parametresini alır (film id).

// Veritabanında film silme sorgusu
$sorgu = "DELETE FROM filmler WHERE film_id=$filmsilme";  // 'film_id'ye göre silme işlemi yapılır.
$sonuc = mysqli_query($baglan, $sorgu);  // Sorguyu çalıştırır.

if ($sonuc) {
    // Silme işlemi başarılıysa, 'tik.png' resmini gösterir.
    echo '<div align="center"><img src="tik.png"></div>';
    // 1 saniye sonra filmler sayfasına yönlendirir.
    header("Refresh: 1; url=filmler.php");
} else {
    // Silme işlemi başarısızsa, 'hata.png' resmini gösterir.
    echo '<div align="center"><img src="hata.png" height="550" ></div>';
    // 1 saniye sonra filmler sayfasına yönlendirir.
    header("Refresh: 1; url=filmler.php");
}
?>
