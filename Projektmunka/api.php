<?php
session_start();
require("kapcsolat/kapcs.php");

function getCurrentProductNumber($order = array(), $dbconn) {
    
    $products = array();

    foreach($order as $orderItem) {
    
        $message = "";
        /** megkéne oldani, hogy csak akkor update-elje a db-ben az adatokat, hogyha minden
        *   terméknél van megfelelelő darabszám ellenkezőleg térjen vissza hibaüzenettel
        */
        $sql = "
            SELECT darab
            FROM termek
            WHERE id = '{$orderItem["termek_id"]}'
        ";        
        $result = mysqli_query($dbconn, $sql);
        $currentProductNumber = mysqli_fetch_array($result);

        /*
        echo "<pre>";
        print_r($currentProductNumber);
        echo "</pre>";
        */
        /*
        echo "Id: ". $product["id"]."<br />";
        echo "Name: ". $product["name"]."<br />";
        echo "No: ". $product["no"]."<br />";
        echo "Price: ". $product["price"]."<br />";
        echo "darab: ". $product["darab"]."<br />";
        */

        if($currentProductNumber["darab"] < $orderItem["darab"]) {
            //echo 'Nincs elég termék';
            $message = "Nem áll rendelkezésre megfelelő számú termék";
            return array(
                "message" => $message,
                "products" => array(),
            );
        } 
        
        $products[$orderItem["termek_id"]] = $currentProductNumber["darab"];
        
        /*
        echo "<pre>";
        print_r($products);
        echo "</pre>";
        */
    }

    $result = array(
        "message"   => $message,
        "products"  => $products,
    );
    return $result;
}

function updateCurrentProductNumber($order = array(), $data = array(), $dbconn) {

    foreach($order as $product) {
        echo "insideTheUpdateFunction";
        $newProductNumber = $data["products"][$product["termek_id"]] - $product["darab"];
        
        echo $product["termek_id"] ." = ". $newProductNumber. "<br />";
        $sql = "
            UPDATE termek
            SET darab = {$newProductNumber}
            WHERE id = '{$product["termek_id"]}'
        ";        
        mysqli_query($dbconn, $sql); 
        $result = array(
            "message"   => "Sikeres",
        );
        return $result;
    }
}

function saveOrder($order = array(), $dbconn) {
    //save order into the oprder table with insert
    //user_id, termek_id, darab, price, (status_id:default int 1, megendeles_datuma: default datetime, kezbesites_datuma: default datetime)
    //alapból 2 státus: megrendelve (0) - kézbesítve(1) kapcsoló táblában pedig a id-k nevei status -> status_id, status_name

    /*

   táblázatban kilistázni az adott státuszú terméket
    <select>
        <?php foreach (...) {
        <option value=<?= $statusId; ?><?= $statusName; ?></option>
        <?php } ?>
    </select>
    */

    foreach($order as $orderItem) {   
        $sql = "
            INSERT INTO megrendeles
            (szemelyek_id, rendelt_darab, termek_id, vegosszeg) VALUES (
                '{$_SESSION["id"]}','{$orderItem["darab"]}','{$orderItem["termek_id"]}','{$orderItem["price"]}'
            )
        ";
        
        echo $sql."<br />";
        mysqli_query($dbconn, $sql);
    }

}

/**Important to give parameters to the parent function, becouse without it,
 * the children function can not get parameters except, if the 
 * parameters are global,  class, const, super variable like $_POST, $_GET,
 * $_SERVER, $_COOKIE, $_SESSION, $_FILES etc.
 */

function updateProductAndSaveOrder($order = array(), $data = array(), $dbconn) {
    updateCurrentProductNumber($order, $data, $dbconn);
    saveOrder($order, $dbconn);

    //TODO: Check in both function if there is a mysql error if there is, then return it
    $result = array(
        "message" => "Sikeres mentés",
    );

    return $result;
}   

if ($_POST["c"] == "handleOrder") {
    /*
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    */

    /*
    "id":4,     
      "name":"Okuma Custom Black Ceymar River Feeder",
      "no":100,
      "price":41000,
      "darab":4
      */
    $order = json_decode($_POST["cuccok"], true);
    
    $message = "";

    //Cherk currentProductAmount if we do have enough or not
    $data = getCurrentProductNumber($order, $dbconn);
   
    
    echo "<pre>";
    print_r($data);
    echo "</pre>";

    //if we do have enough product then update available and save order
    if($data["message"] == "") {

    //Cherk currentProductAmount if we do have enough or not
        $data["message"] = updateProductAndSaveOrder($order, $data, $dbconn);
    }

    //echo $message;
    $result = array(
        "message" => $data["message"],
    );
    echo json_encode($result);
}

if($_POST["c"] == "deleteProductAmount") {

    $products = json_decode($_POST["product"], true);
        
    $productToUpdateIndex = array_search($_POST["termek_id"], array_column($products, 'termek_id'));

    $deletLine = false;
    $lineId = $products[$productToUpdateIndex]["id"];
    $newAmount = 0;

    if($products[$productToUpdateIndex]["darab"] > $_POST["darab_szam"]) {
        $newAmount = $products[$productToUpdateIndex]["darab"] - $_POST["darab_szam"];
        $products[$productToUpdateIndex]["darab"] = $newAmount;
    } else {
        $deletLine = true;        
        unset($products[$productToUpdateIndex]);
    }
    
    $result = array(
        "products"   => $products,
        "deleteline" => $deletLine,
        "lineid"     => $lineId,
        "newAmount"  => $newAmount,
        "message"    =>$message,
    );
    echo json_encode($result);
}