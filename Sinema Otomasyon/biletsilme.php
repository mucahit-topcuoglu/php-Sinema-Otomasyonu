<?php
include "baglan.php"; // Veritabanı bağlantısını sağlamak için baglan.php dosyasını dahil ediyoruz

$biletsilme=@$_GET['id']; // URL üzerinden gelen 'id' parametresini alıyoruz. Bu parametre biletin benzersiz ID'sidir.

$sorgu="DELETE FROM biletsatisi WHERE bilet_id=$biletsilme"; // 'bilet_id' ile eşleşen kaydı silmek için SQL sorgusunu oluşturuyoruz.

$sonuc=mysqli_query($baglan,$sorgu); // Veritabanına sorguyu gönderip işlemi başlatıyoruz.

if($sonuc) { // Eğer sorgu başarılı olduysa
    echo '<div align="center"><img src="tik.png"></div>'; // Başarı mesajı olarak bir onay görseli (tik.png) gösteriyoruz
    header("Refresh: 1; url=biletlerim.php"); // 1 saniye sonra 'biletlerim.php' sayfasına yönlendiriyoruz
} else { // Eğer sorgu başarısız olursa
    echo '<div align="center"><img src="hata.png" height="550" ></div>'; // Hata mesajı olarak bir hata görseli (hata.png) gösteriyoruz
    header("Refresh: 1; url=biletlerim.php"); // 1 saniye sonra 'biletlerim.php' sayfasına yönlendiriyoruz
}
?>
