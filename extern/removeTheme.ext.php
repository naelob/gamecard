<?php 
require 'dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';

if(isset($_POST["theme"])){

    $theme = $_POST["theme"];
    $theme = mysqli_escape_string($conn,$theme);


    RemoveTheme($theme,$conn);


    mysqli_close($conn);

    
    
}else {
    header("Location: ../home.php");
    exit();
}