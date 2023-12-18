-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Ara 2021, 15:24:06
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sfdasd`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `biletsatisi`
--

CREATE TABLE `biletsatisi` (
  `bilet_id` int(11) NOT NULL,
  `musteri_id` int(11) NOT NULL,
  `bilet_tipi` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `film_id` int(11) NOT NULL,
  `salon_id` int(11) NOT NULL,
  `koltuk_id` int(11) NOT NULL,
  `seansSaati_id` int(11) NOT NULL,
  `tutar` varchar(7) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `filmler`
--

CREATE TABLE `filmler` (
  `film_id` int(11) NOT NULL,
  `film_adi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `filmtur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `filmler`
--

INSERT INTO `filmler` (`film_id`, `film_adi`, `filmtur_id`) VALUES
(2, 'Iron Man', 7),
(4, 'In Time', 6),
(5, 'Babam ve Oğlum', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `filmturleri`
--

CREATE TABLE `filmturleri` (
  `filmtur_id` int(11) NOT NULL,
  `film_turu` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `filmturleri`
--

INSERT INTO `filmturleri` (`filmtur_id`, `film_turu`) VALUES
(6, 'Aksiyon'),
(7, 'Bilim Kurgu'),
(9, 'Dram'),
(8, 'Komedi'),
(10, 'Korku');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `koltuk`
--

CREATE TABLE `koltuk` (
  `koltuk_id` int(11) NOT NULL,
  `koltuklar` varchar(4) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `koltuk`
--

INSERT INTO `koltuk` (`koltuk_id`, `koltuklar`) VALUES
(10, '10A'),
(20, '10B'),
(30, '10C'),
(40, '10D'),
(1, '1A'),
(11, '1B'),
(21, '1C'),
(31, '1D'),
(2, '2A'),
(12, '2B'),
(22, '2C'),
(32, '2D'),
(3, '3A'),
(13, '3B'),
(23, '3C'),
(33, '3D'),
(4, '4A'),
(14, '4B'),
(24, '4C'),
(34, '4D'),
(5, '5A'),
(15, '5B'),
(25, '5C'),
(35, '5D'),
(6, '6A'),
(16, '6B'),
(26, '6C'),
(36, '6D'),
(7, '7A'),
(17, '7B'),
(27, '7C'),
(37, '7D'),
(8, '8A'),
(18, '8B'),
(28, '8C'),
(38, '8D'),
(9, '9A'),
(19, '9B'),
(29, '9C'),
(39, '9D');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

CREATE TABLE `musteriler` (
  `musteri_id` int(11) NOT NULL,
  `musteri_adi_soyadi` varchar(70) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kadi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `eposta` varchar(80) COLLATE utf8mb4_turkish_ci NOT NULL,
  `telefon` int(11) NOT NULL,
  `yas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`musteri_id`, `musteri_adi_soyadi`, `kadi`, `sifre`, `eposta`, `telefon`, `yas`) VALUES
(21, 'xxxxx', 'xxxx', '123', 'xxxx@gmail.com', 05555555555, 23);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

