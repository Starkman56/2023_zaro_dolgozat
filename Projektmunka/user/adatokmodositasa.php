<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['belepett'])) {
    header("Location: ../false.html");
    exit();
}
require("../kapcsolat/kapcs.php");
$sql = "SELECT * from szemelyek WHERE id = {$_SESSION['id']}";
$eredmeny = mysqli_query($dbconn, $sql);
if (isset($_POST['ok'])) {
    $nev = mysqli_real_escape_string($dbconn, $_POST['nev']);
    $felhnev = mysqli_real_escape_string($dbconn, $_POST['felh_nev']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $iranyitoszam = $_POST['irsz'];
    $telepules = $_POST['telepules'];
    $szallitasicim = $_POST['szallitasi_cim'];
    $tel = $_POST['tel'];
        $sql = "UPDATE szemelyek
                SET nev = '{$nev}', felh_nev = '{$felhnev}', email = '{$email}', irsz = '{$iranyitoszam}', szallitasi_cim = '{$szallitasicim}', tel = '{$tel}'
                WHERE id = {$_SESSION['id']}";
        mysqli_query($dbconn, $sql);
        $_SESSION["felh_nev"] = $nev;
        header('Location:webshop.php');
} else {
    $sor = mysqli_fetch_assoc($eredmeny);
    $nev = $sor['nev'];
    $felhnev = $sor['felh_nev'];
    $email = $sor['email'];
    $iranyitoszam = $sor['irsz'];
    $telepulesListaQuery = "
        SELECT id, telepules, irsz
        FROM telepules
    ";
    $telepulesLista = mysqli_query($dbconn, $telepulesListaQuery);
    $telepulesBeolvasas = mysqli_fetch_all($telepulesLista, MYSQLI_ASSOC);
    $options = "";
    foreach ($telepulesBeolvasas as $lista) {
        $selected = "";
        if($sor["irsz"] == $lista["id"]) {
            $selected = "selected";
        }   
        $options .= "<option value='{$lista["id"]}' {$selected} >{$lista["irsz"]} - {$lista["telepules"]}</option>";
    }
    $szallitasicim = $sor['szallitasi_cim'];
    $tel = $sor['tel'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>      
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    
    <script>
        $(document).ready(function() {
            $('#iranyitoszam').select2();
        });
    </script>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
<div class="background" id="background"></div>        
    <div class="hiba">
        <?php
        if(isset($error))
        {
            foreach($error as $error)
            {
                echo '<p class="error-msg">'.$error.'</p>';
            }
        }
        ?>
        </div>
        <form method="post">
            <h1>Adatok módosítása</h1>
        <!-- teljes név -->
            <div class="bevitel">
                <input type="text" name="nev" id="nev" required placeholder="Teljes név" value="<?php print $nev; ?>">
            </div>
         <!-- felh név -->
            <div class="bevitel">
                <input type="text" name="felh_nev" id="felhnev"  placeholder="Felhasználó név" required value="<?php print $felhnev; ?>">
            </div>
         <!--  email -->
            <div class="bevitel jelszoujra">
                 <input type="email" name="email" id="email"  placeholder="E-mail cím" required value="<?php print $email; ?>">
            </div>
        <!--  iranyitoszam -->
        <div class="bevitel">
            <select name="irsz" id="iranyitoszam">
                <?= $options;  ?>
            </select>
        </div>
        <!-- szallitasicim -->
            <div class="bevitel">
                <input type="text" name="szallitasi_cim" id="szallitasicim"  placeholder="Utca, házszám" required value="<?php print $szallitasicim; ?>">
            </div>
        <!--  telefon -->
             <div class="bevitel">
                <input type="text" name="tel" id="tel" placeholder="Telefonszám" required value="<?php print $tel;?>">
            </div>
        <!-- submit gomb -->
             <div  class="bevitel">
                <input type="submit" value="Módosítás jóváhagyása" id="ok" name="ok">
             </div>
            <a href="main.php">Vissza!</a></p>
        </form>
</body>
</html>










