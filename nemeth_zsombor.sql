-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2020. Ápr 18. 09:28
-- Kiszolgáló verziója: 5.7.23
-- PHP verzió: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `nemeth_zsombor`
--
CREATE DATABASE IF NOT EXISTS `nemeth_zsombor` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `nemeth_zsombor`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `kerdes_id` int(11) NOT NULL AUTO_INCREMENT,
  `kerdes` text COLLATE utf8_hungarian_ci NOT NULL,
  `valasz_A` varchar(512) COLLATE utf8_hungarian_ci NOT NULL,
  `valasz_B` varchar(512) COLLATE utf8_hungarian_ci NOT NULL,
  `valasz_C` varchar(512) COLLATE utf8_hungarian_ci NOT NULL,
  `valasz_D` varchar(512) COLLATE utf8_hungarian_ci NOT NULL,
  `helyes` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`kerdes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `quiz`
--

INSERT INTO `quiz` (`kerdes_id`, `kerdes`, `valasz_A`, `valasz_B`, `valasz_C`, `valasz_D`, `helyes`) VALUES
(1, 'Mi a fényerősség SI mértékegysége?', 'kandela', 'lumen', 'lux', 'farad', 'kandela'),
(2, 'Ki dolgozta ki a kvantumelméletet?', 'Werner Heisenberg', 'Erwin Schrödinger', 'Max Planck', 'Max Born', 'Max Planck'),
(3, 'Hányas számrendszer a bináris számrendszer?', 'tizes', 'hetes', 'tizenkettes', 'kettes', 'kettes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
