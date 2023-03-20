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
    $felhnev = mysqli_real_escape_string($dbconn, $_POST['felhnev']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $jelszo = sha1($_POST['jelszo']);
    $jelszoujra = sha1($_POST['jelszoujra']);
    $usertype = $_POST['user_type'];
    $iranyitoszam = strip_tags($dbconn, $_POST['iranyitoszam']);
    $telepules = strip_tags($dbconn, $_POST['telepules']);
    $szallitasicim = strip_tags($dbconn, $_POST['szallitasicim']);
    

    $select = "SELECT * FROM `szemelyek`
               WHERE email = '$email' && jelszo = '$jelszo'";

    $result = mysqli_query($dbconn, $select);

    if(mysqli_num_rows($result) > 0)
    {
        $error[] = 'Felhasználó már léttezik!';
    }
    else
    {
        if($jelszo != $jelszoujra)
        {
            $error[] = 'Jelszó nem egyezik!';
        }
        else
        {
            $insert = "INSERT INTO `accounts`(`nev`, `felhnev`, `email`, `jelszo`, `permission` , `iranyitoszam` , `telepules` , `szallitasicim`) VALUES ('$nev','$felhnev','$email','$jelszo','$usertype' ,'$iranyitoszam' ,'$telepules' ,'$szallitasicim')";
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
    <meta nev="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/registerbele2.css">
</head>
<body>
<div class="background" id="background"></div>
    <div class="kozep">
        <h1>Regisztárció</h1>
        <div class="kis">
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
        <form id="fom" method="post">
        <p>
                <div class="melle"><label for="nev">
                    <p>nev</p>
                    <input type="text" nev="nev" id="nev" required>
                </label></div>
                
            </p>
        <p>
        <div class="melle"><label for="felhnev">
                    <p>felhnev</p>
                    <input type="text" nev="felhnev" id="felhnev" required>
                </label></div>
                
            </p>
            <p>
            <div class="melle"> <label for="email">
                    <p>E-mail</p>
                    <input type="email" nev="email" id="email" required>
                </label></div>
               
            </p>
            <p>
            <div class="melle"><label for="jelszo">
                    <p>Jelszó</p>
                    <input type="jelszo" nev="jelszo" id="jelszo" required>
                </label></div>
                
            </p>
            <p>
            <div class="melle"><label for="jelszoujra">
                    <p>Jelszó újra</p>
                    <input type="jelszo" nev="jelszoujra" id="jelszoujra" required>
                </label></div>
                
            </p>
            <div class="melles">
                <select nev="user_type">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    </select>
                
                </div>
            <div class="gomb"><input type="submit" value="OK" id="ok" nev="ok"></div>
            
        </form>
        </div>
        
    </div>
    <div class="kozep2">
    <p class="nincs">Van már fiókod? <a href="belep.php">Igen</a></p>
    </div>
    <footer>
     <p>Copyright ©
     <br>Kordics Balázs & Szabó Máté
     </p>
    </footer>
    <script src="js/hater.js"></script>
</body>
</html>


