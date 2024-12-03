<?php
include "baglan.php";  // Veritabanı bağlantısı için baglan.php dosyasını dahil eder.

$musterisilme = @$_GET['id'];  // URL üzerinden gelen 'id' parametresini alır. Bu, silinecek müşterinin ID'sidir. '@' sembolü, hata mesajlarını gizler.

$sorgu = "DELETE FROM musteriler WHERE musteri_id=$musterisilme";  // Veritabanı sorgusu, belirtilen 'musteri_id' ile eşleşen müşteri kaydını siler.

$sonuc = mysqli_query($baglan, $sorgu);  // Sorguyu çalıştırır ve sonucu $sonuc değişkenine atar.

if($sonuc)  // Eğer sorgu başarılı ise (yani bir müşteri silinirse)
{
    echo '<div align="center"><img src="tik.png" ></div>';  // Başarı mesajı olarak, "tik.png" (onay simgesi) gösterir.
    header("Refresh: 1; url=musteriler.php");  // 1 saniye sonra müşteri listesi sayfasına (musteriler.php) yönlendirir.
}
else  // Eğer sorgu başarısız ise
{
    echo '<div align="center"><img src="hata.png" height="550" ></div>';  // Hata mesajı olarak, "hata.png" (hata simgesi) gösterir.
    header("Refresh: 1; url=musteriler.php");  // 1 saniye sonra müşteri listesi sayfasına (musteriler.php) yönlendirir.
}
?>
