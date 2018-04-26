-- --------------------------------------------------------
-- Host:                         192.168.0.101
-- Wersja serwera:               10.1.30-MariaDB - mariadb.org binary distribution
-- Serwer OS:                    Win32
-- HeidiSQL Wersja:              9.5.0.5261
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Zrzut struktury bazy danych ycckatowice_shop
CREATE DATABASE IF NOT EXISTS `ycckatowice_shop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ycckatowice_shop`;

-- Zrzut struktury tabela ycckatowice_shop.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Zrzucanie danych dla tabeli ycckatowice_shop.category: ~9 rows (około)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`) VALUES
	(3, 'Dom i ogród'),
	(4, 'Supermarket'),
	(5, 'Dziecko'),
	(7, 'Kultura'),
	(8, 'Sport i wypoczynek'),
	(9, 'Motoryzacja'),
	(12, 'English from book'),
	(13, 'Twoje słówka angielskie'),
	(17, 'Hack!'),
	(18, 'ee'),
	(19, 'qqq');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Zrzut struktury tabela ycckatowice_shop.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_city` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli ycckatowice_shop.order: ~0 rows (około)
DELETE FROM `order`;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` (`id`, `product_id`, `user_id`, `user_city`) VALUES
	(1, 15, 2, NULL);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Zrzut struktury tabela ycckatowice_shop.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `category_id` int(11) DEFAULT NULL,
  `cost` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4;

-- Zrzucanie danych dla tabeli ycckatowice_shop.product: ~77 rows (około)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `category_id`, `cost`) VALUES
	(3, 'PS4 KONSOLA PRO 1TB BIAŁA ', 1, 1599),
	(4, 'XD323333', 5, 12433333),
	(7, 'BUTY SALOMON ELIOS 2 M 391872 r.43', 23, 374),
	(8, 'Apaszka opaska bandana w grochy do włosów ', 2, 5.84),
	(10, 'Drabina stalowa podrest Baulich 125kg 2 stopnie', 3, 29),
	(11, 'Komplet pościeli Sentenza 160x200cm Dwustronna 105', 3, 29.99),
	(12, 'Koc narzuta mikrofibra Maddox 150x200cm różowy', 3, 29.99),
	(13, 'Kinkiet ogrodowy Lampa SANICO BRETANIA LED INOX', 3, 50),
	(14, 'Glebogryzarka X-GT65-2 ZS Agregat tylny 2Bieg Hort', 3, 2149),
	(16, 'Przysmak dla kota Dreamies z pysznym serem 5 sztuk', 4, 25),
	(17, 'OPŁATEK TORT ZESTAW PSI PATROL GRATIS GRUBY', 4, 25),
	(18, 'GURMAR Gymnema sylvestre 100G SunLife', 4, 19.99),
	(19, 'BIHELDON - tabletki na odrobaczanie PIES KOT 10szt', 4, 28),
	(20, 'Mop płaski Vileda UltraMax BOX + WIADRO +WYCISKACZ', 4, 84.99),
	(21, 'Mop obrotowy VILEDA Easy Wring and Clean Turbo', 4, 109.99),
	(22, 'Lukier Plastyczny Masa Cukrowa w 25 kolorach 1 kg', 4, 17),
	(23, 'ORZECHY WŁOSKIE 1kg ŁUSKANE', 4, 37.44),
	(24, 'Yerba Mate CANARIAS 1kg ', 4, 34.5),
	(25, 'Dolce Gusto Nescafe Kapsułki Stojak DUŻY na 28 szt', 4, 28),
	(26, 'PAMPERS Pieluszki Premium Care 4 Maxi 104 + LENOR', 5, 99.99),
	(28, 'Wózek spacerowy spacerówka Kinderkraft PILOT lekki', 5, 489),
	(29, 'LEGO MINECRAFT Żelazny Golem 21123', 5, 89),
	(30, 'LEGO MINDSTORMS 31313 EV3 ', 5, 1338),
	(31, 'ROWER ROWEREK BIEGOWY LIONELO DAN KASK EVA HAMULEC', 5, 138),
	(32, 'HULAJNOGA SKŁADANA DUŻA LIONELO LUCA AMORTYZATOR', 5, 149),
	(33, 'Butla z helem 0,42 m3 na 50 szt. balonów + balony', 5, 123),
	(34, 'PIASEK DO PIASKOWNICY SUPER JASNY ATEST Dostawa', 5, 349),
	(35, 'SMOBY Zjeżdżalnia Funny 200cm Powłoka UV WODA NEW', 5, 399),
	(36, 'NOBLE HEALTH ACEROLA', 6, 29.99),
	(37, 'OLIMP THERM LINE PRO 30 tabl+30 kaps MOCNY SPALACZ', 6, 39.99),
	(38, 'LOREAL INFALLIBLE 24h Podkład 140 200 220 235 300', 6, 26.99),
	(39, 'SUNone Lampa UV LED 48W Hybrydy Żele', 6, 129.99),
	(40, 'INHALATOR NEBULIZATOR SANITAS SIH 21', 6, 29),
	(41, 'Wkłady do maszynki Gillette Mach3 Start 4 sztuki', 6, 49.99),
	(42, 'Maszynka do golenia Gillette Mach3 Start + 6 wkład', 6, 65.99),
	(43, 'Szczoteczka elektryczna Oral-B Pro790 2szt. zestaw', 6, 249.99),
	(44, 'Dieta warzywno-owocowa dr Ewy Dąbrowskiej', 7, 20.43),
	(45, 'Książka: Inteligencja kwiatów', 7, 24.43),
	(46, 'CIVILIZATION VI 6 | RISE AND FALL - DLC | Auto24/7', 7, 65),
	(47, 'GRAND THEFT AUTO V | GTA 5 | PC PL | Auto 24/7', 7, 75.4),
	(48, 'GEORGE R.R. MARTIN Pakiet 8 Części GRA O TRON', 7, 280),
	(49, 'Rower DIAMONDBACK SYNC 4.0 27.5 \'', 8, 1899),
	(50, 'DAMSKIE LEGGINSY SPORTOWE 4F H4Z17 SPDF003 M', 8, 89),
	(51, 'ZESTAW HANTLI 2x20,5kg + 2 ŚCISKACZE HOP-SPORT *PA', 8, 137),
	(52, 'Zestaw TREX 47kg sztanga, obciążenia i gryfy *1U8', 8, 127),
	(53, 'SP51 Ściskacz dłoni rąk regulowany opór(10-40kg)', 8, 10.59),
	(54, 'DRĄŻEK DO PODCIĄGANIA ĆWICZEŃ ŚCIENNY EFEKT SPORT', 8, 104),
	(55, 'ZAPIĘCIE ROWEROWE STALOWY ŁAŃCUCH MOTOR 8x1000mm', 8, 45),
	(56, '1x opona 205/55R16 UNIROYAL RAINSPORT 3 91V 2018', 9, 149),
	(57, 'Opony Letnie 195/65R15 Continental ContiPremiumCon', 9, 204),
	(58, '4x opony Uniroyal 195/65R15 RainExpert 3 91H 2018', 9, 724),
	(59, '4x OPONY LETNIE 195/65R15 91H DĘBICA PRESTO HP', 9, 659),
	(60, 'MODEKA UPSWING KURTKA MOTOCYKL SKUTER LATO L', 9, 499),
	(61, 'SAKWA wałek Torba na motocykl Oxford T50 Aqua 50L', 9, 201),
	(62, 'FARBA CZARNA DO RENOWACJI SKÓR KIEROWNIC TAPICERKI', 9, 39.99),
	(63, 'SOFT99 Fusso Coat 12 Months - Dark Colour Wax Wosk', 9, 108.9),
	(64, 'Pierścienie tłokowe bmw e90 e87 e83 x3 1,6 1,8 2,0', 9, 99),
	(65, 'KAMAZ TARCZA SPRZĘGŁA NOWA LUBLIN', 9, 75),
	(66, 'ZDERZAK PRZEDNI FORD MONDEO MK5 FUSION 13-17r NOWY', 9, 250),
	(67, 'FIAT DUCATO FORD TRANSIT 2.2 JTD TDCI SILNIK 06-11', 9, 5999),
	(68, 'Kask integralny SMK TWISTER ATTACK MA243 - M', 9, 359),
	(69, 'CHUSTA Bandama komin TERMOAKTYWNA CZACHA czaszka', 9, 3.73),
	(70, 'Stojak Podnośnik Motocyklowy TYŁ', 9, 99),
	(71, 'Muszka czarna', 4, 17.5),
	(72, 'Muszka czarna', 4, 17.5),
	(73, 'Muszka czarna', 4, 17.5),
	(74, 'Muszka czarna', 4, 17.5),
	(75, 'Muszka czarna', 4, 17.5),
	(76, 'Muszka czarna', 4, 17.5),
	(77, 'Muszka czarna', 4, 17.5),
	(78, 'Muszka czarna', 4, 17.5),
	(90, 'mdmd', 3, 2342),
	(91, 'kartka1', 1, 21213),
	(92, 'English from book', 23, 1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Zrzut struktury tabela ycckatowice_shop.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text,
  `last_name` text,
  `email` text,
  `city` text,
  `role` int(11) DEFAULT NULL,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Zrzucanie danych dla tabeli ycckatowice_shop.user: ~2 rows (około)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `city`, `role`, `password`) VALUES
	(1, 'Mikołaj', 'Woźniak', 'mikolaj@inkubator.com', 'Katowice', 1, '$2y$10$Rn4JD8F.WqnSeR0PplJdPekIQA0XOqHWoagMHSDuIYUv63DXKVW8i'),
	(2, 'Oskar', NULL, 'oskar@inkubator.com', 'Bytom', 0, '$2y$10$r1fHZNwp8ivZuEWH9m5pnOGIH5IRbqJfNypvnnwuZh/zmtm/K3SJS');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
