<?php
session_start();
require '../extern/dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';


$theme = $_GET["theme"];
$id = $_SESSION["userId"];

UpdateLastGame($theme,$id,$conn);


if($_SERVER['REQUEST_METHOD']=="POST"){

        $tab = SelectJeuActive($id,$theme,$conn);
    
        $ordreActuel = $tab["ordreActuel"];
        $ordreSuivant = $tab["ordreSuivant"];
        $nbrErreur = $tab["nbrErreur"];
        $currentScore = $tab["currentScore"];
        $compteur = $tab["compteur"];
    
        $ordreActuelexp = AuxExplode($ordreActuel);
        $a = $ordreActuelexp[0]; 
        
        $tab = SelectTheme($theme,$a,$conn);
        $reponse = $tab["reponse"];
        $reponse = strtolower($reponse);
        $type = $tab["type"];
        $level = $tab["level"];
        
            if(isset($_POST["prop"])){
                $rep1 = $_POST["prop"];
                $rep1 = strtolower($rep1);
            }else{
                if(isset($_POST["reponse"])){
                  $rep1 = $_POST["reponse"];
                  $rep1 = mysqli_escape_string($conn,$rep1);
                    
                  $rep1 = strtolower($rep1);
                }else{
                    $rep1 = " ";
                }
            }
                
            
          if($rep1!==$reponse){
              if($type=="qcm"){
                  $nbrErreur++;
                  $ordreSuivant=$a."/".$ordreSuivant;
                  $currentScore-=30;
              }else{
                  $nbrErreur++;
                  $ordreSuivant=$a."/".$ordreSuivant;
                  $currentScore-=20;
              }
                
          }else{
              if($type=="qcm"){
                  
                if($level==1){
                    $currentScore+=35;
                    $ordreSuivant=$ordreSuivant.$a."/";
                }else if($level==2){
                    $currentScore+=85;
                    $ordreSuivant=$ordreSuivant.$a."/";
                }else{
                    $currentScore+=250;
                    $ordreSuivant=$ordreSuivant.$a."/";
                }
                  
              }else{
                  
                if($level==1){
                    $currentScore+=65;
                    $ordreSuivant=$ordreSuivant.$a."/";
                }else if($level==2){
                    $currentScore+=165;
                    $ordreSuivant=$ordreSuivant.$a."/";
                }else{
                    $currentScore+=550;
                    $ordreSuivant=$ordreSuivant.$a."/";
                }
              }
            }
        $newOrdreActuel = [];
        for($i=1;$i<count($ordreActuelexp);$i++){
            $newOrdreActuel[$i-1]=$ordreActuelexp[$i];
        }
        $ordreActuel = implode("/",$newOrdreActuel);
        $compteur++;
    
        UpdateJeuActive($ordreActuel,$ordreSuivant,$nbrErreur,$currentScore,$compteur,$id,$theme,$conn);
    
        if(empty($ordreActuel)){
            header("Location: endofthegame.php?theme=".$theme);
            exit();
        }
    
    
    
    
}
    
        
       




//INITIALISATION 
        
        InitFirstCard($id,$theme,$conn);
        

        $tab = SelectJeuActive($id,$theme,$conn);

        $ordreActuel = $tab["ordreActuel"];
        $compteur = $tab["compteur"];
        
        
        $ordreActuelexp = AuxExplode($ordreActuel);
        $a = $ordreActuelexp[0]; 

        
        $tab = SelectTheme($theme,$a,$conn);

        $question = $tab["question"];
        $type = $tab["type"];
        

        if($type=="qcm"){
            $tab = SelectProp($a,$theme,$conn);
            
            $prop1 = $tab["proposition1"];
            $prop2 = $tab["proposition2"];
            $prop3 = $tab["proposition3"];
            
            afficherCarteProp($question,$prop1,$prop2,$prop3,$theme,$a,$compteur);

        }else{
            afficherCarteTexte($question,$theme,$a,$compteur);
            
        }

        

        









