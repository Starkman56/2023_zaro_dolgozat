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
    $darab = strip_tags(trim($_POST['darab']));
    $felvdatum = strip_tags(trim($_POST['felvdatum']));

    // változokvizs
    $mime = array("image/gif", "image/png", "image/jpg", "image/jpeg");

    if (empty($vonalkod) || empty($felvdatum) || empty($darab) || empty($ar)) {
        $hibak[] = "Nem adtál meg valamit.";
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

        $sql = "UPDATE keszlet
                SET foto = '{$foto}', ar = '{$ar}', vonalkod = '{$vonalkod}', darab = '{$darab}', felvdatum = '{$felvdatum}'
                WHERE id = {$id}";

        mysqli_query($dbconn, $sql);
        var_dump($sql);
        // kép mozgatása a végleges helyére

        move_uploaded_file($_FILES['foto']['tmp_name'], "../keps/{$foto}");
        header("Location: adminlist.php");
    }
} else {
    $id = (int)$_GET['id'];
    $sql = "SELECT * from keszlet WHERE id = {$id}";

    $eredmeny = mysqli_query($dbconn, $sql);
    $sor = mysqli_fetch_assoc($eredmeny);
    $felvdatum = $sor['felvdatum'];
    $ar = $sor['ar'];
    $vonalkod = $sor['vonalkod'];
    $darab = $sor['darab'];
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
    <link rel="stylesheet" href="../felvitel.css">
</head>

<body>
    <div class="kozep">
        <h1>Termék módosítása</h1>
            <div class="kis">
                <div class="hiba">
                    <div class=".error-msg">
                        <?php
                        if (isset($kimenet)) {
                            print($kimenet);
                        }
                        ?>
                    </div>
                </div>
                <!-- korlátozások -->

                <form id="from" method="post" enctype="multipart/form-data">

                    <p class="felhivas"><em>A *-al jelölt mezőket töltsd ki!</em></p>

                    <input type="hidden" name="MAX_FILE_SIZE" value="6000000">
                    <p class="men"><Label for="foto">Fotó feltöltése</Label>
                        <input type="file" name="foto" id="foto">
                    </p>
                    <!-- Vonalkód megadása -->
                    <p class="men"><label for="vonalkod">Vonalkód*:</label>
                        <input type="text" name="vonalkod" id="vonalkod" value="<?php print $vonalkod; ?>">
                    </p>
                    <!-- Mobil megadása -->
                    <p class="men"><label for="felvdatum">Felvitel dátuma*:</label>
                        <input type="date" name="felvdatum" id="felvdatum" value="<?php print $felvdatum; ?>">
                    </p>
                    <!-- E-mail megadása -->
                    <p class="men"><label for="ar">Ár*:</label>
                        <input type="text" name="ar" id="ar" value="<?php print $ar; ?>">
                    </p>
                    <p class="men"><label for="darab">Darab*:</label>
                        <input type="text" name="darab" id="darab" value="<?php print $darab; ?>">
                    </p>
                    <!-- Küldés gomba -->
                    <div class="gomb"><input type="submit" value="Rendben" id="ok" name="ok">
                        <p class="vissza"><a href="adminlist.php">Vissza</a></p>
                    </div>

                </form>
        </div>
    </div>
</body>

</html>