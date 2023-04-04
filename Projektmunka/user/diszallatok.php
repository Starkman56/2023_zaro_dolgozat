<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem

    //Elemek meghívása
require("../kapcsolat/kapcs.php");


?>
<!DOCTYPE html>
<html lang="hu">

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
   
    <script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyU2lkZWJhciUyMCUyMzElMjIlMkMlMjJ4JTIyJTNBMC43NTcwNjQ1MzE3ODcxMzc2JTJDJTIydyUyMiUzQTE5MjAlMkMlMjJoJTIyJTNBMTA4MCUyQyUyMmolMjIlM0E5MzclMkMlMjJlJTIyJTNBMTkyMCUyQyUyMmwlMjIlM0ElMjJodHRwcyUzQSUyRiUyRnByZXZpZXcuY29sb3JsaWIuY29tJTJGdGhlbWUlMkZzaWRlYmFyJTJGY29sb3JsaWItc2lkZWJhci12MDElMkYlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkYlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBLTYwJTJDJTIycSUyMiUzQSU1QiU1RCU3RA=="></script>
    <title>Diszallatok</title>
</head>

<body>
<?php
require("../components/mainnav.php");
?>
    <!--Website container-->
    
    
<div class="diszallatokmain">
  <div class="alap animate__animated animate__backInLeft hover-img2">    
  <a href="../user/madarak.php"><img class="diszallatokkep " src="../keps/petbirds.png" alt=""><figcaption>Madarak</figcaption></a>
  </div>
  <div class="alap szoveg animate__animated animate__backInRight">
  <p >A díszmadarak káprázatosan színes és barátságos fajaiból, a papagájok és díszpintyek között minden madártartó megtalálhatja leendő kedvencét. Színes apróságok és kézzel nevelt szelíd nagy papagájok megvásárolhatók üzletünkben. A madarak nagy része ellenőrzött tenyészetünkből származik.Üzletünkben megtalálható illetve megrendelhető minden díszmadár számára az ideális táplálék, kalitka és egyéb szükséges felszerelés.
  <p> Különböző méretben és színben a vevő és a díszmadár igényeihez igazodva. A papagájok kedvelt időtöltése a játék, ezért nefeledkezzünk el gondoskodni erről sem. Fa és műanyag játékok, hinták, létrák, tükrök mind a szárnyas kedvencünk boldog mindennapjainakkellékei.</p>
 <p> A táplálékok között minden fajnak megtalálható a leg ideálisabb összeállítás. Etetők és itatók széles választékban kaphatóak minden méretű díszmadárhoz.</p>
  </div>
  <div class="alap szoveg animate__animated animate__backInLeft">
  <p>A díszhalak tartása egyre népszerűbb. Nem csoda, hiszen a nappalinkban csodálni a vízi élővilágot nem csak lenyűgöző, hanem nyugtatóan is hat hektikus hétköznapjainkban.
    <p>  Az állatkereskedésben fajták százaival találkozhat. Nem mindegyik ugyanolyan alkalmas azonban egy házi akváriumba. A táppal, növényekkel, vízminőséggel és vízhőmérséklettel kapcsolatos igények minden halnál különbözőek, így választásuknál ezeket is mindenképp figyelembe kell venni. Szintén előre érdemes meggyőződni arról, hogy a kiválasztott díszhalak jól kijöjjenek egymással.</p>
     <p> A következőkben bemutatjuk Önnek a tíz legnépszerűbb édesvízi akváriumba való díszhalat. Ezenkívül részletesen elmagyarázzuk, mire érdemes ezek kiválasztásánál mindenképp odafigyelnie.</p>
  </div>
  <div class="alap animate__animated animate__backInRight hover-img2">
  <a href="../user/diszallatok.php"> <img class="diszallatokkep" src="../keps/petfish.jpg" alt=""><figcaption>Diszhalak</figcaption></a>
  </div>
  <div class="alap animate__animated animate__backInLeft hover-img2">    
  <a href="../user/webshop.php"><img class="diszallatokkep " src="../keps/petrodents.png" alt=""><figcaption>Kisállatok</figcaption></a>
  </div>
  <div class="alap szoveg animate__animated animate__backInRight">
  <p>Ha azt gondolnánk, hogy kisállatot tartani gyerekjáték, akkor nagyon is tévedünk.</p>
  <p>Minden kisállat odafigyelést és sok törődést igényel. A kisemlősök népszerűségüket annak köszönhetik, hogy még kifejlett állapotukban is egy kölyök méreteivel rendelkeznek. A megfelelő tartásukhoz rengeteg rágcsálnivaló és sok – sok törődés kell. Ezek az állatok ugyanis szeretik a társaságot, és nagyon ragaszkodnak a gazdájukhoz.</p>
<p> Hogy milyen fajtát választunk, az már csak rajtunk múlik, mivel egyre több lehetőség áll rendelkezésünkre. Üzletünkben számos hörcsög, tengerimalac és nyúl fajtából válogathat.

  </div>
</div>

    <!-- nav scriptek -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon="{&quot;rayId&quot;:&quot;799ed0aa7ac3c24a&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2023.2.0&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="navbar.js"></script>

    <!-- nav scriptek -->
    <script src="../js/script.js"></script>
  <?php
  require("../components/footer.php");
  ?>  


  </body>

</html>