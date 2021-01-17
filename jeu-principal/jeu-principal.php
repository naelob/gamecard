<?php
session_start();

require '../extern/dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';

$id = $_SESSION["userId"];
?>
<!DOCTYPE html>

<html>

<head>
    <title>MAIN</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="jeu-principal.css">

</head>

<body>
    <div class="logo">
        <a href="../home.php">Game Card</a></div>



    <div style="text-align:center" class="msg-success">
        <?php 
                if(isset($_GET["msg"])){
                    afficheMsgSignal($_GET["msg"]);
                }
                

                ?>



    </div>
    <?php afficheFormResetQuiz(); ?>
    <div style="text-align:center;margin-top:10px;">
        <a href="classement.php" style="font-family:elgoc">About The Game</a>
    </div>
    <?php 
        
                $res = SelectLastGame($id,$conn);
                $ligne = mysqli_fetch_assoc($res);
                $theme = $ligne["lastGame"];
                if($theme!=NULL){
                    afficheMsgLastGame($theme);
                }
                 
            ?>


    <div class="gif" style="text-align:center">
        <img src="../img-site/original%20(1).gif">

    </div>

    <div class="cards">
        <!--<div class="histoire">
                <a href="cardRep.php?theme=histoire"><h5>HISTOIRE</h5></a>
            </div>
            <div class="sport">
                   <a href="cardRep.php?theme=sport"><h5>SPORT</h5></a>
            </div>
            <div class="culture">
                   <a href="cardRep.php?theme=culture"><h5>CULTURE</h5></a>
            </div>
            <div class="sciences">
                  <a href="cardRep.php?theme=sciences"><h5>SCIENCES</h5></a>
            </div>-->
        <?php   
            $res = RecupTheme($conn);
            AfficheTheme($res);
        ?>
    </div>


</body>


</html>
