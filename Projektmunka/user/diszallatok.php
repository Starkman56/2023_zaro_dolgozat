<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

if (!isset($_SESSION['belepett'])) {
    header("Location: false.html");
    exit();
}
    //Elemek meghívása
require("../kapcsolat/kapcs.php");


?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&amp;display=swap" rel="stylesheet">
    <!-- nav linkek -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/mainpage.css">
    <title>Diszallatok</title>
    <script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyU2lkZWJhciUyMCUyMzElMjIlMkMlMjJ4JTIyJTNBMC43NTcwNjQ1MzE3ODcxMzc2JTJDJTIydyUyMiUzQTE5MjAlMkMlMjJoJTIyJTNBMTA4MCUyQyUyMmolMjIlM0E5MzclMkMlMjJlJTIyJTNBMTkyMCUyQyUyMmwlMjIlM0ElMjJodHRwcyUzQSUyRiUyRnByZXZpZXcuY29sb3JsaWIuY29tJTJGdGhlbWUlMkZzaWRlYmFyJTJGY29sb3JsaWItc2lkZWJhci12MDElMkYlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkYlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBLTYwJTJDJTIycSUyMiUzQSU1QiU1RCU3RA=="></script>
</head>

<body>
<?php
require("../components/mainnav.php");
?>
    <!--Website container-->
    
<div class="diszallatokmain">
  <div class="alap animate__animated animate__backInLeft hover-img2">    
  <a href="../user/webshop.php"><img class="diszallatokkep " src="../keps/fishing.jpg" alt=""><figcaption>Madarak</figcaption></a>
  </div>
  <div class="alap animate__animated animate__backInRight">
  <p class="szoveg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio delectus dolores, illum quasi voluptatibus ab est. Officiis dolor, quo aliquid magnam aspernatur vitae iure ipsa tenetur recusandae nihil atque alias quaerat at fugit maxime voluptatem deleniti sed similique explicabo. Sint perferendis non voluptate dignissimos provident, nostrum id tenetur, tempore illum dolores vel repudiandae facere, quasi reiciendis nesciunt ratione in harum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis neque totam natus in fugiat, alias ut cumque perferendis blanditiis consequuntur nam autem nesciunt tenetur unde sed vitae numquam magni similique.</p>
  </div>
  <div class="alap animate__animated animate__backInLeft">
  <p class="szoveg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio delectus dolores, illum quasi voluptatibus ab est. Officiis dolor, quo aliquid magnam aspernatur vitae iure ipsa tenetur recusandae nihil atque alias quaerat at fugit maxime voluptatem deleniti sed similique explicabo. Sint perferendis non voluptate dignissimos provident, nostrum id tenetur, tempore illum dolores vel repudiandae facere, quasi reiciendis nesciunt ratione in harum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis neque totam natus in fugiat, alias ut cumque perferendis blanditiis consequuntur nam autem nesciunt tenetur unde sed vitae numquam magni similique.</p>
  </div>
  <div class="alap animate__animated animate__backInRight hover-img2">
  <a href="../user/diszallatok.php"> <img class="diszallatokkep" src="../keps/madareteto.jpg" alt=""><figcaption>Diszhalak</figcaption></a>
  </div>
  <div class="alap animate__animated animate__backInLeft hover-img2">    
  <a href="../user/webshop.php"><img class="diszallatokkep " src="../keps/fishing.jpg" alt=""><figcaption>Rágcsáló</figcaption></a>
  </div>
  <div class="alap animate__animated animate__backInRight">
  <p class="szoveg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio delectus dolores, illum quasi voluptatibus ab est. Officiis dolor, quo aliquid magnam aspernatur vitae iure ipsa tenetur recusandae nihil atque alias quaerat at fugit maxime voluptatem deleniti sed similique explicabo. Sint perferendis non voluptate dignissimos provident, nostrum id tenetur, tempore illum dolores vel repudiandae facere, quasi reiciendis nesciunt ratione in harum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis neque totam natus in fugiat, alias ut cumque perferendis blanditiis consequuntur nam autem nesciunt tenetur unde sed vitae numquam magni similique.</p>
  </div>
</div>

    <!-- nav scriptek -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon="{&quot;rayId&quot;:&quot;799ed0aa7ac3c24a&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2023.2.0&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="navbar.js"></script>

    <!-- nav scriptek -->
    <script src="../js/script.js"></script>
  <?php
  require("../components/footer.php");
  ?>  


  </body>

</html>