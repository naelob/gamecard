<?php 
session_start();
require "VIEWS/fonctionAffichage.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="home.css">
    <title>GAME GARD</title>


</head>


<body style="background-color: black;">
    <header>
        <div class="logo">Game Card</div>
        <div class="inscription">
            <?php if(isset($_SESSION["userId"])) { 
                checkLog($_SESSION["userId"]); 
              }else{
                checkLog(NULL);    
              }
        ?>
        </div>



    </header>

    <div class="textgame">
        Come get a taste! <br>
        The Best Game <br> To Check Your Knowledge. <br>
        Impress Your Friends!

    </div>
    <a href="readMe.html" style="text-decoration:none;font-size:15px;float:right;font-family:arial;margin-right:30px;">HOW TO PLAY</a>
    <div class="image">
        <img src="img-site/img.png">

    </div>
   

 
</body>


</html>
