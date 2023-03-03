<?php


$eredmeny = mysqli_query($dbconn, $sql);

$kimenet = "";

while ($sor = mysqli_fetch_assoc($eredmeny)) {
    $kimenet .=
        "
          <div class=\"card\">
              <img src=\"../keps/{$sor['foto']}\" alt=\"{$sor['nev']}\">
              <div class=\"card-body\">
                <h5 class=\"card-title\">{$sor['nev']}</h5>
              </div>
              <ul class=\"lista list-group list-group-flush\">
                <li class=\"leiras list-group-item\">{$sor['leiras']}</li>
                <li class=\"list-group-item\">{$sor['darab']}<span> Raktáron</span></li>
                <li class=\"list-group-item\">{$sor['ar']}<span> Ft </span></li>
                <input type='number'id='termekdarab' value='1'>
              <button type='submit  ' class='btn btn-outline-dark kosarhoz'>Kosárba</button>
              </ul>
             
         </div>
       
            ";        
}
$kimenet .= "";


?>