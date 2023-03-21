<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();


require("../kapcsolat/kapcs.php");
if(isset($_POST['ok']))
{
    $nev = mysqli_real_escape_string($dbconn, $_POST['nev']);
    $felhnev = mysqli_real_escape_string($dbconn, $_POST['felhnev']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $jelszo = sha1($_POST['jelszo']);
    $jelszoujra = sha1($_POST['jelszoujra']);
    $iranyitoszam = $_POST['iranyitoszam'];
    $telepules = $_POST['telepules'];
    $szallitasicim = $_POST['szallitasicim'];
    $tel = $_POST['tel'];


    $select = "SELECT * FROM `szemelyek`
               WHERE email = '$email' && jelszo = '$jelszo'";


    $result = mysqli_query($dbconn, $select);


    if(mysqli_num_rows($result) > 0)
    {
        $error[] = 'Ez a felhasználó már léttezik!';
    }
    else
    {
        if($jelszo != $jelszoujra)
        {
            $error[] = 'A jelszavak nem egyeznek!';
        }
        else
        {
            $id = (int)$_GET['id'];

            $insert = "UPDATE `szemelyek`(`nev`, `felhnev`, `email`, `jelszo`, `iranyitoszam`, `telepules`, `szallitasicim`, `tel`) VALUES ('$nev','$felhnev','$email','$jelszo','$iranyitoszam' ,'$telepules' ,'$szallitasicim','$tel')
            WHERE id = {$id}";
            mysqli_query($dbconn,$insert);
            header('Location:belep.php');
        }
    }
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
                <input type="text" name="nev" id="nev" required placeholder="Teljes név">
            </div>
         <!-- felh név -->
            <div class="bevitel">
                <input type="text" name="felhnev" id="felhnev"  placeholder="Felhasználó név" required>
            </div>
         <!--  email -->
            <div class="bevitel">
                 <input type="email" name="email" id="email"  placeholder="E-mail cím" required>
            </div>
         <!--  jelszo -->
             <div class="bevitel">
                <input type="password" name="jelszo" id="jelszo"  placeholder="Jelszó"required>
            </div>
        <!-- jelszoujra -->
            <div class="bevitel jelszoujra">
                <input type="password" name="jelszoujra" id="jelszoujra" placeholder="Jelszó újra" required>
            </div> 
        <!--  iranyitoszam -->
            <div class="bevitel">
                <input type="text" name="iranyitoszam" id="iranyitoszam" placeholder="Irányítószám" required>
            </div>
        <!--  telepules -->
            <div class="bevitel">
                 <input type="text" name="telepules" id="telepules" placeholder="Település" required>
            </div>
        <!-- szallitasicim -->
            <div class="bevitel">
                <input type="text" name="szallitasicim" id="szallitasicim"  placeholder="Utca, házszám" required>
            </div>
        <!--  telefon -->
             <div class="bevitel">
                <input type="text" name="tel" id="tel" placeholder="Telefonszám" required>
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










