<?php
    require "../VIEWS/fonctionAffichage.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="createTheme.css">
    <title>CREATE THEME</title>
</head>

<body>
    <div class="FORM">

        <div class="form-text">

            <header><a href="../home.php">Game Card</a></header>
               <p style="color:orange;font-size:15px;">
           
            </p>

            <h1>ADD CUSTOM THEME</h1>
             <?php
                    if(isset($_GET["msg"])){
                       
                       msgAddTheme($_GET["msg"]);   
                    }
                    afficheFormCreate();      
             ?>

            
        </div>
    </div>

</body>


</html>
