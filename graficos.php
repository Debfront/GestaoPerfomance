<?php
    include_once 'includes/relatorios.php';

    if(array_key_exists('botaoGerarRelatorio', $_POST)) {
      generateReport($_POST);
    }
?>

<script type = "text/javascript">
    function disableDrop(){
     if(mainForm.tipoRel.options[5].selected){
      mainForm.tipoProj.disabled = false;
     }
     else{
      mainForm.tipoProj.disabled = true;
      mainForm.tipoProj.value = "----";
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
    <h4>Relatório Gráfico</h4>
    <form id = "mainForm" method ="POST"><!-- action = "D:/Softwares/Programacao/Web/XAMPP/htdocs/GestaoPerfomance/includes/relatorios.php" -->
    <div class="form-group">
          <label> Tipo </label>
          <select class="form-control" id="tipoRel" class="btn btn-sm" name = "titulo_relatorio" onchange = "disableDrop();">
            <option>----</option>
            <option> Tempo Médio Tipo de Infraestrutura por Quantidade de Pessoas </option>
            <option> Tempo Médio Quantidade de Pessoas por Tipo de Infraestrutura</option>
            <option> Tempo Médio por Projeto</option>
            <option> Total Instalado por Projeto</option>
            <option> Instalado do Projeto por Dia</option>
            </select>
            </div>
        <div class="form-group">
          <label> Cliente</label>
          <select class="form-control" id="tipoProj" class="btn btn-sm" name = "codigoprojeto" disabled>
            <option>----</option>
            <option> Elgin VS001305 </option>
            <option> Hosp São Francisco MA010735</option>
            <option> Toniato Paulinia MA010821</option>
            <option>Toniato Dourados MA010824</option>
            <option>Fini VS001397</option>
            <option>Panasonic RP00101</option>
            </select>
            </div>
      <div class="form-group">
        <label for="">Data Inicial</label>
        <input type="date" class="form-control" name = "datainicial" />
      </div>
      <div class="form-group">
        <label for="">Data Final</label>
        <input type="date" class="form-control" name = "datafinal" />
      </div>
      <div style="text-align: right">
        <button type="submit" id="botão" class="btn btn-sm" name = "botaoGerarRelatorio">
          Gerar Relatório
        </button>
        <button type="button" class="btn btn-info btn-sm">Voltar</button>
      </div>
    </form>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>