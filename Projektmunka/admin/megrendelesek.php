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

$sql = "SELECT termek.id, termek.nev AS 'termeknev', szemelyek.nev AS 'szemelyeknev', megrendeles.rendeles_allapot_id AS 'status', megrendeles.rendelt_darab, szemelyek.id 
AS szemelyesid from szemelyek
INNER JOIN megrendeles
ON megrendeles.szemelyek_id = szemelyek.id
INNER JOIN termek
ON megrendeles.termek_id = termek.id
";

$eredmeny = mysqli_query($dbconn, $sql);
$kimenet = "<table class=\"megrendelestable\"><thead>
            <tr>
            <th>Felhasználó neve</th>
            <th>Termék neve</th>
            <th>Rendelés (DB)</th>
            <th>Státusz</th>
            </tr>";
            $kimenet .= "</thead><tbody class=\"tabla\">";           
        while($sor = mysqli_fetch_assoc($eredmeny))
       {

        $currentStatusQuery = "
            SELECT rendeles_allapot_id 
            FROM megrendeles
            WHERE id = '{$sor["id"]}'
        ";

        $currentStatusResult = mysqli_query($dbconn, $currentStatusQuery);
        $currentStatus = mysqli_fetch_assoc($currentStatusResult);



        // Továbbfejlesztési javaslat: Ne legyen automatikusan beállítva a checked a Megrendelve checkbox-hoz, hanem csak akkor, ha ki is van fizetve.
        // Erre esetleg lehetne egy új státusz

    
        $kimenet .= "
            <tr>
            <td class=\"hidden szemely_id\"}>{$sor['szemelyesid']}</td>        
            <td class=\"hidden termek_id\"}>{$sor['id']}</td>        
            <td class=\"alkategoria_nev\"}>{$sor['szemelyeknev']}</td>
            <td class=\"felvdatum\">{$sor['termeknev']}</td>
            <td class=\"darab\">{$sor['rendelt_darab']} db</td>
            <td class=\"padd\">
            <ul>
            <li>Megrendelve<input type=\"radio\" class=\"megrendeles_status\" name=\"megrendeles_status_{$sor["id"]}\" value=\"1\" ".($sor["status"] == 1 ? "checked" : "")."><li> 
            <li>Feldolgozás alatt<input type=\"radio\" class=\"megrendeles_status\" name=\"megrendeles_status_{$sor["id"]}\" value=\"2\" ".($sor["status"] == 2 ? "checked" : "")."><li>
            <li>Futárszolgálatnál<input type=\"radio\" class=\"megrendeles_status\" name=\"megrendeles_status_{$sor["id"]}\" value=\"3\" ".($sor["status"] == 3 ? "checked" : "")."><li>
            <li>Kézbesítve<input type=\"radio\" class=\"megrendeles_status\" name=\"megrendeles_status_{$sor["id"]}\" value=\"4\" ".($sor["status"] == 4 ? "checked" : "")."><li>
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
    <a href="adminlist.php"><p class="kozep">Termék táblázat</p></a>
    <a href="logout.php"><p class="kozep">Kijelenkezés</p></a>
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
<!--<script src="../js/script.js"></script>-->
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(".megrendeles_status").on("change", function(e) {
            let szemely_id = $(this).parents("tr").find(".szemely_id").text();
            let termek_id = $(this).parents("tr").find(".termek_id").text();
            console.log($(this).parents("tr").find(".szemely_id"));
                   
            $.ajax({
                method: "POST",
                url: "../api.php",
                dataType: "JSON",
                data: { c: "updateProductStatus", termek_id: termek_id, szemely_id: szemely_id, status: $(this).val()},         
                success:function(result) {
                 

                }
            });
        });
    });
</script>
</body>
</html>