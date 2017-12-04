-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 04. Dez 2017 um 23:31
-- Server-Version: 5.6.35
-- PHP-Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `Library`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Admin`
--

CREATE TABLE `Admin` (
  `AdminID` int(11) NOT NULL,
  `Adminname` varchar(255) NOT NULL,
  `Adminpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Admin`
--

INSERT INTO `Admin` (`AdminID`, `Adminname`, `Adminpassword`) VALUES
(1, 'hello', '3c8ec4874488f6090a157b014ce3397ca8e06d4f');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Author`
--

CREATE TABLE `Author` (
  `First Name` varchar(100) DEFAULT NULL,
  `Last Name` varchar(100) DEFAULT NULL,
  `Year of Birth` int(11) DEFAULT NULL,
  `Social Security Number` varchar(20) DEFAULT NULL,
  `Link for more Info` varchar(255) DEFAULT NULL,
  `AuthorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Author`
--

INSERT INTO `Author` (`First Name`, `Last Name`, `Year of Birth`, `Social Security Number`, `Link for more Info`, `AuthorID`) VALUES
('Ruth', 'Ware', 1977, NULL, 'http://www.ruthware.com', 1),
('Louise', 'Penny', 1958, NULL, 'https://de.wikipedia.org/wiki/Louise_Penny', 2),
('Helen', 'Hardt', NULL, NULL, 'https://www.goodreads.com/author/show/2993356.Helen_Hardt', 3),
('Dan', 'Brown', 1964, NULL, 'https://de.wikipedia.org/wiki/Dan_Brown', 4),
('Ken', 'Follett', 1949, NULL, 'https://de.wikipedia.org/wiki/Ken_Follett', 5),
('Stephen', 'King', 1947, NULL, 'https://en.wikipedia.org/wiki/Stephen_King', 665);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `authorbook`
--

CREATE TABLE `authorbook` (
  `AuthorID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `authorbook`
--

INSERT INTO `authorbook` (`AuthorID`, `BookID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Book`
--

CREATE TABLE `Book` (
  `BookID` int(13) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Author` varchar(30) NOT NULL,
  `Reserved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Book`
--

INSERT INTO `Book` (`BookID`, `Title`, `Author`, `Reserved`) VALUES
(1, 'Harry Potter', 'J.K. Rowling', 0),
(3, 'Book No. 3', 'Sir Three', 0),
(5, 'Origin', 'Ken Follet', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `comment` varchar(150) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`comment`, `id`) VALUES
('erster kommentar', 1),
('zweiter kommentar', 2),
('sdSD', 3),
('FSDAASDFASD', 4),
('asdf', 5),
('\' DELETE FROM `comments` WHERE 1 #', 6),
('dssdd', 7),
('\'; DELETE FROM comments WHERE 1 #', 8),
('<b>lal</b>', 9),
('&lt;b&gt;', 14);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `User`
--

CREATE TABLE `User` (
  `Username` varchar(10) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `User`
--

INSERT INTO `User` (`Username`, `Password`) VALUES
('Max', '0706025b2bbcec1ed8d64822f4eccd96314938d0'),
('Peter', '4b8373d016f277527198385ba72fda0feb5da015');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indizes für die Tabelle `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indizes für die Tabelle `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`BookID`);

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Admin`
--
ALTER TABLE `Admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `Book`
--
ALTER TABLE `Book`
  MODIFY `BookID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;