<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
require("../components/loader.php");
if (!isset($_SESSION['belepett'])) {
    header("Location: false.html");
    exit();
}

//Meghívás 
require("../kapcsolat/kapcs.php");
require("../components/nav.php");



$sql =  "SELECT * from termek
INNER JOIN alkategoriak
ON termek.alkategoria_id = alkategoriak.alkategoria_id
INNER JOIN kategoriak
ON kategoriak.kategoria_id = alkategoriak.kategoria_id
WHERE kategoriak.kategoria_id = 1";
require("../components/beolvas.php");



?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("../components/links.php") ?>
  

    <title>horgasz</title>
    
</head>
<body>

<div id="loader" class="center"></div>
    <!--Website container-->
    <div class="container">
        <div class="cards">
            <?php
            print $kimenet;
            ?>
        </div>
    </div>
<?php
require("../components/footer.php");
?>

</body>

</html>