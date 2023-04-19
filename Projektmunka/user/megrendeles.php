<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/adminlista.css">
    <link rel="stylesheet" href="../css/megrendel.css">
    <title>Megrendelés</title>
</head>
<body>
    <?php require("../components/mainnav.php"); ?>
    <div class="main">
    <h1>Megrendelés</h1>
    <h3 id="rendeles"></h3>
    <h4 id="total"></h4>
    <h2>A rendelés véglegesítéséhez kérjük kattintson a megerősítés gombra: <br> <input type="submit" name="tel" id="kuldes" value="Megerősítés" onclick="handleOrder();">  </h2>
    
<script>
    let asd = new Array();
    window.onload = function (){
    JSON.parse(localStorage.getItem('cuccok')).map(data => {
            document.getElementById("rendeles").innerHTML+=(
           '<ul><li>'+data.darab +" darab " + data.name + " "+ (data.darab * data.price) + '</li></ul>');   
        darabszam = data.darab;
        asd.push(data.darab);
        });
        
    let sum = 0;
    JSON.parse(localStorage.getItem('cuccok')).map(data => {
        sum += data.darab * data.price;
    });
    
    document.getElementById("total").innerHTML = "Fizetendő összesen " + sum + " Ft";
    
}

    function handleOrder() {
        let order = localStorage.getItem("cuccok");
        $.ajax({
            method: "POST",
            url: "../api.php",
            dataType: "JSON",
            data: { 
                c: "handleOrder", 
                cuccok: order 
            },
            success:function(result) {
                if (result.message == "Sikeres mentés") {  
                    localStorage.setItem("cuccok", JSON.stringify(null));
                    let cuccok = localStorage.getItem("cuccok");
                    //console.log("Cuccok tartalma mentés után:",cuccok);
                    window.location.href = "horgasz.php";
                } else {
                    alert("Nincsen raktáron ennyi termék.");
                    window.location.href = "horgasz.php";
                }
                //console.log(result.message);
            },
            failure: function(errMsg) {
                alert(errMsg);
            }                     
        })
    }
 </script>
</div>
</body>
</html>