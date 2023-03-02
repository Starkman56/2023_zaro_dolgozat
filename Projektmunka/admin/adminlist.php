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
$rendez = (isset($_GET['rendez'])) ? $_GET['rendez'] : "felvdatum";
$kifejezes = (isset($_POST['kereso'])) ? $_POST['kereso'] : "";
$sql = "SELECT * from keszlet
        INNER JOIN kategoriak ON kategoriak.id = keszlet.kategoriaid
        WHERE ( vonalkod LIKE '%$kifejezes%' 
        OR felvdatum LIKE '%$kifejezes%'
        OR nev LIKE '%$kifejezes%'   
        OR kategoriaid LIKE '%$kifejezes%'   
        OR darab LIKE '%$kifejezes%'  
        OR ar LIKE '%$kifejezes%'   
        OR foto LIKE '%$kifejezes%')
        ORDER BY {$rendez} ASC";

$eredmeny = mysqli_query($dbconn, $sql);

$kimenet = "<table><thead>
            <tr>
            <th>Fotó:</th>
            <th><a href=\"?rendez=vonalkod\">Vonalkód</a></th>
            <th>Név</th>
            <th>Kategória</th>
            <th>Felvitel dátuma</th>
            <th>Darabszám</th>
            <th>Ára</th>
            <th>Műveletek:</th>
            </tr>";
            $kimenet .= "</thead><tbody class=\"tabla\">";
        while($sor = mysqli_fetch_assoc($eredmeny))
       {
        $kimenet .= "
            <tr>
            <td class=\"kep\"><img src=\"../keps/{$sor['foto']}\" alt=\"{$sor['foto']}\" style=\"width: 100%;\"></td>
            <td class=\"vonalkod\">{$sor['vonalkod']}</td>
            <td class=\"nev\">{$sor['nev']}</td>
            <td class=\"kategorianev\">{$sor['kategorianev']}</td>
            <td class=\"felvdatum\">{$sor['felvdatum']}</td>
            <td class=\"darab\">{$sor['darab']}</td>
            <td class=\"ar\">{$sor['ar']}</td>
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
    <link rel="stylesheet" href="../adminlista.css">
</head>
<body>
    <div class="cim">
    <div class="cimkozepre"><h1>Raktáron</h1>
    <p class="kozep"><a href="logout.php">Kijelenkezés</a></p>
    <form method="post">
        <input type="search" name="kereso" id="kereso" placeholder="Keresés">
    </form></div>
    </div>
    <div class="content">

    <p class="szovegkozepre"><a href="felvitel.php">Új árú felvitele</a></p>
    <div class="respons">

    <?php
    echo $kimenet;
    ?>
    </div>
    <p class="szovegkozepre"><a href="felvitel.php">Új árú felvitele</a></p>
    </div>
</body>
</html>