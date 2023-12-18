-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 18. Dez 2023 um 12:56
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
-- Tabellenstruktur für Tabelle `favorites`
--

CREATE TABLE `favorites` (
  `favoritesID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `favorites`
--

INSERT INTO `favorites` (`favoritesID`, `userID`, `productID`) VALUES
(103, 30, 1),
(104, 31, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `history`
--

CREATE TABLE `history` (
  `historyID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `transactionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `history`
--

INSERT INTO `history` (`historyID`, `timestamp`, `amount`, `userID`, `productID`, `transactionID`) VALUES
(39, '2023-12-16 14:52:57', 11, 31, 2, 13),
(40, '2023-12-16 14:52:57', 4, 31, 7, 13),
(41, '2023-12-16 14:52:57', 5, 31, 4, 13),
(42, '2023-12-16 14:52:57', 1, 31, 7, 13),
(46, '2023-12-16 15:31:50', 4, 31, 2, 14),
(47, '2023-12-16 16:45:06', 5, 31, 1, 15),
(48, '2023-12-16 16:45:06', 5, 31, 7, 15),
(50, '2023-12-16 17:30:13', 5, 31, 2, 16),
(51, '2023-12-16 17:30:13', 10, 31, 7, 16);

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
  `description` text DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `detailedDescription` text DEFAULT NULL,
  `descriptionPoints` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`productID`, `productName`, `price`, `size`, `fit`, `pathName`, `description`, `stock`, `detailedDescription`, `descriptionPoints`) VALUES
(1, 'ProdÜct1', 19.99, 'default', 'Regular', 'FSI_beanie', 'Description for Product1', 100, 'Das ist eine detalierte Beschreibung des Produkts', 'Punkt 1;Punkt 2;Punkt 3;Punkt 4'),
(2, 'Product2', 29.99, 'default', 'Slim Fit', 'FSI-Coffee-to-go', 'Description for Product2', 30, NULL, NULL),
(3, 'Product3', 39.99, 'default', 'Loose Fit', 'FSI-Fahne', 'Description for Product3', 40, NULL, NULL),
(4, 'Product4', 49.99, 'default', 'Regular', 'FSI-Tasche', 'Description for Product4', 120, NULL, NULL),
(5, 'Product5', 59.99, 'default', 'Slim Fit', 'tasse_fsi', 'Description for Product5', 300, NULL, NULL),
(6, 'Product6', 69.99, 'S;M;L;XL', 'Loose Fit', 'Hoody_back_fsi', 'Description for Product6', 60, NULL, NULL),
(7, 'Product7', 79.99, 'S;M;L;XL', 'Regular', 'hoody_front_women_fsi-tiger', 'Description for Product7', 90, NULL, NULL),
(8, 'Product8', 89.99, 'S;M;L;XL', 'Slim Fit', 'hoody_front_men_fsi-tiger', 'Description for Product8', 10, NULL, NULL),
(9, 'Product9', 99.99, 'default', 'Loose Fit', 'Tiger-Tasche', 'Description for Product9', 50, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shoppingCart`
--

CREATE TABLE `shoppingCart` (
  `cartID` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `shoppingCart`
--

INSERT INTO `shoppingCart` (`cartID`, `amount`, `userID`, `productID`) VALUES
(51, 4, 30, 2),
(85, 5, 37, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `transactions`
--

CREATE TABLE `transactions` (
  `transactionID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `userID` int(11) DEFAULT NULL,
  `orderNumber` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `paymentMethod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `transactions`
--

INSERT INTO `transactions` (`transactionID`, `timestamp`, `userID`, `orderNumber`, `adress`, `paymentMethod`) VALUES
(13, '2023-12-16 14:52:57', 31, '5054059972', 'Linsenhoferstraße 49, 82392 Beuren', 'PayPal'),
(14, '2023-12-16 15:31:50', 31, '1381305391', 'Linsenhoferstraße 49, 82392 Beuren', 'PayPal'),
(15, '2023-12-16 16:45:06', 31, '1547254552', 'Linsenhoferstraße 49, 82392 Beuren', 'PayPal'),
(16, '2023-12-16 17:30:13', 31, '5156305669', 'Linsenhoferstraße 49, 82392 Beuren', 'PayPal');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwort` varchar(255) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `lastLogin` timestamp NOT NULL DEFAULT current_timestamp(),
  `screenResolution` varchar(20) DEFAULT NULL,
  `os` varchar(50) DEFAULT NULL,
  `twoFASecret` varchar(255) DEFAULT NULL,
  `use2FA` tinyint(1) DEFAULT NULL,
  `isFirstLogin` tinyint(1) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_logged_in` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userID`, `email`, `passwort`, `firstName`, `lastName`, `lastLogin`, `screenResolution`, `os`, `twoFASecret`, `use2FA`, `isFirstLogin`, `createdAt`, `is_logged_in`) VALUES
(30, 'Madeleine.buck@online.de', '01e872f647c44fb41465904d88770786f66920ffbc405a29a03e13e66df0e8cf', 'Madeleine', 'Buck', '2023-12-16 07:46:52', 'unknown', 'unknown', '3JB3FMXUVCOGTLKD', 1, 1, '2023-12-16 07:46:52', 1),
(31, 'buck.lukas@icloud.com', '46b47fb88e9bfb31db08a3587a3e89b40ba14b5c1f644270593a987b70f9eda5', 'Madeleine', 'Buck', '2023-12-16 13:35:04', 'unknown', 'unknown', 'AIDWOP4Z2UGAR36Y', 0, 1, '2023-12-16 13:35:04', 1),
(37, 'lukas.buck@e-mail.de', '90e47ddcd1835ae7b7f0f0c0391372be72660f0c91c3f2be39d8b783e4fc33057cc63c8ef1fb3d4014f1e25eb3848e3b3bf5c8dfc2318d3a8d28010b6c970f80', 'Madeleine', 'Buck', '2023-12-17 14:27:02', '2560x1440', 'Mac OS', 'FCXOGJ2YTM4E3SMH', 0, 1, '2023-12-17 14:27:02', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favoritesID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`);

--
-- Indizes für die Tabelle `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`historyID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `transactionID` (`transactionID`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indizes für die Tabelle `shoppingCart`
--
ALTER TABLE `shoppingCart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`);

--
-- Indizes für die Tabelle `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionID`),
  ADD KEY `fk_user` (`userID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favoritesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT für Tabelle `history`
--
ALTER TABLE `history`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `shoppingCart`
--
ALTER TABLE `shoppingCart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT für Tabelle `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints der Tabelle `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`),
  ADD CONSTRAINT `history_ibfk_3` FOREIGN KEY (`transactionID`) REFERENCES `transactions` (`transactionID`);

--
-- Constraints der Tabelle `shoppingCart`
--
ALTER TABLE `shoppingCart`
  ADD CONSTRAINT `shoppingcart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `shoppingcart_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints der Tabelle `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
