<?php
    require "../VIEWS/fonctionAffichage.php";

?>

<!DOCTYPE html>

<head>
    <title>LOGIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
    
    
    
    <div class="FORM">
        
        <div class="form-text">
            
            <header><a href="../home.php">Game Card</a></header>
            <h1>Login</h1>
              <?php
                    if(isset($_GET["error"])){
                        msgLogin($_GET["error"]);
                    }
            
                    formAfficheLogin();
              ?>
        
        
        
        </div>
        
        
    </div>
   
    

</body>