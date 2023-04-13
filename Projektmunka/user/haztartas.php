<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

if (!isset($_SESSION['belepett'])) {
    //header("Location: false.html");
    //exit();
    echo '<script>alert("A rendeléshez belépés szükséges!")</script>';
}

//Meghívás 
require("../kapcsolat/kapcs.php");



$sql =  "SELECT * from termek
INNER JOIN alkategoriak
ON termek.alkategoria_id = alkategoriak.alkategoria_id
INNER JOIN kategoriak
ON kategoriak.kategoria_id = alkategoriak.kategoria_id
WHERE kategoriak.kategoria_id = 3";
require("../components/beolvas.php");

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("../components/links.php") ?>
  

    <title>Háztartás</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php require("../components/nav.php"); ?>

    <!--Website container-->
    <div class="container">
        <div class="cards">
            <?php
            print $kimenet;
            ?>
    </div>
    <div id="modal" class="hidden">
            <img src="" alt="">
            <button>×</button>
        </div>
    </div>
<?php
require("../components/footer.php");
?>

</body>
</html>