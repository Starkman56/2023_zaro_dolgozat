-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Ápr 14. 07:57
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
-- Adatbázis: `adatbazisprojekt`
--

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
  `id` int(11) NOT NULL,
  `megrendeles_datuma` datetime NOT NULL DEFAULT current_timestamp(),
  `kezbesites_datum` datetime NOT NULL DEFAULT current_timestamp(),
  `szemelyek_id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `rendeles_allapot_id` int(11) NOT NULL,
  `rendelt_darab` int(5) NOT NULL,
  `rendeles_azonosito` varchar(40) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `megrendeles`
--

INSERT INTO `megrendeles` (`id`, `megrendeles_datuma`, `kezbesites_datum`, `szemelyek_id`, `termek_id`, `rendeles_allapot_id`, `rendelt_darab`, `rendeles_azonosito`) VALUES
(83, '2023-04-12 13:40:04', '2023-04-12 13:40:04', 10, 97, 1, 2, '32312312312312'),
(84, '2023-04-12 13:42:24', '2023-04-12 13:42:24', 22, 83, 0, 2, ''),
(85, '2023-04-12 13:43:05', '2023-04-12 13:43:05', 22, 84, 0, 2, 'cba4fae427167294c846'),
(86, '2023-04-12 13:43:33', '2023-04-12 13:43:33', 22, 86, 1, 2, '03530cd48ec8fa3f42cc'),
(87, '2023-04-13 08:16:33', '2023-04-13 08:16:33', 22, 84, 1, 2, '07f65e5e432e75c79dea'),
(88, '2023-04-13 10:41:46', '2023-04-13 10:41:46', 22, 84, 1, 2, '1dea0de6fe03676a2448');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendeles_allapot`
--

