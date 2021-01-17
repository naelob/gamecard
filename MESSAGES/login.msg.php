<?php 
session_start();
require("../extern/security.ext.php");
$username = preTraiterChamp($_SESSION["username"]);

?>
<!DOCTYPE html>

<html>
    <head>
        <title>WELCOME!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="login.msg.css">
    
    </head>
    
    <body>
        
        <p>WELCOME <?php echo $username; ?>, <br> you are now <br> logged in  </p>
        
        <div class="btn">
            <button type="button"><a href="../jeu-principal/jeu-principal.php"><span>START</span></a></button>
            
        </div>
        <div class="gif">
            <img src="../img-site/original%20(1).gif">
        
        </div>
        <div class="logo">
            
            <a href="../home.php" style="text-decoration:none">Game Card</a>
        
        </div>
        <div class="home-redirection"><a href="../home.php" style="text-decoration:none;font-family:arial">HOME</a></div>
             
    
    
    </body>


</html>



