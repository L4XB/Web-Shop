-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 19. Nov 2023 um 15:31
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
-- Datenbank: `WebShop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `description`, `category`, `stock_quantity`, `created_at`, `product_image`) VALUES
(1, 'FSI Heavy Organic Cotton Hoody', 59.99, 'This is the Hoodie from INF', 'kloaths', 100, '2023-11-13 11:55:55', 'https://cdn.discordapp.com/attachments/1098331063064993906/1173646751207538769/image.png?ex=6564b6b6&is=655241b6&hm=3581f08b71f7690e76d34179e997a51fd0de828dd985d43e62559e84e2fbae11&'),
(2, 'FSI Heavy Organic Cotton Cup', 13.99, 'das ist quentin', 'quentin', 100, '2023-11-13 12:10:56', 'https://cdn.discordapp.com/attachments/1098331063064993906/1173654457578434691/image.png?ex=6564bde4&is=655248e4&hm=9e805a62d009e590cd43f99706dd63ca4063ea217ea32ccfecca3d6c494847b1&'),
(3, 'FSI Heavy Organic Cotton Bag', 19.99, 'felix gsdfsdf', 'food', 100, '2023-11-13 12:39:26', 'https://cdn.discordapp.com/attachments/1098331063064993906/1173654878103535726/image.png?ex=6564be48&is=65524948&hm=2213d7b329c7d765faef4fc96811b6efedf9b4bf662abe8fe926e3aa2c2ab36d&'),
(4, 'FSI Heavy Organic Cotton Bag', 19.99, 'juildahjulshuikdlak alds alks', 'food', 100, '2023-11-13 12:39:43', 'https://cdn.discordapp.com/attachments/1098331063064993906/1173655237257609297/image.png?ex=6564be9e&is=6552499e&hm=47d185bb9c7cb5fb86f9d1f9966bcfeb488b3ca34aa2f225e6639bef849cb521&'),
(5, 'INF Logo', 19.99, 'this is the logo ', 'cloathing', 100, '2023-11-14 09:16:12', 'https://cdn.discordapp.com/attachments/1098331063064993906/1173660218626953216/image.png?ex=6564c341&is=65524e41&hm=f13bfb44e34dc17d597c19816e52024ace0ca3ba37bc85d6bcc0f922efd3255b&');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwort` varchar(255) DEFAULT NULL,
  `vorname` varchar(255) NOT NULL,
  `nachname` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verificationCode` int(6) DEFAULT NULL,
  `isVerified` varchar(5) DEFAULT '0',
  `2FASecret` varchar(16) DEFAULT NULL,
  `lastLogIn` datetime DEFAULT NULL,
  `use2FA` tinyint(1) NOT NULL,
  `isFirstLogin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