CREATE TABLE `rendeles_allapot` (
  `allapot_id` int(2) NOT NULL,
  `allapot_nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `rendeles_allapot`
--

INSERT INTO `rendeles_allapot` (`allapot_id`, `allapot_nev`) VALUES
(1, 'Megrendelve'),
(2, 'Kézbesítve');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szemelyek`
--

CREATE TABLE `szemelyek` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `felhnev` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jelszo` varchar(255) DEFAULT NULL,
  `jog` varchar(255) NOT NULL DEFAULT 'user',
  `tel` varchar(255) DEFAULT NULL,
  `iranyitoszam` int(4) DEFAULT NULL,
  `telepules` varchar(120) DEFAULT NULL,
  `szallitasicim` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `szemelyek`
--

INSERT INTO `szemelyek` (`id`, `nev`, `felhnev`, `email`, `jelszo`, `jog`, `tel`, `iranyitoszam`, `telepules`, `szallitasicim`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'admin', '', 0, '', ''),
(2, 'user', 'user', 'user@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'user', '', 0, '', ''),
(3, 'elso', 'elso', 'elso@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'user', '', 0, '', ''),
(4, 'masodik', 'masodik', 'masodik@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'user', '', 0, '', ''),
(8, 'valami', 'valami', 'kordics.b@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'user', NULL, 1234, 'valami', 'valami'),
(10, '21312312', '231321312', 'fasz@gmail.fasz', '356a192b7913b04c54574d18c28d46e6395428ab', 'user', '1234', 1234, '1234', '1234'),
(13, 'Szabó Máté', 'Szabo11', 'szabo@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'user', '06302426770', 2660, 'Balassagyarmat', 'Petőfi utca 4'),
(14, 'aaaaaaaaaaaaa', 'asdasdas', 'dasdasd@sadasd', '356a192b7913b04c54574d18c28d46e6395428ab', '', '321321', 1234, '213123', '12312'),
(15, 'Szabó Máté1', 'Szabo112', 'szabo@gm32131ail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'admin', '06302426770', 2660, 'Balassagyarmat', 'Petőfi utca 4'),
(16, 'testadmin', 'testadmin', 'testadmin@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'admin', 'testadmin', 0, 'testadmin', 'testadmin'),
(17, '11111111', '1111111', 'kordics.b@gma11il.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'user', '1111', 1111, '1111', '1111'),
(18, 'TESZTTESZT', 'TESZT', 'TESZT@TESZT', '356a192b7913b04c54574d18c28d46e6395428ab', 'user', '11111111', 1111, 'TESZT', 'TESZT'),
(19, 'Kordics Balázs', 'Kordicska', 'kordics.b@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'user', '06308590860', 2660, 'Balassagyarmat', 'Jószív utca 29.'),
(20, 'aaaaaaaaaaaaaa1', '1111', 'aaaaaaa@aaaaaa', '356a192b7913b04c54574d18c28d46e6395428ab', 'user', '1111', 1111, '1111', '1111'),
(21, 'teszt', 'teszt', 'teszt@teszt', '356a192b7913b04c54574d18c28d46e6395428ab', 'user', '0000', 2660, 'teszt', 'teszt'),
(22, 'tesztuser', 'tesztuserfelh', 'tesztuser@gmail.com', '8cc5e5cc34ccd6c81075e40bf6a20fd65dec8b11', 'user', '123', 123, '123', '123'),
(23, 'tesztadmin', 'tesztadminfelh', 'tesztadmin@gmail.com', 'fbfe8a7c02168eb68d3a42fae9fea5e2e7b9b2d2', 'admin', '123', 123, '123', '12312');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `telepules`
--

CREATE TABLE `telepules` (
  `id` int(11) NOT NULL,
  `telepules` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `iranyitoszam` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termek`
--

CREATE TABLE `termek` (
  `id` int(11) NOT NULL,
  `vonalkod` varchar(50) DEFAULT NULL,
  `felvdatum` date DEFAULT NULL,
  `ar` int(11) DEFAULT NULL,
  `darab` int(7) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nev` varchar(50) DEFAULT NULL,
  `alkategoria_id` int(11) NOT NULL,
  `leiras` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `termek`
--

INSERT INTO `termek` (`id`, `vonalkod`, `felvdatum`, `ar`, `darab`, `foto`, `nev`, `alkategoria_id`, `leiras`) VALUES
(83, '00000000', '2023-03-03', 27000, 1, '1681366951.jpeg', 'Okuma Ceymar River Feeder', 1, 'Pontyos és egyéb békéshalas horgászatra kifejlesztett Okuma Ceymar feeder botok élménygazdag horgászatot eredményeznek. Kirobbanó fárasztási erővel rendelkezik.'),
(84, '00000000', '2023-03-03', 29100, 35, '1681366957.jpeg', 'Okuma Ceymar River Plus', 1, 'Pontyos és egyéb békéshalas horgászatra kifejlesztett Okuma Ceymar feeder botok élménygazdag horgászatot eredményeznek. Kirobbanó fárasztási erővel rendelkezik. ggg'),
(85, '00000000', '2023-04-14', 32000, 42, '1681366969.jpeg', 'Okuma Ceymar Black', 1, 'Pontyos és egyéb békéshalas horgászatra kifejlesztett Okuma Ceymar feeder botok élménygazdag horgászatot eredményeznek. Kirobbanó fárasztási erővel rendelkezik.'),
(86, '00000000', '2023-03-03', 41000, 96, '1681366976.jpeg', 'Okuma Custom Black Ceymar River Feeder', 1, 'Pontyos és egyéb békéshalas horgászatra kifejlesztett Okuma Ceymar feeder botok élménygazdag horgászatot eredményeznek. Kirobbanó fárasztási erővel rendelkezik.'),
(87, '00000000', '2023-03-03', 54900, 100, '1681366985.jpeg', 'Okuma Ceymar River Feeder Professional', 1, 'Pontyos és egyéb békéshalas horgászatra kifejlesztett Okuma Ceymar feeder botok élménygazdag horgászatot eredményeznek. Kirobbanó fárasztási erővel rendelkezik.'),
(88, '0000000', '2023-03-06', 200, 98, '1678095927.jpeg', 'Döme TEAM FEEDER Carp Fighter', 2, 'Íme a Döme Gábor nevével fémjelzett új orsócsalád, pontyos feederhorgászathoz kifejlesztett, nyeletőfékes orsó modelljei.'),
(89, '0000000', '2023-03-06', 23000, 100, '1678096193.jpeg', 'Döme TEAM FEEDER Long Cast', 2, 'Íme a Döme Gábor nevével fémjelzett új orsócsalád, pontyos feederhorgászathoz kifejlesztett, nyeletőfékes orsó modelljei.'),
(90, '0000000', '2023-03-06', 26500, 100, '1678096789.jpeg', 'Delphin CALMO nyeletőfékes orsó', 2, 'Egy egyszerű, de precíz nyeletőfékes orsó széria, amely az igazán kedvező ára ellenére sem fog csalódást okozni paramétereivel és funkcionalitásával.'),
(91, '0000000', '2023-03-06', 23000, 100, '1678096929.jpeg', 'Döme TEAM FEEDER Pearl Carp', 2, 'A MODECO egy attraktív modern orsó, amely az évek során szerzett megbízható technikai tapasztalatokon alapul.'),
(92, '0000000', '2023-03-06', 19000, 99, '1678096992.jpeg', 'Delphin MODECO Carp', 2, 'A MODECO egy attraktív modern orsó, amely az évek során szerzett megbízható technikai tapasztalatokon alapul.'),
(93, '0000000', '2023-03-06', 1500, 99, '1678101120.jpeg', 'Delphin SNAX POP csali Csoki-Banán', 3, 'A D SNAX POP úszó csalik átfogó sorozata, amely a halak számára ellenállhatatlan lesz a víz alatt.'),
(94, '0000000', '2023-03-06', 1500, 100, '1678101212.jpeg', 'Delphin SNAX POP csali Fokhagyma-Vajsav', 3, 'A D SNAX POP úszó csalik átfogó sorozata, amely a halak számára ellenállhatatlan lesz a víz alatt.'),
(95, '0000000', '2023-03-06', 1500, 100, '1678101328.jpeg', 'Delphin SNAX POP csali Kagyló-Fűszer', 3, 'D SNAX POP úszó csalik átfogó sorozata, amely a halak számára ellenállhatatlan lesz a víz alatt'),
(96, '0000000', '2023-04-01', 1500, 100, '1678101269.jpeg', 'Delphin SNAX POP csali Kukorica-Ananász', 3, 'D SNAX POP úszó csalik átfogó sorozata, amely a halak számára ellenállhatatlan lesz a víz alatt.'),
(97, '0000000', '2023-04-04', 1500, 100, '1678101299.jpeg', 'Delphin SNAX POP csali Mangó-Barack', 3, 'D SNAX POP úszó csalik átfogó sorozata, amely a halak számára ellenállhatatlan lesz a víz alatt'),
(98, '0000000', '2023-04-13', 13890, 100, '1681367347.jpeg', 'Merítőnyél Korum Adjusta Net Handle Merítőnyél', 4, '1,2-1,8 méteres prémium Korum prémium merítőnyél.'),
(99, '00000000', '2023-04-13', 2990, 100, '1681368719.jpeg', 'Haltartó Nevis haltartószák 1,30m 40cm 4 karikás', 4, 'Minőségi Nevis haltartó szák.'),
(100, '00000000', '2023-04-13', 6250, 100, '1681367706.jpeg', 'Merítőfej Carp Academy Black Net bojlis', 4, 'Az Nevis legújabb víztaszító, horogálló erős merítője'),
(101, '00000000', '2023-04-13', 6590, 100, '1681367780.jpeg', 'Merítőfej Carp Academy Black Net bojlis', 4, 'Az Nevis legújabb víztaszító, horogálló erős merítője'),
(102, '00000000', '2023-04-13', 4490, 100, '1681367838.jpeg', 'Merítőfej Nevis kerek 55x45cm', 4, 'A Nevis legújabb víztaszító, horogálló erős merítője.'),
(103, '00000000', '2023-04-13', 22900, 100, '1681368968.jpeg', 'Daiwa Boxed Luggage Set Bottáska 187Cm', 5, 'Praktikus táskaszett a japán Daiwatól.'),
(104, '00000000', '2023-04-13', 34990, 100, '1681369052.jpeg', 'Shimano Tribal Layer Light Jacket Kabát', 5, 'Hideg napokra elegáns termék a japán Shimanotól.'),
(105, '00000000', '2023-04-13', 39990, 100, '1681369130.jpeg', 'Trakker F-32 Combi Suit Téli 3 Részes Ruhaszett', 5, 'Akár a leghidegebb napokra!'),
(106, '00000000', '2023-04-13', 3490, 50, '1681369189.jpeg', 'Carp Zoom Poncsó Esőkabát', 5, 'Vízálló ESŐKABÁT nedvesebb, nyirkosabb, esős és szeles horgászatokra.'),
(107, '00000000', '2023-04-13', 19990, 50, '1681369289.jpeg', 'Puffa Chield Gilet Mellénykabát', 5, 'Meleg mellény a hidegebbb horgászatokra, utcai viseletre.'),
(108, '00000000', '2023-04-13', 25490, 100, '1681369614.jpeg', 'Sera San Nature 10L 2Kg Lemezes Színfokozó Díszhal', 6, 'Gazdaságos színfokozó díszhaltáp akvaristáknak, tenyésztőknek, boltosoknak.'),
(109, '00000000', '2023-04-13', 690, 100, '1681369802.jpeg', 'Panzi Nature Illatos Réti Széna 5 Liter', 7, 'Ropógós, friss illatú hegyi réti széna.'),
(110, '00000000', '2023-04-13', 4790, 140, '1681369926.jpeg', 'Ferplast Aladino Medium Kisállat Szállító', 8, 'Szállító box kisebb és közepes termetű állatok részére'),
(111, '00000000', '2023-04-13', 1790, 250, '1681370091.jpeg', 'Panzi Csutka Alom natur 2,5 kg 302713', 9, 'Természetes pormentes alom lakásban tartott rágcsálók, madarak alá.'),
(112, '00000000', '2023-04-13', 16790, 100, '1681370158.jpeg', 'Ferplast Hydor Blumodular Professional belső szűrő', 10, 'Megbízható, masszív és tartós belső szűrő a Ferplasttól.'),
(113, '00000000', '2023-04-13', 47790, 100, '1681370358.jpeg', 'Zurrichberg 18 részes rozsdamentes acél edénykészl', 11, 'Kiváló minőségű INOX edénykészlet. Selejtezd ki régi, elhasználódott edényeidet, mert ez a készlet hosszú évekig jó szolgálatot fog tenni.'),
(114, '00000000', '2023-04-13', 13990, 70, '1681370527.jpeg', 'Vacuum-Loc fúrásmentes sarokpolc', 12, 'A legjobb helykihasználtság végett kialakított fürdőszobai sarokpolcok praktikusak a zuhanyzóban, vagy kád fölött elhelyezve, de a fürdőszoba sarokpolcok'),
(115, '00000000', '2023-04-13', 3960, 100, '1681370687.jpeg', 'Polesie játék Dömper', 13, 'Polesie márkájú dömper. Nehéz rakományokat szeretnél szállítani? Akkor ez a dömper csak Rád vár! Dömpereddel homokot, kavicsokat vagy akár kedvenc játékaidat is szállíthatod. Billenős platója segít a'),
(116, '00000000', '2023-04-13', 11600, 140, '1681371098.jpeg', 'Fém virágállvány, fekete/rusztikus fa', 14, 'Az új ADITE termékünk segítségével egy praktikus növénysarokban rendezheti el a kedvenc növényeit. Egy virágállvány, amelyen minden egyes növény kiemelkedik.'),
(117, '00000000', '2023-04-13', 325, 130, '1681371219.jpeg', 'Esküvői hűtőmágnes, köszönőajándék', 15, 'Egyedi köszönőajándék, hűtőmágnes. Emlék a barátoknak, családnak és az ifjú párnak. Kérheted a vendég vagy a pár neveivel.'),
(118, '00000000', '2023-04-13', 2890, 200, '1681371483.jpeg', 'Feeder madáretető, Barna', 16, 'Lucfenyőből készült.Kiválóan alkalmas a szabadon élő madarak csalogatására,Strapabíró.Ablakpárkányra vagy a kertbe kell helyezni, min. 150 cm-es magasságba.Súlya: 0,75 kg'),
(119, '00000000', '2023-04-13', 3290, 100, '1681371688.jpeg', 'TRIXIE ALAGÚT FÁBÓL', 17, 'hüllők, nyulak és rágcsálók számára alkalmas,ideális hely a visszavonulásra.ideális hegymászáshoz\r\n100% természetes anyagokból készül'),
(120, '00000000', '2023-04-13', 400, 300, '1681371873.jpeg', 'FA KULCSTARTÓ, JIN JANG MACSKÁS', 18, 'Fából készült, natúr kulcstartó, cicás.Festhető, díszíthető.Átmérője: kb. 4 cm. Fa kulcstartó'),
(121, '00000000', '2023-04-13', 12990, 100, '1681372190.jpeg', 'Kesper bambusz kenyértartó', 19, 'Kesper bambusz kenyértartó 36x20 cm, felhajtható fedé, bükkfa. Kiválóan zár, tökéletes a pékárú tárolására.'),
(122, '00000000', '2023-04-13', 8290, 60, '1681372338.jpeg', 'Világos gazdasági kosár', 20, 'Vesszőből font, masszív gazdasági kosár tüzifa, lomb vagy levágott fű tárolására és szállítására. Két oldalán füllel a könnyeb mozgatásért.Főzött natúr vessző.');

--
-- Indexek a kiírt táblákhoz
--

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
  ADD KEY `accounts_id` (`szemelyek_id`,`termek_id`),
  ADD KEY `termek_id` (`termek_id`),
  ADD KEY `rendeles_allapot_id` (`rendeles_allapot_id`);

--
-- A tábla indexei `rendeles_allapot`
--
ALTER TABLE `rendeles_allapot`
  ADD PRIMARY KEY (`allapot_id`);

--
-- A tábla indexei `szemelyek`
--
ALTER TABLE `szemelyek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `telepules`
--
ALTER TABLE `telepules`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT a táblához `rendeles_allapot`
--
ALTER TABLE `rendeles_allapot`
  MODIFY `allapot_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `szemelyek`
--
ALTER TABLE `szemelyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT a táblához `telepules`
--
ALTER TABLE `telepules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `termek`
--
ALTER TABLE `termek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

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
  ADD CONSTRAINT `megrendeles_ibfk_2` FOREIGN KEY (`szemelyek_id`) REFERENCES `szemelyek` (`id`);

--
-- Megkötések a táblához `termek`
--
ALTER TABLE `termek`
  ADD CONSTRAINT `termek_ibfk_1` FOREIGN KEY (`alkategoria_id`) REFERENCES `alkategoriak` (`alkategoria_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
