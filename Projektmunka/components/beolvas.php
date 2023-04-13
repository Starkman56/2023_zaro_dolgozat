<?php


$eredmeny = mysqli_query($dbconn, $sql);

$kimenet = "";

//$sor = mysqli_fetch_assoc($eredmeny);
/*
echo "<pre>";
print_r($sor);
echo "</pre>";
*/
while ($sor = mysqli_fetch_assoc($eredmeny)) {
    $kimenet .=
        "
          <div class=\"card\">
              
            <div class=\"card-header\">
              <img id =\"arukep\" class=\"cikkkep\" src=\"../keps/{$sor['foto']}\" alt=\"{$sor['nev']}\">
                <h5 class=\"card-title\">{$sor['nev']}</h5>
                <span style='display: none'>{$sor['id']}</span>
            </div>
            <ul class=\"lista list-group list-group-flush\">
                  <li class=\"leiras list-group-item\">{$sor['leiras']}</li>
                  <li class=\"list-group-item\">{$sor['darab']}<span> Raktáron</span></li>
                  <li class=\"list-group-item\">{$sor['ar']}<span> Ft </span></li>
                  <li class=\"kosarli\">
                    <input type='number' min='0' id='termekdarab' value='0'>
                    <button type='submit' id='kosar_{$sor["id"]}' data-product_id = '{$sor['id']}' class='kosar btn btn-outline-dark kosarhoz'>Kosárba</button>
                  </li>
            </ul>           
         </div>
       
            ";        
}
$kimenet .= "";


?>