<?php
require("kapcsolat/kapcs.php");

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

    foreach($order as $product) {
        
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
         //   $message = "Nem áll rendelkezésre megfelelő számú termék";
        } else {
            
            $newProductNumber = $currentProductNumber["darab"] - $product["darab"];

            $sql = "
            UPDATE termek
            SET darab = {$newProductNumber}
            WHERE id = '{$product["termek_id"]}'
            ";        
            
            mysqli_query($dbconn, $sql);

           // $message = "Sikeres mentés";
        }

    }
        
    $result = array(
        "message" => "Sikeres mentés",
    );

    //nem működik vissza küldés, meg kell nézni
    echo json_encode($result);
}