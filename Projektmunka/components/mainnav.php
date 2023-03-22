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
   <span><img src="" alt=""></span>
   <span><img src="" alt=""></span>
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
<nav class="navbar navbar-expand-lg sticky-top  bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="main.php">
      <img src="../keps/logo.jpg" alt="Logo" width="90rem" >
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <div class="balra">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="main.php">Főoldal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="galeria.php">Galéria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="webshop.php">Webshop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#scroll">Kapcsolat</a>
        </li>
        </div>
      
        <div class="jobbrabb">
        <?php
        
      if (isset($_SESSION['belepett']) == false)
      {
        
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
        $bentvan = $_SESSION["felhnev"];
        $logout = '<a href="../user/logout.php"><li class="nav-item jobbra " id="logout">
        <img src="../keps/kilepesicon.jpg"  alt="Logo" width="35rem" >
        <a class="nav-link" href="../user/logout.php">Kilépés</a>
        </a></li><li class="nav-item jobbra">
        <p><a class="jelmodositas" onclick=profilinfo()>';
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
      </ul>

    </div>
  </div>
  <div class="profilinfo" id="profilid">
        
        <a href="../user/adatokmodositasa.php"><p>Adatok módosítása</p></a>
        <p>Megrendelések</p>
        <a href="../user/jelszomodositas.php"><p>Jelszó módosítása</p></a>  
   </div>
</nav>

<div class="cartBox">
    <div class="cart">
        <!-- x gomb amivel bezárjuk-->
        <i class="fa fa-close"></i>
        <h1>Kosár tartalma</h1>
        <!-- táblázat, ahová az adatok kerülnek, amikor hozzá adják a kosárhoz-->
        <table class="table"></table>
    </div>
</div>
