-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 May 2019, 18:47:14
-- Sunucu sürümü: 10.1.37-MariaDB
-- PHP Sürümü: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `yeni_fiyat` float NOT NULL,
  `indirim` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `yeni_fiyat`, `indirim`) VALUES
(11, 7, 1, 'HP Laptop', 5000, '<p>G&uuml;zel laptop</p>', 'c05961509.png', ' hp laptop new', 3500, 1),
(12, 2, 7, 'Canon Camera', 3500, '<p>Camera canon g&uuml;zel&nbsp;</p>', 'Canon-EOS-Rebel-T3i.jpg', 'camera canon ', 3000, 1),
(14, 3, 4, 'Samsung J7 prime', 1500, '<p>Telphone samsung</p>', 'samsung-galaxy-j7-prime-2017.jpg', 'samsung j7 prime', 1900, 1),
(15, 6, 6, 'Ä°phone X', 4000, '<p>i phone x</p>', '8799440764978_1557380539756.jpg', 'iphone x phone', 3900, 1),
(17, 7, 2, 'Dell laptop', 3500, '<p>Dell laptop</p>', 'dell-laptop-battery-problem.jpg', 'dell laptop', 0, 0),
(18, 2, 8, 'Sony Camera', 9001, '<p>tv camera</p>', 'professional-video-camera.jpg', 'camera canon  tv', 0, 0),
(19, 7, 6, 'apple laptop', 9500, '<p>appel laptop g&uuml;zel laptop 16GB hard 1 tera</p>', 'apple_macbookproretina_15_g10.jpg', 'laptop new apple', 0, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
