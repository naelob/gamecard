<?php 
require 'dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';

if(isset($_POST["adding-quest"])){

    $theme = $_POST["theme"];
    $theme = mysqli_escape_string($conn,$theme);
    
    $question = $_POST["question"];
    $question = mysqli_escape_string($conn,$question);
    
    $answer = $_POST["reponse"];
    $answer = mysqli_escape_string($conn,$answer);
    
    $type = $_POST["type"];
    $type = mysqli_escape_string($conn,$type);
    
    $prop1 = $_POST["prop1"];
    $prop1 = mysqli_escape_string($conn,$prop1);
    
    $prop2 = $_POST["prop2"];
    $prop2 = mysqli_escape_string($conn,$prop2);
    
    $prop3 = $_POST["prop3"];
    $prop3 = mysqli_escape_string($conn,$prop3);
    
    $level = $_POST["level"];
    $level = mysqli_escape_string($conn,$level);
    
    
    $res = CountQuest($theme,$conn);

    $tab = mysqli_fetch_assoc($res);
    $numero = $tab["COUNT(*)"];
    $numero++;


    InsertQuest($theme,$numero,$question,$answer,$level,$type,$conn,$res); 
    InsertPropQcm($type,$numero,$prop1,$prop2,$prop3,$theme,$conn);

    mysqli_close($conn);

    header("Location: ../ACCOUNT/addQuest.php?update=SUCCESS");
    exit();
     
    
}else {
    header("Location: ../home.php");
    exit();
}