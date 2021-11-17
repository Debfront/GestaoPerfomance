<?php
  include_once 'includes/functionsrelatorios.php';
  session_start(); //Inicia sessão
  if(!isset($_SESSION['id'])){
    header("Location: login.php");  //Leva o usuário para tela de login caso não esteja logado
  }
    if(array_key_exists('botaoGerarRelatorio', $_POST)) {
      generateReport($_POST);
      
    }
    
?>

<script type = "text/javascript">
    function disableDrop(){
     if(RelForm.tipoRel.options[1].selected){
      RelForm.dataInicial.disabled = true;
      RelForm.dataFinal.disabled = true;
     }
     else{
      RelForm.dataInicial.disabled = false;
      RelForm.dataFinal.disabled = false;
     }
    }
</script>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title> Gráficos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <figure>
    <img src="./img/logo1.png" alt="logo empresa" width="400" />
   </figure>
 
  <div class="container" id="tamanhoContainer">
    <h4>Relatórios</h4>
    <form id = "RelForm" method ="POST">
    <div class="form-group">
          <label> Tipo </label>
          <select required class="form-control" id="tipoRel" class="btn btn-sm" name = "titulo_relatorio" onchange = "disableDrop();">
            <option value ="">----</option>
            <option> Clientes</option>
            <option> Projetos</option>
            <option> Atividades em Andamento</option>
            <option> Atividades Finalizadas</option>
            </select>
            </div>
      <div class="form-group">
        <label for="">Data Inicial</label>
        <input required type="date" id="dataInicial" class="form-control" name = "datainicial" />
      </div>
      <div class="form-group">
        <label for="">Data Final</label>
        <input required type="date" id="dataFinal" class="form-control" name = "datafinal" />
      </div>
      <div style="text-align: right">
        <button type="submit" id="botão" class="btn btn-sm" name = "botaoGerarRelatorio">
          Gerar Relatório
        </button>
        <button onClick="history.go(-1)"  type="button" class="btn btn-info btn-sm">Voltar</button>
      </div>
    </form>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>