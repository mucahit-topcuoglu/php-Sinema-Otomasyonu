<?php
session_start();
unset($_SESSION["isim"]);
unset($_SESSION["id"]);
unset($_SESSION["kadi"]);
unset($_SESSION["eposta"]);
unset($_SESSION["telefon"]);
header("Refresh: 0; url=index.php");
 ?>