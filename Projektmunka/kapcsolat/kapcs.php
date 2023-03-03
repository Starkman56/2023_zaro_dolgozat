<?php
header("Content-Type: text/html; charset=utf-8");

define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","adatbazis");


$dbconn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("SHINE");

if(mysqli_connect_error())
{
    die("The problem is" . mysqli_connect_error());
}
// echo "Siker";
// mysqli_query($dbconn, "SET NAMES utf8");
?>