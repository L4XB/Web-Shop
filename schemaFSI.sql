-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 14. Dez 2023 um 11:37
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
(79, 19, 2),
(82, 19, 1),
(83, 19, 3),
(84, 19, 5),
(98, 19, 9),
(99, 20, 2);

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

--
-- Daten für Tabelle `shoppingCart`
--

INSERT INTO `shoppingCart` (`cartID`, `amount`, `userID`, `productID`) VALUES
(18, 3, 19, 2),
(19, 7, 19, 5),
(20, 10, 19, 7),
(21, 4, 20, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `transactions`
--

CREATE TABLE `transactions` (
  `transactionID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(19, 'Madeleine.buck@online.de', '6d21b366238e644c392b8c8c37fb37f48279f31f5dc8911fbd4af1fd97cd43fd', 'Madeleine', 'Buck', '2023-12-14 05:31:23', 'unknown', 'unknown', '7II545CLE7CMXAFI', 0, 1, '2023-12-14 05:31:23'),
(20, 'buck.lukas@icloud.com', '5fcc724749296d0a0398482ba32ddac7120209ea5ae78248a916c0e272b4b7cb', 'Madeleine', 'Buck', '2023-12-14 07:12:50', 'unknown', 'unknown', '233SVSAA4E55QTKB', 0, 1, '2023-12-14 07:12:50'),
(21, 'lukas.buck@e-mail.de', '50b0112b8496beed2d9eb1e6349e3c16702fc5f5121627da55742c07cf427514', 'Madeleine', 'Buck', '2023-12-14 07:35:17', 'unknown', 'unknown', 'J47VSZY5S4N5AAAT', 0, 1, '2023-12-14 07:35:17'),
(22, 'buck.lukas@icloud.com', 'cf93b2073db715b0d130ec8baca419d6a081ffd1b26886bf00bab5ec2c9fada1', 'Madeleine', 'Buck', '2023-12-14 07:40:56', 'unknown', 'unknown', '6SFIVAKUKYGUZZ2S', 0, 1, '2023-12-14 07:40:56');

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
  ADD PRIMARY KEY (`transactionID`);

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
  MODIFY `favoritesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT für Tabelle `history`
--
ALTER TABLE `history`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `shoppingCart`
--
ALTER TABLE `shoppingCart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT für Tabelle `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
