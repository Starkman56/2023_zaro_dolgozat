<?php
require("kapcsolat/kapcs.php");

function getCurrentProductNumber($order = array(), $message = "", $dbconn) {
    
    $products = array();

    foreach($order as $key => $product) {
    
        /** megkéne oldani, hogy csak akkor update-elje a db-ben az adatokat, hogyha minden
        *   terméknél van megfelelelő darabszám ellenkezőleg térjen vissza hibaüzenettel
        */
        $sql = "
            SELECT darab
            FROM termek
            WHERE id = '{$product["termek_id"]}'
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

        if($currentProductNumber["darab"] < $product["darab"]) {
            //echo 'Nincs elég termék, de miért?';
            $message = "Nem áll rendelkezésre megfelelő számú termék";
            return array(
                "message" => $message,
                "products" => array(),
            );
        } 
        
        $products[$product["termek_id"]] = $currentProductNumber["darab"];
        
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
        $newProductNumber = $data["products"][$product["termek_id"]] - $product["darab"];

        $sql = "
            UPDATE termek
            SET darab = {$newProductNumber}
            WHERE id = '{$product["termek_id"]}'
        ";        
                
        mysqli_query($dbconn, $sql);
        $message = "Sikeres mentés";
    }

    return $message;
}




if ($_POST["c"] == "orderSave") {
        /*
    "id":4,
      "name":"Okuma Custom Black Ceymar River Feeder",
      "no":100,
      "price":41000,
      "darab":4
      */
    $order = json_decode($_POST["cuccok"], true);
    
    $message = "";
    
    $data = getCurrentProductNumber($order, $message, $dbconn);
    /*
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    */
    
    if($data["message"] == "") {
        $data["message"] = updateCurrentProductNumber($order, $data, $dbconn);
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
    );

    echo json_encode($result);
}