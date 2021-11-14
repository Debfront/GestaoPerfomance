<?php

function emptyInputsRegister($name, $email, $password, $password2){
    $result;
    if(empty($name) || empty($email) || empty($password) || empty($password2)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emptyInputsLogin($email, $password){
    $result;
    if(empty($email) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $password){
    $userEmail = existingEmail($conn, $email);

    if($userEmail === false){
        header("location: ../login.php?error=emaildoesntexist");
        exit();
    }

    $hashedPwd = $userEmail["senha"];
    $checkedPwd = password_verify($password, $hashedPwd);

    if($checkedPwd === false){
        header("location: ../login.php?error=wrongpwd");
        exit();
    }else if($checkedPwd === true){
        session_start();
        $_SESSION["id"] = $userEmail["idUsuarios"];
        $_SESSION["name"] = $userEmail["nome"];
        header("location: ../index.php");
        exit();
    }
}

function pwdMatch($password, $password2){
    $result;
    if($password !== $password2){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function existingEmail($conn, $email){
    $sql = "SELECT * FROM usuarios WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }else{
            $result = false;
            return $result;
        }
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $password){
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../cadastro.php?error=stmtfailed");
        exit();
    }else{

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../login.php?error=none");
        exit();
    }
}