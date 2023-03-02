-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Már 02. 11:15
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
-- Adatbázis: `keszletgyarmat`
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
  `alkategoriak_id` int(15) NOT NULL,
  `alkategoria_nev` varchar(200) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `alkategoriak`
--

INSERT INTO `alkategoriak` (`alkategoriak_id`, `alkategoria_nev`) VALUES
(1, 'Horgaszbot'),
(2, 'Orso'),
(3, 'Etetoanyag'),
(4, 'Horgasz_Kiegeszito'),
(5, 'Horgasz_Ruhazat'),
(6, 'Hal_tap'),
(7, 'Ragcsalo_Tap'),
(8, 'Diszallat_Kiegeszito'),
(9, 'Alom'),
(10, 'Levegozteto_Szuro_Melegito'),
(11, 'Konyhai'),
(12, 'Furdoszoba'),
(13, 'Jatek'),
(14, 'Disz'),
(15, 'Ajandek'),
(16, 'Madareteto'),
(17, 'odu'),
(18, 'kulcstarto'),
(19, 'kenyertarto'),
(20, 'kosar');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoriak`
--

CREATE TABLE `kategoriak` (
  `kategoriak_id` int(15) NOT NULL,
  `kategoriak_nev` varchar(11) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kategoriak`
--

INSERT INTO `kategoriak` (`kategoriak_id`, `kategoriak_nev`) VALUES
(1, 'Horgasz'),
(2, 'Diszallat'),
(3, 'Haztartasi'),
(4, 'Fatermekek');

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
  `kategoriaid` int(15) DEFAULT NULL,
  `alkategoriaid` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `termek`
--

INSERT INTO `termek` (`id`, `vonalkod`, `felvdatum`, `ar`, `darab`, `foto`, `nev`, `kategoriaid`, `alkategoriaid`) VALUES
(37, '123123', '2023-02-09', 1230, 4, '1675934610.png', 'Szuper Horgászbot', 1, 1),
(46, '00000000000', '2023-03-01', 1000, 1, NULL, 'Aranyhaltap', 2, 6),
(47, '2144511', '2023-03-02', 1400, 30, NULL, 'Tölgy kenyértartó', 4, 19);

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
  ADD PRIMARY KEY (`alkategoriak_id`);

--
-- A tábla indexei `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`kategoriak_id`);

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
  ADD KEY `kategoriaid` (`kategoriaid`),
  ADD KEY `kategoriaid_2` (`kategoriaid`),
  ADD KEY `kategoriaid_3` (`kategoriaid`),
  ADD KEY `alkategoriaid` (`alkategoriaid`);

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
  MODIFY `alkategoriak_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `kategoriak_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Megkötések a táblához `termek`
--
ALTER TABLE `termek`
  ADD CONSTRAINT `termek_ibfk_1` FOREIGN KEY (`kategoriaid`) REFERENCES `kategoriak` (`kategoriak_id`),
  ADD CONSTRAINT `termek_ibfk_2` FOREIGN KEY (`alkategoriaid`) REFERENCES `alkategoriak` (`alkategoriak_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
