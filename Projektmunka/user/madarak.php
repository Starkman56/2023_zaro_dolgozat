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
    <script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyU2lkZWJhciUyMCUyMzElMjIlMkMlMjJ4JTIyJTNBMC43NTcwNjQ1MzE3ODcxMzc2JTJDJTIydyUyMiUzQTE5MjAlMkMlMjJoJTIyJTNBMTA4MCUyQyUyMmolMjIlM0E5MzclMkMlMjJlJTIyJTNBMTkyMCUyQyUyMmwlMjIlM0ElMjJodHRwcyUzQSUyRiUyRnByZXZpZXcuY29sb3JsaWIuY29tJTJGdGhlbWUlMkZzaWRlYmFyJTJGY29sb3JsaWItc2lkZWJhci12MDElMkYlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkYlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBLTYwJTJDJTIycSUyMiUzQSU1QiU1RCU3RA=="></script>
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
    <script defer="" referrerpolicy="origin"
        src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyU2lkZWJhciUyMCUyMzElMjIlMkMlMjJ4JTIyJTNBMC43NTcwNjQ1MzE3ODcxMzc2JTJDJTIydyUyMiUzQTE5MjAlMkMlMjJoJTIyJTNBMTA4MCUyQyUyMmolMjIlM0E5MzclMkMlMjJlJTIyJTNBMTkyMCUyQyUyMmwlMjIlM0ElMjJodHRwcyUzQSUyRiUyRnByZXZpZXcuY29sb3JsaWIuY29tJTJGdGhlbWUlMkZzaWRlYmFyJTJGY29sb3JsaWItc2lkZWJhci12MDElMkYlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkYlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBLTYwJTJDJTIycSUyMiUzQSU1QiU1RCU3RA=="></script>
</head>

<body>
<?php
require("../components/mainnav.php");
?>
    <!--aricle 1-->
    <div class="article">

        <div class="kep">

            <img src="../keps/madar1.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Kanári</h1>

            <h2 class="cim">Díszmadarak</h2>
            <p> Népszerű kalitkamadár, szép énekéért sokan tartják. Elhelyezés: A kalitkát mindig
                huzatmentes, világos (gyenge napfény) helyen, lehetőleg sarokban minimum 100 cm-es magasságban helyezzük
                el. Alapvető szabály, hogy a kalitka szélességének legalább akkorának kell lennie, hogy a madár
                akadálytalanul kinyithassa szárnyait, amennyiben ez mégsem megoldható akkor a madarat naponta felügyelet
                mellett engedjük ki röpködni a lakásba. </p>
                <details>
                <summary>Több információ</summary>
               <p> A kalitkát mindig huzatmentes, világos (gyenge napfény) helyen, lehetőleg sarokban minimum 100 cm-es
                    magasságban helyezzük el. Alapvető szabály, hogy a kalitka szélességének legalább akkorának kell
                    lennie, hogy a madár akadálytalanul kinyithassa szárnyait, amennyiben ez mégsem megoldható akkor a
                    madarat naponta felügyelet mellett engedjük ki röpködni a lakásba. A kanári alapvető helyigénye: egy
                    madár részére 50x50x30 cm-es kalitka. Ne feledjük, itt is igaz a mondás, hogy a kalitka sohasem
                    lehet elég nagy.</p>
               <p> Berendezés: A kalitkában helyezzünk el kanári számára ajánlott etetőt és itatót, ülőrudat és
                    csőrkoptatót. A kalitka aljában madárhomok használata ajánlott.</p>
               <p>Kanári számára összeállított magkeverék, ezt egészítsük ki fürtös kölessel, lágyeleséggel,
                    gyümölccsel, zöldséggel. Gondoskodjunk madarunk megfelelő ásványi anyag utánpótlásáról.</p>
               <p>Ivóvizüket naponta cseréljük. A mindig egészséges szép tollazat megtartása miatt elengedhetetlen a
                    fürdés biztosítása madaraink számára. A kalitkát legalább heti egy alkalommal takarítsuk ki.</p>
                    <p>Testhossza: 12-13cm</p>
                    <p>Élettartam: 10év</p>
                </details>
                </span>
            </p>
            

        </div>
    </div>
    <br>
