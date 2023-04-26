<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
if (!isset($_SESSION['belepett'])) {
}
    //Elemek meghívása
require("../kapcsolat/kapcs.php");
?>
<html lang="en">
<head>
    <?php
    require("../components/links.php")
    ?>
    <title>Webshop</title>
    <script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyU2lkZWJhciUyMCUyMzElMjIlMkMlMjJ4JTIyJTNBMC43NTcwNjQ1MzE3ODcxMzc2JTJDJTIydyUyMiUzQTE5MjAlMkMlMjJoJTIyJTNBMTA4MCUyQyUyMmolMjIlM0E5MzclMkMlMjJlJTIyJTNBMTkyMCUyQyUyMmwlMjIlM0ElMjJodHRwcyUzQSUyRiUyRnByZXZpZXcuY29sb3JsaWIuY29tJTJGdGhlbWUlMkZzaWRlYmFyJTJGY29sb3JsaWItc2lkZWJhci12MDElMkYlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkYlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBLTYwJTJDJTIycSUyMiUzQSU1QiU1RCU3RA=="></script>
</head>
<body>
<?php require("../components/mainnav.php"); ?>
    <!--Website container-->
<div class="webshopmain">
  <div class="alap animate__animated animate__backInLeft hover-img2">    
  <a href="horgasz.php"><img class="webshopkep " src="../keps/fishing.jpg" alt=""><figcaption>Horgász áru</figcaption></a>
  </div>
  <div class="alap animate__animated animate__backInRight hover-img2">
  <a href="diszallat.php"><img class="webshopkep" src="../keps/diszallat.jpg" alt=""><figcaption>Díszállatok</figcaption></a>
  </div>
  <div class="alap animate__animated animate__backInLeft hover-img2">
  <a href="haztartas.php"><img class="webshopkep" src="../keps/muanyag_termekek.jpg" alt=""><figcaption>Háztartási eszközök</figcaption></a>
  </div>
  <div class="alap animate__animated animate__backInRight hover-img2">
  <a href="kezmuvesfatermek.php"><img class="webshopkep" src="../keps/madareteto.jpg" alt=""><figcaption>Fa termékek</figcaption></a>
  </div>  
</div>
<?php
require("../components/footer.php");
?>
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
  </body>
</html>