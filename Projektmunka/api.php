<?php
session_start();
require("kapcsolat/kapcs.php");

/////
function getCurrentProductNumber($order = array(), $dbconn) {
    $products = array();
    foreach($order as $orderItem) {
        $message = "";
        $sql = "
            SELECT darab
            FROM termek
            WHERE id = '{$orderItem["termek_id"]}'
        ";        
        $result = mysqli_query($dbconn, $sql);
        $currentProductNumber = mysqli_fetch_array($result);
        if($currentProductNumber["darab"] < $orderItem["darab"]) {
            $message = "Nem áll rendelkezésre megfelelő számú termék";
            return array(
                "message" => $message,
                "products" => array(),
            );
        } 
        $products[$orderItem["termek_id"]] = $currentProductNumber["darab"];
    }

    $result = array(
        "message"   => $message,
        "products"  => $products,
    );
    return $result;
}
/////
function updateCurrentProductNumber($order = array(), $data = array(), $dbconn) {

    foreach($order as $product) {
        $newProductNumber = $data["products"][$product["termek_id"]] - $product["darab"];
        
        $sql = "
            UPDATE termek
            SET darab = {$newProductNumber}
            WHERE id = '{$product["termek_id"]}'
        ";        
        mysqli_query($dbconn, $sql); 
    }
}
/////
function saveOrder($order = array(), $dbconn) {
    $string = bin2hex(openssl_random_pseudo_bytes(10));
    foreach($order as $orderItem) {   
        $sql = "
            INSERT INTO megrendeles
            (szemelyek_id, rendelt_darab, termek_id,rendeles_azonosito,rendeles_allapot_id) VALUES (
                '{$_SESSION["id"]}','{$orderItem["darab"]}','{$orderItem["termek_id"]}','{$string}','1'
            )
        ";
        mysqli_query($dbconn, $sql);
    }

}

function updateProductAndSaveOrder($order = array(), $data = array(), $dbconn) {
    updateCurrentProductNumber($order, $data, $dbconn);
    saveOrder($order, $dbconn);
    $result = "Sikeres mentés";
    return $result;
}   

/////
if ($_POST["c"] == "handleOrder") {
    $order = json_decode($_POST["cuccok"], true);
    $data = getCurrentProductNumber($order, $dbconn);
    if($data["message"] == "") {
        $data["message"] = updateProductAndSaveOrder($order, $data, $dbconn);
    }
    $result = array(
        "message" => $data["message"],
    );
    echo json_encode($result);
}

//////
if($_POST["c"] == "deleteProductAmount") {

    $message = "Sikeres mentés";

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
        "message"    => $message,
    );
    echo json_encode($result);    
}

/////
if($_POST["c"] == "updateProductStatus") {

    $message = "Sikeres mentés";

    $sql = "
       UPDATE megrendeles SET rendeles_allapot_id = '{$_POST["status"]}'
       WHERE termek_id = '{$_POST["termek_id"]}' AND szemelyek_id = '{$_POST["szemely_id"]}'
    ";
    echo $sql;
    mysqli_query($dbconn, $sql);   

    $result = array(
        "message"    => $message,
    );
    echo json_encode($result);    
}