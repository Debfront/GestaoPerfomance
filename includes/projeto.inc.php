<?php
session_start();

if(isset($_POST["submit"])){
    
    $cliente = $_POST["cliente"];
    $proposta = $_POST["proposta"];
    $dataInicio = $_POST["data-inicio"];
    $dataFim = $_POST["data-fim"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputsProject($cliente, $proposta, $dataInicio, $dataFim) !== false){
        header("location: ../adicionar_projeto.php?error=missinginput");
        exit();
    }

    if(saveProject($conn, $cliente, $proposta, $dataInicio, $dataFim, $_SESSION['id']) !== false){
        header("location: ../adicionar_projeto.php?error=failedtosaveform");
        exit();
    }

} else {
    header("location: ./projeto.php");
    exit();
}