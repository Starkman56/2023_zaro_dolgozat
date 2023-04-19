<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("../components/links.php") ?>
  

    <title>Webshop</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php require("../components/nav.php"); ?>

    <!--Website container-->
    <div class="container">
        <div class="nincsentalalat hidden" >Nincsen ilyen termék az oldalon</div>
        <div class="cards">
            <?php
            print $kimenet;
            ?>
    </div>
    <div id="modal" class="hidden">
            <img src="" alt="">
            <button>×</button>
        </div>
    </div>
<?php
require("../components/footer.php");
?>
</body>
</html>