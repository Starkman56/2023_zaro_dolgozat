<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//lapvédelem
session_start();

require("kapcsolat/kapcs.php");
if(isset($_POST['ok']))
{
    
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $pass = sha1($_POST['jelszo']);

    $select = "SELECT * FROM `szemelyek`
               WHERE email = '$email' && jelszo = '$pass'";

    $result = mysqli_query($dbconn, $select);

    if(mysqli_num_rows($result) > 0)
    {
        
       $row = mysqli_fetch_assoc($result);
        
       if($row['jog'] == 'admin')
       {
        $_SESSION['felh_nev'] = $row['felh_nev'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['belepett'] = true;
        header('Location:admin/adminlist.php');
       }
       elseif($row['jog'] == 'user')
       {
        $_SESSION['felh_nev'] = $row['felh_nev'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['belepett'] = true;
        $id = $row['id'];
        header('Location:user/webshop.php');
       }
    }
    else
    {
        $error[] = "Helytelen e-mail címet, vagy jelszót adott meg!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <meta name="viewport" content="width=520, target-densitydpi=high-dpi" />
<meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=utf-8" />
<meta name="HandheldFriendly" content="true" />
<meta name="apple-mobile-web-app-capable" content="yes" /> 
    <title>Document</title>
    <link rel="stylesheet" href="css/register.css">

</head>
<body> 
    <div class="background" id="background"></div>
   
        

        <form method="post">
        <?php
        if(isset($error))
        {
            foreach($error as $error)
            {
                echo '<p class="error">'.$error.'</p>';
            }
        }
        ?>
            <p class="jel">Bejelentkezés</p>
            <div class="bevitel">
             <input type="email" name="email" id="email" placeholder="E-mail cím" required>
            </div>
            <div class="bevitel">
             <input type="password" name="jelszo" id="jelszo" placeholder="Jelszó" required>
            </div>        
            <div class="gomb"><input type="submit" value="Bejelentkezés" id="ok" name="ok"></div>
            <p class="reg">Nincs még fiókja? <a href="register.php">Regisztráljon itt!</a></p>
            <p class="kapcs">Elfelejtette jelszavát?<a href="user/main.php#scroll"> Lépjen kapcsolatba velünk!</a></p>
    </form>
    
    
 
    
    <script src="js/hater.js"></script>
   <script>
    $(document).ready(function(){
  if(window.location.hash) {
    $('html, body').animate({
        scrollTop: $(window.location.hash).offset().top
    }, 1000);
  }
});
   </script>

</body>

</html>




