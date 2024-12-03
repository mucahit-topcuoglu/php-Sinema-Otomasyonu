<?php
session_start(); // PHP oturumunu başlatır. Bu, oturum verilerini kullanabilmek için gereklidir.

unset($_SESSION["isim"]); // 'isim' adlı oturum değişkenini temizler (kaldırır).
unset($_SESSION["id"]); // 'id' adlı oturum değişkenini temizler (kaldırır).
unset($_SESSION["kadi"]); // 'kadi' (kullanıcı adı) adlı oturum değişkenini temizler.
unset($_SESSION["eposta"]); // 'eposta' adlı oturum değişkenini temizler.
unset($_SESSION["telefon"]); // 'telefon' adlı oturum değişkenini temizler.

header("Refresh: 0; url=index.php"); // Sayfa yüklemesinden hemen sonra 'index.php' sayfasına yönlendirir. Bu, çıkış işleminden sonra kullanıcıyı giriş sayfasına yönlendirmeyi sağlar.
?>
