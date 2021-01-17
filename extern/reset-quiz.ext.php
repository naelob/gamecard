<?php 
session_start();
require 'dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';

if(isset($_POST["RESET"])){

    $id = $_SESSION["userId"];


    ResetQuiz($id,$conn);
    
    
    mysqli_close($conn);

    
    
}else {
    header("Location: ../home.php");
    exit();
}