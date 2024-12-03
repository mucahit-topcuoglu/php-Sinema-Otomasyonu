-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Ara 2021, 15:24:06
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 7.3.2

-- Veritabanı üzerinde SQL işlemleri için başlangıç ayarlarını yapıyoruz
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; -- Otomatik artan değerlerin sıfırdan başlamasına izin verir
SET AUTOCOMMIT = 0; -- Otomatik işlem bitirme devre dışı bırakılır
START TRANSACTION; -- Yeni bir işlem başlatılır
SET time_zone = "+00:00"; -- Zaman dilimi ayarı yapılır

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */; 
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */; 
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */; 
/*!40101 SET NAMES utf8mb4 */; -- Karakter seti ve bağlantı parametreleri için eski değerler saklanır, utf8mb4 karakter setine geçilir

-- Veritabanı adı belirtiliyor
-- Veritabanı: `sfdasd`

-- --------------------------------------------------------

-- Tablo yapısı için `biletsatisi` tablosu oluşturuluyor
CREATE TABLE `biletsatisi` (
  `bilet_id` int(11) NOT NULL, -- Bilet ID'si, boş olamaz
  `musteri_id` int(11) NOT NULL, -- Müşteri ID'si, boş olamaz
  `bilet_tipi` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL, -- Bilet tipi, boş olamaz
  `film_id` int(11) NOT NULL, -- Film ID'si, boş olamaz
  `salon_id` int(11) NOT NULL, -- Salon ID'si, boş olamaz
  `koltuk_id` int(11) NOT NULL, -- Koltuk ID'si, boş olamaz
  `seansSaati_id` int(11) NOT NULL, -- Seans saati ID'si, boş olamaz
  `tutar` varchar(7) COLLATE utf8mb4_turkish_ci NOT NULL -- Bilet tutarı, boş olamaz
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci; -- InnoDB motoruyla ve utf8mb4 karakter setiyle oluşturuluyor

-- --------------------------------------------------------

-- `filmler` tablosunun yapısı oluşturuluyor
CREATE TABLE `filmler` (
  `film_id` int(11) NOT NULL, -- Film ID'si, boş olamaz
  `film_adi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL, -- Film adı, boş olamaz
  `filmtur_id` int(11) NOT NULL -- Film türü ID'si, boş olamaz
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci; -- InnoDB motoruyla ve utf8mb4 karakter setiyle oluşturuluyor

-- `filmler` tablosuna veri ekleniyor
INSERT INTO `filmler` (`film_id`, `film_adi`, `filmtur_id`) VALUES
(2, 'Iron Man', 7), -- 2 numaralı film: 'Iron Man', Aksiyon türünde
(4, 'In Time', 6), -- 4 numaralı film: 'In Time', Bilim Kurgu türünde
(5, 'Babam ve Oğlum', 9); -- 5 numaralı film: 'Babam ve Oğlum', Dram türünde

-- --------------------------------------------------------

-- `filmturleri` tablosunun yapısı oluşturuluyor
CREATE TABLE `filmturleri` (
  `filmtur_id` int(11) NOT NULL, -- Film türü ID'si, boş olamaz
  `film_turu` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL -- Film türü adı, boş olamaz
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci; -- InnoDB motoruyla ve utf8mb4 karakter setiyle oluşturuluyor

-- `filmturleri` tablosuna veri ekleniyor
INSERT INTO `filmturleri` (`filmtur_id`, `film_turu`) VALUES
(6, 'Aksiyon'), -- ID: 6, Tür: Aksiyon
(7, 'Bilim Kurgu'), -- ID: 7, Tür: Bilim Kurgu
(9, 'Dram'), -- ID: 9, Tür: Dram
(8, 'Komedi'), -- ID: 8, Tür: Komedi
(10, 'Korku'); -- ID: 10, Tür: Korku

-- --------------------------------------------------------

-- `koltuk` tablosunun yapısı oluşturuluyor
CREATE TABLE `koltuk` (
  `koltuk_id` int(11) NOT NULL, -- Koltuk ID'si, boş olamaz
  `koltuklar` varchar(4) COLLATE utf8mb4_turkish_ci NOT NULL -- Koltuk adı, boş olamaz
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci; -- InnoDB motoruyla ve utf8mb4 karakter setiyle oluşturuluyor

-- `koltuk` tablosuna veri ekleniyor
INSERT INTO `koltuk` (`koltuk_id`, `koltuklar`) VALUES
(10, '10A'), -- 10 numaralı koltuk, '10A' adında
(20, '10B'), -- 20 numaralı koltuk, '10B' adında
(30, '10C'), -- 30 numaralı koltuk, '10C' adında
(40, '10D'), -- 40 numaralı koltuk, '10D' adında
(1, '1A'), -- 1 numaralı koltuk, '1A' adında
(11, '1B'), -- 11 numaralı koltuk, '1B' adında
(21, '1C'), -- 21 numaralı koltuk, '1C' adında
(31, '1D'), -- 31 numaralı koltuk, '1D' adında
(2, '2A'); -- 2 numaralı koltuk, '2A' adında

-- --------------------------------------------------------

-- `musteriler` tablosunun yapısı oluşturuluyor
CREATE TABLE `musteriler` (
  `musteri_id` int(11) NOT NULL, -- Müşteri ID'si, boş olamaz
  `musteri_adi_soyadi` varchar(70) COLLATE utf8mb4_turkish_ci NOT NULL, -- Müşteri adı soyadı, boş olamaz
  `kadi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL, -- Kullanıcı adı, boş olamaz
  `sifre` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL, -- Şifre, boş olamaz
  `eposta` varchar(80) COLLATE utf8mb4_turkish_ci NOT NULL, -- E-posta, boş olamaz
  `telefon` int(11) NOT NULL, -- Telefon numarası, boş olamaz
  `yas` int(3) NOT NULL -- Yaş, boş olamaz
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci; -- InnoDB motoruyla ve utf8mb4 karakter setiyle oluşturuluyor

-- `musteriler` tablosuna veri ekleniyor
INSERT INTO `musteriler` (`musteri_id`, `musteri_adi_soyadi`, `kadi`, `sifre`, `eposta`, `telefon`, `yas`) VALUES
(21, 'xxxxx', 'xxxx', '123', 'xxxx@gmail.com', 05555555555, 23); -- Müşteri bilgileri ekleniyor

-- --------------------------------------------------------

-- `personel` tablosunun yapısı oluşturuluyor
CREATE TABLE `personel` (
  `personel_id` int(11) NOT NULL, -- Personel ID'si, boş olamaz
  `personel_adi_soyadi` varchar(80) COLLATE utf8mb4_turkish_ci NOT NULL, -- Personel adı soyadı, boş olamaz
  `personel_kullanici` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL, -- Kullanıcı adı, boş olamaz
  `sifre` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL -- Şifre, boş olamaz
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci; -- InnoDB motoruyla ve utf8mb4 karakter setiyle oluşturuluyor

-- --------------------------------------------------------

-- `seansSaatleri` tablosunun yapısı oluşturuluyor
CREATE TABLE `seansSaatleri` (
  `seansSaati_id` int(11) NOT NULL, -- Seans saati ID'si, boş olamaz
  `seansSaati` varchar(5) COLLATE utf8mb4_turkish_ci NOT NULL -- Seans saati, boş olamaz
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci; -- InnoDB motoruyla ve utf8mb4 karakter setiyle oluşturuluyor

-- `seansSaatleri` tablosuna veri ekleniyor
INSERT INTO `seansSaatleri` (`seansSaati_id`, `seansSaati`) VALUES
(1, '13:00'), -- Seans saati: 13:00
(2, '15:00'), -- Seans saati: 15:00
(3, '17:00'); -- Seans saati: 17:00

-- --------------------------------------------------------

-- `salonlar` tablosunun yapısı oluşturuluyor
CREATE TABLE `salonlar` (
  `salon_id` int(11) NOT NULL, -- Salon ID'si, boş olamaz
  `salon_ad` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL -- Salon adı, boş olamaz
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci; -- InnoDB motoruyla ve utf8mb4 karakter setiyle oluşturuluyor

-- `salonlar` tablosuna veri ekleniyor
INSERT INTO `salonlar` (`salon_id`, `salon_ad`) VALUES
(1, 'Salon 1'), -- Salon 1
(2, 'Salon 2'); -- Salon 2

-- Veritabanı işlemi bitiriliyor
COMMIT; -- Yapılan işlemler veritabanına kaydedilir
