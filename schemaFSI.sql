-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 12. Dez 2023 um 14:02
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webShopFSI`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `fit` varchar(50) DEFAULT NULL,
  `pathName` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`productID`, `productName`, `price`, `size`, `fit`, `pathName`, `description`) VALUES
(1, 'Product1', 19.99, 'M', 'Regular', 'FSI_beanie', 'Description for Product1'),
(2, 'Product2', 29.99, 'L', 'Slim Fit', 'FSI-Coffee-to-go', 'Description for Product2'),
(3, 'Product3', 39.99, 'S', 'Loose Fit', 'FSI-Fahne', 'Description for Product3'),
(4, 'Product4', 49.99, 'XL', 'Regular', 'FSI-Tasche', 'Description for Product4'),
(5, 'Product5', 59.99, 'M', 'Slim Fit', 'tasse_fsi', 'Description for Product5'),
(6, 'Product6', 69.99, 'L', 'Loose Fit', 'Hoody_back_fsi', 'Description for Product6'),
(7, 'Product7', 79.99, 'S', 'Regular', 'hoody_front_women_fsi-tiger', 'Description for Product7'),
(8, 'Product8', 89.99, 'XL', 'Slim Fit', 'hoody_front_men_fsi-tiger', 'Description for Product8'),
(9, 'Product9', 99.99, 'M', 'Loose Fit', 'Tiger-Tasche', 'Description for Product9');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
