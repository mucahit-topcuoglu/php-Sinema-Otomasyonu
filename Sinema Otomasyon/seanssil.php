<?php
include "baglan.php";  // Veritabanı bağlantısını sağlamak için 'baglan.php' dosyasını dahil eder.

$seanssilme = @$_GET['id'];  // URL'den 'id' parametresini alır. Eğer parametre varsa, seans ID'sini alır.

// SQL sorgusu: Seans ID'sine göre veritabanındaki seansı siler
$sorgu = "DELETE FROM seanslar WHERE seans_id = $seanssilme";

// Sorguyu çalıştırır ve sonucu $sonuc değişkenine atar
$sonuc = mysqli_query($baglan, $sorgu);

// Sorgu başarılıysa
if ($sonuc) {
    // Başarıyla silindiğinde kullanıcıya başarı mesajı gösterilir
    echo '<div align="center"><img src="tik.png"></div>';
    // 1 saniye sonra seans işlemleri sayfasına yönlendirir
    header("Refresh: 1; url=seansislemleri.php");
} else {
    // Eğer silme işlemi başarısızsa, hata mesajı gösterilir
    echo '<div align="center"><img src="hata.png" height="550"></div>';
    // 1 saniye sonra seans işlemleri sayfasına yönlendirir
    header("Refresh: 1; url=seansislemleri.php");
}
?>
