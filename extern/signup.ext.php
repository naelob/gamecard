<?php 
require 'dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';
require 'security.ext.php';

if(isset($_POST["signup-submit"])){
    
    $name = $_POST["prenom"];
    $name = mysqli_escape_string($conn,$name);
    
    $username = $_POST["username"];
    $username = mysqli_escape_string($conn,$username);
    
    $email = $_POST["email"];
    $email = mysqli_escape_string($conn,$email);
    
    $password = $_POST["password"];
    $password = mysqli_escape_string($conn,$password);
    
    $password2 = $_POST["password2"];
    $password2 = mysqli_escape_string($conn,$password2);
    
    if(DataCheck($email,$username,$password,$password2)){
        
        $res = SelectUserSignUp($username,$conn);
        InsertUser($res,$conn,$name,$username,$password);
    }
    
}else {
    header("Location: ../ACCOUNT/signup.php");
    exit();
}