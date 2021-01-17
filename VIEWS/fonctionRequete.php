<?php 


function BestScore($id,$conn) {
    
    $sql = "SELECT bestScore FROM gamecard WHERE id=".$id.";";
    $res = mysqli_query($conn,$sql);
        if(!$res){
            echo $sql;
            exit();
        }
     $tab = mysqli_fetch_assoc($res);
     $bestScore = $tab["bestScore"];
     return $bestScore;
}

function UpdateStatus($bestScore,$conn) {
    if($bestScore>1200){
        $sql = "UPDATE gamecard SET status='expert';";
        $res = mysqli_query($conn,$sql);
        if(!$res){
            echo $sql;
            exit();
        }
        return "expert";
    }else{
        $sql = "UPDATE gamecard SET status='beginner';";
        $res = mysqli_query($conn,$sql);
        if(!$res){
            echo $sql;
            exit();
        } 
        return "beginner";
    
    }
}

function InitFirstCard($id,$theme,$conn){
    $sql = "SELECT * FROM jeuActive WHERE id=".$id." AND theme='".$theme."';";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        header("Location: cardRep.php?error=sqlerror5");
        exit();
    }

    if(mysqli_num_rows($res)==0){
        $ordreSuivant = "";
        $ordreActuel = "";

        $sql = "SELECT COUNT(*) FROM ".$theme;
        $res = mysqli_query($conn,$sql);
        if(!$res){
            echo $res;
            exit();
        }
        $tab = mysqli_fetch_assoc($res);

        $taille = $tab["COUNT(*)"];


        for($i=1;$i<=$taille;$i++){
            $ordreActuel.=$i."/";
        }
         $sql = "INSERT INTO jeuActive(id,ordreActuel,ordreSuivant,theme,nbrErreur,currentScore,compteur) VALUES(".$id.",'".$ordreActuel."','".$ordreSuivant."','".$theme."',0,0,1);"; 
        $res = mysqli_query($conn,$sql);
        if(!$res){
            header("Location: cardRep.php?error=sqlerror7");
            exit();
        }

    }
}

function SelectJeuActive($id,$theme,$conn){
    $sql = "SELECT * FROM jeuActive WHERE id=".$id." AND theme='".$theme."';"; 
    $res = mysqli_query($conn,$sql);
    if(!$res){
        echo $res;
        exit();
    }   
    $tab = mysqli_fetch_assoc($res);
    return $tab;
}

function SelectTheme($theme,$a,$conn) {
    $sql = "SELECT * FROM ".$theme." WHERE id=".$a; 
    $res = mysqli_query($conn,$sql);
    if(!$res){
        echo $sql;
        exit();
    }
    $tab = mysqli_fetch_assoc($res);
    return $tab;
}

function UpdateJeuActive($ordreActuel,$ordreSuivant,$nbrErreur,$currentScore,$compteur,$id,$theme,$conn){
    $sql = "UPDATE jeuActive SET ordreActuel='".$ordreActuel."',ordreSuivant='".$ordreSuivant."',nbrErreur=".$nbrErreur.",currentScore=".$currentScore.",compteur=".$compteur." WHERE id=".$id." AND theme='".$theme."';"; 
    
    $res = mysqli_query($conn,$sql);
    if(!$res){
        echo $res;
        exit();
    }

}

function UpdateJeuActiveEnd($ordreSuivant,$id,$theme,$conn) {
    
$sql1 = "UPDATE jeuActive SET ordreActuel='".$ordreSuivant."',ordreSuivant=NULL, nbrErreur=0, currentScore=0, compteur=1 WHERE id=".$id." AND theme='".$theme."';";
$res1 = mysqli_query($conn,$sql1);
    if(!$res1){
        echo $sql1;
        exit();
    }
}

function SelectProp($a,$theme,$conn) {
    $sql = "SELECT * FROM propositions WHERE questionId=".$a." AND theme='".$theme."';"; 
    $res = mysqli_query($conn,$sql);
    if(!$res){
        header("Location: cardRep.php?error=sqlerror10");
        exit();
    }
    $tab = mysqli_fetch_assoc($res);
    return $tab;
}

function UpdateGameCardBestScore($score,$bestScore,$id,$conn){
    if($score>$bestScore){
        $sql = "UPDATE gamecard SET bestScore=".$score." WHERE id=".$id;
        $res = mysqli_query($conn,$sql);
        if(!$res){
            echo $sql;
            exit();
        }
    }
    
}

function SelectVote($conn,$theme) {
    $sql = "SELECT * FROM visibilite WHERE theme='".$theme."'";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        echo $sql;
        exit();
    }
    $tab = mysqli_fetch_assoc($res);
    return $tab;
}

function SelectClassement($conn) {
    $sql = "SELECT * FROM visibilite";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        echo $sql;
        exit();
    }
    return $res;
}

function BestEver($theme,$conn) {
    
    $sql = "SELECT best FROM visibilite WHERE theme='".$theme."'";
    $res = mysqli_query($conn,$sql);
        if(!$res){
            echo $sql;
            exit();
        }
     $tab = mysqli_fetch_assoc($res);
     $bestEver = $tab["best"];
     return $bestEver;
}

