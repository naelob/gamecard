<?php 
require 'dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';

if(isset($_POST["update"])){

    $theme = $_POST["theme"];
    $theme = mysqli_escape_string($conn,$theme);

    $question = $_POST["question"];
    $question = mysqli_escape_string($conn,$question);

    $type = $_POST["type"];
    $type = mysqli_escape_string($conn,$type);


    RemoveQuest($theme,$question,$conn);


    mysqli_close($conn);

    
    
}else {
    header("Location: ../home.php");
    exit();
}