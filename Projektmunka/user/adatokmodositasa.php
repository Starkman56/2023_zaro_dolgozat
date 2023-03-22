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
    $felhnev = mysqli_real_escape_string($dbconn, $_POST['felhnev']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $iranyitoszam = $_POST['iranyitoszam'];
    $telepules = $_POST['telepules'];
    $szallitasicim = $_POST['szallitasicim'];
    $tel = $_POST['tel'];

        $sql = "UPDATE szemelyek
                SET nev = '{$nev}', felhnev = '{$felhnev}', email = '{$email}', iranyitoszam = '{$iranyitoszam}', telepules = '{$telepules}', szallitasicim = '{$szallitasicim}', tel = '{$tel}'
                WHERE id = {$_SESSION['id']}";
        mysqli_query($dbconn, $sql);
        header('Location:webshop.php');
} else {
    $sor = mysqli_fetch_assoc($eredmeny);
    $nev = $sor['nev'];
    $felhnev = $sor['felhnev'];
    $email = $sor['email'];
    $iranyitoszam = $sor['iranyitoszam'];
    $telepules = $sor['telepules'];
    $szallitasicim = $sor['szallitasicim'];
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
                <input type="text" name="felhnev" id="felhnev"  placeholder="Felhasználó név" required value="<?php print $felhnev; ?>">
            </div>
         <!--  email -->
            <div class="bevitel jelszoujra">
                 <input type="email" name="email" id="email"  placeholder="E-mail cím" required value="<?php print $email; ?>">
            </div>
        
        <!--  iranyitoszam -->
            <div class="bevitel">
                <input type="text" name="iranyitoszam" id="iranyitoszam" placeholder="Irányítószám" required value="<?php print $iranyitoszam; ?>">
            </div>
        <!--  telepules -->
            <div class="bevitel">
                 <input type="text" name="telepules" id="telepules" placeholder="Település" required value="<?php print $telepules; ?>">
            </div>
        <!-- szallitasicim -->
            <div class="bevitel">
                <input type="text" name="szallitasicim" id="szallitasicim"  placeholder="Utca, házszám" required value="<?php print $szallitasicim; ?>">
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

            <!-- <div class="melles">
                <select name="user_type">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    </select>   
            </div> -->

            
           
        </form>
       
    
   
    
    
   
</body>
</html>










