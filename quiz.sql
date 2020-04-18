-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Ápr 18. 11:16
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.1

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

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `quiz`
--

CREATE TABLE `quiz` (
  `kerdes_id` int(11) NOT NULL,
  `kerdes` text COLLATE utf8_hungarian_ci NOT NULL,
  `valasz_A` varchar(512) COLLATE utf8_hungarian_ci NOT NULL,
  `valasz_B` varchar(512) COLLATE utf8_hungarian_ci NOT NULL,
  `valasz_C` varchar(512) COLLATE utf8_hungarian_ci NOT NULL,
  `valasz_D` varchar(512) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `quiz`
--

INSERT INTO `quiz` (`kerdes_id`, `kerdes`, `valasz_A`, `valasz_B`, `valasz_C`, `valasz_D`) VALUES
(1, 'Mi a fényerősség SI mértékegysége?', 'kandela', 'lumen', 'lux', 'farad'),
(2, 'Ki dolgozta ki a kvantumelméletet?', 'Werner Heisenberg', 'Erwin Schrödinger', 'Max Planck', 'Max Born'),
(3, 'Hányas számrendszer a bináris számrendszer?', 'tizes', 'hetes', 'tizenkettes', 'kettes');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`kerdes_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `quiz`
--
ALTER TABLE `quiz`
  MODIFY `kerdes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
