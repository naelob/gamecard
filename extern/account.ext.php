<?php 
session_start();
require 'dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';

if(isset($_POST["validate-submit"])){
    
    $id = $_SESSION["userId"];
 
    $name = $_POST["prenom"];
    $name = mysqli_escape_string($conn,$name);
    
    $username = $_POST["username"];
    $username = mysqli_escape_string($conn,$username);
  
    DataCheckAccount($name,$username,$id,$conn);

    
    
    mysqli_close($conn);

    
    
}else {
    header("Location: ../ACCOUNT/account.php");
    exit();
}
