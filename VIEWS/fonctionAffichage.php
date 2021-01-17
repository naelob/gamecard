<?php

function checkLog($id){
    if($id!=NULL){
        echo '<form action="extern/logout.ext.php" method="post">
            <button type="submit" name="logout-submit" id="btn">LOG OUT</button>

            </form>';
        echo '<p><a href="MESSAGES/login.msg.php" id="PLAY-btn">PLAY</a></p>';
        echo ' <p><a href="ACCOUNT/account.php" id="account-btn" style="margin-top:30px">ACCOUNT</a></p>';

    }else{
        echo '<a href="ACCOUNT/signup.php"><li>SIGN UP</li></a>
        <a href="ACCOUNT/login.php"><li>LOG IN</li></a>';
    } 
}

function msgLogin($error){
    if($error!=NULL){
        if($error=="wrongpassword"){
            echo '<p class="msg-erreur">Mot de passe invalide!</p>';
        }else if($error=="dontexist"){
            echo '<p class="msg-erreur">Utilisateur inexistant!</p>';
        }

    }
}

function formAfficheLogin(){ ?>

<form action="../extern/login.ext.php" method="post">
    <label class="un">username/mail</label> <br>
    <input type="text" placeholder="Entrer le nom d'utilisateur/Email" name="username" required> <br>



    <label class="un">password</label> <br>
    <input type="password" placeholder="Entre ton mot de passe" name="password" required> <br>


    <button type="submit" name="login-submit">Log In</button>
</form>
<div class="bottom-text">
    <p>DON'T HAVE AN ACCOUNT ? <a href="signup.php" id="signup">SIGN UP</a></p>

</div>
<a href="../PASSWORD/reset-password.php" class="forgot-pwd">FORGOT YOUR PASSWORD ?</a>

<?php } 

function msgSignup($msg){
            if($msg=="invalidusername&email"){
                echo '<p class="msg-erreur">Pseudo et email invalides!</p>';
            }else if($msg=="invalidusername"){
                echo '<p class="msg-erreur">Pseudo invalide!</p>';
            }else if($msg=="invalidemail"){
                echo '<p class="msg-erreur">Email invalide!</p>';
            }else if($msg=="PWDdontmatch"){
                echo '<p class="msg-erreur">Les mots de passe ne correspondent pas!</p>';
            }else if($msg=="USERNAMETAKEN"){
                echo '<p class="msg-erreur">Pseudo déja utilisé!</p>';
            }else if($msg=="PWDdontmatchAndUsername"){
                echo '<p class="msg-erreur">Pseudo et mot de passe invalides!</p>';
            }else if($msg=="PWDERROR"){
                echo '<p class="msg-erreur">Mot de passe invalide: la taille doit etre superieure à 6 et il doit contenir une MAJ et un chiffre!</p>';
            }
                    
    }

function formAfficheFormSignUp() { ?>

<form action="../extern/signup.ext.php" method="post">

    <label>name</label> <br>
    <input type="text" name="prenom" placeholder="Entrez votre prenom" required autocomplete="off"> <br>


    <label>username</label> <br>
    <input type="text" name="username" placeholder="Tapez un nom d'utilisateur" required autocomplete="off">

    <br>


    <label>email</label> <br>
    <input type="email" name="email" placeholder="Entrez votre email" required autocomplete="off"> <br>

    <label>password</label> <br>
    <input type="password" name="password" placeholder="Votre mot de passe" required autocomplete="off"> <br>

    <label>confirm your password </label> <br>
    <input type="password" name="password2" placeholder="Retaper votre mot de passe" required autocomplete="off"> <br>



    <input type="checkbox" name="accepter" value="OK" checked required autocomplete="off"><span id="accept">J’accepte les
        conditions d'utilisation</span>


    <button type="submit" name="signup-submit">Sign Up</button>


</form>
<p>ALREADY HAVE AN ACCOUNT ?<a href="login.php"> LOG IN</a></p>

<?php }

function msgRemoveQuestions($msg) {
    if($msg=="SUCCESS"){
        echo '<p class="msg-erreur">Your question has been removed!</p>';
    }

}

