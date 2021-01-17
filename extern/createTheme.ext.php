<?php 
require 'dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';

if(isset($_POST["newTheme"])){

    $theme = $_POST["newTheme"];
    CreateTable($theme,$conn);
    header("Location: ../ACCOUNT/createTheme.php?msg=ThemeAdded");
    exit();
}else{
    header("Location: ../ACCOUNT/createTheme.php?msg=ThemeError");
    exit();
}
    
