<?php
session_start();
ob_start();
$username="root";
$password="";
$sunucu="localhost";
$database="sinema";
$baglan=mysqli_connect($sunucu,$username,$password,$database);
$baglan->set_charset("utf8");
?>