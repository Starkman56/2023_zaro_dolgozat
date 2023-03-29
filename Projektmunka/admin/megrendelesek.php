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

$sql = "SELECT termek.nev AS 'termeknev', szemelyek.nev AS 'szemelyeknev', megrendeles.rendelt_darab, Osszeg, szemelyek.id AS szemelyesid,megrendeles.rendeles_azonosito from szemelyek INNER JOIN megrendeles ON megrendeles.szemelyek_id = szemelyek.id INNER JOIN termek ON megrendeles.termek_id = termek.id"
;

$eredmeny = mysqli_query($dbconn, $sql);
$kimenet = "<table class=\"megrendelestable\"><thead>
            <tr>
            <th>Felhasználó neve</th>
            <th>Termék neve</th>
            <th>Rendelés (DB)</th>
            <th>Összeg (FT)</th>
            <th>Rendelés azonosító</th>
            <th>Státusz</th>
            </tr>";
            $kimenet .= "</thead><tbody class=\"tabla\">";
            
        while($sor = mysqli_fetch_assoc($eredmeny))
        
       {
        $kimenet .= "
            <tr>
            <td class=\"alkategoria_nev\"}>{$sor['szemelyeknev']}</td>
            <td class=\"felvdatum\">{$sor['termeknev']}</td>
            <td class=\"darab\">{$sor['rendelt_darab']} db</td>
            <td class=\"darab\">{$sor['Osszeg']}Ft</td>
            <td class=\"darab\">{$sor['rendeles_azonosito']}</td>
            <td class=\"padd\">
            <ul>
            <li>Megrendelve<input type=\"checkbox\" name=\"checkbox_name\" value=\"checkox_value\"><li>
            <li>Feldolgozás alatt<input type=\"checkbox\" name=\"checkbox_name\" value=\"checkox_value\"><li>
            <li>Futárszolgálatnál<input type=\"checkbox\" name=\"checkbox_name\" value=\"checkox_value\"><li>
            <li>Kézbesítve<input type=\"checkbox\" name=\"checkbox_name\" value=\"checkox_value\"><li>
            </ul>
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
    <div class="menu">
    <p class="kozep"><a href="adminlist.php">Termék táblázat</a></p>
    <p class="kozep"><a href="logout.php">Kijelenkezés</a></p>
    </div>
    </div>
    <div class="content">
    </div>
    <div class="respons">
    <?php
    echo $kimenet;
    ?>
    </div>
    <?php
    require("../components/background.php");
    ?>
    </div>
<script src="../js/script.js"></script>
</body>
</html>