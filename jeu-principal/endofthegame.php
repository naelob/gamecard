<?php
session_start();
require '../extern/dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';


$theme = $_GET["theme"];
$id = $_SESSION["userId"];

$tab = SelectJeuActive($id,$theme,$conn);

$score = $tab["currentScore"];
$ordreSuivant = $tab["ordreSuivant"];
$nbrErreur = $tab["nbrErreur"];

$bestEver = BestEver($theme,$conn);
UpdateBestEver($conn,$theme,$score,$bestEver);

$bestScore = BestScore($id,$conn);


UpdateGameCardBestScore($score,$bestScore,$id,$conn);
UpdateJeuActiveEnd($ordreSuivant,$id,$theme,$conn);





?>
<!DOCTYPE html>

<html>
    <head>
        <title>END OF THE GAME</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="endofthegame.css">
        
    
    </head>
    <body>
        <div class="logo">
            <a href="../home.php" style="text-decoration:none;">Game Card</a></div>
            <?php 
                    afficheFormVote($theme);
              
            ?>
        
       
        <div class="gif" style="text-align:center">
            <img src="../img-site/original%20(1).gif">
        
        </div>
        <div class="p" style="text-align:center;font-family:elgoc;">
            End of the game! <br>
            SCORE: <br>
            <?php
                
                echo $score;

            ?>
            <br>
            Vous avez fait 
            <?php
                echo $nbrErreur;
            
            ?> 
            erreurs! <br>
            <a href="jeu-principal.php" style="text-decoration:none;color:orchid;">BACK HOME</a>
        </div>
    
    </body>


</html>