<!--aricle 2-->
    <div class="article">

        <div class="kep">

            <img src="../keps/pinty.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Zebrapinty</h1>
            <h2 class="cim">Díszmadarak</h2>

            <p>
            Hazánkban a hullámos papagáj után a zebrapinty a leggyakrabban tartott díszmadár. Vidám természetű, élénk mozgású, csicsergős madár aki szívesen fürdik.A kalitkát mindig huzatmentes, világos (gyenge napfény) helyen, lehetőleg sarokban minimum 100 cm-es magasságban helyezzük el. Alapvető szabály, hogy a kalitka szélességének legalább akkorának kell lennie, hogy a madár akadálytalanul kinyithassa szárnyait.
            </p>
            <details>
                <summary>Több információ</summary>
            
               <p>A kalitkában helyezzünk el pintyek számára javasolt etetőt és itatót, ülőrudat és csőrkoptatót. A kalitka aljában madárhomok használata ajánlott.</p>
               <p>A pintyek számára összeállított magkeveréket egészítsük ki lágy eleséggel, zöldséggel, gyümölccsel. Gondoskodjunk madarunk megfelelő ásványi anyag utánpótlásáról.</p>
               <p>Ivóvizüket naponta cseréljük. A mindig egészséges szép tollazat megtartása miatt elengedhetetlen a fürdés biztosítása madaraink számára. A kalitkát legalább heti egy alkalommal takarítsuk ki.</p>
               <p> Testhossz: 11-12 cm</p>
               <p> Élettartam: fogságban akár 5-15 év</p>
                </details>
                </span>
            </p>
        
        </div>
    </div>
    <br>
    <!--aricle 3-->
    <div class="article">

        <div class="kep">

            <img src="../keps/hullamos.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Hullámos papagáj</h1>

            <h2 class="cim">Díszmadarak</h2>
            <p>
            Az egyik legközkedveltebb papagáj a hullámos. Élénk színével, vidám természetével vidámságot visz a mindennapokba. A tenyésztőknek köszönhetően a zöld alapszín mellett kék, fehér vagy sárga tollazatú egyedek is létrejöttek. A kalitkát mindig huzatmentes, világos (gyenge napfény) helyen, lehetőleg sarokban minimum 100 cm-es magasságban helyezzük el. <br> Alapvető szabály, hogy a kalitka szélességének legalább akkorának kell lennie, hogy a madár akadálytalanul kinyithassa szárnyait. A javasolt minimális kalitkaméret egy madár számára: 50*30*40 cm, egy pár minimum: 75*40*50 cm-es kalitkát igényel. Itt is igaz a mondás, hogy a kalitka sohasem lehet elég nagy.
                </p>
                <details>
                    <summary>Több információ</summary>
                   <p>Berendezés: A kalitkában helyezzünk el hullámos papagáj számára ajánlott etetőt és itatót, ülőrudat és csőrkoptatót. A kalitka aljában madárhomok használata ajánlott.</p>
                   <p>: Hullámos papagáj számára összeállított magkeverék, ezt egészítsük ki fürtös kölessel, lágyeleséggel, gyümölccsel, zöldséggel. Gondoskodjunk madarunk megfelelő ásványi anyag utánpótlásáról.</p>
                   <p>Ivóvizüket naponta cseréljük. A mindig egészséges szép tollazat megtartása miatt elengedhetetlen a fürdés biztosítása madaraink számára. A kalitkát legalább heti egy alkalommal takarítsuk ki.</p>
                   <p> Testhossz: 12-13 cm</p>
                   <p> Élettartam: fogságban akár 10-15 év</p>
                    </details>
                    </span>
                </p>

        </div>
    </div>
    <br>
    <!--aricle 4-->

    <div class="article">

        <div class="kep">

            <img src="../keps/nimfa.png" alt="">
        </div>
        <div class="leiras">
            <h1 class="cim">Nimfa papagáj</h1>
            <h2 class="cim">Díszmadarak</h2>
             <p>
             A kalitkát mindig huzatmentes, világos (gyenge napfény) helyen, lehetőleg sarokban minimum 100 cm-es magasságban helyezzük el. Alapvető szabály, hogy a kalitka szélességének legalább akkorának kell lennie, hogy a madár akadálytalanul kinyithassa szárnyait. Itt is igaz a mondás, hogy a kalitka sohasem lehet elég nagy.
            </p>
            <details>
                <summary>Több információ</summary>
               <p>A kalitkában helyezzünk el nimfa papagáj számára ajánlott etetőt és itatót, ülőrudat és csőrkoptatót. A kalitka aljában madárhomok használata ajánlott.</p>
               <p>Nimfa papagáj számára összeállított magkeverék, ezt egészítsük ki fürtös kölessel, lágy eleséggel, gyümölccsel, zöldséggel. Gondoskodjunk madarunk megfelelő ásványi anyag utánpótlásáról.</p>
               <p>Ivóvizüket naponta cseréljük. A mindig egészséges szép tollazat megtartása miatt elengedhetetlen a fürdés biztosítása madaraink számára. A kalitkát legalább heti egy alkalommal takarítsuk ki.</p>
               <p> Testhossz: 28-32 cm</p>
               <p> Élettartam: fogságban akár 15-20 év</p>
               <p></p>
                </details>
                </span>
            </p>

        </div>
    </div>

    <div class="vissza1">
        <a href="diszallatok.php">Vissza</a>
    </div>

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
  <?php
  require("../components/footer.php");
  ?>


</body>

</html>