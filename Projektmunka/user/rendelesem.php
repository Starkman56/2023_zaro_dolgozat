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
$bentvan = $_SESSION["felh_nev"];
$sql = "SELECT termek.nev AS 'termeknev', termek.ar AS 'ara', szemelyek.nev AS 'szemelyeknev', megrendeles.rendeles_allapot_id AS 'status', megrendeles.rendelt_darab , szemelyek.id 
AS szemelyesid from szemelyek
INNER JOIN megrendeles
ON megrendeles.szemelyek_id = szemelyek.id
INNER JOIN termek
ON megrendeles.termek_id = termek.id
WHERE szemelyek.felh_nev = '{$bentvan}';
";

$eredmeny = mysqli_query($dbconn, $sql);

$kimenet = "<table class=\"megrendelestable\"><thead>
            <tr>
            <th>Termék neve</th>
            <th>Rendelés (DB)</th>
            <th>Végösszeg</th>
            <th>Státusz</th>
            </tr>";

            $kimenet .= "</thead><tbody class=\"tabla\">
            <tr>
                <td colspan=4 class=\"hidden szemely_id\"}>{$_SESSION['id']}</td>                
            </tr>            
            ";
            
        while($sor = mysqli_fetch_assoc($eredmeny))
        
       {
        $vegossszeg =  $sor['rendelt_darab'] * $sor['ara'];
        $kimenet .="
            <tr>
            <td class=\"felvdatum\">{$sor['termeknev']}</td>
            <td class=\"darab\">{$sor['rendelt_darab']} db</td>
            <td class=\"darab\">{$vegossszeg} Ft</td>
            <td class=\"padd\">
            <ul>
            <li>Megrendelve<input type=\"checkbox\" name=\"checkbox_name\" value=\"checkox_value\" ".($sor["status"] == 1 ? "checked" : "disabled")." style='pointer-events: none;'><li>
            <li>Feldolgozás alatt<input type=\"checkbox\" name=\"checkbox_name\" value=\"checkox_value\" ".($sor["status"] == 2 ? "checked" : "disabled")." style='pointer-events: none;'><li>
            <li>Futárszolgálatnál<input type=\"checkbox\" name=\"checkbox_name\" value=\"checkox_value\" ".($sor["status"] == 3 ? "checked" : "disabled")." style='pointer-events: none;'><li>
            <li>Kézbesítve<input type=\"checkbox\" name=\"checkbox_name\" value=\"checkox_value\" ".($sor["status"] == 4 ? "checked" : "disabled")." style='pointer-events: none;'><li>
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
    <div class="cimkozepre"><h1>Megrendeléseim</h1>
    <div class="menu">
    <p class="kozep"><a href="main.php">Vissza</a></p>
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