function afficheFormRemoveQuest() { ?>

<form action="../extern/removeQuest.ext.php" method="post">

    <label for="theme">Theme</label><br>
    <input name="theme" placeholder="theme"><br>
    <label for="type">Type</label><br>
    <input name="type" placeholder="texte/qcm"><br>
    <label for="question">Question</label><br>
    <input name="question" placeholder="add a question" autocomplete="off"><br>
    <button type="submit" style="margin-top:-5px;margin-bottom:5px" name="update">UPDATE</button>
    <br>

</form>
<?php }

function msgAddQuest($msg) {
     if($msg=="SUCCESS"){
        echo '<p class="msg-erreur">Your question has been added!</p>';
     }
}

function afficheFormAddQuest() { ?>

<form action="../extern/addQuest.ext.php" method="post">

    <label for="theme">Theme</label><br>
    <input name="theme" placeholder="theme" autocomplete="off"><br>
    <label for="question">Question</label><br>
    <input name="question" placeholder="add a question" autocomplete="off"><br>
    <label for="reponse">Answer</label><br>
    <input name="reponse" placeholder="add an answer" autocomplete="off"><br>
    <label for="type">Type</label><br>
    <input name="type" placeholder="qcm/texte" autocomplete="off"><br>
    <label for="type">Propositions(Qcm Only)</label><br>
    <input name="prop1" placeholder="proposition 1" autocomplete="off"><br>
    <input name="prop2" placeholder="proposition 2" autocomplete="off"><br>
    <input name="prop3" placeholder="proposition 3" autocomplete="off"><br>
    <label for="level">Level</label><br>
    <input name="level" placeholder="1, 2, or 3" autocomplete="off">
    <br>
    <button type="submit" style="margin-top:-5px;margin-bottom:5px;margin-right:10px" name="adding-quest">ADD</button>
    <a href="removeQuest.php">Want to Remove ?</a>



</form>
<?php }

function msgUpdateAccount($error) {
    if($error=="USERNAMETAKEN"){
            echo '<p class="msg-erreur">Pseudo déja utilisé!</p>';
    }else if($error=="invalidusername"){
        echo '<p class="msg-erreur">Pseudo invalide!</p>';
    }else if($error=="emptyfields"){
        echo '<p class="msg-erreur">Veuillez remplir un champ!</p>';
    }else if($error=="SUCCESS"){
        echo '<p class="msg-erreur">Merci tes informations ont été modifiées!</p>';
    }
}

function afficheFormAccount($status) { ?>

<form action="../extern/account.ext.php" method="post">

    <label>update name</label> <br>
    <input type="text" name="prenom" placeholder="Modifier votre prenom"> <br>


    <label>update username</label> <br>
    <input type="text" name="username" placeholder="Modifier votre nom d'utilisateur">

    <br>


    <button type="submit" name="validate-submit">Valider</button>

    <?php
        if($status=="expert"){
            echo '<a href="addQuest.php" class="lien">ADD QUESTIONS</a><br>';
            echo '<a href="createTheme.php" class="lien">ADD THEME</a>';
        }

    ?>



</form>
<?php }

function afficheFormAccountDelete() { ?>

    <form action="../extern/delete.ext.php" method="post">

        <button type="submit" name="delete-submit">Delete Account</button>
              
    </form>
<?php }

function afficheFormResetPassword() { ?>

    <form action="../extern/reset-request.inc.php" method="post">
        <label>email</label> <br>
        <input type="text" name="email" placeholder="Entrez votre email" required>
        <br>

        <button type="submit" name="reset-request-submit">Receive new password by email</button><br>
        <img src="../img-site/original%20(1).gif">
        <a href="../ACCOUNT/signup.php" id="back-signup">SIGN UP</a> <br> <br>
        <a href="../ACCOUNT/login.php" id="back-login">LOG IN</a>
                
                
    </form>
<?php }


