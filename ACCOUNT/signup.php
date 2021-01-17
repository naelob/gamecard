<?php
    require "../VIEWS/fonctionAffichage.php";

?>

<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="signup.css">
            <title>SIGN UP</title>
		</head>

		<body>
            
            
            <div class="FORM">
                
                <div class="FORM-text">
                    <header><a href="../home.php">Game Card</a></header>
                    <h1>Sign Up</h1>
                    <?php
                    if(isset($_GET["error"])){
                        msgSignup($_GET["error"]);
                    }
                        formAfficheFormSignUp();

                    ?>
                  
			
                    
                </div>
     
            </div>
			
		</body>

	</html>
