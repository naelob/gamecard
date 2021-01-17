<?php
session_start();
require 'dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';

if(isset($_POST["delete-submit"])){

    $id = $_SESSION["userId"];
    DeleteUser($id,$conn);
   
}
 mysqli_close($conn);