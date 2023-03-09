<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">

        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
        </a>
        
        <input class="KeresoItem" id="searchbar" onkeyup="search_item()" type="text"
        name="search" placeholder="Keresés a termékek között...">
        <div class="kosarikon">
            <p>0</p><i class="fa fa-shopping-cart"></i>
        </div>
    </div>
</nav>
<!-- Side Nav menu -->
<aside class="sidebar">
    </div>
    <div class="side-inner">

        <div class="counter d-flex justify-content-center">

            <div class="col">
                <a href="main.php">Főoldal</a>
            </div>
            <div class="col">
                <a href="#">Megrendelések</a>
            </div>
            <div class="col profilinfo">
                <a href="#">Profil</a>
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

                <li><a href="#">Stats</a></li>
                <li><a href="#">Sign out</a></li>
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