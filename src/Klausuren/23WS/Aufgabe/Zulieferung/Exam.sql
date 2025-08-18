-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Erstellungszeit: 09. Feb 2024 um 13:46
-- Server-Version: 11.1.2-MariaDB-1:11.1.2+maria~ubu2204
-- PHP-Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hda_electronics`
--
CREATE DATABASE IF NOT EXISTS `hda_electronics` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hda_electronics`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `artikelnummer` varchar(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `beschreibung` text NOT NULL,
  `preis` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `article`
--

INSERT INTO `article` (`id`, `artikelnummer`, `name`, `beschreibung`, `preis`) VALUES
(1, 'HDA-7850346', 'Dockingstation', 'Die Dockingstation ist ein externes Gerät, das es ermöglicht, verschiedene elektronische Geräte wie Laptops, Tablets oder <b>Smartphones</b> miteinander zu verbinden und aufzuladen. Sie bietet eine zentrale Schnittstelle, um mehrere Peripheriegeräte gleichzeitig anzuschließen und ermöglicht so eine effiziente Nutzung und Organisation des Arbeitsplatzes.', 55.99),
(2, 'HDA-7611118', 'VR-Brille', 'Die VR-Brille ist ein immersives Wearable, das mit Computern oder Smartphones verbunden wird, um ein beeindruckendes <b>Virtual-Reality-Erlebnis</b> zu bieten. Sie erfasst Kopf- und manchmal Handbewegungen, ermöglicht das Eintauchen in virtuelle Welten und findet Anwendung in Gaming, Simulationen und Unterhaltung.', 554.99),
(3, 'HDA-1198565', 'Notebook', 'Das Notebook ist ein tragbarer Computer, der eine kompakte Bauweise mit einem integrierten Bildschirm, Tastatur und Touchpad vereint. Es eignet sich ideal für mobile <b>Anwendungen</b> und ermöglicht Benutzern, produktiv zu arbeiten und auf digitale Ressourcen zuzugreifen, unabhängig von ihrem Standort.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 1650.99);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