function UpdateBestEver($conn,$theme,$score,$bestEver) {
      if($score>$bestEver){
        $sql = "UPDATE visibilite SET best=".$score." WHERE theme='".$theme."'";
        $res = mysqli_query($conn,$sql);
        if(!$res){
            echo $sql;
            exit();
        }
     }
    

}

function SelectLogin($username,$conn){
    $sql = "SELECT * FROM gamecard WHERE username='".$username."' OR email='".$username."';";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        header("Location: ../ACCOUNT/login.php?error=sqlerror");
        exit();
    }else{
        return $res;
    }
    
}

function PasswordCheck($password,$res){
    if($row = mysqli_fetch_assoc($res)){
        $hashedPassword = md5($password);
        $pwdCheck = ($hashedPassword === $row["pwd"]);
        if($pwdCheck==false){
            header("Location: ../ACCOUNT/login.php?error=wrongpassword");
            exit();
        
        }else if($pwdCheck==true){
            session_start();
            $_SESSION["userId"]=$row["id"];
            $_SESSION["username"]=$row["username"];
            $_SESSION["status"]=$row["status"];
            header("Location: ../MESSAGES/login.msg.php?login=SUCCESS");
            exit();
        }
    
    }else{
        header("Location: ../ACCOUNT/login.php?error=dontexist");
        exit();

    }
    mysqli_close($conn);
}

function SelectUserSignUp ($username,$conn) {
    $sql = "SELECT username FROM gamecard WHERE username='".$username."';";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        header("Location: ../ACCOUNT/signup.php?error=sqlerror");
        exit();
    }else{
        return $res;
    }
}

function InsertUser($res,$conn,$name,$username,$password) {
        $resultCheck = mysqli_num_rows($res);
        if($resultCheck>0){
            header("Location: ../ACCOUNT/signup.php?error=USERNAMETAKEN");
            exit();
        }else{
            $hashedPwd = md5($password);
            $sql = "INSERT INTO gamecard(name,username,email,pwd) VALUES('".$name."','".$username."','".$email."','".$hashedPwd."');";
            $res = mysqli_query($conn,$sql);
            if(!$res){
                header("Location: ../ACCOUNT/signup.php?error=sqlerror");
                exit();
            }else {
                header("Location: ../MESSAGES/signup.msg.php?signup=SUCCESS");
                exit();
            }
        }
        mysqli_close($conn);
}

function DeleteUser($id,$conn) {

    $sql = "DELETE FROM gamecard WHERE id=".$id.";";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        header("Location: ../ACCOUNT/account.php?error=sqlerror");
        exit();
    }else{
        header("Location: logout-delete.ext.php");
        exit();
    }
}

function UpdateUsername($username,$id,$conn,$res) {
    $resultCheck = mysqli_num_rows($res);
    if($resultCheck>0){
        header("Location: ../ACCOUNT/account.php?error=USERNAMETAKEN");
        exit();
    }else{
        $sql = "UPDATE gamecard SET username='".$username."' WHERE id=".$id;
        $res = mysqli_query($conn,$sql);
         if(!$res){
            header("Location: ../ACCOUNT/account.php?error=sqlerror");
            exit();
         }else{
            header("Location: ../ACCOUNT/account.php?update=SUCCESS");
            exit();
        }
    }
}

function UpdateName($name,$id,$conn,$res){
    $sql = "UPDATE gamecard SET name='".$name."' WHERE id=".$id.";";
    $res = mysqli_query($conn,$sql);
     if(!$res){
        header("Location: ../ACCOUNT/account.php?error=sqlerror");
        exit();
     }else{
        header("Location: ../ACCOUNT/account.php?update=SUCCESS");
        exit();
     }
}

function UpdateBoth($username,$name,$id,$conn,$res) {
    $sql = "UPDATE gamecard SET name='".$name."', username='".$username."' WHERE id=".$id;
    $res = mysqli_query($conn,$sql);
     if(!$res){
        header("Location: ../ACCOUNT/account.php?error=sqlerror");
        exit();
     }else{
        header("Location: ../ACCOUNT/account.php?update=SUCCESS");
        exit();
     }
    
}

function CountQuest($theme,$conn){
    $sql = "SELECT COUNT(*) FROM ".$theme.";";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        header("Location: ../ACCOUNT/addQuest.php?error=sqlerror");
        exit();
    }
    return $res;
}

function InsertQuest($theme,$numero,$question,$answer,$level,$type,$conn,$res) {
    $sql = "INSERT INTO ".$theme." (id,question,reponse,level,type) VALUES(".$numero.",'".$question."','".$answer."','".$level."','".$type."');";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        header("Location: ../ACCOUNT/addQuest.php?error=sqlerror");
        exit();
    }
}

