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

$sql = "SELECT * from szemelyek
INNER JOIN megrendeles
ON megrendeles.szemelyek_id = szemelyek.id
";

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
            <td class=\"alkategoria_nev\">{$sor['nev']}</td>
            <td class=\"felvdatum\">{$sor['termek_id']}</td>
            <td class=\"darab\">{$sor['rendelt_darab']}</td>
            <td class=\"darab\"></td>
            <td class=\"padd\"><a href=\"torles.php?id={$sor['id']}\">Törlés</a> | <a href=\"modos.php?id={$sor['id']}\">Módosítás</a></td>
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