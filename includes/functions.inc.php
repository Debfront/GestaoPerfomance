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

function emptyInputsForm($cliente, $equipe, $date, $infra_estrutura, $infra_estrutura_num, $conectorizacao, $conectorizacao_num, $tempo_conclusao){
    $result;
    if(empty($cliente) || empty($equipe) || empty($date) || empty($infra_estrutura) || empty($infra_estrutura_num) || empty($conectorizacao) || empty($conectorizacao_num) || empty($tempo_conclusao)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function saveForm($conn, $userId, $idCliente, $equipeForm, $data, $idInfraEstrutura, $qntInfraEstrutura, $idCabeamento, $qntCabeamento, $idConector, $qntConector, $tempo, $projeto, $obs){
    // alterar função criar usuário
    $sql = "INSERT INTO cadastro (Usuarios_idUsuarios, infraEstrutura_idinfraEstrutura, quantidade_InfraEstrutura, Conector_idConector, quantidade_Conector, Cabeamento_idCabeamento, quantidade_Cabeamento, Clientes_idClientes, equipe, data_cadastro, tempo_conclusao, Projeto_idProjeto, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../formulario.php?error=stmtfailed");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "iiiiiiiisssis", $userId, $idInfraEstrutura, $qntInfraEstrutura, $idConector, $qntConector, $idCabeamento, $qntCabeamento, $idCliente, $equipeForm, $data, $tempo, $projeto, $obs);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../formulario.php?error=none");
        exit();
    }
}

function emptyInputsProject($cliente, $proposta, $dataInicio, $dataFim){
    $result;
    if(empty($cliente) || empty($proposta) || empty($dataInicio) || empty($dataFim)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function saveProject($conn, $cliente, $proposta, $dataInicio, $dataFim, $userID){
    // alterar função criar usuário
    $sql = "INSERT INTO projeto (proposta, Clientes_idClientes, data_inicio, data_termino, Usuarios_idUsuarios ) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../adicionar_projeto.php?error=stmtfailed");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "ssssi", $proposta, $cliente, $dataInicio, $dataFim, $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../adicionar_projeto.php?error=none");
        exit();
    }
}

function clientExist($conn, $cliente){
    $sql = "SELECT * FROM clientes WHERE nome_cliente = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../card.php?error=stmtfailed");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $cliente);
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

function addClient($conn, $cliente){
    $sql = "INSERT INTO clientes (Usuarios_idUsuarios, nome_cliente) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../card.php?error=stmtfailed");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "is", $_SESSION['id'], $cliente,);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../card.php?error=none");
        exit();
    }
}