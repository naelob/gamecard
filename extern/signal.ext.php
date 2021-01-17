<?php
session_start();
require 'dbh.ext.php';
require '../VIEWS/fonctionAffichage.php';
require '../VIEWS/fonctionRequete.php';
require '../VIEWS/fonctionAux.php';

$id = $_SESSION["userId"];
$theme = $_GET["theme"];

$questionId = $_GET["questionId"];


if(isset($_POST["submit-signal"])){
    
    $objet =$_POST["objet"];
    
    InsertSignal($id,$objet,$theme,$questionId,$conn);

    $res = SelectSignal($theme,$questionId,$conn);

    DeleteQuestSignal($res,$theme,$questionId,$conn);
    
    mysqli_close($conn);

}else{
    header("Location: ../home.php");
    exit();
}
