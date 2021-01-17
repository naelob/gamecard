<?php
session_start();
require '../extern/dbh.ext.php';
require "../VIEWS/fonctionRequete.php";
require "../VIEWS/fonctionAffichage.php";

$id = $_SESSION["userId"];

$bestScore = BestScore($id,$conn);
$status = UpdateStatus($bestScore,$conn);


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="account.css">
    <title>SIGN UP</title>
</head>

<body>


    <div class="FORM">

        <div class="FORM-text">
            <header><a href="../home.php">Game Card</a></header>
              <?php
                    if(isset($_GET["update"])){
                        msgUpdateAccount($_GET["update"]);
                    }
                    
              ?>
           
            <img src="../img-site/bo.png" width="150px">
            <p>Best Score</p>
            <p style="font-size:13px;font-style:italic;color:mediumorchid"><?php echo $bestScore; ?></p>
            <p>status</p>
             <p style="font-size:13px;font-style:italic;color:mediumorchid"><?php echo $status; ?></p>
            <h1>Account</h1>

            <?php 
                afficheFormAccount($status);
                afficheFormAccountDelete();
            
            ?>
            
            


        </div>

    </div>

</body>










</html>
