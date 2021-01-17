<?php 
require 'dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';



if(isset($_POST["login-submit"])){

    $username = $_POST["username"];
    $username = mysqli_escape_string($conn,$username);
    
    $password = $_POST["password"];
    $password = mysqli_escape_string($conn,$password);


    $res = SelectLogin($username,$conn);


    PasswordCheck($password,$res);

    
}else {
    header("Location: ../ACCOUNT/login.php");
    exit();
}