<?php

session_start();

if(isset($_POST["submit"])){
    
    $cliente = $_POST['cliente'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(clientExist($conn, $cliente) !== false){
        header("location: ../card.php?error=clientalreadyexists");
        exit();
    }

    if(addClient($conn, $cliente) !== false){
        header("location: ../card.php?error=erroraddingclient");
        exit();
    }

}else{
    header("location: ../card.php");
    exit();
}