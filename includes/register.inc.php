<?php

if(isset($_POST["submit"])){
    
    $name = $_POST["nome"];
    $email = $_POST["email"];
    $password = $_POST["senha"];
    $password2 = $_POST["Confirmarsenha"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputsRegister($name, $email, $password, $password2) !== false){
        header("location: ../cadastro.php?error=missinginput");
        exit();
    }

    if(pwdMatch($password, $password2) !== false){
        header("location: ../cadastro.php?error=differentpasswords");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../cadastro.php?error=invalidemail");
        exit();
    }

    if(existingEmail($conn, $email) !== false){
        header("location: ../cadastro.php?error=emailtaken");
        exit();
    }

    if(createUser($conn, $name, $email, $password) !== false){
        header("location: ../cadastro.php?error=failedtocreateaccount");
        exit();
    }

} else {
    header("location: ../cadastro.php");
    exit();
}