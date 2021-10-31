<?php

if(isset($_POST["submit"])){
    
    $email = $_POST['email'];
    $password = $_POST['senha'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputsLogin($email, $password) !== false){
        header("location: ../login.php?error=missinginput");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../login.php?error=invalidemail");
        exit();
    }

    if(existingEmail($conn, $email) == false){
        header("location: ../login.php?error=wrongemail");
        exit();
    }

    if(loginUser($conn, $email, $password) !== false){
        header("location: ../login.php?error=loginerror");
        exit();
    }

}else{
    header("location: ../login.php");
    exit();
}