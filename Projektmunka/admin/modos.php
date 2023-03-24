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
// lapvédelem
// formfeldolgozás

if (isset($_POST['ok'])) {
    // változok clear
    $vonalkod = strip_tags(trim($_POST['vonalkod']));
    $ar = strip_tags(trim($_POST['ar']));
     $nev = strip_tags(trim($_POST['nev']));
    $darab = strip_tags(trim($_POST['darab']));
    $felvdatum = strip_tags(trim($_POST['felvdatum']));
    $alkategoria_id = strip_tags(trim($_POST['alkategoria_id']));
    $leiras = strip_tags(trim($_POST['leiras']));
    $mime = array("image/gif", "image/png", "image/jpg", "image/jpeg");
    // változokvizs
    if (empty($vonalkod)  ){
        $hibak[] = "Adjon meg vonalkódot!";
    }
    if (empty($nev)  ){
       $hibak[] = "Adjon meg nevet!";
    }
    if (empty($alkategoria_id)  ){
        $hibak[] = "Adjon meg kategóriát!";
    }
    if (empty($felvdatum)  ){
        $hibak[] = "Adjon meg dátumot!";
     }
     if (empty($ar)  ){
        $hibak[] = "Adjon meg árat!";
     }
     if (empty($alkategoria_id)  ){
        $hibak[] = "Adjon meg darabszámot!";
     }
     if (empty($leiras)  ){
        $hibak[] = "Adjon meg leírást!";
     }
    if ($_FILES['foto']['error'] == 0 && $_FILES['foto']['size'] > 6000000) {
        $hibak[] = "Nagy a kép formátuma";
    }
    if ($_FILES['foto']['error'] == 0 && !in_array($_FILES['foto']['type'], $mime)) {
        $hibak[] = "Rossz a kép fájl kiterjesztése";
    }
    switch ($_FILES['foto']['type']) {
        case "image/png":
            $kit = ".png";
            break;
        case "image/gif":
            $kit = ".gif";
            break;
        case "image/jpg":
            $kit = ".jpg";
            break;
        default:
            $kit = ".jpeg";
    }
    $foto = date("U") . $kit;
    // Hibák összeállítása
    if (isset($hibak)) {
        $kimenet = "<ul class=\"error-msg\">\n";
        foreach ($hibak as $i) {
            $kimenet .= "<li>$i</li>";
        }
        $kimenet .= "</ul>";
    } else {
        // adatok beszúrása az adatbázisba
        $id = (int)$_GET['id'];

        $sql = "UPDATE termek
                SET foto = '{$foto}', ar = '{$ar}', vonalkod = '{$vonalkod}', nev = '{$nev}', leiras = '{$leiras}', darab = '{$darab}', felvdatum = '{$felvdatum}', alkategoria_id = '{$alkategoria_id}'
                WHERE id = {$id}";

        mysqli_query($dbconn, $sql);
        var_dump($sql);
        // kép mozgatása a végleges helyére

        move_uploaded_file($_FILES['foto']['tmp_name'], "../keps/{$foto}");
        header("Location: adminlist.php");
    }
} else {
    $id = (int)$_GET['id'];
    $sql = "SELECT * from termek WHERE id = {$id}";
    $eredmeny = mysqli_query($dbconn, $sql);
    $sor = mysqli_fetch_assoc($eredmeny);
    $felvdatum = $sor['felvdatum'];
    $ar = $sor['ar'];
    $vonalkod = $sor['vonalkod'];
    $darab = $sor['darab'];
    $nev = $sor['nev'];
    $leiras = $sor['leiras'];
    // var_dump($leiras);
    $alkategoria_id = $sor['alkategoria_id'];
    $foto = ($sor['foto'] != "nincskep.png") ? $sor['foto'] : "nincskep.png";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New</title>
    <link rel="stylesheet" href="../css/felvitel.css">
</head>
<body>
    <h1>Módosítás</h1>
    <!-- korlátozások -->
    <form class="form" id="from" method="post" enctype="multipart/form-data">
        <div class="hiba">
            <div class=".error-msg">
                <?php
                        if (isset($kimenet)) {
                            print($kimenet);
                        }
                        ?>
            </div>
        </div>
        <div class="">
            <p class="felhivas">A *-al jelölt mezőket töltsd ki!</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="6000000">
        </div>
        <!-- fotó feltöltése -->
        <div class="bevitel">
            <Label for="foto">Fotó feltöltése</Label>
            <input type="file" name="foto" id="foto" value="<?php print $foto; ?>">
        </div>
        <!-- Vonalkód megadása -->
        <div class="bevitel">
            <label for="vonalkod">*Vonalkód:</label>
            <input type="text" name="vonalkod" id="vonalkod" placeholder="00000000" value="<?php print $vonalkod; ?>">
        </div>
        <!-- Név megadása -->
        <div class="bevitel">
            <label for="nev">*Név:</label>
            <input type="text" name="nev" id="nev" placeholder="Név" value="<?php print $nev; ?>">
        </div>
        <!-- Kategória kiválasztása -->
        <div class="bevitel">
            <label for="vonalkod">*Kategória:</label>
            <select class="alkategoria" name="alkategoria_id" id="alkategoria_id" for="alkategoria_id" >
                <option value="<?php print $alkategoria_id; ?>">Kategória választó </option>
                <option value="1">Horgászbot</option>
                <option value="2">Orsó</option>
                <option value="3">Etetőanyag</option>
                <option value="4">Horgász kiegészítő</option>
                <option value="5">Horgász ruházat</option>
                <option value="6">Haltáp</option>
                <option value="7">Rágcsáló táp</option>
                <option value="8">Díszállat kiegészítő</option>
                <option value="9">Kisállat Alom</option>
                <option value="10">Levegőztető,szűrő,melegítő</option>
                <option value="11">Konyhai termék</option>
                <option value="12">Fürdőszobai termék</option>
                <option value="13">Játék</option>
                <option value="14">Dísz</option>
                <option value="15">Ajándék</option>
                <option value="16">Madáretető</option>
                <option value="17">Odu</option>
                <option value="18">Fali kulcstartó</option>
                <option value="19">Kenyértartó</option>
                <option value="20">Kosár</option>
            </select>
        </div>
        <!-- Dátum megadása -->
        <div class="bevitel">
            <label for="felvdatum">*Felvitel dátuma:</label>
            <input type="date" name="felvdatum" id="felvdatum" value="<?php print $felvdatum; ?>">
        </div>
        <!-- ár megadása -->
        <div class="bevitel">
            <label for="ar">*Ár:</label>
            <input type="text" name="ar" id="ar" placeholder="Ára" value="<?php print $ar; ?>">
        </div>
        <!-- darab megadása -->
        <div class="bevitel">
            <label for="darab">*Darab:</label>
            <input type="text" name="darab" id="darab" placeholder="1" value="<?php print $darab; ?>">
        </div>
        <!-- leírás megadása -->
        <div class="bevitel">
            <label for="leiras">*Leírás:</label>
            <textarea maxlength="200" id="leiras" name="leiras" rows="4" cols="50" placeholder="Adja meg a leírást (200 karakter)" ><?php print $leiras; ?></textarea>
        </div>

        <!-- Küldés gomba -->
        <div class="gomb">
            <input class="ok" type="submit" value="Ok" id="ok" name="ok">
            <a href="adminlist.php">Vissza</a></p>
        </div>
    </form>
</body>
</html>
              