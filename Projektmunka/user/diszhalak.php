<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




    //Elemek meghívása
require("../kapcsolat/kapcs.php");


?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&amp;display=swap" rel="stylesheet">
    <!-- nav linkek -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/ujstyle.css">
    <title>Diszallatok</title>
    <script defer="" referrerpliicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyU2lkZWJhciUyMCUyMzElMjIlMkMlMjJ4JTIyJTNBMC43NTcwNjQ1MzE3ODcxMzc2JTJDJTIydyUyMiUzQTE5MjAlMkMlMjJoJTIyJTNBMTA4MCUyQyUyMmliMjIlM0E5MzclMkMlMjJlJTIyJTNBMTkyMCUyQyUyMmwlMjIlM0ElMjJodHRwcyUzQSUyRiUyRnByZXZpZXcuY29sb3JsaWIuY29tJTJGdGhlbWUlMkZzaWRlYmFyJTJGY29sb3JsaWItc2lkZWJhci12MDElMkYlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkYlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBLTYwJTJDJTIycSUyMiUzQSU1QiU1RCU3RA=="></script>
</head>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&amp;display=swap" rel="stylesheet">
    <!-- nav linkek -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/ujstyle.css">
    <title>Diszallatok</title>
    <script defer="" referrerpliicy="origin"
        src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyU2lkZWJhciUyMCUyMzElMjIlMkMlMjJ4JTIyJTNBMC43NTcwNjQ1MzE3ODcxMzc2JTJDJTIydyUyMiUzQTE5MjAlMkMlMjJoJTIyJTNBMTA4MCUyQyUyMmliMjIlM0E5MzclMkMlMjJlJTIyJTNBMTkyMCUyQyUyMmwlMjIlM0ElMjJodHRwcyUzQSUyRiUyRnByZXZpZXcuY29sb3JsaWIuY29tJTJGdGhlbWUlMkZzaWRlYmFyJTJGY29sb3JsaWItc2lkZWJhci12MDElMkYlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkYlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBLTYwJTJDJTIycSUyMiUzQSU1QiU1RCU3RA=="></script>
</head>

<body>
    
<?php
require("../components/mainnav.php");
?>
    <!--aricle 1-->
    <div class="article">

        <div class="kep">

            <img src="../keps/guppi.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Guppi</h1>

            <h2 class="cim">Díszhalak</h2>
            <p> A Karib-térségből származó édesvízi hal kétségtelenül az egyik legnépszerűbb akváriumi díszhal. A guppi igénytelen halnak számít, így az akváriumok világában kezdők számára is alkalmas. </p>
                <details>
                <summary>Több információ</summary>
               <p> A színes, maximum 5 cm-es nagyságúra növő díszhal eredeti élőhelyén rajokban él. Az akváriumba ezért szintén kisebb csapatba érdemes költöztetni. A társaságkedvelő guppi kiválóan megérti magát más halfajtákkal – különösen a páncélosharcsákkal. A guppik egyébként nagyon gyorsan szaporodnak, és a szárazeledelt, illetve az élő eledelt is szívesen fogyasztják.</p>
              
               <ul>
                <li>Eredet: Dél-Amerika északi részei, a Karib-térség egyes részei</li>
                <li>Hossz: 3-5 cm</li>
                <li>Tartás: rajokban</li>
                <li>Tartás: rajokban</li>
                <li>Nehézségi fok: egyszerű</li>
                <li>Akvárium: édesvízi akvárium, legalább 54 l-es űrtartalom (külső hossz 60 cm)</li>
                <li>Vízértékek: optimális hőmérséklet 24-27°C, optimális ph-érték 6-7,5</li>
                <li>Szocializáció: különösen kedveli a páncélosharcsákat, de a nőstény harcoshalakat, a császárlazacokat, a dániókat, a törpe gurámikat, a vöröstorkú díszcsukákat, a garnélákat és a közönséges vértesharcsákat is</li>
                <li>Eledel: száraz pehely, heti 1-3 alkalommal fagyasztott vagy élő növényekkel és állatokkal kiegészítve</li>
                <li>Különlegességek: nagyon könnyű a gondozása, szereti a sűrű növényzetet, különösen szeret úszni, gyorsan szaporodik (Aki tehát utóbbit szeretné elkerülni saját akváriumában, csak az egyik nemből vásárlijon guppikat, például csak hím guppikat.)</li>
                </ul>
                </details>
                </span>
            </p>
            

        </div>
    </div>
    <br>
