-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 03. Jan 2024 um 16:26
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
-- Tabellenstruktur für Tabelle `discount`
--

CREATE TABLE `discount` (
  `discountID` int(11) NOT NULL,
  `discountCode` varchar(255) NOT NULL,
  `discountInPercent` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `discount`
--

INSERT INTO `discount` (`discountID`, `discountCode`, `discountInPercent`) VALUES
(3, 'FSI15', 15.00),
(4, 'QUENTIN20', 20.00);

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
(114, 49, 2),
(117, 49, 3);

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
(112, '2024-01-03 10:49:44', 10, 49, 7, 46),
(113, '2024-01-03 10:49:44', 3, 49, 2, 46);

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
(1, 'FSI Beanie (schwarz)', 19.99, 'default', 'Regular', 'FSI_beanie', 'Stilvoller Logo-Beanie', 95, 'Unsere schwarze Logo-Beanie vereint Stil und Komfort. Die hochwertige Stickerei verleiht dem Beanie einen einzigartigen Touch.', 'Hochwertige Stickerei; Bequemer Sitz; Wärmendes Material; Zeitloses Design'),
(2, 'FSI Coffee-to-go Becher', 12.99, 'default', NULL, 'FSI-Coffee-to-go', 'Stylischer Logo-Kaffeebecher', 21, 'Genießen Sie Ihren Kaffee unterwegs mit unserem Logo Coffee-to-go Becher.', 'Hochwertiges Material; Auslaufsicherer Deckel; Stylisches Design; Nachhaltig/Umweltfreundlich'),
(3, 'FSI Fahne (schwarz)', 24.99, 'default', NULL, 'FSI-Fahne', 'Strapazierfähige Logo-Fahne', 40, 'Zeigen Sie Flagge mit unserer schwarzen Logo-Fahne! Ein Must-have für alle, die Flagge zeigen wollen.', 'Strapazierfähiges Material; Lebendige Farben; Leicht zu befestigen; Vielseitig einsetzbar'),
(4, 'FSI Umhängetasche', 29.99, 'default', NULL, 'FSI-Tasche', ' Geräumige Logo-Umhängetasche', 117, 'Unsere Logo Baumwoll-Umhängetasche ist der ideale Begleiter für den Alltag.', 'Geräumiges Hauptfach; Lange Schulterbändern; Robuste Baumwolle; Großes aufgedrucktes Logo'),
(5, 'FSI Tasse', 14.99, 'default', NULL, 'tasse_fsi', 'Elegante Logo-Tasse', 300, 'Genießen Sie Ihre Lieblingsgetränke in unserer Logo Tasse!', 'Hochwertige Keramik; Spülmaschinenfest; Elegantes Design; Perfekt für Heißgetränke'),
(6, 'FSI Hoodie (unisex)', 39.99, 'S;M;L;XL', 'Regular', 'Hoody_back_fsi', 'Bequemer Logo-Hoodie', 60, 'Unser schwarzer Logo Unisex Hoodie bietet höchsten Tragekomfort dank des weichen Stoffs und des bequemen Schnitts.', 'Weicher Stoff; Bequemer Schnitt; Logo auf dem Rücken; Vielseitig kombinierbar'),
(7, 'INFormatiger Kapuzenpullover (women)', 59.99, 'S;M;L;XL', 'Oversize fit', 'hoody_front_women_fsi-tiger', 'Stylischer Women-Hoody', 20, 'Unser Heavy-Kapuzenpullover für Frauen in Schwarz mit Iconic INFormatiger auf der Brust überzeugt durch seinen taillierten Schnitt und die hohe Materialqualität.', 'Taillierter Schnitt; Hohe Materialqualität; Iconic INFormatiger Design; Komfortabler Tragekomfort'),
(8, 'INFormatiger Kapuzenpullover (men)', 59.99, 'S;M;L', 'Oversize fit', 'hoody_front_men_fsi-tiger', 'Stylischer Men-Hoody', 45, 'Unser Heavy-Kapuzenpullover für Männer in Schwarz mit Iconic INFormatiger auf der Brust verleiht dem Hoody einen lässigen Style und macht ihn zum absoluten Blickfang.', 'Moderner Schnitt; Strapazierfähiges Material; Iconic INFormatiger Design; Lässiger Style'),
(9, 'INFormatiger Umhängetasche', 29.99, 'default', NULL, 'Tiger-Tasche', 'Praktische INFormatige Tasche', 80, 'Unsere INFormatige Baumwoll-Umhängetasche überzeugt nicht durch lange Schulterbändern. Hergestellt aus robuster Baumwolle ist sie der ideale Begleiter für den Alltag.', 'Praktisches Format; Lange Schulterbändern; Robuste Baumwolle; Großes INFormatiger Design');

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
(154, 3, 49, 2),
(155, 1, 49, 6),
(156, 3, 49, 8),
(157, 3, 49, 8),
(158, 3, 49, 5);

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
(46, '2024-01-03 10:49:44', 49, '7709564660', 'Linsenhoferstraße 49, 82392 Beuren', 'PayPal');

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
  `is_logged_in` tinyint(1) DEFAULT NULL,
  `resetCode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userID`, `email`, `passwort`, `firstName`, `lastName`, `lastLogin`, `screenResolution`, `os`, `twoFASecret`, `use2FA`, `isFirstLogin`, `createdAt`, `is_logged_in`, `resetCode`) VALUES
(30, 'Madeleine.buck@online.de', '01e872f647c44fb41465904d88770786f66920ffbc405a29a03e13e66df0e8cf', 'Madeleine', 'Buck', '2023-12-16 07:46:52', 'unknown', 'unknown', '3JB3FMXUVCOGTLKD', 1, 1, '2023-12-16 07:46:52', 1, NULL),
(31, 'buck.lukas@icloud.com', '46b47fb88e9bfb31db08a3587a3e89b40ba14b5c1f644270593a987b70f9eda5', 'Madeleine', 'Buck', '2023-12-16 13:35:04', 'unknown', 'unknown', 'AIDWOP4Z2UGAR36Y', 0, 1, '2023-12-16 13:35:04', 1, NULL),
(49, 'lukas.buck@e-mail.de', 'd72ac459599db16af557a18f0164214b6a9f267c04f88818bf55446ef4fc631a52e9ec76ff04c5ea36d32480a90fd351c69963f4e269774a1de1e2a31e03ed61', 'Lukas', 'Buck', '2024-01-03 15:01:59', '2560x1440', 'MacOS', 'PG5EWNB3FU4XQC6C', 1, 0, '2024-01-03 10:13:31', 1, '744712');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discountID`),
  ADD UNIQUE KEY `discountCode` (`discountCode`);

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
-- AUTO_INCREMENT für Tabelle `discount`
--
ALTER TABLE `discount`
  MODIFY `discountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favoritesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT für Tabelle `history`
--
ALTER TABLE `history`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `shoppingCart`
--
ALTER TABLE `shoppingCart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT für Tabelle `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
