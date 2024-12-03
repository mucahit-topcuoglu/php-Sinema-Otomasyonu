<?php
include "baglan.php"; // Veritabanı bağlantısı için baglan.php dosyasını dahil eder
?>

<!------------------------------------------------------MÜŞTERİ İŞLEMLERİ---------------------------------------------------------------------------------->
<?php
if(isset($_POST["musteriekle"])) // Eğer formda "musteriekle" butonuna tıklanmışsa
{
    // Müşteri eklemek için SQL sorgusu
    $musteriekle="insert into musteriler (musteri_adi_soyadi,kadi,sifre,eposta,telefon,yas) VALUES ('" . $_POST["musteri_adi_soyadi"]. "','". $_POST["kadi"]."','". $_POST["sifre"]."','". $_POST["eposta"]."','". $_POST["telefon"]."','". $_POST["yas"]."')";
    // Sorguyu çalıştır
    $sonuc=mysqli_query($baglan,$musteriekle);
    if($sonuc) // Sorgu başarılıysa
    {
        echo '<div align="center"><img src="tik.png" ></div>'; // Başarı mesajı
        header("Refresh: 1; url=musteriler.php"); // 1 saniye sonra müşteri listesine yönlendir
    }
    else // Sorgu başarısızsa
    {
        echo '<div align="center"><img src="hata.png" height="550" ></div>'; // Hata mesajı
        header("Refresh: 1; url=musteriler.php"); // 1 saniye sonra müşteri listesine yönlendir
    }
}
?>
<!------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------FİLM İŞLEMLERİ--------------------------------------------------------------->
<?php
if(isset($_POST["filmekle"])) // Eğer "filmekle" butonuna tıklanmışsa
{
    // Film eklemek için SQL sorgusu
    $filmekle="insert into filmler (film_adi , filmtur_id) VALUES ('" . $_POST["filmadi"]. "','". 	$_POST["filmturu"]."')";
    // Sorguyu çalıştır
    $sonuc=mysqli_query($baglan,$filmekle);
    if($sonuc) // Sorgu başarılıysa
    {
        echo '<div align="center"><img src="tik.png" ></div>'; // Başarı mesajı
        header("Refresh: 1; url=filmler.php"); // 1 saniye sonra film listesine yönlendir
    }
    else // Sorgu başarısızsa
    {
        echo '<div align="center"><img src="hata.png" height="550" ></div>'; // Hata mesajı
        header("Refresh: 1; url=filmler.php"); // 1 saniye sonra film listesine yönlendir
    }
}
?>
<!------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------->
<!-----------------------------------------------------------FİLM TÜRÜ İŞLEMLERİ--------------------------------------------------------->
<?php
if(isset($_POST["filmturuekle"])) // Eğer "filmturuekle" butonuna tıklanmışsa
{
    // Film türü eklemek için SQL sorgusu
    $filmturekle="insert into filmturleri (film_turu) VALUES ('" . $_POST["filmturu"]. "')";
    // Sorguyu çalıştır
    $sonuc=mysqli_query($baglan,$filmturekle);
    if($sonuc) // Sorgu başarılıysa
    {
        echo '<div align="center"><img src="tik.png" ></div>'; // Başarı mesajı
        header("Refresh: 1; url=filmturu.php"); // 1 saniye sonra film türleri sayfasına yönlendir
    }
    else // Sorgu başarısızsa
    {
        echo '<div align="center"><img src="hata.png" height="550" ></div>'; // Hata mesajı
        header("Refresh: 1; url=filmturu.php"); // 1 saniye sonra film türleri sayfasına yönlendir
    }
}
?>

