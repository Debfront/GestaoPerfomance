<?php
session_start();

if(isset($_POST["submit"])){
    
    $cliente = $_POST["cliente"];
    $projeto = $_POST["projeto"];
    $equipe = $_POST["equipe"];
    $date = $_POST["date"];
    $infra_estrutura = $_POST["infra-estrutura"];
    $infra_estrutura_num = $_POST["infra-estrutura-num"];
    $cabeamento = $_POST["cabeamento"];
    $cabeamento_num = $_POST["cabeamento-num"];
    $conectorizacao = $_POST["conectorizacao"];
    $conectorizacao_num = $_POST["conectorizacao-num"];
    $tempo_conclusao = $_POST["tempo-conclusao"];
    $obs = $_POST["obs"];
    $userId = $_SESSION['id'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputsForm($cliente, $equipe, $date, $infra_estrutura, $infra_estrutura_num, $conectorizacao, $conectorizacao_num, $tempo_conclusao) !== false){
        header("location: ../formulario.php?error=missinginput");
        exit();
    }

    if(saveForm($conn, $userId, $cliente, $equipe, $date, $infra_estrutura, $infra_estrutura_num, $cabeamento, $cabeamento_num, $conectorizacao, $conectorizacao_num, $tempo_conclusao, $projeto, $obs) !== false){
        header("location: ../formulario.php?error=failedtosaveform");
        exit();
    }

} else {
    header("location: ../index.php");
    exit();
}