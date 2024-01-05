-- Hallo Herr Gutbrod
-- Führen Sie bitte folgende Schritte aus, um die Datenbank für das Proejtkl aufzusetzen:
--    1. Datenbank mit dem Namen webShopFSI erstellen
--    2. Alles aus dieser Datei kopieren und in der SQL query einfügen und auführen

-- Anermkung -> Es werden direkt 2 weitere Test-Benutzer ertstellt, dass die Flag "Aktuelle Anzahl der online Nutzer" aussagekräftiger ist.
-- LG und viel Spaß mit dem WebShop

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `discount` (
  `discountID` int(11) NOT NULL,
  `discountCode` varchar(255) NOT NULL,
  `discountInPercent` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `discount` (`discountID`, `discountCode`, `discountInPercent`) VALUES
(3, 'FSI15', 15.00),
(4, 'QUENTIN20', 20.00),
(5, 'FELIX25', 25.00);


CREATE TABLE `favorites` (
  `favoritesID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `history` (
  `historyID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `transactionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `history` (`historyID`, `timestamp`, `amount`, `userID`, `productID`, `transactionID`) VALUES
(115, '2024-01-05 18:43:01', 3, 53, 2, 48);



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


INSERT INTO `products` (`productID`, `productName`, `price`, `size`, `fit`, `pathName`, `description`, `stock`, `detailedDescription`, `descriptionPoints`) VALUES
(1, 'FSI Beanie (schwarz)', 19.99, 'default', 'Regular', 'FSI_beanie', 'Stilvoller Logo-Beanie', 95, 'Unsere schwarze Logo-Beanie vereint Stil und Komfort. Die hochwertige Stickerei verleiht dem Beanie einen einzigartigen Touch.', 'Hochwertige Stickerei; Bequemer Sitz; Wärmendes Material; Zeitloses Design'),
(2, 'FSI Coffee-to-go Becher', 12.99, 'default', NULL, 'FSI-Coffee-to-go', 'Stylischer Logo-Kaffeebecher', 15, 'Genießen Sie Ihren Kaffee unterwegs mit unserem Logo Coffee-to-go Becher.', 'Hochwertiges Material; Auslaufsicherer Deckel; Stylisches Design; Nachhaltig/Umweltfreundlich'),
(3, 'FSI Fahne (schwarz)', 24.99, 'default', NULL, 'FSI-Fahne', 'Strapazierfähige Logo-Fahne', 40, 'Zeigen Sie Flagge mit unserer schwarzen Logo-Fahne! Ein Must-have für alle, die Flagge zeigen wollen.', 'Strapazierfähiges Material; Lebendige Farben; Leicht zu befestigen; Vielseitig einsetzbar'),
(4, 'FSI Umhängetasche', 29.99, 'default', NULL, 'FSI-Tasche', ' Geräumige Logo-Umhängetasche', 117, 'Unsere Logo Baumwoll-Umhängetasche ist der ideale Begleiter für den Alltag.', 'Geräumiges Hauptfach; Lange Schulterbändern; Robuste Baumwolle; Großes aufgedrucktes Logo'),
(5, 'FSI Tasse', 14.99, 'default', NULL, 'tasse_fsi', 'Elegante Logo-Tasse', 300, 'Genießen Sie Ihre Lieblingsgetränke in unserer Logo Tasse!', 'Hochwertige Keramik; Spülmaschinenfest; Elegantes Design; Perfekt für Heißgetränke'),
(6, 'FSI Hoodie (unisex)', 39.99, 'S;M;L;XL', 'Regular', 'Hoody_back_fsi', 'Bequemer Logo-Hoodie', 60, 'Unser schwarzer Logo Unisex Hoodie bietet höchsten Tragekomfort dank des weichen Stoffs und des bequemen Schnitts.', 'Weicher Stoff; Bequemer Schnitt; Logo auf dem Rücken; Vielseitig kombinierbar'),
(7, 'INFormatiger Kapuzenpullover (women)', 59.99, 'S;M;L;XL', 'Oversize fit', 'hoody_front_women_fsi-tiger', 'Stylischer Women-Hoody', 20, 'Unser Heavy-Kapuzenpullover für Frauen in Schwarz mit Iconic INFormatiger auf der Brust überzeugt durch seinen taillierten Schnitt und die hohe Materialqualität.', 'Taillierter Schnitt; Hohe Materialqualität; Iconic INFormatiger Design; Komfortabler Tragekomfort'),
(8, 'INFormatiger Kapuzenpullover (men)', 59.99, 'S;M;L', 'Oversize fit', 'hoody_front_men_fsi-tiger', 'Stylischer Men-Hoody', 45, 'Unser Heavy-Kapuzenpullover für Männer in Schwarz mit Iconic INFormatiger auf der Brust verleiht dem Hoody einen lässigen Style und macht ihn zum absoluten Blickfang.', 'Moderner Schnitt; Strapazierfähiges Material; Iconic INFormatiger Design; Lässiger Style'),
(9, 'INFormatiger Umhängetasche', 29.99, 'default', NULL, 'Tiger-Tasche', 'Praktische INFormatige Tasche', 80, 'Unsere INFormatige Baumwoll-Umhängetasche überzeugt nicht durch lange Schulterbändern. Hergestellt aus robuster Baumwolle ist sie der ideale Begleiter für den Alltag.', 'Praktisches Format; Lange Schulterbändern; Robuste Baumwolle; Großes INFormatiger Design');



CREATE TABLE `shoppingCart` (
  `cartID` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `transactions` (
  `transactionID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `userID` int(11) DEFAULT NULL,
  `orderNumber` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `paymentMethod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `transactions` (`transactionID`, `timestamp`, `userID`, `orderNumber`, `adress`, `paymentMethod`) VALUES
(48, '2024-01-05 18:43:01', 53, '1190544566', 'Linsenhoferstraße 49, 82392 Beuren', 'PayPal');



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



INSERT INTO `users` (`userID`, `email`, `passwort`, `firstName`, `lastName`, `lastLogin`, `screenResolution`, `os`, `twoFASecret`, `use2FA`, `isFirstLogin`, `createdAt`, `is_logged_in`, `resetCode`) VALUES
(53, 'test123@example.com', '3f4d435f60b7d5eefa6212f80e7280d19fcf7499a555ddf2ae32431b559149e7aa72093cd94705b5be972ed93405cdf92db69087c66c71f2fed6c4166964a0cd', 'Test', 'test', '2024-01-05 18:42:35', '2560x1440', 'MacOS', '2RE7AGD6JHXAZ7BU', 0, 1, '2024-01-05 18:42:35', 1, NULL),
(54, 'test@example.com', 'fc7c7a1fd0476261159c8f5bc9c7431512dafb6077807e20d0c0b7c8888e2fc2b4145ff0ee5e2aa792bf1f129c5000d3fe66aee198e93104a21ccf3f87e2d1f3', 'test', 'test', '2024-01-05 18:43:50', '2560x1440', 'MacOS', 'N5TJNPRJBLRPYQS2', 0, 1, '2024-01-05 18:43:50', 0, NULL);

ALTER TABLE `discount`
  ADD PRIMARY KEY (`discountID`),
  ADD UNIQUE KEY `discountCode` (`discountCode`);


ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favoritesID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`);

ALTER TABLE `history`
  ADD PRIMARY KEY (`historyID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `transactionID` (`transactionID`);


ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);


ALTER TABLE `shoppingCart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`);


ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionID`),
  ADD KEY `fk_user` (`userID`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);


ALTER TABLE `discount`
  MODIFY `discountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `favorites`
  MODIFY `favoritesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;


ALTER TABLE `history`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;


ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `shoppingCart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;


ALTER TABLE `transactions`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;


ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;


ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);


ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`),
  ADD CONSTRAINT `history_ibfk_3` FOREIGN KEY (`transactionID`) REFERENCES `transactions` (`transactionID`);


ALTER TABLE `shoppingCart`
  ADD CONSTRAINT `shoppingcart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `shoppingcart_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);


ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;


