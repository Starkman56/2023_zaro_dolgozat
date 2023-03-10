-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Már 09. 09:55
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `adatbazisprojekt`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `permission` varchar(255) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `alkategoriak`
--

CREATE TABLE `alkategoriak` (
  `alkategoria_id` int(11) NOT NULL,
  `alkategoria_nev` varchar(200) NOT NULL,
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
  `kategoria_nev` varchar(50) NOT NULL
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
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `cim` varchar(20) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL
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
  `alkategoria_id` int(11) NOT NULL,
  `leiras` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `termek`
--

INSERT INTO `termek` (`id`, `vonalkod`, `felvdatum`, `ar`, `darab`, `foto`, `nev`, `alkategoria_id`, `leiras`) VALUES
(83, '00000000', '2023-03-03', 27000, 100, '1677840738.jpeg', 'Okuma Ceymar River Feeder', 1, 'Pontyos és egyéb békéshalas horgászatra kifejlesztett Okuma Ceymar feeder botok élménygazdag horgászatot eredményeznek. Kirobbanó fárasztási erővel rendelkezik.'),
(84, '00000000', '2023-03-03', 29100, 100, '1677844206.jpeg', 'Okuma Ceymar River Plus', 1, 'Pontyos és egyéb békéshalas horgászatra kifejlesztett Okuma Ceymar feeder botok élménygazdag horgászatot eredményeznek. Kirobbanó fárasztási erővel rendelkezik.'),
(85, '00000000', '0000-00-00', 32000, 100, '1677844292.jpeg', 'Okuma Ceymar Black', 1, 'Pontyos és egyéb békéshalas horgászatra kifejlesztett Okuma Ceymar feeder botok élménygazdag horgászatot eredményeznek. Kirobbanó fárasztási erővel rendelkezik.'),
(86, '00000000', '2023-03-03', 41000, 100, '1677844365.jpeg', 'Okuma Custom Black Ceymar River Feeder', 1, 'Pontyos és egyéb békéshalas horgászatra kifejlesztett Okuma Ceymar feeder botok élménygazdag horgászatot eredményeznek. Kirobbanó fárasztási erővel rendelkezik.'),
(87, '00000000', '2023-03-03', 54900, 100, '1677844433.jpeg', 'Okuma Ceymar River Feeder Professional', 1, 'Pontyos és egyéb békéshalas horgászatra kifejlesztett Okuma Ceymar feeder botok élménygazdag horgászatot eredményeznek. Kirobbanó fárasztási erővel rendelkezik.'),
(88, '0000000', '2023-03-06', 15000, 100, '1678095927.jpeg', 'Döme TEAM FEEDER Carp Fighter', 2, 'Íme a Döme Gábor nevével fémjelzett új orsócsalád, pontyos feederhorgászathoz kifejlesztett, nyeletőfékes orsó modelljei.'),
(89, '0000000', '2023-03-06', 23000, 100, '1678096193.jpeg', 'Döme TEAM FEEDER Long Cast', 2, 'Íme a Döme Gábor nevével fémjelzett új orsócsalád, pontyos feederhorgászathoz kifejlesztett, nyeletőfékes orsó modelljei.'),
(90, '0000000', '2023-03-06', 26500, 100, '1678096789.jpeg', 'Delphin CALMO nyeletőfékes orsó', 2, 'Egy egyszerű, de precíz nyeletőfékes orsó széria, amely az igazán kedvező ára ellenére sem fog csalódást okozni paramétereivel és funkcionalitásával.'),
(91, '0000000', '2023-03-06', 23000, 100, '1678096929.jpeg', 'Döme TEAM FEEDER Pearl Carp', 2, 'A MODECO egy attraktív modern orsó, amely az évek során szerzett megbízható technikai tapasztalatokon alapul.'),
(92, '0000000', '2023-03-06', 19000, 100, '1678096992.jpeg', 'Delphin MODECO Carp', 2, 'A MODECO egy attraktív modern orsó, amely az évek során szerzett megbízható technikai tapasztalatokon alapul.'),
(93, '0000000', '2023-03-06', 1500, 100, '1678101120.jpeg', 'Delphin SNAX POP csali Csoki-Banán', 3, 'A D SNAX POP úszó csalik átfogó sorozata, amely a halak számára ellenállhatatlan lesz a víz alatt.'),
(94, '0000000', '2023-03-06', 1500, 100, '1678101212.jpeg', 'Delphin SNAX POP csali Fokhagyma-Vajsav', 3, 'A D SNAX POP úszó csalik átfogó sorozata, amely a halak számára ellenállhatatlan lesz a víz alatt.'),
(95, '0000000', '2023-03-06', 1500, 100, '1678101328.jpeg', 'Delphin SNAX POP csali Kagyló-Fűszer', 3, 'D SNAX POP úszó csalik átfogó sorozata, amely a halak számára ellenállhatatlan lesz a víz alatt'),
(96, '0000000', '2023-03-06', 1500, 100, '1678101269.jpeg', 'Delphin SNAX POP csali Kukorica-Ananász', 3, 'D SNAX POP úszó csalik átfogó sorozata, amely a halak számára ellenállhatatlan lesz a víz alatt.'),
(97, '0000000', '0000-00-00', 1500, 1, '1678101299.jpeg', 'Delphin SNAX POP csali Mangó-Barack', 3, 'D SNAX POP úszó csalik átfogó sorozata, amely a halak számára ellenállhatatlan lesz a víz alatt');

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
  ADD KEY `kategoria_id` (`kategoria_id`),
  ADD KEY `kategoria_id_2` (`kategoria_id`);

--
-- A tábla indexei `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`kategoria_id`);

--
-- A tábla indexei `megrendeles`
--
ALTER TABLE `megrendeles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_id` (`accounts_id`,`termek_id`),
  ADD KEY `termek_id` (`termek_id`);

--
-- A tábla indexei `termek`
--
ALTER TABLE `termek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alkategoriaid` (`alkategoria_id`),
  ADD KEY `alkategoria_id` (`alkategoria_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `alkategoriak`
--
ALTER TABLE `alkategoriak`
  MODIFY `alkategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `kategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `megrendeles`
--
ALTER TABLE `megrendeles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `termek`
--
ALTER TABLE `termek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `alkategoriak`
--
ALTER TABLE `alkategoriak`
  ADD CONSTRAINT `alkategoriak_ibfk_1` FOREIGN KEY (`kategoria_id`) REFERENCES `kategoriak` (`kategoria_id`);

--
-- Megkötések a táblához `megrendeles`
--
ALTER TABLE `megrendeles`
  ADD CONSTRAINT `megrendeles_ibfk_1` FOREIGN KEY (`termek_id`) REFERENCES `termek` (`id`),
  ADD CONSTRAINT `megrendeles_ibfk_2` FOREIGN KEY (`accounts_id`) REFERENCES `accounts` (`id`);

--
-- Megkötések a táblához `termek`
--
ALTER TABLE `termek`
  ADD CONSTRAINT `termek_ibfk_1` FOREIGN KEY (`alkategoria_id`) REFERENCES `alkategoriak` (`alkategoria_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
