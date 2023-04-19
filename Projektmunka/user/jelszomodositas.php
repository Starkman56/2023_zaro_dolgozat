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
    $jelszo = sha1($_POST['jelszo']);
    $jelszoujra = sha1($_POST['jelszoujra']);
    $regijelszo = sha1($_POST['regijelszo']);

    // Check if old password matches
    $sor = mysqli_fetch_assoc($eredmeny);
    $oldjelszo = $sor['jelszo'];


    if ($oldjelszo !== $regijelszo) {
        $error[] = 'Nem egyezik a régi jelszó!';
    } else if ($jelszo !== $jelszoujra) {
        $error[] = 'Nem egyezik a 2 új jelszó';
    } else {
        $sql = "UPDATE szemelyek SET jelszo = '{$jelszo}'";
        mysqli_query($dbconn, $sql);
        header('Location:webshop.php');
    }


} else {
    $sor = mysqli_fetch_assoc($eredmeny);
    $jelszo = $sor['jelszo'];
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
    <form method="post">
        <?php
        if(isset($error))
        {
            foreach($error as $error)
            {
                echo '<p class="error">'.$error.'</p>';
            }
        }
        ?>
        <p class="jel">Jelszó módosítása</p>
        <!-- regijelszo -->
        <div class="bevitel">
            <input type="password" name="regijelszo" id="regijelszo"  placeholder="Régi jelszó" required>
        </div><br>
        <!-- jelszo -->
        <div class="bevitel">
            <input type="password" name="jelszo" id="jelszo"  placeholder="Új jelszó" required>
        </div>
        <!-- jelszoujra -->
        <div class="bevitel jelszoujra">
            <input type="password" name="jelszoujra" id="jelszoujra" placeholder="Új jelszó újra" required>
        </div>
        <div class="gomb"><input type="submit" value="Mentés" id="ok" name="ok"></div>
        <a href="main.php">Vissza!</a>