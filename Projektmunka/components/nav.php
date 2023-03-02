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

                <li><a href="horgasz.php">Horgász felszerelések</a></li>
                <button type="button" class="gomb btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>

                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
                <li><a href="#">Diszállat</a></li>
                <button type="button" class="gomb btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>

                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
                <li><a href="#">Háztartási cikk</a></li>
                <button type="button" class="gomb btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>

                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
                <li><a href="#">Kézműves fatermékek</a></li>
                <button type="button" class="gomb btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>

                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>

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