<!--aricle 2-->
    <div class="article">

        <div class="kep">

            <img src="../keps/neonhal.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Neonhal</h1>
            <h2 class="cim">Díszhalak</h2>

            <p>
            Világító piros és kék csíkjaival a neonhal igazi látványosságnak számít az akváriumban. Ezek a kis halak az Amazonas-medence régiójából származnak és csak rajokban érzik jól magát. Az akváriumban tehát legalább 10 neonhalat tartson együtt – de igazából minél többet, annál jobb. Ez a mottó pedig az akváriumra is érvényes, mely legalább 60 l-es űrtartalmú kell, hogy legyen.
            </p>
            <details>
                <summary>Több információ</summary>
                <ul>
                    <li>Eredet: Dél-Amerika: Peru</li>
                    <li>Hossz: 4 cm</li>
                    <li>Tartás: rajokban</li>
                    <li>Úszási magasság: középen</li>
                    <li>Nehézségi fok: egyszerű</li>
                    <li>Akvárium: édesvízi akvárium, legalább 54 l-es űrtartalom (külső hossz 60 cm)</li>
                    <li>Vízértékek: 20-26°C, 5-6,8 ph-érték</li>
                    <li>Szocializáció: jól kijön kisebb, békés természetű édesvízi halakkal, melyek szintén Dél-Amerikából származnak; a pillangó törpesügérrel ráadásul egyfajta szimbiózisban él: a vadonélő pillangó törpesügér megfigyeli a magasban úszó neonhalakat, hogy azok viselkedéséből tájékozódjon a veszélyekről</li>
                    <li>Eledel: élő és száraz eledel</li>
                    <li>Különlegességek: Irizáló kék oldalcsíkjai leginkább az akvárium enyhe megvilágításával bontakoznak ki. A neonhalak természetükből adódóan az enyhén savas vizet szeretik, de magasabb ph-értéket és keménységi fokot is elviselnek. Igazán robosztusnak számítanak, de nem kerülik őket a betegségek sem. Gyakorta előforduló betegségük a neonbetegség.</li>
                </ul>
               
                </details>
                </span>
            </p>
        
        </div>
    </div>
    <br>
    <!--aricle 3-->
    <div class="article">

        <div class="kep">

            <img src="../keps/platti.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Platti</h1>

            <h2 class="cim">Díszhalak</h2>
            <p>
            A kedvelt díszhal, a fekete molli tulajdonképpen a Dél- és Közép-Amerikában őshonos jukatáni fogasponty fekete tenyészalakja. A különböző tenyészalakokkal való keresztezés következtében különböző uszonyformái is létrejöttek. Így létezik kis, kerek hátuszonyú, hosszú hátuszonyú és vitorlás uszonyú fekete molli is.
            <p>A 6-10 cm nagyságú, koromfekete díszhalak robosztusnak számítanak, gondozásuk pedig könnyű. Mindazonáltal ezek a melegkedvelő példányok érzékenyen tudnak reagálni a víz hőmérsékletének és keménységének ingadozására.</p>
                </p>
                <details>
                    <summary>Több információ</summary>
                  
                    <ul>
                        <li>Eredet: Közép-Amerikától Kolumbiáig</li>
                        <li>Hossz: 6-10 cm</li>
                        <li>Tartás: rajokban</li>
                        <li>Úszási magasság: középen</li>
                        <li>Nehézségi fok: egyszerű</li>
                        <li>Akvárium: édesvízi akvárium, kb. 100 l-es űrartalom (Kis uszonyú fekete mollik esetében, egy hímmel elég a 60 l-es is.)</li>
                        <li>Vízértékek: 24°C–28 °C, pH-érték 7,2–8,2</li>
                        <li>Szocializáció: A fekete mollik békés halnak számítanak és több, szintén barátságos díszhallal jól kijönnek, például a guppikkal, a plattikkal, a páncélosharcsákkal, a vitorláshalakkal, a pontylazacokkal és a törpe gurámikkal is. Nagyobb pontylazacok és bölcsőszájúhal-félék társaságában azonban szégyenlősebbek lehetnek.</li>
                        <li>Eledel: előnyben részesítik a növényi étrendet, főleg az algákat, de a száraz eledelt és a szúnyoglárvákat is szeretik</li>
                        <li>Különlegességek: A fekete mollik a meleget kedvelik. Az ajánlott vízhőmérséklet lehetőleg mindig ugyanannyi legyen, valahol 24°C és 28°C között. Ha a nem érzik jól magukat, hintázó mozdulattal jelzik.</li>
                    </ul>
                    </details>
                    </span>
                </p>

        </div>
    </div>
    <br>
    <!--aricle 4-->

    <div class="article">

        <div class="kep">

            <img src="../keps/pancelos.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Páncélosharcsa</h1>
            <h2 class="cim">Díszhalak</h2>
             <p>
             A többféle díszhal által lakott akváriumok egy másik kedvelt fajtája a páncélosharcsa, mely a Cordyoras nemébe tartozik. Közeli rokonával, a torokátum harcsával ellentétben ő kedveli a fajtársak társaságát. Így érdemes őket legalább párban tartani az akváriumban.
            </p>
            <p>Nevét sima, egymáson elhelyezkedő csontlemezeinek köszönheti, melyek fejtől farokuszonyig védik testét, akárcsak egy páncél. További ismertetőjegye feltűnő bajsza a szája körül, mellyel a szagokat érzékeli és szívesen vizsgálódik a földön.</p>
            <details>
                <summary>Több információ</summary>
                <ul>
                    <li>Eredet: Venezuelától Argentiniáig és Uruguayig</li>
                    <li>Hossz: 2-8 cm</li>
                    <li>Tartás: rajokban</li>
                    <li>Úszási magasság: lent</li>
                    <li>Nehézségi fok: egyszerű</li>
                    <li>Akvárium: édesvízi akvárium, legalább 60 l-es űrtartalom</li>
                    <li>Vízértékek: a legtöbb fajta 22°C és 28°C fok között érzi jól magát, ph-érték 7-8</li>
                    <li>Szocializáció: A páncélosharcsa békeszerető, szinte majdnem minden díszhallal szívesen él együtt, például pontylazacokkal, plattikkal, guppikkal, szivárványhalakkal, márnákkal és fekete mollikkal is. Problémák csak nagyobb termetű, nagyon aktív halakkal adódhatnak, mint például a bölcsőszájúhal-félékkel.</li>
                    <li>Eledel: élő és száraz eledel</li>
                    <li>Különlegességek: Számtalan különböző fajtája létezik. Ezek méretükben és színükben nem igazán különböznek, inkább a vízhőmérsékletre vonatkozó igényük eltérő a különböző származási helyeik miatt. Ha páncélosharcsát szeretne, mindenképp tájékozódjon a konkrét fajtáról.</li>
                </ul>
                </details>
                </span>
            </p>

        </div>
    </div>
    <!--aricle 5-->

    <div class="article">

        <div class="kep">

            <img src="../keps/molli.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Fekete molli</h1>
            <h2 class="cim">Díszhalak</h2>
             <p>
             A kedvelt díszhal, a fekete molli tulajdonképpen a Dél- és Közép-Amerikában őshonos jukatáni fogasponty fekete tenyészalakja. A különböző tenyészalakokkal való keresztezés következtében különböző uszonyformái is létrejöttek. Így létezik kis, kerek hátuszonyú, hosszú hátuszonyú és vitorlás uszonyú fekete molli is.
            </p>
            <p>A 6-10 cm nagyságú, koromfekete díszhalak robosztusnak számítanak, gondozásuk pedig könnyű. Mindazonáltal ezek a melegkedvelő példányok érzékenyen tudnak reagálni a víz hőmérsékletének és keménységének ingadozására.</p>
            <details>
                <summary>Több információ</summary>
                <ul>
                    
                <li>Eredet: Közép-Amerikától Kolumbiáig</li>
                <li>Hossz: 6-10 cm</li>
                <li>Tartás: rajokban</li>
                <li>Úszási magasság: középen</li>
                <li>Nehézségi fok: egyszerű</li>
                <li>Akvárium: édesvízi akvárium, kb. 100 l-es űrartalom (Kis uszonyú fekete mollik esetében, egy hímmel elég a 60 l-es is.)</li>
                <li>Vízértékek: 24°C–28 °C, pH-érték 7,2–8,2</li>
                <li>Szocializáció: A fekete mollik békés halnak számítanak és több, szintén barátságos díszhallal jól kijönnek, például a guppikkal, a plattikkal, a páncélosharcsákkal, a vitorláshalakkal, a pontylazacokkal és a törpe gurámikkal is. Nagyobb pontylazacok és bölcsőszájúhal-félék társaságában azonban szégyenlősebbek lehetnek.</li>
                <li>Eledel: előnyben részesítik a növényi étrendet, főleg az algákat, de a száraz eledelt és a szúnyoglárvákat is szeretik</li>
                <li>Különlegességek: A fekete mollik a meleget kedvelik. Az ajánlott vízhőmérséklet lehetőleg mindig ugyanannyi legyen, valahol 24°C és 28°C között. Ha a nem érzik jól magukat, hintázó mozdulattal jelzik.</li>
                </ul>
                </details>
                </span>
            </p>

        </div>
    </div>
    <!--aricle 6-->

    <div class="article">

        <div class="kep">

            <img src="../keps/diszkoszhal.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Diszkoszhal</h1>
            <h2 class="cim">Díszhalak</h2>
             <p>
             A diszkoszhal nevét a formájának köszönheti: Ez a színes díszhal úgy siklik a vízben, mint egy lebegő diszkoszkorong. Így nem csoda, hogy nem csak a tapasztalt akvaristák lelkesednek iránta.
            </p>
            <p>Ettől függetlenül ennek a fejedelmi küllemű édesvízi halnak kifejezetten nagy igényei vannak a vízminőséget illetően, ugyanis nagyon hajlamos a bakteriális fertőzésekre és a parazitákra. Ha mégsem szeretne lemondani a diszkoszhalról, folyamatosan tisztítania kell az akváriumot és a lehető legsterilebben tartania.</p>
            <details>
                <summary>Több információ</summary>
                <ul>
                   
                <li>Eredet: Amazónia, Peru, Kolumbia és Brazília gyökerekben gazdag biotópjai</li>
                <li>Hossz: 12-15 cm</li>
                <li>Tartás: rajokban 6-8 hallal együtt</li>
                <li>Úszási magasság: középen / lent</li>
                <li>Nehézségi fok: igényes</li>
                <li>Akvárium: édesvízi akvárium, 250 l-es űrtartalom</li>
                <li>Vízértékek: 26°C–30°C, pH-érték 5–7,8</li>
                <li>Szocializáció: Egy hím és egy vagy több nőstény legjobban harcsafélékkel, plattikkal, pontylazacokkal, törpe gurámikkal, kövihalakkal és szivárványhalakkal jön ki. Másfajta harcoshalakkal és egyéb agresszív halakkal azonban nem érdemes egy akváriumban tartani. Hosszúuszonyú halakkal, mint például guppival, szintén nem érdemes tartani, mivel a hímek konkurenciát látnak bennük.</li>
                <li>Eledel: száraztáp (legjobb kifejezetten a Bettáknak készült eledel), néha-néha élő vagy fagyasztott eledel</li>
                <li>Különlegességek: A legtöbb halfajtával ellentétben a labirintkopoltyús halak nem kizárólag a kopoltyújukon lélegeznek, mivel van egy különleges szervük, melynek köszönhetően a szájukon keresztül a légkörből is fel tudják venni az oxigént. Így képesek oxigénszegény vízben is túlélni, s összességében robosztus, könnyen gondozható halak.</li>
                </ul>
                </details>
                </span>
            </p>

        </div>
    </div>
    <!--aricle 7-->

    <div class="article">

        <div class="kep">

            <img src="../keps/sziami.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Sziámi harcoshal</h1>
            <h2 class="cim">Díszhalak</h2>
             <p>
             A Kambodzsából és Thaiföldről származó sziámi harcoshal egyike a legszínpompásabb labirintkopoltyús halaknak. Az eredetileg piros-barna színű hal tenyésztésének köszönhetően már sok más színkombinációban is kapható. Pirostól a kéken át már feketében is elérhető, különböző hosszúságban és mindenféle színű uszonyokkal.
            </p>
            <p>A harcoshal kissé provokatív nevét annak köszönheti, hogy a hímek nagyon agresszívak fajtársaikkal. Ha a riválisok egymásra támadnak, széttépik egymás uszonyait és addig harcolnak, míg egyikük meg nem hal. Egy akváriumban tehát mindig csak egy hímet tartson.</p>
            <p>Nőstényekkel és más halfajtákkal szemben valamivel barátságosabb. Mindazonáltal tájékozódjon róla, mielőtt más halakkal is egy akváriumba tenné.</p>
            <details>
                <summary>Több információ</summary>
                <ul>
                    <li>Eredet: Délkelet-Ázsia (Kambodzsa és Thaiföld)</li>
                    <li>Hossz: 5-7 cm</li>
                    <li>Tartás: legjobb egyedül, vagy párban, illetve háremben (egy hím egy vagy több nősténnyel)</li>
                    <li>Úszási magasság: fent</li>
                    <li>Nehézségi fok: egyszerű</li>
                    <li>Akvárium: édesvízi akvárium, legalább 54 l-es űrtartalom</li>
                    <li>Vízértékek: 24°C –30°C, pH-érték 6,0–7,5</li>
                    <li>Szocializáció: Egy hím és egy vagy több nőstény legjobban harcsafélékkel, plattikkal, pontylazacokkal, törpe gurámikkal, kövihalakkal és szivárványhalakkal jön ki. Másfajta harcoshalakkal és egyéb agresszív halakkal azonban nem érdemes egy akváriumban tartani. Hosszúuszonyú halakkal, mint például guppival, szintén nem érdemes tartani, mivel a hímek konkurenciát látnak bennük.</li>
                    <li>Eledel: száraztáp (legjobb kifejezetten a Bettáknak készült eledel), néha-néha élő vagy fagyasztott eledel</li>
                    <li>Különlegességek: A legtöbb halfajtával ellentétben a labirintkopoltyús halak nem kizárólag a kopoltyújukon lélegeznek, mivel van egy különleges szervük, melynek köszönhetően a szájukon keresztül a légkörből is fel tudják venni az oxigént. Így képesek oxigénszegény vízben is túlélni, s összességében robosztus, könnyen gondozható halak.
                    </li>
                </ul>
                </details>
                </span>
            </p>

        </div>
    </div>
    <!--aricle 8-->

    <div class="article">

        <div class="kep">

            <img src="../keps/pancelos.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Páncélosharcsaj</h1>
            <h2 class="cim">Díszhalak</h2>
             <p>
             A többféle díszhal által lakott akváriumok egy másik kedvelt fajtája a páncélosharcsa, mely a Cordyoras nemébe tartozik. Közeli rokonával, a torokátum harcsával ellentétben ő kedveli a fajtársak társaságát. Így érdemes őket legalább párban tartani az akváriumban.
            </p>
            <p>Nevét sima, egymáson elhelyezkedő csontlemezeinek köszönheti, melyek fejtől farokuszonyig védik testét, akárcsak egy páncél. További ismertetőjegye feltűnő bajsza a szája körül, mellyel a szagokat érzékeli és szívesen vizsgálódik a földön.</p>
            <details>
                <summary>Több információ</summary>
                <ul>
                    <li>Eredet: Venezuelától Argentiniáig és Uruguayig</li>
                    <li>Hossz: 2-8 cm</li>
                    <li>Tartás: rajokban</li>
                    <li>Úszási magasság: lent</li>
                    <li>Nehézségi fok: egyszerű</li>
                    <li>Akvárium: édesvízi akvárium, legalább 60 l-es űrtartalom</li>
                    <li>Vízértékek: a legtöbb fajta 22°C és 28°C fok között érzi jól magát, ph-érték 7-8</li>
                    <li>Szocializáció: A páncélosharcsa békeszerető, szinte majdnem minden díszhallal szívesen él együtt, például pontylazacokkal, plattikkal, guppikkal, szivárványhalakkal, márnákkal és fekete mollikkal is. Problémák csak nagyobb termetű, nagyon aktív halakkal adódhatnak, mint például a bölcsőszájúhal-félékkel.</li>
                    <li>Eledel: élő és száraz eledel</li>
                    <li>Különlegességek: Számtalan különböző fajtája létezik. Ezek méretükben és színükben nem igazán különböznek, inkább a vízhőmérsékletre vonatkozó igényük eltérő a különböző származási helyeik miatt. Ha páncélosharcsát szeretne, mindenképp tájékozódjon a konkrét fajtáról.</li>
                </ul>
                </details>
                </span>
            </p>

        </div>
    </div>
    <!--aricle 9-->

    <div class="article">

        <div class="kep">

            <img src="../keps/vitorlas.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Vitorláshal</h1>
            <h2 class="cim">Díszhalak</h2>
             <p>
             A vitorláshalak nyílszerű formájuk miatt feltűnőek, melyet sugaras uszonyuknak köszönhetnek. Nyílformájú, illetve háromszögszerű testük mellett termetük is igazán lenyűgöző. A vitorláshalak ugyanis akár 15 cm hosszúak és 25 cm magasak is lehetnek.
            </p>
            <p>Ebből adódóan az akváriumnak is elég magasnak kel lennie. Ami azonban a vízminőséget és az eledelt illeti, a bölcsőszájúhal-félék családjához tartozó vitorláshal kifejezetten igénytelen.</p>
            <details>
                <summary>Több információ</summary>
                <ul>
                    <li>Eredet: Amazonas-medence Perutól Guyanaig</li>
                    <li>Hossz: maximum 15 cm</li>       
                    <li>Tartás: rajokban</li>
                    <li>Úszási magasság: középen</li>
                    <li>Nehézségi fok: közepes</li>
                    <li>Akvárium: édesvízi akvárium, 250 l-es űrtartalom, akvárium magassága minimum 50 cm</li>
                    <li>Vízértékek: 24°C–30°C, pH-érték 6–7,5</li>
                    <li>Szocializáció: A harcsákat és a nagyobb pontylazacokat kedveli a legjobban, a nagyon kis méretű halakat azonban, mint például a neonhal, megeszi.</li>
                    <li>Eledel: kiváló minőségű száraztáp, heti 1-3 alkalommal élő vagy fagyasztott eledel (pl. szúnyoglárva), illetve növényi köret</li>
                    <li>Különlegességek: A vitorláshalak számos variációban elérhetőek, különböző formájú uszonnyal és eltérő színekben. Mivel mindenevők és nem igazán válogatósak az eledel terén, érdemes figyelni rá, nehogy túletessük őket.
                    </li>
                </ul>
                </details>
                </span>
            </p>

        </div>
    </div>
    <!--aricle 10-->

    <div class="article">

        <div class="kep">

            <img src="../keps/suger.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Pillangó törpesügér</h1>
            <h2 class="cim">Díszhalak</h2>
             <p>
             A pillangó törpesügér ramirezi néven is ismert, s az akvárium szelíd lakójának számít. Éppen ezért nem érdemes túl élénk vagy túl agresszív halakkal együtt tartani.
            </p>
            <p>Eredeti élőhelyén, Venezuela és Kolumbia növénydús vizeiben általában párban él. Az ivadékokról pedig a pár mindkét tagja egyenlő mértékben gondoskodik. Ennek megfelelően az akváriumban is mindig párban kell őket tartani, egy hímet és egy nőstényt.</p>
            <details>
                <summary>Több információ</summary>
                <ul>
                    <li>Eredet: Dél-Amerika (Venezuela és Kolumbia szavannáinak vizében)</li>
                    <li>Hossz: maximum 5 cm</li>
                    <li>Tartás: párban (az akvárium méretétől függően akár több párt is egyszerre)</li>
                    <li>Úszási magasság: alul</li>
                    <li>Nehézségi fok: igényes</li>
                    <li>Akvárium: édesvízi akvárium, minimum 50 l-es űrtartalom</li>
                    <li>Vízértékek: 24°C–28°C, pH-érték 5–7</li>
                    <li>Szocializáció: Legjobban a vízfelszín közelében élő pontylazacokkal, illetve törpesügérekkel jön ki; más, élénkebb édesvízi hallal inkább problémás az együttélése.</li>
                    <li>Eledel: élő és fagyasztott eledel, néha pehely</li>
                    <li>Különlegességek: A pillangó törpesügér egy kifejezetten érzékeny halnak számít, mely igényes a vízminőséggel szemben. Alacsony nitrittartalomra és állandó, jó vízminőségre van szüksége. Ha ilyen halakat tart, rendszeresen ki kell cserélnie legalább a víz egy részét.</li>
                </ul>
                </details>
                </span>
            </p>

        </div>
    </div>
    <!--aricle 11-->

    <div class="article">

        <div class="kep">

            <img src="../keps/zebradanio.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Zebradánió</h1>
            <h2 class="cim">Díszhalak</h2>
             <p>
             Az élénk, úszáskedvelő zebradánió igen népszerű az akvaristák körében. Kezdőknek is alkalmas, mivel gondozása könnyű, és sok más édesvízi halfajtával jól megfér, így nem okozhat túl nagy problémát.
            </p>
            <p>A maximum 5 cm-es halacska nevét sötétkék, hosszú csíkjainak köszönheti – hiszen egy zebrára hasonlít. Ezek a kicsi, vékonyka halak rajokban élnek. A hosszúkás akváriumot és az enyhe vízsodrást kedvelik.</p>
            <details>
                <summary>Több információ</summary>
                <ul>
                    <li>Eredet: Dél-Ázsia (India és Pakisztán folyós vidékei)</li>
                    <li>Hossz: maximum 5 cm (a hímek valamivel kisebbek és karcsúbbak)</li>
                    <li>Tartás: rajokban, minimum 8 hallal együtt</li>
                    <li>Úszási magasság: középen</li>
                    <li>Nehézségi fok: könnyű</li>
                    <li>Akvárium: édesvízi akvárium, kb. 100 l-es űrtartalom</li>
                    <li>Vízértékek: 20°C–26°C, ph-érték 6–7,8</li>
                    <li>Szocializáció: A zebradániót könnyű más halakkal együtt tartani, de természetesen nem mindegyik halfajtával, hiszen ők a nyugalmat és a meleget kedvelik. Kiváló társa például a kéksügér és a rózsás díszmárna.</li>
                    <li>Eledel: algák, száraz és élő eledel</li>
                    <li>Különlegességek: A kinézetük mellett a zebradániók kiváló ugrók, akik szívesen ugranak egyet a vízfelszínre. Ha tehát ilyen halat tart, a biztonság kedvéért inkább mindig fedje le az akváriumot. Érdekesség: Az USA-ban léteznek génmanipulált tenyészalakjai, melyek világító neonszínűek, őket ,,GloFishes”-nek nevezik.
                    </li>
                </ul>
                </details>
                </span>
            </p>

        </div>
    </div>

    <div class="vissza1">
        <a href="diszallatok.php">Vissza</a>
    </div>
    <?php
  require("../components/footer.php");
  ?>
    <!-- nav scriptek -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script defer=""
        src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon="{&quot;rayId&quot;:&quot;799ed0aa7ac3c24a&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2023.2.0&quot;,&quot;si&quot;:100}"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="navbar.js"></script>


    <!-- nav scriptek -->
    <script src="../js/script.js"></script>
 


</body>

</html>