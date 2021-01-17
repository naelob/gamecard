<?php
session_start();
require 'dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';

$theme = $_GET["theme"];


if(isset($_POST["submit-vote"])){
    $res = SelectVisibilite($theme,$conn);

    $tab = mysqli_fetch_assoc($res);
    
    $nbrVisites = $tab["nbrVisites"];
    $nbrVisites++;
    
    $nbrVotes = $tab["nbrVotes"];
    
    $compteur = $tab["compteurDifficulte"];
    $compteur++;
    
    $difficulte = $tab["difficulte"];

    $vote =$_POST["vote"];
    $voteDifficulte =$_POST["voteDifficulte"] + $difficulte;
    
    $calcul = floor(($voteDifficulte)/$compteur);
    
    if($vote=="oui"){
        $nbrVotes++;
    }

    UpdateVote($nbrVisites,$nbrVotes,$theme,$conn);
    UpdateVoteDifficulte($voteDifficulte,$compteur,$calcul,$theme,$conn);

    mysqli_close($conn);

    header("Location: ../jeu-principal/jeu-principal.php?msg=SUCCESSVOTE&theme=".$theme);
    exit();
    


}else{
    header("Location: ../home.php");
    exit();
}
