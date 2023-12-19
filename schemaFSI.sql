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
(1, 'FSI Beanie (schwarz)', 19.99, 'default', 'Regular', 'FSI_beanie', 'Stilvoller Logo-Beanie', 100, 'Unsere schwarze Logo-Beanie vereint Stil und Komfort. Die hochwertige Stickerei verleiht dem Beanie einen einzigartigen Touch.', 'Hochwertige Stickerei; Bequemer Sitz; Wärmendes Material; Zeitloses Design'),
(2, 'FSI Coffee-to-go Becher', 12.99, 'default', NULL, 'FSI-Coffee-to-go', 'Stylischer Logo-Kaffeebecher', 30, 'Genießen Sie Ihren Kaffee unterwegs mit unserem Logo Coffee-to-go Becher.', 'Hochwertiges Material; Auslaufsicherer Deckel; Stylisches Design; Nachhaltig/Umweltfreundlich'),
(3, 'FSI Fahne (schwarz)', 24.99, 'default', NULL, 'FSI-Fahne', 'Strapazierfähige Logo-Fahne', 40, 'Zeigen Sie Flagge mit unserer schwarzen Logo-Fahne! Ein Must-have für alle, die Flagge zeigen wollen.', 'Strapazierfähiges Material; Lebendige Farben; Leicht zu befestigen; Vielseitig einsetzbar'),
(4, 'FSI Umhängetasche', 29.99, 'default', NULL, 'FSI-Tasche', ' Geräumige Logo-Umhängetasche', 120, 'Unsere Logo Baumwoll-Umhängetasche ist der ideale Begleiter für den Alltag.', 'Geräumiges Hauptfach; Lange Schulterbändern; Robuste Baumwolle; Großes aufgedrucktes Logo'),
(5, 'FSI Tasse', 14.99, 'default', NULL, 'tasse_fsi', 'Elegante Logo-Tasse', 300, 'Genießen Sie Ihre Lieblingsgetränke in unserer Logo Tasse!', 'Hochwertige Keramik; Spülmaschinenfest; Elegantes Design; Perfekt für Heißgetränke'),
(6, 'FSI Hoodie (unisex)', 39.99, 'S;M;L;XL', 'Regular', 'Hoody_back_fsi', 'Bequemer Logo-Hoodie', 60, 'Unser schwarzer Logo Unisex Hoodie bietet höchsten Tragekomfort dank des weichen Stoffs und des bequemen Schnitts.', 'Weicher Stoff; Bequemer Schnitt; Logo auf dem Rücken; Vielseitig kombinierbar'),
(7, 'INFormatiger Kapuzenpullover (women)', 59.99, 'S;M;L;XL', 'Oversize fit', 'hoody_front_women_fsi-tiger', 'Stylischer Women-Hoody', 30, 'Unser Heavy-Kapuzenpullover für Frauen in Schwarz mit Iconic INFormatiger auf der Brust überzeugt durch seinen taillierten Schnitt und die hohe Materialqualität.', 'Taillierter Schnitt; Hohe Materialqualität; Iconic INFormatiger Design; Komfortabler Tragekomfort'),
(8, 'INFormatiger Kapuzenpullover (men)', 59.99, 'S;M;L;XL', 'Oversize fit', 'hoody_front_men_fsi-tiger', 'Stylischer Men-Hoody', 45, 'Unser Heavy-Kapuzenpullover für Männer in Schwarz mit Iconic INFormatiger auf der Brust verleiht dem Hoody einen lässigen Style und macht ihn zum absoluten Blickfang.', 'Moderner Schnitt; Strapazierfähiges Material; Iconic INFormatiger Design; Lässiger Style'),
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
