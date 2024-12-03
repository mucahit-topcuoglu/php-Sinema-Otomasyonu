<?php include("baglan.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sinema Otomasyonu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header kısmı, navigasyon menüsünü içerir -->
    <header>
        <h2>
            <ul>
                <!-- Film İşlemleri Sayfasına Link -->
                <li><a href="filmler.php">Film İşlemleri</a></li>
                <!-- Seans İşlemleri Sayfasına Link -->
                <li><a href="seansislemleri.php">Seans İşlemleri</a></li>
                <!-- Film Türü Sayfasına Link -->
                <li><a href="filmturu.php">Film Türü</a></li>
                <!-- Bilet İşlemleri Sayfasına Link -->
                <li><a href="biletislemleri.php">Bilet İşlemleri</a></li>
                <!-- Müşteriler Sayfasına Link -->
                <li><a href="musteriler.php">Müşteriler</a></li>
                <!-- Çıkış Sayfasına Link -->
                <li><a href="cikis.php">Çıkış</a></li>
            </ul>
        </h2>
    </header>

    <!-- Başlık kısmı, sayfa başlığı -->
    <h2>Film Türü Ekle</h2>
    <div class="tableouterft">
        <br><br><br><br>

        <!-- Film türü eklemek için form -->
        <form action="islemler.php" method="post">
            <!-- Kullanıcıdan film türü girmesini isteyen input -->
            <input type="text" name="filmturu" placeholder="Film Türü" required="">
            <!-- Film türü ekleme butonu -->
            <button type="submit" class="sub" id="giris" name="filmturuekle">Film Türü Ekle</button>    
        </form>

        <!-- Film türlerini görüntülemek için buton -->
        <form action="" method="post">
            <button class="sub" type="submit" id="giris" name="filmturugoruntule">Film Türlerini Görüntüle</button>
        </form>

        <!-- Film türünü silmek için bağlantı -->
        <a href="filmturusil.php"><button type="submit" class="sub" id="uye" name="uye">Film Türünü Sil</button></a>

        <!-- Film türlerini görüntülemek için şartlı blok -->
        <?php
        if (isset($_POST["filmturugoruntule"])) { // Eğer "Film Türlerini Görüntüle" butonuna basılmışsa
            ?>
            <div align="center">
                <!-- Film türlerinin listeleneceği tablo -->
                <table id="personel">
                    <tr>
                        <th>Film Türü id</th> <!-- Film Türü ID başlığı -->
                        <th>Film Türü</th>    <!-- Film Türü başlığı -->
                    </tr>
                    <?php
                    // Veritabanından tüm film türlerini seçen sorgu
                    $sorgu = mysqli_query($baglan, "SELECT * FROM filmturleri");
                    
                    // Sorgudan dönen her satırı döngü ile al
                    while ($satir = mysqli_fetch_array($sorgu)) {
                        echo "<tr>";  // Tablo satırı aç
                        echo "<td>".$satir["filmtur_id"]."</td>"; // Film türü id'sini tabloya ekle
                        echo "<td>".$satir["film_turu"]."</td>";  // Film türünü tabloya ekle
                        echo "</tr>"; // Tablo satırını kapat
                    }
                    ?>
                </table>
            </div>
            <?php
        }
        ?>
    </div><br>
</body>
</html>
