<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

if (!isset($_SESSION['belepett'])) {
    
}

//Meghívás 
require("../kapcsolat/kapcs.php");
$sql =  "SELECT * from termek 
WHERE alkategoria_id = 2";
require("../components/beolvas.php");
?>
<?php 
require("../components/kategoria.php");
?>