function afficherCarteTexte($question,$theme,$a,$compteur){ ?>

<!DOCTYPE html>
<html>

<head>
    <title><?php $u = strtoupper($theme);
                echo $u; 
            ?>
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">

</head>

<body
      <?php 
                     if($theme=="sport") {
                        echo 'style="background: linear-gradient(45deg,#3503ad,#f7308c);"'; 
                     }else if($theme=="culture"){
                        echo 'style="background: linear-gradient(45deg,#ccff00,#09afff);"'; 
                     }else if($theme=="histoire"){
                        echo 'style="background: linear-gradient(45deg,#e91e63,#ffeb3b);"'; 
                     }else{
                        echo 'style="background: linear-gradient(45deg,#ACD3E9,#ffeb3b);"'; 
                     }
                         
        
                 ?> 
>
    <div class="container">

        <div class="card">
            <div class="face face1">
                <div class="content">
                    <h3 style="text-align:center;margin-top:20px;"><?php echo $question; ?></h3>
                    <div class="img" style="text-align:center;margin-bottom:60px;">
                        <img src="../images-quiz/<?php echo $theme; ?>/<?php echo $a; ?>.png" width="100px" style="border-radius:20px;">
                    </div>

                    <form action="cardRep.php?theme=<?php echo $theme;?>" method="post" style="margin-bottom:10px">
                        <div style="text-align:center;margin-top:15px;">
                        <input type="text" placeholder="Entrez votre réponse" name="reponse" style="margin-bottom:8px;" autocomplete="off"><br>
                        
                            <button type="submit">Valider</button>
                        </div>
                    </form>
                   <div class="lien" style="text-align:center">
                    <a href="jeu-principal.php" style="color:black; text-decoration:none;font-size:13px">BACK HOME</a><br>
                    <a href="signal.php?theme=<?php echo $theme; ?>&id=<?php echo $a; ?>" style="color:orchid; text-decoration:none;font-size:13px">Signaler!</a>
                       
                    </div>
                    

                </div>

            </div>
            <div class="face face2" 
                 <?php 
                     if($theme=="sport") {
                        echo 'style="background: linear-gradient(45deg,#3503ad,#f7308c);"'; 
                     }else if($theme=="culture"){
                        echo 'style="background: linear-gradient(45deg,#ccff00,#09afff);"'; 
                     }else if($theme=="histoire"){
                        echo 'style="background: linear-gradient(45deg,#e91e63,#ffeb3b);"'; 
                     }else{
                        echo 'style="background: linear-gradient(45deg,#ACD3E9,#ffeb3b);"'; 
                     }
        
                 ?>  
                 
            >
                <h2><?php echo $compteur; ?></h2>

            </div>

        </div>

    </div>
    
   


</body>



</html>


<?php }  


function afficherCarteProp($question,$prop1,$prop2,$prop3,$theme,$a,$compteur){ ?>

<!DOCTYPE html>
<html>

<head>
    <title><?php $u = strtoupper($theme);
                echo $u; 
            ?>
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">

</head>

<body
       <?php 
                     if($theme=="sport") {
                        echo 'style="background: linear-gradient(45deg,#3503ad,#f7308c);"'; 
                     }else if($theme=="culture"){
                        echo 'style="background: linear-gradient(45deg,#ccff00,#09afff);"'; 
                     }else if($theme=="histoire"){
                        echo 'style="background: linear-gradient(45deg,#e91e63,#ffeb3b);"'; 
                     }else{
                        echo 'style="background: linear-gradient(45deg,#ACD3E9,#ffeb3b);"'; 
                     }
                         
                 
                 
                 ?>  
 
>
    
    
    <div class="container">
        

        <div class="card">
            <div class="face face1">
                <div class="content">
                    <h3 style="text-align:center;margin-top:20px;"><?php echo $question; ?></h3>
                    <div class="img" style="text-align:center;margin-bottom:20px;">
                        <img src="../images-quiz/<?php echo $theme; ?>/<?php echo $a; ?>.png" width="100px" style="border-radius:20px;">
                    </div>

                    <form action="cardRep.php?theme=<?php echo $theme;?>" method="post" style="text-align:center;margin-bottom:10px">
                    <input type="radio" value="<?php echo $prop1 ?>" name="prop"><br>
                    <label for="<?php echo $prop1 ?>"><?php echo $prop1 ?></label> <br>
                    
                    <input type="radio" value="<?php echo $prop2 ?>" name="prop"> <br>
                    <label for="<?php echo $prop2 ?>"><?php echo $prop2 ?></label> <br>
                    
                    <input type="radio" value="<?php echo $prop3 ?>" name="prop"> <br>
                    <label for="<?php echo $prop3 ?>"><?php echo $prop3 ?></label><br>
                    
                        <div style="text-align:center;margin-top:15px;">
                            <button type="submit">Valider</button>
                        </div>
                    </form>
                    <div class="lien" style="text-align:center">
                    <a href="jeu-principal.php" style="color:black; text-decoration:none;font-size:13px">BACK HOME</a><br>
                    <a href="signal.php?theme=<?php echo $theme; ?>&id=<?php echo $a; ?>" style="color:orchid; text-decoration:none;font-size:13px">Signaler!</a>
                       
                    </div>
                    
                    

                </div>

            </div>
            <div class="face face2"
                  <?php 
                     if($theme=="sport") {
                        echo 'style="background: linear-gradient(45deg,#3503ad,#f7308c);"'; 
                     }else if($theme=="culture"){
                        echo 'style="background: linear-gradient(45deg,#ccff00,#09afff);"'; 
                     }else if($theme=="histoire"){
                        echo 'style="background: linear-gradient(45deg,#e91e63,#ffeb3b);"'; 
                     }else{
                        echo 'style="background: linear-gradient(45deg,#ACD3E9,#ffeb3b);"'; 
                     }
                         
                 
                 
                 ?>  
       
            >
                <h2><?php echo $compteur; ?></h2>

            </div>

        </div>

    </div>
    

</body>



</html>


<?php }