function InsertPropQcm($type,$numero,$prop1,$prop2,$prop3,$theme,$conn) {
     if($type=="qcm"){
        $sql = "INSERT INTO propositions (questionId,proposition1,proposition2,proposition3,theme) VALUES(".$numero.",'".$prop1."','".$prop2."','".$prop3."','".$theme."');";
        $res = mysqli_query($conn,$sql);
        if(!$res){
            header("Location: ../ACCOUNT/addQuest.php?error=sqlerror3é");
            exit();
        }
    }
}

function RemoveQuest($theme,$question,$conn) {
    $sql = "DELETE FROM ".$theme." WHERE question='".$question."';";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        header("Location: ../ACCOUNT/removeQuest.php?error=sqlerror");
        exit();
    }else{
        header("Location: ../ACCOUNT/removeQuest.php?update=SUCCESS");
        exit();
    }
}

function ResetQuiz($id,$conn) {
    $sql = "DELETE FROM jeuActive WHERE id=".$id.";";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        header("Location: ../jeu-principal/jeu-principal.php?error=sqlerror");
        exit();
    }else{
        header("Location: ../jeu-principal/jeu-principal.php?msg=SUCCESS");
        exit();
    }
}

function InsertSignal($id,$objet,$theme,$questionId,$conn) {
    $sql = "INSERT INTO signaler(utilisateurId,objet,theme,questionId) VALUES(".$id.",'".$objet."','".$theme."',".$questionId.");";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        echo $sql;
        exit();
    }

}

function SelectSignal($theme,$questionId,$conn) {
    $sql = "SELECT * FROM signaler WHERE theme='".$theme."' AND questionId=".$questionId;
    $res = mysqli_query($conn,$sql);
    if(!$res){
        echo $sql;
        exit();
    }
    return $res;
}

function DeleteQuestSignal($res,$theme,$questionId,$conn) {
    if(mysqli_num_rows($res)>=10){
        $sql = "DELETE FROM ".$theme." WHERE questionId=".$questionId;
        $res = mysqli_query($conn,$sql);
        if(!$res){
            echo $sql;
            exit();
        }
        header("Location: ../jeu-principal/jeu-principal.php?msg=DELETED");
        exit();
        
    }else{
        header("Location: ../jeu-principal/jeu-principal.php?msg=WAITING");
        exit();
    }
}

function SelectVisibilite($theme,$conn) {
    $sql = "SELECT * FROM visibilite WHERE theme='".$theme."'";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        echo $sql;
        exit();
    }
    return $res;
}

function UpdateVote($nbrVisites,$nbrVotes,$theme,$conn) {
    $sql = "UPDATE visibilite SET nbrVisites=".$nbrVisites.", nbrVotes=".$nbrVotes." WHERE theme='".$theme."'";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        echo $sql;
        exit();
    }
}
function UpdateVoteDifficulte($voteDifficulte,$compteur,$calcul,$theme,$conn) {
    $sql = "UPDATE visibilite SET difficulte=".$voteDifficulte.", compteurDifficulte=".$compteur.",calcul=".$calcul." WHERE theme='".$theme."'";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        echo $sql;
        exit();
    }
}
function UpdateLastGame($theme,$id,$conn) {
    $sql = "UPDATE gamecard SET lastGame='".$theme."' WHERE id=".$id;
    $res = mysqli_query($conn,$sql);
    if(!$res){
        echo $sql;
        exit();
    }
}
function SelectLastGame($id,$conn) {
    $sql = "SELECT lastGame FROM gamecard WHERE id=".$id;
    $res = mysqli_query($conn,$sql);
    if(!$res){
        echo $sql;
        exit();
    }
    return $res;
}
function CreateTableReq($conn,$theme){
	$sql="CREATE TABLE ".$theme."(id INT AUTO_INCREMENT, question TEXT, reponse TEXT, level INT, type VARCHAR(100));";
	$res = mysqli_query($conn,$sql);
	if(!$res){
            echo $sql;
            exit();
		}
	}
	
function UpdateVisibiliteCreate($conn,$theme){
	$sql="INSERT INTO visibilite VALUES('".$theme."',0,0,0,0,0,0)";
	$res = mysqli_query($conn,$sql);
	if(!$res){
            echo $sql;
            exit();
    }
}
function RecupTheme($conn){
	$sql="SELECT * FROM visibilite";
	$res = mysqli_query($conn,$sql);
	if(!$res){
            echo $sql;
            exit();
	}
	return $res;
}

    
function RemoveTheme($theme,$conn) {
    $sql = "DROP TABLE ".$theme;
    $res = mysqli_query($conn,$sql);
    if(!$res){
        header("Location: ../ACCOUNT/removeTheme.php?error=sqlerror");
        exit();
    }
    $sql = "DELETE FROM visibilite WHERE theme='".$theme."'";
    $res = mysqli_query($conn,$sql);
    if(!$res){
        header("Location: ../ACCOUNT/removeTheme.php?error=sqlerror");
        exit();
    }
    header("Location: ../ACCOUNT/removeTheme.php?update=SUCCESS");
    exit();
    
}

    
    
