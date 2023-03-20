<div class="background">
   <span><img src="../keps/fishbg1.png" alt=""></span>
   <span><img src="../keps/fishbg2.png" alt=""></span>
   <span><img src="../keps/fishbg3.png" alt=""></span>
   <span><img src="../keps/fishbg4.png" alt=""></span>
   <span><img src="../keps/fishbg5.png" alt=""></span>
   <span><img src="../keps/fishbg6.png" alt=""></span>
   <span><img src="../keps/fishbg7.png" alt=""></span>
   <span><img src="../keps/fishbg8.png" alt=""></span>
   <span><img src="../keps/fishbg9.png" alt=""></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
</div>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="main.php">
        <img src="../keps/logo.jpg" alt="Logo" width="90rem" >
        </a>
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
        </a>
        
        <input class="KeresoItem" id="searchbar" onkeyup="search_item()" type="text"
        name="search" placeholder="Keresés a termékek között...">
        <?php
      if (isset($_SESSION['belepett']) == false) {
        //header("Location: false.html");
        echo  '
        <a href="../belep.php" >
        <li class="nav-item jobbra " id="login">
        <img src="../keps/belepicon.jpg"  alt="Logo" width="35rem" >
        <a class="nav-link" href="../belep.php">Belépés</a>
        </li>
        </a>
        <a href="../register.php" >
          <li class="nav-item jobbra " id="register">
        <img src="../keps/registericon.jpg"  alt="Logo" width="35rem" >
        <a class="nav-link" href="../register.php">Regisztráció</a>
        </li>
        ';
      }
      else{
        $bentvan = $_SESSION["user_name"];
        $logout = '<a href="../user/logout.php"><li class="nav-item jobbra " id="logout">
        <img src="../keps/kilepesicon.jpg"  alt="Logo" width="35rem" >
        <a class="nav-link" href="../user/logout.php">Kilépés</a>
        </a></li><li class="nav-item jobbra">
        <p><a class="jelmodositas">';
        $logout.=$bentvan;
        $logout.='</a></p>
        </li>
        <div class="kosarikon">
              <p>0</p><i class="fa fa-shopping-cart"></i>
        </div>';
        echo $logout;
      }
      ?>
    </div>
    <div class="profilinfo" id="profilid">
        <p>Profil info</p>
        <p>Adatok módosítása</p>
   </div>
</nav>
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
                <a href="../belep.php">Belépés</a>
            </div>
        </div>


        <div class="nav-menu">
        <ul>

            <li>
                <div class="flex">

                    <a href="horgasz.php">Horgász felszerelések</a> 

                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn">⮟</button>
                        <div class="dropdown-content">
                            <a href="horgaszbot.php">Horgászbot</a>
                            <a href="orso.php">Orsó</a>
                            <a href="etetoanyag.php">Etetőanyag,pellet,bojli</a>
                            <a href="kiegeszito.php">Horgász kiegészítő</a>
                            <a href="ruhazat.php">Ruházat</a>
                        </div>
                </div>
            </li>


            <li>
                <div class="flex">

                <a href="#">Diszállat</a>

                <div class="dropdown" style="float:right;">
                        <button class="dropbtn">⮟</button>
                        <div class="dropdown-content">
                            <a href="#">Díszhal táp</a>
                            <a href="#">Rágcsáló táp</a>
                            <a href="#">Díszállat kiegészítő</a>
                            <a href="#">Kisállat alom</a>
                            <a href="#">Levegőztető,szűrő</a>
                        </div>
                
                </div>
            </li>

           <li>
                <div class="flex">

                <a href="#">Háztartási</a>

                <div class="dropdown" style="float:right;">
                        <button class="dropbtn">⮟</button>
                        <div class="dropdown-content">
                            <a href="#">Konyha</a>
                            <a href="#">Fürdőszoba</a>
                            <a href="#">Játék</a>
                            <a href="#">Dísz</a>
                            <a href="#">Ajándék</a>
                        </div>
                
                </div>
            </li>


            <li>
                <div class="flex">

                    <a href="horgasz.php">Kézműves fatermékek</a> 

                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn">⮟</button>
                        <div class="dropdown-content">
                            <a href="#">Madáretető</a>
                            <a href="#">Odu</a>
                            <a href="#">Kulcstartó</a>
                            <a href="#">Kenyértartó</a>
                            <a href="#">Fonott kosár</a>
                        </div>
                </div>
            </li>
                <li><a href="logout.php">Kijelentkezés</a></li>
            </ul>
        </div>
    </div>
</aside>


<!-- kosár tartalma felugró ablakban fog megjelenni-->
<div class="cartBox">
    <div class="cart">
        <!-- x gomb amivel bezárjuk-->
        <i class="fa fa-close"></i>
        <h1>Kosár tartalma</h1>
        <!-- táblázat, ahová az adatok kerülnek, amikor hozzá adják a kosárhoz-->
        <table class="table"></table>
    </div>
</div>