function afficheMsgSignal($msg) {
    if($msg=="DELETED"){
        echo '<h3 style="color:orchid;font-family:elgoc;">Merci pour ton aide, la question a été supprimée!</h3>';
    }else if($msg=="WAITING"){
        echo '<h3 style="color:orchid;font-family:elgoc;">Merci pour ton aide, nos équipes essaieront de corriger cette erreur!</h3>';
    }else if($msg=="SUCCESS"){
        echo '<h3 style="color:orchid;font-family:elgoc;">Tous tes thèmes ont éte remis à zéro!</h3>';
    }
    else if($msg=="SUCCESSVOTE"){
        echo '<h3 style="color:orchid;font-family:elgoc;">Merci pour ton aide, ton vote a été pris en compte!</h3>';
    }
}

function afficheFormResetQuiz() { ?>

    <form action="../extern/reset-quiz.ext.php" method="post">
        <div class="input" style="text-align:center;color:black;">
            <input type="submit" value="RESET" name="RESET">
        </div>

    </form>
<?php }

function afficheFormSignal($questionId,$theme) { ?>

    <form action="../extern/signal.ext.php?questionId=<?php echo $questionId; ?>&theme=<?php echo $theme; ?>" method="post" style="text-align:center">
    <label for="object-select" style="font-family:elgoc;">Objet du signalement ?</label><br>

    <select name="objet" id="objet-select" style="margin-bottom:30px;margin-top:30px">

        <option value="orthographe">Ortographe</option>
        <option value="contenu">Contenu innaproprié</option>
        <option value="anachronisme">Anachronisme</option>
        <option value="prop">Aucune proposition valide</option>
        <option value="syntaxe">Syntaxe</option>

    </select>
    <br>

    <button type="submit" style="color:black;margin-bottom:10px;" name="submit-signal">Envoyer</button>


    </form>
<?php }

function afficheFormVote($theme){ ?>

    <form action="../extern/vote.ext.php?theme=<?php echo $theme; ?>" method="post">
        
        <div style="text-align:center">
            <label for="vote-select" style="font-family:elgoc;color:orchid">Avez vous apprécié le thème ?</label><br>
            <select name="vote" id="vote-select" style="margin-bottom:30px;margin-top:30px">

                <option value="oui">OUI</option>
                <option value="non">NON</option>

            </select>
            <br>
            <label for="voteDifficulte-select" style="font-family:elgoc;color:orchid">Difficulté du thème ?</label><br>
            <select name="voteDifficulte" id="voteDifficulte-select" style="margin-bottom:30px;margin-top:30px">

                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>

            </select>
            <br>

            <button type="submit" style="color:black;" name="submit-vote">Envoyer</button>

        </div>
        
        
    </form>
<?php }

