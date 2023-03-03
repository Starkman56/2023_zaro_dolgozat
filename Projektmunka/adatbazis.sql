-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Már 03. 09:22
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `adatbazis`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `accounts`
--

CREATE TABLE `accounts` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `permission` varchar(255) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `username`, `email`, `password`, `permission`) VALUES
(1, 'seme', 'dadwda', 'kiscica@gmail.com', 'fb0456d5293888623882d331030d16ec651f6cbd', 'user'),
(2, 'oke', 'Sem', 'veddeddmeg@gmail.com', '7592c793d07efdc80804c78c748f93b13568bec9', 'admin'),
(3, 'Egyszeru', 'Egyszer', 'kocsis.krisztina@gmail.com', '7c3cb4e01c01f002650d6f33dc0ade93a1eff5ff', 'user'),
(4, 'Egyszeruw', 'Egyszerw', 'ekek@gmail.com', 'fa8edda52f645321de953c354ad0731de653dba2', 'admin'),
(5, 'pontolyan', 'mintricsie', 'pont@gmail.com', 'be4a4cd0349c557b9abe9ea7903e9fd643149564', 'user'),
(6, 'lehet', 'Lehet', 'lehet@gmail.com', 'fc3a12bcbc036296e245bbe3d8c5bb9644d1053a', 'admin'),
(7, 'Báttya', 'Bártya', 'battya@gmail.com', '63720647af013050dc3b4eb40f198ffabdbddfc7', 'admin'),
(8, 'Tehen ', 'Szaporito', 'tehen.szaporito@gmail.com', 'd3c9b18287407c7a6050311c0fc8d024fedb8c4e', 'admin'),
(9, 'Eperke', 'Eperke', 'Eperke@gmail.com', 'b68499eec00932095fcb434d9de737c9386790a6', 'user'),
(10, 'Almafa', 'Almafa', 'almafa@gmail.com', '7cdab41b409db1d38c13dfc9f5b6635dd7b6352a', 'admin'),
(11, 'teszt', 'teszt', 'teszt@gmail.com', '34228a532093278fcdc65c3a1338482e8bdc44f6', 'admin'),
(12, 'tesztuser', 'tesztuser', 'tesztuser@gmail.com', '8cc5e5cc34ccd6c81075e40bf6a20fd65dec8b11', 'user');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `alkategoriak`
--

CREATE TABLE `alkategoriak` (
  `alkategoria_id` int(11) NOT NULL,
  `alkategoria_nev` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `kategoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `alkategoriak`
--

INSERT INTO `alkategoriak` (`alkategoria_id`, `alkategoria_nev`, `kategoria_id`) VALUES
(1, 'Horgaszbot', 1),
(2, 'Orso', 1),
(3, 'Etetoanyag', 1),
(4, 'Horgasz_Kiegeszito', 1),
(5, 'Horgasz_Ruhazat', 1),
(6, 'Hal_tap', 2),
(7, 'Ragcsalo_Tap', 2),
(8, 'Diszallat_Kiegeszito', 2),
(9, 'Alom', 2),
(10, 'Levegozteto_Szuro_Melegito', 2),
(11, 'Konyhai', 3),
(12, 'Furdoszoba', 3),
(13, 'Jatek', 3),
(14, 'Disz', 3),
(15, 'Ajandek', 3),
(16, 'Madareteto', 4),
(17, 'odu', 4),
(18, 'kulcstarto', 4),
(19, 'kenyertarto', 4),
(20, 'kosar', 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoriak`
--

CREATE TABLE `kategoriak` (
  `kategoria_id` int(11) NOT NULL,
  `kategoria_nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kategoriak`
--

INSERT INTO `kategoriak` (`kategoria_id`, `kategoria_nev`) VALUES
(1, 'horgasz'),
(2, 'diszallat'),
(3, 'haztartas'),
(4, 'fatermek');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megrendeles`
--

CREATE TABLE `megrendeles` (
  `id` int(15) NOT NULL,
  `datum` date NOT NULL,
  `cim` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termek`
--

CREATE TABLE `termek` (
  `id` int(11) NOT NULL,
  `vonalkod` varchar(50) DEFAULT NULL,
  `felvdatum` date DEFAULT NULL,
  `ar` int(50) DEFAULT NULL,
  `darab` int(5) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nev` varchar(50) DEFAULT NULL,
  `alkategoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `termek`
--

INSERT INTO `termek` (`id`, `vonalkod`, `felvdatum`, `ar`, `darab`, `foto`, `nev`, `alkategoria_id`) VALUES
(46, '00000000000', '2023-03-01', 1000, 1, NULL, 'Aranyhaltap', 6),
(47, '2144511', '2023-03-02', 1400, 30, NULL, 'Tölgy kenyértartó', 19);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `alkategoriak`
--
ALTER TABLE `alkategoriak`
  ADD PRIMARY KEY (`alkategoria_id`),
  ADD KEY `kategoria_id` (`kategoria_id`);

--
-- A tábla indexei `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`kategoria_id`);

--
-- A tábla indexei `megrendeles`
--
ALTER TABLE `megrendeles`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `termek`
--
ALTER TABLE `termek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alkategoriaid` (`alkategoria_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `alkategoriak`
--
ALTER TABLE `alkategoriak`
  MODIFY `alkategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `kategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT a táblához `megrendeles`
--
ALTER TABLE `megrendeles`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `termek`
--
ALTER TABLE `termek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `alkategoriak`
--
ALTER TABLE `alkategoriak`
  ADD CONSTRAINT `alkategoriak_ibfk_1` FOREIGN KEY (`kategoria_id`) REFERENCES `kategoriak` (`kategoria_id`);

--
-- Megkötések a táblához `termek`
--
ALTER TABLE `termek`
  ADD CONSTRAINT `termek_ibfk_1` FOREIGN KEY (`alkategoria_id`) REFERENCES `alkategoriak` (`alkategoria_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
