<?php
require '../extern/dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';


?>
<!DOCTYPE html>

<html>
    <head>
        <title>RANKING</title>
        <meta charset="utf-8">
        
        <link rel="stylesheet" href="classement.css">
    
    </head>
    <body>
        <div class="logo">
            <a href="../home.php" style="text-decoration:none;">Game Card</a>
        </div>
        <?php 
            $res = SelectClassement($conn);
            AuxClassement($res);
        
        ?>
        
        
        
    </body>


</html>