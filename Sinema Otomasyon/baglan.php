<?php
// Oturum başlatma işlemi. Kullanıcının oturum bilgilerini saklamak için gereklidir.
session_start();

// Çıktı tamponlaması. Sayfa çıkışı üzerinde kontrol sağlar (örneğin yönlendirme işlemleri sırasında).
ob_start();

// Veritabanı bağlantı ayarları.
$username = "root"; // Veritabanı kullanıcı adı.
$password = "";     // Veritabanı şifresi (varsayılan olarak boş).
$sunucu = "localhost"; // Veritabanı sunucusu (genelde localhost kullanılır).
$database = "sinema";  // Kullanılacak veritabanı adı.

// Veritabanı bağlantısı oluşturma.
$baglan = mysqli_connect($sunucu, $username, $password, $database);

// Bağlantı karakter setini UTF-8 olarak ayarlama (Türkçe karakterler için gerekli).
$baglan->set_charset("utf8");

// Eğer bağlantı başarısız olursa bir hata mesajı verelim.
if (!$baglan) {
    die("Veritabanına bağlanılamadı: " . mysqli_connect_error());
} else {
    // Bağlantı başarılıysa bunu loglamak veya test etmek için buraya bir mesaj eklenebilir.
    // Örneğin: echo "Bağlantı başarılı!";
}
?>