CREATE TABLE `personel` (
  `personel_id` int(11) NOT NULL,
  `personel_adi_soyadi` varchar(80) COLLATE utf8mb4_turkish_ci NOT NULL,
  `personel_kullanici` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sifre` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`personel_id`, `personel_adi_soyadi`, `personel_kullanici`, `sifre`) VALUES
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `salon`
--

CREATE TABLE `salon` (
  `salon_id` int(11) NOT NULL,
  `salon_adi` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `salon`
--

INSERT INTO `salon` (`salon_id`, `salon_adi`) VALUES
(1, '1.Salon'),
(2, '2.Salon'),
(3, '3.Salon'),
(4, '4.Salon'),
(5, '5.Salon');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seanslar`
--

CREATE TABLE `seanslar` (
  `seans_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `salon_id` int(11) NOT NULL,
  `seansSaat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `seanslar`
--

INSERT INTO `seanslar` (`seans_id`, `film_id`, `salon_id`, `seansSaat_id`) VALUES
(22, 2, 1, 20),
(24, 4, 2, 21),
(25, 5, 4, 24);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seans_saati`
--

CREATE TABLE `seans_saati` (
  `seansSaat_id` int(11) NOT NULL,
  `seans_saati` varchar(5) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `seans_saati`
--

INSERT INTO `seans_saati` (`seansSaat_id`, `seans_saati`) VALUES
(1, '00.00'),
(2, '01.00'),
(3, '02.00'),
(4, '03.00'),
(5, '04.00'),
(6, '05.00'),
(7, '06.00'),
(8, '07.00'),
(9, '08.00'),
(10, '09.00'),
(11, '10.00'),
(12, '11.00'),
(13, '12.00'),
(14, '13.00'),
(15, '14.00'),
(16, '15.00'),
(17, '16.00'),
(18, '17.00'),
(19, '18.00'),
(20, '19.00'),
(21, '20.00'),
(22, '21.00'),
(23, '22.00'),
(24, '23.00'),
(25, '24.00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `biletsatisi`
--
ALTER TABLE `biletsatisi`
  ADD PRIMARY KEY (`bilet_id`),
  ADD UNIQUE KEY `film_id` (`film_id`,`salon_id`,`koltuk_id`,`seansSaati_id`) USING BTREE,
  ADD UNIQUE KEY `ayni koltuk kısıtlaması` (`koltuk_id`,`salon_id`,`seansSaati_id`),
  ADD KEY `salon_id` (`salon_id`),
  ADD KEY `seansSaati_id` (`seansSaati_id`),
  ADD KEY `musteri_id` (`musteri_id`);

--
-- Tablo için indeksler `filmler`
--
ALTER TABLE `filmler`
  ADD PRIMARY KEY (`film_id`),
  ADD KEY `filmtur_id` (`filmtur_id`),
  ADD KEY `film_adi` (`film_adi`);

--
-- Tablo için indeksler `filmturleri`
--
ALTER TABLE `filmturleri`
  ADD PRIMARY KEY (`filmtur_id`),
  ADD UNIQUE KEY `film_turu` (`film_turu`);

--
-- Tablo için indeksler `koltuk`
--
ALTER TABLE `koltuk`
  ADD PRIMARY KEY (`koltuk_id`),
  ADD UNIQUE KEY `koltuklar` (`koltuklar`);

--
-- Tablo için indeksler `musteriler`
--
ALTER TABLE `musteriler`
  ADD PRIMARY KEY (`musteri_id`),
  ADD UNIQUE KEY `kadi` (`kadi`),
  ADD UNIQUE KEY `eposta` (`eposta`),
  ADD UNIQUE KEY `telefon` (`telefon`);

--
-- Tablo için indeksler `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`personel_id`),
  ADD UNIQUE KEY `personel_kullanici` (`personel_kullanici`);

--
-- Tablo için indeksler `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`salon_id`),
  ADD UNIQUE KEY `salon_adi` (`salon_adi`);

--
-- Tablo için indeksler `seanslar`
--
ALTER TABLE `seanslar`
  ADD PRIMARY KEY (`seans_id`),
  ADD UNIQUE KEY `salon_id` (`salon_id`,`seansSaat_id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `seansSaat_id` (`seansSaat_id`);

--
-- Tablo için indeksler `seans_saati`
--
ALTER TABLE `seans_saati`
  ADD PRIMARY KEY (`seansSaat_id`),
  ADD UNIQUE KEY `seans_saati` (`seans_saati`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `biletsatisi`
--
ALTER TABLE `biletsatisi`
  MODIFY `bilet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Tablo için AUTO_INCREMENT değeri `filmler`
--
ALTER TABLE `filmler`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `filmturleri`
--
ALTER TABLE `filmturleri`
  MODIFY `filmtur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `koltuk`
--
ALTER TABLE `koltuk`
  MODIFY `koltuk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `musteri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `personel`
--
ALTER TABLE `personel`
  MODIFY `personel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `salon`
--
ALTER TABLE `salon`
  MODIFY `salon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `seanslar`
--
ALTER TABLE `seanslar`
  MODIFY `seans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `seans_saati`
--
ALTER TABLE `seans_saati`
  MODIFY `seansSaat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `biletsatisi`
--
ALTER TABLE `biletsatisi`
  ADD CONSTRAINT `biletsatisi_ibfk_18` FOREIGN KEY (`film_id`) REFERENCES `seanslar` (`film_id`),
  ADD CONSTRAINT `biletsatisi_ibfk_19` FOREIGN KEY (`salon_id`) REFERENCES `seanslar` (`salon_id`),
  ADD CONSTRAINT `biletsatisi_ibfk_20` FOREIGN KEY (`seansSaati_id`) REFERENCES `seanslar` (`seansSaat_id`),
  ADD CONSTRAINT `biletsatisi_ibfk_21` FOREIGN KEY (`musteri_id`) REFERENCES `musteriler` (`musteri_id`),
  ADD CONSTRAINT `biletsatisi_ibfk_8` FOREIGN KEY (`koltuk_id`) REFERENCES `koltuk` (`koltuk_id`);

--
-- Tablo kısıtlamaları `filmler`
--
ALTER TABLE `filmler`
  ADD CONSTRAINT `filmler_ibfk_1` FOREIGN KEY (`filmtur_id`) REFERENCES `filmturleri` (`filmtur_id`);

--
-- Tablo kısıtlamaları `seanslar`
--
ALTER TABLE `seanslar`
  ADD CONSTRAINT `seanslar_ibfk_1` FOREIGN KEY (`seansSaat_id`) REFERENCES `seans_saati` (`seansSaat_id`),
  ADD CONSTRAINT `seanslar_ibfk_2` FOREIGN KEY (`salon_id`) REFERENCES `salon` (`salon_id`),
  ADD CONSTRAINT `seanslar_ibfk_3` FOREIGN KEY (`film_id`) REFERENCES `filmler` (`film_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