function afficheMsgVote($msg) {
    if($msg=="SUCCESS"){
        echo '<h3 style="color:orchid;font-family:elgoc;">Merci pour ton aide, ton vote a été pris en compte!</h3>';
    }
}

function afficheClassementSup($theme,$score,$best,$difficulte) { ?>
     <div class="theme" style="text-align:center">
            <div class="<?php echo $theme?>" style="color:orchid;font-size:200%">
            <h2><?php echo $theme;?> <br><?php echo $score; ?> /100 </h2>
            <p style="margin-top:-40px;color:#f1c40f;font-size:20px;">Best Score Ever : <?php echo $best; ?></p>
            <?php if($difficulte>5){ ?>
            <p style="margin-top:-20px;color:red;font-size:20px;">Level : <?php echo $difficulte; ?></p>
            <?php } else { ?>
            <p style="margin-top:-20px;color:lightgreen;font-size:20px;">Level : <?php echo $difficulte; ?></p>
            <?php } ?>
            </div>
          
            
    </div>
<?php }

function afficheClassementInf($theme,$score,$best,$difficulte) { ?>

     <div class="theme" style="text-align:center">
            <div class="<?php echo $theme?>">
            <h2><?php echo $theme; ?> <br><?php echo $score; ?> /100 </h2>
            <p style="margin-top:-20px;color:#f1c40f;font-size:20px;">Best Score Ever : <?php echo $best; ?></p>
            <?php if($difficulte>5){ ?>
            <p style="margin-top:-20px;color:red;font-size:20px;">Level : <?php echo $difficulte; ?></p>
            <?php } else { ?>
            <p style="margin-top:-20px;color:lightgreen;font-size:20px;">Level : <?php echo $difficulte; ?></p>
            <?php } ?>
            </div>
          
            
    </div>
<?php }
function afficheMsgLastGame($theme) { ?>
    
    <h3 style="color:#54a0ff;font-family:elgoc;text-align:center">Ton dernier jeu sélectionné est le thème <?php echo strtoupper($theme); ?>!</h3>;
    
<?php }
function afficheFormCreate(){ ?>
	<form action="../extern/createTheme.ext.php" method="post">
		<label class="un">Theme du nouveau jeu</label> <br>
		<input type="text" placeholder="Entrer le nom du theme que vous souhaitez créer" name="newTheme" required> <br>
        <a href="removeTheme.php">Want to Remove ?</a>

		<button type="submit" name="theme-submit">Envoyer</button>	
	</form>
<?php }
function msgAddTheme($msg) {
     if($msg=="ThemeAdded"){
        echo '<p class="msg-erreur">Nouveau Thème ajouté !</p>';
     }else{
        echo '<p class="msg-erreur">Erreur Veuillez Réessayer !</p>';
     }
	
}
function AfficheTheme($res){ ?>
	<div class="cards">
	<?php 
	while($ligne = mysqli_fetch_assoc($res)){ ?>
		<?php 
		afficherLigneTheme($ligne);
	} ?>
	</div>
	
<?php }
	
function afficherLigneTheme(&$ligne){ ?>
	<div class="sport">
		<a href="cardRep.php?theme=<?php echo htmlspecialchars($ligne["theme"])?>"><h5><?php echo htmlspecialchars($ligne["theme"])?></h5></a>
    </div>

<?php }
function afficheFormThemeDelete() { ?>

    <form action="../extern/deleteTheme.ext.php" method="post">

        <button type="submit" name="delete-submit">Delete Theme</button>
              
    </form>
<?php }
function afficheFormRemoveTheme() { ?>
    <form action="../extern/removeTheme.ext.php" method="post">

    <label for="theme">Theme</label><br>
    <input name="theme" placeholder="theme"><br>
    
    <button type="submit" style="margin-top:-5px;margin-bottom:5px" name="update">UPDATE</button>
    <br>

</form>
<?php }
function msgRemoveTheme($msg) {
    if($msg=="SUCCESS"){
        echo '<p class="msg-erreur">Your theme has been removed!</p>';
    }

}

    


