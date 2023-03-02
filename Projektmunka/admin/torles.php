<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION['belepett']))
{
    header("Location: false.html");
    exit();
}

if(isset($_GET['id']))
{
    require("../kapcsolat/kapcs.php");
    
    $id= (int)$_GET['id'];
    $sql = "DELETE FROM termek 
            WHERE id = {$id}";
    
    mysqli_query($dbconn, $sql);
}
header("Location: adminlist.php");
?>