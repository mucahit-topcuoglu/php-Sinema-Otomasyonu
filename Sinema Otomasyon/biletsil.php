<?php
include "baglan.php"; // Veritabanı bağlantısı için baglan.php dosyasını dahil ediyoruz

$biletsilme=@$_GET['id']; // URL üzerinden gönderilen 'id' parametresini alıyoruz, bu ID biletin ID'sidir

$sorgu="DELETE FROM biletsatisi WHERE bilet_id=$biletsilme"; // 'bilet_id' ile eşleşen bileti silmek için SQL sorgusunu oluşturuyoruz

$sonuc=mysqli_query($baglan,$sorgu); // Sorguyu veritabanında çalıştırıyoruz

if($sonuc) { // Eğer sorgu başarılı olduysa
    echo '<div align="center"><img src="tik.png"></div>'; // Başarı mesajı olarak bir onay resmi gösteriyoruz
    header("Refresh: 1; url=biletislemleri.php"); // 1 saniye sonra bilet işlemleri sayfasına yönlendiriyoruz
} else { // Eğer sorgu başarısız olduysa
    echo '<div align="center"><img src="hata.png" height="550" ></div>'; // Hata mesajı olarak bir hata resmi gösteriyoruz
    header("Refresh: 1; url=biletislemleri.php"); // 1 saniye sonra bilet işlemleri sayfasına yönlendiriyoruz
}
?>
