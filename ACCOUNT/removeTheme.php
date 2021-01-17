<?php
    require "../VIEWS/fonctionAffichage.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="removeTheme.css">
    <title>REMOVE THEME</title>
</head>

<body>
    <div class="FORM">

        <div class="form-text">

            <header><a href="../home.php">Game Card</a></header>
            <h1>REMOVE THEME</h1>
              <?php
                if(isset($_GET["update"])){
                    msgRemoveTheme($_GET["update"]);
                }
                
                    afficheFormRemoveTheme();  
            ?>
                    

            
        </div>
    </div>


</body>



</html>
