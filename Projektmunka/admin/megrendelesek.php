<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

if(!isset($_SESSION['belepett']))
{
    header("Location: ../false.html");
    exit();
}

require("../kapcsolat/kapcs.php");

$sql = "SELECT * from termek
INNER JOIN alkategoriak
ON alkategoriak.alkategoria_id = termek.alkategoria_id
INNER JOIN kategoriak
ON alkategoriak.kategoria_id = kategoriak.kategoria_id";

$eredmeny = mysqli_query($dbconn, $sql);

$kimenet = "<table><thead>
            <tr>
            <th>Személy_id</th>
            <th>Termék_id</th>
            <th>Rendelés Darab</th>
            <th>Rendelés állapota</th>
            <th>Műveletek:</th>
            </tr>";
            $kimenet .= "</thead><tbody class=\"tabla\">";
        while($sor = mysqli_fetch_assoc($eredmeny))
       {
        $kimenet .= "
            <tr>
            <td class=\"alkategoria_nev\">{$sor['alkategoria_nev']}</td>
            <td class=\"felvdatum\">{$sor['felvdatum']}</td>
            <td class=\"darab\">{$sor['darab']}</td>
            <td class=\"ar\">{$sor['ar']}</td>
            <td class=\"padd\">Megrendelve<input type=\"checkbox\" name=\"checkbox_name\" value=\"checkox_value\"><br>
            Kézbesítve<input type=\"checkbox\" name=\"checkbox_name\" value=\"checkox_value\"><br>
            </td>
            </tr> ";
        }
$kimenet .= "</tbody></table>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/adminlista.css">
</head>

<body>
    
    
    <div class="cim">
    <div class="cimkozepre"><h1>Megrendelések</h1>
    <p class="kozep"><a href="adminlist.php">Termék táblázat</a></p>
    <p class="kozep"><a href="logout.php">Kijelenkezés</a></p>
    </div>
    <div class="content">
    <div class="respons">

    <?php
    echo $kimenet;
    ?>
    <?php
    require("../components/background.php");
    ?>
<script src="../js/script.js"></script>
</body>
</html>