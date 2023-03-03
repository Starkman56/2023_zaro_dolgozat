<?php
// lapvédelem
session_start();

if (!isset($_SESSION['belepett'])) {
    header("Location: ../false.html");
    exit();
}



// formfeldolgozás
if (isset($_POST['ok'])) {
    // változok clear

    $vonalkod = strip_tags(trim($_POST['vonalkod']));
    $nev = strip_tags(trim($_POST['nev']));
    $ar = strip_tags(trim($_POST['ar']));
    $darab = strip_tags(trim($_POST['darab']));
    $felvdatum = strip_tags(trim($_POST['felvdatum']));
    $alkategoria_id = strip_tags(trim($_POST['alkategoria_id']));
    $leiras = strip_tags(trim($_POST['leiras']));

    // változokvizs
    $mime = array("image/gif", "image/png", "image/jpg", "image/jpeg");

    if (empty($vonalkod) || empty($felvdatum) || empty($darab) || empty($ar) || empty($alkategoria_id)  ){
       
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
        // beszúrás az adatbázisba
        require("../kapcsolat/kapcs.php");
        echo"$alkategoria_id";
        $sql = "INSERT INTO termek
                (vonalkod,nev,felvdatum,ar,darab,foto,alkategoria_id,leiras)
                VALUE('{$vonalkod}','{$nev}','{$felvdatum}','{$ar}','{$darab}','{$foto}','{$alkategoria_id}','{$leiras}') 
                
                "; 
        mysqli_query($dbconn, $sql);

        

        

        // kép mozgatása a végleges helyére

        move_uploaded_file($_FILES['foto']['tmp_name'], "../keps/{$foto}");
        header("Location: adminlist.php");
    }
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
    <div class="kozep">
        <h1>Új árú felvitele</h1>
        <div class="forom">
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
                        <input type="text" name="vonalkod" id="vonalkod" placeholder="00000000">
                    </p>
                    <p class="men"><label for="nev">Név*:</label>
                        <input type="text" name="nev" id="nev" placeholder="Krupmli">
                    </p>
                    
                    <!-- Kategória kiválasztása -->
                    <p class="men"><label for="vonalkod">Kategória *:</label>
                    <select class="alkategoria" name="alkategoria_id" id="alkategoria_id" for="alkategoria_id">
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
                    </p>
                    <!-- Dátum megadása -->
                    <p class="men"><label for="felvdatum">Felvitel dátuma*:</label>
                        <input type="date" name="felvdatum" id="felvdatum">
                    </p>
                    <!-- ár megadása -->
                    <p class="men"><label for="ar">Ár*:</label>
                        <input type="text" name="ar" id="ar" placeholder="Ára">
                    </p>
                    <p class="men"><label for="darab">Darab*:</label>
                        <input type="text" name="darab" id="darab" placeholder="1">
                    </p>
                        <!-- leírás -->
                    <p class="men"><label for="leiras">Leírás:</label>
                    
                    <textarea id="leiras" name="leiras" rows="4" cols="50" placeholder="Adja meg a leírást">
                        
                    </textarea>
                    </p>
                    <!-- Küldés gomba -->
                    <div class="gomb"><input type="submit" value="Ok" id="ok" name="ok">
                        <p class="koz"><a href="adminlist.php">Vissza</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>