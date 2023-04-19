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
INNER JOIN alkategoriak
ON termek.alkategoria_id = alkategoriak.alkategoria_id
INNER JOIN kategoriak
ON kategoriak.kategoria_id = alkategoriak.kategoria_id
WHERE kategoriak.kategoria_id = 2";
require("../components/beolvas.php");

?>
<?php 
require("../components/kategoria.php");
?>