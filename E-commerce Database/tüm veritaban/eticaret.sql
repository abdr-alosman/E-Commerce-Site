-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Haz 2019, 17:37:57
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
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'abdo248735@gmail.com', '1234'),
(3, 'ahmedgh96@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Dell'),
(3, 'LG'),
(4, 'Samsung'),
(5, 'Lenovo'),
(6, 'Appel'),
(7, 'Canon'),
(8, 'Sony'),
(9, 'Vestel');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(21, '::1', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(3, 'Mobiles'),
(4, 'Computers'),
(5, 'IPads'),
(6, 'IPhones'),
(7, 'Laptop'),
(8, 'Cameras'),
(9, 'Tv');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`) VALUES
(1, '::1', 'Abdulrahman Alothman', 'abdo248735@gmail.com', '1234', 'Turkey', 'Ankara', '5374245882', 'KÄ±rÄ±kkale Ã¼ni', '23132082_1978526955750760_3385184455741343537_n.jpg'),
(5, '::1', 'Ahmed Ghanum', 'ahmedgh96@gmail.com', '1234', 'TR', 'kÄ±rÄ±kkale', '5316202577', 'istanbul - baÅŸakÅŸehir', ''),
(6, '::1', 'Abdulrahman Alothman', 'abdo248735@gmail.com', '1234', 'TH', 'Ankara', '5374245882', 'anlkaÄ±ujsabbas', ''),
(7, '::1', 'Ahmed Ghanum', 'abdokkkk@gmail.com', '1234', 'TJ', 'HATAY', '5374245882', 'TÃœRKIYE_HATAY_REYHANLI_BÄžLAR_MAH_NO:31', '');

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
(14, 3, 4, 'Samsung J7 prime', 1500, '<p>Telphone samsung</p>', 'samsung-galaxy-j7-prime-2017.jpg', 'samsung j7 prime', 1900, 1),
(15, 6, 6, 'Ä°phone X', 4000, '<p>i phone x</p>', '8799440764978_1557380539756.jpg', 'iphone x phone', 3900, 1),
(17, 7, 2, 'Dell laptop', 3500, '<p>Dell laptop</p>', 'dell-laptop-battery-problem.jpg', 'dell laptop', 0, 0),
(18, 2, 8, 'Sony Camera', 9001, '<p>tv camera</p>', 'professional-video-camera.jpg', 'camera canon  tv', 0, 0),
(19, 7, 6, 'apple laptop', 9500, '<p>appel laptop g&uuml;zel laptop 16GB hard 1 tera</p>', 'apple_macbookproretina_15_g10.jpg', 'laptop new apple', 0, 0),
(20, 4, 8, 'MasaÃ¼stÃ¼ Bilgisayar', 5000, '<h1 class=\"proName\" style=\"margin: 3px 0px 1px; padding: 0px; border: 0px; font-size: 22px; position: relative; font-weight: 400; max-height: 55px; overflow: hidden; color: #202020; font-family: Arial, Helvetica, sans-serif;\">Intel i7 8GB Ram 2TB Hdd 4GB Ekran KartÄ± Masa&uuml;st&uuml; Bilgisayar</h1>', 'gamepower-hypnos-gaming-3120mm-kirmizi-ring-fanli-tempered-glass-yan-panel-mid-atx-kasa-gamemar-1.jpg', 'MasaÃ¼stÃ¼ Bilgisayar Intel i7 ', 0, 0),
(21, 4, 4, 'MasaÃ¼stÃ¼ Bilgisayar', 3000, '<h1 class=\"proName\" style=\"margin: 3px 0px 1px; padding: 0px; border: 0px; font-size: 22px; position: relative; font-weight: 400; max-height: 55px; overflow: hidden; color: #202020; font-family: Arial, Helvetica, sans-serif;\">Intel i5 16GB Ram 2TB Hdd 4GB Ekran KartÄ± Masa&uuml;st&uuml; Bilgisayar</h1>\r\n<p>&nbsp;</p>', 'power-boost-x-53-usb-3-0-temperli-cam-rgb-ledli-gaming-pc-kasa-1.jpg', 'MasaÃ¼stÃ¼ Bilgisayar Intel i5', 0, 0),
(22, 9, 9, 'vestel Tv', 5000, '<p>aesfeeawffe</p>', 'Vestel Smart 49FD7400 49 123 Ekran Full HD LED TV.png', 'tv vestel', 0, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
