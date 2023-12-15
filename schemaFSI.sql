-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 15. Dez 2023 um 18:57
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
(101, 29, 5),
(102, 29, 6);

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
(2, '2023-12-15 16:46:18', 5, 29, 2, 3),
(3, '2023-12-15 16:47:52', 5, 29, 1, 4),
(4, '2023-12-15 16:47:52', 4, 29, 3, 4),
(6, '2023-12-15 17:45:32', 6, 29, 2, 5),
(7, '2023-12-15 17:45:32', 3, 29, 5, 5),
(8, '2023-12-15 17:45:32', 6, 29, 2, 5),
(9, '2023-12-15 17:45:32', 10, 29, 6, 5),
(13, '2023-12-15 17:56:06', 4, 29, 2, 6);

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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `transactions`
--

CREATE TABLE `transactions` (
  `transactionID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `userID` int(11) DEFAULT NULL,
  `orderNumber` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `transactions`
--

INSERT INTO `transactions` (`transactionID`, `timestamp`, `userID`, `orderNumber`) VALUES
(3, '2023-12-15 16:46:18', NULL, NULL),
(4, '2023-12-15 16:47:52', NULL, NULL),
(5, '2023-12-15 17:45:32', NULL, NULL),
(6, '2023-12-15 17:56:06', 29, '6742866098');

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
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userID`, `email`, `passwort`, `firstName`, `lastName`, `lastLogin`, `screenResolution`, `os`, `twoFASecret`, `use2FA`, `isFirstLogin`, `createdAt`) VALUES
(29, 'lukas.buck@e-mail.de', 'db0dc72dc8aee68904ab238cbb61d03d2baf35b4892d63251d3c2d6e1afe5dee', 'Madeleine', 'Buck', '2023-12-15 16:44:56', 'unknown', 'unknown', 'OQQCUBCHOGLOA42N', 0, 1, '2023-12-15 16:44:56');

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
  MODIFY `favoritesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT für Tabelle `history`
--
ALTER TABLE `history`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `shoppingCart`
--
ALTER TABLE `shoppingCart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT für Tabelle `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
