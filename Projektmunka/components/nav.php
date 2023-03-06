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

            <li>
                <div class="flex">

                    <a href="horgasz.php">Horgász felszerelések</a> 

                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn">⮟</button>
                        <div class="dropdown-content">
                            <a href="#">Horgászbot</a>
                            <a href="#">Orsó</a>
                            <a href="#">Etetőanyag,pellet,bojli</a>
                            <a href="#">Horgász iegészítő</a>
                            <a href="#">Ruházat</a>
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
                            <a href="#">1 2133123</a>
                            <a href="#">1 3</a>
                            <a href="#">1 3</a>
                        </div>
                
                </div>
            </li>

           <li>
                <div class="flex">

                <a href="#">Háztartási</a>

                <div class="dropdown" style="float:right;">
                        <button class="dropbtn">⮟</button>
                        <div class="dropdown-content">
                            <a href="#">13123 1</a>
                            <a href="#">1 123122</a>
                            <a href="#">1 2133123</a>
                            <a href="#">1 3</a>
                            <a href="#">1 3</a>
                        </div>
                
                </div>
            </li>


            <li>
                <div class="flex">

                    <a href="horgasz.php">Kézműves fatermékek</a> 

                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn">⮟</button>
                        <div class="dropdown-content">
                            <a href="#">1 1</a>
                            <a href="#">1 2</a>
                            <a href="#">1 3</a>
                            <a href="#">1 3</a>
                            <a href="#">1 3</a>
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
        <table></table>
    </div>
</div>