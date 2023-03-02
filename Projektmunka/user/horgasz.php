<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

if (!isset($_SESSION['belepett'])) {
    header("Location: false.html");
    exit();
}

require("../kapcsolat/kapcs.php");
$rendez = (isset($_GET['rendez'])) ? $_GET['rendez'] : "nev";
$kifejezes = (isset($_POST['kereso'])) ? $_POST['kereso'] : "";
$sql =  "SELECT * from keszlet 
INNER JOIN kategoriak 
ON kategoriak.id = keszlet.kategoriaid
WHERE kategoriak.id = 1";
$eredmeny = mysqli_query($dbconn, $sql);
$kimenet = "";

while ($sor = mysqli_fetch_assoc($eredmeny)) {
    $kimenet .=

        "
          <div class=\"card\">
              <img src=\"../keps/{$sor['foto']}\" alt=\"{$sor['nev']}\">
              <div class=\"card-body\">
                <h5 class=\"card-title\">{$sor['nev']}</h5>
              </div>
              <ul class=\"lista list-group list-group-flush\">
                <li class=\"list-group-item\">{$sor['nev']}</li>
                <li class=\"list-group-item\">{$sor['darab']}<span> Raktáron</span></li>
                <li class=\"list-group-item\">{$sor['ar']}<span> Ft </span></li>
                <input type='number'id='termekdarab' value='1'>
              </ul>
              <div class='gombok'>
              <button type='submit  ' class='btn btn-outline-dark kosarhoz'>Kosárba</button>
                <button type='submit' class='btn btn-outline-dark bovebben'>Bővebben</button>
                </div>
         </div>
       
            ";
}
$kimenet .= "";
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


    <link rel="stylesheet" href="css/bootstrap.min.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    

    <link rel="stylesheet" href="nav_style.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/ujstyle.css">
    <title>Sidebar #1</title>


    <script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyU2lkZWJhciUyMCUyMzElMjIlMkMlMjJ4JTIyJTNBMC43NTcwNjQ1MzE3ODcxMzc2JTJDJTIydyUyMiUzQTE5MjAlMkMlMjJoJTIyJTNBMTA4MCUyQyUyMmolMjIlM0E5MzclMkMlMjJlJTIyJTNBMTkyMCUyQyUyMmwlMjIlM0ElMjJodHRwcyUzQSUyRiUyRnByZXZpZXcuY29sb3JsaWIuY29tJTJGdGhlbWUlMkZzaWRlYmFyJTJGY29sb3JsaWItc2lkZWJhci12MDElMkYlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkYlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBLTYwJTJDJTIycSUyMiUzQSU1QiU1RCU3RA=="></script>
    
    <!--nav  linkek -->
</head>

<body>



<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
 
  <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>   
    
    <div class="kosarikon">
                    <p>0</p><i class="fa fa-shopping-cart"></i>
                </div>
  </div>
 
</nav>



    <!-- Nav menu -->



    <!-- Side Nav menu -->
    <aside class="sidebar">


        

        </div>
        <div class="side-inner">

            <div class="counter d-flex justify-content-center">

                <div class="col">
                    <a href="webshop.php">Főoldal</a>
                </div>
                <div class="col">
                    <a href="#">Megrendelések</a>
                </div>
                <div class="col">
                    <a href="#">Profil</a>
                </div>

            </div>
            <div class="nav-menu">
                <ul>

                    <li><a href="#"><span class="icon-home mr-3"></span>Horgász felszerelések</a></li>
                    <li><a href="#"><span class="icon-search2 mr-3"></span>Diszállat</a></li>
                    <li><a href="#"><span class="icon-notifications mr-3"></span>Háztartási cikk</a></li>
                    <li><a href="#"><span class="icon-location-arrow mr-3"></span>Kézműves fatermékek</a></li>
                    <li><a href="#"><span class="icon-pie-chart mr-3"></span>Stats</a></li>
                    <li><a href="#"><span class="icon-sign-out mr-3"></span>Sign out</a></li>


                </ul>
            </div>
        </div>
    </aside>





    <!--Website container-->
    <div class="container">
        <div class="cards">
            <?php
            print $kimenet;
            ?>
        </div>
    </div>

    <!-- kosár tartalma felugró ablakban fog megjelenni-->
    <div class="cartBox">
        <div class="cart">
            <!-- x gomb amivel bezárjuk-->
            <i class="fa fa-close"></i>
            <h1>Kosár tartalma</h1>
            <!-- táblázat, ahová az adatok kerülnek, amikor hozzá adják a kosárhoz-->
            <table></table>
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
    <script src="../script.js"></script>
</body>

</html>