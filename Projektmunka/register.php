<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();
require("kapcsolat/kapcs.php");


if(isset($_POST['ok']))
{
    $nev = mysqli_real_escape_string($dbconn, $_POST['nev']);
    $felhnev = mysqli_real_escape_string($dbconn, $_POST['felh_nev']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $jelszo = sha1($_POST['jelszo']);
    $jelszoujra = sha1($_POST['jelszoujra']);
    $iranyitoszam = $_POST['irsz'];
    $szallitasicim = $_POST['szallitasi_cim'];
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
            $insert = "INSERT INTO `szemelyek`(`nev`, `felh_nev`, `email`, `jelszo`, `tel`,`szallitasi_cim`,`irsz`) VALUES ('$nev','$felhnev','$email','$jelszo','$tel','$szallitasicim', '$iranyitoszam')";
            mysqli_query($dbconn,$insert);
            header('Location:belep.php');
        }
    }


}

$telepulesListaQuery = "
SELECT id, telepules, irsz
FROM telepules
";

$telepulesLista = mysqli_query($dbconn, $telepulesListaQuery);
$telepulesBeolvasas = mysqli_fetch_all($telepulesLista, MYSQLI_ASSOC);

$options = "";

foreach ($telepulesBeolvasas as $lista) {
$options .= "<option value='{$lista["id"]}'>{$lista["irsz"]} - {$lista["telepules"]}</option>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=520, target-densitydpi=high-dpi" />
<meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=utf-8" />
<meta name="HandheldFriendly" content="true" />
<meta name="apple-mobile-web-app-capable" content="yes" /> 
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />    
    <link rel="stylesheet" href="css/register.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>      
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    
    <script>
        $(document).ready(function() {
            $('#iranyitoszam').select2();
        });
    </script>    
    <script src=""></script>
    <script src="js/script.js"></script>


</head>
<body>
<div class="background" id="background"></div>    
        <form method="post">
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
            <h1>Regisztráció</h1>
        <!-- teljes név -->
            <div class="bevitel">
                <input type="text" name="nev" id="nev" required placeholder="Teljes név">
            </div>
         <!-- felh név -->
            <div class="bevitel">
                <input type="text" name="felh_nev" id="felh_nev"  placeholder="Felhasználó név" required>
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
            <select name="irsz" id="iranyitoszam">
                <?= $options;  ?>
            </select>
        </div>
        <!-- szallitasicim -->
            <div class="bevitel">
                <input type="text" name="szallitasi_cim" id="szallitasi_cim"  placeholder="Utca, házszám" required>
            </div>
        <!--  telefon -->
             <div class="bevitel">
                <input type="text" name="tel" id="tel" placeholder="Telefonszám" required>
            </div>
       
        <!-- submit gomb -->
             <div  class="bevitel">
                <input type="submit" value="Regisztrálok" id="ok" name="ok">
             </div>
             <p class="belepes">Van már fiókod? <a href="belep.php">Jelentkezz be itt!</a></p>   
        </form> 
       
        

</body>

</html>