<?php
if(isset($_POST["filmturusilme"])) // Eğer "filmturusilme" butonuna tıklanmışsa
{
    $filmturusil= $_POST['filmturu']; // Silinecek film türü ID'sini al
    // Film türünü silmek için SQL sorgusu
    $sorgu="DELETE FROM filmturleri WHERE filmtur_id=$filmturusil";
    // Sorguyu çalıştır
    $sonuc=mysqli_query($baglan,$sorgu);
    if($sonuc) // Sorgu başarılıysa
    {
        echo '<div align="center"><img src="tik.png" ></div>'; // Başarı mesajı
        header("Refresh: 1; url=filmturusil.php"); // 1 saniye sonra film türleri silme sayfasına yönlendir
    }
    else // Sorgu başarısızsa
    {
        echo '<div align="center"><img src="hata.png" height="550" ></div>'; // Hata mesajı
        header("Refresh: 1; url=filmturusil.php"); // 1 saniye sonra film türleri silme sayfasına yönlendir
    }
}
?>
<!------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------SEANS İŞLEMLERİ------------------------------------------------------------->
<?php
if(isset($_POST["seansekle"])) // Eğer "seansekle" butonuna tıklanmışsa
{
    // Seans eklemek için SQL sorgusu
    $seansekle="insert into seanslar (film_id,salon_id,seansSaat_id) VALUES ('"   . $_POST["filmid"]. "','" . $_POST["salonid"]."','" . $_POST["seans"]. "')";
    // Sorguyu çalıştır
    $sonuc=mysqli_query($baglan,$seansekle);
    if($sonuc) // Sorgu başarılıysa
    {
        echo '<div align="center"><img src="tik.png" ></div>'; // Başarı mesajı
        header("Refresh: 1; url=seansislemleri.php"); // 1 saniye sonra seans işlemleri sayfasına yönlendir
    }
    else // Sorgu başarısızsa
    {
        echo '<div align="center"><img src="hata.png" height="550" ></div>'; // Hata mesajı
        header("Refresh: 1; url=seansislemleri.php"); // 1 saniye sonra seans işlemleri sayfasına yönlendir
    }
}
?>

<!------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------BİLET İŞLEMLERİ------------------------------------------------------------->
<?php
if(isset($_POST["biletsat"])) // Eğer "biletsat" butonuna tıklanmışsa
{
    if($_POST["bilettipi"]=="Öğrenci") // Eğer bilet türü "Öğrenci" ise
    {
        $ucret="10TL"; // Öğrenci bileti ücreti
    }
    elseif ($_POST["bilettipi"]=="Tam") // Eğer bilet türü "Tam" ise
    {
        $ucret="15TL"; // Tam bileti ücreti
    }
    $film= $_POST['filmid']; // Film ID'si
    $salon= $_POST['salonid']; // Salon ID'si
    $seansSaat= $_POST['seans_saati']; // Seans saati
    // Seansı kontrol etmek için SQL sorgusu
    $sorgu="Select*from seanslar WHERE film_id='$film' AND salon_id='$salon' AND seansSaat_id='$seansSaat'";
    $sonuc=mysqli_query($baglan, $sorgu);
    $kayitsayisi=mysqli_num_rows($sonuc); // Kayıt sayısını al
    if($kayitsayisi>0) // Eğer seans var ise
    {
        // Bilet satış işlemi için SQL sorgusu
        $biletsat="insert into biletsatisi (musteri_id,bilet_tipi,film_id,salon_id,koltuk_id,seansSaati_id,tutar) VALUES ('" . $_POST["musteriId"]. "','" . $_POST["bilettipi"]. "','" . $_POST["filmid"]. "','" . $_POST["salonid"]. "','" .$_POST["koltukid"]. "','" . $_POST["seans_saati"]."','"."$ucret". "')";
        $biletsorgu=mysqli_query($baglan,$biletsat);
        if($biletsorgu) // Sorgu başarılıysa
        {
            echo '<div align="center"><img src="tik.png" ></div>'; // Başarı mesajı
            header("Refresh: 1; url=biletislemleri.php"); // 1 saniye sonra bilet işlemleri sayfasına yönlendir
        }
        else // Sorgu başarısızsa
        {
            echo '<div align="center"><img src="hata.png" height="550" ></div>'; // Hata mesajı
            header("Refresh: 1; url=biletislemleri.php"); // 1 saniye sonra bilet işlemleri sayfasına yönlendir
        }
    }
    else // Seans yoksa
    {
        echo '<div align="center"><img src="hata.png" height="550" ></div>'; // Hata mesajı
        header("Refresh: 1; url=biletislemleri.php"); // 1 saniye sonra bilet işlemleri sayfasına yönlendir
    }
}
?>
