<?php
session_start();
require '../extern/dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';
$id = $_SESSION["userId"];
$theme = $_GET["theme"];
$questionId = $_GET["id"];

?>

<!DOCTYPE html>

<html>

<head>
    <title>REPORT</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="endofthegame.css">


</head>

<body>
    <div class="logo" style="margin-bottom:100px;">
        <a href="../home.php" style="text-decoration:none">Game Card</a>
    </div>
    <div class="gif" style="text-align:center">
        <img src="../img-site/original%20(1).gif" width="300px">

    </div>



    <?php afficheFormSignal($questionId,$theme); ?>
    
    <div class="p" style="text-align:center;">

        <a href="jeu-principal.php" style="text-decoration:none;font-family:elgoc">BACK HOME</a>
    </div>

</body>


</html>
