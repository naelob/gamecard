<?php
    require "../VIEWS/fonctionAffichage.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="addQuest.css">
    <title>ADD QUESTIONS</title>
</head>

<body>
    <div class="FORM">

        <div class="form-text">

            <header><a href="../home.php">Game Card</a></header>
               <p style="color:orange;font-size:15px;">
           
            </p>

            <h1>ADD CUSTOM QUESTIONS</h1>
             <?php
                    if(isset($_GET["update"])){
                       
                       msgAddQuest($_GET["update"]);   
                    }
                    afficheFormAddQuest();      
             ?>

            
        </div>
    </div>

</body>


</html>
