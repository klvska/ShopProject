-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Mar 2023, 22:42
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `anabolicfactory`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `items`
--

CREATE TABLE `items` (
  `item_id` bigint(20) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_url` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_old_price` varchar(255) NOT NULL,
  `item_alt` varchar(255) NOT NULL,
  `item_category` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_url`, `item_price`, `item_old_price`, `item_alt`, `item_category`) VALUES
(1, 'KFD Premium WPC 82 o smaku karmelowego - mleczka 700g', './img/whey/wpc-82.png', '79.99zł', '89.99zł\r\n', 'Białko KFD Premium WPC 82 różne smaki', 'promos'),
(2, 'KFD Monohydrat Kreatyny o smaku Marihuaen 500g', './img/creatine/420.jpg', '69.99zł', '79.99zł', 'Kreatyna KFD Monohydrat o smaku Maruhuaen', 'promos'),
(3, 'WK DZIK Bomba przedtreningówka o smaku coli 150g', './img/others/bomba.jpg', '49.99zł', '59.99zł', 'WK DZIK w pani domu jest bomba', 'promos'),
(4, 'Heisenberg przedtreningówka z DMAA 200g', './img/others/heisenberg.jpg', '129.99zł', '149.99zł\r\n', 'Włodzimierz Biały bombowy preworkout z dmaa', 'promos'),
(5, 'KFD Clear Whey 90 sex on the beach 420g', './img/whey/clear-whey.jpg', '79.99zł', '', 'Białko KFD Clear Whey 90 sex-on the beach', 'newests'),
(6, 'RL9 Krem Orzechowo - Czekoladowy 200g', './img/others/rl9.jpg', '69.99zł', '', 'Krem orzechowo - czekoladowy RL9', 'newests'),
(7, 'KFD Koenzym Q10 - 100 Kaps.', './img/others/coenzyme.jpg', '49.99zł', '', 'KFD Koenzym', 'newests'),
(8, 'KFD Dżemik z czerwonych owoców 1000g', './img/others/dzemik.jpg', '129.99zł', '', 'KFD Dżemik z czerwonych owoców', 'newests'),
(9, 'KFD Premium WPC 80 różne smaki 750g', './img/whey/wpc-80.jpg', '63.99zł', '', 'Białko KFD Premium WPC 80 różne smaki', 'whey'),
(10, 'KFD PREMIUM WPI 90 różne smaki 700g', './img/whey/wpi-90.jpg', '89.99zł', '', 'Białko KFD Premium WPI 90 różne smaki', 'whey'),
(11, 'Olimp Protein Complex 100% różne smaki 700g', './img/whey/olimp-whey.jpg', '95.99zł', '', 'Białko Olimp Protein Complex 100% różne smaki', 'whey'),
(12, 'WK DZIK Dobre Whey PREMIUM różne smaki 900g', './img/whey/dobre-whey.jpg', '99.99zł', '', 'Białko WK DZIK różne smaki', 'whey'),
(13, 'KFD Premium Creatine różne smaki 500g', './img/creatine/creatine500.jpg', '79.99zł', '', 'KFD Premium Creatine różne smaki 500g', 'creatine'),
(14, 'KFD Premium Creatine różne smaki 250g', './img/creatine/creatine250.jpg', '59.99zł', '', 'KFD Premium Creatine różne smaki 250g', 'creatine'),
(15, 'Olimp kre alkalyn 2500 mega caps 120 kaps', './img/creatine/kre-alakyn.jpg', '159.99zł', '', 'Kreatyna kre-alakyn Monohydrat', 'creatine'),
(16, 'WK DZIK Monohydrat kreatyny 225g', './img/creatine/wk-kreatyna.jpg', '59.99zł', '', 'WK DZIK Monohydrat kreatyny', 'creatine'),
(17, 'KFD Suplement diety Magnesium+ 160 Kaps.', './img/others/magnez.jpg', '18.99zł', '', 'KFD Magnesium', 'others'),
(18, 'KFD Krem orzechowy z arachidów 100% 1000g', './img/others/mrmasel.jpg', '23.99zł', '', 'KFD MrMasel', 'others'),
(19, 'KFD Przyprawa do mięs 180g', './img/others/przyprawa.jpg', '8.99zł', '', 'KFD przyprawa do mies', 'others'),
(20, 'KFD erytrytol zamiennik cukru 1000g', './img/others/erytrytol.jpg', '24.99zł', '', 'KFD Erytrytol', 'others'),
(21, 'Sos KFD', './img/others/sos.jpg', '11.90zł', '', 'Sos KFD o smaku truskawkowym', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `user_nickname` varchar(25) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_passwordhash` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `user_nickname`, `user_email`, `user_passwordhash`, `is_admin`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$AzsxLXnM3uVYnax2544eyO1MHvRaX7qGWv4xjFLX8ERlml7bjjW7.', 1),
(2, 'klvsk4', 'test@test.com', '$2y$10$KiOv6eFVbCws9PMWBZPRdOajFxpuQ.VWp4cv4YBPlCX5fvv9yyrBK', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `items`
--
ALTER TABLE `items`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
