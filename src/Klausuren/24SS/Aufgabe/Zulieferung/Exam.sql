-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Erstellungszeit: 19. Jun 2024 um 15:04
-- Server-Version: 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- PHP-Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `2024_hda_quiz`
--
CREATE DATABASE IF NOT EXISTS `2024_hda_quiz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `2024_hda_quiz`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `question`
--
DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `answerOne` varchar(255) NOT NULL,
  `answerTwo` varchar(255) NOT NULL,
  `answerCorrect` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `question`
--

INSERT INTO `question` (`id`, `text`, `answerOne`, `answerTwo`, `answerCorrect`) VALUES
(1, 'Welche Programmiersprache wird hauptsächlich für die Gestaltung des Layouts einer Webseite verwendet?', 'CSS', 'PHP', 1),
(2, 'Wozu dient das HTML-Tag <title>?', 'Überschrift der Webseite', 'Name des Browsertabs', 2),
(3, 'Welches HTTP-Verfahren wird verwendet, um Daten vom Server abzurufen?', 'PUT', 'GET', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ranking`
--

DROP TABLE IF EXISTS `ranking`;
CREATE TABLE IF NOT EXISTS `ranking` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `ranking`
--

INSERT INTO `ranking` (`id`, `name`, `score`) VALUES
(1, 'Felix', 1),
(2, 'Meike', 2),
(3, 'Felix', 3);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
