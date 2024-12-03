<?php
include ("baglan.php"); // Veritabanı bağlantısını sağlayan dosya dahil edilir
?>

<!DOCTYPE html> <!-- HTML5 belgesinin başlangıcını belirtir -->
<html>
<head>
    <title>Sinema Otomasyonu</title> <!-- Sayfa başlığını belirtir -->
    <meta charset="UTF-8"> <!-- Sayfanın karakter setini belirtir -->
    <meta name="viewport" content="width-device-width,intital-scale-1.0"> <!-- Sayfanın mobil uyumlu olmasını sağlar -->
    <link rel="stylesheet" href="css/index.css"> <!-- Sayfa stil dosyasını dahil eder -->
</head>
<body>
    <header class="deneme"> <!-- Sayfa başlığı kısmı -->
        <h2>Sinema Otomasyonu</h2> <!-- Başlık metni -->
    </header>
    <h6></h6> <!-- Boş bir <h6> etiketi, ekstra bir başlık eklenmemiş -->
    <div class="tableouter"><br><br><br> <!-- Formun dış görünüşünü düzenlemek için kullanılan div -->
        <form action="islemler.php" method="post"> <!-- Kullanıcı girişini işleyecek form -->
            <input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı"> <!-- Kullanıcı adı giriş alanı -->
            <input type="password" name="sifre" placeholder="Şifre"> <!-- Şifre giriş alanı -->
            <button type="submit" class="sub" id="giris" name="giris">Giriş Yap</button> <!-- Giriş yap butonu -->
        </form>
        <a href="musterigiris.php"> <!-- Müşteri girişi sayfasına yönlendiren bağlantı -->
            <button type="submit" class="sub" id="giris" style="background-color: #292830; color: white;">Müşteri Girişi için Tıklayın</button> <!-- Müşteri girişi için buton -->
        </a>
    </div><br> <!-- Form dış görünüşü için boşluk bırakılır -->
</body>
</html>
