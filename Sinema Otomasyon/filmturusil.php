<?php include ("baglan.php") ?>
<!-- Veritabanı bağlantısını sağlayan baglan.php dosyasını dahil et -->

<!DOCTYPE html>
<html>
<!-- HTML belgesini başlat -->

<head>
    <title>Sinema Otomasyonu</title>
    <!-- Sayfanın başlık kısmı -->
    
    <meta charset="UTF-8">
    <!-- Sayfanın karakter setini belirle -->
    
    <meta name="viewport" content="width-device-width,intital-scale-1.0">
    <!-- Sayfanın mobil uyumlu olmasını sağlamak için viewport ayarı -->
    
    <link rel="stylesheet" href="css/style.css">
    <!-- Sayfada kullanılacak CSS dosyasını dahil et -->
</head>

<body>
    <!-- HTML body kısmı başlar -->

    <header>
    <!-- Başlık kısmı -->
        <h2>
            <ul>
                <!-- Menü oluşturuluyor -->
                <li><a href="filmler.php">Film İşlemleri</a></li>
                <!-- Film işlemleri sayfasına yönlendiren link -->
                <li><a href="seansislemleri.php">Seans İşlemleri</a></li>
                <!-- Seans işlemleri sayfasına yönlendiren link -->
                <li><a href="filmturu.php">Film Türü</a></li>
                <!-- Film türü sayfasına yönlendiren link -->
                <li><a href="biletislemleri.php">Bilet İşlemleri</a></li>
                <!-- Bilet işlemleri sayfasına yönlendiren link -->
                <li><a href="musteriler.php">Müşteriler</a></li>
                <!-- Müşteriler sayfasına yönlendiren link -->
                <li><a href="cikis.php">Çıkış</a></li>
                <!-- Çıkış yapma sayfasına yönlendiren link -->
            </ul>
        </h2>
    </header>
    <!-- Menü başlık kısmı sona erer -->

    <h2>Film Türü Silme</h2>
    <!-- Sayfanın başlığı "Film Türü Silme" -->

    <div class="tableouterfs">
    <!-- Film türü silme formunu kapsayan div -->
        <br><br><br>

        <form action="islemler.php" method="post">
        <!-- Form başlatılıyor. Form verileri islemler.php dosyasına gönderilecek -->

            <select name="filmturu" class="sorgu">
            <!-- Film türlerini seçmek için açılır menü -->
                <option>Film Türleri</option>
                <!-- Seçilebilecek film türlerinin başlığı -->

                <?php
                // Veritabanındaki film türlerini almak için sorgu yazılıyor
                $sorgu="select*from filmturleri";
                $sonuc=mysqli_query($baglan,$sorgu);
                while($satir=mysqli_fetch_array($sonuc))
                {
                    echo '<option value="'.$satir['filmtur_id'].'">'.$satir['film_turu'].'</option>';
                    // Döngü ile her film türünü bir seçenek olarak ekliyoruz
                }
                ?>

            </select><br>
            <!-- Film türlerini gösteren seçim menüsü sona erer -->

            <button type="submit" class="sub" id="uye" name="filmturusilme">Film Türünü Sil</button>
            <!-- Film türünü silmek için buton -->
        </form>

        <a href="filmturu.php">
            <button type="submit" class="sub" id="uye" name="uye">Geri Çık</button>
        </a>
        <!-- Geri çıkmak için bir buton, filmturu.php sayfasına yönlendirir -->
    </div>
    <!-- Film türü silme kısmını kapsayan div sona erer -->

</body>
</html>
<!-- HTML belgesinin sonu -->

<?php
// PHP kodu ile formun gönderilip gönderilmediği kontrol edilebilir

if(isset($_POST["filmturugoruntule"])) {
    // Eğer formda "filmturugoruntule" butonuna tıklanmışsa çalışacak kod
    
    $sorgu = "SELECT * FROM filmturleri";
    // Veritabanından tüm film türlerini almak için SQL sorgusu
    
    $sonuc = mysqli_query($baglan, $sorgu);
    // SQL sorgusu çalıştırılır
    
    if ($sonuc) {
        // Eğer sorgu başarılı olduysa
        
        while ($satir = mysqli_fetch_array($sonuc)) {
            // Döngü ile her bir film türü işlenir
            
            echo "<tr>";
            // HTML satır başlatılır
            echo "<td>".$satir["filmtur_id"]."</td>";
            // Film türü ID'si yazdırılır
            echo "<td>".$satir["film_turu"]."</td>";
            // Film türü adı yazdırılır
            echo "</tr>";
            // HTML satır sonlandırılır
        }
    }
}
?>
