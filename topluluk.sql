-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 23 Haz 2019, 11:09:41
-- Sunucu sürümü: 5.7.11
-- PHP Sürümü: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `topluluk`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gorev`
--

CREATE TABLE `gorev` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `komite`
--

CREATE TABLE `komite` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `komite`
--

INSERT INTO `komite` (`id`, `ad`) VALUES
(1, 'Teknik Projeler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `puan`
--

CREATE TABLE `puan` (
  `id` int(11) NOT NULL,
  `uyeid` int(11) NOT NULL,
  `puan` int(11) NOT NULL,
  `sebep` text COLLATE utf8_unicode_ci NOT NULL,
  `tarih` datetime NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `puanlayanid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

CREATE TABLE `uye` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `soyad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(30) CHARACTER SET latin1 NOT NULL,
  `mail` varchar(100) CHARACTER SET latin1 NOT NULL,
  `adres` varchar(255) CHARACTER SET latin1 NOT NULL,
  `komiteid` int(11) NOT NULL,
  `fakulte` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bolum` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sinif` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `aciklama` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`id`, `ad`, `soyad`, `telefon`, `mail`, `adres`, `komiteid`, `fakulte`, `bolum`, `sinif`, `aciklama`) VALUES
(1, 'Fahri', 'Orhun', '555 444 33 22', 'fahri@orhun.net', 'Türkiye', 1, 'Mühendislik Fakültesi', 'Bilgisayar Mühendisliği', '3', 'Başarılı bir üye');

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `v_uye`
--
CREATE TABLE `v_uye` (
`id` int(11)
,`ad` varchar(50)
,`soyad` varchar(50)
,`telefon` varchar(30)
,`mail` varchar(100)
,`adres` varchar(255)
,`komite` varchar(50)
,`komiteid` int(11)
,`fakulte` varchar(50)
,`bolum` varchar(50)
,`sinif` varchar(30)
,`aciklama` text
,`puan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Görünüm yapısı `v_uye`
--
DROP TABLE IF EXISTS `v_uye`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_uye`  AS  select `uye`.`id` AS `id`,`uye`.`ad` AS `ad`,`uye`.`soyad` AS `soyad`,`uye`.`telefon` AS `telefon`,`uye`.`mail` AS `mail`,`uye`.`adres` AS `adres`,`komite`.`ad` AS `komite`,`komite`.`id` AS `komiteid`,`uye`.`fakulte` AS `fakulte`,`uye`.`bolum` AS `bolum`,`uye`.`sinif` AS `sinif`,`uye`.`aciklama` AS `aciklama`,ifnull(sum(`puan`.`puan`),0) AS `puan` from ((`uye` left join `komite` on((`komite`.`id` = `uye`.`komiteid`))) left join `puan` on((`puan`.`uyeid` = `uye`.`id`))) group by `uye`.`id` ;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `gorev`
--
ALTER TABLE `gorev`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `komite`
--
ALTER TABLE `komite`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `puan`
--
ALTER TABLE `puan`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uye`
--
ALTER TABLE `uye`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `gorev`
--
ALTER TABLE `gorev`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `komite`
--
ALTER TABLE `komite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `puan`
--
ALTER TABLE `puan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `uye`
--
ALTER TABLE `uye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
