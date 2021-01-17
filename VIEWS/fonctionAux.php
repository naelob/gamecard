<?php

function AuxExplode($ordreActuel){
    $ordreActuelexp=explode("/",$ordreActuel);
    return $ordreActuelexp;
}

function AuxScoreVote($nbrVisites,$nbrVotes) {
    $score = ($nbrVotes/$nbrVisites)*100;
    return $score;
}

function AuxClassement($res) {
    while($ligne= mysqli_fetch_assoc($res)){
        if($ligne["nbrVotes"]/$ligne["nbrVisites"]*100 > 80){
            afficheClassementSup($ligne["theme"],floor($ligne["nbrVotes"]/$ligne["nbrVisites"]*100),$ligne["best"],$ligne["calcul"]);
        }else{
            afficheClassementInf($ligne["theme"],floor($ligne["nbrVotes"]/$ligne["nbrVisites"]*100),$ligne["best"],$ligne["calcul"]);
        }
        
    }
    
}

function DataCheck($email,$username,$password,$password2) {
      if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../ACCOUNT/signup.php?error=invalidusername&email");
        exit();
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../ACCOUNT/signup.php?error=invalidemail");
        exit();
    }else if($password!==$password2 && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../ACCOUNT/signup.php?error=PWDdontmatchAndUsername");
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../ACCOUNT/signup.php?error=invalidusername");
        exit();
          
    }else if(!pwdValide($password)){
        header("Location: ../ACCOUNT/signup.php?error=PWDERROR");
        exit();
    }else if($password!==$password2){
        header("Location: ../ACCOUNT/signup.php?error=PWDdontmatch");
        exit();
    }
    return true;
}

function DataCheckAccount($name,$username,$id,$conn) {
    if(empty($name) && empty($username)){
        header("Location: ../ACCOUNT/account.php?error=emptyfields");
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../ACCOUNT/account.php?error=invalidusername");
        exit();
    }else{
            
        if(empty($name)){
            $res = SelectLogin($username,$conn);
            UpdateUsername($username,$id,$conn,$res);
        }else if(empty($username)){
            UpdateName($name,$id,$conn,$res);

        }else{
            UpdateBoth($username,$name,$id,$conn,$res);
        }
    }
}
function CreateTable($theme,$conn){
		CreateTableReq($conn,$theme);
		UpdateVisibiliteCreate($conn,$theme);
		
	
}
